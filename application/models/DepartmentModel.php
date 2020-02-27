<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DepartmentModel extends CI_Model {

  function __construct(){
    parent::__construct();
    $this->load->database();
  }

  public function createDepartment($data){
    $this->db->insert('deptab');
  }

  public function getAllDepartments(){
    $query = $this->db->get('deptab');
    $result = $query->result();
    return $result;
  }

  public function getDepartmentById($id){
    $this->db->where('id',$id);
    $query = $this->db->get('deptab')->row();
    return $query;
  }

  public function updateDepartment($id,$data){
    $this->db->where('id',$id);
    $this->db->update('deptab',$data);
  }

}
