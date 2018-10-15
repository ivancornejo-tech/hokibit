<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Probar_control extends CI_Controller
{
	public function index(){
		$this->layout->view('Descargas');
	}

	public function Realizar_Compra(){
		$this->layout->view('RealizarCompra');
	}
	
}
