<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KanModel extends CI_Model {

  function __construct(){
    parent::__construct();
    $this->load->database();
  }

  public function insertKanbanData($data){
    $this->db->insert('kanbantab',$data);
  }

  // public function getAllKanbanData(){
  //   $query = $this->db->get('kanbantab');
  //   $result = $query->result();
  //   return $result;
  // }

  public function getAllKanbanData(){
    $query = $this->db->query('SELECT
      kd.id,
      kd.data,
      kd.status,
      kd.job_priority,
      kt.title
      FROM `kanbantab` AS kd
        JOIN `kantitle` AS kt
          ON kd.status = kt.id
    ');
    $result = $query->result();
    return $result;
  }

  public function getAllKanTitle(){
    $query = $this->db->get('kantitle');
    $result = $query->result();
    return $result;
  }

  public function getKanbanDataId($id){
    $query = $this->db->query('SELECT
      kd.id,
      kd.data,
      kd.job_description,
      kd.job_priority,
      kd.job_stage,
      kt.title
      FROM `kanbantab` AS kd
        JOIN `kantitle` AS kt
          ON kd.status = kt.id
      WHERE kd.id = '.$id.'
    ')->row();
    return $query;
  }

  public function updateKanbanData($id, $data){
    $this->db->where('id',$id);
    $this->db->update('kanbantab',$data);
  }

  public function deleteKanbanById($id){
    $this->db->where('id',$id);
    $this->db->delete('kanbantab');
  }

}
