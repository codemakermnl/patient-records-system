<?php
require_once(APPPATH.'third_party/QRCodeGenerator.php');

class CustomController extends CI_Controller
{

    function __construct ()
    {   
      parent::__construct();
      // $this->load->library('phpqrcode/qrlib');
      $this->load->helper('url');
    }

    public function index()
    {
        $this->load->view('welcome_message');
    }


    public function getPatients() {
         $result = $this->Custom_model->get_patients();
        print_r(json_encode($result));
    }


    public function getPatient() {
         $result = $this->Custom_model->get_patient($this->input->post('patient_id'));
        print_r(json_encode($result));
    }

    public function archive() {
        $table = 'personal_info';
        $personal_info_id = $this->input->post('personal_info_id');
        $data = array(
                    'date_archived' => date('y-m-d H:i')
                );
        $field = 'SHA1(personal_info_id)';
        $where = $personal_info_id;
        $response = $this->Global_model->update_data($table, $data, $field, $where);
        print_r(json_encode($response));
    }
  

    public function validatePassword()
    {
        $password = $_POST['password'];
        $isExist = $this->Global_model->get_data_with_query('users', 'id', 'password ="' . sha1($password) . '" AND username = "' . $this->session->userdata('username') . '"');
        if (count($isExist) > 0) {
            $status = 'success';
        } else {
            $status = 'error';
        }
        echo json_encode(array('status' => $status));
    }

    public function getNewPassword()
    {
        $length = 6;
        $data['password'] = substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);

        print_r(json_encode($data));
    }


    public function update() {

        $table = 'personal_info';
        $personal_info_id = $this->input->post('personal_info_id');

        // $personal_info_id = 10; // temp
        $data = array(
                'first_name' => $this->input->post('first_name'),
                'middle_name' => $this->input->post('middle_name'),
                'last_name' => $this->input->post('last_name'),
                'birth_date' => $this->input->post('birth_date'), 
                'gender' => $this->input->post('gender'), 
                'complete_address' => $this->input->post('complete_address'), 
                'mother_name' => $this->input->post('mother_name'),
                'mother_age' => $this->input->post('mother_age'),
                'mother_occupation' => $this->input->post('mother_occupation'),
                'father_name' => $this->input->post('father_name'),
                'father_age' => $this->input->post('father_age'),
                'father_occupation' => $this->input->post('father_occupation')
                );
        $field = 'personal_info_id';
        $where = $personal_info_id;
        $response = $this->Global_model->update_data($table, $data, $field, $where);
        print_r(json_encode($response));

        $fname = '';
        extract($_FILES['past_medical_file']);
        if($tmp_name != ''){
                $fname = strtotime(date('y-m-d H:i')).'_'.$name;
                $move = move_uploaded_file($tmp_name, 'assets/img/uploads/'. $fname);
        }

        $past_medical_file = $fname;

        $table = 'family_history';
        $data = array(
                'asthma' => $this->input->post('asthma'),
                'dm' => $this->input->post('dm'),
                'hpn' => $this->input->post('hpn'),
                'ca' => $this->input->post('ca'),
                'others_family_history_check' => $this->input->post('others_family_history_check'),
                'others_family_history_text' => $this->input->post('others_family_history_text'),
                'past_medical_file' => $past_medical_file,
                'additional_past_medical' => $this->input->post('additional_past_medical')
                );
        $field = 'personal_info_id';
        $where = $personal_info_id;
        $response = $this->Global_model->update_data($table, $data, $field, $where);
        print_r(json_encode($response));

        $table = 'consultation';
        $data = array(
                'cough' => $this->input->post('cough'),
                'cough_days' => $this->input->post('cough_days'),
                'vomiting' => $this->input->post('vomiting'),
                'vomiting_days' => $this->input->post('vomiting_days'),
                'colds' => $this->input->post('colds'),
                'colds_days' => $this->input->post('colds_days'),
                'abd' => $this->input->post('abd'),
                'abd_days' => $this->input->post('abd_days'),
                'fever' => $this->input->post('fever'),
                'fever_days' => $this->input->post('fever_days'),
                'headache' => $this->input->post('headache'),
                'headache_days' => $this->input->post('headache_days'),
                'diarrhea' => $this->input->post('diarrhea'),
                'dirrhea_days' => $this->input->post('dirrhea_days'),
                'pain' => $this->input->post('pain'),
                'pain_days' => $this->input->post('pain_days'),
                'swelling' => $this->input->post('swelling'),
                'swelling_days' => $this->input->post('swelling_days'),
                'allergies' => $this->input->post('allergies'),
                'allergies_days' => $this->input->post('allergies_days'),
                'others_complain_check' => $this->input->post('others_complain_check'),
                'others_complain_text' => $this->input->post('others_complain_text')
                );
        $field = 'personal_info_id';
        $where = $personal_info_id;
        $response = $this->Global_model->update_data($table, $data, $field, $where);
        print_r(json_encode($response));

        $table = 'physical_exam';
        $data = array(
                'bp' => $this->input->post('bp'),
                'temp' => $this->input->post('temp'),
                'height' => $this->input->post('height'),
                'physical_exam' => $this->input->post('physical_exam'),
                'assessment' => $this->input->post('assessment')
                );
        $field = 'personal_info_id';
        $where = $personal_info_id;
        $response = $this->Global_model->update_data($table, $data, $field, $where);
        print_r(json_encode($response));

        $table = 'prescription';
        $data = array(
                'antibiotics' => $this->input->post('antibiotics'),
                'antihistamine' => $this->input->post('antihistamine'),
                'antipyretic' => $this->input->post('antipyretic'),
                'clarithromycin' => $this->input->post('clarithromycin'),
                'multivitamins' => $this->input->post('multivitamins'),
                'others_prescription_check' => $this->input->post('others_prescription_check'),
                'others_prescription_text' => $this->input->post('others_prescription_text'),
                'other_last' => $this->input->post('other_last')
                );
        $field = 'personal_info_id';
        $where = $personal_info_id;
        $response = $this->Global_model->update_data($table, $data, $field, $where);
        print_r(json_encode($response));

        redirect("patients"); 
    }

    public function register() {
        // print("<pre>".print_r($this->input->post(),true)."</pre>");

        // print("<pre>".print_r($_FILES,true)."</pre>");
        $table = 'personal_info';
        $data = array(
            'first_name' => $this->input->post('first_name'),
            'middle_name' => $this->input->post('middle_name'),
            'last_name' => $this->input->post('last_name'),
            'birth_date' => $this->input->post('birth_date'), 
            'gender' => $this->input->post('gender'), 
            'complete_address' => $this->input->post('complete_address'), 
            'mother_name' => $this->input->post('mother_name'),
            'mother_age' => $this->input->post('mother_age'),
            'mother_occupation' => $this->input->post('mother_occupation'),
            'father_name' => $this->input->post('father_name'),
            'father_age' => $this->input->post('father_age'),
            'father_occupation' => $this->input->post('father_occupation')
        );
        $response = $this->Global_model->insert_data($table, $data);

        if($response === "failed") {
            $data = array(
                'server_errors' => "Data insertion to database Failed. Please contact your system administrator."
            );

            print("<pre>".print_r($data,true)."</pre>");
            print("<pre>".print_r($response,true)."</pre>");

        }

        $personal_info_id = $response;

        $fname = '';
        extract($_FILES['past_medical_file']);
        if($tmp_name != ''){
                $fname = strtotime(date('y-m-d H:i')).'_'.$name;
                $move = move_uploaded_file($tmp_name, 'assets/img/uploads/'. $fname);
        }

        $past_medical_file = $fname;

        // echo 'past medical file: ' . $past_medical_file . '<br>';

        $table = 'family_history';
        $data = array(
            'asthma' => $this->input->post('asthma'),
            'dm' => $this->input->post('dm'),
            'hpn' => $this->input->post('hpn'),
            'ca' => $this->input->post('ca'),
            'others_family_history_check' => $this->input->post('others_family_history_check'),
            'others_family_history_text' => $this->input->post('others_family_history_text'),
            'past_medical_file' => $past_medical_file,
            'additional_past_medical' => $this->input->post('additional_past_medical'),
            'personal_info_id' => $personal_info_id
        );
        $response = $this->Global_model->insert_data($table, $data);

        if($response === "failed") {
            $data = array(
                'server_errors' => "Data insertion to database Failed. Please contact your system administrator."
            );

            print("<pre>".print_r($data,true)."</pre>");
            print("<pre>".print_r($response,true)."</pre>");

            //redirect("make-report");
        }

        $table = 'consultation';
        $data = array(
            'cough' => $this->input->post('cough'),
            'cough_days' => $this->input->post('cough_days'),
            'vomiting' => $this->input->post('vomiting'),
            'vomiting_days' => $this->input->post('vomiting_days'),
            'colds' => $this->input->post('colds'),
            'colds_days' => $this->input->post('colds_days'),
            'abd' => $this->input->post('abd'),
            'abd_days' => $this->input->post('abd_days'),
            'fever' => $this->input->post('fever'),
            'fever_days' => $this->input->post('fever_days'),
            'headache' => $this->input->post('headache'),
            'headache_days' => $this->input->post('headache_days'),
            'diarrhea' => $this->input->post('diarrhea'),
            'dirrhea_days' => $this->input->post('dirrhea_days'),
            'pain' => $this->input->post('pain'),
            'pain_days' => $this->input->post('pain_days'),
            'swelling' => $this->input->post('swelling'),
            'swelling_days' => $this->input->post('swelling_days'),
            'allergies' => $this->input->post('allergies'),
            'allergies_days' => $this->input->post('allergies_days'),
            'others_complain_check' => $this->input->post('others_complain_check'),
            'others_complain_text' => $this->input->post('others_complain_text'),
            'personal_info_id' => $personal_info_id
        );
        $response = $this->Global_model->insert_data($table, $data);

        if($response === "failed") {
            $data = array(
                'server_errors' => "Data insertion to database Failed. Please contact your system administrator."
            );

            print("<pre>".print_r($data,true)."</pre>");
            print("<pre>".print_r($response,true)."</pre>");

            //redirect("make-report");
        }

        $table = 'physical_exam';
        $data = array(
            'bp' => $this->input->post('bp'),
            'temp' => $this->input->post('temp'),
            'height' => $this->input->post('height'),
            'physical_exam' => $this->input->post('physical_exam'),
            'assessment' => $this->input->post('assessment'),
            'personal_info_id' => $personal_info_id
        );
        $response = $this->Global_model->insert_data($table, $data);

        if($response === "failed") {
            $data = array(
                'server_errors' => "Data insertion to database Failed. Please contact your system administrator."
            );

            print("<pre>".print_r($data,true)."</pre>");
            print("<pre>".print_r($response,true)."</pre>");

            //redirect("make-report");
        }

        
        $table = 'prescription';
        $data = array(
            'antibiotics' => $this->input->post('antibiotics'),
            'antihistamine' => $this->input->post('antihistamine'),
            'antipyretic' => $this->input->post('antipyretic'),
            'clarithromycin' => $this->input->post('clarithromycin'),
            'multivitamins' => $this->input->post('multivitamins'),
            'others_prescription_check' => $this->input->post('others_prescription_check'),
            'others_prescription_text' => $this->input->post('others_prescription_text'),
            'other_last' => $this->input->post('other_last'),
            'personal_info_id' => $personal_info_id
        );
        $response = $this->Global_model->insert_data($table, $data);

        if($response === "failed") {
            $data = array(
                'server_errors' => "Data insertion to database Failed. Please contact your system administrator."
            );

            print("<pre>".print_r($data,true)."</pre>");
            print("<pre>".print_r($response,true)."</pre>");

            //redirect("make-report");
        }

        redirect("patients"); 
    }


    public function updatePassword()
    {
        $user_id = $this->session->userdata('user_id');
        $current_password = $this->input->post('current_password');
        $new_password = $this->input->post('new_password');
        $confirm_new_password = $this->input->post('confirm_new_password');
        $user = $this->Global_model->get_data_with_query('users', 'password', 'user_id =' . $user_id);
        if ($new_password == $confirm_new_password) {
            if (sha1($current_password) == $user[0]->password) {
                $table = 'users';
                $data = array('password' => sha1($confirm_new_password));
                $field = 'user_id';
                $where = $user_id;
                $response = $this->Global_model->update_data($table, $data, $field, $where);
                $result['message'] = "Password Successfully Changed";
                $result['status'] = "success";
            } else {
                $result['message'] = "Invalid Password";
                $result['status'] = "error";
            }

        } else {
            $result['message'] = "New password and confirm password does not match";
            $result['status'] = "error";
        }

        print_r(json_encode($result));
    }

  


   
}
