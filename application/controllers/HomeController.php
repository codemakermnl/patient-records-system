<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct() {
		parent::__construct();

		$this->checkSession();
	}

	function checkSession() {

		// if($this->uri->segment(1)!='login'){
		// 	if ($this->session->userdata('user_id')=='') {
		// 		header('Location: '.base_url("login"));
		// 	}
		// } else {
		// 	if($this->session->userdata('user_id')!=''){
		// 		header('Location: '.base_url("home"));
		// 	}
		// }
	}

	public function index()
	{
		$data['view'] =  "patients";
		$data['head'] = array(
			"title"         =>  "Patient List | Enriquez Clinic - Patient Record System",
			);
		$this->load->view('layouts/template', $data);

	}

	public function login()
	{
		$data['view'] =  "patients";
		$data['head'] = array(
			"title"         =>  "Patient List | Enriquez Clinic - Patient Record System",
			);
		$this->load->view('layouts/template', $data);

	}

	public function newMedical()
	{
		$data['view'] =  'new_medical';
		$data['head'] = array(
			"title"         =>  "New Medical Record | Enriquez Clinic - Patient Record System",
			);

		// print("<pre>".print_r($data['result'],true)."</pre>");

		$this->load->view('layouts/template', $data);
	}

	public function successRegister()
	{
		$this->load->view('pages/success_register');
	}

	public function home()
	{
		$data['view'] =  "patients";
		$data['head'] = array(
			"title"         =>  "Patient List | Enriquez Clinic - Patient Record System",
			);
		$this->load->view('layouts/template', $data);

		// print("<pre>".print_r($data['result'],true)."</pre>");
	}

	public function patients()
	{
		$data['view'] =  "patients";
		$data['head'] = array(
			"title"         =>  "Patient List | Vaccine Monitoring and Profiling System",
			);
		$this->load->view('layouts/template', $data);

		// print("<pre>".print_r($data['result'],true)."</pre>");
	}


	public function viewMedical($user_id) {

		$data['result'] = $this->Custom_model->get_patient($user_id);
		$data['view'] =  'view_medical';
		$data['head'] = array(
			"title"         =>  "View Medical Profile | Vaccine Monitoring and Profiling System",
			);

		if(empty($data['result'])) {
			$data['errors'] = "Data record not existing in database.";
		}

		// print("<pre>".print_r($data['result'],true)."</pre>");

		$this->load->view('layouts/template', $data);
	}

	public function updateMedical($user_id) {

		$data['result'] = $this->Custom_model->get_patient($user_id);
		$data['view'] =  'update_medical';
		$data['head'] = array(
			"title"         =>  "Update Medical Profile | Vaccine Monitoring and Profiling System",
			);

		if(empty($data['result'])) {
			$data['errors'] = "Data record not existing in database.";
		}

		// print("<pre>".print_r($data['result'],true)."</pre>");

		$this->load->view('layouts/template', $data);
	}

	

	public function logout() {
		$this->session->sess_destroy();
		header('Location: '.base_url());
	}

	



}
