<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class Login_model extends CI_Model{

    public function checkUser($username, $password){
      return $this->db->where('username', $username)->where('password', $password)->get('data_user')->row();
    }

    public function loginDefaultValues(){
      return [
        'username' => '',
        'password' => ''
      ];
    }


  }
