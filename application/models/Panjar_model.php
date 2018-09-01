<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class Panjar_model extends CI_Model{

    public function allPanjar($perPage = 25, $offset = 0){
      return $this->db->select('*')->from('panjar')->join('jenis_perjalanan','panjar.kode_jp = jenis_perjalanan.kode_jp')->join('jenis_kegiatan','panjar.kode_jk = jenis_kegiatan.kode_jk')->join('data_anggota','panjar.kode_da = data_anggota.kode_da')->limit($perPage, $offset)->get()->result();
    }

    public function totalPanjar(){
      return $this->db->select('*')->from('panjar')->join('jenis_perjalanan','panjar.kode_jp = jenis_perjalanan.kode_jp')->join('jenis_kegiatan','panjar.kode_jk = jenis_kegiatan.kode_jk')->join('data_anggota','panjar.kode_da = data_anggota.kode_da')->get()->num_rows();
    }

    public function panjarDefaultValues(){
      return [
        'no_surat_tugas' => '',
        'kode_jp' => '',
        'kode_jk' => '',
        'daerah_tujuan' => '',
        'waktu_berangkat' => '',
        'waktu_kembali' => '',
        'kode_da' => '',
        'waktu_pembayaran' => '',
        'jumlah_panjar' => '',
        'no_bukti' => ''
      ];
    }

    public function getPanjar($id){
      return $this->db->select('*')->from('panjar')->join('jenis_perjalanan','panjar.kode_jp = jenis_perjalanan.kode_jp')->join('jenis_kegiatan','panjar.kode_jk = jenis_kegiatan.kode_jk')->join('data_anggota','panjar.kode_da = data_anggota.kode_da')->where('kode_panjar', $id)->get()->row();
    }

    public function updatePanjar($id, $data){
      return $this->db->where('kode_panjar', $id)->update('panjar', $data);
    }

    public function deletePanjar($id){
      return $this->db->where('kode_panjar', $id)->delete('panjar');
    }

    public function validationPanjar(){
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
        ],
        [
          'field' => 'waktu_pembayaran',
          'label' => 'Waktu Pembayaran',
          'rules' => 'trim|required'
        ],
        [
          'field' => 'jumlah_panjar',
          'label' => 'Jumlah Panjar',
          'rules' => 'trim|required'
        ],
        [
          'field' => 'no_bukti',
          'label' => 'No. Bukti',
          'rules' => 'trim|required'
        ]
      ];
      $this->form_validation->set_rules($rules);
      $this->form_validation->set_error_delimiters('<div class="text-center mb-3" style="color:red; border:1px solid red; padding:5px">', '</div>');
      return $this->form_validation->run();
    }

    public function insertPanjar($data){
      return $this->db->insert('panjar', $data);
    }

  }
