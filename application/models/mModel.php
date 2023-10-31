<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mModel extends CI_Model {
  function getAll()
  {
    $query = $this->db->get('Model');
    return $query->result();
  }

  function getById($where){
		return $this->db->get_where('Model',$where);
	}

  function insert($data){
    $this->db->insert('Model',$data);
  }

  function update($where,$data){
    $this->db->where($where);
    $this->db->update('Model',$data);
  }

  function delete($id){
    $this->db->where('id', $id);
    $this->db->delete('Model');
  }

  function joinWithKategori()
  {
    $this->db->select('model.id as id_model,nomor_model,nama_model,brand,id_kategori,nama_kategori');
    $this->db->from('model');
    $this->db->join('kategori','kategori.id=model.id_kategori');
    $query = $this->db->get();
    return $query->result();
  }

  function joinWithKategoriById($id)
  {
    $this->db->select('model.id as id_model,nomor_model,nama_model,brand,id_kategori,nama_kategori');
    $this->db->from('model');
    $this->db->join('kategori','kategori.id=model.id_kategori');
    $this->db->where('model.id',$id);
    $query = $this->db->get();
    return $query->result();
  }

  // menghitung jumalah asset berdasarkan Model
  function countAssetByModel($id)
  {
    $this->db->select('id','id_model');
    $this->db->from('asset');
    $this->db->where('id_model',$id);
    return $this->db->count_all_results();
  }

}
