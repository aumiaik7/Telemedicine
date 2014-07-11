<?php
    class Db extends CI_Controller
    {
        public function index()
        {
           // $this->load->view('jqueryUiView');
        }
		public function ajax()
		{
			//$this->load->library('filtri');
			$id   =   $this->input->post('id');
			$image   =   $this->input->post('image');
			echo "<p>id= ".$id."image= ".$image."</p>";
		}
        public function sendToDb()
        {
			 if(!empty($_POST))
            {
                $patient_name = $this->input->post('patient_name');
				$sex =  $this->input->post('element_7'); //sex
				$day = $this->input->post('element_3_1'); // day
				$month = $this->input->post('element_3_2'); //month
				$year = $this->input->post('element_3_3'); //year
				$address = $this->input->post('address'); // address
				$phone = $this->input->post('phone'); // phone
				$national_id = $this->input->post('national_id'); // national ID
				$center = $this->input->post('center'); // 
               
			   $dob = $day."/".$month."/".$year;
			  
			   if ($this->input->post('upload')) { 
			   $this->gallery_path = '../uploads';
			   $config = array(
			   'allowed_types' => 'jpg|jpeg|gif|png',
			   'upload_path' => $this->gallery_path,
			   'max_size' => 2000);
			   
			   	$this->load->library('upload', $config);
				$this->upload->do_upload();
				$image_data = $this->upload->data();

			  

			  }
		     

            }
			 $arrayMessage = array(
                'patientName' => $patient_name,
				'sexOfPatient' => $sex,
                'dobOfPatient' => $dob,
                'addressOfPatient' => $address,
				'phone' => $phone,
				'nationalId' => $national_id,
				'centerName' => $center
				
            );
            
            $this->db->insert('patientx22',$this->db->escape($arrayMessage));
			
			$data   =   $patient_name;
			echo "<p>result= ".$data."</p>";
	
        }
    }