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

  public function depositors_signature() {
    $this->load_member('signature_depositor', '');
  }

  public function members_account() {
    $this->load_member('member_dashboard', '');
  }

  public function membership_registration() {
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
          $session = array('logged_in' => true, 'first_name' => $mem_user, 'user_type' => 3);
          $this->session->set_userdata($session);
          redirect(base_url('applicants/membership_registration'));
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

  public function addApplicants() {
    $post = $this->input->post();
    if(!empty($post)) {
      $pi_info = array(
        'member_type_id'=> 1,
        'last_name'     => $post['lastname'],
        'first_name'    => $post['firstname'],
        'middle_name'   => $post['middlename'],
        'birthdate'     => $post['birthdate'],
        'age'           => $post['age'],
        'blood_type'    => $post['blood_type'],
        'birth_place'   => $post['birthplace'],
        'religion'      => $post['religion'],
        'email'         => $post['emailAddress'],
        'nationality'   => $post['nationality'],
        'civil_status'  => $post['civilStatus'],
        'gender'        => $post['sex'],
        'mobile_no'     => $post['mobile_no'],
        'tin'           => $post['Tin'],
        'sss'           => $post['SSS'],
        'pag_ibig'      => $post['pag_ibig'],
        'date_added'    => $post['date_applied']
      );

      $pi_id = $this->MY_Model->insert('tbl_mem_personal_information' , $pi_info);

      if ($pi_id) {
        // Generate Account ID & SIGNATURE FILENAME
        $account_id = $this->AccountId();
        $file_name = $this->convertSignature($this->input->post('member_signature'), $account_id);
        // end
        if (!is_array($file_name)) {
          $where = array('member_id' => $pi_id );
          $insert_account_id_data = array('acount_id' => $account_id);
          $execute = $this->MY_Model->update('tbl_mem_personal_information' , $insert_account_id_data , $where );
          $profile_image = $this->profileUpload();

          if($execute){
            try {
              // Residence Section
              $residence_data = array(
                'member_id'         => $pi_id,
                'type_of_residence' => $post['typeOfResidence'],
                'street'            => $post['Street'],
                'barangay_district' => $post['Barangay_District'],
                'municipality'      => $post['Municipality'],
                'province'          => $post['province'],
                'zip_code'          => $post['zip_code']
              );
              $this->MY_Model->insert('tbl_mem_residence' , $residence_data );
              // end Residence Section

              // Employment Information Section
              $emp_info = array(
                'member_id'          => $pi_id,
                'type_of_employment' => $post['employment_info'],
                'company_name'       => $post['empinfo_companyName'],
                'company_contact_no' => $post['emp_company_contactNo'],
                'address'            => $post['address'],
                'designation'        => $post['Designation'],
                'employmentStatus'   => $post['employment_status']
              );
              $this->MY_Model->insert('tbl_mem_eployment_information' , $emp_info);
              // end Employment Information Section

              // Educational Attainment Section
              $edu_attain = array(
                'member_id'              => $pi_id,
                'attainment'             => $post['edu_attainment'],
                'name_of_school'         => $post['name_of_school'],
                'course_year_graduated'  => $post['course_year_graduated'],
              );
              $this->MY_Model->insert('tbl_mem_education_attainment' , $edu_attain);
              // end Educational Attainment

              // Spouse Information Section
              $spouse_info = array(
                'member_id'              => $pi_id,
                'sp_last_name'              => $post['spouse_lname'],
                'sp_first_name'             => $post['spouse_fname'],
                'sp_middle_name'            => $post['spouse_mname'],
                'sp_birthdate'              => $post['spouse_bday'],
                'sp_mobile_no'              => $post['spouse_mobile'],
                'sp_nationality'            => $post['spouse_nationality'],
                'sp_tin'                    => $post['spouse_tin']
              );
              $this->MY_Model->insert('tbl_mem_spouse_information' , $spouse_info);
              // end Spouse Information Section

              // Spouse Employment Information
              $spouse_emp = array(
                'member_id'              => $pi_id,
                'type_of_employment'     => $post['spouse_employment_info'],
                'sp_company_name'           => $post['spouse_company_name'],
                'sp_company_contact_no'     => $post['spouse_company_no'],
                'sp_comp_address'                => $post['spouse_company_address'],
                'sp_designation'            => $post['spouse_designation'],
                'sp_employmentStatus'       => $post['spouse_employment_status']
              );
              $this->MY_Model->insert('tbl_mem_spouse_emp_info' , $spouse_emp);
              // End Spouse Employment Information

              // Financial Information Section
              $main_data = array();

              // initial Insert
              $member_id = array('member_id' => $pi_id);
              $initail_insert = $this->MY_Model->insert('tbl_financial_info' , $member_id);
              // end

              // SOURCE OF INCOME COLUMN
              $source = array(
                'salary_honorarium'     => (isset($post['source_salary_honorarium']) ? $post['source_salary_honorarium'] : null ),
                'interest_commission'   => (isset($post['source_interest_commision']) ? $post['source_interest_commision'] : null ),
                'source_business'       => (isset($post['source_business']) ? $post['source_business'] : null ),
                'ofw_remitance'         => (isset($post['source_ofw_remittance']) ? $post['source_ofw_remittance'] : null ),
                'source_farmer'         => (isset($post['source_farmer']) ? $post['source_farmer'] : null ),
                'other_remittance'      => (isset($post['source_other_remittance']) ? $post['source_other_remittance'] : null ),
                'pension'               => (isset($post['source_other_remittance']) ? $post['source_other_remittance'] : null ),
                'others'                => (isset($post['source_others']) ? $post['source_others_input'] : null ),
              );

              $source_json = array('sourceOf_income' => json_encode($source));
              array_push($main_data , $source_json);

              // IF BUSINESS IS CHECKED
              $financial_information = array(
                'fi_company_name'      => $post['source_business_company_name'],
                'fi_office_address'    => $post['source_business_officeAddress'],
                'fi_Job_title'         => $post['source_business_jobTitle'],
                'fi_employmentStatus'  => $post['source_business_emplymentStatus'],
                'fi_contact_no'        => $post['source_business_contactNo'],
                'fi_business_gross_income_month' => $post['source_business_gross_income']
              );

              array_push($main_data , $financial_information);

              // FARMER COLUMN IF FARMER IS CHECKED

              $if_farmer = array(
                'corn'      => (isset($post['corn']) ? $post['corn'] : null),
                'sugarcane' => (isset($post['sugarcane']) ? $post['sugarcane'] : null),
                'rice'      => (isset($post['rice']) ? $post['rice'] : null ),
                'fruits'    => (isset($post['fruits']) ? $post['fruits'] : null),
                'cash'      => (isset($post['cash']) ? $post['cash'] : null),
                'livestock' => (isset($post['livestock']) ? $post['livestock'] : null),
              );

              $farmer_json = array('farmer' => json_encode($if_farmer));
              array_push($main_data , $farmer_json);


              $additional = array(
                'fi_gross_income_year'    => (isset($post['grossyear']) ? $post['grossyear'] : null),
                'fi_gross_income_month'   => (isset($post['monthly_gross_income']) ? $post['monthly_gross_income'] : null),
              );
              array_push($main_data , $additional);


              //  BENEFICIARIES SECTION]

              $ben_arr = array();

              // $data =  array (
              //   'member_id' => $pi_id,
              //   'name' => $post['ben_fullname'],
              //   'dob' => $post['ben_dob'],
              //   'relationship' => $post['ben_relationship'],
              //   'education' => $post['ben_education'],
              //   'percentage' => $post['ben_percentage']
              // );
              //
              // // $parse_data = json_encode($data);
              // $ben_data = $this->MY_Model->insert('tbl_mem_beneficiaries', $data);
              // return $ben_data;

              if ($initail_insert) {
                // SIGNATURE INFO
                $signature = array(
                  'member_id' => $pi_id,
                  'sg_file_name' => $file_name
                );

                // $profile_image = array(
                //   'member_id' => $pi_id,
                //   'pr_file_name' => $profile_image,
                //   'pr_date_added' => date("Y-m-d")
                // );

                $acount_info = array(
                  'member_id'         => $pi_id,
                  'branch'            => 1,
                  'classifications'   => 'C',
                  'encoded_by'        => $this->session->userdata('info_id'),
                  'encoded_date'      => date("Y-m-d"),
                );

                $monetary = array(
                  'member_id' => $pi_id
                );

                $id_logs = array(
                  'member_id' => $pi_id
                );

                //end
                $where = array('member_id' => $pi_id );
                $this->MY_Model->update('tbl_financial_info' , $main_data[0] , $where);
                $this->MY_Model->update('tbl_financial_info' , $main_data[1] , $where);
                $this->MY_Model->update('tbl_financial_info' , $main_data[2] , $where);
                $this->MY_Model->update('tbl_financial_info' , $main_data[3] , $where);
                $this->MY_Model->insert('tbl_signatures'     , $signature);
                $this->MY_Model->insert('tbl_profile_img'    , $profile_image);
                $this->MY_Model->insert('tbl_account_info'   , $acount_info);
                $this->MY_Model->insert('tbl_monetary_req'   , $monetary);
                $this->MY_Model->insert('tbl_id_logs'   , $id_logs);
                $results = array('success' => 'Added new member successfully.');
              }
              // end Financial Information Section
            } catch (\Exception $e) {
              $results = array('error' => 'Something went wrong. Please try again.');
            }

          }else{
            $results = array('error' => 'Something went wrong. Please try again.');
          }
        }else{
          $results = array('error' => $file_name['error']);
          $where = array('member_id' => $pi_id);
          $this->MY_Model->delete('tbl_mem_personal_information' , $where);
        }
      }else {

        $results = array('error' => 'Something went wrong. Please try again.');
      }
    } else{

      $results = array('form_error' => $this->form_validation->error_array());
    }
    echo json_encode($results);
  }

  // public function signatureUpload(){
  //   $available_file = array('jpg' , 'jpeg' , 'png');
  //   $file_type = pathinfo($_FILES['signature']['name'], PATHINFO_EXTENSION);
  //   $config['upload_path'] = './assets/signatures/members/';
  //   $config['allowed_types'] = '*';
  //   $config['max_size'] = 2000;
  //   $config['file_name'] =  date('ymd').'-'.uniqid('' , false);
  //
  //   $this->load->library('upload', $config);
  //
  //   if(in_array($file_type , $available_file)){
  //     if ($this->upload->do_upload('signature')) {
  //       return $config['file_name'].'.'.$file_type;
  //     }else{
  //       return array('error' => $this->upload->display_errors()['error']);
  //     }
  //   } else {
  //     return array('error' => 'Invalid file type');
  //   }
  // }

  public function convertSignature($base64 ,$account_id ){
    $folderPath = "./assets/profile/";
    $base64_string = explode(";base64,", $base64);
    $image_base64 = base64_decode($base64_string[1]);
    $file_name = date('ymd').'-'.uniqid('' , false).".png";
    $file = $folderPath . $file_name;
    file_put_contents($file, $image_base64);
    return $file_name;
    // return "$account_id.png";
  }

  public function AccountId(){
    $branch = substr(sesdata('active_branch') , 0 , 2);
    $year = getdate()['year'];
    $id = uniqid('' , false);
    $unique = substr($id , 3 , 10);
    $acount_id =  strtoupper($branch.substr($year , 2, 3).$unique);

    if ($this->checkAccountId($acount_id)) {
      return  $acount_id;
    }else{
      return $this->AccountId();
    }
  }

  public function checkAccountId($acount_id){
    $params['where'] = array('acount_id' => $acount_id );
    $data = $this->MY_Model->getRows('tbl_mem_personal_information' , $params);
    return $data ? false : true;
  }

public function updateSignatureImage(){
  $member_id = $this->input->post('member_id');
  $results = array();
  $available_file = array('jpg' , 'jpeg' , 'png');
  $file_type = pathinfo($_FILES['signature_new']['name'], PATHINFO_EXTENSION);
  $config['upload_path'] = './assets/signatures/members/';
  $config['allowed_types'] = '*';
  $config['max_size'] = 2000;
  $config['file_name'] =  date('ymd').'-'.uniqid('' , false);
  $this->load->library('upload', $config);
  if(in_array($file_type , $available_file)){
    if ($this->upload->do_upload('signature_new')) {
      $file_name = $config['file_name'].'.'.$file_type;
      $where = array('member_id' => $member_id);
      $set = array('sg_file_name' => $file_name);
      $update = $this->MY_Model->update('tbl_signatures' , $set , $where);
      if ($update) {
        $results = array('status' => 'Success' , 'msg' => 'Member signature updated.');
      }else{
        $results = array('status' => 'Error' , 'msg' => 'Something went wrong while uploading the image.Please try again');
      }
    }else{
      $results = array('status' => 'Error' , 'msg' => $this->upload->display_errors()['error'] );
    }
  } else {
    $results = array('status' => 'Error' , 'msg'=> 'Invalid file type');
  }

  echo json_encode($results);
}

public function profileUpload(){
  $available_file = array('jpg' , 'jpeg' , 'png');
  $file_type = pathinfo($_FILES['profile_new']['name'], PATHINFO_EXTENSION);
  $config['upload_path'] = './assets/profile/';
  $config['allowed_types'] = '*';
  $config['max_size'] = 2000;
  $config['file_name'] =  date('ymd').'-'.uniqid('' , false);

  $this->load->library('upload', $config);

  if(in_array($file_type , $available_file)){
    if ($this->upload->do_upload('profile_new')) {
      return $config['file_name'].'.'.$file_type;
    }else{
      return array('error' => $this->upload->display_errors()['error']);
    }
  } else {
    return array('error' => 'Invalid file types.');
  }
}


<<<<<<< HEAD
public function member_id(){
          if($this->session->has_userdata('logged_in')) {
            $params['select'] = "CONCAT(last_name ,',',first_name,',' , middle_name) as membername , acount_id , member_id";
            $params['where'] = array(
                'member_type_id' => 2
            );
            $params['or_where'] = array(
                'member_type_id' => 6
            );
=======
        public function member_id(){
          if($this->session->has_userdata('logged_in')) {
            $params['select'] = "CONCAT(last_name ,',',first_name,',' , middle_name) as membername , acount_id , member_id";
            // $params['where'] = array(
            //     'member_type_id' => 2
            // );
            // $params['or_where'] = array(
            //     'member_type_id' => 6
            // );
>>>>>>> 813a82a40736a3ef184cbb4d23113575133c9d08
            $data['list'] = $this->MY_Model->getRows('tbl_mem_personal_information' , $params);
            $this->load_page('memberId_v' , $data);
          } else {
            redirect(base_url('login'));
          }
<<<<<<< HEAD
        }

        // public function agreementform(){
        //     $this->load_member('agreementform' , '');
        // }

        // public function submitAgreement(){
        //     $post = $this->input->post();
        //     echo "<pre>";
        //     print_r($post);
        //     die();
        // }
=======

        }
>>>>>>> 813a82a40736a3ef184cbb4d23113575133c9d08

    public function agreementform() {
      $this->load_member('agreement_v');
    }

    public function submitAgreement() {
      $post = $this->input->post();
      $member_id = "AG19B7B284BB00";

      $docs = array(
        'filled_form' => isset($post['filled_up_form']) ? true : false,
        '2x_id' => isset($post['2x_id'] ) ? true : false,
        'tin' => isset($post['tin']) ? true : false,
      );

      $item = array(
          'member_id' => $member_id,
          'doc_requirements' => json_encode($docs),
          'subs_atleast' => $post['atleast_'],
          'value_atleast' => $post['atleast_2'],
          'date_added' => date('Y-m-d')
      );

      $insert = $this->MY_Model->insert('tbl_applicant_agreement' ,$item );
        if ($insert) {
            $filename = $this->agreementSignatureConvert($post['agre_sig_val']);
            $itm = array('signature_file' => $filename);
            $where = array('agreement_id' => $insert);
            $this->MY_Model->update('tbl_applicant_agreement' ,$itm, $where);
        }
    }

    public function agreementSignatureConvert($base64){
      $folderPath = "./assets/signatures/applicants/";
      $base64_string = explode(";base64,", $base64);
      $image_base64 = base64_decode($base64_string[1]);
      $file_name = date('ymd').'-'.uniqid('' , false).".png";
      $file = $folderPath . $file_name;
      file_put_contents($file, $image_base64);
      return $file_name;
      // return "$account_id.png";
    }

<<<<<<< HEAD
    public function mem_signatures()  {
      $base64 = $this->input->post('mem_signs');
      $folderPath = "./assets/signatures/applicants/";
      $base64_string = explode(";base64,", $base64);
      $image_base64 = base64_decode($base64_string[1]);
      $file_name = date('ymd').'-'.uniqid('' , false).".png";
      $file = $folderPath . $file_name;
      file_put_contents($file, $image_base64);
      return $file_name;
      // return "$account_id.png";
=======
    public function insuranceform(){
        $this->load_member('insuranceform');
>>>>>>> 813a82a40736a3ef184cbb4d23113575133c9d08
    }

}
