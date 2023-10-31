<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Departement extends CI_Model {

  function getAll(){
    return $this->db->get('departement');
  }

}
