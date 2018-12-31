<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->layout->view("welcome");
		// $this->load->helper('url');
		// $this->load->view('welcome_message');
	}
}
