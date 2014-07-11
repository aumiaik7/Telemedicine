<?php
date_default_timezone_set('Asia/Dhaka');
class Management extends CI_Model {

	public function __construct()
	{
		//$this->load->database();
		/*$this->auth = new stdClass;
		
		// Load 'lite' flexi auth library by default.
		// If preferable, functions from this library can be referenced using 'flexi_auth' as done below.
		// This prevents needing to reference 'flexi_auth_lite' in some files, and 'flexi_auth' in others, everything can be referenced by 'flexi_auth'.
		
		$this->load->library('flexi_auth_lite', FALSE, 'flexi_auth');	*/
	}
	
	
	
	//get_operator info
	public function get_operator()
	{
		$opId = $this->input->post('opId');
		$query = $this->db->get_where('operatory28', array('operatorID' => $opId));
		if($query->num_rows()>0)
		{
			$data['name'] =  $query->row()->operatorName;
			$data['doc'] =  $query->row()->assignedDoctor;
			$data['center'] =  $query->row()->centerName;
			$data['address'] =  $query->row()->address;
			echo json_encode($data);
		}
		else
			echo NULL;
	}
	
	
	//get_doctor info
	public function get_doctor()
	{
		$docId = $this->input->post('docId');
		$query = $this->db->get_where('doctorx23', array('docID' => $docId));
		if($query->num_rows()>0)
		{
			$data['name'] =  $query->row()->docName;
			$data['designation'] =  $query->row()->designation;
			$this->db->select('operatorID,operatorName');
			$query = $this->db->get_where('operatory28', array('assignedDoctor' => $docId));
			$data['operator'] = "";
			if($query->num_rows()>0)
			{
				foreach($query->result() as $row) 
		 		$data['operator'] = $data['operator'] .'[Operator ID: '.$row->operatorID.'] [Name: ' .$row->operatorName.']'."\n";
				
			}
			else
			{
				$data['operator'] = "No operator appointed yet";	
			}
			echo json_encode($data);
		}
	
		else
			echo NULL;
	}
	
	// serach medicine by generic
	public function serach_med_by_gen()
	{
		$company   =   $this->input->post('company');
		$generic   =   $this->input->post('generic');
		
		$this->db->select('id,medicineName');
	    $this->db->like('generic', $generic, 'after');
		$this->db->or_like('generic', ' '.$generic);
		$query = $this->db->get($company);
		$medicine = array();
		$id = array();
		if($query->num_rows()>0)
		{
			foreach($query->result() as $row){ 
			
				//array_push( $id, $row->id);
				//array_push( $medicine, $row->medicineName);
				//$data['id'] = $row->id;
				//$data['medicine'] = $row->medicine;
				
				$medicine[] = array($row->medicineName, $row->id);
				
			}
			
			echo json_encode($medicine);
		}
		else
		echo NULL;
		
		
		
	
		
		
		
	}
	
	// get med generic by name
	public function get_generic()
	{
		$medicineName   =   $this->input->post('medicineName');
		$company   =   $this->input->post('company');
		
		$this->db->select('id,generic,type');
		$query = $this->db->get_where($company, array('medicineName' => $medicineName));
		
		
		if($query->num_rows()>0)
		{
			$data['id'] = $query->row()->id;
			$data['generic'] = $query->row()->generic;
			$data['type'] = $query->row()->type;
					
					echo json_encode($data);
		}
		else
			echo NULL;
		
		
		
	}
	
	// update center name
	public function up_center()
	{
		$centerName = $this->input->post('centerName');
		$center = $this->input->post('upCenter');
		
		
		
		
		$data = array('centerName' => $center );
		
		$this->db->where('centerName' , $centerName);
		$this->db->update('centerx25', $data);
		$row  = $this->db->affected_rows();
		
		if($row == 1)
		{
			echo 'Updated';
		}
		else
			echo 'Failed Try Again';
		
		
		
	}
	
	// delete med
	public function del_center()
	{
		$centerName = $this->input->post('centerName');
		
		
		$this->db->delete('centerx25',array('centerName' => $centerName));
		$row  = $this->db->affected_rows();
		
		if($row == 1)
		{
			echo 'Deleted';
		}
		else
			echo 'Failed Try Again';
		
		
		
	}
	
	
	//add center
	public function add_center()
	{
		$centerName   =   $this->input->post('centerName');
		$this->db->insert('centerx25',array('centerName' => $centerName));
				$row  = $this->db->affected_rows();
				if($row == 1)
				{
					echo 'Successfully Added';
				}
				else
					echo 'Failed Try Again';
		
		
	}
	
	//provide information for generating final prescription
	public function gen_final_prescription()
	{
			$search_id = $this->input->post('hptntID');	
		$exam_id = $this->input->post('hexamID');	
		$query = $this->db->get_where('examinationx24', array('searchID' => $search_id, 'examinationID' => $exam_id ));
		if($query->num_rows() > 0){
			$data['patient_id'] = $query->row()->searchID;
			$data['exam_id'] = $query->row()->examinationID;
			$data['prescription'] = $query->row()->finalDiagnosis;
			$data['symptom'] = $query->row()->symptom;
			$data['doc_id'] =  $query->row()->docID;
			$query = $this->db->get_where('doctorx23', array('docID' => $data['doc_id']));
			if($query->num_rows() > 0)
			{
				$data['doc_name'] = $query->row()->docName;
				$data['doc_designation'] = $query->row()->designation;
			}
			else 
			{	
				$data['doc_name'] = 'Doctor Not Selected';
				$data['doc_designation'] = 'Empty';
			}
			$query = $this->db->get_where('patientx22', array('searchID' => $data['patient_id']));
			$data['patient_name'] = $query->row()->patientName;
			$data['patient_sex'] = $query->row()->sexOfPatient;
			$data['patient_phone'] = $query->row()->phone;
			
			$today = explode('/', date("d/m/Y"));
			$dob =  explode('/', $query->row()->dobOfPatient);
			$data['patient_age'] = $today[2] -  $dob[2];
			
			return $data;
		}
		
		
	}
	
	
	//provide information for generating primary prescription
	public function gen_primary_prescription()
	{
		$search_id = $this->input->post('hptntID');	
		$exam_id = $this->input->post('hexamID');	
		$query = $this->db->get_where('examinationx24', array('searchID' => $search_id, 'examinationID' => $exam_id ));
		if($query->num_rows() > 0){
			$data['patient_id'] = $query->row()->searchID;
			$data['exam_id'] = $query->row()->examinationID;
			$data['prescription'] = $query->row()->primaryDiagnosis;
			$data['symptom'] = $query->row()->symptom;
			$data['doc_id'] =  $query->row()->docID;
			$query = $this->db->get_where('doctorx23', array('docID' => $data['doc_id']));
			if($query->num_rows() > 0)
			{
				$data['doc_name'] = $query->row()->docName;
				$data['doc_designation'] = $query->row()->designation;
			}
			else 
			{	
				$data['doc_name'] = 'Doctor Not Selected';
				$data['doc_designation'] = 'Empty';
			}
			$query = $this->db->get_where('patientx22', array('searchID' => $data['patient_id']));
			$data['patient_name'] = $query->row()->patientName;
			$data['patient_sex'] = $query->row()->sexOfPatient;
			$data['patient_phone'] = $query->row()->phone;
			
			$today = explode('/', date("d/m/Y"));
			$dob =  explode('/', $query->row()->dobOfPatient);
			$data['patient_age'] = $today[2] -  $dob[2];
			
			return $data;
		}
		
		
	}
	
	// delete field from report 
	public function field_del()
	{
		$this->load->dbforge();
		$fieldName = $this->input->post('fieldName');
		
		if($this->dbforge->drop_column('reportz23',$fieldName))
		{
			echo "Deleted";
		}
		else
			echo "Problem occured. Try again";
	}
	// store reports
	public function report_store()
	{
		
		$search_id = $this->input->post('pID');
		$eID = $this->input->post('eID');
		$image_id =  $this->session->userdata('imageIdent');
		$im1 = $this->input->post('im1');
		$im1_ = $this->input->post('im1_');
		$im2 = $this->input->post('im2');
		$im2_ = $this->input->post('im2_');
		$im3 = $this->input->post('im3');
		$im3_ = $this->input->post('im3_');
		$im4 = $this->input->post('im4');
		$im4_ = $this->input->post('im4_');
		$im5 = $this->input->post('im5');
		$im5_ = $this->input->post('im5_');
		
		$this->db->select('reportUrl');
		$query = $this->db->get_where('reportz23', array('searchID'=> $search_id, 'examinationID'=> $eID ));
		if($query->num_rows() > 0)
		{
			
			$report['url'] = $query->row()->reportUrl;
			if($im1 != "")
			{
					$report['url'] = $report['url']. $im1 . '_' . $image_id . '.' .$im1_ .';' ;
			}
			if($im2 != "")
			{
					$report['url'] = $report['url']. $im2 . '_' . $image_id . '.' .$im2_ .';' ;
			}
			if($im3 != "")
			{
					$report['url'] = $report['url']. $im3 . '_' . $image_id . '.' .$im3_ .';' ;
			}
			if($im4 != "")
			{
					$report['url'] = $report['url']. $im4 . '_' . $image_id . '.' .$im4_ .';' ;
			}
			if($im5 != "")
			{
					$report['url'] = $report['url']. $im5 . '_' . $image_id . '.' .$im5_ .';' ;
			}
			$data['reportUrl'] = $report['url'];
			$data['hasReport'] = 1;
			$this->db->where('searchID' , $search_id);
			$this->db->where('examinationID' , $eID);
			$this->db->update('reportz23', $data);
			$row  = $this->db->affected_rows();
		
			if($row == 1)
			{
				echo 'Report(s) Uploaded';
			}
			else
				echo 'Failed Try Again';
			
			
		}
		else 
			echo 'No entry with this Patient ID and Examination ID';
	}
	
	// Submit report 
	public function submit_report()
	{
		$search_id = $this->input->post('pID');
		$eID = $this->input->post('eID');
		$reportName = $this->input->post('report_name');
		$report = $this->input->post('report');
		$result = count($reportName);
		$data = array();
		for($i=0; $i< $result; $i++)
		{
			$data[$reportName[$i]] = $report[$i];	
		}
		$data['hasReport'] = 1;
		$this->db->where('searchID' , $search_id);
		$this->db->where('examinationID' , $eID);
		$this->db->update('reportz23', $data);
		$row  = $this->db->affected_rows();
		
		if($row == 1)
		{
			echo 'Report Submited';
		}
		else
			echo 'Failed Try Again';
		
	}
	
	// add field to report 
	public function add_field()
	{
		$this->load->dbforge();
		$fieldName = $this->input->post('fieldName');
		$fields = array(
                        $fieldName => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                );
		if($this->dbforge->add_column('reportz23',$fields))
		{
			echo "Added";
		}
		else
			echo "Problem occured. Try again";
	}
	
	// update company name
	public function up_company()
	{
		$comID = $this->input->post('comID');
		$comName = $this->input->post('company');
		
		
		
		
		$data = array('companyName' => $comName );
		
		$this->db->where('companyID' , $comID);
		$this->db->update('companyz22', $data);
		$row  = $this->db->affected_rows();
		
		if($row == 1)
		{
			echo 'Updated';
		}
		else
			echo 'Failed Try Again';
		
		
		
	}
	
	
	// send primary prescription
	public function send_primary_prescrip()
	{
		$search_id = $this->input->post('pID');
		$eID = $this->input->post('eID');
		$symptom = $this->input->post('symptom');
		$prescription = $this->input->post('prescription');
		
		$data = array('symptom' => $symptom,
		'primaryDiagnosis' => $prescription);
		
		$this->db->where('searchID', $search_id);
		$this->db->where('examinationID', $eID);
		$this->db->update('examinationx24', $data);
		$row  = $this->db->affected_rows();
		
		if($row == 1)
		{
			echo 'Prescription Sent';
		}
		else
			echo 'Failed Try Again';
		
		
		
	}
	
	// send final prescription
	public function send_final_prescrip()
	{
		$search_id = $this->input->post('pID');
		$eID = $this->input->post('eID');
		$symptom = $this->input->post('symptom');
		$prescription = $this->input->post('prescription');
			
		
		$data = array('symptom' => $symptom,
		'finalDiagnosis' => $prescription);
		
		$this->db->where('searchID', $search_id);
		$this->db->where('examinationID', $eID);
		$this->db->update('examinationx24', $data);
		$row  = $this->db->affected_rows();
		
		if($row == 1)
		{
			echo 'Prescription Sent';
		}
		else
			echo 'Failed Try Again';
		
		
		
	}
	
	
	
	
	
	
	// get prescrip
	public function get_prescrip()
	{
		$disease   =   $this->input->post('disease');
		
		$query = $this->db->get_where('prescriptiony25', array('disease' => $disease));
		
		
		if($query->num_rows()>0)
		{
			$data['prescription'] = $query->row()->prescription;
			$data['prescriptionH'] = $data['prescription'];
			$data['flag'] = 0;
			
			
			
			if(strpos($data['prescription'], '#') !== false || strpos($data['prescription'], '&') !== false || strpos($data['prescription'], '$') !== false)
			{
				$data['flag'] = 1;
				$testP = '-';
				$medicineP = '-';
				$adviceP = '-';
				
				$parts = array();
				$parts1 = array();
				$parts2 = array();
				
		
				
				$parts = preg_split('/[&#$]/', $data['prescription']);
				
				for($i=1; $i< count($parts) ; $i++)
				{
					if($parts[$i][0] == '^')
					{
						$medicineP = ltrim($parts[$i],'^');
					}	
					else if($parts[$i][0] == '!')
					{
						$testP = ltrim($parts[$i],'!');
					}	
					if($parts[$i][0] == '~')
					{
						$adviceP = ltrim($parts[$i],'~');
					}	
				}
				
						
				//Parse Primary Prescription
				 if($medicineP != '-')
				 {
					   $parts =  explode(';', $medicineP);
					   $serial = 1;
					   $data['prescription'] = '::Medicine::'."\n" ;
					   for($i=0; $i< count($parts)-1; $i+=2)
					   {
						 $parts1 = explode(':', $parts[$i]);
						 $this->db->select('companyID,dbName');
						 $query = $this->db->get_where('companyz22', array('companyID' => $parts1[0]));
						 $dbName = $query->row()->dbName;
						 
						 
						 $this->db->select('id,medicineName');
						 $query = $this->db->get_where($dbName, array('id' => $parts1[1]));
						 $medicineName= $query->row()->medicineName;
						 
						 $parts2 =  explode(':', $parts[$i+1]);
						 $data['prescription'] .= $serial.'. '.$medicineName;
						 if($parts1[2] >=1 )
						 {
							  $parts1[2] = rtrim($parts1[2],'d');
							  $data['prescription'] .= "    ".$parts1[2].' '.$day_s = ($parts1[2]>1)?'days' : 'day';
							  $data['prescription'] .= "\n";  						   
						  } 
						  else
							  $data['prescription'] .= "\n";  	
						 
						 
						 if($parts2[0]!=NULL)
						 {
							 $this->db->select('dose');
							 $query = $this->db->get_where('dosey24', array('id' => $parts2[0]));
							 $data['prescription'] .= $query->row()->dose;
						 }
						 if($parts2[1]!=NULL){
							 $this->db->select('application');
							 $query = $this->db->get_where('applicationy29', array('id' => $parts2[1]));
							  $data['prescription'] .= "    ".$query->row()->application."\n";
						 }
						 else
						 {
							 $data['prescription'] .= "\n";  
						 }
						  
						 $serial++;
					   }
					
								 
				 }
				 if($testP != '-')
					{
						  $parts =  explode(';', $testP);
						  
						  $data['prescription'] .= '::Test(s)::'."\n";
						  for($i=0; $i< count($parts)-1; $i++)
						  {
							   $this->db->select('testName');
							   $query = $this->db->get_where('testy27', array('id' => $parts[$i]));
							   $data['prescription'] .= ($i+1).". " .$query->row()->testName."\n";
						  }
						 
					}
					 
				if($adviceP != '-')
				{
					 $data['prescription'] .= 'Advice(s):'."\n";
					 $parts =  explode(';', $adviceP);
					 for($i=0; $i< count($parts)-1; $i++)
					 {
						  $this->db->select('advice');
						  $query = $this->db->get_where('advicez25', array('id' => $parts[$i]));
						  $data['prescription'] .= '* '.$query->row()->advice."\n";
								 
					   }
				}
			}
			
			
					
					echo json_encode($data);
		}
		else
			echo NULL;
		
		
		
	}
	
	// add prescrip
	public function add_prescrip()
	{
		$disease   =   $this->input->post('disease');
		$prescription   = $this->input->post('prescription');
		
		
		//$sql = "INSERT INTO prescriptiony25 (disease, prescription) VALUES (".$disease.", ".$prescription.")";
		//$this->db->query($sql);
		//$this->db->set('disease', $disease);
		//$this->db->set('disease', $disease);
		//$this->db->set('prescription', $prescription);
		$this->db->insert('prescriptiony25', array('disease' => $disease, 'prescription' => $prescription));
		$row  = $this->db->affected_rows();
		
		if($row == 1)
		{
			echo 'Successfully Added';
		}
		else
			echo 'Failed Try Again';
		
		
		
	}
	
	
	// update medicine
	public function up_test()
	{
		$testName = $this->input->post('testName');
		$testType = $this->input->post('testType');
		$newTest = $this->input->post('newTest'); 
		
		
		
		$data = array('testName' => $newTest );
		
		$this->db->where('testName', $testName);
		$this->db->where('testType', $testType);
		$this->db->update('testy27', $data);
		$row  = $this->db->affected_rows();
		
		if($row == 1)
		{
			echo 'Updated';
		}
		else
			echo 'Failed Try Again';
		
		
		
	}
	
	// update medicine
	public function up_med()
	{
		$medName = $this->input->post('medName');
		$com   =   $this->input->post('company');
		$newMed = $this->input->post('newMed'); 
		$generic = $this->input->post('generic');
		$type = $this->input->post('type');
		
		
		
		$data = array('medicineName' => $newMed, 'generic' => $generic, 'type' => $type );
		
		$this->db->where('medicineName', $medName);
		$this->db->update($com, $data);
		$row  = $this->db->affected_rows();
		
		if($row == 1)
		{
			echo 'Updated';
		}
		else
			echo 'Failed Try Again';
		
		
		
	}
	
	
	// delete test
	public function del_test()
	{
		$testType = $this->input->post('testType');
		$testName = $this->input->post('testName');
		
		$this->db->delete('testy27',array('testName' => $testName, 'testType' => $testType));
		$row  = $this->db->affected_rows();
		
		if($row == 1)
		{
			echo 'Deleted';
		}
		else
			echo 'Failed Try Again';
		
		
		
	}
	
	
	// delete med
	public function del_med()
	{
		
		$com   =   $this->input->post('company');
		$medName = $this->input->post('medName');
		
		
		$query = $this->db->get_where($com,array('medicineName' => $medName));
		if($query->num_rows()>0)
		{
			$this->db->delete($com,array('medicineName' => $medName));
			$row  = $this->db->affected_rows();
			
			if($row == 1)
			{
				echo 'Deleted';
			}
			else
				echo 'Failed Try Again';
		}
		else 
			echo 'This medicine does not exist for deleting';
		
	}
	
	
	
	// delete application
	public function del_application()
	{
		$appId   =   $this->input->post('appId');
		$this->db->delete('applicationy29',array('id' => $appId));
		$row  = $this->db->affected_rows();
		
		if($row == 1)
		{
			echo 'Deleted';
		}
		else
			echo 'Failed Try Again';
		
		
		
	}
	
	// add application
	public function add_application()
	{
		$app   =   $this->input->post('app');
		$this->db->insert('applicationy29', array('application' => $app));
		$row  = $this->db->affected_rows();
		
		if($row == 1)
		{
			echo 'Successfully Added';
		}
		else
			echo 'Failed Try Again';
		
		
		
	}
	
	
	
	
	// delete dose
	public function del_dose()
	{
		$id   =   $this->input->post('doseId');
		$this->db->delete('dosey24',array('id' => $id));
		$row  = $this->db->affected_rows();
		
		if($row == 1)
		{
			echo 'Deleted';
		}
		else
			echo 'Failed Try Again';
		
		
		
	}
	
	// delete advice
	public function del_advice()
	{
		$id   =   $this->input->post('id');
		$this->db->delete('advicez25',array('id' => $id));
		$row  = $this->db->affected_rows();
		
		if($row == 1)
		{
			echo 'Deleted';
		}
		else
			echo 'Failed Try Again';
		
		
		
	}
	
	// add dose
	public function add_dose()
	{
		$dose   =   $this->input->post('dose');
		$this->db->insert('dosey24', array('dose' => $dose));
		$row  = $this->db->affected_rows();
		
		if($row == 1)
		{
			echo 'Successfully Added';
		}
		else
			echo 'Failed Try Again';
		
		
		
	}
	// add advice
	public function add_advice()
	{
		$advice   =   $this->input->post('advice');
		$this->db->insert('advicez25', array('advice' => $advice));
		$row  = $this->db->affected_rows();
		
		if($row == 1)
		{
			echo 'Successfully Added';
		}
		else
			echo 'Failed Try Again';
		
		
		
	}
	
	///add test
	public function add_test()
	{
		$testName   =   $this->input->post('testName');
		$testType   =   $this->input->post('testType');
		$query =   $this->db->get_where('testtypey26', array('testType' => $testType));
		if($query->num_rows() > 0)
		{
			$this->db->insert('testy27',array('testName' => $testName,'testType' => $testType));
				$row  = $this->db->affected_rows();
				if($row == 1)
				{
					echo 'Successfully Added';
				}
				else
					echo 'Failed Try Again';
		}
		else
		{
				echo 'Test Type not stored. Store it first';
		}
		
	}
	
	///add medicine for company a
	public function add_med()
	{
		$medName   =   $this->input->post('medName');
		$company   =   $this->input->post('company');
		$generic   =   $this->input->post('generic');
		$type   =   $this->input->post('type');
		
		{
			$this->db->insert($company,array('medicineName' => $medName, 'generic'=>$generic, 'type' => strtolower($type) ));
				$row  = $this->db->affected_rows();
				if($row == 1)
				{
					echo 'Successfully Added';
				}
				else
					echo 'Failed Try Again';
		}
		
		
	}
	
	
	//delete test type
	public function del_test_type()
	{
		$testType   =   $this->input->post('testType');
		$query =   $this->db->get_where('testtypey26', array('testType' => $testType));
		if($query->num_rows() > 0)
		{
			$this->db->delete('testtypey26',array('testType' => $testType));
			$row  = $this->db->affected_rows();
			if($row == 1)
				{
					echo 'Deleted';
				}
				else
					echo 'Failed Try Again';
		}
		else
		{
				echo 'There is no such Test type stored';
				
		}
		
	}
	
	//delete medicine type
	public function del_med_type()
	{
		$medType   =   $this->input->post('medType');
		$query =   $this->db->get_where('medicinetypey22', array('medicineType' => $medType));
		if($query->num_rows() > 0)
		{
			$this->db->delete('medicinetypey22',array('medicineType' => $medType));
			$row  = $this->db->affected_rows();
			
			if($row == 1)
			{
				$data = array('type'=>'Other');
				 $query =   $this->db->get('companyz22');
				 if($query->num_rows>0)
				 {
					foreach($query->result() as $row)	
					{
						$name['dbaname'] = $row->dbName;
						$this->db->where('type', $medType);
						$this->db->update($name['dbaname'],$data);
					}
					
				 }
				
				
				/*$this->db->where('type', $medType);
				$this->db->update('aci',$data);
				$this->db->where('type', $medType);
				$this->db->update('beximco',$data);
				$this->db->where('type', $medType);
				$this->db->update('square',$data);
				$this->db->where('type', $medType);
				$this->db->update('drugint',$data);
				$this->db->where('type', $medType);
				$this->db->update('incepta',$data);
				*/
				
				
					echo 'Deleted';
			}
				else
					echo 'Failed Try Again';
		}
		else
		{
				echo 'There is no such Medicine type stored';
				
		}
		
	}
	
	
	//add test type to DB
	public function add_test_type()
	{
		$testType   =   $this->input->post('testType');
		$query =   $this->db->get_where('testtypey26', array('testType' => $testType));
		if($query->num_rows() > 0)
		{
			echo 'Already Exists';
		}
		else
		{
				$this->db->insert('testtypey26',array('testType' => $testType));
				$row  = $this->db->affected_rows();
				if($row == 1)
				{
					echo 'Successfully Added';
				}
				else
					echo 'Failed Try Again';
		}
		
	}
	
	//add medicine type to DB
	public function add_med_type()
	{
		$medType   =   $this->input->post('medType');
		$generic   =   $this->input->post('generic');
		$query =   $this->db->get_where('medicinetypey22', array('medicineType' => $medType));
	    $row_count  = 0;
		if($query->num_rows() > 0)
		{
			
			 $data = array('type'=>strtolower($medType));
			 
			 $query =   $this->db->get('companyz22');
			 if($query->num_rows>0)
			 {
			 	foreach($query->result() as $row)	
				{
					$name['dbaname'] = $row->dbName;
					 $this->db->where("generic LIKE '%{$generic}%'");
					 $this->db->update($name['dbaname'],$data);
					 $row_count  += $this->db->affected_rows();
				}
				
			 }
			 
			 if($row_count >0)
				echo 'Successfully Added Medicine Type to '.$row_count.' entries' ;
			else
				echo 'No entries updated. Check Generic spelling' ;
		}
		else
		{
				$this->db->insert('medicinetypey22',array('medicineType' => $medType));
				$row  = $this->db->affected_rows();
				$row_count  = 0;
				if($row == 1)
				{
					 $data = array('type'=>strtolower($medType));
					 
					  $query =   $this->db->get('companyz22');
					  if($query->num_rows>0)
					  {
						foreach($query->result() as $row)	
						{
							$name['dbaname'] = $row->dbName;
							 $this->db->where("generic LIKE '%{$generic}%'");
							 $this->db->update($name['dbaname'],$data);
							 $row_count  += $this->db->affected_rows();
						}
				 
			          }
					 
					 
					 if($row_count >0)
						echo 'Successfully Added Medicine Type to '.$row_count.' entries' ;
					else
						echo 'Either you added this earlier/ your generic spelling is wrong' ;
				}
				else
					echo 'Failed Try Again';
		}
		
	}
	
	public function get_diagnosis()
		{
			$search_id   =   $this->input->post('id');
			$search_id = preg_replace('/\s+/', '', $search_id);
			$exam_id   =   $this->input->post('exam_id');
			$query =   $this->db->get_where('patientx22', array('searchID' => $search_id));
			if($query->num_rows() > 0)
			{
				$today = explode('/', date("d/m/Y"));
				$dob =  explode('/', $query->row()->dobOfPatient);
				$data['patient_name'] = $query->row()->patientName;
				$data['patient_sex'] = $query->row()->sexOfPatient;
				$data['age'] = $today[2] -  $dob[2];
				$data['patient_phone'] = $query->row()->phone;
				$data['patient_occupation'] = $query->row()->occupation;
				$data['patient_marital'] = $query->row()->maritalStatus;
				$data['patient_religion'] = $query->row()->religion;
				$query = $this->db->get_where('examinationx24', array('searchID' => $search_id, 'examinationID' => $exam_id ));	
				if($query->num_rows() > 0){
					//echo $image_id;
					
					//$data['docID']=>$doc_id,
					  // 'pendingStatus' => 1,
					$data['height'] = $query->row()->patientHeight;
					$data['weight'] = $query->row()->patientWeight;
					$data['temp'] = $query->row()->patientTemperature;
					$data['pr'] =  $query->row()->patientPR;
					$data['bp'] =  $query->row()->patientBP;
					$data['symptom'] = $query->row()->symptom;
					$data['primary'] = $query->row()->primaryDiagnosis;
					$data['final'] = $query->row()->finalDiagnosis;
					
					$flag = 0;
					$testP = '-';
					$medicineP = '-';
					$adviceP = '-';
					$testF = '-';
					$medicineF = '-';
					$adviceF = '-';
					$parts = array();
					$parts1 = array();
					$parts2 = array();
					if(strpos($data['primary'], '#') !== false || strpos($data['primary'], '&') !== false || strpos($data['primary'], '$') !== false || strpos($data['final'], '#') !== false || strpos($data['final'], '&') !== false || strpos($data['final'], '$') !== false )
					{
						
						$parts = preg_split('/[&#$]/', $data['primary']);
						$data['primary'] = "";
						for($i=1; $i< count($parts) ; $i++)
						{
							if($parts[$i][0] == '^')
							{
								$medicineP = ltrim($parts[$i],'^');
							}	
							else if($parts[$i][0] == '!')
							{
								$testP = ltrim($parts[$i],'!');
							}	
							if($parts[$i][0] == '~')
							{
								$adviceP = ltrim($parts[$i],'~');
							}	
						}
						
						$parts = preg_split('/[&#$]/', $data['final']);
						for($i=1; $i< count($parts) ; $i++)
						{
							if($parts[$i][0] == '^')
							{
								$medicineF = ltrim($parts[$i],'^');
							}	
							else if($parts[$i][0] == '!')
							{
								$testF = ltrim($parts[$i],'!');
							}	
							if($parts[$i][0] == '~')
							{
								$adviceF = ltrim($parts[$i],'~');
							}	
						}
						
						//Parse Primary Prescription
						 if($medicineP != '-')
						 {
							   $parts =  explode(';', $medicineP);
							   $serial = 1;
							   $data['primary'] = 'Medicine:'."\n" ;
							   for($i=0; $i< count($parts)-1; $i+=2)
							   {
								 $parts1 = explode(':', $parts[$i]);
								 $this->db->select('companyID,dbName');
								 $query = $this->db->get_where('companyz22', array('companyID' => $parts1[0]));
								 $dbName = $query->row()->dbName;
								 
								 
								 $this->db->select('id,medicineName');
								 $query = $this->db->get_where($dbName, array('id' => $parts1[1]));
								 $medicineName= $query->row()->medicineName;
								 
								 $parts2 =  explode(':', $parts[$i+1]);
								 $data['primary'] .= $serial.'. '.$medicineName;
								 if($parts1[2] >=1 )
								 {
									  $parts1[2] = rtrim($parts1[2],'d');
									  $data['primary'] .= "    ".$parts1[2].' '.$day_s = ($parts1[2]>1)?'days' : 'day';
									  $data['primary'] .= "\n";  						   
								  } 
								  else
									  $data['primary'] .= "\n";  	
								 
								 
								 if($parts2[0]!=NULL)
								 {
									 $this->db->select('dose');
									 $query = $this->db->get_where('dosey24', array('id' => $parts2[0]));
									 $data['primary'] .= $query->row()->dose;
								 }
								 if($parts2[1]!=NULL){
									 $this->db->select('application');
									 $query = $this->db->get_where('applicationy29', array('id' => $parts2[1]));
									  $data['primary'] .= "    ".$query->row()->application."\n";
								 }
								 else
								 {
									 $data['primary'] .= "\n";  
								 }
								  
								 $serial++;
							   }
							
										 
						 }
						 if($testP != '-')
							{
								  $parts =  explode(';', $testP);
								  
								  $data['primary'] .= 'Test(s):'."\n";
								  for($i=0; $i< count($parts)-1; $i++)
								  {
									   $this->db->select('testName');
									   $query = $this->db->get_where('testy27', array('id' => $parts[$i]));
									   $data['primary'] .= ($i+1).". " .$query->row()->testName."\n";
								  }
								 
							}
							 
							if($adviceP != '-')
							{
								 $data['primary'] .= 'Advice(s):'."\n";
								 $parts =  explode(';', $adviceP);
								 for($i=0; $i< count($parts)-1; $i++)
								 {
									  $this->db->select('advice');
									  $query = $this->db->get_where('advicez25', array('id' => $parts[$i]));
									  $data['primary'] .= '* '.$query->row()->advice."\n";
											 
								   }
							}
							
							
									
						//Parse Final Prescription
						 if($medicineF != '-')
						 {
							   $parts =  explode(';', $medicineF);
							   $serial = 1;
							   $data['final'] = 'Medicine:'."\n" ;
							   for($i=0; $i< count($parts)-1; $i+=2)
							   {
								 $parts1 = explode(':', $parts[$i]);
								 $this->db->select('companyID,dbName');
								 $query = $this->db->get_where('companyz22', array('companyID' => $parts1[0]));
								 $dbName = $query->row()->dbName;
								 
								 
								 $this->db->select('id,medicineName');
								 $query = $this->db->get_where($dbName, array('id' => $parts1[1]));
								 $medicineName= $query->row()->medicineName;
								 
								 $parts2 =  explode(':', $parts[$i+1]);
								 $data['final'] .= $serial.'. '.$medicineName;
								 if($parts1[2] >=1 )
								 {
									  $parts1[2] = rtrim($parts1[2],'d');
									  $data['final'] .= "    ".$parts1[2].' '.$day_s = ($parts1[2]>1)?'days' : 'day';
									  $data['primary'] .= "\n";  
								  } 
								 else
									  $data['primary'] .= "\n";  	
								 
								 if($parts2[0]!=NULL)
								 {
									 $this->db->select('dose');
									 $query = $this->db->get_where('dosey24', array('id' => $parts2[0]));
									 $data['final'] .= $query->row()->dose;
								 }
								 if($parts2[1]!=NULL){
									 $this->db->select('application');
									 $query = $this->db->get_where('applicationy29', array('id' => $parts2[1]));
									  $data['final'] .= "    ".$query->row()->application."\n";
								 }
								 else
								 {
									 $data['final'] .= "\n";  
								 }
								  
								 $serial++;
							   }
							
										 
						 }
						 if($testF != '-')
							{
								  $parts =  explode(';', $testF);
								  
								  $data['final'] .= 'Test(s):'."\n";
								  for($i=0; $i< count($parts)-1; $i++)
								  {
									   $this->db->select('testName');
									   $query = $this->db->get_where('testy27', array('id' => $parts[$i]));
									   $data['final'] .= ($i+1).". " .$query->row()->testName."\n";
								  }
								 
							}
							 
							if($adviceF != '-')
							{
								 $data['final'] .= 'Advice(s):'."\n";
								 $parts =  explode(';', $adviceF);
								 for($i=0; $i< count($parts)-1; $i++)
								 {
									  $this->db->select('advice');
									  $query = $this->db->get_where('advicez25', array('id' => $parts[$i]));
									  $data['final'] .= '* '.$query->row()->advice."\n";
											 
								   }
							}
						
					}
					
					
					$data1 = array(
			               'pendingStatus' => 3,
						   'date' =>  date("d/m/Y")
						  );
					$this->db->where('searchID', $search_id);
					$this->db->where('examinationID', $exam_id);
					$this->db->update('examinationx24', $data1); 
					
				
					echo json_encode($data);
					
					
				}
				else
				 echo NULL;
			///echo json_encode($array);
			}
			
				else
				 echo NULL;
			

				

			
		}
	
	
	
	public function submit_diagnosis()
		{
			$search_id   =   $this->input->post('id');
			$exam_id   =   $this->input->post('exam_id');	
			$doc_id   =   $this->input->post('doc');
			$height   =   $this->input->post('height');
			$weight =  $this->input->post('weight');
			$temp =  $this->input->post('temp');
			$pr =  $this->input->post('pr');
			$bp =  $this->input->post('bp');
			$symptom =  $this->input->post('symptom');
			//echo $image_id;
			$query = $this->db->get_where('examinationx24', array('searchID' => $search_id, 'examinationID' => $exam_id ));
			$pending['check'] = $query->row()->pendingStatus;
			$pend = 1;
			if($pending['check']==3)
			{
				$pend = 2;	
			}
			
			$data = array(
			   'docID'=>$doc_id,
               'pendingStatus' => $pend,
			   'patientHeight' => $height,
			   'patientWeight' => $weight,
			   'patientTemperature' => $temp,
			   'patientPR' => $pr,
			   'patientBP' => $bp,
			   'symptom'=> $symptom,
			   'date'=>date("d/m/Y")
            );
			$this->db->where('searchID', $search_id);
			$this->db->where('examinationID', $exam_id);
			$this->db->update('examinationx24', $data); 
			$row  = $this->db->affected_rows();
			
				echo 'Request sent To Doctor';
			///echo json_encode($array);
			

				

			
		}
	
	
		
	
		//check whether patint exists
		public function isPatient()
		{
			$search_id   =   $this->input->post('pID2');
			
			
			
			$this->db->select('user');
           	$query = $this->db->get_where('patientx22', array('searchID' => $search_id));
			
			if($query->num_rows() > 0)
			{
				$data['patient'] = 1;
				$data['user'] = $query->row()->user;	
				return $data;
			}
			else
			{
				$data['patient'] = 0;
				$data['user'] ='';	
				return $data;	
			}
			
		}
		
		//check whether patint exists
		public function isPatient_get($data=array())
		{
			$search_id   =   $data['id'];
						
			$this->db->select('user');
           	$query = $this->db->get_where('patientx22', array('searchID' => $search_id));
			
			if($query->num_rows() > 0)
			{
				$data['patient'] = 1;
				$data['user'] = $query->row()->user;	
				return $data;
			}
			else
			{
				$data['patient'] = 0;
				$data['user'] ='';	
				return $data;	
			}
			
		}
		
		//check whether patint exists
		public function isPatient_get_mobile($data=array())
		{
			$mobile   =   $data['mobile'];
						
			//$this->db->select_min('patientID');			
			$this->db->select('user');
			$query = $this->db->get_where('patientx22', array('phone' => $mobile));
			
			if($query->num_rows() > 0)
			{
				$data['patient'] = 1;
				$data['user'] = $query->row()->user;	
				return $data;
			}
			else
			{
				$data['patient'] = 0;
				$data['user'] ='';	
				return $data;	
			}
			
		}
		
		
		
		public function isPatient_inExam()
		{
				$search_id   =   $this->input->post('pID2');
				
				
				
		//$transaction = $this->input->post('transaction_id');
		//$query =  $this->db->get_where('examinationx24', array('transactionId' => $transaction));
		
		//if($query->num_rows() == 0)
		//{
			
			//$this->db->select_max('examinationID');
           	$query = $this->db->get_where('examinationx24', array('searchID' => $search_id));
			if($query->num_rows() == 0)
			{
				return false;
			}
			else
			return true;
		}
		
		public function get_table_result($tablename,$tableParam,$Id)
		{
			$query = $this->db->get_where($tablename, array($tableParam => $Id));
			return $query;
		}
		
		
	
	public function prev_diagnosis()
	{
		$search_id   =   $this->input->post('pid');
		$exam_id = $this->input->post('exam_id');
		$query =   $this->db->get_where('patientx22', array('searchID' => $search_id));
		$today = explode('/', date("d/m/Y"));
		$dob =  explode('/', $query->row()->dobOfPatient);
		
		$examination = array(
                   'patient_id'=>  $search_id,
				   'patient_name' => $query->row()->patientName,
				   'patient_sex' => $query->row()->sexOfPatient,
				   'age' => $today[2] -  $dob[2],
				   'patient_phone' => $query->row()->phone,
				   'patient_occupation' => $query->row()->occupation,
				   'patient_marital' => $query->row()->maritalStatus,
				   'patient_religion' => $query->row()->religion,
				   'exam_id' => $exam_id
                 );
				 
				 return $examination;
		
		
		
	}
		
		
		
		
	 public function start_diagnosis_new()
	 {
		
				 $search_id   =   $this->input->post('pID2');
				
				 
			
				 $transaction = $this->input->post('transaction_id');
				 $operatorId = $this->flexi_auth->get_user_id();
			
				
				$query = $this->db->get_where('examinationx24', array('transactionId' => $transaction));
				
				if($query->num_rows() ==0)
				{
				
					$this->db->select_max('examinationID');
					$query = $this->db->get_where('examinationx24', array('searchID' => $search_id));
					
					$examId = $query->row()->examinationID ;
					$arrayMessage = array(
					 'searchID'=>  $search_id ,
					 'examinationID'=> $examId + 1,
					 'date'=>date("d/m/Y"),
					 'transactionId'=>$transaction,
					 'userID'=>$operatorId);
					 
					 $this->db->insert('examinationx24', $arrayMessage);	
					 
					   $arrayMessage = array(
						 'searchID'=>  $search_id ,
						 'examinationID'=>$examId + 1
						);
				$this->db->insert('reportz23', $arrayMessage);
					 
					 $query = $this->db->get_where('patientx22', array('searchID' => $search_id));
					 $today = explode('/', date("d/m/Y"));
					 $dob =  explode('/', $query->row()->dobOfPatient);
					 $examination = array(
					   'patient_id'=>  $search_id,
					   'patient_name' => $query->row()->patientName,
					   'patient_sex' => $query->row()->sexOfPatient,
					   'age' => $today[2] -  $dob[2],
					   'patient_phone' => $query->row()->phone,
					   'patient_occupation' => $query->row()->occupation,
					   'patient_marital' => $query->row()->maritalStatus,
					   'patient_religion' => $query->row()->religion,
					   'exam_id' => $examId + 1
					 );
					 return  $examination;
				}
				else
				{
					
					 return  NULL;	
				}
				 
				 	
		}	
		
  	
	
	
	 public function start_diagnosis_empty()
	 {
		
				 $search_id   =   $this->input->post('pID2');
				
				 
			
				 $transaction = $this->input->post('transaction_id');
				  $operatorId = $this->flexi_auth->get_user_id();
			
				 //redirect('auth_lite/index');
				 $arrayMessage = array(
				 'searchID'=>  $search_id ,
				 'examinationID'=>1,
				 'date'=>date("d/m/Y"),
				 'transactionId'=>$transaction,
				 'userID'=>$operatorId);
				 
				 $this->db->insert('examinationx24', $arrayMessage);
				  
				  $arrayMessage = array(
				 'searchID'=>   $search_id  ,
				 'examinationID'=>1
				);
				$this->db->insert('reportz23', $arrayMessage);
				 
				
				 
				 $query =   $this->db->get_where('patientx22', array('searchID' => $search_id));
				 $today = explode('/', date("d/m/Y"));
				 $dob =  explode('/', $query->row()->dobOfPatient);
				 $examination = array(
                   'patient_id'  => $search_id,
				   'patient_name' => $query->row()->patientName,
				   'patient_sex' => $query->row()->sexOfPatient,
				   'age' => $today[2] -  $dob[2],
				   'patient_phone' => $query->row()->phone,
				   'patient_occupation' => $query->row()->occupation,
				  'patient_marital' => $query->row()->maritalStatus,
				  'patient_religion' => $query->row()->religion,
				   'exam_id' => 1
				   
                 );
				
				 
				 	return  $examination;
		}
			
		
		//send operator info to display create_doctor	
 	/* public function show_operator()
	 {
		$operatorId = $this->flexi_auth->get_user_id();
		$query = $this->db->get_where('operatory28', array('userID' => $operatorId));
		if($query->num_rows() > 0)
		{
			$row = $query->row(); 
				
				$data['id'] =$row->operatorID;
				$data['name'] = $row->operatorName;
				$data['center'] =$row->centerName;
				$data['address'] =$row->address;
				return $data;
			//$this->load->view('first_view');
			
		}
		else 
		{
			$data= array('id'=>'No Operator ID','name'=> $this->flexi_auth->get_user_identity(),'center'=>'Blank','address'=>'Blank');
			
			return $data;
		}
		
		
	}*/
	
     //send doctor info to display create_doctor	
 	 public function show_doctor()
	 {
		$docId = $this->flexi_auth->get_user_id();
		$query = $this->db->get_where('doctorx23', array('userID' => $docId));
		if($query->num_rows() > 0)
		{
			$row = $query->row(); 
				
				$data['id'] =$row->docID + 100;
				$data['name'] = $row->docName;
				$data['designation'] =$row->designation;
				return $data;
			//$this->load->view('first_view');
			
		}
		else 
		{
			$data= array('id'=>'No Doctor ID','name'=> $this->flexi_auth->get_user_identity(),'designation'=>'You are Not a doctor');
			
			return $data;
		}
		
		
	}
	
	//create operator on group change/assign
	 public function create_operator($data=array())
	 {
	
		$query = $this->db->get_where('operatory28', array('userID' => $data['id']));
		if($query->num_rows() == 0)
		{
			 $arrayMessage = array(
			 'operatorName'=>$data['fname']. ' '. $data['lname'] ,
			 'userID'=>$data['id']);
			 
			 $this->db->insert('operatory28', $arrayMessage);
			//$this->load->view('first_view');
			
		}
		
		
	}
	
	
	
	//create doctor on group change/assign
	 public function create_doctor($data=array())
	 {
	
		$query = $this->db->get_where('doctorx23', array('userId' => $data['id']));
		if($query->num_rows() == 0)
		{
			 $arrayMessage = array(
			 'docName'=>'Dr. '.$data['fname']. ' '. $data['lname'] ,
			 'userId'=>$data['id']);
			 
			 $this->db->insert('doctorx23', $arrayMessage);
			//$this->load->view('first_view');
			
		}
		
		
	}
	
	 public function delete_user($data=array())
	 {
	
		$query = $this->db->get_where('doctorx23', array('userId' => $data['id']));
		if($query->num_rows() > 0)
		{
			 $arrayMessage = array(
			 		 'userId'=>$data['id']);
			 
			 $this->db->delete('doctorx23', $arrayMessage);
			//$this->load->view('first_view');
			
		}
		else
		{
			$query = $this->db->get_where('operatory28', array('userID' => $data['id']));
			if($query->num_rows() > 0)
			{
				 $arrayMessage = array(
						 'userID'=>$data['id']);
				 
				 $this->db->delete('operatory28', $arrayMessage);
				//$this->load->view('first_view');
				
			}	
		}
		
		
	}
	   
	   //update operator info
	    public function sendToDbOperator()
        {
			
                $op_id = $this->input->post('op_id');
				$op_name =  $this->input->post('op_name'); 
				$doc =  $this->input->post('doctorList'); 				
				$center = $this->input->post('center_name');
				$village = $this->input->post('village');
				$po = $this->input->post('po');
				$union = $this->input->post('union');
				$upazila = $this->input->post('upazila');
				$zila = $this->input->post('zila');
				$address  = $village  .';' . $po . ';' . $union . ';' . $upazila . ';' . $zila ;				
			
				$data = array(
               'operatorName' => $op_name,'assignedDoctor'=>$doc, 'centerName'=>$center, 'address' => $address);
			    $this->db->where('operatorID', $op_id);
			    $this->db->update('operatory28', $data);
			  			  
				
			//$row as $query->result_array();
			   echo 'Operator with ID '. $op_id . ' Updated' ;
			     
	   }
	   
	   
	   //update doctor info
	    public function sendToDbDoc()
        {
			
                $doc_id = $this->input->post('doc_id');
				$doc_id = $doc_id -100;
				$doc_name =  $this->input->post('doc_name'); //sex
				$designation = $this->input->post('designation'); // day
			
				$data = array(
               'docName' => $doc_name, 'designation'=>$designation
            );
			    $this->db->where('docID', $doc_id);
			    $this->db->update('doctorx23', $data);
			  			  
				
			//$row as $query->result_array();
			   echo 'Doctor with ID '. ($doc_id+100). ' Updated' ;
			     
	   }
	   
	   // Create new Patient
	    public function sendToDb()
        {
			
                $patient_name = $this->input->post('patient_name');
				$patient_name = trim($patient_name,' ');
				$parts = explode(' ',$patient_name);
				$count = count($parts);
				
				$sex =  $this->input->post('element_7'); //sex
				$day = $this->input->post('element_3_1'); // day
				$day = str_pad($day, 2, '0', STR_PAD_LEFT); 
				$month = $this->input->post('element_3_2'); //month
				$month = str_pad($month, 2, '0', STR_PAD_LEFT); 
				$year = $this->input->post('element_3_3'); //year
				
				
				
				
				$village = $this->input->post('village');
				$po = $this->input->post('po');
				$union = $this->input->post('union');
				$upazila = $this->input->post('upazila');
				$zila = $this->input->post('zila');
				$address  = $village  .';' . $po . ';' . $union . ';' . $upazila . ';' . $zila ;
				
				$phone = $this->input->post('phone'); // phone
				$occupation = $this->input->post('occupation'); // phone
				$marital_status = $this->input->post('maritalStatus'); // phone
				$religion = $this->input->post('religion'); // phone
				$national_id = $this->input->post('national_id'); // national ID
				$center = $this->input->post('center'); // 
				$refId = $this->input->post('ref_id'); // 
				$date = date("d/m/Y");
				if($refId != '')
				{
                	
				
				
			  	 	$query = $this->db->get_where('patientx22', array('searchID' => $refId));
			
					if($query->num_rows() > 0)
					{
						$data   =   $this->flexi_auth->get_user_identity();
					    $dob = $day."/".$month."/".$year;
					   
								  
						 $arrayMessage = array(
						'patientName' => $patient_name,
						'sexOfPatient' => $sex,
						'dobOfPatient' => $dob,
						'addressOfPatient' => $address,
						'phone' => $phone,
						'occupation' => $occupation,
						'religion' => $religion,
						'maritalStatus' => $marital_status,
						'nationalId' => $national_id,
						'centerName' => $center,
						'picLocation' => 'noImage.jpg',
						'user' => $data,
						'referenceID' => $refId ,
						'date' => $date
				
						);
						$this->db->insert('patientx22',$arrayMessage);
						//Return inserted Patient's PatientID
						$this->db->select_max('patientID');
						$query = $this->db->get_where('patientx22', array('user' => $data));
						$patient['id'] = $query->row()->patientID; 
						//$msg = $row->patientID;
						$search_id = $parts[$count-1][0].$parts[$count-1][1].$parts[0][0].$parts[0][1].$day.$month.$year.$patient['id'];
						
						$this->db->where('patientID',$patient['id']);
						$this->db->update('patientx22', array('searchID'=>$search_id));
						
						
						$msg = $search_id;
						
						//$row as $query->result_array();
						   echo $msg;
					}
					else
						echo NULL;
					
				}
			   else
			   {   $data   =   $this->flexi_auth->get_user_identity();
				   $dob = $day."/".$month."/".$year;
				   
							  
					 $arrayMessage = array(
					'patientName' => $patient_name,
					'sexOfPatient' => $sex,
					'dobOfPatient' => $dob,
					'addressOfPatient' => $address,
					'phone' => $phone,
					'occupation' => $occupation,
					'religion' => $religion,
					'maritalStatus' => $marital_status,
					'nationalId' => $national_id,
					'centerName' => $center,
					'picLocation' => 'noImage.jpg',
					'user' => $data,
					'date' => $date
					
					);
					$this->db->insert('patientx22',$arrayMessage);
						//Return inserted Patient's PatientID
						$this->db->select_max('patientID');
						$query = $this->db->get_where('patientx22', array('user' => $data));
						$patient['id'] = $query->row()->patientID; 
						//$msg = $row->patientID;
						$search_id = $parts[$count-1][0].$parts[$count-1][1].$parts[0][0].$parts[0][1].'_'.$day.$month.$year.'_'.$patient['id'];
						
						$this->db->where('patientID',$patient['id']);
						$this->db->update('patientx22', array('searchID'=>$search_id));
						
						
						$msg = $search_id;
						
						//$row as $query->result_array();
						   echo $msg;
			   }
			     
	   }
	   
	   
	   
	   // Update Patient
	    public function update_patient()
        {
			
				$search_id = $this->input->post('pID');
				$patient_name = $this->input->post('patient_name');
				$sex =  $this->input->post('element_7'); //sex
				$day = $this->input->post('element_3_1'); // day
				$month = $this->input->post('element_3_2'); //month
				$year = $this->input->post('element_3_3'); //year
				
				$village = $this->input->post('village');
				$po = $this->input->post('po');
				$union = $this->input->post('union');
				$upazila = $this->input->post('upazila');
				$zila = $this->input->post('zila');
				$address  = $village  .';' . $po . ';' . $union . ';' . $upazila . ';' . $zila ;
				
				$phone = $this->input->post('phone'); // phone
				$occupation = $this->input->post('occupation'); // phone
				$marital_status = $this->input->post('maritalStatus'); // phone
				$religion = $this->input->post('religion'); // phone
				$national_id = $this->input->post('national_id'); // national ID
				$refId = $this->input->post('ref_id'); // 
				if($refId != '')
				{
                	
				
				
			  	 	$query = $this->db->get_where('patientx22', array('referenceID' => $refId));
			
					if($query->num_rows() > 0)
					{
						$dob = $day."/".$month."/".$year;
					   
								  
						 $arrayMessage = array(
						'patientName' => $patient_name,
						'sexOfPatient' => $sex,
						'dobOfPatient' => $dob,
						'addressOfPatient' => $address,
						'phone' => $phone,
						'occupation' => $occupation,
						'religion' => $religion,
						'maritalStatus' => $marital_status,
						'nationalId' => $national_id,
						'referenceID' => $refId 
				
						);
						$this->db->where('searchID',$search_id);
						$this->db->update('patientx22',$arrayMessage);
						
						$msg = $pID;
						//$row as $query->result_array();
						   echo $msg;
					}
					else
						echo NULL;
					
				}
			   else
			   { 
				   $dob = $day."/".$month."/".$year;
				   
							  
					 $arrayMessage = array(
					'patientName' => $patient_name,
					'sexOfPatient' => $sex,
					'dobOfPatient' => $dob,
					'addressOfPatient' => $address,
					'phone' => $phone,
					'occupation' => $occupation,
					'religion' => $religion,
					'maritalStatus' => $marital_status,
					'nationalId' => $national_id,
					
					
					
					);
					$this->db->where('searchID',$search_id);
						$this->db->update('patientx22',$arrayMessage);
						
						$msg = $pID;
						//$row as $query->result_array();
						   echo $msg;
			   }
			     
	   }
	   
	   
	   
	   
	   
	   
		public function search_patient_byid()
		{
			$search_id   =   $this->input->post('id');
			//$id = $id - 101000;
			
			
			
           	$query = $this->db->get_where('patientx22', array('searchID' => $search_id));
			
			if($query->num_rows() > 0)
			{
				
				$row = $query->row(); 
				$user['id'] = $row->user;
				if($this->flexi_auth->get_user_group() == 'Master Admin' || $user['id'] == $this->flexi_auth->get_user_identity())
				{
				
				$array = array($row->patientName,$row->sexOfPatient,$row->dobOfPatient,$row->addressOfPatient,$row->phone,$row->occupation,$row->maritalStatus,$row->religion,$row->nationalId, $row->centerName,$row->picLocation, $row->referenceID);
				
					//echo 'Successfully added image for id :'.($id+101000);
					echo json_encode($array);
				}
				else
				{
				$array = array(1,'Your are not allowed to see this Patient'."'".'s information. This patient is not registered by you');
				echo  json_encode($array);				
				
				}

				
			}
			else {
				$array = array(1,'Invalid ID. Patient Not Found');
				echo  json_encode($array);				}

			
		}
		
		public function search_patient_byph()
		{
			$id   =   $this->input->post('id');
			
			
			
			
           	$query = $this->db->get_where('patientx22', array('phone' => $id));
			
			if($query->num_rows() > 0)
			{
				$row = $query->row(); 
				
				$array = array($row->patientID,$row->patientName,$row->sexOfPatient,$row->dobOfPatient,$row->addressOfPatient,$row->phone,$row->occupation,$row->maritalStatus,$row->religion,$row->nationalId, $row->centerName,$row->picLocation, $row->referenceID);
				
					//echo 'Successfully added image for id :'.($id+101000);
					echo json_encode($array);
				
			}
			else {
				$array = array(1);
				echo  json_encode($array);				}

			
		}
		
		
		
		
		public function image_store()
		{
			$search_id   =   $this->input->post('id');
			$image   =   $this->input->post('image');	
			$image_ext   =   $this->input->post('image_ext');
			$image_id =  $this->session->userdata('imageIdent');
			//echo $image_id;
			
			$data = array(
               'picLocation' => $image.'_'.$image_id.'.'.$image_ext
            );
			$this->db->where('searchID', $search_id);
			$this->db->update('patientx22', $data); 
			$row  = $this->db->affected_rows();
			$msg['name'] = 'aumi';
			$msg['age']  = 27;
			$array = array(1,2,3,4,5,6);
			if($row == 1)
			{
				//echo 'Successfully added image for id :'.($id+101000);
				//echo json_encode($array);
			}
			else
			{
				//echo json_encode($array);
				//echo 'Failed to add image for id : '.($id+101000);
			}

				

			
		}

}