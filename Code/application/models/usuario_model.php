<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuario_model extends CI_Model
{
	public function listaUsuarios() {
		$this->db->select('*');
		$this->db->from('usuarios');
		$this->db->where('estado', 1);
		$this->db->order_by('idUsuario', 'asc');
		return $this->db->get();
	}

	public function registrar_usuario($nombres, $primerApellido, $segundoApellido, $fechaNacimiento, $usuario, $contra, $rol, $idCreador) {
		$data = array(
			'nombres' => $nombres,
			'primerApellido' => $primerApellido,
			'segundoApellido' => $segundoApellido,
			'fechaNacimiento' => $fechaNacimiento,
			'usuario' => $usuario,
			'contra' => md5($contra),
			'rol' => $rol,
			'estado' => 1
		);
		
		$this->db->insert('usuarios', $data);
		$idUsuario = $this->db->insert_id();
		
		if ($idCreador === null) {
			$idCreador = $idUsuario;
		}
		
		$this->db->where('idUsuario', $idUsuario);
		$this->db->update('usuarios', array('idCreador' => $idCreador));
		
		return $idUsuario;
	}
	public function validarusuario($usuario, $contra)
	{
		$this->db->select('idUsuario, usuario, nombres, primerApellido, segundoApellido, rol');
		$this->db->from('usuario');
		$this->db->where('usuario', $usuario);
		$this->db->where('contra', $contra);
		return $this->db->get();
	}

	public function validar_usuario($usuario, $contra)
	{
		$this->db->select('*');
		$this->db->from('usuarios');
		$this->db->where('usuario', $usuario);
		$this->db->where('contra', md5($contra));
		return $this->db->get();
	}

	public function modificarUsuario($idUsuario, $data)
	{
		$this->db->where('idUsuario', $idUsuario);
		$this->db->update('usuarios', $data);
	}
	public function recuperarUsuario($idUsuario) {
		$this->db->select('*');
		$this->db->from('usuarios');
		$this->db->where('idUsuario', $idUsuario);
		$query = $this->db->get();
		
		if ($query->num_rows() > 0) {
			return $query;
		} else {
			return null;
		}
	}
	public function actualizarEstado($idUsuario) {
		$data = array(
			'estado' => 0,
			'ultimaActualizacion' => date('Y-m-d H:i:s')
		);
		$this->db->where('idUsuario', $idUsuario);
		return $this->db->update('usuarios', $data);
	}
	public function modificarUsuarioP($idUsuario, $data)
	{
		$this->db->where('idUsuario', $idUsuario);
		return $this->db->update('usuarios', $data);
	}

	public function obtenerUsuarioP($idUsuario)
	{
		$this->db->where('idUsuario', $idUsuario);
		$query = $this->db->get('usuarios');
		return $query->row();
	}
	public function solicitudesVoluntarios() {
		$this->db->where('rol', '2');
		$query = $this->db->get('usuarios');
		return $query->result();
	}
}
