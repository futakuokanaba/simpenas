<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class MY_Controller extends CI_Controller{
    public function __construct(){
      parent::__construct();

      if(!$this->session->userdata('login')){
        redirect('login');
        return;
      }
    }

    public function cekLoginAdmin(){
      if($this->session->has_userdata('admin')){
        return TRUE;
      }else{
        return FALSE;
      }
    }

    public function cekLoginOperator(){
      if($this->session->has_userdata('operator')){
        return TRUE;
      }else{
        return FALSE;
      }
    }

    public function cekLoginDekan(){
      if($this->session->has_userdata('dekan')){
        return TRUE;
      }else{
        return FALSE;
      }
    }

    public function cekLoginRektor(){
      if($this->session->has_userdata('rektor')){
        return TRUE;
      }else{
        return FALSE;
      }
    }

  }
