<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Visitante extends CI_Controller
{
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
		$this->usuario_model->modificarUsuario($idUsuario, $data);
		redirect('visitante/perfil', 'refresh');
	}
	public function validarContra(){
		$usuario = $_POST['usuario'];
		$contra = $_POST['contra'];
		$this->usuario_model->validar_usuario($usuario, $contra);
	}
	public function modContra(){
		$idUsuario = $this->input->post('idUsuario');
		$data['contra'] = $_POST['nuevaContra'];
		$this->usuario_model->modificarContra($idUsuario, $data);
	}
}
