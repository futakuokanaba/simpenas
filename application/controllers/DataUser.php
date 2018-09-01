<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class DataUser extends CI_Controller{

    public function __construct(){
      parent::__construct();
      $this->load->model('DataUser_model', 'du', TRUE);
      $this->load->library('pagination');
      if(!$this->session->has_userdata('login')) redirect('');
    }

    public function index($page = null){
      $perPage = 25;
      if($page === null) $offset = 0;
      else $offset = ($page * $perPage) - $perPage;

      $daftarDU = $this->du->allDU($perPage, $offset);
      $totalDU = $this->du->totalDU();

      $config['base_url'] = base_url('data-user');
      $config['total_rows'] = $totalDU;
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

      $main_view = 'app/data-user';
      $this->load->view('template', compact('main_view', 'pagination', 'totalDU', 'daftarDU'));
    }

    public function create(){
      if($this->session->userdata('hak_akses') !== 'admin') redirect('');
      $input = (object) $this->du->DUDefaultValues();
      $main_view = 'app/input-data-user';
      $this->load->view('template', compact('main_view', 'input'));
    }

    public function store(){
      if($this->session->userdata('hak_akses') !== 'admin') redirect('');
      if(!$this->input->post(null, TRUE)) redirect('data-user/create');
      $input = (object) $this->input->post(null, TRUE);
      if(!$this->du->validationDU()){

        $main_view = "app/input-data-user";
        $this->load->view('template', compact('main_view', 'input'));
        return;
      }
      $this->du->insertDU($input);
      $this->session->set_flashdata('msg', 'Data User Berhasil Di Tambahkan!');
      redirect('data-user');
    }

    public function edit($id){
      if($this->session->userdata('hak_akses') !== 'admin') redirect('');
      $DU = $this->du->getDU($id);
      if(!$DU) redirect('data-user');
      $main_view = 'app/edit-data-user';
      $this->load->view('template', compact('main_view', 'DU'));
    }

    public function update(){
      if($this->session->userdata('hak_akses') !== 'admin') redirect('');
      if(!$this->input->post(null, TRUE)) redirect('data-user');
      $kode_du = $this->input->post('kode_du', TRUE);
      $DU['username'] = $this->input->post('username', TRUE);
      $DU['password'] = $this->input->post('password', TRUE);
      $DU['kode_du'] = $this->input->post('kode_du', TRUE);
      $DU['hak_akses'] = $this->input->post('hak_akses', TRUE);
      if(!$this->du->validationDU()){
        $DU = (object) $DU;
        $main_view = "app/edit-data-user";
        $this->load->view('template', compact('main_view', 'DU'));
        return;
      }
      $this->du->updateDU($kode_du, $DU);
      $this->session->set_flashdata('msg', 'Data User Berhasil Di Edit!');
      redirect('data-user');
    }

    public function destroy(){
      if($this->session->userdata('hak_akses') !== 'admin') redirect('');
      if(!$this->input->post('kode_du', TRUE)) redirect('data-user');
      $id = $this->input->post('kode_du', TRUE);
      if($this->du->deleteDU($id)){
        $this->session->set_flashdata('msg', 'Data User Berhasil Di Hapus!');
        redirect('data-user');
      }
    }

  }
