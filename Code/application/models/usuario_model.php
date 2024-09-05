<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {
	public function listausuarios()
	{
		$this->db->select('*');
		$this->db->from('usuarios');
		return $this->db->get();  
	}

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
		$this->db->select('*');
		$this->db->from('usuarios');
		$this->db->where('usuario', $usuario);
		$this->db->where('contra', md5($contra));
		return $this->db->get();
	}
	
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
