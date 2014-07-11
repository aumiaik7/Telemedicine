<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bmpt extends CI_Controller {
 
    function __construct() 
    {
        parent::__construct();
		
		// Load CI benchmark and memory usage profiler.
		if (1==2) 
		{
			$sections = array(
				'benchmarks' => TRUE, 'memory_usage' => TRUE, 
				'config' => FALSE, 'controller_info' => FALSE, 'get' => FALSE, 'post' => FALSE, 'queries' => FALSE, 
				'uri_string' => FALSE, 'http_headers' => FALSE, 'session_data' => FALSE
			); 
			$this->output->set_profiler_sections($sections);
			$this->output->enable_profiler(TRUE);
		}
		
		// Load CI libraries and helpers.
		$this->load->database();
		$this->load->library('session');
 		$this->load->helper('url');

  		// IMPORTANT! This global must be defined BEFORE the flexi auth library is loaded! 
 		// It is used as a global that is accessible via both models and both libraries, without it, flexi auth will not work.
		$this->auth = new stdClass;
		
		// Load 'lite' flexi auth library by default.
		// If preferable, functions from this library can be referenced using 'flexi_auth' as done below.
		// This prevents needing to reference 'flexi_auth_lite' in some files, and 'flexi_auth' in others, everything can be referenced by 'flexi_auth'.
		$uData = array(
                   'hello'  => 'Welcome ',
				   'uname' => 'guest'
                 );
		$this->session->set_userdata($uData);
		$this->load->library('flexi_auth_lite', FALSE, 'flexi_auth');	
		
		if ($this->flexi_auth->is_logged_in_via_password() && uri_string() != 'auth/logout') 
		{
			
				
				$uData = array(
                   'hello'  => 'Hello ',
				   'uname' => $this->flexi_auth->get_user_identity(),
				   'usr_id'=>$this->flexi_auth->get_user_id()
                 );
				$this->session->set_userdata($uData);
				
		}
		
		$filename = "ip.txt";
		/*
		$filename = "http://www.in.gr";
		*/
		//The "x" parameter can be "r","w" or "a"
		$handle = fopen($filename, "r");
		$contents = fread($handle, filesize($filename));
		fclose($handle);
		// Note: This is only included to create base urls for purposes of this demo only and are not necessarily considered as 'Best practice'.
		$this->load->vars('base_url', $contents.'telemedicine/');
		$this->load->vars('includes_dir',  $contents.'telemedicine/includes/');
		$this->load->vars('current_url', $this->uri->uri_to_assoc(1));
		
		$this->data = null;
	}

    function index()
	{	
		//$this->load->view('index_view');
		//$this->load->view('demo_view');
		$this->data['message'] = (! isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];
		$this->load->view('first_view', $this->data);
	}
	

    function features()
	{
		$this->load->view('features_view');
	}
	
	function medicine()
	{
		if($this->flexi_auth->get_user_group() == 'Master Admin'  )
		{	
			$this->load->view('admin/medicine_2');
		}
		else 
		{
			$message['msg'] = 'You are not authorized to visit this page. For more information contact with site administrator';
			$this->load->view('messages/problem',$message);
		}
	}
	
	function doc_panel()
	{
		if($this->flexi_auth->get_user_group() == 'Master Admin' || $this->flexi_auth->get_user_group() == 'Doctor' )
		{	
			$this->load->view('doctor/doc_panel');
		}
		else 
		{
			$message['msg'] = 'You are not authorized to visit this page. For more information contact with site administrator';
			$this->load->view('messages/problem',$message);	
		}
	}
	function time_1()
	{
		$this->load->view('doctor/request');
	}
	
	function time_2()
	{
		$this->load->view('doctor/request_2');
	}
	
	function time_3()
	{
		$this->load->view('doctor/request_3');
	}
    
	
	//show operator info panel
	function show_operator()
	{
		if($this->flexi_auth->get_user_group() == 'Master Admin' )
		{	
			//$this->load->model('management');
			//$data = $this->management->show_operator();
			//$this->load->view('patient/operator_info',$data);
			$this->load->view('admin/operator_info');
		}
		else 
		{
			$message['msg'] = 'You are not authorized to visit this page. For more information contact with site administrator';
			$this->load->view('messages/problem',$message);	
		}
	}
	
	//show doctor info panel
	function show_doctor_admin()
	{
		if($this->flexi_auth->get_user_group() == 'Master Admin' )
		{	
			
			$this->load->view('doctor/doctor_info');
		}
		else 
		{
			$message['msg'] = 'You are not authorized to visit this page. For more information contact with site administrator';
			$this->load->view('messages/problem',$message);	
		}
	}
	
	//show doctor info panel
	function show_doctor()
	{
		if($this->flexi_auth->get_user_group() == 'Master Admin' || $this->flexi_auth->get_user_group() == 'Doctor' )
		{	
			$this->load->model('management');
			$data = $this->management->show_doctor();
			$this->load->view('doctor/create_doctor',$data);
		}
		else 
		{
			$message['msg'] = 'You are not authorized to visit this page. For more information contact with site administrator';
			$this->load->view('messages/problem',$message);	
		}
	}
	function create_patient()
	{
		if($this->flexi_auth->get_user_group() == 'Master Admin' || $this->flexi_auth->get_user_group() == 'Operator' )
		$this->load->view('patient/patient_reg');
		else 
		{
			$message['msg'] = 'You are not authorized to visit this page. For more information contact with site administrator';
			$this->load->view('messages/problem',$message);	
		}
	}
    function demo()
	{
		$this->load->view('demo_view');
	}

	function overlay()
	{
		$this->load->view('overlay');
	}


    function user_guide()
	{
		$this->load->view('user_guide_view');
	}

    function support()
	{
		$this->load->view('support_view');
	}

    function privilege_examples()
	{	
		$this->load->view('demo/privilege_examples_view');
	}
	 
	function insert_patient()
	{	
		$id = $this->input->post('patient_id');
		
		$data = array(
               'id' => $id
               );
			$this->db->insert('test', $this->db->escape($data)); 
	}
	function patient_reg()
	{	
		if($this->flexi_auth->get_user_group() == 'Master Admin' || $this->flexi_auth->get_user_group() == 'Operator' )
		{
			$this->load->view('patient/patient_view');
		}
		else
		{
			$this->load->view('unsupported_view');
		}
		
	}
	
	function admin_xotil()
	{	
		if($this->flexi_auth->is_admin())
		{
			$this->load->view('demo/admin_examples/dashboard_view');
		}
		else
		{
			$this->load->view('unsupported_view');
		}
		
	}

    function lite_library()
	{
		$user = $this->flexi_auth->get_user_by_id_row_array();

		$this->data['user_full_name'] = (! empty($user)) ? $user['upro_first_name'].' '.$user['upro_last_name'] : null;
		$this->data['user_phone'] =(! empty($user)) ?  $user['upro_phone'] : null;
		$this->data['user_last_login'] = (! empty($user)) ? date('jS M Y @ H:i:s', strtotime($user['uacc_date_last_login'])) : null;
		$this->data['user_group_desc'] = (! empty($user)) ? $user['ugrp_desc'] : null;

		$this->load->view('demo/lite_view', $this->data);
	}
	
	 public function sendToDb()
	{
		if($this->input->post('patient_name'))
		{
			$this->load->model('management');
			$this->management->sendToDb();
			
			
		}
		else
		echo 'Patient not created';

	}
	
	public function sendToDbOperator()
	{
		
			$this->load->model('management');
			$this->management->sendToDbOperator();
		
	}
	
	//update doc info
	 public function sendToDbDoc()
	{
		
			$this->load->model('management');
			$this->management->sendToDbDoc();
		
	}
	
	
	
	public function image_store()
	{
		
			$this->load->model('management');
			$this->management->image_store();
	
	}
	public function search_patient_byid()
	{
		
			$this->load->model('management');
			$this->management->search_patient_byid();
			
	}
	public function search_patient_byph()
	{
		
			$this->load->model('management');
			$this->management->search_patient_byph();
	
	}
	
	public function start_diagnosis_view()
	{
		$this->load->view('patient/start_diagnosis');
	}
	
	
	//
	public function diagnosis($data=array())
	{
			$this->load->view('patient/start_diagnosis',$data);
	}
	
	public function start_diagnosis_new()
	{
		//$this->load->view('patient/start_diagnosis');
		$this->load->model('management');
		$data = $this->management->start_diagnosis_new();
		if(! empty($data))
			$this->diagnosis($data);
		else
		{
			$data['id'] =  $this->input->post('pID2');
			$this->load->view('exam_list',$data);
		}
		
		
	}
	
	
	// show_diagnosis
	public function show_diagnosis()
	{
		//$this->load->view('patient/start_diagnosis');
		$this->load->model('management');
		$data = $this->management->prev_diagnosis();
		$this->load->view('patient/show_diagnosis',$data);
		
		
	}
	
	// Load prev examination
	public function start_diagnosis_old()
	{
		//$this->load->view('patient/start_diagnosis');
		$this->load->model('management');
		$data = $this->management->prev_diagnosis();
		$this->diagnosis($data);
		
		
	}
	
	
	//start/continue diagnosis
	public function start_diagnosis()
	{
		
		if($this->flexi_auth->get_user_group() == 'Master Admin' || $this->flexi_auth->get_user_group() == 'Operator' )
		{
			$this->load->model('management');
			$value = $this->management->isPatient();
			if($value['patient'] == 1)
			{
				if($this->flexi_auth->get_user_group() == 'Master Admin' || $value['user'] == $this->flexi_auth->get_user_identity())
				{
					if(!$this->management->isPatient_inExam())
					{
						$data = $this->management->start_diagnosis_empty();
					//redirect("auth_lite/start_diagnosis_view");
						$this->diagnosis($data);
					}
					else
					{
						$data['id'] =  $this->input->post('pID2');
						$this->load->view('exam_list',$data);
					}
				}
				else
					{
							$message['msg'] = 'Your are not allowed to start diagnosis for this Patient. This patient is registered under other operator';
							$this->load->view('messages/problem',$message);
					}
				
			}
			else
			{
					$message['msg'] = 'Your submitted Patient ID is invalid. It is not registered. Please give a valid Patient ID';
				$this->load->view('messages/problem',$message);
			}
		}
		else
		{
			$message['msg'] = 'You are not authorized to visit this page. For more information contact with site administrator';
			$this->load->view('messages/problem',$message);
		}
	
	}
	
	
	//show examinations
	public function show_exam()
	{
		
		if($this->flexi_auth->get_user_group() == 'Master Admin' || $this->flexi_auth->get_user_group() == 'Operator' )
		{
			$this->load->model('management');
		
				if(!$this->management->isPatient_inExam())
				{
						$message['msg'] = 'This Patiient does not have any previous Examination Record';
				        $this->load->view('messages/problem',$message);
				}
				else
				{
					$data['id'] =  $this->input->post('pID2');
					$this->load->view('patient/exams',$data);
				}
				
			
		
		}
		else
		{
			$message['msg'] = 'You are not authorized to visit this page. For more information contact with site administrator';
			$this->load->view('messages/problem',$message);
		}
	
	}
	
	
	
	public function old_patient()
	{
		
		$this->load->view('exam_list');
	}
	
	public function submit_diagnosis()
	{
		$this->load->model('management');
		$this->management->submit_diagnosis();
		
	}
	public function get_diagnosis()
	{
		$this->load->model('management');
		$this->management->get_diagnosis();
		
	}
	
	
	
	
	//autocomplete for aci
	function suggestions_com()
	{
		$this->load->model('autocomplete_model');
		$term = $this->input->post('term',TRUE);
		$company = $this->input->post('company');

		if (strlen($term) < 2) break;
	
		$rows = $this->autocomplete_model->GetAutocomplete_com(array('keyword' => $term,'company'=>$company));
	
		$json_array = array();
		foreach ($rows as $row)
		{
				 array_push($json_array, $row->medicineName);
				 //array_push($json_array, $row->id);
		}
		echo json_encode($json_array);
	}
	
	
	//autocomplete for patient Serach by id
	function suggestions_sid()
	{
		$this->load->model('autocomplete_model');
		$term = $this->input->post('term',TRUE);

		if (strlen($term) < 2) break;
	
		$rows = $this->autocomplete_model->GetAutocomplete_sid(array('keyword' => $term));
	
		$json_array = array();
		foreach ($rows as $row)
			 array_push($json_array, $row->searchID);
	
		echo json_encode($json_array);
	}
	
	//autocomplete for patient Serach by mobile no.
	function suggestions_mobile()
	{
		$this->load->model('autocomplete_model');
		$term = $this->input->post('term',TRUE);

		if (strlen($term) < 6) break;
	
		$rows = $this->autocomplete_model->GetAutocomplete_mobile(array('keyword' => $term));
	
		$json_array = array();
		foreach ($rows as $row)
			 array_push($json_array, $row->phone);
	
		echo json_encode($json_array);
	}
	
	
	//autocomplete for test type
	function suggestions_test()
	{
		$this->load->model('autocomplete_model');
		$term = $this->input->post('term',TRUE);

		if (strlen($term) < 1) break;
	
		$rows = $this->autocomplete_model->GetAutocomplete_test(array('keyword' => $term));
	
		$json_array = array();
		foreach ($rows as $row)
			 array_push($json_array, $row->testType);
	
		echo json_encode($json_array);
	}
	
	//autocomplete for medicine type
	function suggestions()
	{
		$this->load->model('autocomplete_model');
		$term = $this->input->post('term',TRUE);

		if (strlen($term) < 1) break;
	
		$rows = $this->autocomplete_model->GetAutocomplete(array('keyword' => $term));
	
		$json_array = array();
		foreach ($rows as $row)
			 array_push($json_array, $row->medicineType);
	
		echo json_encode($json_array);
	}
	
	//autocomplete for disease
	function suggestions_disease()
	{
		$this->load->model('autocomplete_model');
		$term = $this->input->post('term',TRUE);

		if (strlen($term) < 1) break;
	
		$rows = $this->autocomplete_model->GetAutocomplete_disease(array('keyword' => $term));
	
		$json_array = array();
		foreach ($rows as $row)
			 array_push($json_array, $row->disease);
	
		echo json_encode($json_array);
	}
	
	//autocomplete for report field deletion
	function suggestions_reportField ()
	{
		$this->load->model('autocomplete_model');
		$term = $this->input->post('term',TRUE);

		if (strlen($term) < 1) break;
	
		$rows = $this->autocomplete_model->GetAutocomplete_report(array('keyword' => $term));
		
		$json_array = array();
		for ($i = 4; $i < count($rows) ; $i++)
		{
			$string_ = $rows[$i];
			if( strncmp(strtoupper ( $string_ ) , strtoupper ($term), strlen($term)) == 0 ) 
			 array_push($json_array, $rows[$i]);
		}
	
		echo json_encode($json_array);
	}
	
	
	
	
	// load company
	function show_med()
	{
		$this->load->view('doctor/com_2');
		
	}
	
	// load dialog
	function show_dialog()
	{
		$this->load->view('doctor/dialog');
		
	}
	
	// load advice
	function show_advice()
	{
		$this->load->view('doctor/advice');
		
	}
	
	// load test
	function show_test()
	{
		$this->load->view('doctor/test');
		
	}
	
	
	/////Function for adding test type to testtypey22
	function add_test_type()
	{
		$this->load->model('management');
		$this->management->add_test_type();
	}
	/////Function for adding medicine type to medicinetypey22
	function add_med_type()
	{
		$this->load->model('management');
		$this->management->add_med_type();
	}
	
	
	/////Function for deleting test type from testtypey22
	function del_test_type()
	{
		$this->load->model('management');
		$this->management->del_test_type();
	}
	
	/////Function for deleting medicine type from medicinetypey22
	function del_med_type()
	{
		$this->load->model('management');
		$this->management->del_med_type();
	}
	
	
	///add test
	function add_test()
	{
		$this->load->model('management');
		$this->management->add_test();
	}
	///add medicine for company a
	function add_med()
	{
		$this->load->model('management');
		$this->management->add_med();
	}
	
	//load dose
	function show_dose()
	{
		$this->load->view('doctor/dose');
		
	}
	
	//load application
	function show_application()
	{
		$this->load->view('doctor/application');
		
	}
	
	// add dose
	function add_dose()
	{
		$this->load->model('management');
		$this->management->add_dose();
	}
	// add advice
	function add_advice()
	{
		$this->load->model('management');
		$this->management->add_advice();
	}	
	// delete dose
	function del_dose()
	{
		$this->load->model('management');
		$this->management->del_dose();
	}
	
	// delete advice
	function del_advice()
	{
		$this->load->model('management');
		$this->management->del_advice();
	}
	
	// add application
	function add_application()
	{
		$this->load->model('management');
		$this->management->add_application();
	}
	// delete application
	function del_application()
	{
		$this->load->model('management');
		$this->management->del_application();
	}
	
	
	
	// delete test
	function del_test()
	{
		$this->load->model('management');
		$this->management->del_test();
	}
	// delete medicine
	function del_med()
	{
		$this->load->model('management');
		$this->management->del_med();
	}
	
	
	// update test
	function up_test()
	{
		$this->load->model('management');
		$this->management->up_test();
	}
	// update medicine
	function up_med()
	{
		$this->load->model('management');
		$this->management->up_med();
	}
	
	//add Prescription
	function add_prescrip()
	{
		$this->load->model('management');
		$this->management->add_prescrip();
	}
	
	//get Prescription
	function get_prescrip()
	{
		$this->load->model('management');
		$this->management->get_prescrip();
	}
	
	
	
	// send prescription
	function send_primary_prescrip()
	{
		$this->load->model('management');
		$this->management->send_primary_prescrip();
	}
	
	// send prescription
	function send_final_prescrip()
	{
		$this->load->model('management');
		$this->management->send_final_prescrip();
	}
	
	//load Prescription
	function load_prescrip()
	{
		$this->load->view('patient/prescription');
		
	}
	
	//update company name
	function up_company()
	{
		$this->load->model('management');
		$this->management->up_company();
	}
	
	//load report
	function load_report_1()
	{
		$this->load->view('patient/report_2');
		
	}
	
	
	//load report
	function load_report()
	{
		$this->load->view('patient/report');
		
	}
	
	//aDD Field to report
	function add_field()
	{
		$this->load->model('management');
		$this->management->add_field();
	}
	
	
	//Submit report
	function submit_report()
	{
		$this->load->model('management');
		$this->management->submit_report();
	}
	
	//store report
	function report_store()
	{
		$this->load->model('management');
		$this->management->report_store();
	}
	//Delete Field from report
	function field_del()
	{
		$this->load->model('management');
		$this->management->field_del();
	}
	
	//Generate patient info report 
	function hello_world()
	{
		$this->load->view('patient/patient_info');
		
	}
	//Generate primary prescription
	function gen_primary_prescription()
	{
		$this->load->model('management');
		$data = $this->management->gen_primary_prescription();
		$this->load->view('patient/prescription1',$data);
		
	}
	//Generate final prescription
	function gen_final_prescription()
	{
		
		$this->load->model('management');
		$data = $this->management->gen_final_prescription();
		$this->load->view('patient/prescription1',$data);
		
	}
	
	//ADD/Edit Center
	function edit_center()
	{
		if($this->flexi_auth->get_user_group() == 'Master Admin' || $this->flexi_auth->get_user_group() == 'Operator' )
		{
			$this->load->view('patient/center');
		}
		else
		{
			$message['msg'] = 'You are not authorized to visit this page. For more information contact with site administrator';
			$this->load->view('messages/problem',$message);
		}
		
	}
	
	//ADD/Edit Center
	function center_()
	{
		
		$this->load->view('patient/center_');
		
	}
	
	//ADD Center
	function add_center()
	{
		$this->load->model('management');
		$this->management->add_center();
	}
		
	//Delete Center
	function del_center()
	{
		$this->load->model('management');
		$this->management->del_center();
	}
	
	//Update  Center
	function up_center()
	{
		$this->load->model('management');
		$this->management->up_center();
	}
	//get medicine generic
	function get_generic()
	{
		$this->load->model('management');
		$this->management->get_generic();
	}
	//search medicine by generic
	function serach_med_by_gen()
	{
		$this->load->model('management');
		$this->management->serach_med_by_gen();
	}
	
	//get_operator info
	function get_operator()
	{
		$this->load->model('management');
		$this->management->get_operator();
	}
	
	//get_doctor info
	function get_doctor()
	{
		$this->load->model('management');
		$this->management->get_doctor();
	}
	
	//Patient List
	function show_patient()
	{
		if($this->flexi_auth->get_user_group() == 'Master Admin' || $this->flexi_auth->get_user_group() == 'Operator' )
		{
			
			$this->load->view('patient/patient_list');
			
		}
		else
		{
			$message['msg'] = 'You are not authorized to visit this page. For more information contact with site administrator';
			$this->load->view('messages/problem',$message);
		}
		
		
	}
	
	
	//Patient List
	function show_all_patients()
	{
		
		//$this->load->view('patient/all_patients');
		 $this->load->library("pagination");
		 $this->load->model("patients");

		   $config = array();
        $config["base_url"] = base_url() . "bmpt/show_all_patients";
		if($this->flexi_auth->get_user_group() == 'Master Admin')
        {
        $config["total_rows"] = $this->patients->record_count();
		}
		else if($this->flexi_auth->get_user_group() == 'Operator')
		{
			 $config["total_rows"] = $this->patients->record_count_op($this->flexi_auth->get_user_identity());
		}
		
        $config["per_page"] = 15;
        $config["uri_segment"] = 3;
		$choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = round($choice);


        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		if($this->flexi_auth->get_user_group() == 'Master Admin')
        {
			$data["results"] = $this->patients->fetch_patients($config["per_page"], $page);
		}
		else if($this->flexi_auth->get_user_group() == 'Operator')
		{
			$data["results"] = $this->patients->fetch_patients_op($config["per_page"], $page, $this->flexi_auth->get_user_identity());
		}
        $data["links"] = $this->pagination->create_links();

        $this->load->view("patient/all_patients", $data);

		
	}
	
	//show all patient of this doc
	function show_all_patients_this()
	{
		if($this->flexi_auth->get_user_group() == 'Doctor')
		{
			$docID = $this->flexi_auth->get_user_id();
			$this->db->select('uacc_username');
			$query = $this->db->get_where('user_accounts', array('uacc_id'=>$docID));
			$doc['uname'] = $query->row()->uacc_username;
			$this->db->select('docID');
			$query = $this->db->get_where('doctorx23', array('userId'=>$docID));
			$doc['id'] = $query->row()->docID;
			//$this->load->view('patient/all_patients');
			if($this->flexi_auth->get_user_group() == 'Master Admin' ||  $this->flexi_auth->get_user_identity() == $doc['uname'] )
			 {
				 $this->load->library("pagination");
				 $this->load->model("patients");
		
				$config = array();
				$config["base_url"] = base_url() . "bmpt/show_all_patients_center";
				
				$config["total_rows"] = $this->patients->record_count_doc($doc['id']);
				
				
				$config["per_page"] = 15;
				$config["uri_segment"] = 3;
				$choice = $config["total_rows"] / $config["per_page"];
				$config["num_links"] = round($choice);
		
		
				$this->pagination->initialize($config);
		
				$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
				
				$data["results"] = $this->patients->fetch_patients_doc($config["per_page"], $page, $doc['id']);
				
				$data["links"] = $this->pagination->create_links();
		
				$data['id'] = $doc['id'];
				$this->load->view("patient/all_patients_doc", $data);
			}
			else
			{
				$message['msg'] = ' You are not allowed to see selected center'."'".'s Patient Information';
				$this->load->view('messages/problem',$message);
			}
		}
		else
		{
			$message['msg'] = ' You are not Authorized to view this page';
			$this->load->view('messages/problem',$message);
		}

		
	}
	
	
	
	//Patient List By Doctor
	function show_all_patients_doctor()
	{
		
		
		if($this->flexi_auth->get_user_group() == 'Master Admin' ||$this->flexi_auth->get_user_group() == 'Doctor')
		{
			if($_POST)
			{
				$docID = $this->input->post('doctorList');
				$docIdSess = array(
					   'docIdSess'  => $docID
					 );
				$this->session->set_userdata($docIdSess);
			}
			else
				$docID = $this->session->userdata('docIdSess');
			
			
			$this->db->select('uacc_username');
			$query = $this->db->get_where('user_accounts', array('uacc_id'=>$docID));
			$doc['uname'] = $query->row()->uacc_username;
			$this->db->select('docID');
			$query = $this->db->get_where('doctorx23', array('userId'=>$docID));
			$doc['id'] = $query->row()->docID;
			//$this->load->view('patient/all_patients');
			if($this->flexi_auth->get_user_group() == 'Master Admin' ||  $$this->flexi_auth->get_user_identity() == $doc['uname'] )
			 {
				 $this->load->library("pagination");
				 $this->load->model("patients");
		
				$config = array();
				$config["base_url"] = base_url() . "bmpt/show_all_patients_doctor";
				
				$config["total_rows"] = $this->patients->record_count_doc($doc['id']);
				
				
				$config["per_page"] = 15;
				$config["uri_segment"] = 3;
				$choice = $config["total_rows"] / $config["per_page"];
				$config["num_links"] = round($choice);
		
		
				$this->pagination->initialize($config);
		
				$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
				
				$data["results"] = $this->patients->fetch_patients_doc($config["per_page"], $page, $doc['id']);
				
				$data["links"] = $this->pagination->create_links();
		
				$data['id'] = $doc['id'];
				$this->load->view("patient/all_patients_doc", $data);
		}
			else
			{
				$message['msg'] = ' You are not allowed to see selected center'."'".'s Patient Information';
				$this->load->view('messages/problem',$message);
			}
		}
		else
		{
			$message['msg'] = ' You are not Authorized to view this page';
			$this->load->view('messages/problem',$message);
		}

		
	}
	
	
	//Patient List By center
	function show_all_patients_center()
	{
		
		if($_POST)
		{
			$opID = $this->input->post('operatorList');
			$opIdSess = array(
                   'opIdSess'  => $opID
                 );
			$this->session->set_userdata($opIdSess);
		}
		else
			$opID = $this->session->userdata('opIdSess');
			
			
		$this->db->select('uacc_username');
		$query = $this->db->get_where('user_accounts', array('uacc_id'=>$opID));
		$operator['id'] = $query->row()->uacc_username;
		//$this->load->view('patient/all_patients');
		if($this->flexi_auth->get_user_group() == 'Master Admin' ||  $this->flexi_auth->get_user_identity() == $operator['id'] )
		 {
			 $this->load->library("pagination");
			 $this->load->model("patients");
	
			$config = array();
			$config["base_url"] = base_url() . "bmpt/show_all_patients_center";
			
			$config["total_rows"] = $this->patients->record_count_op($operator['id']);
			
			
			$config["per_page"] = 15;
			$config["uri_segment"] = 3;
			$choice = $config["total_rows"] / $config["per_page"];
			$config["num_links"] = round($choice);
	
	
			$this->pagination->initialize($config);
	
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			
			$data["results"] = $this->patients->fetch_patients_op($config["per_page"], $page, $operator['id']);
			
			$data["links"] = $this->pagination->create_links();
	
			$data['op'] = $operator['id'] ;
			$this->load->view("patient/all_patients", $data);
		}
		else
		{
			$message['msg'] = ' You are not allowed to see selected center'."'".'s Patient Information';
			$this->load->view('messages/problem',$message);
		}

		
	}
	
	
	//Patient Info
	function show_patient_info()
	{
		$data['id'] =$_GET['pid'];
		//$data['id'] =$data['id'] -101000;
		$this->load->model('management');
		$value = $this->management->isPatient_get($data);
		if($value['patient'] == 1)
		{
			if($this->flexi_auth->get_user_group() == 'Master Admin')
			$this->load->view('patient/show_patient_info',$data);
			else 
			{
					if($value['user'] == $this->flexi_auth->get_user_identity())
					$this->load->view('patient/show_patient_info',$data);
					else
					{
							$message['msg'] = 'Your are not allowed to see this Patient'."'".'s information. This patient is not registered by you';
							$this->load->view('messages/problem',$message);
					}
					
			}
		}
		else
		{
				$message['msg'] = 'Your submitted Patient ID is invalid. It is not registered. Please give a valid Patient ID';
				$this->load->view('messages/problem',$message);
		}
	}
	
	
	
	//Patient Info by Mobile No
	function show_patient_info_mobile()
	{
		$data['mobile'] =$_GET['pMobile'];
		//$data['id'] =$data['id'] -101000;
		$this->load->model('management');
		$value = $this->management->isPatient_get_mobile($data);
		if($value['patient'] == 1)
		{
			
			 $this->load->library("pagination");
			 $this->load->model("patients");
	
			   $config = array();
			$config["base_url"] = base_url() . "bmpt/show_all_patients";
			if($this->flexi_auth->get_user_group() == 'Master Admin')
			{
			$config["total_rows"] = 1;
			}
			else if($this->flexi_auth->get_user_group() == 'Operator')
			{
				 $config["total_rows"] = $this->patients->record_count_op($this->flexi_auth->get_user_identity());
			}
			
			$config["per_page"] = 15;
			$config["uri_segment"] = 3;
			$choice = $config["total_rows"] / $config["per_page"];
			$config["num_links"] = round($choice);
	
	
			$this->pagination->initialize($config);
		
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			
			if($this->flexi_auth->get_user_group() == 'Master Admin')
			{
				$data["results"] = $this->patients->fetch_patients_mobile($config["per_page"], $page,$data['mobile'] );
				$data["links"] = $this->pagination->create_links();

       			 $this->load->view("patient/all_patients", $data);
			}
			else 
			{
					if($value['user'] == $this->flexi_auth->get_user_identity())
					{
						$data["results"] = $this->patients->fetch_patients_op($config["per_page"], $page, $data['mobile']);
						$data["links"] = $this->pagination->create_links();
						$this->load->view("patient/all_patients", $data);
					}
					else
					{
							$message['msg'] = 'Your are not allowed to see this Patient'."'".'s information. This patient is not registered by you';
							$this->load->view('messages/problem',$message);
					}
					
			}
		}
		else
		{
				$message['msg'] = 'Your submitted Mobile No. is invalid. It is not registered. Please give a valid Mobile No.';
				$this->load->view('messages/problem',$message);
		}
	}
	
	
	//update_patient
	
	function update_patient()
	{
		$this->load->model('management');
		$this->management->update_patient();
	}
	
	
	//show prescription Panel
	
	function show_prescription_panel()
	{
		$this->load->view('doctor/prescription');
	}
}

/* End of file auth_lite.php */
/* Location: ./application/controllers/auth_lite.php */