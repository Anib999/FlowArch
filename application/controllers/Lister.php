<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lister extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('KanModel','kmodel');
		$this->load->library('form_validation');
	}

	public function drag(){
		$data = 'Drag';
		$this->load->view('common/header',[
			'title' => $data,
		]);
		$this->load->view('dynamicContent/lister/drag');
		$this->load->view('common/footer');
	}

	public function dragDep(){
		$data = 'Drag Dep';
		$this->load->view('common/header',[
			'title' => $data,
		]);
		$this->load->view('dynamicContent/lister/dragDep');
		$this->load->view('common/footer');
	}

	public function dragTable(){
		$data = 'Drag Table';
		$this->load->view('common/header',[
			'title' => $data,
		]);
		$this->load->view('dynamicContent/lister/dragToTable');
		$this->load->view('common/footer');
	}

	public function insertKanbanData(){
		$data = array(
			'data'=>$this->input->post('modal_job_title'),
			'job_description'=>$this->input->post('modal_job_description'),
			'job_priority'=>$this->input->post('job_priority'),
			'job_stage'=>$this->input->post('job_stage'),
			'date_of_completion'=>$this->input->post('date_of_completion'),
			'status'=>$this->input->post('this_stat'),
			'dep_type'=>$this->session->userdata('dep_type')
		);
		$reData = $this->kmodel->insertKanbanData($data);
		echo json_encode($reData);
	}

	public function getAllKanbanData(){
		$getKan = $this->kmodel->getAllKanbanData();
		$getKanTitle = $this->kmodel->getAllKanTitle();

		echo json_encode(array('kandata'=>$getKan,'kantitle'=>$getKanTitle));
	}

	public function insertKanbanDataForm(){
		$posted_by = 0;
		if($this->session->userdata('dep_type') != $this->input->post('dep_type')){
			$posted_by = $this->session->userdata('dep_type');
		}
		$rules = array(
      array(
        'field'=>'modal_job_title',
        'label'=>'Job Name',
        'errors'=>array(
          'is_unique'=>'%s already exists',
        ),
      ),
      array(
        'field'=>'dep_type',
        'label'=>'Department',
        'rules'=>'required',
        'errors'=>array(
          'required'=>'%s is required'
        )
      )
    );
    $this->form_validation->set_rules($rules);
    $this->form_validation->set_error_delimiters("<div class='error'>","</div>");
    $this->form_validation->set_message('required','Enter %s');
		if($this->form_validation->run() == FALSE){
			redirect('Department/postJobDep');
		}else{
			$data = array(
				'data'=>$this->input->post('modal_job_title'),
				'job_description'=>$this->input->post('modal_job_description'),
				'job_priority'=>$this->input->post('job_priority'),
				'job_stage'=>$this->input->post('job_stage'),
				'date_of_completion'=>$this->input->post('date_of_completion'),
				'status'=>$this->input->post('status'),
				'dep_type'=>$this->input->post('dep_type'),
				'posted_by'=>$posted_by
			);
			$this->kmodel->insertKanbanData($data);
			redirect('Department/viewDepWiseJob');
		}
	}

	public function getKanbanDataDep(){
		$getKanDep = $this->kmodel->getKanbanDataDep($this->input->get('dep_type'));
		$getKanTitle = $this->kmodel->getKanTitleDep($this->input->get('dep_type'));
		$getDepIns = $this->kmodel->getKanTitleDepInsert($this->input->get('dep_type'));
		$da = [];

		foreach ($getKanDep as $value) {
			if($value->job_status != null && $value->job_status != 0){
			$da[] = $value;
			}
		}

		if($this->input->get('dep_type') == $this->session->userdata('dep_type')){
			echo json_encode(array('kandata'=>$da,'kantitle'=>$getKanTitle,'kanstatus'=>$getDepIns));
		}else{
			echo json_encode('404 Not Found');
		}
	}

	public function getKanbanDataDepTable(){
		$getKanDep = $this->kmodel->getKanbanDataDepTable($this->session->userdata('dep_type'));

		foreach ($getKanDep as $value) {
			if($value->job_status != null && $value->job_status != 0){
			$da[] = $value;
			}
		}

		if($this->session->userdata('dep_type')){
			echo json_encode(array('kandata'=>$da));
		}else{
			echo json_encode('404 Not Found');
		}
	}

	public function getKanbanDataView(){
		$getKanDep = $this->kmodel->getKanbanDataView($this->session->userdata('dep_type'));
		$getKanTitle = $this->kmodel->getAllKanTitle();
		$getKanPending = $this->kmodel->getKanbanDataPending($this->session->userdata('dep_type'));
		$getKanReject = $this->kmodel->getKanbanDataRejected($this->session->userdata('dep_type'));
		$da = [];
		if($this->session->userdata('dep_type')){
			foreach ($getKanDep as $value) {
				if($value->job_status != null && $value->job_status != 0){
					$da[] = $value;
				}
			}
			//'kanPending'=>$getKanPending,'kanReject'=>$getKanReject
			echo json_encode(array('kandata'=>$da,'kantitle'=>$getKanTitle));
		}else{
			echo json_encode('404 Not Found');
		}
	}

	public function getKanbanDataPendRej(){
		$getKanPenRej = $this->kmodel->getKanbanDataPendRej($this->session->userdata('dep_type'));
		$da = [];
		if($this->session->userdata('dep_type')){
			foreach ($getKanPenRej as $value) {
				if($value->job_status == null || $value->job_status == 0){
					$da[] = array('id'=>$value->id,'data'=>$value->data,'job_status'=>$value->job_status,'job_description'=>$value->job_description,'job_priority'=>$value->job_priority);
				}
			}
			echo json_encode($da);
		}else{
			echo json_encode('404 Not Found');
		}
	}

	public function getKanbanDataId(){
		$getKanById = $this->kmodel->getKanbanDataId($this->input->post('itemId'));
		echo json_encode($getKanById);
	}

	public function updateKanbanData(){
		$id = $this->input->post('id');
		$data = array(
			'status'=> $this->input->post('status'),
			'pre_status' => $this->input->post('pre_status')
		);
		$this->kmodel->updateKanbanData($id,$data);
	}

	public function updateModalKanData(){
		$id = $this->input->post('modallist_id');
		$data = array(
			'data'=>$this->input->post('modallist_data'),
			'job_description'=>$this->input->post('modallist_job_description'),
			'date_of_completion'=>$this->input->post('modallist_date_of_completion'),
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

	public function dragToFlow(){
		$data = 'DragFlow';
		$this->load->view('common/header',[
			'title' => $data,
		]);
		$this->load->view('dynamicContent/lister/dragToFlow');
		$this->load->view('common/footer');
	}

}
