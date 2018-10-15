<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class LicenciaModel extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function getLicencia($id  =  null){
		if (!is_null($id)) {
			$query = $this->db->select('idLicencia, FechaTermino, Duracion, Tipo, Version, SerialKey, Status')->from('Licencia')->where('idLicencia', $id)->get();
			if ($query->num_rows() === 1) {
				return $query->row_array();
			}
			return false;
		}
		$query = $this->db->select('idLicencia, FechaTermino, Duracion, Tipo, Version, , Status')->from('Licencia')->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();
		}
	}

	public function save($key, $Posversion, $dispositivo){
		$query = $this->db->select('idLicencia, 
			FechaTermino, 
			Duracion, 
			Tipo, 
			Version,
			Status')->from('Licencia')->where('SerialKey', $key)->get();
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $value) {
				$licenciaId = $value->idLicencia;
				$FechaTermino = $value->FechaTermino;
				$duracion =  $value->Duracion;
				$tipo =  $value->Tipo;
				$version = $value->Version;
				$status =  $value->Status;

			}

			if ($this->_validarStatus($status)!=true) {
				$array =  array(
					'Resultado' => 'Status',
					'Mensaje' => '¡Esta licencia ha sido cancelada!'
				);
				return $array;
			}

			if($this->_validarVersion($Posversion, $version)!=true){
				$array =  array(
					'Resultado' => 'Version',
					'Mensaje' => 'Esta licencia no aplica para esta version, ¡solicite una licencia nueva!'
				);
				return $array;
			}

			if ($FechaTermino!=null) {
				if ($this->_validarTiempo($FechaTermino)!=true) {
					$array =  array(
						'Resultado' => 'Tiempo',
						'Mensaje' => '¡Esta licencia ha expirado solicite una nueva!'
					);
					return $array;
				}
			}

			if($this->_validarTipo($tipo, $licenciaId)!=true){
				$array =  array(
					'Resultado' => 'Tipo',
					'Mensaje' => '¡Se ha llegado al limite de usuarios permitidos para esta licencia!'
				);
				return $array;
			}

			//print_r($this->_setLicencia($duracion));
			$this->db->set($this->_setLicencia($duracion))->where('idLicencia', $licenciaId)->update('Licencia');
			if ($this->db->affected_rows() === 1) {
				$this->db->set($this->_setDevice($dispositivo,$licenciaId))->insert('Dispositivo');
				if ($this->db->affected_rows() === 1) {
					$idDispositivo = $this->db->insert_id();
					$query = $this->db->select('Licencia.idLicencia,
						Licencia.SerialKey,
						Licencia.Tipo,
						Licencia.Version, 
						Licencia.Duracion, 
						Licencia.FechaTermino,
						Licencia.Status, 
						Licencia.idRegistro,
						Registros.Email,
						Dispositivo.FechaRegistro,
						Dispositivo.NumeroSerie')
					->from('Dispositivo')
					->join('Licencia', 'Dispositivo.idLicencia = Licencia.idLicencia', 'INNER')
					->join('Registros', 'Registros.idRegistros = Licencia.idRegistro', 'INNER')
					->where('Dispositivo.idDispositivo', $idDispositivo)
					->get();
					if ($query->num_rows() > 0) {
						foreach ($query->result() as $value) {
							$licenciaId = $value->idLicencia;
							$SerialKey = $value->SerialKey;
							$FechaTermino = $value->FechaTermino;
							$duracion =  $value->Duracion;
							$tipo =  $value->Tipo;
							$version = $value->Version;
							$status =  $value->Status;
							$idRegistro = $value->idRegistro;
							$emailR = $value->Email;
							$fechaR = $value->FechaRegistro;
							$NumeroSerie = $value->NumeroSerie;
						}
						$array =  array(
							'Resultado' => 'ok',
							'Mensaje' => 'Gracias por su compra',
							'Status' => $status,
				            'RegistrationDate' => $fechaR,
				            'EndDate' => $FechaTermino,
				            'Duracion' => $duracion,
				            'Tipo' => $tipo,
				            'Version' => $version,
				            'IdLicencia' => $licenciaId,
				            'SerialKey' => $SerialKey,
				            'emailR' => $emailR,
				            'IdDevice' => $idDispositivo,
				            'NumeroSerie' => $NumeroSerie
						);
						return $array;
					}
				}
			}
			
		}else{
			$array =  array(
				'Resultado' => 'NoExiste',
				'Mensaje' => '¡No se a podido encontrar la licencia!, verifique que la licencia sea correcta!'
			);
			return $array;
		}
		return null;
	}



	public function update($duracion, $licenciaId){
		$this->db->set($this->_setLicencia($duracion))->where('idLicencia', $licenciaId)->update('Licencia');
		if ($this->db->affected_rows() === 1) {
			return true;
		}
		return null;
	}

	public function delete($id){
		$this->db->where('idLicencia', $id)->delete('Licencia');
		if ($this->db->affected_rows() === 1) {
			return true;
		}
		return false;
	}

	/**
	*Algunas funciones
	*
	*/

	private function _validarTiempo($FechaTermino){
		$fActual = $this->_getFecha();
		/*echo $fActual;
		echo "\n";
		echo $FechaTermino;*/
		if ($FechaTermino>$fActual) {
			return true;
		}
		return false;
	}

	private function _validarTipo($tipo, $licenciaId){
		/*SELECT  COUNT(Dispositivo.idDispositivo) as NumDispositivos,
		IFNULL(Licencia.Tipo, 0) AS Tipo
		FROM Dispositivo
		INNER JOIN Licencia ON  Dispositivo.idLicencia = Licencia.idLicencia
		WHERE Dispositivo.idLicencia = 23*/
		$query = $this->db->select('COUNT(Dispositivo.idDispositivo) as NumDispositivos,
		IFNULL(Licencia.Tipo, 0) AS Tipo')
		->from('Dispositivo')
		->join('Licencia', 'Dispositivo.idLicencia = Licencia.idLicencia', 'INNER')
		->where('Dispositivo.idLicencia', $licenciaId)
		->get();
		if ($query->num_rows() === 1) {
			foreach ($query->result() as $value) {
				$NumDispositivos = $value->NumDispositivos;
				$Tipo = $value->Tipo;
			}
			if ($NumDispositivos<$Tipo) {
				return true;
			}
		}
		return false;
	}

	private function _validarVersion( $Posversion, $version){
		if ($Posversion === $version) {
			return true;
		}
		return false;
	}

	private function _validarStatus($status){
		if ($status!=0) {
			return true;
		}
		return false;
	}

	private function _setLicencia($duracion){
		$fecha_actual = date("Y-m-d H:i:s");
		$fecha = new DateTime($fecha_actual);
		$fecha->add(new DateInterval('P'.$duracion.'D'));
		$FT = $fecha->format('Y-m-d H:i:s');
		return array(
			'FechaTermino' => $FT,
		);
	}

	private function _setDevice($dispositivo,$licenciaId){
		foreach ($dispositivo as $device) {
			$Fecha = $this->_getFecha();
			return array(
				'Nombre' =>  $device['NameDevice'],
				'NumeroSerie' => $device['IDDevice'],
				'idLicencia' => $licenciaId,
				'FechaRegistro' => $Fecha
			);
		}
	}

	private function _getFecha(){
		$fecha_actual = date("Y-m-d H:i:s");
		return $fecha_actual;
	}
	

}
