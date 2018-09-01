<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class JenisPerjalanan_model extends CI_Model{

    public function allJP($perPage = 25, $offset = 0){
      return $this->db->limit($perPage, $offset)->get('jenis_perjalanan')->result();
    }

    public function totalJP(){
      return $this->db->get('jenis_perjalanan')->num_rows();
    }

    public function JPDefaultValues(){
      return [
        'nama_jp' => ''
      ];
    }

    public function getJP($id){
      return $this->db->where('kode_jp', $id)->get('jenis_perjalanan')->row();
    }

    public function updateJP($id, $data){
      return $this->db->where('kode_jp', $id)->update('jenis_perjalanan', $data);
    }

    public function deleteJP($id){
      return $this->db->where('kode_jp', $id)->delete('jenis_perjalanan');
    }

    public function validationJP(){
      $this->load->library('form_validation');
      $rules = [
        [
          'field' => 'nama_jp',
          'label' => 'Jenis Perjalanan',
          'rules' => 'trim|required'
        ]
      ];
      $this->form_validation->set_rules($rules);
      $this->form_validation->set_error_delimiters('<div class="text-center mb-3" style="color:red; border:1px solid red; padding:5px">', '</div>');
      return $this->form_validation->run();
    }

    public function insertJP($data){
      return $this->db->insert('jenis_perjalanan', $data);
    }

  }
