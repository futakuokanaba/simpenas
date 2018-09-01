<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class JenisPerjalanan extends CI_Controller{

    public function __construct(){
      parent::__construct();
      $this->load->model('JenisPerjalanan_model', 'jp', TRUE);
      $this->load->library('pagination');
      if(!$this->session->has_userdata('login')) redirect('');
    }

    public function index($page = null){
      $perPage = 25;
      if($page === null) $offset = 0;
      else $offset = ($page * $perPage) - $perPage;

      $daftarJP = $this->jp->allJP($perPage, $offset);
      $totalJP = $this->jp->totalJP();

      $config['base_url'] = base_url('jenis-perjalanan');
      $config['total_rows'] = $totalJP;
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

      $main_view = 'app/jenis-perjalanan';
      $this->load->view('template', compact('main_view', 'pagination', 'daftarJP', 'totalJP'));
    }

    public function create(){
      if($this->session->userdata('hak_akses') !== 'admin') redirect('');
      $input = (object) $this->jp->JPDefaultValues();
      $main_view = 'app/input-jenis-perjalanan';
      $this->load->view('template', compact('main_view', 'input'));
    }

    public function store(){
      if($this->session->userdata('hak_akses') !== 'admin') redirect('');
      if(!$this->input->post(null, TRUE)) redirect('jenis-perjalanan/create');
      $input = (object) $this->input->post(null, TRUE);
      if(!$this->jp->validationJP()){

        $main_view = "app/input-jenis-perjalanan";
        $this->load->view('template', compact('main_view', 'input'));
        return;
      }
      $this->jp->insertJP($input);
      $this->session->set_flashdata('msg', 'Jenis Perjalanan Berhasil Di Tambahkan!');
      redirect('jenis-perjalanan');
    }

    public function edit($id){
      if($this->session->userdata('hak_akses') !== 'admin') redirect('');
      $JP = $this->jp->getJP($id);
      if(!$JP) redirect('jenis-perjalanan');
      $main_view = 'app/edit-jenis-perjalanan';
      $this->load->view('template', compact('main_view', 'JP'));
    }

    public function update(){
      if($this->session->userdata('hak_akses') !== 'admin') redirect('');
      if(!$this->input->post(null, TRUE)) redirect('jenis-perjalanan');
      $kode_jp = $this->input->post('kode_jp', TRUE);
      $JP['nama_jp'] = $this->input->post('nama_jp', TRUE);
      $JP['kode_jp'] = $this->input->post('kode_jp', TRUE);
      if(!$this->jp->validationJP()){
        $JP = (object) $JP;
        $main_view = "app/edit-jenis-perjalanan";
        $this->load->view('template', compact('main_view', 'JP'));
        return;
      }
      $this->jp->updateJP($kode_jp, $JP);
      $this->session->set_flashdata('msg', 'Jenis Perjalanan Berhasil Di Edit!');
      redirect('jenis-perjalanan');
    }

    public function destroy(){
      if($this->session->userdata('hak_akses') !== 'admin') redirect('');
      if(!$this->input->post('kode_jp', TRUE)) redirect('jenis-perjalanan');
      $id = $this->input->post('kode_jp', TRUE);
      if($this->jp->deleteJP($id)){
        $this->session->set_flashdata('msg', 'Jenis Perjalanan Berhasil Di Hapus!');
        redirect('jenis-perjalanan');
      }
    }

  }
