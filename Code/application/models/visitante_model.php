<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Visitante_model extends CI_Model
{
    public function registrar_solicitud($ci, $celular, $direccion, $fotoFactura, $descripcion)
	{
		$data = array(
			'ci' => $ci,
			'celular' => $celular,
			'direccion' => $direccion,
			'fotoFactura' => $fotoFactura,
			'descripcion' => $descripcion
		);
        $this->db->insert('solicitudadopcion', $data);
    }
}