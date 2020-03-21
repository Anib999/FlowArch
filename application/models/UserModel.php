<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {

  function __construct(){
    parent::__construct();
    $this->load->database();
  }

  public function insertUser($data){
    $this->db->insert('archtab',$data);
  }

  public function getAllUsers(){
    // $this->db->select('id,username,dep_type');
    // $query = $this->db->get('archtab');
    $query = $this->db->query('SELECT
      ats.id,
      ats.username,
      dt.dep_type
      FROM `archtab` as ats
        JOIN `deptab` as dt
          ON ats.dep_type = dt.id
      ');
    $result = $query->result();
    return $result;
  }

  public function getUserById($id){
    $this->db->where('id',$id);
    $this->db->select('id,username,dep_type');
    $query = $this->db->get('archtab')->row();
    return $query;
  }

}
