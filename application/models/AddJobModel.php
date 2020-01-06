<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddJobModel extends CI_Model {

  function __construct(){
    parent::__construct();
    $this->load->database();
  }

  public function insertJob($data){
    $this->db->insert('jobtab',$data);
  }

  public function updateJob($id,$data){
    $this->db->where('id',$id);
    return $this->db->update('jobtab',$data);

  }

  public function getAllJob(){
    $query = $this->db->get('jobtab');
    $result = $query->result();
    return $result;
  }

  public function getJobPostById($id){
    $this->db->where('id',$id);
    $query = $this->db->get('jobtab')->row();
    return $query;
  }
}
