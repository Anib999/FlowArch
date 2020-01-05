<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index(){
    $data['title'] = 'DashBoard';
		$this->load->view('common/header',$data);
    $this->load->view('dynamicContent/dashboard/index');
    $this->load->view('common/footer');
	}

  public function help(){
    $data['title'] = 'Help';
		$this->load->view('common/header',$data);
    $this->load->view('dynamicContent/dashboard/help');
    $this->load->view('common/footer');
	}
}
