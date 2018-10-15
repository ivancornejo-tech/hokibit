<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class DispositivoModel extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function getDispositivo($id  =  null){
		if (!is_null($id)) {
			$query = $this->db->select('idDispositivo, Nombre, NumeroSerie, idLicencia, FechaRegistro')->from('Dispositivo')->where('idDispositivo', $id)->get();
			if ($query->num_rows() === 1) {
				return $query->row_array();
			}
			return false;
		}
		$query = $this->db->select('idDispositivo, Nombre, NumeroSerie, idLicencia, FechaRegistro')->from('Dispositivo')->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();
		}
	}

	public function save($dispositivo){
		$this->db->set($this->_setDevice($dispositivo))->insert('Dispositivo');
		if ($this->db->affected_rows() === 1) {
			return $this->db->insert_id();
		}
		return false;
	}

	public function update($id, $dispositivo){
		$this->db->set($this->_setDevice($dispositivo))->where('idDispositivo', $id)->update('Dispositivo');
		if ($this->db->affected_rows() === 1) {
			return true;
		}
		return false;
	}

	public function delete($id){
		$this->db->where('idDispositivo', $id)->delete('Dispositivo');
		if ($this->db->affected_rows() === 1) {
			return true;
		}
		return false;
	}

	private function _setDevice($dispositivo){
		return array(
			'idDispositivo' => $dispositivo['id'],
			'Nombre' => $dispositivo['Nombre'],
		);
	}

}