<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portal extends CI_Controller {

  function __construct(){
    parent::__construct();
    $this->load->model('AddJobModel','addjob');
  }

	public function addJob(){
    $data = 'Add Job';
    $classer = 'mm-active';
		$this->load->view('common/header',[
			'title' => $data,
			'activejob' =>$classer
		]);
    $this->load->view('dynamicContent/portal/addJob');
    $this->load->view('common/footer');
	}

  public function insertJ(){
    $newDate = new DateTime();
    $data = array(
      'job_title'=>$this->input->post('job_title'),
      'job_desc'=>$this->input->post('job_desc'),
      'posted_date'=>$newDate->format('c'),
      'posted_by'=>$this->session->userdata('id')
    );
    //this posted_by comes from session id with name
    $this->addjob->insertJob($data);
    redirect('Dashboard/index');
  }

  public function updateJ(){
    $id = $this->input->post('idview');
    $data = array(
      'your_message'=>$this->input->post('your_message'),
      'status_ar'=>$this->session->userdata('id'),
      'status'=>$this->input->post('status'),
    );
    if($this->addjob->updateJob($id, $data)){
      echo json_encode(array("status"=>true));
    }else{
      echo json_encode(array("status"=>false));
    }
  }

  public function getAllJobPost(){
    $getJob = $this->addjob->getAllJob();
    echo json_encode($getJob);
  }

  public function getJobPostById(){
    $getJobPost = $this->addjob->getJobPostById($_GET['userid']);
    echo json_encode($getJobPost);
  }
}
