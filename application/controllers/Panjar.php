<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Panjar extends CI_Controller{

    public function __construct(){
      parent::__construct();
      $this->load->model('Panjar_model', 'panjar', TRUE);
      $this->load->library('pagination');
      if(!$this->session->has_userdata('login')) redirect('');
    }

    public function index($page = null){
      $perPage = 25;
      if($page === null) $offset = 0;
      else $offset = ($page * $perPage) - $perPage;

      $daftarPanjar = $this->panjar->allPanjar($perPage, $offset);
      $totalPanjar = $this->panjar->totalPanjar();

      $config['base_url'] = base_url('panjar');
      $config['total_rows'] = $totalPanjar;
      $config['per_page'] = $perPage;
      $config['use_page_numbers'] = true;
      $config['next_link'] = 'Selanjutnya';
      $config['prev_link'] = 'Sebelumnya';
      $config['first_link'] = 'Pertama';
      $config['last_link'] = 'Terakhir';
      $config['num_links'] = '2';
      $config['first_tag_open'] = '<li>';
      $config['first_tag_close'] = '</li>';
      $config['last_tag_open'] = "<li class='page-item'>";
      $config['last_tag_close'] = '</li>';
      $config['next_tag_open'] = "<li class='page-item'>";
      $config['next_tag_close'] = '</li>';
      $config['prev_tag_open'] = "<li class='page-item'>";
      $config['prev_tag_close'] = '</li>';
      $config['cur_tag_open'] = "<li class='page-item'><span class='page-link'>";
      $config['cur_tag_close'] = "<span class='sr-only'>(current)</span></span></li>";
      $config['num_tag_open'] = "<li class='page-item'>";
      $config['num_tag_close'] = '</li>';
      $config['attributes'] = array('class' => 'page-item');
      $this->pagination->initialize($config);
      $pagination = $this->pagination->create_links();

      $main_view = 'app/panjar';
      $this->load->view('template', compact('main_view', 'pagination', 'daftarPanjar', 'totalPanjar'));
    }

    public function show($id){
      $panjar = $this->panjar->getPanjar($id);
      if(!$panjar) redirect('panjar');
      $main_view = 'app/detail-panjar';
      $this->load->view('template', compact('main_view', 'panjar'));
    }

    public function create(){
      if($this->session->userdata('hak_akses') !== 'admin') redirect('');
      $input = (object) $this->panjar->panjarDefaultValues();
      $main_view = 'app/input-panjar';
      $this->load->view('template', compact('main_view', 'input'));
    }

    public function store(){
      if($this->session->userdata('hak_akses') !== 'admin') redirect('');
      if(!$this->input->post(null, TRUE)) redirect('panjar/create');
      $input = (object) $this->input->post(null, TRUE);
      if(!$this->panjar->validationPanjar()){
        $main_view = "app/input-panjar";
        $this->load->view('template', compact('main_view', 'input'));
        return;
      }
      $this->panjar->insertPanjar($input);
      $this->session->set_flashdata('msg', 'Panjar Berhasil Di Tambahkan!');
      redirect('panjar');
    }

    public function edit($id){
      if($this->session->userdata('hak_akses') !== 'admin') redirect('');
      $panjar = $this->panjar->getPanjar($id);
      if(!$panjar) redirect('panjar');
      $main_view = 'app/edit-panjar';
      $this->load->view('template', compact('main_view', 'panjar'));
    }

    public function update(){
      if($this->session->userdata('hak_akses') !== 'admin') redirect('');
      if(!$this->input->post(null, TRUE)) redirect('panjar');
      $kode_panjar = $this->input->post('kode_panjar', TRUE);
      $panjar['no_surat_tugas'] = $this->input->post('no_surat_tugas', TRUE);
      $panjar['kode_jp'] = $this->input->post('kode_jp', TRUE);
      $panjar['kode_jk'] = $this->input->post('kode_jk', TRUE);
      $panjar['daerah_tujuan'] = $this->input->post('daerah_tujuan', TRUE);
      $panjar['waktu_berangkat'] = $this->input->post('waktu_berangkat', TRUE);
      $panjar['waktu_kembali'] = $this->input->post('waktu_kembali', TRUE);
      $panjar['kode_da'] = $this->input->post('kode_da', TRUE);
      $panjar['waktu_pembayaran'] = $this->input->post('waktu_pembayaran', TRUE);
      $panjar['no_bukti'] = $this->input->post('no_bukti', TRUE);
      $panjar['jumlah_panjar'] = $this->input->post('jumlah_panjar', TRUE);
      $panjar['kode_panjar'] = $this->input->post('kode_panjar', TRUE);
      if(!$this->panjar->validationPanjar()){
        $panjar = (object) $panjar;
        $main_view = "app/edit-panjar";
        $this->load->view('template', compact('main_view', 'panjar'));
        return;
      }
      $this->panjar->updatePanjar($kode_panjar, $panjar);
      $this->session->set_flashdata('msg', 'Panjar Berhasil Di Edit!');
      redirect('panjar');
    }

    public function destroy(){
      if($this->session->userdata('hak_akses') !== 'admin') redirect('');
      if(!$this->input->post('kode_panjar', TRUE)) redirect('panjar');
      $id = $this->input->post('kode_panjar', TRUE);
      if($this->panjar->deletePanjar($id)){
        $this->session->set_flashdata('msg', 'Panjar Berhasil Di Hapus!');
        redirect('panjar');
      }
    }

  }
