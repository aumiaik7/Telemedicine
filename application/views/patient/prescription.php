<!DOCTYPE html>
<html ><!--<![endif]-->
<head>
<?php $this->load->view('includes/head'); ?> 
 <?php $this->load->view('includes/form_patient'); ?> 


</head>

                 

<body >
<input type="hidden" id="base_url" value="<?php echo $base_url;?>"/>
 <?php 
 		$search_id= $_REQUEST['pid'];
		//$patient_id = $patient_id - 101000;
		$exam_id= $_REQUEST['eid'];
 
 		
 		$this->db->select('primaryDiagnosis , finalDiagnosis');
		$query = $this->db->get_where('examinationx24', array('searchID' => $search_id, 'examinationID'=> $exam_id ));
		
		$data['primary'] =  $query->row()->primaryDiagnosis;
		$data['final'] =  $query->row()->finalDiagnosis;
		
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
		if(strpos($data['primary'], '::Medicine::') !== false || strpos($data['primary'], '::Test(s)::') !== false || strpos($data['primary'], 'Advice:') !== false)
		{
			//Actually Do Nothing
		}
		else if(strpos($data['primary'], '#') !== false || strpos($data['primary'], '&') !== false || strpos($data['primary'], '$') !== false || strpos($data['final'], '#') !== false || strpos($data['final'], '&') !== false || strpos($data['final'], '$') !== false )
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
		 
		 ?>
 <label class="b"  for="element_2" style="font-size:16px;font-weight:bold;color:#036">Primary Diagnosis   :</label> <br/>
 <textarea id="primary" name="primary" class="element diagnosis medium" value=" "><?php echo  $data['primary']?></textarea>

<p></p>

 <label class="b"  for="element_2" style="font-size:16px;font-weight:bold;color:#036">Final Diagnosis   :</label> <br/>
<textarea id="final" name="final" class="element diagnosis medium" value=" "><?php echo  $data['final']?></textarea>

  <form id="genPrimary" method="post" action="<?php echo $base_url;?>bmpt/gen_primary_prescription" target="_blank">
        <div align="center">
         <input type="hidden" id="hptntID" name="hptntID" value="<?php echo $search_id?>"/>
         <input type="hidden" id="hexamID" name="hexamID" value="<?php echo $exam_id?>"/>
         <input type="submit" id="prescription_primary" class="link_button_b large" value="Generate Prescription from Primary Diagnosis">
         <br/>
        </div>
        </form>
        <form id="genPrimary" method="post" action="<?php echo $base_url;?>bmpt/gen_final_prescription" target="_blank">
        <div align="center">
         <input type="hidden" id="hptntID" name="hptntID" value="<?php echo $search_id?>"/>
         <input type="hidden" id="hexamID" name="hexamID" value="<?php echo $exam_id?>"/>
        <input type="submit" id="prescription_final" class="link_button_b large" value="Generate Prescription from Final Diagnosis">
        </div>
        </form>

</body>
</html>