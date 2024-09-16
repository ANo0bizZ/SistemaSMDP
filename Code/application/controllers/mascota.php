<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mascota extends CI_Controller
{
	public function agregarMascota()
	{
		$data['especies'] = $this->mascota_model->obtenerEspecies();
		$data['razas'] = $this->mascota_model->obtenerRazas();
		$this->load->view('inc/headerAdmin');
		$this->load->view('inc/sidebar');
		$this->load->view('inc/formAgregarMascota', $data);
		$this->load->view('inc/footerAdmin');
	}

	public function registrarRaza()
	{
		$nombre = $this->input->post('nombre');
		$especies_idEspecies = $this->input->post('especies');
		$tamanio = $this->input->post('tamanio');
		$descripcion = $this->input->post('descripcion');
		$estado = $this->input->post('estado');

		$this->load->model('mascota_model');
		$idRaza = $this->mascota_model->registrar_raza($nombre, $especies_idEspecies, $tamanio, $descripcion, $estado);

		if ($idRaza) {
			echo json_encode(['success' => true, 'idRaza' => $idRaza, 'nombre' => $nombre]);
		} else {
			echo json_encode(['success' => false, 'message' => 'No se pudo registrar la raza.']);
		}
	}

	public function registrarMascota()
	{
		$data['especies'] = $this->usuario_model->get_especies_enum();
		$this->load->view('formulario', $data);
		$raza = $this->input->post('raza');
		$nombreMascota = $this->input->post('nombreMascota');
		$fechaNacimiento = $this->input->post('fechaNacimiento');
		$fechaIngreso = $this->input->post('fechaIngreso');
		$sexo = $this->input->post('sexo');
		$color = $this->input->post('color');
		$descripcion = $this->input->post('descripcion');
		$idUsuarioCreador = $this->session->userdata('idUsuario');

		$config['upload_path'] = './uploads/fotos_mascotas/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size'] = 2048;
		$config['encrypt_name'] = TRUE;

		$this->upload->initialize($config);
		if (!$this->upload->do_upload('foto')) {
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('error_page', $error);
		} else {
			$fotoData = $this->upload->data();
			$fotoPath = $fotoData['file_name'];
			$idMascota = $this->mascota_model->registrar_mascota($especie, $raza, $nombreMascota, $fechaNacimiento, $fechaIngreso, $sexo, $color, $descripcion, $idUsuarioCreador);
			$this->mascota_model->guardar_foto_mascota($idMascota, $fotoPath, $idUsuarioCreador);
			redirect('mascota/registro_exitoso');
		}
	}

	public function registro_exitoso()
	{
		$this->load->view('registro_exitoso');
	}

	public function listaMascotas()
	{
		$lista = $this->mascota_model->listamascotas();
		$data['mascotas'] = $lista->result();
		$this->load->view('inc/headerAdmin');
		$this->load->view('inc/sidebar');
		$this->load->view('inc/listaMascotas', $data);
		$this->load->view('inc/footerAdmin');
	}
	public function modMascota()
	{
		$idMascotas = $this->input->post('idMascotas');
		$data['mascotas'] = $this->mascota_model->recuperarMascota($idMascotas);
		$this->load->view('inc/headerAdmin');
		$this->load->view('inc/formModMascota', $data);
		$this->load->view('inc/footerAdmin');
	}
	public function modificarbdMascota()
	{
		$idMascotas = $this->input->post('idMascotas');
		$data['nombre'] = strtoupper($_POST['nombre']);
		$data['color'] = $_POST['color'];
		$data['sexo'] = $_POST['sexo'];
		$data['estado'] = $_POST['estado'];
		$data['fechaNacMascota'] = strtoupper($_POST['fechaNacMascota']);
		$this->mascota_model->modificarMascota($idMascotas, $data);
		redirect('mascota/listaMascotas', 'refresh');
	}
}
