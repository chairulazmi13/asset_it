<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Level extends CI_Model {

  function getAll(){
    return $this->db->get('level');
  }

  function getById($id){
    return $this->db->where('level',$id);
  }

}
