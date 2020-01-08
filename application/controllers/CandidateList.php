<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CandidateList extends CI_Controller {

	private $flowId = 0;

	function __construct(){
		parent::__construct();
		$this->load->model('FlowchartModel','flowmodel');
		$this->flowId = $this->flowmodel->getFlowByLastId();
	}

	public function viewCan(){
    $data = 'View Candidates';
		$this->load->view('common/header',[
			'title' => $data
		]);
    $this->load->view('dynamicContent/candidatesList/viewCandidates',[
			'getFlow' => json_decode($this->flowId->json_data),
		]);
    $this->load->view('common/footer');
	}

  public function sortCan(){
    $data = 'SortList Candidates';
		$this->load->view('common/header',[
			'title' => $data
		]);
    $this->load->view('dynamicContent/candidatesList/sortListCandidates',[
			'getFlow' => json_decode($this->flowId->json_data),
		]);
    $this->load->view('common/footer');
	}

  public function interCan(){
    $data = 'Interview Candidates';
		$this->load->view('common/header',[
			'title' => $data
		]);
    $this->load->view('dynamicContent/candidatesList/interview',[
			'getFlow' => json_decode($this->flowId->json_data),
		]);
    $this->load->view('common/footer');
	}

	public function getFlowByLastId(){
    $getFlowLastId = $this->flowmodel->getFlowByLastId();
    echo json_encode($getFlowLastId->json_data);
  }
}
