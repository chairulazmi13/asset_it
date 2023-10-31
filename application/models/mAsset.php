<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mAsset extends CI_Model {

  function getById($where){
		return $this->db->get_where('asset',$where);
	}

  function getAll(){
    return $this->db->get('asset');
  }

  function insert($data,$table){
		$this->db->insert($table,$data);
  }

  function insertHistori($data){
		$this->db->insert('asset_histori',$data);
  }

  function update($where,$data){
		$this->db->where($where);
		$this->db->update('asset',$data);
	}

  function delete($id){
    $this->db->where('id_asset', $id);
    $this->db->delete('asset');
  }

  function joinWithStatus()
  {
    $this->db->select('*');
    $this->db->from('asset');
    $this->db->join('status','status.id=asset.status');
    $query = $this->db->get();
    return $query->result();
  }

  // -------------- COUNT ASSET ------------------------------

  function countAssetByUser($id)
  {
    $this->db->select('id_asset','nama_asset','id_user');
    $this->db->from('asset');
    $this->db->where('id_user',$id);
    return $this->db->count_all_results();
  }

  function countAssetByModel($id,$where)
  {
    $this->db->select('id_asset','nama_asset','id_model','nama_model','nama_status','tipe_status','id_user');
    $this->db->from('asset');
    $this->db->join('model','model.id=asset.id_asset');
    $this->db->join('status','status.id=asset.status');
    $this->db->where('id_model',$id);
    $this->db->where($where);
    return $this->db->count_all_results();
  }

  function countAssetByID($where)
  {
    $this->db->select('id_asset','nama_asset','nama_status','tipe_status','id_user');
    $this->db->from('asset');
    $this->db->join('status','status.id=asset.status');
    $this->db->where($where);
    return $this->db->count_all_results();
  }

  // -------------- DETAIL ASSET BY ID ----------------------

  // Join Tabel Asset, Model, kategori, departement,status,user dan cari
  function detailAssetById($id)
  {
    $query = $this->db->query(
              "SELECT* FROM asset
              JOIN model ON model.id = asset.id_model
              JOIN kategori ON kategori.id = model.id_kategori
              JOIN departement ON departement.id = asset.id_departement
              JOIN status ON status.id = asset.status
              LEFT JOIN user ON user.id = asset.id_user
              WHERE id_asset = ".$id.""
            );
    return $query->result();
  }

  function detailAssetByUser($id)
  {
    $query = $this->db->query(
              "SELECT* FROM asset
              JOIN model ON model.id = asset.id_model
              JOIN kategori ON kategori.id = model.id_kategori
              JOIN departement ON departement.id = asset.id_departement
              JOIN status ON status.id = asset.status
              LEFT JOIN user ON user.id = asset.id_user
              WHERE id_user = ".$id.""
            );
    return $query->result();
  }

  function detailAssetByNotArsip()
  {
    $query = $this->db->query("SELECT* FROM asset
                              JOIN model ON model.id = asset.id_model
                              JOIN kategori ON kategori.id = model.id_kategori
                              JOIN departement ON departement.id = asset.id_departement
                              JOIN status ON status.id = asset.status
                              LEFT JOIN user ON user.id = asset.id_user

                              WHERE tipe_status != 'arsip'");

    return $query->result();

  }

  function detailAssetBySiapDigunakan()
  {
    $query = $this->db->query("SELECT* FROM asset
                              JOIN model ON model.id = asset.id_model
                              JOIN kategori ON kategori.id = model.id_kategori
                              JOIN departement ON departement.id = asset.id_departement
                              JOIN status ON status.id = asset.status
                              LEFT JOIN user ON user.id = asset.id_user

                              WHERE tipe_status = 'digunakan' and id_user = 0
                              ");

    return $query->result();
  }

  function detailAssetByDigunakan()
  {
    $query = $this->db->query("SELECT* FROM asset
                              JOIN model ON model.id = asset.id_model
                              JOIN kategori ON kategori.id = model.id_kategori
                              JOIN departement ON departement.id = asset.id_departement
                              JOIN status ON status.id = asset.status
                              LEFT JOIN user ON user.id = asset.id_user

                              WHERE tipe_status = 'digunakan' and id_user > 0
                              ");

    return $query->result();
  }

  function detailAssetByPending()
  {
    $query = $this->db->query("SELECT* FROM asset
                              JOIN model ON model.id = asset.id_model
                              JOIN kategori ON kategori.id = model.id_kategori
                              JOIN departement ON departement.id = asset.id_departement
                              JOIN status ON status.id = asset.status
                              LEFT JOIN user ON user.id = asset.id_user

                              WHERE tipe_status = 'pending'
                              ");

    return $query->result();
  }

  function detailAssetByArsip()
  {
    $query = $this->db->query("SELECT* FROM asset
                              JOIN model ON model.id = asset.id_model
                              JOIN kategori ON kategori.id = model.id_kategori
                              JOIN departement ON departement.id = asset.id_departement
                              JOIN status ON status.id = asset.status
                              LEFT JOIN user ON user.id = asset.id_user

                              WHERE tipe_status = 'arsip'
                              ");

    return $query->result();
  }
}
