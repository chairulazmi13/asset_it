<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mUser extends CI_Model {

  function cek_user($table,$where){
		return $this->db->get_where($table,$where);
	}

  function getAll(){
    $this->db->select('user.id,username,nama,nik,alamat,nama_departement');
    $this->db->from('user');
    $this->db->join('departement','departement.id=user.id_departement');
    $query = $this->db->get();
    return $query->result();

  }

  function insert($data,$table){
		$this->db->insert($table,$data);
  }

  function update($where,$data){
		$this->db->where($where);
		$this->db->update('user',$data);
	}

  function delete($username){
    $this->db->where('username', $username);
    $this->db->delete('user');
  }

  function detailUserById($id)
  {
    $this->db->select('user.id,username,nama,nik,alamat,nama_departement,level');
    $this->db->from('user');
    $this->db->join('departement','departement.id=user.id_departement');
    $this->db->join('level','level.id=user.level');
    $this->db->where('user.id',$id);
    $query = $this->db->get();
    return $query->result();
  }

}
