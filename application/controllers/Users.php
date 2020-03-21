<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

  function __construct(){
    parent::__construct();
    $this->load->model('UserModel','umodel');
    $this->load->model('DepartmentModel','departmodel');
    $this->load->library('form_validation');
    if(!$this->session->userdata('id')){
      redirect('Login/login');
    }
  }

  public function addUsers(){
    $data = 'Add Users';
    $classer = 'mm-active';
    $depType = $this->departmodel->getAllDepartments();
    $this->load->view('common/header',[
      'title' => $data,
      //'activeclass' =>$classer
    ]);
    $this->load->view('dynamicContent/users/addUser',[
      'depType' => $depType
    ]);
    $this->load->view('common/footer');
  }

  public function insertUser(){
    $rules = array(
      array(
        'field'=>'username',
        'label'=>'Username',
        'rules'=>'required|is_unique[archtab.username]',
        'errors'=>array(
          'required'=>'%s is required',
          'is_unique'=>'%s already exists'
        )
      ),
      array(
        'field'=>'password',
        'label'=>'Password',
        'rules'=>'required',
        'errors'=>array(
          'required'=>'%s is required'
        )
      ),
      array(
        'field'=>'dep-type',
        'label'=>'Department Type',
        'rules'=>'required',
        'errors'=>array(
          'required'=>'%s is required'
        )
      )
    );
    $this->form_validation->set_rules($rules);
    $this->form_validation->set_error_delimiters("<div class='error'>","</div>");
    $this->form_validation->set_message('required','Enter %s');
    $options =[
      'cost'=>10,
    ];
    if($this->form_validation->run() === FALSE){
      $this->session->set_flashdata('error','user signing failed');
      $this->addUsers();
    }else{
      $data = array(
        'username'=>$this->input->post('username'),
        'password'=>password_hash(($this->input->post('password')), PASSWORD_BCRYPT, $options),
        'dep_type'=>$this->input->post('dep-type')
      );
      $this->umodel->insertUser($data);
      $this->session->set_flashdata('success','user signing success');
      redirect('Users/addUsers');
    }
  }

  public function getAllUsers(){
    $getUsers = $this->umodel->getAllUsers();
    echo json_encode($getUsers);
  }

}
