<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
	public function __construct() {
    parent::__construct();

  }

	public function index()	{
		if($this->session->userdata('logged_in')) {
			 	$this->load_page('dashboard','');
		 } else {
			 redirect(base_url('login'));
		 }


		//	$this->load_page('index','');
		// $parameters['select'] = 'fullname,username';
		// $data = getrow('tbl_users',$parameters);
		// json($data,false);
		// $this->load_page('index',$data);
	}

	public function chartData() {
		$data['select'] = 'branch_name,
		 (SELECT COUNT(tbl_mem_personal_information.member_id) FROM tbl_account_info
		 JOIN tbl_mem_personal_information ON tbl_mem_personal_information.member_id = tbl_account_info.member_id
		  WHERE branch = tbl_branch.branch_id AND tbl_account_info.branch = tbl_branch.branch_id
		  limit 1) as member_per_branch';
		$where = array();
		$result = $this->MY_Model->getRows('tbl_branch', $data);
		echo json_encode($result);
	}

// GET NUMBER OF MEMBER BY DATA TYPE
	public function getDataType() {
		$post = $this->input->post();
		$member_type = $post['member_type'];
		$type = 0;
		if($post['member_type'] === 'Associate') {
				$type = 2;
		} elseif($post['member_type'] === 'Regular') {
				$type = 6;
		} elseif($post['member_type'] === 'Smart Teens/Young Save') {
				$type = 3;
		}

		$data['select'] = 'branch_name,
		(SELECT COUNT(tbl_mem_personal_information.member_id) FROM tbl_account_info
		JOIN tbl_mem_personal_information ON tbl_mem_personal_information.member_id = tbl_account_info.member_id
		WHERE branch = tbl_branch.branch_id
		AND tbl_mem_personal_information.member_type_id = '.$type.'
		limit 1) as member_per_branch';
		$result = $this->MY_Model->getRows('tbl_branch', $data);
		echo json_encode($result);
	}

// FUNCTION FOR GETTING ALL MEMBER TYPE
	public function getAllType() {
		$post = $this->input->post();
		$member_type = $post['member_type'];
		$type = 0;

		if($post['member_type'] === 'Regular Male') {
				$type = 6;
				$gender = 'Male';
		} elseif($post['member_type'] === 'Regular Female') {
				$type = 6;
				$gender = 'Female';
		} elseif($post['member_type'] === 'Smart Teens/Young Savers Male') {
				$type = 3;
				$gender = 'Male';
		} elseif($post['member_type'] === 'Smart Teens/Young Savers Female') {
				$type = 3;
				$gender = 'Female';
		} elseif($post['member_type'] === 'Associate Male') {
				$type = 2;
				$gender = 'Male';
		} elseif($post['member_type'] === 'Associate Female') {
				$type = 2;
				$gender = 'Female';
		} else {
			echo json_encode('No Member Type Selected');
		}

		$data['select'] = 'branch_name,
		(SELECT COUNT(tbl_mem_personal_information.member_id) FROM tbl_account_info
		JOIN tbl_mem_personal_information ON tbl_mem_personal_information.member_id = tbl_account_info.member_id
		WHERE branch = tbl_branch.branch_id AND gender = "'.$gender.'"
		AND tbl_mem_personal_information.member_type_id = '.$type.'
		limit 1) as member_per_branch';
		$result = $this->MY_Model->getRows('tbl_branch', $data);
		echo json_encode($result);
	}


	public function ageMemRange() {
	error_reporting(E_ALL);
	ini_set('display_errors', 0);

		$ageRange = $this->MY_Model->raw('
				SELECT
				case
					when age between 18 and 30 then "18 - 30"
					when age between 31 and 35 then "31 − 35"
	        when age between 36 and 40 then "36 − 40"
	        when age between 41 and 50 then "41 − 50"
	        when age between 51 and 60 then "51 − 60"
	        when age between 61 and 70 then "61 − 70"
      	end as range_data,
       gender,
       count(*) as count
    	from (select *, TIMESTAMPDIFF(YEAR,birthdate,CURDATE()) AS ages
			from tbl_mem_personal_information WHERE gender = "Male") as t group by range_data','array');

			$ageRangeFemale = $this->MY_Model->raw('
					SELECT
					case
						when age between 18 and 30 then "18 - 30"
						when age between 31 and 35 then "31 − 35"
						when age between 36 and 40 then "36 − 40"
						when age between 41 and 50 then "41 − 50"
						when age between 51 and 60 then "51 − 60"
						when age between 61 and 70 then "61 − 70"
					end as range_data,
				 gender,
				 count(*) as count
				from (select *, TIMESTAMPDIFF(YEAR,birthdate,CURDATE()) AS ages
				from tbl_mem_personal_information WHERE gender = "Female") as t group by range_data','array');

			$newArr = array('male' => $ageRange, 'female' => $ageRangeFemale);
			echo json_encode($newArr);
	}

//END OF FILE
}
