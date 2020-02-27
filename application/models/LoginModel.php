<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Model {

  function __construct(){
    parent::__construct();
    $this->load->database();
  }

  public function user_validation($username){
    //$this->db->where('username',$username);
    //$result = $this->db->get('archtab',1);
    $result = $this->db->query('SELECT
      ats.id,
      ats.username,
      ats.password,
      ats.dep_type,
      dt.dep_type AS dep_name
        FROM `archtab` AS ats
          JOIN `deptab` AS dt
            ON ats.dep_type = dt.id
      WHERE ats.username = "'.$username.'"
      LIMIT 1
    ');
    return $result;
  }
}
