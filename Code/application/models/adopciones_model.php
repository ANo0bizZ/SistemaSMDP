<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Adopciones_model extends CI_Model
{
    public function registrar_solicitud($idUsuario, $ci, $celular, $direccion, $descripcion, $mascotasSeleccionadas)
    {
        $data = array(
            'idUsuario' => $idUsuario,
            'ci' => $ci,
            'celular' => $celular,
            'direccion' => $direccion,
            'descripcion' => $descripcion,
            'estado' => 0
        );

        $this->db->trans_start();
        $this->db->insert('solicitudadopcion', $data);
        $idSolicitud = $this->db->insert_id();

        foreach ($mascotasSeleccionadas as $idMascota) {
            $this->db->insert('detalleadopcion', array(
                'idMascotas' => $idMascota,
                'idSolicitud' => $idSolicitud,
                'descripcion' => 'Pendiente de aprobación'
            ));
        }

        $this->db->trans_complete();
        return $this->db->trans_status();
    }

    public function solicitudes_pendientes()
    {
        $this->db->select('s.*, u.nombres, u.primerApellido, u.fechaNacimiento, GROUP_CONCAT(DISTINCT m.idMascotas) as idMascotas, GROUP_CONCAT(DISTINCT m.nombre) as nombresMascotas');
        $this->db->from('solicitudadopcion s');
        $this->db->join('usuarios u', 's.idUsuario = u.idUsuario');
        $this->db->join('detalleadopcion d', 's.idSolicitud = d.idSolicitud', 'left');
        $this->db->join('mascotas m', 'd.idMascotas = m.idMascotas', 'left');
        $this->db->where('s.estado', 0);
        $this->db->group_by('s.idSolicitud');
        $query = $this->db->get();

        return $query->result();
    }
    public function solicitudes_aprobadas($fechaInicio = null, $fechaFin = null)
    {
        $this->db->select('s.*, u.nombres, u.primerApellido, u.fechaNacimiento, s.ci, s.celular, s.direccion, s.descripcion, GROUP_CONCAT(m.nombre) AS nombreMascota, d.fechaAdopcion');
        $this->db->from('solicitudadopcion s');
        $this->db->join('usuarios u', 's.idUsuario = u.idUsuario');
        $this->db->join('detalleadopcion d', 's.idSolicitud = d.idSolicitud', 'left');
        $this->db->join('mascotas m', 'd.idMascotas = m.idMascotas', 'left');
        $this->db->where('s.estado', 1);

        if ($fechaInicio && $fechaFin) {
            $this->db->where('d.fechaAdopcion >=', $fechaInicio);
            $this->db->where('d.fechaAdopcion <=', $fechaFin);
        }

        $this->db->group_by('s.idSolicitud');

        return $this->db->get()->result();
    }
    public function aprobar_solicitud($idSolicitud)
    {
        $this->db->trans_start();

        $this->db->where('idSolicitud', $idSolicitud);
        $this->db->update('solicitudadopcion', ['estado' => 1]);

        $this->db->where('idSolicitud', $idSolicitud);
        $this->db->update('detalleadopcion', [
            'descripcion' => 'Adopción aprobada'
        ]);

        $this->db->select('idMascotas');
        $this->db->from('detalleadopcion');
        $this->db->where('idSolicitud', $idSolicitud);
        $mascotas = $this->db->get()->result();

        $fechaActual = date('Y-m-d H:i:s');
        foreach ($mascotas as $mascota) {
            $this->db->where('idMascotas', $mascota->idMascotas);
            $this->db->update('mascotas', [
                'estado' => 1,
                'ultimaActualizacion' => $fechaActual
            ]);
        }

        $this->db->trans_complete();
        return $this->db->trans_status();
    }

    public function rechazar_solicitud($idSolicitud)
    {
        $this->db->where('idSolicitud', $idSolicitud);
        return $this->db->update('solicitudadopcion', ['estado' => 2]);
    }
    public function obtenerSolicitudPorId($idSolicitud)
    {
        $this->db->select('s.*, u.nombres, u.primerApellido, m.nombre AS nombreMascota, da.fechaAdopcion, u.fechaNacimiento, m.sexo AS sexo, m.fechaNacMascota AS fechaNacMascota, r.nombre AS raza'); // Añadido 'r.nombre AS raza'
        $this->db->from('solicitudadopcion s');
        $this->db->join('usuarios u', 's.idUsuario = u.idUsuario'); // Asegúrate de que esto coincida con tu esquema
        $this->db->join('detalleadopcion da', 's.idSolicitud = da.idSolicitud');
        $this->db->join('mascotas m', 'da.idMascotas = m.idMascotas');
        $this->db->join('razas r', 'm.idRazas = r.idRazas'); // Añadido JOIN para obtener la raza de la mascota
        $this->db->where('s.idSolicitud', $idSolicitud);
        return $this->db->get()->row();
    }
}
