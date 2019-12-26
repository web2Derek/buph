<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller {
    public function __construct(){
        parent::__construct();
    }

	public function index(){

        $params['select'] = 'tbl_user_informations.info_id , firstname ,email , middlename , lastname , tbl_branch.branch_id ,tbl_user_credentials.status , username,branch_name, user_type';
        $params['join'] = array(
            'tbl_user_informations' => 'tbl_user_informations.info_id = tbl_user_credentials.info_id',
            'tbl_branch' => 'tbl_branch.branch_id = tbl_user_credentials.branch_id'
        );

        $data['userlist'] = $this->MY_Model->getRows('tbl_user_credentials' , $params);
        $paramsBranch['select'] = 'branch_id, branch_name';
        $data['branch_list'] = $this->MY_Model->getRows('tbl_branch' , $paramsBranch);
        $data['class'] = $this;

        if($this->session->userdata('logged_in')) {
            $this->load_page('user_v',$data);
         } else {
           redirect(base_url('login'));
         }
    }

    // public function get_users(){
    //     $limit = $this->input->post('length');
    //     $offset = $this->input->post('start');
    //     $search = $this->input->post('search');
    //     $order = $this->input->post('order');
    //     $draw = $this->input->post('draw');
    //     $column_order = array('branch_name','branch_code','address','tbl_user_credentials.status');
    //     $join = array(
    //         'tbl_user_informations' => 'tbl_user_informations.info_id = tbl_user_credentials.info_id',
    //         'tbl_branch' => 'tbl_branch.branch_id = tbl_user_credentials.branch_id'
    //     );
    //     $select = "tbl_user_informations.info_id , CONCAT(firstname ,' ',middlename,' ',lastname) as full_name,email , tbl_branch.branch_id ,tbl_user_credentials.status , username,branch_name, user_type";
    //     $where = array(
    //         'user_type !=' => 3
    //     );
    //     $group = array();
    //     $list = datatables('tbl_user_credentials',$column_order, $select, $where, $join, $limit, $offset ,$search, $order, $group);
    //     $output = array(
    //             "draw" => $draw,
    //             "recordsTotal" => $list['count_all'],
    //             "recordsFiltered" => $list['count'],
    //             "data" => $list['data'],
    //     );
    //     json($output,false);
    // }

    public function get_users(){
        $limit = $this->input->post('length');
        $offset = $this->input->post('start');
        $search = $this->input->post('search');
        $order = $this->input->post('order');
        $draw = $this->input->post('draw');
        $column_order = array('branch_name','branch_code','address','tbl_user_credentials.status');
        $join = array(
            'tbl_user_informations' => 'tbl_user_informations.info_id = tbl_user_credentials.info_id',
            'tbl_branch' => 'tbl_branch.branch_id = tbl_user_credentials.branch_id'
        );
        $select = "tbl_user_informations.info_id , CONCAT(firstname ,' ',middlename,' ',lastname) as full_name,email , tbl_branch.branch_id ,tbl_user_credentials.status , username,branch_name, user_type";
        $where = array(
            'user_type !=' => 3
        );
        $group = array();
        $list = datatables('tbl_user_credentials',$column_order, $select, $where, $join, $limit, $offset ,$search, $order, $group);
        $final_output = array();

        foreach($list['data'] as $key => $value){
            foreach($value as $k => $v){
                $final_output[$key][$k] = $v;
                $final_output[$key]['user_loggedin_type'] = sesdata('user_type');
            }
        }

        $output = array(
                "draw" => $draw,
                "recordsTotal" => $list['count_all'],
                "recordsFiltered" => $list['count'],
                "data" => json_decode (json_encode ($final_output), FALSE),
        );

        // json($output,false);
        echo json_encode($output);
    }

    public function load_modal($modal , $data = ''){
      $this->load->view($modal , $data);
    }

    public function chckStatus($status){
        switch ($status) {
            case '0':
                return 'In-Active';
                break;
            case '1':
                return 'Active';
                break;
            default:
                // code...
                break;
        }
    }

    public function chckUserType($type){
        switch ($type) {
            case '0':
                return 'Guest';
                break;
            case '1':
                return 'Staff';
                break;
            case '2':
                return 'Super Admin';
                break;
            default:
                break;
        }
    }

    public function createUser(){
        // $this->load->library('form_validation');

        $this->form_validation->set_rules('fname', 'First Name', 'required|trim');
        $this->form_validation->set_rules('middlename', 'Middle Name', 'required|trim');
        $this->form_validation->set_rules('lname', 'Last Name', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[tbl_user_credentials.username]', array('is_unique' => '%s is already taken.'));
        $this->form_validation->set_rules('branch', 'Branch', 'required');
        $this->form_validation->set_rules('user_type', 'User Type', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[tbl_user_informations.email]', array('is_unique' => '%s is already taken.'));
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->form_validation->set_rules('confirm_password' , 'Confirm Password' , 'required|trim|matches[password]');

        if ($this->form_validation->run() !== FALSE) {
            $post = $this->input->post();
            $response = array();

            $info = array(
                'firstname' => $post['fname'],
                'middlename' => $post['middlename'],
                'lastname' => $post['lname'],
                'email' => $post['email'],
                'date_added' => date("Y-m-d"),
            );

            $insertInfo = $this->MY_Model->insert('tbl_user_informations' , $info);

            if ($insertInfo) {
                $id = $insertInfo;
                //set additional details
                $cred_info = array(
                    'info_id' => $id,
                    'branch_id' => $post['branch'],
                    'username' => $post['username'],
                    'password' => $post['password'],
                    'status' => 1,
                    'date_added' =>  date("Y-m-d"),
                    'date_updated' => date("Y-m-d")
                );

                $insertCred = $this->MY_Model->insert('tbl_user_credentials' , $cred_info);

                if ($insertCred) {
                    $completeName = $post['fname'].' '.$post['middlename'].' '.$post['lname'];
                    $response = array('success' => 'User '.$completeName.' has been added');
                }else{
                    $response = array('error' => 'Something went wrong. Please try again.');
                }
            }else{
                $response = array('error' => 'Something went wrong. Please try again.');
            }
        }else {
            $response = array('form_error' => $this->form_validation->error_array());
        }
        echo json_encode($response);
    }

    public function getSingleUser(){
        $info_id = $this->input->post('info_id');
        $params['where'] = array('tbl_user_informations.info_id' => $info_id);
        $params['select'] = 'tbl_user_informations.info_id , firstname , middlename , lastname , password ,email , tbl_branch.branch_id ,tbl_user_credentials.status , username,branch_name , user_type';
        $params['join'] = array(
            'tbl_user_informations' => 'tbl_user_informations.info_id = tbl_user_credentials.info_id',
            'tbl_branch' => 'tbl_branch.branch_id = tbl_user_credentials.branch_id'
        );

        $UserInfoData = $data['userlist'] = $this->MY_Model->getRows('tbl_user_credentials' , $params , 'row');

        echo json_encode($UserInfoData);
    }

    public function updateUser(){
        $post = $this->input->post();
        $results = array();
        $this->load->library('form_validation');
        $checking['join'] = array(
            'tbl_user_credentials' => 'tbl_user_credentials.info_id = tbl_user_informations.info_id'
        );
        $checking['where'] = array('.tbl_user_informations.info_id' => $post['info_id']);
        $data_check = $this->MY_Model->getRows('tbl_user_informations' , $checking , 'row');

        if ($data_check) {
            if ($data_check->username != $post['username']) {
                $this->form_validation->set_rules('username', 'Username', 'required|is_unique[tbl_user_credentials.username]' , array('is_unique' => '%s is already taken.'));
            }

            if ($data_check->email != $post['email']) {
                $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[tbl_user_informations.email]' , array('is_unique' => '%s is already taken.'));
            }

            $this->form_validation->set_rules('fname', 'First Name', 'required');
            $this->form_validation->set_rules('middlename', 'Middle Name', 'required');
            $this->form_validation->set_rules('lname', 'Last Name', 'required');
            $this->form_validation->set_rules('branch', 'Branch', 'required');
            $this->form_validation->set_rules('user_type', 'User Type', 'required');


            if ($this->form_validation->run() !== FALSE) {
                $where = array('info_id' => $post['info_id']);
                $tbl_info = array(
                    'firstname' => $post['fname'],
                    'middlename' => $post['middlename'],
                    'lastname' => $post['lname'],
                    'email' => $post['email'],
                );

                $updated_info = $this->MY_Model->update('tbl_user_informations' , $tbl_info , $where );

                if ($updated_info) {
                    $tbl_credentials = array(
                        'username' => $post['username'],
                        'branch_id' => $post['branch'],
                        'user_type' => $post['user_type']
                    );
                    $insert_credentials = $this->MY_Model->update('tbl_user_credentials' ,$tbl_credentials, $where);

                    if ($insert_credentials) {
                        $results = array('success' => 'User information successfully updated.');
                    }else {
                        $results = array('error' => 'Something went wrong. Please try again.');
                    }
                }else{
                    $results = array('error' => 'Something went wrong. Please try again.');
                }
            }else{
                $results = array('form_error' => $this->form_validation->error_array());
            }
        }else{
            $results = array('error' => 'Something went wrong.');
        }



        echo json_encode($results);
    }

    public function deactivateUser() {
        $post = $this->input->post();
        $results = array();
        $where = array('info_id' => $_POST['id']);
        $status = array(
            'status' => ($post['stats'] == 'active' ? 1 : 0)
        );

        $activate_deactivate = $this->MY_Model->update('tbl_user_credentials', $status, $where);

            if ($activate_deactivate) {
                $results = array('success' => 'User successfully' . ($post['stats'] == 'active' ? ' activated' : ' deactivated'));
            }else{
                $results = array('error' => 'Something went wrong. Please try again');
            }

        echo json_encode($results);
    }

}
