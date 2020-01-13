<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
//call iofactory instead of xlsx writer
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;



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
    // header("Content-Disposition: attachment; filename=\"$filename\"");
    // header("Content-Type: application/vnd.ms-excel");


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

    //make a new spreadsheet object
    $spreadsheet = new Spreadsheet();
    //get current active sheet (first sheet)
    $sheet = $spreadsheet->getActiveSheet();
    //set default font
    $spreadsheet->getDefaultStyle()
    ->getFont()
    ->setName('Arial')
    ->setSize(10);

    //heading
    $spreadsheet->getActiveSheet()
    ->setCellValue('A1',"Bukidnon Pharmaceutical Multipurpose Cooperative");
    //merge heading
    $spreadsheet->getActiveSheet()->mergeCells("A1:F1");
    // set font style
    $spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);

    // set cell alignment
    $spreadsheet->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

    //setting column width
    $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(5);
    $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(20);
    $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(20);
    $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(30);
    $spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(12);
    $spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(10);

    // // echo 'Bukidnon Pharmaceutical Multipurpose Cooperative'."\r\n";
    // echo "(BUPHARCO)"."\r\n";
    // echo 'Valencia City, Bukidnon'."\r\n";
    // echo 'CDA Reg. No. 9520-10000364'."\r\n";
    // echo 'TOTAL MEMBER SUMMARY'."\r\n";

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
    $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
  }

  public function membershipStatistic() {
    echo 'Still Working with this Page';
  }

  // SAMPLE REPORT
  public function downloadFIle() {
    error_reporting(E_ALL);
    ini_set('display_errors', 0);


    //EXCEL STYLE
    $tableHead = [
      'font'=>[
        'color'=>[
          'rgb'=>'FFFFFF'
        ],
        'bold'=>true,
        'size'=>11
      ],
    ];

    $spreadsheet = new Spreadsheet();
    //get current active sheet (first sheet)
    $sheet = $spreadsheet->getActiveSheet();
    //set default font
    $spreadsheet->getDefaultStyle()
    ->getFont()
    ->setName('Calibri')
    ->setSize(11);

    //heading
    $spreadsheet->getActiveSheet()
    ->setCellValue('A1',"Bukidnon Pharmaceutical Multipurpose Cooperative");
    $spreadsheet->getActiveSheet()->setCellValue('A2',"(BUPHARCO)");
    $spreadsheet->getActiveSheet()->setCellValue('A3',"Valencia City, Bukidnon");
    $spreadsheet->getActiveSheet()->setCellValue('A4',"CDA Reg. No. 9520-10000364");
    $spreadsheet->getActiveSheet()->setCellValue('A6',"TOTAL MEMBER SUMMARY");

    //merge heading
    $spreadsheet->getActiveSheet()->mergeCells("A1:D1");
    $spreadsheet->getActiveSheet()->mergeCells("A2:D2");
    $spreadsheet->getActiveSheet()->mergeCells("A3:D3");
    $spreadsheet->getActiveSheet()->mergeCells("A4:D4");
    $spreadsheet->getActiveSheet()->mergeCells("A6:D6");
    // set font style
    $spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setSize(11);
    //setting to font bold
    $spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);

    // set cell alignment
    $spreadsheet->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    $spreadsheet->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    $spreadsheet->getActiveSheet()->getStyle('A3')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    $spreadsheet->getActiveSheet()->getStyle('A4')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    $spreadsheet->getActiveSheet()->getStyle('A6')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

    // SETTING FONT TO BOLD
    $spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
    $spreadsheet->getActiveSheet()->getStyle('A2')->getFont()->setBold(true);
    $spreadsheet->getActiveSheet()->getStyle('A3')->getFont()->setBold(true);
    $spreadsheet->getActiveSheet()->getStyle('A4')->getFont()->setBold(true);
    $spreadsheet->getActiveSheet()->getStyle('A6')->getFont()->setBold(true);


    //setting column width
    $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(5);
    $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(20);
    $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(20);
    $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(30);
    $spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(12);
    // $spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(10);

    //header text
    $styleArray = [
      'borders' => [
        'outline' => [
          'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
          'color' => ['argb' => '000000'],
        ],
      ],
    ];

    $spreadsheet->getActiveSheet()
    ->setCellValue('A8',"MEMBERS")
    ->setCellValue('C8',"Male")
    ->setCellValue('D8',"Female");

    $spreadsheet->getActiveSheet()->mergeCells("A8:B8");
    $spreadsheet->getActiveSheet()->getStyle('A8')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    $spreadsheet->getActiveSheet()->getStyle('C8')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    $spreadsheet->getActiveSheet()->getStyle('D8')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

    // APPLY BORDER STYLE
    $spreadsheet->getActiveSheet()->getStyle('A8:B8')->applyFromArray($styleArray);
    $spreadsheet->getActiveSheet()->getStyle('C8')->applyFromArray($styleArray);
    $spreadsheet->getActiveSheet()->getStyle('D8')->applyFromArray($styleArray);

    $data1 = $this->MY_Model->raw('
    SELECT type_of_employment as MEMBERS_W,
    count(case
    when gender = "Female" then 1
    else null
    end) as FW,

    count(case
    when gender = "Male" then 1
    else null
    end) as MW

    from tbl_mem_eployment_information LEFT JOIN tbl_mem_personal_information ON
    tbl_mem_personal_information.member_id = tbl_mem_eployment_information.fk_member_id
    group by type_of_employment', 'array');

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


    //header text
    $spreadsheet->getActiveSheet()
    ->setCellValue('A18',"MEMBERS")
    ->setCellValue('C18',"Male")
    ->setCellValue('D18',"Female");
    $spreadsheet->getActiveSheet()->mergeCells("A18:B18");
    $spreadsheet->getActiveSheet()->getStyle('A18')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    $spreadsheet->getActiveSheet()->getStyle('C18')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    $spreadsheet->getActiveSheet()->getStyle('D18')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    $spreadsheet->getActiveSheet()->getStyle("A18:B18")->applyFromArray($styleArray);
    $spreadsheet->getActiveSheet()->getStyle("C18")->applyFromArray($styleArray);
    $spreadsheet->getActiveSheet()->getStyle("D18")->applyFromArray($styleArray);

    // DISPLAY ROW FOR AGE
    $row2 = array();
    $row = 9;
    foreach ($data as $key => $value) {
      $spreadsheet->getActiveSheet()
      ->setCellValue("A$row" , $value['MEMBERS'])
      ->setCellValue("C$row" , $value['M'])
      ->setCellValue("D$row" , $value['F']);
      $spreadsheet->getActiveSheet()->mergeCells("A$row:B$row");
      // $spreadsheet->getActiveSheet()->getStyle("A$row:B$row")->getFont()->setBold(true);
      $spreadsheet->getActiveSheet()->getStyle('A'.$row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
      $spreadsheet->getActiveSheet()->getStyle('C'.$row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
      $spreadsheet->getActiveSheet()->getStyle('D'.$row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

      // APPLY BORDERS
      $spreadsheet->getActiveSheet()->getStyle("A$row:B$row")->applyFromArray($styleArray);
      $spreadsheet->getActiveSheet()->getStyle('C'.$row)->applyFromArray($styleArray);
      $spreadsheet->getActiveSheet()->getStyle('D'.$row)->applyFromArray($styleArray);
      $row++;
      array_push($row2, $row);
    }

    // DISPLAY ROW FOR WORK
    $row3 = (end($row2)) + 2;
    foreach ($data1 as $key => $value) {
      $spreadsheet->getActiveSheet()
      ->setCellValue("A$row3" , $value['MEMBERS_W'])
      ->setCellValue("C$row3" , $value['MW'])
      ->setCellValue("D$row3" , $value['FW']);
      // MERGE CELLS
      $spreadsheet->getActiveSheet()->mergeCells("A$row3:B$row3");
      // $spreadsheet->getActiveSheet()->getStyle("A$row3:B$row3")->getFont()->setBold(true);
      $spreadsheet->getActiveSheet()->getStyle("A$row3:B$row3")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
      $spreadsheet->getActiveSheet()->getStyle('C'.$row3)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
      $spreadsheet->getActiveSheet()->getStyle('D'.$row3)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

      //APPLY BORDERS IN EXCEL

      $spreadsheet->getActiveSheet()->getStyle("A$row3:B$row3")->applyFromArray($styleArray);
      $spreadsheet->getActiveSheet()->getStyle('C'.$row3)->applyFromArray($styleArray);
      $spreadsheet->getActiveSheet()->getStyle('D'.$row3)->applyFromArray($styleArray);
      $row3++;
    }

    $writer = new Xlsx($spreadsheet);
    $filename = 'Total Member Summary Report';
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="'.$filename.'.xlsx"');
    //create IOFactory object
    $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
    //save into php output
    $writer->save('php://output'); // download file
  }

  public function getMemberStatistic() {
    error_reporting(E_ALL);
    ini_set('display_errors', 0);

    $spreadsheet = new Spreadsheet();
    //get current active sheet (first sheet)
    $sheet = $spreadsheet->getActiveSheet();
    //set default font
    $spreadsheet->getDefaultStyle()
    ->getFont()
    ->setName('Calibri')
    ->setSize(15);
    //heading
    // $sheeti = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
    // $sheeti->setName('BUPHARCO');
    // $sheeti->setDescription('description');
    // $sheeti->setPath(base_url('assets/images/gallery/icon.png'));
    // $sheeti->setHeight(90);
    // $sheeti->setCoordinates("G14");
    // $sheeti->setOffsetX(20);
    // $sheeti->setOffsetY(5);
    // $sheeti->setWorksheet($sheet);
    $styleArray = [
      'borders' => [
        'outline' => [
          'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
          'color' => ['argb' => '000000'],
        ],
      ],
        'font' => [
          'bold' => true,
          'size' => 12
      ],
    'alignment' => [
    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        ],
    ];

    $spreadsheet->getActiveSheet()
    ->setCellValue('A1',"BUPHARCO");
    $spreadsheet->getActiveSheet()->setCellValue('A2',"WE CARE, WE SHARE");
    $spreadsheet->getActiveSheet()->setCellValue('A3',"Bukidnon PharmaceuticalMultipurpose Cooperative");
    $spreadsheet->getActiveSheet()->setCellValue('A4',"P-16, Sayre Highway, Poblacion Valencia City, Bukidnon, Philippines");
    $spreadsheet->getActiveSheet()->setCellValue('A6',"Memo No.:");
    $spreadsheet->getActiveSheet()->setCellValue('B6',"MO 9 S. 2019");
    $spreadsheet->getActiveSheet()->setCellValue('A7',"For:");
    $spreadsheet->getActiveSheet()->setCellValue('B7',"JERALYN C. CUCHAPIN");
    $spreadsheet->getActiveSheet()->setCellValue('B8',"HR MANAGER");
    $spreadsheet->getActiveSheet()->setCellValue('A9',"From:");
    $spreadsheet->getActiveSheet()->setCellValue('B9',"GHRESALYN B. HERNANE:");
    $spreadsheet->getActiveSheet()->setCellValue('B10'," Records and Membership Assistant");
    $spreadsheet->getActiveSheet()->setCellValue('A11',"Date:");
    $spreadsheet->getActiveSheet()->setCellValue('B11',"November 6, 2019:");
    $spreadsheet->getActiveSheet()->setCellValue('A12',"Re:");
    $spreadsheet->getActiveSheet()->setCellValue('B12',"Membership Monthly Report - OCTOBER 2019");
    $spreadsheet->getActiveSheet()->setCellValue('A14',"( NEW MEMBERS )");
    $spreadsheet->getActiveSheet()->setCellValue('A15',"For the month of OCTOBER");
    $spreadsheet->getActiveSheet()->setCellValue('A17',"BRANCH");
    $spreadsheet->getActiveSheet()->setCellValue('A18',"Full Pledge");
    $spreadsheet->getActiveSheet()->setCellValue('A19',"BELOW 2 SHARES BUT MORE THAN ONE SHARE");
    $spreadsheet->getActiveSheet()->setCellValue('A20',"TOTAL");
    $spreadsheet->getActiveSheet()->setCellValue('A22',"(NEW WITHDRAWN MEMBERS)");
    $spreadsheet->getActiveSheet()->setCellValue('A24',"BRANCH");
    $spreadsheet->getActiveSheet()->setCellValue('A25',"Withdraw");
    $spreadsheet->getActiveSheet()->setCellValue('A27',"Withdraw");
    $spreadsheet->getActiveSheet()->setCellValue('A28',"FULLPLEDGE");
    $spreadsheet->getActiveSheet()->setCellValue('A29',"BELOW 2 SHARES BUT MORE THAN ONE SHARE");
    $spreadsheet->getActiveSheet()->setCellValue('A30',"TOTAL");
    $spreadsheet->getActiveSheet()->setCellValue('A31',"WITHDRAWN MEMBERS (SEPTEMBER)");
    $spreadsheet->getActiveSheet()->setCellValue('A32',"TOTAL NUMBERS OF MEMBERS");
    $spreadsheet->getActiveSheet()->setCellValue('A34',"BRANCH");
    $spreadsheet->getActiveSheet()->setCellValue('A35',"Regular Male");
    $spreadsheet->getActiveSheet()->setCellValue('A36',"Regular Female");
    $spreadsheet->getActiveSheet()->setCellValue('A37',"Associate Male");
    $spreadsheet->getActiveSheet()->setCellValue('A38',"Associate Female");
    $spreadsheet->getActiveSheet()->setCellValue('A39',"Total");

    $branch = $this->MY_Model->raw('
    SELECT branch_name from tbl_branch');

    // QUERY FOR SELECTING FULL PLEDGE
    $total = $this->MY_Model->raw('
    SELECT
    @fullpledge := (
      SELECT COUNT(mq.monetary_id) AS person_count
      FROM tbl_monetary_req AS mq
      LEFT JOIN tbl_account_info AS m ON m.member_id = mq.member_id
      WHERE mq.total >= 1000 AND m.branch = b.branch_id
      ) as fullpledge,

      @share := (
        SELECT COUNT(mq.monetary_id) AS person_count
        FROM tbl_monetary_req AS mq
        LEFT JOIN tbl_account_info AS m ON m.member_id = mq.member_id
        WHERE mq.total < 1000 AND mq.total != "" AND m.branch = b.branch_id
        ) AS share,

        @fullpledge + @share AS total,
        b.branch_name
        FROM tbl_branch AS b
        WHERE status = 1
        ');

        $withdraw_member = $this->MY_Model->raw('
        SELECT
        (SELECT COUNT(mt.type_id)
        FROM tbl_member_types as mt
        LEFT JOIN tbl_mem_personal_information as mi ON mt.type_id = mi.member_type_id LEFT JOIN
        tbl_account_info as tai ON tai.member_id = mi.member_id
        WHERE type_id = 4 AND b.branch_id = tai.branch) as withdraw_total,
        b.branch_name
        FROM tbl_branch as b WHERE status = 1
        ');


        $class = $this->MY_Model->raw('
        SELECT
          @rm := (SELECT COUNT(type_id) FROM tbl_member_types as mt
          LEFT JOIN tbl_mem_personal_information as mpi
          ON mt.type_id = mpi.member_type_id
          LEFT JOIN tbl_account_info AS tai
          ON tai.member_id = mpi.member_id
          WHERE mt.type_id = 6 AND gender = "Male" AND b.branch_id = branch) as Regular_M,

          @rf := (SELECT COUNT(type_id) FROM tbl_member_types as mt
          LEFT JOIN tbl_mem_personal_information as mpi
          ON mt.type_id = mpi.member_type_id
          LEFT JOIN tbl_account_info AS tai
          ON tai.member_id = mpi.member_id
          WHERE mt.type_id = 6 AND gender = "Female" and b.branch_id = branch) as Regular_F,

          @am := (SELECT COUNT(type_id) FROM tbl_member_types as mt
          LEFT JOIN tbl_mem_personal_information as mpi
          ON mt.type_id = mpi.member_type_id
          LEFT JOIN tbl_account_info AS tai
          ON tai.member_id = mpi.member_id
          WHERE mt.type_id = 2 AND gender = "Male" and b.branch_id = branch) as Associate_M,

          @af := (SELECT COUNT(type_id) FROM tbl_member_types as mt
          LEFT JOIN tbl_mem_personal_information as mpi
          ON mt.type_id = mpi.member_type_id
          LEFT JOIN tbl_account_info AS tai
          ON tai.member_id = mpi.member_id
          WHERE mt.type_id = 2 AND gender = "Female" and b.branch_id = branch) as Associate_F,

          ROUND(@rm + @rf + @am + @AF) as total,

          branch_name
          from tbl_branch as b
        ');


        $cell = 'B';
        $b = 17;
        $c = 18;
        $d = 19;
        $e = 20;

        $styled = [
            'font' => [
              'bold' => true,
              'size' => 12
          ],
          'alignment' => [
          'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
          'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
              ],
        ];

        for($i = 0; $i<count($branch); $i++) {
          $spreadsheet->getActiveSheet()->setCellValue("$cell$b", $branch[$i]['branch_name']);
          $spreadsheet->getActiveSheet()->setCellValue("$cell$c", $total[$i]['fullpledge']);
          $spreadsheet->getActiveSheet()->setCellValue("$cell$d", $total[$i]['share']);
          $spreadsheet->getActiveSheet()->setCellValue("$cell$e", $total[$i]['total']);
          $spreadsheet->getActiveSheet()->getStyle("$cell$b")
          ->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
          $spreadsheet->getActiveSheet()->getStyle("$cell$c")
          ->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
          // $spreadsheet->getActiveSheet()->getStyle("$cell$d")
          // ->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
          $spreadsheet->getActiveSheet()->getStyle("$cell$e")
          ->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
          //SET BORDER FOR BRANCH FIELD
          $spreadsheet->getActiveSheet()->getStyle("$cell$d")->applyFromArray($styled);
          $spreadsheet->getActiveSheet()->getStyle("$cell$b")->applyFromArray($styleArray);
          $cell++;
        }

        $wd_cell = 'B';
        $wd_d = 25;
        $wd = 24;
        for($i = 0; $i<count($branch); $i++) {
          $spreadsheet->getActiveSheet()->setCellValue("$wd_cell$wd", $branch[$i]['branch_name']);
          $spreadsheet->getActiveSheet()->setCellValue("$wd_cell$wd_d", $withdraw_member[$i]['withdraw_total']);
          // CENTER CELL DATA
          $spreadsheet->getActiveSheet()->getStyle("$wd_cell$wd")
          ->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
          $spreadsheet->getActiveSheet()->getStyle("$wd_cell$wd_d")
          ->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
          // $spreadsheet->getActiveSheet()->getStyle("$cell$d")
          // ->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
          // $spreadsheet->getActiveSheet()->getStyle("$cell$e")
          // ->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
          //SET BORDER FOR BRANCH FIELD
          // $spreadsheet->getActiveSheet()->getStyle("$cell$b")->applyFromArray($styleArray);
          $spreadsheet->getActiveSheet()->getStyle("$wd_cell$wd")->applyFromArray($styleArray);
          $wd_cell++;
        }
        // ASSIGN CELL COLUMN
        $cl_cell = 'B';
        $cl = 34;
        $cl_a = 35;
        $cl_b = 36;
        $cl_c = 37;
        $cl_d = 38;
        $cl_e = 39;

        for($i = 0; $i<count($branch); $i++) {
          $spreadsheet->getActiveSheet()->setCellValue("$cl_cell$cl", $class[$i]['branch_name']);
          $spreadsheet->getActiveSheet()->setCellValue("$cl_cell$cl_a", $class[$i]['Regular_M']);
          $spreadsheet->getActiveSheet()->setCellValue("$cl_cell$cl_b", $class[$i]['Regular_F']);
          $spreadsheet->getActiveSheet()->setCellValue("$cl_cell$cl_c", $class[$i]['Associate_M']);
          $spreadsheet->getActiveSheet()->setCellValue("$cl_cell$cl_d", $class[$i]['Associate_F']);
          $spreadsheet->getActiveSheet()->setCellValue("$cl_cell$cl_e", $class[$i]['total']);
          // CENTER CELL DATA
          $spreadsheet->getActiveSheet()->getStyle("$cl_cell$cl")
          ->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
          $spreadsheet->getActiveSheet()->getStyle("$$cl_cell$cl_a")
          ->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
          $spreadsheet->getActiveSheet()->getStyle("$cl_cell$cl_b")
          ->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
          $spreadsheet->getActiveSheet()->getStyle("$cl_cell$cl_c")
          ->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
          $spreadsheet->getActiveSheet()->getStyle("$cl_cell$cl_d")
          ->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
          $spreadsheet->getActiveSheet()->getStyle("$cl_cell$cl_e")
          ->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

          //SET BORDER FOR BRANCH FIELD
          // $spreadsheet->getActiveSheet()->getStyle("$cell$b")->applyFromArray($styleArray);
          $spreadsheet->getActiveSheet()->getStyle("$cl_cell$cl")->applyFromArray($styleArray);
          $cl_cell++;
        }

        //RUNNING BALANCE
        $balance = $this->MY_Model->raw('
        SELECT
            @fullpledge := (
            SELECT COUNT(mq.monetary_id) AS person_count
            FROM tbl_monetary_req AS mq
            LEFT JOIN tbl_account_info AS m ON m.member_id = mq.member_id
            WHERE mq.total >= 1000 AND m.branch = b.branch_id
           ) as fullpledge,

           @share := (
            SELECT COUNT(mq.monetary_id) AS person_count
            FROM tbl_monetary_req AS mq
            LEFT JOIN tbl_account_info AS m ON m.member_id = mq.member_id
            WHERE mq.total < 1000 AND mq.total != "" AND m.branch = b.branch_id
           ) AS share,

          ROUND(@fullpledge + @share) AS total,

          @withdraw :=(SELECT COUNT(mt.type_id)
           FROM tbl_member_types as mt
           LEFT JOIN tbl_mem_personal_information as mi ON mt.type_id = mi.member_type_id LEFT JOIN
           tbl_account_info as tai ON tai.member_id = mi.member_id
           WHERE type_id = 4 AND b.branch_id = tai.branch) as withdraw_total,

            ROUND(@fullpledge + @share - @withdraw) AS overall,
                   b.branch_name
            FROM tbl_branch as b WHERE status = 1
          ');

          $bal = 'B';
          $bal_data = 27;
          $bal_a = 28;
          $bal_b = 29;
          $bal_c = 30;
          $bal_d = 31;
          $bal_e = 32;

          //RUNNING BALANCE DATA
          for($i = 0; $i<count($branch); $i++) {
            $spreadsheet->getActiveSheet()->setCellValue("$bal$bal_data", $balance[$i]['branch_name']);
            $spreadsheet->getActiveSheet()->setCellValue("$bal$bal_a", $balance[$i]['fullpledge']);
            $spreadsheet->getActiveSheet()->setCellValue("$bal$bal_b", $balance[$i]['share']);
            $spreadsheet->getActiveSheet()->setCellValue("$bal$bal_c", $balance[$i]['total']);
            $spreadsheet->getActiveSheet()->setCellValue("$bal$bal_d", $balance[$i]['withdraw_total']);
            $spreadsheet->getActiveSheet()->setCellValue("$bal$bal_e", $balance[$i]['overall']);
            // CENTER CELL DATA
            // $spreadsheet->getActiveSheet()->getStyle("$cl_cell$cl")
            // ->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            // $spreadsheet->getActiveSheet()->getStyle("$$cl_cell$cl_a")
            // ->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            // $spreadsheet->getActiveSheet()->getStyle("$cl_cell$cl_b")
            // ->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            // $spreadsheet->getActiveSheet()->getStyle("$cl_cell$cl_c")
            // ->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            // $spreadsheet->getActiveSheet()->getStyle("$cl_cell$cl_d")
            // ->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            // $spreadsheet->getActiveSheet()->getStyle("$cl_cell$cl_e")
            // ->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

            //SET BORDER FOR BRANCH FIELD

            $spreadsheet->getActiveSheet()->getStyle("$bal$bal_a")->applyFromArray($styled);
            $spreadsheet->getActiveSheet()->getStyle("$bal$bal_b")->applyFromArray($styled);
            $spreadsheet->getActiveSheet()->getStyle("$bal$bal_c")->applyFromArray($styled);
            $spreadsheet->getActiveSheet()->getStyle("$bal$bal_d")->applyFromArray($styled);
            $spreadsheet->getActiveSheet()->getStyle("$bal$bal_e")->applyFromArray($styled);
            $spreadsheet->getActiveSheet()->getStyle("$bal$bal_data")->applyFromArray($styleArray);
            $bal++;
          }



        //merge heading
        $spreadsheet->getActiveSheet()->mergeCells("A1:E1");
        $spreadsheet->getActiveSheet()->mergeCells("A2:E2");
        $spreadsheet->getActiveSheet()->mergeCells("A3:E3");
        $spreadsheet->getActiveSheet()->mergeCells("A4:E4");
        $spreadsheet->getActiveSheet()->mergeCells("A14:E14");
        $spreadsheet->getActiveSheet()->mergeCells("A15:E15");
        $spreadsheet->getActiveSheet()->mergeCells("A22:E22");
        $spreadsheet->getActiveSheet()->mergeCells("A23:E23");


        //setting to font bold
        $spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);

        // set cell alignment
        $spreadsheet->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('A3')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('A4')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('A14')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('A15')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('B19')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('B19')->getAlignment()->setHorizontal(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('A22')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('A23')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('A28')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle("A1:E12")->applyFromArray($styleArray);

        // COLUMN DIMENSION
        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(12);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(12);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(12);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(12);
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(12);
        $spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(12);
        $spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(12);
        $spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth(12);
        $spreadsheet->getActiveSheet()->getColumnDimension('I')->setWidth(12);
        $spreadsheet->getActiveSheet()->getColumnDimension('J')->setWidth(12);
        $spreadsheet->getActiveSheet()->getColumnDimension('K')->setWidth(12);
        $spreadsheet->getActiveSheet()->getColumnDimension('L')->setWidth(12);
        $spreadsheet->getActiveSheet()->getColumnDimension('M')->setWidth(12);

        //WRAP TEXT
        $spreadsheet->getActiveSheet()->getStyle('A19')->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('A29')->getAlignment()->setWrapText(true);

        // SETTING FONT TO BOLD
        $spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('A2')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('A3')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('A4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('A6')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('A7')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('A8')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('A9')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('A10')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('A18')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('A19')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('A20')->getFont()->setBold(true);


        //setting column width
        // $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(5);
        // $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(20);
        // $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(20);
        // $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(30);
        // $spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(12);
        // $spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(10);

        $writer = new Xlsx($spreadsheet);
        $filename = 'Member Statistic Report';
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$filename.'.xlsx"');
        //create IOFactory object
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        //save into php output
        $writer->save('php://output'); // download file

      }

    }
