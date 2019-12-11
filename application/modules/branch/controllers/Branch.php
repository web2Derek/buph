<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Branch extends MY_Controller {
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        // $params['where'] = array('status' => 1);
        // $data['branch_list'] = $this->MY_Model->getRows('tbl_branch' , $params);
        $data['class'] = $this;

        if($this->session->userdata('logged_in')) {
            $this->load_page('branch_v',$data);
         } else {
           redirect(base_url('login'));
         }
        // $this->load_page('branch_v' , $data);
    }

    public function get_branches(){
        $limit = $this->input->post('length');
        $offset = $this->input->post('start');
        $search = $this->input->post('search');
        $order = $this->input->post('order');
        $draw = $this->input->post('draw');
        $column_order = array('branch_name','branch_code','address','Status');
        $join = array();
        $select = "";
        $where = array('status' => 1);
        $group = array();
        $list = datatables('tbl_branch',$column_order, $select, $where, $join, $limit, $offset ,$search, $order, $group);
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
                "data" =>  json_decode (json_encode ($final_output), FALSE)
        );
        echo json_encode($output);
    }

    public function load_modal($modal, $data = ''){
        $this->load->view($modal , $data);
    }

    public function createBranch(){
        $this->load->library('form_validation');
        $post = $this->input->post();
        $results = array();

        $this->form_validation->set_rules('bname', 'Branch Name', 'required');
        $this->form_validation->set_rules('bcode', 'Branch Code', 'required|numeric');
        $this->form_validation->set_rules('address', 'Address', 'required');

        if ($this->form_validation->run() !== FALSE) {
            $branch_data = array(
                'branch_name' => $post['bname'],
                'branch_code' => $post['bcode'],
                'address' => $post['address'],
                'Status' => $post['status'],
                'date_added' =>  date("Y-m-d")
            );
            $success_insert = $this->MY_Model->insert('tbl_branch' ,$branch_data );

            if ($success_insert) {
                $results = array('success' => ucfirst($post['bname']). ' successfully added on the branch list');
            }else {
                $results = array('error' => 'Something went wrong. Please try again.');
            }
        }else {
            $results = array('form_error' => $this->form_validation->error_array());
        }

        echo json_encode($results);
    }

    public function getBranch(){
        $id = $this->input->post('branch_id');
        $params['where'] = array('branch_id' => $id);
        $data = $this->MY_Model->getRows('tbl_branch' , $params , 'row');
        echo json_encode($data);
    }

    public function deleteBranch() {
        $where = array('branch_id' => $_POST['id']);
        $results = array();
        $status = array(
        'Status' => 0
        );
        $deleteBranch = $this->MY_Model->update('tbl_branch', $status, $where);
        if ($deleteBranch) {
            $results = array('status' => 'success' , 'msg' => 'Branch Updated.');
        }else{
            $results = array('status' => 'error' , 'msg' => 'Something went wrong. Please try again');
        }
        echo json_encode($results);
    }

    public function updateBranch(){
        $this->load->library('form_validation');
        $results = array();
        $post = $this->input->post();
        $this->form_validation->set_rules('bname', 'Branch Name', 'required');
        $this->form_validation->set_rules('bcode', 'Branch Code', 'required|numeric');
        $this->form_validation->set_rules('address', 'Address', 'required');

        if($this->form_validation->run() !== FALSE){
            $where = array('branch_id' => $post['branch_id']);
            $updatedData = array(
                'branch_name' => $post['bname'],
                'branch_code' => $post['bcode'],
                'address' => $post['address'],
                'Status' => $post['status'],
            );
            $insertResult = $this->MY_Model->update('tbl_branch' , $updatedData , $where);
                if ($insertResult) {
                    $results = array('success' => 'Updated Successfully');
                }else{
                    $results = array('error' => 'Something went wrong. Please try again');
                }
        }else{
            $results = array('form_error' => $this->form_validation->error_array());
        }

        echo json_encode($results);
    }


}
