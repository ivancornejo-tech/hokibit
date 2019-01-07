<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blog_control extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model("Blog_model");
	}

	public function index()
	{
		$data['articulos'] = $this->Blog_model->getAllArticles();
		$this->layout->view("blog", $data);
	}

	public function ver($article)
	{
		$data['articulo'] = $this->Blog_model->getArticle($article);
		$this->layout->view('post', $data);
	}

} 
