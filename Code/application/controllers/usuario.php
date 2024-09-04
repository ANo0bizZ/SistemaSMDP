<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuario extends CI_Controller
{
	public function listaUsuarios()
	{
		$lista = $this->usuario_model->listausuarios();
		$data['usuarios'] = $lista->result();
		$this->load->view('inc/headerAdmin');
		$this->load->view('inc/sidebar');
		$this->load->view('inc/listaUsuarios', $data);
		$this->load->view('inc/footerAdmin');
	}

	public function dashboard()
	{
		$this->load->view('inc/headerAdmin');
		$this->load->view('inc/sidebar');
		$this->load->view('inc/dashboard');
		$this->load->view('inc/footerAdmin');
	}
	public function modUsuario()
	{
		$idUsuario = $this->input->post('idUsuario');
		$data['usuario'] = $this->usuario_model->recuperarUsuario($idUsuario);
		$this->load->view('inc/headerAdmin');
		$this->load->view('formModificar', $data);
		$this->load->view('inc/footerAdmin');
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
		redirect('usuario/listaUsuarios', 'refresh');
	}
	

	public function cambiarEstado()
	{
		$idUsuario = $this->input->post('idUsuario');
		$estado = $this->input->post('estado'); 
		$data = array(
			'estado' => $estado
		);
		$this->usuario_model->actualizarEstado($idUsuario, $data);
		redirect('usuario/listaUsuarios', 'refresh');
	}

	public function crearUsuario()
	{
		$this->load->view('inc/headerAdmin');
		$this->load->view('inc/sidebar');
		$this->load->view('inc/formCrearUsuario');
		$this->load->view('inc/footerAdmin');
	}
	public function principal()
	{
		$this->load->view('paginaPrincipal/headerPrincipal');
		$this->load->view('paginaPrincipal/index');
		$this->load->view('paginaPrincipal/footerPrincipal');

	}
	public function blog()
	{
		$this->load->view('paginaPrincipal/eventos.php');
	}

	public function galeria()
	{
		$this->load->view('paginaPrincipal/galeria.php');
	}

	public function administrador()
	{
		$this->load->view('inc/headerAdmin.php');
		$this->load->view('inc/sidebar');
		$this->load->view('inc/mainAdmin.php');
		$this->load->view('inc/footerAdmin.php');
	}
	public function visitantes()
	{
		$this->load->view('paginaPrincipal/headerPrincipal');
		$this->load->view('paginaPrincipal/index.php');
		$this->load->view('paginaPrincipal/footerPrincipal');
	}
	public function login()
	{
		$this->load->view('login');
	}
	
	public function agregar()
	{
		//$this->load->view('inc/head');
		//$this->load->view('inc/menu');
		$this->load->view('formulario');
		//$this->load->view('inc/footer');
		//$this->load->view('inc/pie');	
	}
	
	public function registrarUsuario() {
		$nombres = $this->input->post('nombres');
		$primerApellido = $this->input->post('primerApellido');
		$segundoApellido = $this->input->post('segundoApellido');
		$fechaNacimiento = $this->input->post('fechaNacimiento');
		$usuario = $this->input->post('usuario');
		$contra = md5($this->input->post('contra'));
		$rol = $this->input->post('rol');

		$this->load->model('usuario_model');
		$this->usuario_model->registrar_usuario($nombres, $primerApellido, $segundoApellido, $fechaNacimiento, $usuario, $contra, $rol);

		redirect('usuario/principal');
	}
	public function registrarUsuarioA() {
		$nombres = $this->input->post('nombres');
		$primerApellido = $this->input->post('primerApellido');
		$segundoApellido = $this->input->post('segundoApellido');
		$fechaNacimiento = $this->input->post('fechaNacimiento');
		$usuario = $this->input->post('usuario');
		$contra = md5($this->input->post('contra'));
		$rol = $this->input->post('rol');

		$this->load->model('usuario_model');
		$this->usuario_model->registrar_usuario($nombres, $primerApellido, $segundoApellido, $fechaNacimiento, $usuario, $contra, $rol);

		redirect('usuario/administrador');
	}
	

	public function validarLogin() {
		$usuario = $this->input->post('usuario');
		$contra = $this->input->post('contra');
	
		$this->load->model('usuario_model');
		$result = $this->usuario_model->validar_usuario($usuario, $contra);
		if ($result->num_rows() > 0) {
			$row = $result->row();
			$session_data = array(
				'var_idUsuario' => $row->idUsuario,
				'var_nombres' => $row->nombres,
				'var_primerApellido' => $row->primerApellido,
				'var_segundoApellido' => $row->segundoApellido,
				'var_rol' => $row->rol
			);
			$this->session->set_userdata($session_data);
	
			if ($row->rol === '0') {
				redirect('usuario/administrador');
			} else {
				redirect('usuario/visitantes');
			}
		} else {
			$data['error'] = 'El usuario o contraseña ingresados no son correctos.';
			$this->load->view('login', $data);
		}
	}
	
	public function validarUsuario() {
		$usuario = $_POST['usuario'];
		$contra = sha1($_POST['contra']); // Hasheamos la contraseña
	
		// Consultamos el modelo para validar el usuario
		$consulta = $this->usuario_model->validar($usuario, $contra);
		if ($consulta->num_rows() > 0) {
			// Usuario válido, creamos la sesión
			foreach ($consulta->result() as $row) {
				$this->session->set_userdata('idusuario', $row->idusuario);
				$this->session->set_userdata('usuario', $row->usuario);
				$this->session->set_userdata('nombre', $row->nombre);
				$this->session->set_userdata('primerApellido', $row->primerApellido);
				$this->session->set_userdata('segundoApellido', $row->segundoApellido);
				$this->session->set_userdata('rol', $row->rol);
	
				// Redirigimos según el rol del usuario
				if ($row->rol === 'administrador') {
					redirect('usuario/administrador', 'refresh');
				} elseif ($row->rol === 'voluntario') {
					redirect('usuario/voluntario', 'refresh');
				} else {
					redirect('usuario/adoptante', 'refresh');
				}
			}
		} else {
			// Acceso incorrecto, volvemos al login con mensaje de error
			$data['error'] = 'El usuario o contraseña ingresados no son correctos.';
			$this->load->view('login', $data);
		}
	}
	
	public function panel() {
		if ($this->session->userdata('usuario')) {
			$rol = $this->session->userdata('rol');
			if ($rol === 'administrador') {
				redirect('usuario/administrador', 'refresh');
			} elseif ($rol === 'voluntario') {
				redirect('usuario/voluntario', 'refresh');
			} else {
				redirect('usuario/adoptante', 'refresh');
			}
		} else {
			// Si no hay sesión iniciada, redirigir al login
			redirect('usuario/login', 'refresh');
		}
	}
	
	
} 
