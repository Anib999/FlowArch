<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

  function __construct(){
    parent::__construct();
    $this->load->model('LoginModel','loginmo');
  }

  public function login(){
    $data['title'] = 'Login';
    $this->load->view('dynamicContent/login/login',$data);
  }

  public function auth(){
    $username= $this->input->post('username',TRUE);
    $password= $this->input->post('password',TRUE);
    $validate = $this->loginmo->user_validation($username, $password);
    if($validate->num_rows() > 0){
      $data = $validate->row_array();
      $sesdata = array(
        'id'=>$data['id'],
        'username'=>$data['username'],
        'dep_type'=>$data['dep_type']
      );
      $this->session->set_userdata($sesdata);
      redirect('Dashboard/index');
    }else{
      redirect('Login/login');
    }
  }

  public function logout(){
    $this->session->sess_destroy();
    redirect('Login/login');
  }

}
