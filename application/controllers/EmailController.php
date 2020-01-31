<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EmailController extends CI_Controller {

  public function __construct() {
    parent:: __construct();

    $this->load->helper('url');
  }

  public function index() {
    $data['title'] = 'Send Mail';
    $this->load->view('common/header',$data);
    $this->load->view('dynamicContent/email/contact');
    $this->load->view('common/footer');
  }

  public function send() {
    $this->load->config('email');
    $this->load->library('email');

    $from = $this->config->item('smtp_user');
    $to = $this->input->post('to');
    $subject = $this->input->post('subject');
    $message = $this->input->post('message');

    $this->email->set_newline("\r\n");
    $this->email->from($from);
    $this->email->to($to);
    $this->email->subject($subject);
    $this->email->message($message);

    if ($this->email->send()) {
      echo 'Your Email has successfully been sent.';
    } else {
      show_error($this->email->print_debugger());
    }
  }
}
