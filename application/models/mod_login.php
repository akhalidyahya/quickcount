<?php

  /**
   *
   */
  class mod_login extends CI_Model
  {
    function cek_login($table, $where)
    {
      return $this->db->get_where($table, $where);
    }
    function getNama($email, $password)
    {
      $this->db->select('*');
      $this->db->from('users');
      $this->db->where('email', $email);
      $this->db->where('password', $password);
    }
  }
