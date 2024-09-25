<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuario extends CI_Controller
{
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
	public function visitantes()
	{
		$this->load->view('paginaPrincipal/headerPrincipal');
		$this->load->view('paginaPrincipal/index.php');
		$this->load->view('paginaPrincipal/footerPrincipal');
	}
	public function blog()
	{
		$this->load->view('paginaPrincipal/eventos.php');
	}

	public function galeria($pagina = 1)
	{
		$por_pagina = 9;
		$inicio = ($pagina - 1) * $por_pagina;

		$data['mascotas'] = $this->mascota_model->obtenerMascotasDisponibles($inicio, $por_pagina);
		$total_mascotas = $this->mascota_model->contarMascotasDisponibles();

		$data['total_paginas'] = ceil($total_mascotas / $por_pagina);
		$data['pagina_actual'] = $pagina;

		$this->load->view('paginaPrincipal/headerPrincipal');
		$this->load->view('paginaPrincipal/galeria', $data);
		$this->load->view('paginaPrincipal/footerPrincipal');
	} 
	public function solicitudAdopcion(){
		$this->load->view('paginaPrincipal/adopcion/headerAdopcion');
		$this->load->view('paginaPrincipal/adopcion/formAdopcion');
		$this->load->view('paginaPrincipal/adopcion/footerAdopcion');
	}
	public function eventos()
	{
		$this->load->view('paginaPrincipal/headerPrincipal');
		$this->load->view('paginaPrincipal/eventos.php');
		$this->load->view('paginaPrincipal/footerPrincipal');
	}
	public function contactos()
	{
		$this->load->view('paginaPrincipal/headerPrincipal');
		$this->load->view('paginaPrincipal/contactos.php');
		$this->load->view('paginaPrincipal/footerPrincipal');
	}
	public function mision()
	{
		$this->load->view('paginaPrincipal/headerPrincipal');
		$this->load->view('paginaPrincipal/mision.php');
		$this->load->view('paginaPrincipal/footerPrincipal');
	}

	public function listaUsuarios()
	{
		$lista = $this->usuario_model->listausuarios();
		$data['usuarios'] = $lista->result();
		$this->load->view('inc/headerAdmin');
		$this->load->view('inc/sidebar');
		$this->load->view('inc/listaUsuarios', $data);
		$this->load->view('inc/footerAdmin');
	}
	public function login()
	{
		$this->load->view('login');
	}
	public function registrarUsuario()
	{
		$nombres = $this->input->post('nombres');
		$primerApellido = $this->input->post('primerApellido');
		$segundoApellido = $this->input->post('segundoApellido');
		$fechaNacimiento = $this->input->post('fechaNacimiento');
		$usuario = $this->input->post('usuario');
		$contra = $this->input->post('contra');
		$rol = $this->input->post('rol');
		$this->usuario_model->registrar_usuario($nombres, $primerApellido, $segundoApellido, $fechaNacimiento, $usuario, $contra, $rol, null);

		$this->load->library('email');
		$this->email->from('arkxcpa14@gmail.com', 'Centro de Adopciones "San Martin de Porres"');
		$this->email->to($usuario);
		$this->email->subject('Bienvenido a Centro de Adopciones "San Martin');
		$resetLink = "http://localhost/SistemaSMDP/Code/index.php/usuario/login";
		$this->email->message("
    <div style='text-align: center;'>
        <p>Estimado/a {$nombres} {$primerApellido} {$segundoApellido},</p>
        <p>Su cuenta ha sido creada con éxito. A continuación, le proporcionaremos sus detalles de acceso:</p>
        <p>Usuario: {$usuario}</p>
        <p>Contraseña: {$contra}</p>
        <br>
        <p>Haz clic en el siguiente botón para acceder a tu cuenta:</p>
        <br>
        <a href='" . $resetLink . "' style='display: inline-block; padding: 10px 20px; font-size: 16px; color: white; background-color: #28a745; text-decoration: none; border-radius: 5px;'>Acceder</a>
        <br><br>
        <p>Gracias por ser parte del Cambio. Adopta Hoy, Ama Para Siempre.</p>
    </div>");

		if ($this->email->send()) {
			$this->session->set_flashdata('success', 'Usuario registrado y correo enviado correctamente.');
		} else {
			$this->session->set_flashdata('error', 'Error al enviar correo.');
		}
		$this->usuario_model->registrar_usuario($nombres, $primerApellido, $segundoApellido, $fechaNacimiento, $ci, $usuario, $contra, $rol, null);
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
	public function administrador()
	{
		$this->load->view('inc/headerAdmin.php');
		$this->load->view('inc/sidebar');
		$this->load->view('inc/mainAdmin.php');
		$this->load->view('inc/footerAdmin.php');
	}
	public function dashboard()
	{
		$this->load->view('inc/headerAdmin');
		$this->load->view('inc/sidebar');
		$this->load->view('inc/dashboard');
		$this->load->view('inc/footerAdmin');
	}
	
	public function registrarUsuarioA()
	{
		$nombres = $this->input->post('nombres');
		$primerApellido = $this->input->post('primerApellido');
		$segundoApellido = $this->input->post('segundoApellido');
		$fechaNacimiento = $this->input->post('fechaNacimiento');
		$ci = $this->input->post('ci');
		$usuario = $this->input->post('usuario');
		$contra = md5($this->input->post('contra'));
		$rol = $this->input->post('rol');

		$this->load->model('usuario_model');
		$idCreador = $this->session->userdata('idUsuario');
		$this->usuario_model->registrar_usuario($nombres, $primerApellido, $segundoApellido, $fechaNacimiento, $ci, $usuario, $contra, $rol, $idCreador);

		redirect('usuario/administrador');
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
	public function modUsuario()
	{
		$idUsuario = $this->input->post('idUsuario');
		$data['usuario'] = $this->usuario_model->recuperarUsuario($idUsuario);
		$this->load->view('inc/headerAdmin');
		$this->load->view('inc/sidebar');
		$this->load->view('inc/formModificar', $data);
		$this->load->view('inc/footerAdmin');
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('usuario/principal', 'refresh');
	}
}
