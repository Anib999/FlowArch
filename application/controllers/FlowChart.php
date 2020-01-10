<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FlowChart extends CI_Controller {

  function __construct(){
    parent::__construct();
    $this->load->model('FlowchartModel','flowmodel');
  }

	public function flowCreateView(){
    $data['title'] = 'Flow Charts';
		$this->load->view('common/header',$data);
    $this->load->view('dynamicContent/flowchart/flowCreateView');
    $this->load->view('common/footer');
	}

  public function getAllFlows(){
    $getFlow = $this->flowmodel->getAllFlow();
    echo json_encode($getFlow);
  }

  public function viewFlowChart(){
    $data['title'] = 'View Flowchart';
    $this->load->view('common/header',$data);
    $this->load->view('dynamicContent/flowchart/viewFlowChart');
    $this->load->view('common/footer');
  }

  public function getFlowById(){
    $getFlowId = $this->flowmodel->getFlowById($_GET["id"]);
    echo json_encode($getFlowId->json_data);
  }

  public function viewFlows(){
    $data['title'] = 'View Flows';
    $this->load->view('common/header',$data);
    $this->load->view('dynamicContent/flowchart/viewFlows');
    $this->load->view('common/footer');
  }

  public function getFlowByLastId(){
    $getFlowLastId = $this->flowmodel->getFlowByLastId();
    echo json_encode($getFlowLastId->json_data);
  }

  public function flowCreateUpdate(){
    $data['title'] = 'Create FlowChart';
    $this->load->view('common/header',$data);
    $this->load->view('dynamicContent/flowchart/flowCreateUpdate',[
      'operators' => $this->operators(),
    ]);
    $this->load->view('common/footer');
  }

  public function insertFlow(){
    $newDate = new DateTime();
    $data = array(
      'json_data'=>$this->input->post('savedDa'),
      'created_date'=>$newDate->format('c'),
      'modified_date'=>$newDate->format('c')
    );
    $this->flowmodel->insertFlow($data);
    redirect('FlowChart/flowCreateView');
  }

  public function updateFlow(){
    $newDate = new DateTime();
    $id = $this->input->post('did');
    $data = array(
      'json_data'=>$this->input->post('savedDa'),
      'modified_date'=>$newDate->format('c')
    );
    $this->flowmodel->updateFlow($id,$data);
    redirect('FlowChart/flowCreateView');
  }

  private function operators(){
    return array(
      array(
        'title'=>'HR',
        'inputs'=>0,
        'outputs'=>1,
        'label'=>'Human Resource',
        'icons'=>'fa-user'
      ),
      array(
        'title'=>'Post Job',
        'inputs'=>1,
        'outputs'=>2,
        'label'=>'Post Job',
        'icons'=>'fa-id-badge'
      ),
      array(
        'title'=>'LinkedIn',
        'inputs'=>1,
        'outputs'=>0,
        'label'=>'Job Portal',
        'icons'=>'fa-linkedin-square'
      ),
      array(
        'title'=>'View Candidates',
        'inputs'=>1,
        'outputs'=>1,
        'label'=>'View Candidates',
        'icons'=>'fa-drivers-license'
      ),
      array(
        'title'=>'SortList',
        'inputs'=>1,
        'outputs'=>2,
        'label'=>'SortList Candidate',
        'icons'=>'fa-edit'
      ),
      array(
        'title'=>'Interview',
        'inputs'=>1,
        'outputs'=>1,
        'label'=>'Interview Candidate',
        'icons'=>'fa-users'
      ),
      array(
        'title'=>'Offer Candidate',
        'inputs'=>1,
        'outputs'=>1,
        'label'=>'Offer Candidate',
        'icons'=>'fa-handshake-o'
      ),
      array(
        'title'=>'Offer Letter',
        'inputs'=>2,
        'outputs'=>1,
        'label'=>'Offer Letter',
        'icons'=>'fa-envelope-open'
      ),
      array(
        'title'=>'Onboarding',
        'inputs'=>1,
        'outputs'=>0,
        'label'=>'Onboarding',
        'icons'=>'fa-child'
      )
    );
  }
}
