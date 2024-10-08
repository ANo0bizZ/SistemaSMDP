<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Visitante extends CI_Controller
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
		//$fotoFactura = $this->input->post('fotoFactura');
		$descripcion = $this->input->post('descripcion');
		$this->visitante_model->registrar_solicitud($idUsuario, $ci, $celular, $direccion, null, $descripcion);
		redirect('usuario/galeria', 'refresh');
	}

	public function perfil()
	{
		$lista = $this->usuario_model->listausuarios();
		$data['usuarios'] = $lista->result();
		$this->load->view('paginaPrincipal/headerPrincipal');
		$this->load->view('paginaPrincipal/perfil', $data);
		$this->load->view('paginaPrincipal/footerPrincipal');
	}
	public function modUsuario()
	{
		$idUsuario = $this->input->post('idUsuario');
		$data['usuario'] = $this->usuario_model->recuperarUsuario($idUsuario);
		$this->load->view('paginaPrincipal/headerPrincipal');
		$this->load->view('paginaPrincipal/modUsuario', $data);
		$this->load->view('paginaPrincipal/footerPrincipal');
	}
	public function modificarbdUsuario()
	{
		$idUsuario = $this->input->post('idUsuario');
		$data['nombres'] = strtoupper($_POST['nombres']);
		$data['primerApellido'] = strtoupper($_POST['primerApellido']);
		$data['segundoApellido'] = strtoupper($_POST['segundoApellido']);
		$data['usuario'] = $_POST['usuario'];
		$data['rol'] = $_POST['rol'];
		$data['fechaNacimiento'] = strtoupper($_POST['fechaNacimiento']);
		$data['ultimaActualizacion'] = date('Y-m-d H:i:s');

		$result = $this->usuario_model->modificarUsuario($idUsuario, $data);

		if ($result) {
			$this->session->set_flashdata('user_update_success', true);
		}

		redirect('visitante/perfil', 'refresh');
	}

	public function modContra()
	{
		$idUsuario = $this->input->post('idUsuario');
		$contraActual = $this->input->post('contraActual');
		$nuevaContra = $this->input->post('nuevaContra');
		$confirmarContra = $this->input->post('confirmarContra');

		$usuario = $this->visitante_model->obtenerUsuario($idUsuario);

		if (!$usuario || md5($contraActual) !== $usuario->contra) {
			$this->session->set_flashdata('current_password_error', true);
			redirect('visitante/perfil');
			return;
		}

		if ($nuevaContra !== $confirmarContra) {
			$this->session->set_flashdata('password_mismatch_error', true);
			redirect('visitante/perfil');
			return;
		}

		$data['contra'] = md5($nuevaContra);
		$data['ultimaActualizacion'] = date('Y-m-d H:i:s');
		$result = $this->visitante_model->modificarUsuario($idUsuario, $data);

		if ($result) {
			$this->session->set_flashdata('password_update_success', true);
		} else {
			$this->session->set_flashdata('password_update_error', true);
		}

		redirect('visitante/perfil');
	}
}
