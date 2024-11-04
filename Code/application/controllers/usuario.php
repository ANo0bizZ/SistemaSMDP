<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuario extends CI_Controller
{
	public function principal()
	{
		$this->load->view('paginaPrincipal/headerPrincipal');
		$this->load->view('paginaPrincipal/index');
		$this->load->view('paginaPrincipal/footerPrincipal');
	}
	public function mision()
	{
		$this->load->view('paginaPrincipal/headerPrincipal');
		$this->load->view('paginaPrincipal/mision.php');
		$this->load->view('paginaPrincipal/footerPrincipal');
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
	public function login()
	{
		$this->load->view('paginaPrincipal/login');
	}
	public function crearUsuario()
	{
		$this->load->view('inc/headerAdmin1');
		$this->load->view('inc/sidebar1');
		$this->load->view('inc/formCrearUsuario');
		$this->load->view('inc/footerAdmin1');
	}
	/* public function registrarUsuario() {
		$nombres = strtoupper($this->input->post('nombres'));
		$primerApellido = strtoupper($this->input->post('primerApellido'));
		$segundoApellido = strtoupper($this->input->post('segundoApellido'));
		$fechaNacimiento = strtoupper($this->input->post('fechaNacimiento'));
		$usuario = $this->input->post('usuario');
		$rol = $this->input->post('rol');
		$contra = $this->contraAleatoria();
		$token = bin2hex(random_bytes(16));
	
		$this->load->library('email');
		$this->email->from('arkxcpa14@gmail.com', 'Centro de Adopciones "San Martin de Porres"');
		$this->email->to($usuario);
		$this->email->subject('Bienvenido a Centro de Adopciones "San Martin');
		$linkVerificacion = "http://localhost/SistemaSMDP/Code/index.php/usuario/verificar/" . $token;
		$this->email->message("
		<div style='text-align: center;'>
			<p>Estimado/a {$nombres} {$primerApellido} {$segundoApellido},</p>
			<p>Su cuenta ha sido creada con éxito. A continuación, le proporcionaremos sus detalles de acceso:</p>
			<p>Usuario: {$usuario}</p>
			<p>Por su seguridad se ha generado una contraseña aleatoria, que asegura que nadie más tenga acceso a ella y que podrá cambiar al acceder a su cuenta</p>
			<p>Su contraseña es la siguiente:</p>
			<p>Contraseña: {$contra}</p>
			<p>Haz clic en el siguiente botón para verificar y activar tu cuenta:</p>
			<br>
			<a href='" . $linkVerificacion . "' style='display: inline-block; padding: 10px 20px; font-size: 16px; color: white; background-color: #28a745; text-decoration: none; border-radius: 5px;'>Verificar y Activar Cuenta</a>
			<br><br>
			<p>Gracias por ser parte del Cambio. Adopta Hoy, Ama Para Siempre.</p>
		</div>");
	
		if ($this->email->send()) {
			$this->session->set_userdata('temp_user', [
				'nombres' => $nombres,
				'primerApellido' => $primerApellido,
				'segundoApellido' => $segundoApellido,
				'fechaNacimiento' => $fechaNacimiento,
				'usuario' => $usuario,
				'contra' => $contra,
				'rol' => $rol,
				'token' => $token
			]);
			if ($this->session->userdata('rol') == 'administrador') {
				redirect('usuario/administrador');
			} else {
				redirect('usuario/registroConfirmado');
			}
		} else {
			$this->session->set_flashdata('error', 'Error al enviar correo.');
			redirect('usuario/registro');
		}
	} */
	public function registrarUsuario()
	{
		$nombres = strtoupper($this->input->post('nombres'));
		$primerApellido = strtoupper($this->input->post('primerApellido'));
		$segundoApellido = strtoupper($this->input->post('segundoApellido'));
		$fechaNacimiento = strtoupper($this->input->post('fechaNacimiento'));
		$usuario = $this->input->post('usuario');
		$rol = $this->input->post('rol');
		$contra = $this->contraAleatoria();
		$token = bin2hex(random_bytes(16));

		if ($rol == 2) {
			$solicitudesVoluntarios = $this->session->userdata('solicitudesVoluntarios') ?? [];
			$solicitudesVoluntarios[] = [
				'nombres' => $nombres,
				'primerApellido' => $primerApellido,
				'segundoApellido' => $segundoApellido,
				'fechaNacimiento' => $fechaNacimiento,
				'usuario' => $usuario,
				'rol' => $rol,
				'contra' => $contra,
				'token' => $token
			];
			$this->session->set_userdata('solicitudesVoluntarios', $solicitudesVoluntarios);
			$this->session->set_flashdata('success', 'La solicitud de voluntariado fue enviada. Recibirás una respuesta en tu correo.');
			redirect('usuario/principal');
		} else {
			$this->enviarCorreoBienvenida($nombres, $primerApellido, $segundoApellido, $usuario, $contra, $token);
			redirect('usuario/registroConfirmado');
		}
	}

	private function enviarCorreoBienvenida($nombres, $primerApellido, $segundoApellido, $usuario, $contra, $token)
	{
		$this->load->library('email');
		$this->email->from('arkxcpa14@gmail.com', 'Centro de Adopciones "San Martin de Porres"');
		$this->email->to($usuario);
		$this->email->subject('Bienvenido a Centro de Adopciones "San Martin');
		$linkVerificacion = "http://localhost/SistemaSMDP/Code/index.php/usuario/verificar/" . $token;

		$this->email->message("
		<div style='text-align: center;'>
			<p>Estimado/a {$nombres} {$primerApellido} {$segundoApellido},</p>
			<p>Su cuenta ha sido creada con éxito. A continuación, le proporcionaremos sus detalles de acceso:</p>
			<p>Usuario: {$usuario}</p>
			<p>Por su seguridad se ha generado una contraseña aleatoria, que asegura que nadie más tenga acceso a ella y que podrá cambiar al acceder a su cuenta</p>
			<p>Su contraseña es la siguiente:</p>
			<p>Contraseña: {$contra}</p>
			<p>Haz clic en el siguiente botón para verificar y activar tu cuenta:</p>
			<br>
			<a href='" . $linkVerificacion . "' style='display: inline-block; padding: 10px 20px; font-size: 16px; color: white; background-color: #28a745; text-decoration: none; border-radius: 5px;'>Verificar y Activar Cuenta</a>
			<br><br>
			<p>Gracias por ser parte del Cambio. Adopta Hoy, Ama Para Siempre.</p>
		</div>");

		if ($this->email->send()) {
			$this->session->set_flashdata('success', 'Correo enviado exitosamente.');
		} else {
			$this->session->set_flashdata('error', 'Error al enviar correo.');
		}
	}

	public function registroConfirmado()
	{
		$data['modalMensaje'] = 'Se ha enviado la información de registro a su correo electrónico.';
		$data['mostrarModal'] = true;
		$this->load->view('paginaPrincipal/registroConfirmado', $data);
	}

	public function verificar($token)
	{
		$temp_user = $this->session->userdata('temp_user');

		if ($temp_user && $temp_user['token'] === $token) {
			$this->usuario_model->registrar_usuario(
				$temp_user['nombres'],
				$temp_user['primerApellido'],
				$temp_user['segundoApellido'],
				$temp_user['fechaNacimiento'],
				$temp_user['usuario'],
				$temp_user['contra'],
				$temp_user['rol'],
				null
			);

			$this->session->unset_userdata('temp_user');
			$this->session->set_flashdata('success', 'Tu cuenta ha sido verificada y activada correctamente.');
			redirect('usuario/login');
		} else {
			$this->session->set_flashdata('error', 'Token de verificación inválido o expirado.');
			redirect('usuario/login');
		}
	}

	private function contraAleatoria($longitud = 5)
	{
		$caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$contra = '';
		for ($i = 0; $i < $longitud; $i++) {
			$contra .= $caracteres[rand(0, strlen($caracteres) - 1)];
		}
		return $contra;
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
			$this->load->view('paginaPrincipal/login', $data);
		}
	}
	public function panel()
	{
		if ($this->session->userdata('usuario')) {
			$rol = $this->session->userdata('rol');
			if ($rol === '0') {
				redirect('usuario/administrador', 'refresh');
			} else {
				redirect('usuario/principal', 'refresh');
			}
		} else {
			redirect('usuario/login', 'refresh');
		}
	}
	public function perfil()
	{
		$lista = $this->usuario_model->listausuarios();
		$data['usuarios'] = $lista->result();
		$this->load->view('paginaPrincipal/headerPrincipal');
		$this->load->view('paginaPrincipal/perfil', $data);
		$this->load->view('paginaPrincipal/footerPrincipal');
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
		$this->load->view('inc/headerAdmin1');
		$this->load->view('inc/sidebar1');
		$this->load->view('inc/dashboard');
		$this->load->view('inc/footerAdmin1');
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
		$this->usuario_model->modificarUsuario($idUsuario, $data);
		redirect('usuario/listaUsuarios', 'refresh');
	}
	public function cambiarEstado()
	{
		$idUsuario = $this->input->post('idUsuario');
		echo 'ID de Usuario recibido: ' . $idUsuario;
		$this->usuario_model->actualizarEstado($idUsuario);
		redirect('usuario/listaUsuarios', 'refresh');
	}

	public function modUsuario()
	{
		$idUsuario = $this->input->post('idUsuario');
		$data['usuario'] = $this->usuario_model->recuperarUsuario($idUsuario);
		$this->load->view('inc/headerAdmin');
		$this->load->view('inc/sidebar');
		$this->load->view('inc/editarUsuario', $data);
		$this->load->view('inc/footerAdmin');
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('usuario/principal', 'refresh');
	}
	public function modUsuarioP()
	{
		$idUsuario = $this->input->post('idUsuario');
		$data['usuario'] = $this->usuario_model->recuperarUsuario($idUsuario);
		$this->load->view('paginaPrincipal/headerPrincipal');
		$this->load->view('paginaPrincipal/modUsuario', $data);
		$this->load->view('paginaPrincipal/footerPrincipal');
	}
	public function modificarbdUsuarioP()
	{
		$idUsuario = $this->input->post('idUsuario');
		$data['nombres'] = strtoupper($_POST['nombres']);
		$data['primerApellido'] = strtoupper($_POST['primerApellido']);
		$data['segundoApellido'] = strtoupper($_POST['segundoApellido']);
		$data['usuario'] = $_POST['usuario'];
		$data['rol'] = $_POST['rol'];
		$data['fechaNacimiento'] = strtoupper($_POST['fechaNacimiento']);
		$data['ultimaActualizacion'] = date('Y-m-d H:i:s');

		$result = $this->usuario_model->modificarUsuarioP($idUsuario, $data);

		if ($result) {
			$this->session->set_flashdata('user_update_success', true);
		}

		redirect('adopciones/perfil', 'refresh');
	}
	public function modContra()
	{
		$idUsuario = $this->input->post('idUsuario');
		$contraActual = $this->input->post('contraActual');
		$nuevaContra = $this->input->post('nuevaContra');
		$confirmarContra = $this->input->post('confirmarContra');

		$usuario = $this->usuario_model->obtenerUsuarioP($idUsuario);

		if (!$usuario || md5($contraActual) !== $usuario->contra) {
			$this->session->set_flashdata('current_password_error', true);
			redirect('usuario/perfil');
			return;
		}

		if ($nuevaContra !== $confirmarContra) {
			$this->session->set_flashdata('password_mismatch_error', true);
			redirect('usuario/perfil');
			return;
		}

		$data['contra'] = md5($nuevaContra);
		$data['ultimaActualizacion'] = date('Y-m-d H:i:s');
		$result = $this->usuario_model->modificarUsuarioP($idUsuario, $data);

		if ($result) {
			$this->session->set_flashdata('password_update_success', true);
		} else {
			$this->session->set_flashdata('password_update_error', true);
		}

		redirect('usuario/perfil');
	}
	public function solicitudesVoluntarios()
	{
		$data['solicitudes'] = $this->session->userdata('solicitudesVoluntarios') ?? [];
		$this->load->view('inc/headerAdmin');
		$this->load->view('inc/sidebar');
		$this->load->view('inc/solicitudVoluntarios', $data);
		$this->load->view('inc/footerAdmin');
	}
	public function aceptarSolicitud($indice)
	{
		$solicitudesVoluntarios = $this->session->userdata('solicitudesVoluntarios') ?? [];
		if (isset($solicitudesVoluntarios[$indice])) {
			$usuario = $solicitudesVoluntarios[$indice];
			$this->usuario_model->registrar_usuario(
				$usuario['nombres'],
				$usuario['primerApellido'],
				$usuario['segundoApellido'],
				$usuario['fechaNacimiento'],
				$usuario['usuario'],
				$usuario['contra'],
				$usuario['rol'],
				$usuario[''],

			);
			$this->enviarCorreoBienvenida($usuario['nombres'], $usuario['primerApellido'], $usuario['segundoApellido'], $usuario['usuario'], $usuario['contra'], $usuario['token']);

			unset($solicitudesVoluntarios[$indice]);
			$this->session->set_userdata('solicitudesVoluntarios', $solicitudesVoluntarios);

			$this->session->set_flashdata('success', 'Solicitud aceptada y correo enviado.');
		}
		redirect('usuario/solicitudesVoluntarios');
	}
	public function rechazarSolicitud($indice)
	{
		// Obtener todas las solicitudes de voluntarios desde la sesión
		$solicitudesVoluntarios = $this->session->userdata('solicitudesVoluntarios') ?? [];

		// Eliminar la solicitud de la lista temporal
		if (isset($solicitudesVoluntarios[$indice])) {
			unset($solicitudesVoluntarios[$indice]);
			$this->session->set_userdata('solicitudesVoluntarios', $solicitudesVoluntarios);
			$this->session->set_flashdata('success', 'Solicitud rechazada.');
		}

		redirect('usuario/solicitudesVoluntarios');
	}
}
