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
    // Obtener fechas del formulario
    $fechaInicio = $this->input->post('fechaInicio');
    $fechaFin = $this->input->post('fechaFin');

    // Pasar las fechas al modelo
    $data['solicitudes'] = $this->adopciones_model->solicitudes_aprobadas($fechaInicio, $fechaFin);

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
            $this->session->set_flashdata('mensaje', 'Solicitud aprobada con éxito');
        } else {
            $this->session->set_flashdata('error', 'Error al aprobar la solicitud');
        }

        redirect('adopciones/solicitudes');
    }

    public function rechazarSolicitud()
    {
        $idSolicitud = $this->input->post('idSolicitud');

        $resultado = $this->adopciones_model->rechazar_solicitud($idSolicitud);

        if ($resultado) {
            $this->session->set_flashdata('mensaje', 'Solicitud rechazada');
        } else {
            $this->session->set_flashdata('error', 'Error al rechazar la solicitud');
        }

        redirect('adopciones/solicitudes');
    }
    public function exportar_excel()
{
    $this->load->library('excel'); // Cargar la biblioteca PHPExcel

    $solicitudes = $this->adopciones_model->solicitudes_aprobadas();

    // Crea un nuevo archivo de Excel
    $this->excel->setActiveSheetIndex(0);
    $this->excel->getActiveSheet()->setTitle('Solicitudes Aprobadas');
    
    // Define las cabeceras
    $this->excel->getActiveSheet()->setCellValue('A1', 'No.');
    $this->excel->getActiveSheet()->setCellValue('B1', 'Nombre del Adoptante');
    $this->excel->getActiveSheet()->setCellValue('C1', 'CI');
    $this->excel->getActiveSheet()->setCellValue('D1', 'Celular');
    $this->excel->getActiveSheet()->setCellValue('E1', 'Edad');
    $this->excel->getActiveSheet()->setCellValue('F1', 'Dirección');
    $this->excel->getActiveSheet()->setCellValue('G1', 'Descripción');
    $this->excel->getActiveSheet()->setCellValue('H1', 'Mascotas');

    // Rellena los datos
    $contador = 2;
    foreach ($solicitudes as $solicitud) {
        $this->excel->getActiveSheet()->setCellValue('A' . $contador, $contador - 1);
        $this->excel->getActiveSheet()->setCellValue('B' . $contador, $solicitud->nombres . ' ' . $solicitud->primerApellido);
        $this->excel->getActiveSheet()->setCellValue('C' . $contador, $solicitud->ci);
        $this->excel->getActiveSheet()->setCellValue('D' . $contador, $solicitud->celular);
        $this->excel->getActiveSheet()->setCellValue('E' . $contador, calcular_edad($solicitud->fechaNacimiento));
        $this->excel->getActiveSheet()->setCellValue('F' . $contador, $solicitud->direccion);
        $this->excel->getActiveSheet()->setCellValue('G' . $contador, $solicitud->descripcion);
        $this->excel->getActiveSheet()->setCellValue('H' . $contador, $solicitud->nombresMascotas);
        $contador++;
    }

    // Enviar el archivo Excel al navegador
    $filename = 'solicitudes_aprobadas_' . date('YmdHis') . '.xlsx';
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="' . $filename . '"');
    header('Cache-Control: max-age=0');

    $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');
    $objWriter->save('php://output');
}

}
