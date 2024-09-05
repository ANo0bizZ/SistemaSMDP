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

	public function registrarUsuario()
	{
		/* $data['nombres'] = strtoupper($_POST['nombres']);
		$data['primerApellido'] = strtoupper($_POST['primerApellido']);
		$data['segundoApellido'] = strtoupper($_POST['segundoApellido']);
		$data['fechaNacimiento'] = strtoupper($_POST['fechaNacimiento']);
		$data['usuario'] = $_POST['usuario'];
		$data['rol'] = $_POST['rol'];
		$password = $_POST['contra'];
		$data['estado'] = 1;

		$this->load->library('email');
		$this->email->from('arkxcpa14@gmail.com', 'Centro de Adopciones "San Martin de Porres"');
		$this->email->to($data['usuario']);
		$this->email->subject('Bienvenido a Centro de Adopciones "San Martin');
		$resetLink = site_url("usuario/login");

		echo $resetLink; 
		$this->email->message("Estimado/a {$data['nombres']} {$data['primerApellido']} {$data['segundoApellido']},\n\n" .
			"Su cuenta ha sido creada con éxito. A continuación, le proporcionaremos sus detalles de acceso:\n\n" .
			"Usuario: {$data['usuario']}\n" .
			"Contraseña: $password\n\n" .
			"Haz clic en el siguiente enlace para acceder a tu cuenta: <a href='" . $resetLink . "'>Acceder</a>\n\n" .
			"Gracias por ser parte del Cambio. Adopta Hoy, Ama Para Siempre.");

		if ($this->email->send()) {
			$this->session->set_flashdata('success', 'Usuario registrado y correo enviado correctamente.');
		} else {
			$this->session->set_flashdata('error', 'Error al enviar correo.');
		}
		$this->usuario_model->agregarusuario($data); */

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
	public function registrarUsuarioA()
	{
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

	public function validarLogin()
	{
		$usuario = $_POST['usuario'];
		$contra = $_POST['contra'];

		$consulta = $this->usuario_model->validar_usuario($usuario, $contra);
		if ($consulta->num_rows() > 0) {
			foreach ($consulta->result() as $row) {
				$this->session->set_userdata('idUsuario', $row->idUsuario);
				$this->session->set_userdata('nombres', $row->nombres);
				$this->session->set_userdata('primerApellido', $row->primerApellido);
				$this->session->set_userdata('segundoApellido', $row->segundoApellido);
				$this->session->set_userdata('usuario', $row->usuario);
				$this->session->set_userdata('rol', $row->rol);
				redirect('usuario/panel', 'refresh');
			}
		} else {
			$data['error'] = 'El usuario o contraseña ingresados no son correctos.';
			$this->load->view('login', $data);
		}
	}

	public function panel()
	{
		if ($this->session->userdata('usuario')) {
			$rol = $this->session->userdata('rol');
			if ($rol === '0') {
				redirect('usuario/administrador', 'refresh');
			} else {
				redirect('usuario/visitantes', 'refresh');
			}
		} else {
			redirect('usuario/login', 'refresh');
		}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('usuario/principal', 'refresh');
	}
}
