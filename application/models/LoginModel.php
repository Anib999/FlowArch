<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Model {

  function __construct(){
    parent::__construct();
    $this->load->database();
  }

  public function user_validation($username,$password){
    $this->db->where('username',$username);
    $this->db->where('password',$password);
    $result = $this->db->get('archtab',1);
    return $result;
  }
}
