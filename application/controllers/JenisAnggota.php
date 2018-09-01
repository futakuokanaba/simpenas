<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class JenisAnggota extends CI_Controller{

    public function __construct(){
      parent::__construct();
      $this->load->model('JenisAnggota_model', 'ja', TRUE);
      $this->load->library('pagination');
      if(!$this->session->has_userdata('login')) redirect('');
    }

    public function index($page = null){
      $perPage = 25;
      if($page === null) $offset = 0;
      else $offset = ($page * $perPage) - $perPage;

      $daftarJA = $this->ja->allJA($perPage, $offset);
      $totalJA = $this->ja->totalJA();

      $config['base_url'] = base_url('jenis-anggota');
      $config['total_rows'] = $totalJA;
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

      $main_view = 'app/jenis-anggota';
      $this->load->view('template', compact('main_view', 'daftarJA', 'totalJA', 'pagination'));
    }

    public function create(){
      if($this->session->userdata('hak_akses') !== 'admin') redirect('');
      $input = (object) $this->ja->JADefaultValues();
      $main_view = 'app/input-jenis-anggota';
      $this->load->view('template', compact('main_view', 'input'));
    }

    public function store(){
      if($this->session->userdata('hak_akses') !== 'admin') redirect('');
      if(!$this->input->post(null, TRUE)) redirect('jenis-anggota/create');
      $input = (object) $this->input->post(null, TRUE);
      if(!$this->ja->validationJA()){

        $main_view = "app/input-jenis-anggota";
        $this->load->view('template', compact('main_view', 'input'));
        return;
      }
      $this->ja->insertJA($input);
      $this->session->set_flashdata('msg', 'Jenis Anggota Berhasil Di Tambahkan!');
      redirect('jenis-anggota');
    }

    public function edit($id){
      if($this->session->userdata('hak_akses') !== 'admin') redirect('');
      $JA = $this->ja->getJA($id);
      if(!$JA) redirect('jenis-anggota');
      $main_view = 'app/edit-jenis-anggota';
      $this->load->view('template', compact('main_view', 'JA'));
    }

    public function update(){
      if($this->session->userdata('hak_akses') !== 'admin') redirect('');
      if(!$this->input->post(null, TRUE)) redirect('jenis-anggota');
      $kode_ja = $this->input->post('kode_ja', TRUE);
      $JA['nama_ja'] = $this->input->post('nama_ja', TRUE);
      $JA['kode_ja'] = $this->input->post('kode_ja', TRUE);
      if(!$this->ja->validationJA()){
        $JA = (object) $JA;
        $main_view = "app/edit-jenis-anggota";
        $this->load->view('template', compact('main_view', 'JA'));
        return;
      }
      $this->ja->updateJA($kode_ja, $JA);
      $this->session->set_flashdata('msg', 'Jenis Anggota Berhasil Di Edit!');
      redirect('jenis-anggota');
    }

    public function destroy(){
      if($this->session->userdata('hak_akses') !== 'admin') redirect('');
      if(!$this->input->post('kode_ja', TRUE)) redirect('jenis-anggota');
      $id = $this->input->post('kode_ja', TRUE);
      if($this->ja->deleteJA($id)){
        $this->session->set_flashdata('msg', 'Jenis Anggota Berhasil Di Hapus!');
        redirect('jenis-anggota');
      }
    }

  }
