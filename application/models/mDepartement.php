<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mDepartement extends CI_Model {
  function getAll()
  {
    return $this->db->get('departement');
  }

  function getById($where){
		return $this->db->get_where('departement',$where);
	}

  function insert($data){
    $this->db->insert('departement',$data);
  }

  function update($where,$data){
    $this->db->where($where);
    $this->db->update('departement',$data);
  }

  function delete($id){
    $this->db->where('id', $id);
    $this->db->delete('departement');
  }

}
