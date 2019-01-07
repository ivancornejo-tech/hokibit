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
	}

	public function getAllArticles()
	{
		$query = $this->db->select('Articulos.idArticulos,
			Articulos.Titulo,
			Articulos.Resumen,
			Articulos.FechaPublicacion,
			Articulos.FechaActualizacion,
			Autor.Nombre')
			->from('Articulos')
			->join('Autor', 'Autor.idAutor = Articulos.Autor', 'inner')
			->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();
		}
	}

	private function getAllPost($iDarticle)
	{
		$query = $this->db->select('idPosts, Articulo, Contenido')
			->from('Posts')
			->where('Articulo', $iDarticle)
			->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();
		}
	}

	private function getAllImages($iDarticle)
	{
		$query = $this->db->select('idImagenes, Articulo, Nombre, Extencion, Cita')
			->from('Imagenes')
			->where('Articulo', $iDarticle)
			->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();
		}
	}

	private function getAllVideos($iDarticle)
	{
		$query = $this->db->select('idVideos, Articulo, Nombre, Enlace')
			->from('Videos')
			->where('Articulo', $iDarticle)
			->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();
		}
	}

	public function getArticle($iDarticle)
	{
		$query = $this->db->select('Articulos.idArticulos,
			Articulos.Titulo,
			Articulos.Resumen,
			Articulos.FechaPublicacion,
			Articulos.FechaActualizacion,
			Autor.Nombre')
			->from('Articulos')
			->join('Autor', 'Autor.idAutor = Articulos.Autor', 'inner')
			->where('idArticulos', $iDarticle)
			->get();
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $data) {
				$array = array(
					'idArticulos' => $data->idArticulos,
					'Titulo' => $data->Titulo,
					'Resumen' => $data->Resumen,
					'FechaPublicacion' => $data->FechaPublicacion,
					'FechaActualizacion' => $data->FechaActualizacion,
					'Autor' => $data->Nombre,
					'Posts' => $this->getAllPost($iDarticle),
					'Imagenes' => $this->getAllImages($iDarticle),
					'Videos' => $this->getAllVideos($iDarticle)
				);
			}
			return $array;
		}
	}

}
