<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {
	public function listausuarios()
	{
		$this->db->select('*');
		$this->db->from('usuarios');
		return $this->db->get();  //Devuelve el resultado
	}

   /*  public function getCitas()
    {
		$this->db->select('agendarcita.idagendarcita AS idAgendarCita, agendarcita.fechaAtencion, agendarcita.horaAtencion, agendarcita.estadoCita, usuario.nombre AS nombreUsuario, usuario.apellidos AS apellidosUsuario, servicios.nombreServicio AS nombreServicio');
		$this->db->from('agendarcita');
		$this->db->join('usuario', 'agendarcita.usuario_idusuario = usuario.idusuario');
		$this->db->join('servicios', 'agendarcita.servicios_idservicios = servicios.idservicios');
		$this->db->where('agendarcita.estadoCita', 1);
		$query = $this->db->get();
		return $query->result();
    } */
	/* public function agendar_cita($data) {
        $this->db->insert('agendarcita', $data);
    } */
	public function registrar_usuario($nombres, $primerApellido, $segundoApellido, $fechaNacimiento, $usuario, $contra, $rol) {
		$data = array(
			'nombres' => $nombres,
			'primerApellido' => $primerApellido,
			'segundoApellido' => $segundoApellido,
			'fechaNacimiento' => $fechaNacimiento,
			'usuario' => $usuario,
			'contra' => $contra,
			'rol' => $rol
		);
		$this->db->insert('usuarios', $data);
	}
	

    public function validarusuario($usuario, $contra) {
        $this->db->select('idUsuario, usuario, nombres, primerApellido, segundoApellido, rol');
        $this->db->from('usuario');
        $this->db->where('usuario', $usuario);
        $this->db->where('contra', $contra);
        return $this->db->get();
    }

	public function validar_usuario($usuario, $contra) {
		$this->db->select('idUsuario, nombres, primerApellido, segundoApellido, usuario, rol');
		$this->db->from('usuarios');
		$this->db->where('usuario', $usuario);
		$this->db->where('contra', md5($contra));  // Usa md5 para comparar la contraseña
		return $this->db->get();
	}
	
	

	/* public function modificarcita($idagendarcita,$data)
	{
		$this->db->where('idagendarcita',$idagendarcita);
		$this->db->update('agendarcita',$data);
	} */
	/* public function recuperarcita($idagendarcita)
	{
		$this->db->select('agendarcita.*, usuario.nombre AS nombreUsuario, usuario.apellidos AS apellidosUsuario');
		$this->db->from('agendarcita');
		$this->db->join('usuario', 'agendarcita.usuario_idusuario = usuario.idusuario');
		$this->db->where('idagendarcita', $idagendarcita);
		return $this->db->get();
	} */
	/* public function listaAtendidos()
	{
		$this->db->select('agendarcita.idagendarcita AS idAgendarCita, agendarcita.fechaAtencion, agendarcita.horaAtencion, agendarcita.estadoCita, usuario.nombre AS nombreUsuario, usuario.apellidos AS apellidosUsuario, servicios.nombreServicio AS nombreServicio');
		$this->db->from('agendarcita');
		$this->db->join('usuario', 'agendarcita.usuario_idusuario = usuario.idusuario');
		$this->db->join('servicios', 'agendarcita.servicios_idservicios = servicios.idservicios');
		$this->db->where('agendarcita.estadoCita', 0);
		return $this->db->get();
	} */
	/* public function modificarEstadoCita($idagendarcita,$data)
	{
		$this->db->where('idagendarcita',$idagendarcita);
		$this->db->update('agendarcita',$data);
	} */

	public function modificarUsuario($idUsuario,$data)
	{
		$this->db->where('idUsuario',$idUsuario);
		$this->db->update('usuarios',$data);
	}
	public function recuperarUsuario($idUsuario)
	{
		$this->db->select('*');
		$this->db->from('usuarios');
		$this->db->where('idUsuario',$idUsuario);
		return $this->db->get();
	}
	
	public function actualizarEstado($idUsuario, $data) {
		$this->db->where('idUsuario', $idUsuario);
		$this->db->update('usuarios', $data);
	  }
	  
}
