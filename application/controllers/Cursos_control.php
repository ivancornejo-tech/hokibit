<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cursos_control extends CI_Controller {

	public function index()
	{
		$this->layout->view("cursos");
	}

} 
