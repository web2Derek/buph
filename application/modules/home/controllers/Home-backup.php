<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
	public function __construct() {
    parent::__construct();

  }

	public function index()	{
		$this->load_page('dashboard','');
		// if($this->session->userdata('logged_in')) {
		//  } else {
		// 	 redirect(base_url('login'));
		//  }


		//	$this->load_page('index','');
		// $parameters['select'] = 'fullname,username';
		// $data = getrow('tbl_users',$parameters);
		// json($data,false);
		// $this->load_page('index',$data);
	}

	public function chartData() {
		$data = array();
		$params['select'] = 'branch_name';
		$result = $this->MY_Model->getRows('tbl_branch', $params);
		echo json_encode($result);
	}

}
