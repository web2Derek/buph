<?php
if (!defined('BASEPATH')) {
  exit('No direct script access allowed');
}

class Sms extends MY_Controller {
  public function __construct() {
    parent::__construct();
  }

  public function index() {
    if($this->session->has_userdata('logged_in')) {
      $this->load_page('sms_template');
    } else {
      redirect(base_url());
    }
  }

  public function fetch_template() {

    $limit = $this->input->post('length');
    $offset = $this->input->post('start');
    $search = $this->input->post('search');
    $order = $this->input->post('order');
    $draw = $this->input->post('draw');

    $column_order = array('sms_title','sms_created', 'date_modified');
    $join = array();
    $select = "";
    $where = array();
    $group = array();
    $list = datatables('tbl_sms',$column_order, $select ,$where, $join, $limit, $offset ,$search, $order, $group);

    $output = array(
                "draw" => $draw,
                "recordsTotal" => $list['count_all'],
                "recordsFiltered" => $list['count'],
                "data" => $list['data']);

    echo json_encode($output);
  }

  public function create_sms() {
    // $data['join'] = array (
    //   "tbl_member_types" => "tbl_member_types.type_id = tbl_contact_group.fk_type_id"
    // );
    // $result = $this->MY_Model->getRows('tbl_contact_group', $data);
    //
    $select['select'] = 'mobile_no, last_name, tbl_mem_personal_information.member_id';
    $list['number'] = $this->MY_Model->getRows('tbl_mem_personal_information', $select);
    $list['group'] = $this->MY_Model->getRows('tbl_member_types');
    $list['group_list'] = $this->MY_Model->getRows('tbl_contact_group');
    $list['sms_template'] = $this->MY_Model->getRows('tbl_sms');
    $this->load_page('send_sms', $list);

  }
//ADDING GROUP CONTACT
  public function add_contact() {
    $post = $this->input->post();
    $this->form_validation->set_rules('group-name', 'Group Name', 'required|trim|is_unique[tbl_contact_group.group_name]', array('is_unique'=>'%s already exist.'));

    if($this->form_validation->run() === FALSE) {
      $error = array('error' => $this->form_validation->error_array());
      echo json_encode($error);
    } else {
      $data = array (
        'group_name' => $post['group-name'],
        'contact_list' => json_encode($post['contact_list']),
        'date_created' => date('Y-m-d'),
        'added_by' => $_SESSION['username'],
      );
      $list  = $this->MY_Model->insert('tbl_contact_group', $data);
      echo json_encode($list);
    }
  }

  public function sent_group() {
    $group = $this->input->post('group_list');
    $results = array();
    foreach ($group as $key ) {
      $where['where'] = array('group_name' => $key);
      $result = $this->MY_Model->getRows('tbl_contact_group', $where, 'row');
      array_push($results , $result->contact_list);
    }
    echo json_encode($results);
  }

  // public function holidaySms() {
  //   $current_date = strval(date('Y-m-d'));
  //   $date_now = substr($current_date, -5);
  //   $sms_greeting = $this->MY_Model->getRows('tbl_holiday');
  //   foreach ($sms_greeting as $key) {
  //   echo (substr(strval($key['hol_date']), -5));
  //   }
  // }

  public function fetch_sms() {
    $id = $this->input->post('id');
    $data['where'] = array(
      'sms_id' => $id
    );
    $result = $this->MY_Model->getRows('tbl_sms', $data, 'row');
    echo json_encode($result);
  }

  public function update_sms() {
    $post = $this->input->post();
    $where = array('sms_id' => $post['hidden_sms_id']);

    $this->form_validation->set_rules('sms_title', 'SMS Title', 'required|trim');
    $this->form_validation->set_rules('sms_message', 'SMS Message', 'required|trim');

    if($this->form_validation->run() == FALSE) {
        $response = array('form_error' => $this->form_validation->error_array());
        echo json_encode($response);
      } else {
    $sms_data = array(
      'sms_title' => $post['sms_title'],
      'sms_message' => $post['sms_message'],
      'date_modified' => date('Y-m-d')
    );
    $sms_update = $this->MY_Model->update('tbl_sms', $sms_data, $where);
    echo json_encode($sms_update);
    }
  }

  public function delete_sms() {
    $sms_id = $this->input->post('id');
    $where = array (
      'sms_id' => $sms_id
    );
    $del_sms = $this->MY_Model->delete("tbl_sms", $where);
    return true;
  }

  public function add_sms() {
    $post = $this->input->post();
    $this->form_validation->set_rules('sms_title', 'SMS Title', 'required|trim');
    $this->form_validation->set_rules('sms_message', 'SMS Message', 'required|trim');

    if($this->form_validation->run() == FALSE) {
          $response = array('form_error' => $this->form_validation->error_array());
          echo json_encode($response);

      } else {
        $data = array (
          'sms_title' => $post['sms_title'],
          'sms_message' => $post['sms_message'],
          'sms_created' => date('Y-m-d'),
          'added_by' => $_SESSION['username']
        );
          $sms = $this->MY_Model->insert("tbl_sms", $data);
          echo json_encode($sms);
      }
    }

  // public function sent_sms() {
  //   $post  = $this->input->post();
  //   if(isset($post['sent_sms'])) {
  //     foreach ($variable as $key => $value) {
  //       // code...
  //     }
  //
  //   } else {
  //     echo "Message not sent";
  //   }
  // }

    public function SchedulerSMS() {
        $templates = array(1,2,3,4);
        $date = date("m/d/Y");
        // $date = '05/09/1995';
        $results = array();
        $params['where'] = array('birthdate' => $date);
        $params['select'] = array('mobile_no');

        $remind = $this->MY_Model->getRows('tbl_mem_personal_information' , $params);
        $templateParams['where'] = array('sms_id' => $templates[0]);
        $templateParams['select'] = 'sms_message';
        $template = array('message' => $this->MY_Model->getRows('tbl_sms' ,$templateParams , 'row'));
        if ($remind) {
            $results = array('remind' => true , 'data' => $remind  , 'template' => $template);
        }else{
            $results = array('remind' => false);
        }

        echo json_encode($results);
    }

}
