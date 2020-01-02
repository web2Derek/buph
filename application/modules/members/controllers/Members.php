<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Members extends MY_Controller {
  public function __construct() {
    parent::__construct();
  }

  public function index(){
    $params['select'] = "CONCAT(first_name ,' ',middle_name,' ',last_name) as member_name , CONCAT(street,',',barangay_district,',', municipality,',', province) as member_address ,acount_id , birthdate,age,blood_type , religion , civil_status , title , gender, tbl_mem_personal_information.member_id";
    $params['join'] = array(
      'tbl_member_types' => 'tbl_mem_personal_information.member_type_id = tbl_member_types.type_id',
      'tbl_mem_residence' => 'tbl_mem_personal_information.member_id = tbl_mem_residence.member_id'
    );
    $data['list'] = $this->MY_Model->getRows('tbl_mem_personal_information' , $params);
    $data['others'][0] = $this->MY_Model->getRows('tbl_branch');
    $data['others'][1] = $this->MY_Model->getRows('tbl_member_types');

    $this->load_page('list_v' , $data);
  }

  public function getMembers(){
    $limit = $this->input->post('length');
    $offset = $this->input->post('start');
    $search = $this->input->post('search');
    $order = $this->input->post('order');
    $draw = $this->input->post('draw');
    $select = "first_name,middle_name,last_name,acount_id , birthdate,age,blood_type , religion , branch_name ,civil_status , title , gender, tbl_mem_personal_information.member_id";
    $column_order = array('first_name','middle_name','acount_id','birthdate','age','blood_type' , 'gender' , 'civil_status' , 'branch_name');
    $join = array(
      'tbl_member_types'  => 'tbl_mem_personal_information.member_type_id = tbl_member_types.type_id',
      'tbl_mem_residence' => 'tbl_mem_personal_information.member_id = tbl_mem_residence.member_id',
      'tbl_account_info'  => 'tbl_mem_personal_information.member_id = tbl_account_info.member_id',
      'tbl_branch'        => 'tbl_branch.branch_id = tbl_account_info.branch'
    );
    $where = array();
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



  public function form(){
    $params['select'] = 'branch_id , branch_name';
    $data['branch'] = $this->MY_Model->getRows('tbl_branch' , $params , 'array');
    $data['branch'] = $this->MY_Model->getRows('tbl_branch' , $params , 'array');
    $data['isEdit'] = false;
    $this->load_page('members_v' , $data);
  }

    public function dob_check($str){
        if (!DateTime::createFromFormat('m/d/yyyy', $str)) { //yes it's YYYY-MM-DD
        $this->form_validation->set_message('birthdate', 'The {field} has not a valid date format');
            return FALSE;
        } else {
            return TRUE;
        }
    }

  public function AddNewMember() {
    $post = $this->input->post();

    $results = array();
    $this->form_validation->set_rules('lastname' , 'Last Name' , 'required');
    $this->form_validation->set_rules('firstname' , 'First Name' , 'required|is_unique[tbl_mem_personal_information.first_name]');
    $this->form_validation->set_rules('middlename' , 'Middle Name' , 'required');
    $this->form_validation->set_rules('birthdate' , 'Birth Date' , 'required');
    $this->form_validation->set_rules('birthplace' , 'Birth Place' , 'required');
    $this->form_validation->set_rules('emailAddress' , 'Email' , 'required|is_unique[tbl_mem_personal_information.email]');
    $this->form_validation->set_rules('Street' , 'Street' , 'required');
    $this->form_validation->set_rules('Barangay_District' , 'Barangay District' , 'required');
    $this->form_validation->set_rules('Municipality' , 'Minucipality' , 'required');
    $this->form_validation->set_rules('date_applied' , 'Date Applied' , 'required');

    if ($this->form_validation->run() !== FALSE) {
      // Personal Information

      $pi_info = array(
        'member_type_id'=> 1,
        'last_name'     => $post['lastname'],
        'first_name'    => $post['firstname'],
        'middle_name'   => $post['middlename'],
        'birthdate'     => $post['birthdate'],
        'age'           => calculateAge($post['birthdate']),
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
        $file_name = $this->signatureUpload();
        // end
        if (!is_array($file_name)) {
          $where = array('member_id' => $pi_id );
          $insert_account_id_data = array('acount_id' => $account_id);
          $execute = $this->MY_Model->update('tbl_mem_personal_information' , $insert_account_id_data , $where );
          $profile_image = (!empty($_FILES['profile_new']) ? $this->profileUpload() : 'profile.jpg');

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

              $member_id = array('member_id' => $pi_id);
              $initail_insert = $this->MY_Model->insert('tbl_financial_info' , $member_id);
              // end

              // SOURCE OF INCOME COLUMN
              $source = array(
                'salary_honorarium'     => (isset($post['source_salary_honorarium']) ? 'checked' : null ),
                'interest_commission'   => (isset($post['source_interest_commision']) ? 'checked' : null ),
                'source_business'       => (isset($post['source_business']) ? 'checked' : null ),
                'ofw_remitance'         => (isset($post['source_ofw_remittance']) ? 'checked' : null ),
                'source_farmer'         => (isset($post['source_farmer']) ? 'checked' : null ),
                'other_remittance'      => (isset($post['source_other_remittance']) ? 'checked' : null ),
                'pension'               => (isset($post['source_pension']) ? 'checked' : null ),
                'others'                => (isset($post['source_others']) ? 'checked' : null ),
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
                'corn'      => (isset($post['corn']) ? 'checked' : null),
                'sugarcane' => (isset($post['sugarcane']) ? 'checked' : null),
                'rice'      => (isset($post['rice']) ? 'checked' : null ),
                'fruits'    => (isset($post['fruits']) ? 'checked' : null),
                'cash'      => (isset($post['cash']) ? 'checked' : null),
                'livestock' => (isset($post['livestock']) ? 'checked' : null),
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

                $profile_image = array(
                  'member_id' => $pi_id,
                  'pr_file_name' => $profile_image,
                  'pr_date_added' => date("Y-m-d")
                );

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

                $idlogs = array(
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
                $this->MY_Model->insert('tbl_id_logs'        , $idlogs);
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
    }else{

      $results = array('form_error' => $this->form_validation->error_array());
    }

    echo json_encode($results);
  }

  public function updateMember() {
    $post = $this->input->post();
    $results = array();

    $this->form_validation->set_rules('lastname' , 'Last Name' , 'required');
    $this->form_validation->set_rules('firstname' , 'First Name' , 'required');
    $this->form_validation->set_rules('middlename' , 'Middle Name' , 'required');


    $param = array('member_id' => $post['member_id']);
    $query_param['where'] = array('member_id' => $post['member_id']);
    $query_param['select'] = 'acount_id';
    $query_account_id = $this->MY_Model->getRows('tbl_mem_personal_information' , $query_param , 'row');

    if ($this->form_validation->run() !== FALSE) {
      // Personal Information
      $pi_info = array(
        'last_name'     => $post['lastname'],
        'first_name'    => $post['firstname'],
        'middle_name'   => $post['middlename'],
        'birthdate'     => $post['birthdate'],
        'age'           => calculateAge($post['birthdate']),
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

      $pi_id = $this->MY_Model->update('tbl_mem_personal_information' , $pi_info , $param);

      if ($pi_id) {

        $account_id = $query_account_id->acount_id;
        $insert_account_id_data = array('acount_id' => $account_id);
        $execute = $this->MY_Model->update('tbl_mem_personal_information' , $insert_account_id_data , $param );

        if (isset($post['is_captured']) && $post['is_captured'] == true) {
          $profile_image = $this->convertProfile($post['profile_image'] , $account_id);
        }

        if($execute){
          try {
            // Residence Section
            $residence_data = array(
              'type_of_residence' => $post['typeOfResidence'],
              'street'            => $post['Street'],
              'barangay_district' => $post['Barangay_District'],
              'municipality'      => $post['Municipality'],
              'province'          => $post['province'],
              'zip_code'          => $post['zip_code']
            );
            $this->MY_Model->update('tbl_mem_residence' , $residence_data ,$param);
            // end Residence Section

            // Employment Information Section
            $emp_info = array(
              'type_of_employment' => $post['employment_info'],
              'company_name'       => $post['empinfo_companyName'],
              'company_contact_no' => $post['emp_company_contactNo'],
              'address'            => $post['address'],
              'designation'        => $post['Designation'],
              'employmentStatus'   => $post['employment_status']
            );
            $this->MY_Model->update('tbl_mem_eployment_information' , $emp_info , $param);
            // end Employment Information Section

            // Educational Attainment Section
            $edu_attain = array(
              'attainment'             => $post['edu_attainment'],
              'name_of_school'         => $post['name_of_school'],
              'course_year_graduated'  => $post['course_year_graduated'],
            );
            $this->MY_Model->update('tbl_mem_education_attainment' , $edu_attain , $param);
            // end Educational Attainment

            // Spouse Information Section
            $spouse_info = array(
              'sp_last_name'              => $post['spouse_lname'],
              'sp_first_name'             => $post['spouse_fname'],
              'sp_middle_name'            => $post['spouse_mname'],
              'sp_birthdate'              => $post['spouse_bday'],
              'sp_mobile_no'              => $post['spouse_mobile'],
              'sp_nationality'            => $post['spouse_nationality'],
              'sp_tin'                    => $post['spouse_tin']
            );
            $this->MY_Model->update('tbl_mem_spouse_information' , $spouse_info , $param);
            // end Spouse Information Section

            // Spouse Employment Information
            $spouse_emp = array(
              'type_of_employment'     => $post['spouse_employment_info'],
              'sp_company_name'           => $post['spouse_company_name'],
              'sp_company_contact_no'     => $post['spouse_company_no'],
              'sp_comp_address'                => $post['spouse_company_address'],
              'sp_designation'            => $post['spouse_designation'],
              'sp_employmentStatus'       => $post['spouse_employment_status']
            );
            $this->MY_Model->update('tbl_mem_spouse_emp_info' , $spouse_emp,$param);
            // End Spouse Employment Information

            // Financial Information Section
            $main_data = array();

            // initial Insert
            // $member_id = array('member_id' => $pi_id);
            // $initail_insert = $this->MY_Model->insert('tbl_financial_info' , $member_id);
            // end

            // SOURCE OF INCOME COLUMN
            $source = array(
              'salary_honorarium'     => (isset($post['source_salary_honorarium']) ? 'checked' : null ),
              'interest_commission'   => (isset($post['source_interest_commision']) ? 'checked' : null ),
              'source_business'       => (isset($post['source_business']) ? 'checked' : null ),
              'ofw_remitance'         => (isset($post['source_ofw_remittance']) ? 'checked' : null ),
              'source_farmer'         => (isset($post['source_farmer']) ? 'checked' : null ),
              'other_remittance'      => (isset($post['source_other_remittance']) ? 'checked' : null ),
              'pension'               => (isset($post['source_pension']) ? 'checked' : null ),
              'others'                => (isset($post['source_others']) ? 'checked' : null ),
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

            // if ($initail_insert) {
            //     // SIGNATURE INFO
            //     $signature = array(
            //     'member_id' => $pi_id,
            //     'file_name' => $file_name
            //     );
            if (isset($post['is_captured']) && $post['is_captured'] == true) {
              $image = array(
                'pr_file_name' => $profile_image,
                'pr_date_added' => date("Y-m-d")
              );
              $this->MY_Model->update('tbl_profile_img' , $image , $param);
            }
            //     //end
            // }
            // $where = array('member_id' => $pi_id );
            // $signature = array(
            // 'member_id' => $post['member_id'],
            // 'sg_file_name' => $file_name
            // );

            $this->MY_Model->update('tbl_financial_info' , $main_data[0] , $param);
            $this->MY_Model->update('tbl_financial_info' , $main_data[1] , $param);
            $this->MY_Model->update('tbl_financial_info' , $main_data[2] , $param);
            $this->MY_Model->update('tbl_financial_info' , $main_data[3] , $param);
            // $this->MY_Model->insert('tbl_signatures' , $signature);
            $results = array('success' => 'Updated member successfully.');
            // end Financial Information Section
          } catch (\Exception $e) {
            $results = array('error' => 'Something went wrong. Please try again.');
          }

        }else{
          $results = array('error' => 'Something went wrong. Please try again.');
        }

      }else {
        $results = array('error' => 'Something went wrong. Please try again.');
      }
    }else{
      $results = array('form_error' => $this->form_validation->error_array());
    }

    echo json_encode($results);
  }


  public function saveQr(){
    $base_64 = $this->input->post('base64');
    $account_id = $this->input->post('mem_id');
    $folderPath = "./assets/qrcode/";
    $base64_string = explode(";base64,", $base_64);
    $image_base64 = base64_decode($base64_string[1]);
    $file_name = date('ymd').'-'.uniqid('' , false).".png";
    $file = $folderPath . $file_name ;
    file_put_contents($file, $image_base64);
    $where = array('member_id' => $account_id);
    $params = array(
      'qrcode' => $file_name
    );
    $ins = $this->MY_Model->insert('tbl_signatures', $params, $where);
    return $ins;
    // return "$account_id.png";
  }

  public function convertSignature(){
    $base_64 = $this->input->post('base64');
    $account_id = $this->input->post('mem_id');
    $folderPath = "./assets/qrcode/";
    $base64_string = explode(";base64,", $base_64);
    $image_base64 = base64_decode($base64_string[1]);
    $file_name = date('ymd').'-'.uniqid('' , false).".png";
    $file = $folderPath . $file_name ;
    file_put_contents($file, $image_base64);

    // return "$account_id.png";
  }

  public function convertProfile($base64 ,$account_id ){
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

  public function signatureUpload(){
    $available_file = array('jpg' , 'jpeg' , 'png');
    $file_type = pathinfo($_FILES['signature']['name'], PATHINFO_EXTENSION);
    $config['upload_path'] = './assets/signatures/members/';
    $config['allowed_types'] = '*';
    $config['max_size'] = 2000;
    $config['file_name'] =  date('ymd').'-'.uniqid('' , false);


    $this->load->library('upload');
    $this->upload->initialize($config);
    if(in_array($file_type , $available_file)){
      if ($this->upload->do_upload('signature')) {
        return $config['file_name'].'.'.$file_type;
      }else{
        return array('error' => $this->upload->display_errors()['error']);
      }
    } else {
      return array('error' => 'Please upload an Image of your Signature');
    }
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
      $results = array('status' => 'Error' , 'msg'=> 'Please upload an Image of your Signature');
    }

    echo json_encode($results);
  }

  public function updateProfileImage(){
    $member_id = $this->input->post('member_id');

    $results = array();
    $available_file = array('jpg' , 'jpeg' , 'png');
    $file_type = pathinfo($_FILES['profile_new']['name'], PATHINFO_EXTENSION);
    $config['upload_path'] = './assets/profile/';
    $config['allowed_types'] = '*';
    $config['max_size'] = 2000;
    $config['file_name'] =  date('ymd').'-'.uniqid('' , false);
    $this->load->library('upload', $config);
    if(in_array($file_type , $available_file)){
      if ($this->upload->do_upload('profile_new')) {
        $file_name = $config['file_name'].'.'.$file_type;
        $where = array('member_id' => $member_id);
        $set = array('pr_file_name' => $file_name);
        $update = $this->MY_Model->update('tbl_profile_img' , $set , $where);
        if ($update) {
          $results = array('status' => 'Success' , 'msg' => 'Member profile updated.');
        }else{
          $results = array('status' => 'Error' , 'msg' => 'Something went wrong while uploading the image.Please try again');
        }
      }else{
        $results = array('status' => 'Error' , 'msg' => $this->upload->display_errors());
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

    $this->load->library('upload');
    $this->upload->initialize($config);

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

  // Member ID Section

  public function member_id(){
    if($this->session->has_userdata('logged_in')) {
      // $params['select'] = "CONCAT(last_name ,',',first_name,',' , middle_name) as membername , acount_id , member_id";

      $params['where'] = array(
        'member_type_id' => 2
      );
      $params['or_where'] = array(
        'member_type_id' => 6
      );
      $params['join'] = array(
        'tbl_id_logs' => 'tbl_mem_personal_information.member_id = tbl_id_logs.member_id'
      );
      $params['select'] = "tbl_mem_personal_information.member_id,last_name , first_name , middle_name , acount_id , total , date_last_generated";
      $data['list'] = $this->MY_Model->getRows('tbl_mem_personal_information' , $params);
      $this->load_page('memberId_v' , $data);

    } else {
      redirect(base_url('login'));
    }

  }

  public function getMemberBy_id(){
    $post = $this->input->post();

    $results = array();
    // $params['where'] = array('tbl_mem_personal_information.member_id' => $post['member_id']);
    $params['where_in'] = array('col' => 'tbl_mem_personal_information.member_id','value' => $post['account_id']);
    $params['join'] = array(
      'tbl_profile_img' => 'tbl_mem_personal_information.member_id = tbl_profile_img.member_id'
    );
    $member_info = $this->MY_Model->getRows('tbl_mem_personal_information' , $params);
    $results = array('data' => $member_info);
    echo json_encode($results);
  }

  // END

  // Update Member
  public function viewMember($member_id){
    $params['where'] = array(
      'tbl_mem_personal_information.member_id' => $member_id
    );

    $params['join'] = array(
      'tbl_mem_residence'             => 'tbl_mem_personal_information.member_id = tbl_mem_residence.member_id',
      'tbl_mem_eployment_information' => 'tbl_mem_personal_information.member_id = tbl_mem_eployment_information.member_id',
      'tbl_mem_education_attainment'  => 'tbl_mem_personal_information.member_id = tbl_mem_education_attainment.member_id',
      'tbl_mem_spouse_information'    => 'tbl_mem_personal_information.member_id = tbl_mem_spouse_information.member_id',
      'tbl_mem_spouse_emp_info'       => 'tbl_mem_personal_information.member_id = tbl_mem_spouse_emp_info.member_id',
      'tbl_financial_info'            => 'tbl_mem_personal_information.member_id = tbl_financial_info.member_id',
      'tbl_profile_img'               => 'tbl_mem_personal_information.member_id = tbl_profile_img.member_id',
      'tbl_signatures'                => 'tbl_mem_personal_information.member_id = tbl_signatures.member_id',
    );

    $where['where'] = array('member_id' => $member_id);
    $data['ben'] = $this->MY_Model->getRows('tbl_mem_beneficiaries', $where);
    if (count($data['ben']) == 0) {
      $data['ben']['isEmpty'] = true;
    } else {
      $data['ben']['isEmpty'] = false;
    }

    $data['info'] = $this->MY_Model->getRows('tbl_mem_personal_information' , $params, 'row');
    $data['isEdit'] = true;
    if ($data['info']) {
      $this->load_page('members_v' , $data);
    }else{
      redirect(base_url('members'));
    }
  }

  public function ajaxViewMember(){
    $post = $this->input->post();
    $results = array();
    $params['where'] = array(
      'tbl_mem_personal_information.member_id' => $post['id']
    );
    $params['join'] = array(
      'tbl_mem_residence'             => 'tbl_mem_personal_information.member_id = tbl_mem_residence.member_id',
      'tbl_mem_eployment_information' => 'tbl_mem_personal_information.member_id = tbl_mem_eployment_information.member_id',
      'tbl_mem_education_attainment'  => 'tbl_mem_personal_information.member_id = tbl_mem_education_attainment.member_id',
      'tbl_mem_spouse_information'    => 'tbl_mem_personal_information.member_id = tbl_mem_spouse_information.member_id',
      'tbl_mem_spouse_emp_info'       => 'tbl_mem_personal_information.member_id = tbl_mem_spouse_emp_info.member_id',
      'tbl_financial_info'            => 'tbl_mem_personal_information.member_id = tbl_financial_info.member_id',
      'tbl_profile_img'               => 'tbl_mem_personal_information.member_id = tbl_profile_img.member_id',
      'tbl_signatures'                => 'tbl_mem_personal_information.member_id = tbl_signatures.member_id',
    );
    $data['info'] = $this->MY_Model->getRows('tbl_mem_personal_information' , $params , 'row');

    if ($data['info']) {
      $results = array('status' => 'success' , 'data' => $data['info'] );
    }else{
      $results = array('status' => 'error' , 'data' => [] );
    }
    echo json_encode($results);
  }

  public function getInfoData(){
    $post = $this->input->post();

    $results = array();
    $params['select'] = 'firstname , middlename , lastname, acount_id ,ac_resolution_no, member_type_id, tbl_mem_personal_information.date_added , branch , classifications , facilitator , encoded_by,invited_by , date_of_pmes ,date_approve,encoded_date ,
    remarks , membership_fee , mortuary_prem , savings_deposit , paid_up_capital , total,tbl_account_info.subs_share , amount , no_of_shares , deposited_for_subs , capital_share_deposit , loans_payable , credit_on_trade_payable,
    interest_on_loan_payable , penalties_on_trade_payable , time_deposit , penalties_on_loan_payable_2 , sub_total , deductions , grand_total';
    $params['where'] = array('tbl_mem_personal_information.member_id' => $post['id']);
    $params['join'] = array(
      'tbl_account_info' => 'tbl_account_info.member_id = tbl_mem_personal_information.member_id',
      'tbl_monetary_req' => 'tbl_monetary_req.member_id = tbl_mem_personal_information.member_id',
      'tbl_user_informations' => 'tbl_user_informations.info_id = tbl_account_info.encoded_by',
    );
    $data = $this->MY_Model->getRows('tbl_mem_personal_information' , $params , 'row');
    // if accout close
    $close['where'] = array('member_id' =>  $post['id']);
    $ifcloseAccount = $this->MY_Model->getRows('tbl_member_withdrawal' , $close , 'row');
    //end
    if ($data) {
      $results = array('status' => 'success' , 'data' => $data , 'closedata' => $ifcloseAccount ? $ifcloseAccount : []);
    }else{
      $results = array('status' => 'nodata' , 'data' => []);
    }

    echo json_encode($results);
  }

  public function submit_account_info(){

    $post = $this->input->post();

    $results = array();
    $where = array('member_id' => $post['member_id'] );
    $member_type = array(
      'member_type_id' => $post['member_type']
    );
    $memType_update = $this->MY_Model->update('tbl_mem_personal_information' , $member_type ,$where );
    if ($memType_update) {
      $monetary = array(
        'membership_fee'                 => $post['membershipFee'],
        'mortuary_prem'                  => $post['mortuaryPrem'],
        'savings_deposit'                => $post['savingsDeposit'],
        'paid_up_capital'                => $post['paidup_capital'],
        'total'                          => $post['total'],
        'amount'                         => $post['amount'],
        'no_of_shares'                   => $post['noOfshares'],
        'deposited_for_subs'             => $post['depositedForSubs'],
        'capital_share_deposit'          => $post['capitalShareDeposit'],
        'loans_payable'                  => $post['loansPayable'],
        'credit_on_trade_payable'        => $post['CreditoTrade'],
        'interest_on_loan_payable'       => $post['interestOnLoanPayable'],
        'penalties_on_trade_payable'     => $post['penaltiesOnTrade'],
        'time_deposit'                   => $post['time_deposit'],
        'penalties_on_loan_payable_2'    => $post['penalties_on_loan'],
        'sub_total'                      => $post['sub_total'],
        'deductions'                     => $post['deduction'],
        'grand_total'                    => $post['grand_total']
      );

      $exec = $this->MY_Model->update('tbl_monetary_req' ,$monetary , $where);
      if ($exec) {
        $info = array(
          'subs_share'                     => $post['subs_share'],
          'ac_resolution_no'               => $post['resolutionNo'],
          'date_approve'                   => $post['dateApplied'],
          'branch'                         => $post['branch'],
          'classifications'                => $post['classification'],
          'facilitator'                    => $post['facilitator'],
          'invited_by'                     => $post['invited_by'],
          'date_of_pmes'                   => $post['date_of_pmes'],
          'encoded_date'                   => $post['date_encoded'],
          'remarks'                        => $post['remarks']
        );
        $exec2 = $this->MY_Model->update('tbl_account_info' , $info , $where);

        if ($exec2) {
          if ($post['member_type'] == 4) {
            $closeData = array(
              'member_id'         =>    $post['member_id'],
              'reason'            =>    $post['close_reason'],
              'wt_resolution_no'  =>    $post['w_resolution_no'],
              'date_close'        =>    $post['date_close'],
              'date_approve'      =>    $post['date_close_approve']
            );
            $withdraw = $this->MY_Model->insert('tbl_member_withdrawal' , $closeData);
            if ($withdraw) {
              $results = array('status' => 'success');
            }else{
              $results = array('status' => 'failed');
            }
          }else{
            $results = array('status' => 'success');
          }
        }else{
          $results = array('status' => 'failed');
        }
      }else {
        $results = array('status' => 'failed');
      }
    }else{
      $results = array('status' => 'failed');
    }
    echo json_encode($results);

  }

    public function getlistid(){

        $limit = $this->input->post('length');
        $offset = $this->input->post('start');
        $search = $this->input->post('search');
        $order = $this->input->post('order');
        $draw = $this->input->post('draw');
        $column_order = array('last_name','first_name','middle_name','tbl_mem_personal_information.acount_id' , 'total' , 'date_last_generated');
        $join = array(
          'tbl_mem_personal_information' => 'tbl_mem_personal_information.member_id = tbl_id_logs.member_id'
        );
        $select = "tbl_mem_personal_information.member_id,last_name , first_name , middle_name , acount_id , total , date_last_generated";
    // $where = array(
    //     'tbl_mem_personal_information.member_type_id' => 2,
    //     'tbl_mem_personal_information.member_type_id' => 6
    // );

        $where = "tbl_mem_personal_information.member_type_id = 2";
        $group = array();
        $list = datatables('tbl_id_logs',$column_order, $select, $where, $join, $limit, $offset ,$search, $order, $group);


        $output = array(
              "draw" => $draw,
              "recordsTotal" => $list['count_all'],
              "recordsFiltered" => $list['count'],
              "data" =>  $list['data']
        );

        echo json_encode($output);
    }

    public function idLogs(){
        $post = $this->input->post('value');
        $data = json_decode($post , true);
        foreach ($data as $key => $value) {
            // checking
            $params['where'] = array('member_id' => $value);
            $check = $this->MY_Model->getRows('tbl_id_logs' , $params ,'row');

            if (!$check) {
                $items = array(
                    'member_id' => $value,
                    'total' => 1,
                    'date_last_generated' => date("Y-m-d"),
                    'date_added' => date("Y-m-d")
                );

                // $i = $this->MY_Model->insert('tbl_id_logs' , $items);
            }else{
                $where = array('member_id' => $value );
                $items = array(
                    'total' => $check->total + 1,
                    'date_last_generated' => date("Y-m-d")
                );
                $u = $this->MY_Model->update('tbl_id_logs' , $items , $where);
            }
        }
    }

}
