<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mStatus extends CI_Model {

  function getAll(){
    return $this->db->get('status');
  }

  function getById($id){
    return $this->db->where('status',$id);
  }

  function getByDigunakan(){
    $query =  $this->db->query("SELECT * FROM status WHERE tipe_status = 'digunakan'");
    return $query->result();
  }

  function getByArsipAndPending(){
    $query =  $this->db->query("SELECT * FROM status WHERE tipe_status = 'arsip' or tipe_status ='pending'");
    return $query->result();
  }

}
