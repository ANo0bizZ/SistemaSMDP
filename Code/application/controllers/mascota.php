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
		$idEspecies = $this->input->post('especies');
		$tamanio = $this->input->post('tamanio');
		$descripcion = $this->input->post('descripcion');
		$estado = $this->input->post('estado');

		$this->load->model('mascota_model');
		$idRaza = $this->mascota_model->registrar_raza($nombre, $idEspecies, $tamanio, $descripcion, $estado);

		if ($idRaza) {
			echo json_encode(['success' => true, 'idRaza' => $idRaza, 'nombre' => $nombre]);
		} else {
			echo json_encode(['success' => false, 'message' => 'No se pudo registrar la raza.']);
		}
	} 

	public function registrarMascota()
	{
		$idEspecies = $this->input->post('especies');
		$idRazas = $this->input->post('razas');
		$nombre = $this->input->post('nombre');
		$fechaNacMascota = $this->input->post('fechaNacMascota');
		$fechaIngreso = $this->input->post('fechaIngreso');
		$sexo = $this->input->post('sexo');
		$color = $this->input->post('color');
		$descripcion = $this->input->post('descripcion');
		$idCreador = 1;
		$this->load->model('mascota_model');
		$this->mascota_model->registrar_mascota($idEspecies, $idRazas, $nombre, $fechaNacMascota, $fechaIngreso, $sexo, $color, $descripcion, $idCreador);
		redirect('mascota/agregarMascota');
/*
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
			redirect('mascota/registrarMascota');
		}
	} */
	/* public function registrarMascota()
	{
		$data = array(
			'nombre' => $this->input->post('nombreMascota'),
			'especie' => $this->input->post('especies'),
			'raza' => $this->input->post('razas'),
			'fechaNacMascota' => $this->input->post('fechaNacimiento'),
			'fechaIngreso' => $this->input->post('fechaIngreso'),
			'sexo' => $this->input->post('sexo'),
			'color' => $this->input->post('color'),
			'descripcion' => $this->input->post('descripcion')
		);

		if ($this->mascota_model->registrarMascota($data)) {
			echo json_encode(['success' => true]);
		} else {
			echo json_encode(['success' => false, 'message' => 'Error al registrar la mascota']);
		}*/
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
