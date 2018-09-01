<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class JenisAnggota_model extends CI_Model{

    public function allJA($perPage = 25, $offset = 0){
      return $this->db->limit($perPage, $offset)->get('jenis_anggota')->result();
    }

    public function totalJA(){
      return $this->db->get('jenis_anggota')->num_rows();
    }

    public function JADefaultValues(){
      return [
        'nama_ja' => ''
      ];
    }

    public function getJA($id){
      return $this->db->where('kode_ja', $id)->get('jenis_anggota')->row();
    }

    public function updateJA($id, $data){
      return $this->db->where('kode_ja', $id)->update('jenis_anggota', $data);
    }

    public function deleteJA($id){
      return $this->db->where('kode_ja', $id)->delete('jenis_anggota');
    }

    public function validationJA(){
      $this->load->library('form_validation');
      $rules = [
        [
          'field' => 'nama_ja',
          'label' => 'Jenis Anggota',
          'rules' => 'trim|required'
        ]
      ];
      $this->form_validation->set_rules($rules);
      $this->form_validation->set_error_delimiters('<div class="text-center mb-3" style="color:red; border:1px solid red; padding:5px">', '</div>');
      return $this->form_validation->run();
    }

    public function insertJA($data){
      return $this->db->insert('jenis_anggota', $data);
    }

  }
