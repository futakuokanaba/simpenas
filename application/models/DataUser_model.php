<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class DataUser_model extends CI_Model{

    public function allDU($perPage = 25, $offset = 0){
      return $this->db->limit($perPage, $offset)->get('data_user')->result();
    }

    public function totalDU(){
      return $this->db->get('data_user')->num_rows();
    }

    public function DUDefaultValues(){
      return [
        'username' => '',
        'password' => '',
        'hak_akses' => ''
      ];
    }

    public function getDU($id){
      return $this->db->where('kode_du', $id)->get('data_user')->row();
    }

    public function updateDU($id, $data){
      return $this->db->where('kode_du', $id)->update('data_user', $data);
    }

    public function deleteDU($id){
      return $this->db->where('kode_du', $id)->delete('data_user');
    }

    public function validationDU(){
      $this->load->library('form_validation');
      $rules = [
        [
          'field' => 'username',
          'label' => 'Username',
          'rules' => 'trim|required'
        ],
        [
          'field' => 'password',
          'label' => 'Password',
          'rules' => 'trim|required'
        ]
      ];
      $this->form_validation->set_rules($rules);
      $this->form_validation->set_error_delimiters('<div class="text-center mb-3" style="color:red; border:1px solid red; padding:5px">', '</div>');
      return $this->form_validation->run();
    }

    public function insertDU($data){
      return $this->db->insert('data_user', $data);
    }

  }
