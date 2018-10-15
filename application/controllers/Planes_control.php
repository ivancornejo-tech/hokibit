<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Planes_control extends CI_Controller
{
	public function index(){
		$this->layout->view('Planes');
	}

	public function Realizar_Compra(){
		$this->layout->view('Comprar_Plan');
	}
	
}