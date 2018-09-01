<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Master extends CI_Controller{

    public function __construct(){
      parent::__construct();
      $this->load->model('Master_model', 'master', TRUE);
      if(!$this->session->has_userdata('login')) redirect('');
    }

    public function index(){
      $daftarDA = $this->master->allDA();
      $totalDA = $this->master->totalDA();

      $daftarDU = $this->master->allDU();
      $totalDU = $this->master->totalDU();

      $daftarJA = $this->master->allJA();
      $totalJA = $this->master->totalJA();

      $daftarJK = $this->master->allJK();
      $totalJK = $this->master->totalJK();

      $daftarJP = $this->master->allJP();
      $totalJP = $this->master->totalJP();

      $main_view = 'app/master';
      $this->load->view('template', compact('main_view', 'daftarDA', 'totalDA', 'daftarDU', 'totalDU', 'daftarJA', 'totalJA', 'daftarJK', 'totalJK', 'daftarJP', 'totalJP'));
    }


  }
