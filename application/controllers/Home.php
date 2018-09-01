<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Home extends CI_Controller{

    public function __construct(){
      parent::__construct();
      if(!$this->session->has_userdata('login')) redirect('login');
    }

    public function index(){
      $main_view = 'app/index';
      $this->load->view('template', compact('main_view'));
    }

    public function test(){

    }

  }
 ?>
