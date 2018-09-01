<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class DataAnggota_model extends CI_Model{

    public function allDA($perPage = 25, $offset = 0){
      return $this->db->select('*')->from('data_anggota')->join('jenis_anggota','data_anggota.kode_ja = jenis_anggota.kode_ja')->limit($perPage, $offset)->get()->result();
    }

    public function totalDA(){
      return $this->db->select('*')->from('data_anggota')->join('jenis_anggota','data_anggota.kode_ja = jenis_anggota.kode_ja')->get()->num_rows();
    }

    public function DADefaultValues(){
      return [
        'nama_da' => '',
        'status_aktif' => '',
        'tmt' => '',
        'kode_ja' => ''
      ];
    }

    public function getDA($id){
      return $this->db->select('*')->from('data_anggota')->join('jenis_anggota','data_anggota.kode_ja = jenis_anggota.kode_ja')->where('kode_da', $id)->get()->row();
    }

    public function updateDA($id, $data){
      return $this->db->where('kode_da', $id)->update('data_anggota', $data);
    }

    public function deleteDA($id){
      return $this->db->where('kode_da', $id)->delete('data_anggota');
    }

    public function validationDA(){
      $this->load->library('form_validation');
      $rules = [
        [
          'field' => 'nama_da',
          'label' => 'Nama Anggota',
          'rules' => 'trim|required'
        ],
        [
          'field' => 'status_aktif',
          'label' => 'Status Aktif',
          'rules' => 'trim|required'
        ],
        [
          'field' => 'tmt',
          'label' => 'TMT',
          'rules' => 'trim|required'
        ],
        [
          'field' => 'kode_ja',
          'label' => 'Jenis Anggota',
          'rules' => 'trim|required'
        ]
      ];
      $this->form_validation->set_rules($rules);
      $this->form_validation->set_error_delimiters('<div class="text-center mb-3" style="color:red; border:1px solid red; padding:5px">', '</div>');
      return $this->form_validation->run();
    }

    public function insertDA($data){
      return $this->db->insert('data_anggota', $data);
    }

  }
