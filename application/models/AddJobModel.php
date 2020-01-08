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
    // $query = $this->db->get('jobtab');
    $query = $this->db->query('SELECT
      j.id,
      j.job_title,
      j.job_desc,
      ar.username AS posted_by,
      j.status,
      j.posted_date,
      j.your_message,
      ars.username AS status_ar
        FROM `jobtab` AS j
          JOIN archtab AS ar
            ON j.posted_by = ar.id
          LEFT JOIN archtab AS ars
            ON j.status_ar= ars.id'
      );
    $result = $query->result();
    return $result;
  }

  public function getJobPostById($id){
    $this->db->where('id',$id);
    $query = $this->db->get('jobtab')->row();
    return $query;
  }
}
