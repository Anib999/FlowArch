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

  public function createSubDepartment($data){
    $this->db->insert('subdeptab',$data);
  }

  public function getAllSubDepartments(){
    //$query = $this->db->get('subdeptab');
    $query = $this->db->query('SELECT
       sdt.id,
       sdt.sub_dep_name,
       sdt.dep_type,
       dt.dep_type AS dep_name,
       sdt.city,
       sdt.country
        FROM `subdeptab` AS sdt
          JOIN `deptab` AS dt
            ON sdt.dep_type = dt.id
       ');
    $result = $query->result();
    return $result;
  }

  public function getSubDepartmentById($id){
    $this->db->where('id',$id);
    $query = $this->db->get('subdeptab')->row();
    return $query;
  }

  public function updateSubDepartment($id,$data){
    $this->db->where('id',$id);
    $this->db->update('subdeptab',$data);
  }

}
