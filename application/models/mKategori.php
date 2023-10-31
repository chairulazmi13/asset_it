<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mKategori extends CI_Model {
  function getAll()
  {
    return $this->db->get('kategori');
  }

  function getById($where){
		return $this->db->get_where('kategori',$where);
	}

  function insert($data){
    $this->db->insert('kategori',$data);
  }

  function update($where,$data){
    $this->db->where($where);
    $this->db->update('kategori',$data);
  }

  function delete($id){
    $this->db->where('id', $id);
    $this->db->delete('kategori');
  }

  function joinModelById($tabel,$where)
  {
    $this->db->select('*');
    $this->db->from('kategori');
    $this->db->join('model','model.id_kategori=kategori.id');
    $this->db->where($tabel,$where);
    $query = $this->db->get();
    return $query->result();
  }

  // menghitung jumalah asset berdasarkan Kategori
  function countAssetByKategori($id)
  {
    $this->db->select('id','id_kategori');
    $this->db->from('kategori');
    $this->db->join('model','model.id_kategori=kategori.id');
    $this->db->join('asset','asset.id_model=model.id');
    $this->db->where('id_kategori',$id);
    return $this->db->count_all_results();
  }

  function countModelByKategori($id)
  {
    $this->db->select('id','id_kategori');
    $this->db->from('kategori');
    $this->db->join('model','model.id_kategori=kategori.id');
    $this->db->where('id_kategori',$id);
    return $this->db->count_all_results();
  }


}
