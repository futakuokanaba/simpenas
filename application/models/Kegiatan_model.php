<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class Kegiatan_model extends CI_Model{

    public function allKegiatan($perPage = 25, $offset = 0){
      return $this->db->select('*')->from('kegiatan')->join('jenis_perjalanan','kegiatan.kode_jp = jenis_perjalanan.kode_jp')->join('jenis_kegiatan','kegiatan.kode_jk = jenis_kegiatan.kode_jk')->join('data_anggota','kegiatan.kode_da = data_anggota.kode_da')->limit($perPage, $offset)->get()->result();
    }

    public function totalKegiatan(){
      return $this->db->select('*')->from('kegiatan')->join('jenis_perjalanan','kegiatan.kode_jp = jenis_perjalanan.kode_jp')->join('jenis_kegiatan','kegiatan.kode_jk = jenis_kegiatan.kode_jk')->join('data_anggota','kegiatan.kode_da = data_anggota.kode_da')->get()->num_rows();
    }

    public function kegiatanDefaultValues(){
      return [
        'no_surat_tugas' => '',
        'kode_jp' => '',
        'kode_jk' => '',
        'daerah_tujuan' => '',
        'waktu_berangkat' => '',
        'waktu_kembali' => '',
        'kode_da' => ''
      ];
    }

    public function getKegiatan($id){
      return $this->db->select('*')->from('kegiatan')->join('jenis_perjalanan','kegiatan.kode_jp = jenis_perjalanan.kode_jp')->join('jenis_kegiatan','kegiatan.kode_jk = jenis_kegiatan.kode_jk')->join('data_anggota','kegiatan.kode_da = data_anggota.kode_da')->where('kode_kegiatan', $id)->get()->row();
    }

    public function updateKegiatan($id, $data){
      return $this->db->where('kode_kegiatan', $id)->update('kegiatan', $data);
    }

    public function deleteKegiatan($id){
      return $this->db->where('kode_kegiatan', $id)->delete('kegiatan');
    }

    public function validationKegiatan(){
      $this->load->library('form_validation');
      $rules = [
        [
          'field' => 'no_surat_tugas',
          'label' => 'No. Surat Tugas',
          'rules' => 'trim|required'
        ],
        [
          'field' => 'kode_jp',
          'label' => 'Jenis Perjalanan',
          'rules' => 'trim|required'
        ],
        [
          'field' => 'kode_jk',
          'label' => 'Nama Kegiatan',
          'rules' => 'trim|required'
        ],
        [
          'field' => 'daerah_tujuan',
          'label' => 'Daerah Tujuan',
          'rules' => 'trim|required'
        ],
        [
          'field' => 'waktu_berangkat',
          'label' => 'Waktu Berangkat',
          'rules' => 'trim|required'
        ],
        [
          'field' => 'waktu_kembali',
          'label' => 'Waktu Kembali',
          'rules' => 'trim|required'
        ],
        [
          'field' => 'kode_da',
          'label' => 'Nama',
          'rules' => 'trim|required'
        ]
      ];
      $this->form_validation->set_rules($rules);
      $this->form_validation->set_error_delimiters('<div class="text-center mb-3" style="color:red; border:1px solid red; padding:5px">', '</div>');
      return $this->form_validation->run();
    }

    public function insertKegiatan($data){
      return $this->db->insert('kegiatan', $data);
    }

  }
