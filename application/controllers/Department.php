<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Department extends CI_Controller {

  function __construct(){
    parent::__construct();
    $this->load->model('AddDepartmentModel','depmodel');
    $this->load->library('form_validation');
    if(!$this->session->userdata('id')){
			redirect('Login/login');
		}
  }

  public function addDepartment(){
    $data = 'Add Department';
    $classer = 'mm-active';
		$this->load->view('common/header',[
			'title' => $data,
			'activedep' =>$classer
		]);
    $this->load->view('dynamicContent/department/addDepartment');
    $this->load->view('common/footer');
  }

  public function insertDep(){
    $this->load->library('form_validation');

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
    $this->form_validation->set_error_delimiters("<div class='error'> </div>");
    $this->form_validation->set_message('required','Enter %s');
    $options =[
      'cost'=>10,
    ];
    if($this->form_validation->run() === FALSE){
      $this->addDepartment();
    }else{
      $data = array(
        'username'=>$this->input->post('username'),
        'password'=>password_hash(($this->input->post('password')), PASSWORD_BCRYPT, $options),
        'dep_type'=>$this->input->post('dep-type')
      );
      $this->depmodel->insertDepartment($data);
      redirect('Department/addDepartment');
    }
  }

  public function getAllDep(){
    $getDep = $this->depmodel->getAllDepartments();
    echo json_encode($getDep);
  }

}
