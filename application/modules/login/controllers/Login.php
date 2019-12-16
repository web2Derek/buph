<?php
if (!defined('BASEPATH')) {
  exit('No direct script access allowed');
}

class Login extends MY_Controller {
  public function __construct() {
    parent::__construct();
  }

  // public function test() {
  //   $params['select'] = 'username';
  //   $params['where'] = array(
  //     'id' => 1
  //   );
  //   $data = $this->MY_Model->getRows('users' , $params , 'row');
  //   echo "<pre>";
  //   print_r($data);
  //   exit;
  // }

// LOAD USER LOGIN IF EMPTY USERDATA
 public function index() {

   $this->login_page('login');

   // if($this->session->has_userdata('logged_in')) {
   //        redirect(base_url('home'));
   //      } else {
   //      }
	}

  // public function members_account() {
  //   if($this->session->has_userdata('logged_in')) {
  //     $this->load_member('member_page');
  //   } else {
  //     redirect(base_url('login'));
  //   }
  // }
  //
  // public function member_page() {
  //   $account_id = $this->input->post('account');
  //   $where['where'] = array(
  //     'acount_id' => $account_id
  //   );
  //   $data2 = $this->MY_Model->getRows('tbl_mem_personal_information', $where, 'rows');
  //   // $this->session->set_userdata($data);
  //
  //   if(!empty($data2)) {
  //     $sesssion = array(
  //       'logged_in' => true
  //     );
  //     $this->session->set_userdata($sesssion);
  //     echo json_encode($data2);
  //   } else {
  //     // do nothing but shit!!!
  //   }
  // }

// VERIFY USER IF USER AND PASSWORD EXIST
  public function auth()  {
    $post = $this->input->post();

    if(isset($post['btn-login'])) {

      $this->form_validation->set_rules('username', 'Username', 'required|trim');
      $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if($this->form_validation->run() !== false) {
          $username = $post['username'];
          $password = $post['password'];
          $params1['where'] = array('username' => $username, 'password' => $password);
          $data = $this->MY_Model->getRows('tbl_user_credentials' , $params1, 'row');
          //QUERY FOR BRANCH
          // $branch['select'] =  'branch_name';
          // $branchData['branchList'] = $this->MY_Model->getRows('tbl_branch', $branch);
          if($data) {

            if ($data->user_type != 3) {
                $params['where'] = array('tbl_user_credentials.credentials_id' => $data->credentials_id[0]);
                $params['join'] = array(
                  'tbl_user_informations' => 'tbl_user_credentials.info_id = tbl_user_informations.info_id'
                );

                $userDatas = $this->MY_Model->getRows('tbl_user_credentials' , $params , 'array');
                $userDatas[0]['logged_in'] = true;

                // $userDatas[0] = array(
                //   'logged_in' => true,
                //   'email' => $userDatas[0]['email']
                // );
                $this->session->set_userdata($userDatas[0]);
                redirect(base_url('login/select_branch'));
            }else{
                $this->session->set_flashdata('error', 'Invalid Username or Password!');
                redirect(base_url());
            }

          } else {
            $this->session->set_flashdata('error', 'Invalid Username or Password!');
            redirect(base_url());
          }

        } else {
          $this->form_validation->set_message('Username or Password is Invalid, please try again!');
          redirect(base_url());
        }
      }
    }

    public function forget_password() {
        if (!empty($_GET['token'])) {
            $token = $_GET['token'];
                $params['where'] = array(
                    'token' => $token
                );
                $results = $this->MY_Model->getRows('tbl_token' , $params , 'row');

                if ($results) {
                    $status = $results->status;
                    $data['info_id'] = $results->info_id;
                    if ($status == 1) {
                        $this->login_page('forgot_password' , $data);
                    }else{
                        // Expire Token
                        $data['reason'] = 'Expired token';
                        $this->login_page('invalid' , $data);
                    }
                }else{
                    $data['reason'] = 'Invalid Token';
                    $this->login_page('invalid' , $data);
                }
        }else{
            $data['reason'] = 'Something went wrong.';
            $this->login_page('invalid' , $data);
        }
    }

    public function message() {
      $this->login_page('message');
    }

    public function select_branch() {

      if($this->session->has_userdata('logged_in')) {
        $branch['select'] =  'branch_name';
        $branchData['branchList'] = $this->MY_Model->getRows('tbl_branch', $branch);
        $this->load->view('select_branch', $branchData);
      } else {
        redirect(base_url('login'));
      }

      $post = $this->input->post();
      if(isset($post['btn-branch'])) {
        $this->session->set_userdata('active_branch', $post['branch_name']);
        redirect(base_url("home"));
      }
      elseif($this->session->has_userdata('branch_name')) {
        redirect(base_url("home"));
      }
  }




// SEND NEW PASSWORD

public function process_reset() {
    $post = $this->input->post();
    $results = array();
    $params['where'] = array(
        'email' => $post['email']
    );
  $this->form_validation->set_rules('email' , 'Email' , 'required|valid_email');

  if ($this->form_validation->run() !== FALSE) {
      $chkemail = $this->MY_Model->getRows('tbl_user_informations' , $params , 'row');

      if ($chkemail) {
          $token = $this->generate_token(25);

          $token_insert = array(
              'token' => $token,
              'date_generated' => date("Y-m-d"),
              'info_id' => $chkemail->info_id
          );

          $insertToken = $this->MY_Model->insert('tbl_token' , $token_insert);

          if ($insertToken) {
              $config = Array(
                  'protocol' => 'smtp',
                  'smtp_host' => 'secure.emailsrvr.com',
                  'smtp_port' => 587,
                  'smtp_user' => 'onlineform14@proweaver.net',
                  'smtp_pass' => 'Prow34vEr@ll18#',
                  'mailtype' => 'html',
                  'charset' => 'iso-8859-1',
                  'wordwrap' => TRUE,
                  'set_newline' => "\r\n"
              );
              $linkUlr = base_url('login/forget_password').'?token='.$token;

              $this->load->library('email');
              $this->email->initialize($config);
              $this->email->from('qa@proweaver.net', 'Proweaver Inc.');
              $this->email->subject('Reset Password');
              $this->email->to('prospteam@gmail.com');
              $message = '<html>';
              $message .= '<head>';
              $message .= '</head>';
              $message .= '<body>';
              $message .= '<div>Reset Password</div>';
              $message .= '<div>';
              $message .= '<a href="'.$linkUlr.'")" target="_blank">Click here to reset your password</a></div>';
              $message .= '</body>';
              $message .= '</html>';
              $this->email->message($message);

              // execute send email;

              if ($this->email->send()) {
                  $results = array('success' => '1');
              }else{
                  $results = array('error' , 'Something went wrong. Please try again.');
              }

          }
      }else{
          $results = array('error' => 'Email address does not exist.');
      }
  }else{
      $results = array('form_error' => $this->form_validation->error_array());
  }
      echo json_encode($results);
}

    public function updateForgotPassword(){
        $post = $this->input->post();
        $results = array();
        $this->form_validation->set_rules('new_password', 'Password', 'required');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[new_password]');

        if($this->form_validation->run() !== FALSE){
            $where = array('info_id' => $post['info']);
            $dataSet = array(
                'password' => $post['new_password']
            );
            $execute = $this->MY_Model->update('tbl_user_credentials' , $dataSet , $where);
                if ($execute) {
                    $toUpdateTokenStatus = $this->MY_Model->update('tbl_token' , array('status' => 0) , array('token' => $post['token']) );
                    if ($toUpdateTokenStatus) {
                        $results = array('success' => 'New Password has been set.');
                    }else{
                        $results = array('error' => 'Something went wrong. Please try again');
                    }
                }else{
                    $results = array('error' => 'Something went wrong. Please try again.');
                }
        }else{
            $results = array('form_error' => $this->form_validation->error_array());
        }

        echo json_encode($results);
    }
    public function generate_token($length){
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $string = '';
        $max = strlen($characters) - 1;
            for ($i = 0; $i < $length; $i++) {
                $string .= $characters[mt_rand(0, $max)];
            }
            return $string;
    }

  // LOGOUT USER
    // public function logout() {
    //   // $user_sess = array(
    //   //   'credentials_id' =>$_POST['credentials_id'],
    //   //   'info_id' => $_POST['info_id'],
    //   //   'branch_id'=> $_POST['username'],
    //   //
    //   // )
    //   // $this->session->unset_userdata('credentials_id', 'info_id', 'branch_id', )
    //   session_unset();
    //   session_destroy();
    //   redirect(base_url());
    // }

}
