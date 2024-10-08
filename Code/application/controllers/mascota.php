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
		$nombre = strtoupper($this->input->post('nombre'));
		$fechaNacMascota = $this->input->post('fechaNacMascota');
		$fechaIngreso = $this->input->post('fechaIngreso');
		$sexo = strtoupper($this->input->post('sexo'));
		$color = strtoupper($this->input->post('color'));
		$descripcion = $this->input->post('descripcion');

		$this->load->model('mascota_model');
		$idCreador = $this->session->userdata('idUsuario');
		$idMascota = $this->mascota_model->registrar_mascota($idEspecies, $idRazas, $nombre, $fechaNacMascota, $fechaIngreso, $sexo, $color, $descripcion, $idCreador);

		$fotos_registradas = 0;

		if ($idMascota) {
			$this->load->library('upload');
			$files = $_FILES['foto'];
			$file_count = count($files['name']);

			for ($i = 0; $i < $file_count; $i++) {
				if (!empty($files['name'][$i])) {
					$_FILES['userfile']['name'] = $files['name'][$i];
					$_FILES['userfile']['type'] = $files['type'][$i];
					$_FILES['userfile']['tmp_name'] = $files['tmp_name'][$i];
					$_FILES['userfile']['error'] = $files['error'][$i];
					$_FILES['userfile']['size'] = $files['size'][$i];

					$config['upload_path'] = './uploads/';
					$config['allowed_types'] = 'gif|jpg|jpeg|png';
					$config['max_size'] = 2048;
					$config['file_name'] = 'mascota_' . $idMascota . '_' . time() . '_' . $i;

					$this->upload->initialize($config);

					if ($this->upload->do_upload('userfile')) {
						$upload_data = $this->upload->data();
						$urlFoto = 'uploads/' . $upload_data['file_name'];
						$this->mascota_model->registrar_foto($idMascota, $urlFoto);
						$fotos_registradas++;
					} else {
						$error = $this->upload->display_errors();
						log_message('error', 'Error al subir foto: ' . $error);
					}
				}
			}
		}
		echo json_encode([
			'success' => true,
			'message' => 'Mascota registrada con éxito. Fotos registradas: ' . $fotos_registradas
		]);
	}

	public function listarMascotas()
	{
		$data['mascotas'] = $this->mascota_model->obtenerMascotas();
		$this->load->view('inc/headerAdmin');
		$this->load->view('inc/sidebar');
		$this->load->view('inc/listaMascotas', $data);
		$this->load->view('inc/footerAdmin');
	}

	public function modMascota()
	{
		$idMascotas = $this->input->post('idMascotas');
		$data['mascota'] = $this->mascota_model->recuperarMascota($idMascotas);
		$this->load->view('inc/headerAdmin');
		$this->load->view('inc/sidebar');
		$this->load->view('inc/formModMascota', $data);
		$this->load->view('inc/footerAdmin');
	}
	public function modificarbdMascota()
	{
		$idMascotas = $this->input->post('idMascotas');
		$data['nombre'] = strtoupper($_POST['nombre']);
		$data['color'] = strtoupper($_POST['color']);
		$data['sexo'] = strtoupper($_POST['sexo']);
		$data['estado'] = $_POST['estado'];
		$data['fechaNacMascota'] = strtoupper($_POST['fechaNacMascota']);
		$this->mascota_model->modificarMascota($idMascotas, $data);
		redirect('mascota/listaMascotas', 'refresh');
	}
}
