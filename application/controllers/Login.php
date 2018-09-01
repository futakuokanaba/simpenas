<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Login extends CI_Controller{

    public function __construct(){
      parent::__construct();
      $this->load->model('Login_model', 'login', TRUE);
    }

    public function index(){
      if(!$this->input->post(null, TRUE)){
        $input = (object) $this->login->loginDefaultValues();
        $this->load->view('app/login', compact('input'));

        if($this->session->userdata('login')){
          redirect('');
          return;
        }
      }else{
        $username = $this->input->post('username', TRUE);
        $password = sha1(md5($this->input->post('password', TRUE)));
        $user = $this->login->checkUser($username, $password);

        if($user){
            $data = [
              'login' => TRUE,
              'kode_du' => $user->kode_du,
              'username' => $user->username,
              'hak_akses' => $user->hak_akses
            ];

          $this->session->set_userdata($data);
          if($this->session->userdata('login')){
            redirect('');
            return;
          }
        }else{
          $this->session->set_flashdata('error_msg', 'Username dan/atau Password Anda Salah');
          $input = (object) $this->input->post(null, TRUE);
          $this->load->view('app/login', compact('input'));
        }
      }
    }

    public function logout(){
      $this->session->sess_destroy();
      redirect('');
    }

    public function tes(){
      echo "Hasil Hashing SHA1(MD5('operator')) : ". sha1(md5("operator"));
    }

  }
