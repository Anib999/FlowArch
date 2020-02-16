<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lister extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('KanModel','kmodel');
	}

	public function drag(){
    $data = 'Drag';
		$this->load->view('common/header',[
			'title' => $data,
		]);
    $this->load->view('dynamicContent/lister/drag');
    $this->load->view('common/footer');
	}

	public function insertKanbanData(){
		$data = array(
			'data'=>$this->input->post('modal_job_title'),
			'job_description'=>$this->input->post('modal_job_description'),
			'job_priority'=>$this->input->post('job_priority'),
			'job_stage'=>$this->input->post('job_stage'),
			'status'=>0
		);
		$this->kmodel->insertKanbanData($data);
	}

	public function getAllKanbanData(){
		$getKan = $this->kmodel->getAllKanbanData();
		$getKanTitle = $this->kmodel->getAllKanTitle();

		echo json_encode(array('kandata'=>$getKan,'kantitle'=>$getKanTitle));
	}

	public function updateKanbanData(){
		$id = $this->input->post('id');
		$data = array(
			'status'=> $this->input->post('status'),
		);
		$this->kmodel->updateKanbanData($id,$data);
	}

}
