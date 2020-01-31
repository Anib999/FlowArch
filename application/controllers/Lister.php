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

	public function getAllKanbanData(){
		$getKan = $this->kmodel->getAllKanbanData();
		echo json_encode($getKan);
	}

	public function updateKanbanData(){
		$id = $this->input->post('id');
		$data = array(
			'status'=> $this->input->post('status'),
		);
		$this->kmodel->updateKanbanData($id,$data);
	}

}
