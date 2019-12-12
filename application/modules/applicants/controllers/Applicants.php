<?php
if(!defined('BASEPATH')) {
  exit('No direct script access allowed');
}

class Applicants extends Applicant_Controller{
  public function __construct() {
    parent::__construct();
  }

  public function index() {
    // if($this->session->userdata('logged_in')) {
    //   $this->load_member_page('member_dashboard', '');
    // } else {
      $this->load_member_page('member_login', '');
    // }
  }

  public function members_account() {
    $this->load_member('membership_form', '');
  }

  public function member_account() {

    $this->form_validation->set_rules('mem-username', 'Member Username', 'required|trim');
    $this->form_validation->set_rules('mem-password', 'Member Password', 'required|trim');
    $post = $this->input->post();

    if($this->form_validation->run() !== FALSE) {
      $mem_user = $post['mem-username'];
      $mem_pass = $post['mem-password'];
      $where['where'] = array('username' => $mem_user, 'password' => $mem_pass);
      $result = $this->MY_Model->getRows('tbl_user_credentials', $where, 'row');

      if($result){
          if ($result->user_type == 3) {
            $session = array('logged_in' => true, 'first_name' => $mem_user);
            $this->session->set_userdata($session);
            $this->members_account();
          }
        //
      } else {
        $this->session->set_flashdata('error-mem', 'Invalid Username or Password!');
        redirect(base_url('applicants'));
      }

    }

  }

  public function registration() {
    if($this->session->userdata('logged_in')) {
      $this->load_member_page('member_dashboard', '');
    } else {
      $this->load_member_page('member_registration', '');
    }
  }

// lOAD MEMBERS PAGE
  public function members_load_account() {
    if($this->session->has_userdata('logged_in')) {
        $this->load_member_page('member_page');
    } else {
      redirect(base_url('applicants'));
    }
  }

//  CHECK QR CODE AND LOGIN
  public function member_page() {
    $account_id = $this->input->post('account');
    $where['where'] = array(
      'acount_id' => $account_id
    );
    $data2 = $this->MY_Model->getRows('tbl_mem_personal_information', $where, 'rows');
    // $this->session->set_userdata($data);

    if(!empty($data2)) {
      $sesssion = array(
        'logged_in' => true
      );
      $this->session->set_userdata($sesssion);
      echo json_encode($data2);
    } else {
      // do nothing but shit!!!
    }
  }

  public function members_registration() {
    $post = $this->input->post();
    $this->form_validation->set_rules('member_username', 'Member User', 'required|is_unique[tbl_user_credentials.username]', array('is_unique' => '%s is Already Taken!!!'));
    // $this->form_validation->set_rules('member_username', 'Member User', 'required|trim|is_unique[tbl_user_credentials.username]');
    $this->form_validation->set_rules('member_firstname', 'Member First Name', 'required|trim');
    $this->form_validation->set_rules('member_lastname', 'Member Last Name', 'required|trim');
    $this->form_validation->set_rules('member_password', 'Member Password', 'required|trim|min_length[6]');
    $this->form_validation->set_rules('member_pass_confirm', 'Confirm Password', 'required|matches[member_password]');


    if($this->form_validation->run() == FALSE) {
      $reponse = array('form_error' => $this->form_validation->error_array());
      echo json_encode($reponse);

    } else {

      $data = array(
        'username' => $post['member_username'],
        'password' => $post['member_password'],
        'status' => 1,
        'user_type' => 3,
        'date_added' => date('Y-m-d')
      );

      $result = $this->MY_Model->insert('tbl_user_credentials', $data);
      if($result) {
        $data1 = array(
          'info_id' => $result,
          'firstname' => $post['member_firstname'],
          'lastname' => $post['member_lastname'],
          'date_added' => date('Y-m-d')
        );
        $this->MY_Model->insert('tbl_user_informations', $data1);
      }
      echo json_encode($result);
    }

  }

        public function agreementform(){
            $this->load_member('agreementform' , '');
        }

        public function submitAgreement(){
            $post = $this->input->post();
            echo "<pre>";
            print_r($post);
            die();
        }



}
