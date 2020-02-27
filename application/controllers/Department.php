<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Department extends CI_Controller {
  private $jobStatusLimit = 2;
  function __construct(){
    parent::__construct();
    $this->load->model('AddDepartmentModel','depmodel');
    $this->load->model('KanModel','kanmodel');
    $this->load->model('DepartmentModel','departmodel');
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

  public function addDepwise(){
    $data = 'Add Dep Job';
    $classer = 'mm-active';
    $depType = $this->departmodel->getAllDepartments();
    $this->load->view('common/header',[
      'title' => $data,
      'activedepwise' =>$classer
    ]);
    $this->load->view('dynamicContent/department/addDepwise',[
      'depType' => $depType
    ]);
    $this->load->view('common/footer');
  }

  public function insertKanTitle(){
    $this->load->library('form_validation');

    $rules = array(
      array(
        'field'=>'add_status',
        'label'=>'Status',
        'rules'=>'required|is_unique[kantitle.title]',
        'errors'=>array(
          'is_unique'=>'%s already exists',
          'required'=>'%s is required'
        ),
      ),
      array(
        'field'=>'add_dep_type',
        'label'=>'Department',
        'rules'=>'required',
        'errors'=>array(
          'required'=>'%s is required'
        )
      )
    );
    $this->form_validation->set_rules($rules);
    $this->form_validation->set_error_delimiters("<div class='error'>","</div>");
    $this->form_validation->set_message('required','Enter %s');
    if($this->form_validation->run() === FALSE){
      $this->addDepwise();
    }else{
      $data = array(
        'title'=>$this->input->post('add_status'),
        'dep_type'=>$this->input->post('add_dep_type')
      );
      if(count($this->kanmodel->getKanTitleDep( $this->input->post('add_dep_type') )) < $this->jobStatusLimit){
        $this->depmodel->insertKanTitle($data);
        $this->session->set_flashdata('success','status added');
        redirect('Department/addDepwise');
      }else{
        $this->session->set_flashdata('error','row count exceeded');
        $this->addDepwise();
      }
    }
  }

  public function getAllDep(){
    $getDep = $this->depmodel->getAllDepartments();
    echo json_encode($getDep);
  }

  public function deleteKanTitleById(){
    //deletes both title and its contents
    $id = $this->input->post('kanTitleId');
    $this->depmodel->deleteKanTitleById($id);
    $this->kanmodel->deleteKanbanById($id);
    echo "title deleted";
  }

  public function viewDepWiseJob(){
    $data = 'View Dep Job';
    $classer = 'mm-active';
    $this->load->view('common/header',[
      'title' => $data,
      //'activedepwise' =>$classer
    ]);
    $this->load->view('dynamicContent/department/viewDepWiseJob');
    $this->load->view('common/footer');
  }

  public function postJobDep(){
    $data = 'Post Job Department';
    $classer = 'mm-active';
    $depType = $this->departmodel->getAllDepartments();
    $this->load->view('common/header',[
      'title' => $data,
      //'activedepwise' =>$classer
    ]);
    $this->load->view('dynamicContent/department/postJobDep',[
      'depType' => $depType
    ]);
    $this->load->view('common/footer');
  }

  public function createDepartment(){
    $rules = array(
      array(
        'field'=>'dep_name',
        'label'=>'Department Name',
        'rules'=>'required|is_unique[deptab.dep_type]',
        'errors'=>array(
          'is_unique'=>'%s already exists',
          'required'=>'%s is required'
        )
      ),
      array(
        'field'=>'dep_keyword',
        'label'=>'Keywords',
        'rules'=>'required',
        'errors'=>array(
          'is_unique'=>'%s already exists',
          'required'=>'%s are required'
        )
      )
    );
    $this->form_validation->set_rules($rules);
    $this->form_validation->set_error_delimiters("<div class='error'>","</div>");
    $this->form_validation->set_message('required','Enter %s');
    if($this->form_validation->run() == FALSE){
      $this->addDepartment();
    }else{
      $key_data = strtolower($this->input->post('dep_keyword'));
      if($key_data != ''){
        $key_data = serialize( array_flip(array_unique(explode(',',$key_data)) ) );
      }
      $data = array(
        'dep_type'=>$this->input->post('dep_name'),
        'keywords'=> $key_data
      );
      $this->departmodel->createDepartment($data);
    }
  }

  public function getAllDepartmentTab(){
    $getDep = $this->departmodel->getAllDepartments();
    $da;
    foreach ($getDep as $k) {
      if($k->keywords != ''){
        $keyworder = join(',',array_keys(unserialize($k->keywords)));
        $da[] = array('id'=>$k->id, 'dep_type'=>$k->dep_type,'keywords'=>$keyworder);
      }else{
        $da[] = array('id'=>$k->id, 'dep_type'=>$k->dep_type,'keywords'=>$k->keywords);
      }
    }
    echo json_encode($da);
  }

  public function getDepartmentById(){
    $getDepId = $this->departmodel->getDepartmentById($this->input->post('dep_id'));
    if($getDepId->keywords != ''){
      $keyworder = join(',',array_keys(unserialize($getDepId->keywords)));
      echo json_encode(array('id'=>$getDepId->id, 'dep_type'=> $getDepId->dep_type, 'keywords'=>$keyworder));
    }else{
      echo json_encode($getDepId);
    }
  }

  public function updateDepartment(){
    $id = $this->input->post('dep_id');
    $key_data = strtolower($this->input->post('dep_keywords'));
    if($key_data != ''){
      $key_data = serialize( array_flip(array_unique(explode(',',$key_data))) );
    }
    $data = array(
      'dep_type'=>$this->input->post('dep_name'),
      'keywords'=> $key_data
    );
    $this->departmodel->updateDepartment($id,$data);
  }

  public function searchDepByKeyword(){
    $keyword = explode(' ', strtolower($this->input->post('keyword')));
    $keyword = array_map(function($e){
      return trim($e);
    },$keyword);
    $depType = $this->departmodel->getAllDepartments();
    foreach ($depType as $k) {
      $keywords = unserialize($k->keywords);
      foreach ($keyword as $key) {
        if(isset($keywords[$key])){
          echo json_encode(array('departmentId'=>$k->id));
          return;
        }
      }
    }
  }

}
