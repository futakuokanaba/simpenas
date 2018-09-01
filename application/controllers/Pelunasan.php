<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Pelunasan extends CI_Controller{

    public function __construct(){
      parent::__construct();
      $this->load->model('Pelunasan_model', 'pelunasan', TRUE);
      $this->load->library('pagination');
      if(!$this->session->has_userdata('login')) redirect('');
    }

    public function index($page = null){
      $perPage = 25;
      if($page === null) $offset = 0;
      else $offset = ($page * $perPage) - $perPage;

      $daftarPelunasan = $this->pelunasan->allPelunasan($perPage, $offset);
      $totalPelunasan = $this->pelunasan->totalPelunasan();

      $config['base_url'] = base_url('pelunasan');
      $config['total_rows'] = $totalPelunasan;
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

      $main_view = 'app/pelunasan';
      $this->load->view('template', compact('main_view', 'pagination', 'totalPelunasan', 'daftarPelunasan'));
    }

    public function show($id){
      $pelunasan = $this->pelunasan->getPelunasan($id);
      if(!$pelunasan) redirect('pelunasan');
      $main_view = 'app/detail-pelunasan';
      $this->load->view('template', compact('main_view', 'pelunasan'));
    }

    public function create(){
      if($this->session->userdata('hak_akses') !== 'admin') redirect('');
      $input = (object) $this->pelunasan->pelunasanDefaultValues();
      $main_view = 'app/input-pelunasan';
      $this->load->view('template', compact('main_view', 'input'));
    }

    public function store(){
      if($this->session->userdata('hak_akses') !== 'admin') redirect('');
      if(!$this->input->post(null, TRUE)) redirect('pelunasan/create');
      $input = (object) $this->input->post(null, TRUE);
      if(!$this->pelunasan->validationPelunasan()){
        $main_view = "app/input-pelunasan";
        $this->load->view('template', compact('main_view', 'input'));
        return;
      }
      $this->pelunasan->insertPelunasan($input);
      $this->session->set_flashdata('msg', 'Pelunasan Berhasil Di Tambahkan!');
      redirect('pelunasan');
    }

    public function edit($id){
      if($this->session->userdata('hak_akses') !== 'admin') redirect('');
      $pelunasan = $this->pelunasan->getPelunasan($id);
      if(!$pelunasan) redirect('pelunasan');
      $main_view = 'app/edit-pelunasan';
      $this->load->view('template', compact('main_view', 'pelunasan'));
    }

    public function update(){
      if($this->session->userdata('hak_akses') !== 'admin') redirect('');
      if(!$this->input->post(null, TRUE)) redirect('pelunasan');
      $kode_pelunasan = $this->input->post('kode_pelunasan', TRUE);
      $pelunasan['no_surat_tugas'] = $this->input->post('no_surat_tugas', TRUE);
      $pelunasan['kode_jp'] = $this->input->post('kode_jp', TRUE);
      $pelunasan['kode_jk'] = $this->input->post('kode_jk', TRUE);
      $pelunasan['daerah_tujuan'] = $this->input->post('daerah_tujuan', TRUE);
      $pelunasan['waktu_berangkat'] = $this->input->post('waktu_berangkat', TRUE);
      $pelunasan['waktu_kembali'] = $this->input->post('waktu_kembali', TRUE);
      $pelunasan['kode_da'] = $this->input->post('kode_da', TRUE);
      $pelunasan['waktu_pembayaran'] = $this->input->post('waktu_pembayaran', TRUE);
      $pelunasan['no_bukti'] = $this->input->post('no_bukti', TRUE);
      $pelunasan['jumlah_panjar'] = $this->input->post('jumlah_panjar', TRUE);
      $pelunasan['jumlah_pelunasan'] = $this->input->post('jumlah_pelunasan', TRUE);
      $pelunasan['jumlah_sisa'] = $this->input->post('jumlah_sisa', TRUE);
      $pelunasan['kode_pelunasan'] = $this->input->post('kode_pelunasan', TRUE);
      if(!$this->pelunasan->validationPelunasan()){
        $pelunasan = (object) $pelunasan;
        $main_view = "app/edit-pelunasan";
        $this->load->view('template', compact('main_view', 'pelunasan'));
        return;
      }
      $this->pelunasan->updatePelunasan($kode_pelunasan, $pelunasan);
      $this->session->set_flashdata('msg', 'Pelunasan Berhasil Di Edit!');
      redirect('pelunasan');
    }

    public function destroy(){
      if($this->session->userdata('hak_akses') !== 'admin') redirect('');
      if(!$this->input->post('kode_pelunasan', TRUE)) redirect('pelunasan');
      $id = $this->input->post('kode_pelunasan', TRUE);
      if($this->pelunasan->deletePelunasan($id)){
        $this->session->set_flashdata('msg', 'Pelunasan Berhasil Di Hapus!');
        redirect('pelunasan');
      }
    }

  }
