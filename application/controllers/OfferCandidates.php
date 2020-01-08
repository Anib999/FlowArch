<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OfferCandidates extends CI_Controller {

	private $flowId = 0;

	function __construct(){
		parent::__construct();
		$this->load->model('FlowchartModel','flowmodel');
		$this->flowId = $this->flowmodel->getFlowByLastId();
	}

	public function offerCan(){
    $data = 'Offer Candidates';
		$this->load->view('common/header',[
			'title' => $data
		]);
    $this->load->view('dynamicContent/offerCandidates/offerCandidates',[
			'getFlow' => json_decode($this->flowId->json_data),
		]);
    $this->load->view('common/footer');
	}

  public function offerLet(){
    $data = 'Offer Letter';
		$this->load->view('common/header',[
			'title' => $data
		]);
    $this->load->view('dynamicContent/offerCandidates/offerLetter',[
			'getFlow' => json_decode($this->flowId->json_data),
		]);
    $this->load->view('common/footer');
	}

  public function onboCan(){
    $data = 'Onboard Candidates';
		$this->load->view('common/header',[
			'title' => $data
		]);
    $this->load->view('dynamicContent/offerCandidates/onboardCandidates',[
			'getFlow' => json_decode($this->flowId->json_data),
		]);
    $this->load->view('common/footer');
	}
}
