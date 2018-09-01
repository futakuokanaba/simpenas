<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class DataAnggota extends CI_Controller{

    public function __construct(){
      parent::__construct();
      $this->load->model('DataAnggota_model', 'da', TRUE);
      $this->load->library('pagination');
      if(!$this->session->has_userdata('login')) redirect('');
    }

    public function index($page = null){
      $perPage = 25;
      if($page === null) $offset = 0;
      else $offset = ($page * $perPage) - $perPage;

      $daftarDA = $this->da->allDA($perPage, $offset);
      $totalDA = $this->da->totalDA();

      $config['base_url'] = base_url('data-anggota');
      $config['total_rows'] = $totalDA;
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

      $main_view = 'app/data-anggota';
      $this->load->view('template', compact('main_view', 'pagination', 'daftarDA', 'totalDA'));
    }

    public function create(){
      if($this->session->userdata('hak_akses') !== 'admin') redirect('');
      $input = (object) $this->da->DADefaultValues();
      $main_view = 'app/input-data-anggota';
      $this->load->view('template', compact('main_view', 'input'));
    }

    public function store(){
      if($this->session->userdata('hak_akses') !== 'admin') redirect('');
      if(!$this->input->post(null, TRUE)) redirect('data-anggota/create');
      $input = (object) $this->input->post(null, TRUE);
      if(!$this->da->validationDA()){

        $main_view = "app/input-data-anggota";
        $this->load->view('template', compact('main_view', 'input'));
        return;
      }
      $this->da->insertDA($input);
      $this->session->set_flashdata('msg', 'Data Anggota Berhasil Di Tambahkan!');
      redirect('data-anggota');
    }

    public function edit($id){
      if($this->session->userdata('hak_akses') !== 'admin') redirect('');
      $DA = $this->da->getDA($id);
      if(!$DA) redirect('data-anggota');
      $main_view = 'app/edit-data-anggota';
      $this->load->view('template', compact('main_view', 'DA'));
    }

    public function update(){
      if($this->session->userdata('hak_akses') !== 'admin') redirect('');
      if(!$this->input->post(null, TRUE)) redirect('data-anggota');
      $kode_da = $this->input->post('kode_da', TRUE);
      $DA['nama_da'] = $this->input->post('nama_da', TRUE);
      $DA['status_aktif'] = $this->input->post('status_aktif', TRUE);
      $DA['tmt'] = $this->input->post('tmt', TRUE);
      $DA['kode_ja'] = $this->input->post('kode_ja', TRUE);
      $DA['kode_da'] = $this->input->post('kode_da', TRUE);
      if(!$this->da->validationDA()){
        $DA = (object) $DA;
        $main_view = "app/edit-data-anggota";
        $this->load->view('template', compact('main_view', 'DA'));
        return;
      }
      $this->da->updateDA($kode_da, $DA);
      $this->session->set_flashdata('msg', 'Data Anggota Berhasil Di Edit!');
      redirect('data-anggota');
    }

    public function destroy(){
      if($this->session->userdata('hak_akses') !== 'admin') redirect('');
      if(!$this->input->post('kode_da', TRUE)) redirect('data-anggota');
      $id = $this->input->post('kode_da', TRUE);
      if($this->da->deleteDA($id)){
        $this->session->set_flashdata('msg', 'Data Anggota Berhasil Di Hapus!');
        redirect('data-anggota');
      }
    }

  }
