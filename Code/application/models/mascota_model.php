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

    public function registrar_raza($nombre, $idEspecies, $tamanio, $descripcion, $estado)
    {
        $data = array(
            'nombre' => $nombre,
            'idEspecies' => $idEspecies,
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
        $this->db->select('mascotas.*, especies.nombre AS nombreEspecie, razas.nombre AS nombreRaza');
        $this->db->from('mascotas');
        $this->db->join('razas', 'mascotas.idRazas = razas.idRazas');
        $this->db->join('especies', 'razas.idEspecies = especies.idEspecies');
        $this->db->where('mascotas.idMascotas', $idMascotas);
        return $this->db->get()->row();
    }

    public function obtenerMascotas()
    {
        $this->db->select('mascotas.*, especies.nombre AS nombreEspecie, razas.nombre AS nombreRaza');
        $this->db->from('mascotas');
        $this->db->join('razas', 'mascotas.idRazas = razas.idRazas');
        $this->db->join('especies', 'razas.idEspecies = especies.idEspecies');
        return $this->db->get()->result();
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
    public function obtenerMascotasDisponibles($inicio, $por_pagina)
    {
        $this->db->select('mascotas.idMascotas, mascotas.nombre, razas.nombre as raza, IFNULL(GROUP_CONCAT(fotos.urlFoto), "") as fotos');
        $this->db->from('mascotas');
        $this->db->join('razas', 'mascotas.idRazas = razas.idRazas', 'left');
        $this->db->join('fotos', 'mascotas.idMascotas = fotos.idMascotas', 'left');
        $this->db->where('mascotas.estado', 0);
        $this->db->where('fotos.estado', 0);
        $this->db->group_by('mascotas.idMascotas');
        $this->db->limit($por_pagina, $inicio);
        return $this->db->get()->result();
    }

    public function contarMascotasDisponibles()
    {
        $this->db->from('mascotas');
        $this->db->where('estado', 0);
        return $this->db->count_all_results();
    } 
}
