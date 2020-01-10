<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	private $flowId = 0;
	function __construct(){
		parent::__construct();
		$this->load->model('AddJobModel','addjob');
		$this->load->model('FlowchartModel','flowmodel');
		$this->flowId = $this->flowmodel->getFlowByLastId();
	}

	public function index(){
    $data = 'DashBoard';
		$classer = 'mm-active';
		$this->load->view('common/header',[
			'title' => $data,
			'activeclass' =>$classer
		]);
    $this->load->view('dynamicContent/dashboard/index');
    $this->load->view('common/footer',[
			'getFlow' => json_decode($this->flowId->json_data),
		]);
	}

	public function settings(){
    $data['title'] = 'Settings';
		$this->load->view('common/header',$data);
    $this->load->view('dynamicContent/dashboard/settings');
    $this->load->view('common/footer');
	}

	public function projectReview(){
    $data['title'] = 'Project Review';
		$this->load->view('common/header',$data);
    $this->load->view('dynamicContent/dashboard/projectReview');
    $this->load->view('common/footer');
	}

  public function help(){
    $data['title'] = 'Help';
		$this->load->view('common/header',$data);
    $this->load->view('dynamicContent/dashboard/help');
    $this->load->view('common/footer');
	}

	public function userProfile(){
    $data['title'] = 'User Profile';
		$this->load->view('common/header',$data);
    $this->load->view('dynamicContent/dashboard/userprofile');
    $this->load->view('common/footer');
	}
}
