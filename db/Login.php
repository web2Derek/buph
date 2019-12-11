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

   if($this->session->has_userdata('logged_in')) {
          redirect(base_url('home'));
        } else {
          $this->login_page('login');
        }
	}

// VERIFY USER IF USER AND PASSWORD EXIST
  public function auth(){
    $post = $this->input->post();

    if($post['btn-login']) {

      $this->form_validation->set_rules('username', 'Username', 'required');
      $this->form_validation->set_rules('password', 'Password', 'required');

        if($this->form_validation->run() !== false) {
          $username = $post['username'];
          $password = $post['password'];
          $params1['where'] = array('username' => $username, 'password' => $password);

          $data = $this->MY_Model->getRows('tbl_user_credentials' , $params1, 'row');

          if($data) {
            $params['where'] = array('tbl_user_credentials.credentials_id' => $data->credentials_id[0]);
            $params['join'] = array(
              'tbl_user_informations' => 'tbl_user_credentials.credentials_id = tbl_user_informations.info_id'
            );

            $userDatas = $this->MY_Model->getRows('tbl_user_credentials' , $params , 'array');
            $userDatas[0]['logged_in'] = TRUE;
            $this->session->set_userdata($userDatas[0]);
            $this->login_page('select_branch');

          } else {
            $this->session->set_flashdata('error', 'Invalid Username or Password!');
            redirect(base_url());
          }

        } else {
          $this->form_validation->set_message('The login credentials you entered are incorrect, please try again!');
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
                    $data['token_id'] = $results->token_id;
                    if ($status == 1) {
                        $this->login_page('forgot_password' , $data);
                    }else{
                        // Expire Token
                        echo "Expire";
                    }
                }else{
                    echo "Something went wrong.";
                }
        }else{
            echo "Something went wrong.";
        }
    }

    public function message() {
      $this->login_page('message');
    }

    public function select_branch() {
        $post = $this->input->post();
        if(isset($post['btn-branch'])) {
            $this->session->set_userdata('branch_name', $post['branch_name']);
            redirect(base_url("home"));
        } else {
            redirect(base_url("login"));
        }
    }

    public function reset($token){
        $data['token'] = $token;
        if($this->MY_Model->getRows("eis_reset_password","token",array('token' => $token,'status' => 1),"","","","count"))  {
            $this->load_page('reset',$data);
        } else {
            if($this->MY_Model->getRows("eis_reset_password","token",array('token' => $token,'status' => 0),"","","","count"))  {
                $data['error'] = 'Token Already Used';
            } else {
                $data['error'] = 'No Token Found';
            }
            $this->load_page('no_token',$data);
        }
    }

public function process_reset() {
  $params['where'] = array(
    'email' => $this->input->post('email')
  );

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
        // $this->email->send();
        if ($this->email->send()) {
          echo "Email Successfully Sent";
        } else {
          show_error($this->email->print_debugger());

          echo "1";
        }
      }else{
        echo "Something went wrong.";
      }
    }
  }

    public function updateForgotPassword(){
        // $post = $this->input->post();
        $this->process_reset();
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
    public function logout() {
        $this->session->unset_userdata($user_session);
        $this->session->sess_destroy();
        redirect(base_url());
    }

}
