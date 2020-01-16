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
			'jt'=>json_decode($this->getJobTitle()),
		]);
    $this->load->view('common/footer');
	}

	public function insertCandidate(){
		$this->load->library('form_validation');
		$rules = array(
      array(
        'field'=>'first_name',
        'label'=>'First Name',
        'rules'=>'required',
        'errors'=>array(
          'required'=>'%s is required',
        )
      ),
      array(
        'field'=>'last_name',
        'label'=>'Last Name',
        'rules'=>'required',
        'errors'=>array(
          'required'=>'%s is required'
        )
      ),
      array(
        'field'=>'age',
        'label'=>'Age',
        'rules'=>'required',
        'errors'=>array(
          'required'=>'%s is required'
        )
      ),
			array(
				'field'=>'address',
				'label'=>'Address',
				'rules'=>'required',
				'errors'=>array(
					'required'=>'%s is required'
				)
			),
			array(
				'field'=>'gender',
				'label'=>'Gender',
				'rules'=>'required',
				'errors'=>array(
					'required'=>'%s is required'
				)
			),
			array(
				'field'=>'mobile_no',
				'label'=>'Mobile No',
				'rules'=>'required|is_unique[cantab.mobile_no]',
				'errors'=>array(
					'required'=>'%s is required',
					'is_unique'=>'Please try another mobile number'
				)
			),
			array(
				'field'=>'email',
				'label'=>'Email',
				'rules'=>'required|is_unique[cantab.email]',
				'errors'=>array(
					'is_unique'=>'Please try another email',
					'required'=>'%s is required'
				)
			),
			array(
				'field'=>'apply_position',
				'label'=>'Apply Position',
				'rules'=>'required',
				'errors'=>array(
					'required'=>'%s is required'
				)
			),
			array(
				'field'=>'experience',
				'label'=>'Experience',
				'rules'=>'required',
				'errors'=>array(
					'required'=>'%s is required'
				)
			),
			array(
				'field'=>'skills',
				'label'=>'Skills',
				'rules'=>'required',
				'errors'=>array(
					'required'=>'%s is required'
				)
			),
    );
    $this->form_validation->set_rules($rules);

		if($this->form_validation->run() === FALSE){
			$this->addCan();
		}else{
			$data = array(
				'first_name'=>$this->input->post('first_name'),
				'middle_name'=>$this->input->post('middle_name'),
				'last_name'=>$this->input->post('last_name'),
				'age'=>$this->input->post('age'),
				'address'=>$this->input->post('address'),
				'gender'=>$this->input->post('gender'),
				'mobile_no'=>$this->input->post('mobile_no'),
				'email'=>$this->input->post('email'),
				'apply_position'=>$this->input->post('apply_position'),
				'experience'=>$this->input->post('experience'),
				'expect_salary'=>$this->input->post('expect_salary'),
				'skills'=>$this->input->post('skills'),
			);
			$this->canmodel->insertCandidate($data);
			redirect('CandidateList/viewCan');
		}
	}

	public function updateCandidate(){
		$id = $this->input->post('canid');
		$data = array(
			'sort_listed'=>1,
		);
		if($this->canmodel->updateCandidate($id, $data)){
			echo json_encode(array("status"=>true));
		}else{
			echo json_encode(array("status"=>false));
		}
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

	public function getCandidateSort(){
		$getSort = $this->canmodel->getCandidateSort();
		echo json_encode($getSort);
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

	private function getJobTitle(){
		$getJobT = $this->canmodel->getJobTitle();
		return json_encode($getJobT);
	}
}
