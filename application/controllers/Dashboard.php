<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('AddJobModel','addjob');
	}

	public function index(){
    $data = 'DashBoard';
		$this->load->view('common/header',[
			'title' => $data
		]);
		//$getJob = $this->addjob->getAllJob();
    $this->load->view('dynamicContent/dashboard/index');
    $this->load->view('common/footer');
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
}
