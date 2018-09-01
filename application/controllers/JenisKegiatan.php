<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class JenisKegiatan extends CI_Controller{

    public function __construct(){
      parent::__construct();
      $this->load->model('JenisKegiatan_model', 'jk', TRUE);
      $this->load->library('pagination');
      if(!$this->session->has_userdata('login')) redirect('');
    }

    public function index($page = null){
      $perPage = 25;
      if($page === null) $offset = 0;
      else $offset = ($page * $perPage) - $perPage;

      $daftarJK = $this->jk->allJK($perPage, $offset);
      $totalJK = $this->jk->totalJK();

      $config['base_url'] = base_url('jenis-kegiatan');
      $config['total_rows'] = $totalJK;
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

      $main_view = 'app/jenis-kegiatan';
      $this->load->view('template', compact('main_view', 'pagination', 'totalJK', 'daftarJK'));
    }

    public function create(){
      if($this->session->userdata('hak_akses') !== 'admin') redirect('');
      $input = (object) $this->jk->JKDefaultValues();
      $main_view = 'app/input-jenis-kegiatan';
      $this->load->view('template', compact('main_view', 'input'));
    }

    public function store(){
      if($this->session->userdata('hak_akses') !== 'admin') redirect('');
      if(!$this->input->post(null, TRUE)) redirect('jenis-kegiatan/create');
      $input = (object) $this->input->post(null, TRUE);
      if(!$this->jk->validationJK()){

        $main_view = "app/input-jenis-kegiatan";
        $this->load->view('template', compact('main_view', 'input'));
        return;
      }
      $this->jk->insertJK($input);
      $this->session->set_flashdata('msg', 'Jenis Kegiatan Berhasil Di Tambahkan!');
      redirect('jenis-kegiatan');
    }

    public function edit($id){
      if($this->session->userdata('hak_akses') !== 'admin') redirect('');
      $JK = $this->jk->getJK($id);
      if(!$JK) redirect('jenis-kegiatan');
      $main_view = 'app/edit-jenis-kegiatan';
      $this->load->view('template', compact('main_view', 'JK'));
    }

    public function update(){
      if($this->session->userdata('hak_akses') !== 'admin') redirect('');
      if(!$this->input->post(null, TRUE)) redirect('jenis-kegiatan');
      $kode_jk = $this->input->post('kode_jk', TRUE);
      $JK['nama_jk'] = $this->input->post('nama_jk', TRUE);
      $JK['kode_jk'] = $this->input->post('kode_jk', TRUE);
      if(!$this->jk->validationJK()){
        $JK = (object) $JK;
        $main_view = "app/edit-jenis-kegiatan";
        $this->load->view('template', compact('main_view', 'JK'));
        return;
      }
      $this->jk->updateJK($kode_jk, $JK);
      $this->session->set_flashdata('msg', 'Jenis Kegiatan Berhasil Di Edit!');
      redirect('jenis-kegiatan');
    }

    public function destroy(){
      if($this->session->userdata('hak_akses') !== 'admin') redirect('');
      if(!$this->input->post('kode_jk', TRUE)) redirect('jenis-kegiatan');
      $id = $this->input->post('kode_jk', TRUE);
      if($this->jk->deleteJK($id)){
        $this->session->set_flashdata('msg', 'Jenis Kegiatan Berhasil Di Hapus!');
        redirect('jenis-kegiatan');
      }
    }

  }
