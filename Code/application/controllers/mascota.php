<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mascota extends CI_Controller
{
    /* public function __construct() {
        parent::__construct();
        $this->load->model('mascota_model');
    }
 */
    public function listaMascotas()
    {
        $lista = $this->mascota_model->listamascotas();
        $data['mascotas'] = $lista->result();
        $this->load->view('inc/headerAdmin');
        $this->load->view('inc/sidebar');
        $this->load->view('inc/listaMascotas', $data);
        $this->load->view('inc/footerAdmin');
    } 
    public function modMascota()
	{
		$idMascotas = $this->input->post('idMascotas');
		$data['mascotas'] = $this->mascota_model->recuperarMascota($idMascotas);
		$this->load->view('inc/headerAdmin');
		$this->load->view('formModMascota', $data);
		$this->load->view('inc/footerAdmin');
	}
	public function insertarMascota()
	{
		$this->load->view('inc/headerAdmin');
		$this->load->view('inc/sidebar');
		$this->load->view('inc/formInsertarMascota');
		$this->load->view('inc/footerAdmin');
	}
    public function modificarbdMascota()
	{
		$idMascotas = $this->input->post('idMascotas');
		$data['nombre'] = strtoupper($_POST['nombre']);
		$data['color'] = $_POST['color'];
		$data['sexo'] = $_POST['sexo'];
		$data['estado'] = $_POST['estado'];
		$data['fechaNacMascota'] = strtoupper($_POST['fechaNacMascota']);
		$this->mascota_model->modificarMascota($idMascotas, $data);
		redirect('mascota/listaMascotas', 'refresh');
	}

}