<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Department extends CI_Controller {

  function __construct(){
    parent::__construct();
    $this->load->model('AddDepartmentModel','depmodel');
    $this->load->library('form_validation');
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
    $data = array(
      'username'=>$this->input->post('username'),
      'password'=>$this->input->post('password'),
      'dep_type'=>$this->input->post('dep-type')
    );
    $this->depmodel->insertDepartment($data);
    redirect('Department/addDepartment');
  }

  public function getAllDep(){
    $getDep = $this->depmodel->getAllDepartments();
    echo json_encode($getDep);
  }

}
