<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mascota_model extends CI_Model
{
    public function obtenerEspecies()
    {
        $query = $this->db->get('especies');
        return $query->result();
    }
    public function obtenerRazas()
    {
        $query = $this->db->get('razas');
        return $query->result();
    }

    public function registrar_raza($nombre, $idEspecies, $tamanio, $descripcion, $estado){
        $data = array(
			'nombre' => $nombre,
			'idEspecies'=> $idEspecies,
            'tamanio' => $tamanio,
            'descripcion' => $descripcion,
            'estado' => $estado
		);
		$this->db->insert('razas', $data);
        return $this->db->insert_id();
    } 
    public function registrar_mascota($idEspecies, $idRazas, $nombre, $fechaNacMascota, $fechaIngreso, $sexo, $color, $descripcion, $idCreador)
    {
        $data = array(
            'idEspecies' => $idEspecies,
            'idRazas' => $idRazas,
            'nombre' => $nombre,
            'fechaNacMascota' => $fechaNacMascota,
            'fechaIngreso' => $fechaIngreso,
            'sexo' => $sexo,
            'color' => $color,
            'descripcion' => $descripcion,
            'estado' => 0,
            'idCreador' => $idCreador
        );
        $this->db->insert('mascotas', $data);
        return $this->db->insert_id();
    }
    public function registrar_foto($idMascotas, $urlFoto)
    {
        $data = array(
            'idMascotas' => $idMascotas,
            'urlFoto' => $urlFoto,
            'estado' => 0
        );
        $this->db->insert('fotos', $data);
        return $this->db->insert_id();
    }
    public function recuperarMascota($idMascotas)
    {
        $this->db->select('*');
        $this->db->from('mascotas');
        $this->db->where('idMascotas', $idMascotas);
        return $this->db->get();
    }
    public function listamascotas()
    {
        $this->db->select('*');
        $this->db->from('mascotas');
        return $this->db->get();
    }
    public function modificarMascota($idMascotas, $data)
    {
        $this->db->where('idMascotas', $idMascotas);
        $this->db->update('mascotas', $data);
    }

    
}
