<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Visitante extends CI_Controller
{
    public function registrarSolicitud()
	{
		$idUsuario = $this->session->userdata('idUsuario');
		$ci = $this->input->post('ci');
		$celular = $this->input->post('celular');
		$direccion = $this->input->post('direccion');
		//$fotoFactura = $this->input->post('fotoFactura');
		$descripcion = $this->input->post('descripcion');
		$this->visitante_model->registrar_solicitud($idUsuario, $ci, $celular, $direccion, null, $descripcion);
        redirect('usuario/galeria', 'refresh');
    }
}
