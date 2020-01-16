<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CandidateModel extends CI_Model {

  function __construct(){
    parent::__construct();
    $this->load->database();
  }

  public function insertCandidate($data){
    $this->db->insert('cantab',$data);
  }

  public function updateCandidate($id,$data){
    $this->db->where('id',$id);
    return $this->db->update('cantab',$data);
  }

  public function getAllCandidate(){
    $query = $this->db->get('cantab');
    $result = $query->result();
    return $result;
  }

  public function getCandidateById($id){
    $this->db->where('id',$id);
    $query = $this->db->get('cantab')->row();
    return $query;
  }

  public function getCandidateSort(){
    $this->db->where('cantab.sort_listed !=',0,FALSE);
    $query = $this->db->get('cantab');
    $result = $query->result();
    return $result;
  }

  public function getJobTitle(){
    $this->db->select('job_title');
    $query = $this->db->get('jobtab');
    $result = $query->result();
    return $result;
  }

  public function deleteCandidate($id){

  }
}
