<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Xls;



class Reports extends MY_Controller {
  public function __construct() {
    parent::__construct();
  }

  public function index() {
    if($this->session->userdata('logged_in')) {
      $branch['select'] =  'branch_name';
      $branchData['branchList'] = $this->MY_Model->getRows('tbl_branch', $branch);
      $this->load_page('new_member_report', $branchData);
    } else {
      redirect(base_url('login'));
    }

  }

  public function get_members() {
    // if(isset($_POST['filter_table'])) {
    //   $date_filter = $this->input->post('singledate');
    //   }

    $date_filter = $this->input->post('date_filter');
    $mem_branch = $this->input->post('mem_branch');
    $limit = $this->input->post('length');
    $offset = $this->input->post('start');
    $search = $this->input->post('search');
    $order = $this->input->post('order');
    $draw = $this->input->post('draw');
    $to = $this->input->post('to');

    $column_order = array('first_name', 'middle_name', 'last_name', 'barangay_district',                 'municipality','gender','birthdate', 'age', 'facilitator', 'invited_by',
    'grand_total', 'savings_deposit','branch_name');

    $select = "first_name , middle_name, last_name, barangay_district, municipality ,acount_id , birthdate, age,blood_type, religion, grand_total ,savings_deposit, facilitator,  invited_by,civil_status , title, branch_name, gender, tbl_mem_personal_information.date_added ,tbl_mem_personal_information.member_id";

    $join = array(
      'tbl_member_types' => 'tbl_mem_personal_information.member_type_id = tbl_member_types.type_id',
      'tbl_mem_residence' => 'tbl_mem_personal_information.member_id = tbl_mem_residence.member_id',
      'tbl_account_info' => 'tbl_mem_personal_information.member_id = tbl_account_info.member_id',
      'tbl_monetary_req' => 'tbl_mem_personal_information.member_id = tbl_monetary_req.member_id',
      'tbl_branch' => 'tbl_account_info.branch = tbl_branch.branch_id'
    );

    // $data['list'] = $this->MY_Model->getRows('tbl_mem_personal_information' , $params);
    if (!empty($date_filter)) {
      $where = "(tbl_mem_personal_information.date_added BETWEEN '$date_filter' AND '$to') AND (tbl_branch.branch_name = '$mem_branch') ";
    }else{
      $where = "(tbl_mem_personal_information.member_type_id != 4)";
    }


    // if (isset($date_filter) && !empty($date_filter)) {
    //   $where = array('birthdate' => $date_filter, 'birth_place' => $mem_branch);
    // } else {
    //   $where = array();
    // }
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

  public function full_pledge() {

    if($this->session->userdata('logged_in')) {
      $branch['select'] =  'branch_name';
      $branchData['branchList'] = $this->MY_Model->getRows('tbl_branch', $branch);
      $this->load_page('full_pledge_members', $branchData);
    } else {
      redirect(base_url('login'));
    }
  }

  public function membership_statistic() {
    if($this->session->userdata('logged_in')) {
      $type['select'] =  'branch_id, branch_name';
      $member['branch'] = $this->MY_Model->getRows('tbl_branch', $type);
      $this->load_page('member_statistic', $member);
    } else {
      redirect(base_url('login'));
    }
  }

  public function get_full_pledge() {
    $date_filter = $this->input->post('date_filter');
    $mem_branch = $this->input->post('mem_branch');
    $limit = $this->input->post('length');
    $offset = $this->input->post('start');
    $search = $this->input->post('search');
    $order = $this->input->post('order');
    $draw = $this->input->post('draw');
    $to = $this->input->post('to');

    $column_order = array('first_name', 'middle_name', 'last_name', 'barangay_district',                            'municipality','gender','birthdate', 'age', 'facilitator', 'invited_by',
    'grand_total', 'savings_deposit','branch_name');

    // $select = "*";
    $select = "first_name , middle_name, last_name, barangay_district, municipality ,acount_id , birthdate, age,blood_type, religion, grand_total ,savings_deposit, facilitator, invited_by,civil_status , title, branch_name, gender, tbl_mem_personal_information.date_added ,tbl_mem_personal_information.member_id";

    $join = array(
      'tbl_member_types' => 'tbl_mem_personal_information.member_type_id = tbl_member_types.type_id',
      'tbl_account_info' => 'tbl_mem_personal_information.member_id = tbl_account_info.member_id',
      'tbl_mem_residence' => 'tbl_mem_personal_information.member_id = tbl_mem_residence.member_id',
      'tbl_branch' => 'tbl_account_info.branch = tbl_branch.branch_id',
      'tbl_monetary_req' => 'tbl_mem_personal_information.member_id = tbl_monetary_req.member_id'
    );

    // $data['list'] = $this->MY_Model->getRows('tbl_mem_personal_information' , $params);

    if (!empty($date_filter)) {
      $where = "(tbl_mem_personal_information.date_added BETWEEN '$date_filter' AND '$to') AND (tbl_branch.branch_name = '$mem_branch') ";
    }else{
      $where = "(tbl_mem_personal_information.member_type_id != 4)";
    }

    // if (!empty($date_filter)) {
    //   $where = array('date_added' => $date_filter, 'branch_name' => $mem_branch);
    // } else {
    //   $where = array();
    // }
    $group= "";
    $list = datatables('tbl_mem_personal_information',$column_order, $select ,$where, $join, $limit, $offset ,$search, $order, $group);
    $output = array(
      "draw" => $draw,
      "recordsTotal" => $list['count_all'],
      "recordsFiltered" => $list['count'],
      "data" => $list['data']
    );

    echo json_encode($output);
  }

  public function get_membership_statistic() {

    $date_filter = $this->input->post('date_filter');
    $mem_type = $this->input->post('member_type');
    $limit = $this->input->post('length');
    $offset = $this->input->post('start');
    $search = $this->input->post('search');
    $order = $this->input->post('order');
    $draw = $this->input->post('draw');

    $column_order = array('acount_id','title','birthdate','age', 'blood_type', 'civil_status','gender','religion');

    $select = "CONCAT(first_name ,' ',middle_name,' ',last_name) as member_name , CONCAT(street,',',barangay_district,',', municipality,',', province) as member_address ,acount_id , birthdate,age,blood_type , religion , civil_status , title , gender, tbl_mem_personal_information.member_id";

    $join = array(
      'tbl_member_types' => 'tbl_mem_personal_information.member_type_id = tbl_member_types.type_id',
      'tbl_mem_residence' => 'tbl_mem_personal_information.member_id = tbl_mem_residence.member_id'
    );

    if (isset($date_filter) && !empty($date_filter)) {
      $where = array('birthdate' => $date_filter, 'member_type_id' => $mem_type);
    } else {
      $where = "(tbl_mem_personal_information.member_type_id != 4)";
    }

    $group = array();
    $list = datatables('tbl_mem_personal_information',$column_order, $select, $where, $join, $limit, $offset ,$search, $order, $group);
    $output = array(
      "draw" => $draw,
      "recordsTotal" => $list['count_all'],
      "recordsFiltered" => $list['count'],
      "data" => $list['data']
    );
    echo json_encode($output);
  }
  public function pmesReport(){
    $data['branch'] = $this->MY_Model->getRows('tbl_branch');
    $this->load_page('pmes_honorarium' , $data);
  }
  public function getPmes(){
    $limit = $this->input->post('length');
    $offset = $this->input->post('start');
    $search = $this->input->post('search');
    $order = $this->input->post('order');
    $draw = $this->input->post('draw');
    $from = $this->input->post('from');
    $to = $this->input->post('to');
    $branch = $this->input->post('branch');
    $where = "";
    $column_order = array('facilitator');
    $select = "CONCAT(first_name , ' ' , last_name ) as member , facilitator ,invited_by, branch_name";
    $join = array(
      'tbl_account_info' => 'tbl_account_info.member_id = tbl_mem_personal_information.member_id',
      'tbl_branch' => 'tbl_branch.branch_id = tbl_account_info.branch'
    );
    if (!empty($from)) {
      $where = "(tbl_account_info.encoded_date BETWEEN '$from' AND '$to') AND (tbl_account_info.branch = '$branch') ";
    }else{
      $where = "(tbl_mem_personal_information.member_type_id != 4)";
    }

    $group = array();
    $list = datatables('tbl_mem_personal_information',$column_order, $select, $where, $join, $limit, $offset ,$search, $order, $group);
    $output = array(
      "draw" => $draw,
      "recordsTotal" => $list['count_all'],
      "recordsFiltered" => $list['count'],
      "data" => $list['data']
    );

    echo json_encode($output);
  }

  public function get_summary() {
    if($this->session->userdata('logged_in')) {
      $data['branch'] = $this->MY_Model->getRows('tbl_branch');
      $this->load_page('member_summary', $data);
    } else {
      redirect(baseurl('login'));
    }
  }

  public function total_member_summary() {
    $mem_type = $this->input->post('member_type');
    $limit = $this->input->post('length');
    $offset = $this->input->post('start');
    $search = $this->input->post('search');
    $order = $this->input->post('order');
    $draw = $this->input->post('draw');

    $column_order = array('acount_id','title','birthdate','age', 'blood_type', 'civil_status','gender','religion');

    $select = "CONCAT(first_name ,' ',middle_name,' ',last_name) as member_name , CONCAT(street,',',barangay_district,',', municipality,',', province) as member_address ,acount_id , birthdate,age,blood_type , religion , civil_status , title , gender, tbl_mem_personal_information.member_id";

    $join = array(
      'tbl_member_types' => 'tbl_mem_personal_information.member_type_id = tbl_member_types.type_id',
      'tbl_mem_residence' => 'tbl_mem_personal_information.member_id = tbl_mem_residence.member_id'
    );

    if (isset($date_filter) && !empty($date_filter)) {
      $where = array('birthdate' => $date_filter, 'member_type_id' => $mem_type);
    } else {
      $where = "(tbl_mem_personal_information.member_type_id != 4)";
    }

    $group = array();
    $list = datatables('tbl_mem_personal_information',$column_order, $select, $where, $join, $limit, $offset ,$search, $order, $group);
    $output = array(
      "draw" => $draw,
      "recordsTotal" => $list['count_all'],
      "recordsFiltered" => $list['count'],
      "data" => $list['data']
    );
    echo json_encode($output);
  }

  public function withdrawalReport(){
    $data['branch'] = $this->MY_Model->getRows('tbl_branch');
    $this->load_page('withdrawal' , $data);
  }

  public function getwithdrawalReport(){
    $where = array();
    $limit  = $this->input->post('length');
    $offset = $this->input->post('start');
    $search = $this->input->post('search');
    $order  = $this->input->post('order');
    $draw   = $this->input->post('draw');
    $from   = $this->input->post('from');
    $to   = $this->input->post('to');
    $branch = $this->input->post('branch');

    $column_order = array('branch_name','first_name' , 'last_name', 'middle_name', 'reason', 'date_close' , 'savings_deposit' , 'sub_total',
    'loans_payable' , 'credit_on_trade_payable' , 'interest_on_loan_payable' ,'penalties_on_trade_payable', 'penalties_on_loan_payable_2' ,'grand_total');

    $select = "branch_name , first_name , last_name , middle_name, reason, date_close , savings_deposit , sub_total,
    loans_payable , credit_on_trade_payable , interest_on_loan_payable ,penalties_on_trade_payable, penalties_on_loan_payable_2 ,grand_total";
    $join = array(
      'tbl_monetary_req' => 'tbl_monetary_req.member_id = tbl_mem_personal_information.member_id',
      'tbl_member_withdrawal' => 'tbl_member_withdrawal.member_id = tbl_mem_personal_information.member_id',
      'tbl_account_info' => 'tbl_account_info.member_id = tbl_mem_personal_information.member_id',
      'tbl_branch' => 'tbl_branch.branch_id = tbl_account_info.branch'
    );

    if (!empty($from)) {
      $where = "(tbl_mem_personal_information.member_type_id = 4) AND (tbl_member_withdrawal.date_close BETWEEN '$from' AND '$to') AND (tbl_account_info.branch = '$branch')";
    }else{
      $where = array(
        'tbl_mem_personal_information.member_type_id' => 4
      );
    }


    $group = array();
    $list = datatables('tbl_mem_personal_information',$column_order, $select, $where, $join, $limit, $offset ,$search, $order, $group);
    $output = array(
      "draw" => $draw,
      "recordsTotal" => $list['count_all'],
      "recordsFiltered" => $list['count'],
      "data" => $list['data']
    );

    // echo $list['last_query'];

    echo json_encode($output);
  }

  public function cleanData($str) {
    $str = preg_replace("/\t/", "\\t", $str);
    $str = preg_replace("/\r?\n/", "\\n", $str);
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
  }

  public function totalSummary() {
    error_reporting(E_ALL);
    ini_set('display_errors', 0);

    // filename for download
    $filename = "website_data_" . date('Ymd') . ".xls";

     // header("Content-Type: text/plain");
    header("Content-Disposition: attachment; filename=\"$filename\"");
    header("Content-Type: application/vnd.ms-excel");


    $data = $this->MY_Model->raw('
    SELECT case
    when age between 0 and 17 then "Invalid Age"
    when age between 18 and 30 then "18 - 30"
    when age between 31 and 35 then "31 − 35"
    when age between 36 and 40 then "36 − 40"
    when age between 41 and 50 then "41 − 50"
    when age between 51 and 60 then "51 − 60"
    when age between 61 and 70 then "61 − 70"
    when age between 71 and 100 then "71 and above"
    end as "MEMBERS",
    count(case when gender = "Male" then 1 else null end) as M,
    count(case when gender = "Female" then 1 else null end) as F
    from
    (select *, TIMESTAMPDIFF(YEAR,birthdate,CURDATE()) AS ages from tbl_mem_personal_information) as t group by MEMBERS', 'array');

    $data1 = $this->MY_Model->raw('
    SELECT type_of_employment as MEMBERS,
    count(case
    when gender = "Female" then 1
    else null
    end) as F,

    count(case
    when gender = "Male" then 1
    else null
    end) as M

    from tbl_mem_eployment_information LEFT JOIN tbl_mem_personal_information ON
    tbl_mem_personal_information.member_id = tbl_mem_eployment_information.fk_member_id
    group by type_of_employment', 'array');

    echo 'Bukidnon Pharmaceutical Multipurpose Cooperative'."\r\n";
    echo "(BUPHARCO)"."\r\n";
    echo 'Valencia City, Bukidnon'."\r\n";
    echo 'CDA Reg. No. 9520-10000364'."\r\n";
    echo 'TOTAL MEMBER SUMMARY'."\r\n";

    $flag = false;
    foreach($data as $row) {
      if(!$flag) {
        // display field/column names as first row
        echo implode("\t", array_keys($row)) . "\r\n";
        $flag = true;
      }
      array_walk($row, __NAMESPACE__. '\cleanData');
      echo implode("\t", array_values($row)) . "\r\n";
    }
    $flag1 = false;


    foreach($data1 as $row1) {
      if(!$flag1) {
        // display field/column names as first row
        echo implode("\t", array_keys($row1)) . "\r\n";
        $flag1 = true;
      }
      array_walk($row1, __NAMESPACE__. '\cleanData');
      echo implode("\t", array_values($row1)) . "\r\n";
    }
    exit;
  }

  public function membershipStatistic() {
      echo 'Still Working with this Page';
  }

  // SAMPLE REPORT
  public function downloadFIle() {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $styleArray = array(
          'borders' => array(
              'outline' => array(
                  'style' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                  'color' => array('argb' => 'FFFF0000'),
            ),
          ),
        );
        $sheet->getStyle('A1')->applyFromArray($styleArray);
        //$sheet = $spreadsheet->getActiveSheet()->setShowGridlines(true);
       $sheet->setCellValue('A1', 'Hello World !');


        $writer = new Xlsx($spreadsheet);

        $filename = 'name-of-the-generated-file';

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output'); // download file
  }

}
