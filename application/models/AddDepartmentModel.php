<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddDepartmentModel extends CI_Model {

  function __construct(){
    parent::__construct();
    $this->load->database();
  }

  public function insertDepartment($data){
    $this->db->insert('archtab',$data);
  }

  public function getAllDepartments(){
    $this->db->select('id,username,dep_type');
    $query = $this->db->get('archtab');
    $result = $query->result();
    return $result;
  }

  public function getDepartmentUserById($id){
    $this->db->where('id',$id);
    $this->db->select('id,username,dep_type');
    $query = $this->db->get('archtab')->row();
    return $query;
  }

  public function insertKanTitle($data){
    $this->db->insert('kantitle',$data);
  }

  public function deleteKanTitleById($id){
    $this->db->where('id',$id);
    $this->db->delete('kantitle');
  }

}
