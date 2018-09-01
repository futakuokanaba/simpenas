<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Transaksi extends CI_Controller{

    public function __construct(){
      parent::__construct();
      $this->load->model('Transaksi_model', 'transaksi', TRUE);
      if(!$this->session->has_userdata('login')) redirect('');
    }

    public function index(){
      $daftarKegiatan = $this->transaksi->allKegiatan();
      $totalKegiatan = $this->transaksi->totalKegiatan();

      $daftarPanjar = $this->transaksi->allPanjar();
      $totalPanjar = $this->transaksi->totalPanjar();

      $daftarPelunasan = $this->transaksi->allPelunasan();
      $totalPelunasan = $this->transaksi->totalPelunasan();

      $main_view = 'app/transaksi';
      $this->load->view('template', compact('main_view', 'daftarKegiatan', 'totalKegiatan', 'daftarPanjar', 'totalPanjar', 'daftarPelunasan', 'totalPelunasan'));
    }


  }
 ?>
