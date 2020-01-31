<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KanModel extends CI_Model {

  function __construct(){
    parent::__construct();
    $this->load->database();
  }

  public function insertKanbanData($data){

  }

  public function getAllKanbanData(){
    $query = $this->db->get('kanbantab');
    $result = $query->result();
    return $result;
  }

  public function updateKanbanData($id, $data){
    $this->db->where('id',$id);
    $this->db->update('kanbantab',$data);
  }

}
