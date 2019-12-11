<?php
if(!defined('BASEPATH')) {
  exit('No direct script access allowed');
}

class Logout extends MY_Controller {
  public function __construct() {
    parent::__construct();
  }

//LOG USER
  public function logout_user() {
    // $user_sess = array(
    //   'credentials_id' =>$_POST['credentials_id'],
    //   'info_id' => $_POST['info_id'],
    //   'branch_id'=> $_POST['username'],
    //
    // )
    // $this->session->unset_userdata('credentials_id', 'info_id', 'branch_id', )
    session_unset();
    session_destroy();
    redirect(base_url());
  }

  public function logout_member() {
    session_unset();
    session_destroy();
    redirect(base_url('applicants'));
  }

}
