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

  public function getKanbanDataDep($dep_type){
    $query = $this->db->query('SELECT
      kd.id,
      kd.data,
      kt.id AS status,
      kd.pre_status,
      kd.job_priority,
      kt.title,
      kd.job_status
      FROM `kanbantab` AS kd
        JOIN `kantitle` AS kt
          ON kd.status = kt.id
      WHERE kd.dep_type = '.$dep_type.'
      ORDER BY kd.status ASC
    ');
    $result = $query->result();
    return $result;
  }

  public function getKanbanDataView($dep_type){
    $query = $this->db->query('SELECT
      kd.id,
      kd.data,
      kt.id AS status,
      kd.pre_status,
      kd.job_priority,
      kt.title,
      kd.job_status
      FROM `kanbantab` AS kd
        JOIN `kantitle` AS kt
          ON kd.status = kt.id
      WHERE kd.posted_by = '.$dep_type.'
      ORDER BY kd.status ASC
    ');
    $result = $query->result();
    return $result;
  }

  public function getAllKanTitle(){
    $query = $this->db->get('kantitle');
    $this->db->order_by('dep_type', 'ASC');
    $result = $query->result();
    return $result;
  }

  public function getKanTitleDepInsert($dep_type){
    $this->db->where('dep_type',$dep_type);
    $query = $this->db->get('kantitle',0,1)->row();
    return $query;
  }

  public function getKanTitleDepWithId($dep_type){
    $this->db->where('dep_type',$dep_type);
    $query = $this->db->get('kantitle');
    return $query->result();
  }

  public function getKanTitleDep($dep_type){
    $query = $this->db->query('SELECT * FROM `kantitle` WHERE dep_type = '.$dep_type.'');
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

  public function getKanbanDataPending($posted_by){
    $this->db->where('job_status',null);
    $this->db->where('posted_by',$posted_by);
    $query = $this->db->get('kanbantab');
    return $query->result();
  }

  public function getKanbanDataRejected($posted_by){
    $this->db->where('job_status',0);
    $this->db->where('posted_by',$posted_by);
    $query = $this->db->get('kanbantab');
    return $query->result();
  }

  public function getKanbanDataPendRej($posted_by){
    $this->db->where('posted_by',$posted_by);
    $query = $this->db->get('kanbantab');
    return $query->result();
  }
  public function updateKanbanData($id, $data){
    $this->db->where('id',$id);
    return $this->db->update('kanbantab',$data);
  }

  public function deleteKanbanById($id){
    $this->db->where('status',$id);
    $this->db->delete('kanbantab');
  }

}
