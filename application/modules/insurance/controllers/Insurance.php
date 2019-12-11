<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Insurance extends MY_Controller {
  public function __construct() {
    parent::__construct();
  }

    public function index() {
        if($this->session->has_userdata('logged_in')) {
          $this->load_page('insurance_v');
        } else {
          redirect(base_url('login'));
        }
    }

    public function getInsurancelist() {
        $limit = $this->input->post('length');
        $offset = $this->input->post('start');
        $search = $this->input->post('search');
        $order = $this->input->post('order');
        $draw = $this->input->post('draw');

        $column_order = array('tbl_mem_personal_information.member_id','first_name' , 'middle_name' , 'last_name' , 'tbl_mem_personal_information.date_added' , 'date_approve', 'branch_name');

        $select = "tbl_mem_personal_information.member_id , first_name,middle_name,last_name,tbl_mem_personal_information.date_added,date_approve , branch_name";

        $join = array(
            'tbl_account_info' => 'tbl_account_info.member_id = tbl_mem_personal_information.member_id',
            'tbl_branch'       => 'tbl_branch.branch_id = tbl_account_info.branch'
        );
        $where = array();
        $group="";
        $list = datatables('tbl_mem_personal_information',$column_order, $select ,$where, $join, $limit, $offset ,$search, $order, $group);
        $output = array(
            "draw" => $draw,
            "recordsTotal" => $list['count_all'],
            "recordsFiltered" => $list['count'],
            "data" => $list['data']
        );

        echo json_encode($output);
    }

    public function memberInsurance($id){
        if ($id) {
            $this->load_page('member_insurance_v');
        }else{
            redirect(base_url('insurance'));
        }
    }

    public function addNewDependents(){
        $post = $this->input->post();

        $this->form_validation->set_rules('fullname' , 'Full Name' , 'required');
        $this->form_validation->set_rules('birth_date' , 'Birth Date' , 'required');
        $this->form_validation->set_rules('Relationship' , 'Relationship' , 'required');

        if ($this->form_validation->run() !== FALSE) {
            $age  =  calculateAge($post['birth_date']);
            $results = array();
            $dp = array(
                'member_id'  => $post['member_id'],
                'full_name'  => $post['fullname'],
                'birthdate'  => $post['birth_date'],
                'age'        => $age,
                'relationship' => $post['Relationship'],
                'date_added' => date("Y-m-d"),
            );

            $exec = $this->MY_Model->insert('tbl_insured_dependents' , $dp);
            if ($exec) {
                $results = array('status' => 'success');
            }else{
                $results = array('status' => 'fail');
            }
        }else{
            $results = array('form_error' =>  $this->form_validation->error_array());
        }

        echo json_encode($results);
    }

    public function insured_dependents($id){
        if ($id) {
            $limit = $this->input->post('length');
            $offset = $this->input->post('start');
            $search = $this->input->post('search');
            $order = $this->input->post('order');
            $draw = $this->input->post('draw');

            $column_order = array('full_name','birthdate' , 'age' , 'relationship');

            $select = "ins_id,full_name,birthdate , age , relationship";

            $join = array();
            $where = array(
                'member_id' => $id
            );
            $group="";

            $list = datatables('tbl_insured_dependents',$column_order, $select ,$where, $join, $limit, $offset ,$search, $order, $group);
            $output = array(
                "draw" => $draw,
                "recordsTotal" => $list['count_all'],
                "recordsFiltered" => $list['count'],
                "data" => $list['data']
            );

            echo json_encode($output);

        }else{
                redirect(base_url('insurance'));
        }
    }

    public function remove_dpendentById($id){
        $results = array();
        if ($id) {
            if ($this->MY_Model->delete('tbl_insured_dependents' , array('ins_id' => $id))) {
                $results = array('status' => 'success' , 'msg' => 'Record permanently removed.');
            }else{
                $results = array('status' => 'error' , 'msg' => 'Something went wrong. Please try again.');
            }
        }else{
            $results = array('status' => 'error' , 'msg' => 'Something went wrong. Please try again.');
        }
        echo json_encode($results);
    }

    public function getdependentsById($id){
        $param['where'] = array( 'ins_id' =>$id );
        $data = $this->MY_Model->getRows('tbl_insured_dependents' , $param , 'row');
        echo json_encode($data);
    }

    public function EditDependents(){
        $post = $this->input->post();
        $results = array();
        $paramswhere = array('ins_id' => $post['ins_id']);

        $this->form_validation->set_rules('e_fullname' , 'Full Name' , 'required');
        $this->form_validation->set_rules('e_birth_date' , 'Birth Date' , 'required');
        $this->form_validation->set_rules('e_Relationship' , 'Relationship' , 'required');

        if ($this->form_validation->run() !== FALSE) {
            $set = array(
                'full_name' => $post['e_fullname'],
                'birthdate' => $post['e_birth_date'],
                'age' => calculateAge($post['e_birth_date']),
                'relationship' => $post['e_Relationship']
            );

            $up = $this->MY_Model->update('tbl_insured_dependents' , $set , $paramswhere);
            if ($up) {
                $results = array('status' => 'success' , 'msg' => 'Updated Successfully');
            }else{
                $results = array('status' => 'success' , 'msg' => 'Something went wrong.Please try again.');
            }
        }else{
            $results = array('form_error' => $this->form_validation->error_array() );
        }

        echo json_encode($results);
    }

    public function getben_benefits($id){
        $limit = $this->input->post('length');
        $offset = $this->input->post('start');
        $search = $this->input->post('search');
        $order = $this->input->post('order');
        $draw = $this->input->post('draw');

        $column_order = array('full_name','birthdate' , 'age' , 'relationship');

        $select = "*";

        $join = array();
        $where = array(
            'member_id' => $id
        );
        $group="";

        $list = datatables('tbl_to_receives_benefits',$column_order, $select ,$where, $join, $limit, $offset ,$search, $order, $group);
        $output = array(
            "draw" => $draw,
            "recordsTotal" => $list['count_all'],
            "recordsFiltered" => $list['count'],
            "data" => $list['data']
        );

        echo json_encode($output);
    }

    public function deleteben_beneficiaries($id){
        $results = array();
        $param = array(
            'benefit_id' => $id
        );

        $delete = $this->MY_Model->delete('tbl_to_receives_benefits' , $param);
        if ($delete) {
            $results = array('status' => 'success' , 'msg' => 'Remove permanently.');
        }else{
            $results = array('status' => 'error' , 'msg' => 'Something went wrong. Please try again.');
        }

        echo json_encode($results);
    }

    public function AddBeneficiaries() {
        $post  = $this->input->post();

        $results = array();
        $this->form_validation->set_rules('type' , 'Type' , 'required');
        $this->form_validation->set_rules('ben_full_name' , 'Full Name' , 'required');
        $this->form_validation->set_rules('ben_birthdate' , 'Birth Date' , 'required');
        $this->form_validation->set_rules('ben_relationship' , 'Relationship' , 'required');

        if ($this->form_validation->run() !== FALSE) {
            $items = array(
                'member_id' => $post['member_id'],
                'type'      => $post['type'],
                'full_name' => $post['ben_full_name'],
                'birthdate' => $post['ben_birthdate'],
                'age'       => calculateAge($post['ben_birthdate']),
                'relationship' => $post['ben_relationship']
            );
            $dt = $this->MY_Model->insert('tbl_to_receives_benefits' , $items);
            if ($dt) {
                $results = array('status' => 'success' , 'msg' => 'Added Successfully');
            }else{
                $results = array('status' => 'error' , 'msg' => 'Something went wrong. Please try again.');
            }
        }else{
            $results = array('form_error' => $this->form_validation->error_array());
        }

        echo json_encode($results);
    }

    public function getBeneficiariesById($id){
        $params['where'] = array('benefit_id' => $id);
        $results = array();
        $data = $this->MY_Model->getRows('tbl_to_receives_benefits' , $params , 'row');
        if ($data) {
            $results = array('status' => 'success' , 'row' => $data);
        }else{
            $results = array('status' => 'error' , 'msg' => 'Something went wrong. Please try again.');
        }

        echo json_encode($results);
    }

    public function EditBeneficiaries() {
        $post = $this->input->post();
        $results = array();
        $items = array(
            'type'      => $post['e_type'],
            'full_name' => $post['e_ben_full_name'],
            'birthdate' => $post['e_ben_birthdate'],
            'age'       => calculateAge($post['e_ben_birthdate']),
            'relationship' => $post['e_ben_relationship']
        );
        $params= array('benefit_id' => $post['benefit_id']);
        $up  = $this->MY_Model->update('tbl_to_receives_benefits' , $items , $params);

        if ($up) {
            $results = array('status' => 'success' , 'msg' => 'Updated Successfully');
        }else{
            $results = array('status' => 'error' , 'msg' => 'Something went wrong. Please try again.');
        }

        echo json_encode($results);
    }

}
