<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */
class Blog_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		$this->db->query("SET lc_time_names = 'es_ES'");
	}

	private function getAllImages($iDarticle)
	{
		$query = $this->db->select('idImagenes, Articulo, Titulo, Extencion, Cita')
			->from('Imagenes')
			->where('Articulo', $iDarticle)
			->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();
		}
	}

	private function getAllVideos($iDarticle)
	{
		$query = $this->db->select('idVideos, Articulo, Titulo, Enlace')
			->from('Videos')
			->where('Articulo', $iDarticle)
			->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();
		}
	}

	public function getArticles($year = null, $month = null, $day = null, $name = null)
	{
		if (!is_null($name) && !is_null($year) && !is_null($month) && !is_null($day)) 
		{
			$fecha = $year . "-" . $month . "-" . $day;
			$query = $this->db->select( 'idArticulos,
			DATE_FORMAT(FechaPublicacion, "%Y/%m/%d") AS FechaPublicacion, 
			DATE_FORMAT(FechaActualizacion, "%Y/%m/%d") AS FechaActualizacion, 
			Titulo, REPLACE(Titulo, " ", "_") as Url, Autor, Resumen, Contenido')
				->from('Articulos')
				->where('DATE(FechaPublicacion)', $fecha)
				->order_by('DATE(FechaPublicacion)', 'DESC')
				->where('Titulo =', $name)
				->get();
			if ($query->num_rows() > 0) {
				foreach ($query->result() as $item) {
					$array['idArticulos'] = $item->idArticulos;
					$array['FechaPublicacion'] = $item->FechaPublicacion;
					$array['FechaActualizacion'] = $item->FechaPublicacion;
					$array['Titulo'] = $item->Titulo;
					$array['Url'] = $item->Url;
					$array['Autor'] = $this->_getAutor($item->Autor);
					$array['Resumen'] = $item->Resumen;
					$array['Contenido'] = $item->Contenido;
				}
				return $array;
			}
		}
		if (is_null($name) && !is_null($year) && !is_null($month) && !is_null($day)) 
		{
			$fecha = $year . "-" . $month . "-" . $day;
			$query = $this->db->select( 'idArticulos, 
			DATE_FORMAT(FechaPublicacion, "%Y/%m/%d") AS FechaPublicacion, 
			DATE_FORMAT(FechaActualizacion, "%Y/%m/%d") AS FechaActualizacion, 
			Titulo, Autor, REPLACE(Titulo, " ", "_") as Url, Resumen, Contenido')
				->from('Articulos')
				->where('DATE(FechaPublicacion)', $fecha)
				->order_by('FechaPublicacion', 'DESC')
				->get();
			if ($query->num_rows() > 0) {
				return $query->result_array();
			}
		}
		if (is_null($name) && !is_null($year) && !is_null($month) && is_null($day)) 
		{
			$fecha = $year . "-" . $month;
			$query = $this->db->select( 'idArticulos, 
			DATE_FORMAT(FechaPublicacion, "%Y/%m/%d") AS FechaPublicacion,
			DATE_FORMAT(FechaActualizacion, "%Y/%m/%d") AS FechaActualizacion,  
			Titulo, Autor, REPLACE(Titulo, " ", "_") as Url, Resumen, Contenido')
				->from('Articulos')
				->where('DATE_FORMAT(FechaPublicacion, "%Y-%m") = ', $fecha)
				->order_by('FechaPublicacion', 'DESC')
				->get();
			if ($query->num_rows() > 0) {
				return $query->result_array();
			}
		}
		if (is_null($name) && !is_null($year) && is_null($month) && is_null($day)) 
		{
			$fecha = $year;
			$query = $this->db->select( 'idArticulos, 
			DATE_FORMAT(FechaPublicacion, "%Y/%m/%d") AS FechaPublicacion, 
			DATE_FORMAT(FechaActualizacion, "%Y/%m/%d") AS FechaActualizacion, 
			Titulo, Autor, REPLACE(Titulo, " ", "_") as Url, Resumen, Contenido')
				->from('Articulos')
				->where('YEAR(FechaPublicacion) = ', $fecha)
				->order_by('FechaPublicacion', 'DESC')
				->get();
			if ($query->num_rows() > 0) {
				return $query->result_array();
			}
		}
		return null;
	}

	public function getAllArticles($year = null, $month = null, $day = null, $name = null)
	{
		if (is_null($name) && is_null($year) && is_null($month) && is_null($day)) 
		{
			$query = $this->db->select( 'idArticulos, 
			DATE_FORMAT(FechaPublicacion, "%Y/%m/%d") AS FechaPublicacion, 
			DATE_FORMAT(FechaActualizacion, "%Y/%m/%d") AS FechaActualizacion, 
			Titulo, REPLACE(Titulo, " ", "_") as Url, Autor, Resumen')
				->from('Articulos')
				->order_by('FechaPublicacion', 'DESC')
				->get();
			if ($query->num_rows() > 0) {
				return $query->result_array();
			}
		}
	}

	private  function _getAutor($id_autor)
	{
		$query = $this->db->select('idAutor, 
		Nombre,
		Rol, 
		Correo, 
		Descripcion, 
		UsuarioFacebook, 
		UsuarioTwitter, 
		UsuarioYoutube,
		UsuarioGitLab,
		UsuarioGitHub')
		->from('Autor')
		->where('idAutor', $id_autor)
		->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();
		}
	}

}
