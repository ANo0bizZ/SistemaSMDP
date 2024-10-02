<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Visitante_model extends CI_Model
{
    public function registrar_solicitud($idUsuario, $ci, $celular, $direccion, $fotoFactura, $descripcion)
	{
		$data = array(
			'idUsuario'=> $idUsuario,
			'ci' => $ci,
			'celular' => $celular,
			'direccion' => $direccion,
			'fotoFactura' => $fotoFactura,
			'descripcion' => $descripcion
		);
        $this->db->insert('solicitudadopcion', $data);
    }
	public function modificarContra($idUsuario, $data)
	{
		$this->db->where('idUsuario', $idUsuario);
		$this->db->update('usuarios', $data);
	}
}