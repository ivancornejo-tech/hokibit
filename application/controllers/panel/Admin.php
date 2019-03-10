<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 *
 */
class Admin extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->layout->setLayout('admin_layout');
  }

  public function index(){
    $this->layout->view("admin");
  }
}
