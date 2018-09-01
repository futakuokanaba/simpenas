<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Kegiatan extends CI_Controller{

    public function __construct(){
      parent::__construct();
      $this->load->model('Kegiatan_model', 'kegiatan', TRUE);
      $this->load->library('pagination');
      if(!$this->session->has_userdata('login')) redirect('');
    }

    public function index($page = null){
      $perPage = 25;
      if($page === null) $offset = 0;
      else $offset = ($page * $perPage) - $perPage;

      $daftarKegiatan = $this->kegiatan->allKegiatan($perPage, $offset);
      $totalKegiatan = $this->kegiatan->totalKegiatan();

      $config['base_url'] = base_url('kegiatan');
      $config['total_rows'] = $totalKegiatan;
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

      $main_view = 'app/kegiatan';
      $this->load->view('template', compact('main_view', 'pagination', 'totalKegiatan', 'daftarKegiatan'));
    }

    public function show($id){
      $kegiatan = $this->kegiatan->getKegiatan($id);
      if(!$kegiatan) redirect('kegiatan');
      $main_view = 'app/detail-kegiatan';
      $this->load->view('template', compact('main_view', 'kegiatan'));
    }

    public function create(){
      if($this->session->userdata('hak_akses') !== 'admin') redirect('');
      $input = (object) $this->kegiatan->kegiatanDefaultValues();
      $main_view = 'app/input-kegiatan';
      $this->load->view('template', compact('main_view', 'input'));
    }

    public function store(){
      if($this->session->userdata('hak_akses') !== 'admin') redirect('');
      if(!$this->input->post(null, TRUE)) redirect('kegiatan/create');
      $input = (object) $this->input->post(null, TRUE);
      if(!$this->kegiatan->validationKegiatan()){
        $main_view = "app/input-kegiatan";
        $this->load->view('template', compact('main_view', 'input'));
        return;
      }
      $this->kegiatan->insertKegiatan($input);
      $this->session->set_flashdata('msg', 'Kegiatan Berhasil Di Tambahkan!');
      redirect('kegiatan');
    }

    public function edit($id){
      if($this->session->userdata('hak_akses') !== 'admin') redirect('');
      $kegiatan = $this->kegiatan->getKegiatan($id);
      if(!$kegiatan) redirect('kegiatan');
      $main_view = 'app/edit-kegiatan';
      $this->load->view('template', compact('main_view', 'kegiatan'));
    }

    public function update(){
      if($this->session->userdata('hak_akses') !== 'admin') redirect('');
      if(!$this->input->post(null, TRUE)) redirect('kegiatan');
      $kode_kegiatan = $this->input->post('kode_kegiatan', TRUE);
      $kegiatan['no_surat_tugas'] = $this->input->post('no_surat_tugas', TRUE);
      $kegiatan['kode_jp'] = $this->input->post('kode_jp', TRUE);
      $kegiatan['kode_jk'] = $this->input->post('kode_jk', TRUE);
      $kegiatan['daerah_tujuan'] = $this->input->post('daerah_tujuan', TRUE);
      $kegiatan['waktu_berangkat'] = $this->input->post('waktu_berangkat', TRUE);
      $kegiatan['waktu_kembali'] = $this->input->post('waktu_kembali', TRUE);
      $kegiatan['kode_da'] = $this->input->post('kode_da', TRUE);
      $kegiatan['kode_kegiatan'] = $this->input->post('kode_kegiatan', TRUE);
      if(!$this->kegiatan->validationKegiatan()){
        $kegiatan = (object) $kegiatan;
        $main_view = "app/edit-kegiatan";
        $this->load->view('template', compact('main_view', 'kegiatan'));
        return;
      }
      $this->kegiatan->updateKegiatan($kode_kegiatan, $kegiatan);
      $this->session->set_flashdata('msg', 'Kegiatan Berhasil Di Edit!');
      redirect('kegiatan');
    }

    public function destroy(){
      if($this->session->userdata('hak_akses') !== 'admin') redirect('');
      if(!$this->input->post('kode_kegiatan', TRUE)) redirect('kegiatan');
      $id = $this->input->post('kode_kegiatan', TRUE);
      if($this->kegiatan->deleteKegiatan($id)){
        $this->session->set_flashdata('msg', 'Kegiatan Berhasil Di Hapus!');
        redirect('kegiatan');
      }
    }

  }
