<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blog_control extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model("Blog_model");
	}

	public function index($year = null, $month = null, $day = null)
	{
		if (!is_null($year) && !is_null($month) && !is_null($day)) {
			$data['articulos'] = $this->Blog_model->getArticles($year, $month, $day, null);
		}
		if (!is_null($year) && !is_null($month) && is_null($day)) {
			$data['articulos'] = $this->Blog_model->getArticles($year, $month, null, null);
		}
		if (!is_null($year) && is_null($month) && is_null($day)) {
			$data['articulos'] = $this->Blog_model->getArticles($year, null, null, null);
		}
		if (is_null($year) && is_null($month) && is_null($day)) {
			$data['articulos'] = $this->Blog_model->getAllArticles();
		}
		if (!is_null($data)) {
			$this->layout->view("blog", $data);
		} else {
			show_404();
		}
	}

	public function ver($year = null, $month = null, $day = null, $name = null)
	{

		if (!is_null($name) && !is_null($year) && !is_null($month) && !is_null($day)) {
			$name = str_replace("_"," ", $name);
			$data['articulo'] = $this->Blog_model->getArticles($year, $month, $day, $name);
			if (!is_null($data)) {
				$this->layout->view("blog", $data);
			} else {
				show_404();
			}
		} else {
			redirect("blog");
		}
	}
} 
