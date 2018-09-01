<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class JenisKegiatan_model extends CI_Model{

    public function allJK($perPage = 25, $offset = 0){
      return $this->db->limit($perPage, $offset)->get('jenis_kegiatan')->result();
    }

    public function totalJK(){
      return $this->db->get('jenis_kegiatan')->num_rows();
    }

    public function JKDefaultValues(){
      return [
        'nama_jk' => ''
      ];
    }

    public function getJK($id){
      return $this->db->where('kode_jk', $id)->get('jenis_kegiatan')->row();
    }

    public function updateJK($id, $data){
      return $this->db->where('kode_jk', $id)->update('jenis_kegiatan', $data);
    }

    public function deleteJK($id){
      return $this->db->where('kode_jk', $id)->delete('jenis_kegiatan');
    }

    public function validationJK(){
      $this->load->library('form_validation');
      $rules = [
        [
          'field' => 'nama_jk',
          'label' => 'Jenis Kegiatan',
          'rules' => 'trim|required'
        ]
      ];
      $this->form_validation->set_rules($rules);
      $this->form_validation->set_error_delimiters('<div class="text-center mb-3" style="color:red; border:1px solid red; padding:5px">', '</div>');
      return $this->form_validation->run();
    }

    public function insertJK($data){
      return $this->db->insert('jenis_kegiatan', $data);
    }

  }
