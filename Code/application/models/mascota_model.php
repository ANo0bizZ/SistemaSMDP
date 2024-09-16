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

    public function registrar_raza($nombre, $especies_idEspecies, $tamanio, $descripcion, $estado){
        $data = array(
			'nombre' => $nombre,
			'especies_idEspecies'=> $especies_idEspecies,
            'tamanio' => $tamanio,
            'descripcion' => $descripcion,
            'estado' => $estado
		);
		$this->db->insert('razas', $data);
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
        $this->db->update('umascotas', $data);
    }

    public function registrar_mascota($especie, $raza, $nombreMascota, $fechaNacimiento, $fechaIngreso, $sexo, $color, $descripcion, $idUsuarioCreador)
    {
        $data = array(
            'idEspecie' => $especie,
            'raza' => $raza,
            'nombreMascota' => $nombreMascota,
            'fechaNacimiento' => $fechaNacimiento,
            'fechaIngreso' => $fechaIngreso,
            'sexo' => $sexo,
            'color' => $color,
            'descripcion' => $descripcion,
            'estado' => 1,
            'fechaCreacion' => date('Y-m-d H:i:s'),
            'idUsuarioCreador' => $idUsuarioCreador
        );
        $this->db->insert('mascotas', $data);
        return $this->db->insert_id();
    }

    public function guardar_foto_mascota($idMascota, $fotoPath, $idUsuarioCreador)
    {
        $data = array(
            'idMascota' => $idMascota,
            'rutaFoto' => $fotoPath,
            'estado' => 1,
            'fechaCreacion' => date('Y-m-d H:i:s'),
            'idUsuarioCreador' => $idUsuarioCreador
        );
        $this->db->insert('fotos', $data);
    }
}
