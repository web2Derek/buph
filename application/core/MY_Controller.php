<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends MX_Controller {

	public function __construct(){
		$route = $this->router->fetch_class();

		if($route == 'login'){
			if($this->session->has_userdata('logged_in') && $this->session->has_userdata('user_type') == 0){
				redirect(base_url("home"));
			}
		} else {
			if(!$this->session->has_userdata('logged_in') && $this->session->has_userdata('user_type') == 0){
				redirect(base_url());
			}
		}

	}


	public function load_page($page, $data = array()) {
		$this->load->view('includes/head',$data);
		$this->load->view($page,$data);
		$this->load->view('includes/footer',$data);
}

	public function login_page($page, $data= array()) {
		$this->load->view('includes/login/head');
		$this->load->view($page , $data);
		$this->load->view('includes/login/footer');
	}

	public function load_member($page, $data= array()) {
			$this->load->view('includes/members/head');
			$this->load->view($page , $data);
			$this->load->view('includes/members/footer');
	}

	public function load_insurance($page, $data = array()) {
		$this->load->view('includes/head', $data);
		$this->load->view($page,$data);
		$this->load->view('includes/footer',$data);
	}

	public function load_member_page($page ,$data = array()) {
	$this->load->view('includes/member_page/head', $data);
	$this->load->view($page, $data);
	$this->load->view('includes/member_page/footer', $data);
}
	// public function add_insurance() {
	//
	// }

}
