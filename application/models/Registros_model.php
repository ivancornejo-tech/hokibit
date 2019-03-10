<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Registros_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->db->query("SET lc_time_names = 'es_ES'");
	}

	public function getRegistros(){
		return $this->db->query("SELECT * FROM Registros")->result();
	}

	public function SaveRegister($data)
	{
        $this->db->insert('Registros', $data);
		if ($this->db->affected_rows() === 1) {
			return $this->db->insert_id();
		}
	}

	public function SaveUUID($dataKey){
		$this->db->set('SerialKey', 'UUID()', FALSE);
		$this->db->insert('Licencia', $dataKey);
		if ($this->db->affected_rows()===1) {
			$idKey =  $this->db->insert_id();
			$query = $this->db->select('SerialKey')->from('Licencia')->where('idLicencia', $idKey)->get();
			if ($query->num_rows() === 1) {
				foreach ($query->result() as $value) {
					return $value->SerialKey;
				}
			}
		}
	}

	public function saveDevice(){

	}

}
