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
    $this->db->select('s.*, u.nombres, u.primerApellido, u.fechaNacimiento, GROUP_CONCAT(DISTINCT m.idMascotas) as idMascotas, GROUP_CONCAT(DISTINCT m.nombre) as nombresMascotas');
    $this->db->from('solicitudadopcion s');
    $this->db->join('usuarios u', 's.idUsuario = u.idUsuario');
    $this->db->join('detalleadopcion d', 's.idSolicitud = d.idSolicitud', 'left');
    $this->db->join('mascotas m', 'd.idMascotas = m.idMascotas', 'left');
    $this->db->where('s.estado', 1);

    // Aplicar filtro de fechas si se proporcionan
    if ($fechaInicio && $fechaFin) {
        $this->db->where('d.fechaAdopcion >=', $fechaInicio);
        $this->db->where('d.fechaAdopcion <=', $fechaFin);
    }

    $this->db->group_by('s.idSolicitud');
    $query = $this->db->get();

    return $query->result();
}


    public function aprobar_solicitud($idSolicitud)
    {
        $this->db->trans_start();
        
        // Actualizar el estado de la solicitud
        $this->db->where('idSolicitud', $idSolicitud);
        $this->db->update('solicitudadopcion', ['estado' => 1]);

        // Actualizar la tabla detalleadopcion
        $this->db->where('idSolicitud', $idSolicitud);
        $this->db->update('detalleadopcion', [
            'descripcion' => 'Adopción aprobada'
        ]);

        $this->db->trans_complete();

        return $this->db->trans_status();
    }
    public function rechazar_solicitud($idSolicitud)
    {
        $this->db->where('idSolicitud', $idSolicitud);
        return $this->db->update('solicitudadopcion', ['estado' => 2]);
    }
}