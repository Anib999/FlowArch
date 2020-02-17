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
			'status'=>1
		);
		$this->kmodel->insertKanbanData($data);
	}

	public function getAllKanbanData(){
		$getKan = $this->kmodel->getAllKanbanData();
		$getKanTitle = $this->kmodel->getAllKanTitle();

		echo json_encode(array('kandata'=>$getKan,'kantitle'=>$getKanTitle));
	}

	public function getKanbanDataId(){
		$getKanById = $this->kmodel->getKanbanDataId($this->input->post('itemId'));
		echo json_encode($getKanById);
	}

	public function updateKanbanData(){
		$id = $this->input->post('id');
		$data = array(
			'status'=> $this->input->post('status'),
		);
		$this->kmodel->updateKanbanData($id,$data);
	}

	public function updateModalKanData(){
		$id = $this->input->post('modallist_id');
		$data = array(
			'data'=>$this->input->post('modallist_data'),
			'job_description'=>$this->input->post('modallist_job_description'),
			'job_priority'=>$this->input->post('modallist_job_priority'),
			'job_stage'=>$this->input->post('modallist_job_stage'),
		);
		$returnData = $this->kmodel->updateKanbanData($id,$data);
		echo json_encode($returnData);
	}

	public function deleteKanbanById(){
		$id = $this->input->post('kan_id');
		$this->kmodel->deleteKanbanById($id);
		echo 'Job Deleted';
	}
}
