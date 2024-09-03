<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mascota_model extends CI_Model {
    public function listamascotas()
	{
		$this->db->select('*');
		$this->db->from('mascotas');
		return $this->db->get();  
	}
    public function recuperarMascota($idMascotas)
	{
		$this->db->select('*');
		$this->db->from('mascotas');
		$this->db->where('idMascotas',$idMascotas);
		return $this->db->get();
	}
    public function modificarMascota($idMascotas,$data)
	{
		$this->db->where('idMascotas',$idMascotas);
		$this->db->update('umascotas',$data);
	}
}