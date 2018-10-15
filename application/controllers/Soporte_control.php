<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Soporte_control extends CI_Controller
{
	public function index(){
		$this->layout->view('Soporte');
	}

	public function Realizar_Compra(){
		$this->layout->view('Manual');
	}
	
}