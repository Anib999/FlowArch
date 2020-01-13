<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CandidateList extends CI_Controller {

	private $flowId = 0;

	function __construct(){
		parent::__construct();
		$this->load->model('FlowchartModel','flowmodel');
		$this->load->model('CandidateModel','canmodel');
		$this->flowId = $this->flowmodel->getFlowByLastId();
		if(!$this->session->userdata('id')){
			redirect('Login/login');
		}
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

	public function addCan(){
    $data = 'Add Candidates';
		$this->load->view('common/header',[
			'title' => $data
		]);
    $this->load->view('dynamicContent/candidatesList/addCandidates',[
			'district'=> json_decode($this->getDis()),
		]);
    $this->load->view('common/footer');
	}

	public function insertCandidate(){
		$this->load->library('form_validation');
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

	public function getAllCandidate(){
		$getAllCan = $this->canmodel->getAllCandidate();
		echo json_encode($getAllCan);
	}

	public function getCandidateById(){
		$getCanId = $this->canmodel->getCandidateById($_POST['canid']);
		echo json_encode($getCanId);
	}

	private function getDis(){
		return file_get_contents(FCPATH.'assets/district.json');
	}
}
