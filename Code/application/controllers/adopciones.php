<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Adopciones extends CI_Controller
{
    public function solicitudAdopcion()
    {
        $idUsuario = $this->input->get('idUsuario');
        $data['usuario'] = $this->usuario_model->recuperarUsuario($idUsuario);
        $por_pagina = 9;
        $pagina = 1;
        $inicio = ($pagina - 1) * $por_pagina;
        $data['mascotas'] = $this->mascota_model->obtenerMascotasDisponibles($inicio, $por_pagina);

        $this->load->view('paginaPrincipal/adopcion/headerAdopcion');
        $this->load->view('paginaPrincipal/adopcion/formAdopcion', $data);
        $this->load->view('paginaPrincipal/adopcion/footerAdopcion');
    }
    public function registrarSolicitud()
    {
        $idUsuario = $this->session->userdata('idUsuario');
        $ci = $this->input->post('ci');
        $celular = $this->input->post('celular');
        $direccion = $this->input->post('direccion');
        $descripcion = $this->input->post('descripcion');
        $mascotasSeleccionadas = $this->input->post('mascotasSeleccionadas');

        $resultado = $this->adopciones_model->registrar_solicitud($idUsuario, $ci, $celular, $direccion, $descripcion, $mascotasSeleccionadas);

        if ($resultado) {
            redirect('usuario/galeria', 'refresh');
        } else {
            echo "Error al registrar la solicitud";
        }
    }

    public function solicitudes()
    {
        $data['solicitudes'] = $this->adopciones_model->solicitudes_pendientes();

        $this->load->view('inc/headerAdmin');
        $this->load->view('inc/sidebar');
        $this->load->view('inc/listaSolicitudes', $data);
        $this->load->view('inc/footerAdmin');
    }
    public function solicitudesAprobadas()
    {
        $fechaInicio = $this->input->post('fechaInicio') ?: null;
        $fechaFin = $this->input->post('fechaFin') ?: null;

        if (!$fechaInicio && !$fechaFin) {
            $fechaFin = date('Y-m-d');
            $fechaInicio = date('Y-m-d', strtotime('-1 month'));
        }

        $data['solicitudes'] = $this->adopciones_model->solicitudes_aprobadas($fechaInicio, $fechaFin);
        $data['fechaInicio'] = $fechaInicio;
        $data['fechaFin'] = $fechaFin;

        $this->load->view('inc/headerAdmin');
        $this->load->view('inc/sidebar');
        $this->load->view('inc/listaAprobadas', $data);
        $this->load->view('inc/footerAdmin');
    }

    public function aprobarSolicitud()
    {
        $idSolicitud = $this->input->post('idSolicitud');
        $resultado = $this->adopciones_model->aprobar_solicitud($idSolicitud);

        if ($resultado) {
            echo json_encode(['success' => true, 'message' => 'Solicitud aprobada con éxito']);
        } else {
            echo json_encode(['success' => false, 'error' => 'Error al aprobar la solicitud']);
        }
    }

    public function rechazarSolicitud()
    {
        $idSolicitud = $this->input->post('idSolicitud');
        $resultado = $this->adopciones_model->rechazar_solicitud($idSolicitud);

        if ($resultado) {
            echo json_encode(['success' => true, 'message' => 'Solicitud rechazada']);
        } else {
            echo json_encode(['success' => false, 'error' => 'Error al rechazar la solicitud']);
        }
    }
    public function generarHojaCompromiso($idSolicitud)
    {
        $solicitud = $this->adopciones_model->obtenerSolicitudPorId($idSolicitud);

        if (!$solicitud) {
            show_404();
            return;
        }

        require('fpdf/fpdf.php');

        $pdf = new FPDF();
        $pdf->AddPage();

        $logo = $_SERVER['DOCUMENT_ROOT'] . '/SistemaSMDP/Code/extrasPrincipal/images/SMDP1.png';
        if (file_exists($logo)) {
            $pdf->Image($logo, 10, 10, 30);
        } else {
            echo "El archivo no existe: $logo";
            exit();
        }

        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 10, 'Centro de Adopciones "San Martin de Porres"', 0, 1, 'C');
        $pdf->Ln(5);
        $pdf->Cell(0, 10, 'Hoja de Compromiso', 0, 1, 'C');
        $pdf->Ln(10);
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(0, 10, 'Datos del ADOPTADO:', 0, 1);
        $pdf->SetFont('Arial', '', 12);
        $adoptadoData = 'RAZA: ' . $solicitud->raza . ' | ';
        $adoptadoData .= 'SEXO: ' . $solicitud->sexo . ' | ';
        $adoptadoData .= 'EDAD: ' . $this->calcularEdad($solicitud->fechaNacMascota);
        $pdf->MultiCell(0, 10, $adoptadoData);
        $pdf->Ln(5);
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(0, 10, 'Detalle del ADOPTANTE:', 0, 1);
        $pdf->SetFont('Arial', '', 12);
        $adoptanteData = 'Yo: ' . $solicitud->nombres . ' ' . $solicitud->primerApellido;
        $adoptanteData .= ' con CI: ' . $solicitud->ci;
        $adoptanteData .= ' y vivienda en: ' . $solicitud->direccion;
        $adoptanteData .= ' de: ' . $this->calcularEdad($solicitud->fechaNacimiento) . ' años de edad ';
        $adoptadoData .= ' y con numero de celular: ' . $solicitud->celular;
        $pdf->MultiCell(0, 10, utf8_decode($adoptanteData)); 
        $pdf->Ln(5);
        $pdf->SetFont('Arial', '', 12);
        $pdf->MultiCell(0, 10, utf8_decode("ME COMPROMETO A:\n"
            . " - REALIZAR LA ESTERILIZACIÓN DE MANERA OBLIGATORIA.\n"
            . " - INICIAR y/o CONTINUAR con el ciclo de vacunación.\n"
            . " - PROTEGER al adoptado, al uso permanente de la placa de identificación, no criarlo en zonas aisladas (patios, azoteas, terrenos vacíos).\n"
            . " - CUIDAR adecuadamente al adoptado, lo que incluye buena alimentación y la moderación de su conducta.\n"
            . " - ENVIAR periódicamente fotos y/o videos del adoptado.\n"
            . " - NO ABANDONAR, NI MALTRATAR al adoptado."), 0, 'L');
        $pdf->Ln(10);
        $pdf->Cell(0, 10, 'Cochabamba, ' . date('d') . ' de ' . date('F') . ' de ' . date('Y'), 0, 1);
        $pdf->Ln(20);
        $pdf->Cell(0, 10, 'Firma del adoptante', 0, 0);
        $pdf->Cell(0, 10, 'Firma del encargado', 0, 1, 'R');
        $pdf->Ln(10);
        $pdf->MultiCell(0, 10, utf8_decode('La adopción es TU DECISIÓN VOLUNTARIA Y RESPONSABLE. JAMÁS ABANDONES NI MALTRATES la vida que hoy salvas.'), 0, 'C');

        $pdf->Output('D', 'hoja_compromiso.pdf');
        exit();
    }
    private function calcularEdad($fechaNacimiento)
    {
        $edad = date_diff(date_create($fechaNacimiento), date_create('today'))->y; // Calcula la edad
        return $edad;
    }
}
