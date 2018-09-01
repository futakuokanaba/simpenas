<?php
  // fungsi untuk mendapatkan data dinamis dari DB untuk form select
  function getDropDownList($table, $columns){
    $CI =& get_instance();
    $query = $CI->db->select($columns)->from($table)->get();

    if($query->num_rows() >= 1){
      $options1 = ['' => '--Pilih--'];
      $options2 = array_column($query->result_array(), $columns[1], $columns[0]);
      $options = $options1 + $options2;
      return $options;
    }
    return $options = ['' => '--Pilih--'];

  }
