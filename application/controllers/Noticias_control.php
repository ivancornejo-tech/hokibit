<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Noticias_control extends CI_Controller {

	public function index()
	{
		$this->layout->view("noticias");
	}

} 
