

<!doctype html>
<!--[if lt IE 7 ]><html lang="en" class="no-js ie6"><![endif]-->
<!--[if IE 7 ]><html lang="en" class="no-js ie7"><![endif]-->
<!--[if IE 8 ]><html lang="en" class="no-js ie8"><![endif]-->
<!--[if IE 9 ]><html lang="en" class="no-js ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en" class="no-js"><!--<![endif]-->


<head>
 
	<meta charset="utf-8">
	<title>Telemedicine</title>
	<meta name="description" content="Telemedicine Project for rural areas of Bangladesh, By BMPT"/> 
	<meta name="keywords" content="Telemedicine, Rural health care,BMPT"/>
	 <?php $this->load->view('includes/head'); ?> 
     <?php $this->load->view('includes/form_patient'); ?> 
</head>

<body id="lite_library">

<input type="hidden" id="base_url" value="<?php echo $base_url;?>"/>
<div id="body_wrap">
	<!-- Header -->  
	<?php $this->load->view('includes/header_1'); ?> 

	<!-- Demo Navigation -->
	<?php $this->load->view('includes/menubar'); ?> 
	
	<!-- Intro Content -->
	<div class="content_wrap intro_bg">
		<div class="content clearfix"> 
			<div class="intro_text">
				<h1>Telemedicine Project <?php echo $this->session->flashdata('age').' '.$this->session->flashdata('exam_id') ?></h1>
                <div align="right"> <label class="a"> <?php echo $this->session->userdata('hello') .  $this->session->userdata('uname') . "!" ?></label>
                </div>			
				<p class="a">It is an initiative to provide quality health service to the rural areas of Bangladesh</p>
				<p></p>
			</div>		
		</div> 
	</div>

	<!-- Main Content -->
	<div class="content_wrap main_content_bg" >
		<div class="content main_content_bg parallel clearfix">
			<?php if (! empty($message)) { ?>
				<div id="message">
					<?php echo $message; ?>
				</div>
			<?php } ?>	
			<div class="w200 frame parallel_target" >				
			<table  border="1" bordercolor="#000000" style="background-color:#FFFFFF" width="100%" cellpadding="0" cellspacing="0">
	<tr>
    <!--Patient Info-->
		<td width="47%" >
        <table class="abc" border="0" bordercolor="#ffffff" style="background-color:#FFFFFF" width="100%" cellpadding="0" cellspacing="0">
	<tr>
	  <td colspan="2" align="center"> <label class="b"  for="element_2" style=" font-weight:bold font-size:18px">Examination ID   :</label><label class="c" id="examID" > <?php echo $exam_id?> </label></td>
	  </tr>
	<tr>
    	<td colspan="2" align="center"> <label class="b"  for="element_2" style=" font-weight:bold font-size:18px">Patient ID   :</label><label class="c" id="ptntID" ><?php echo $patient_id?></label></td>
        
		</tr>
	<tr>
		<td width="39%"><label class="b"  for="element_2">Name   :</label><label class="c" id="pName" ><?php echo $patient_name?> </label></td>
		<td width="27%"><label class="b"  for="element_2">Sex   :</label><label class="c" id="pSex" ><?php echo $patient_sex?> </label>
		</li></td>
		
	</tr>
	<tr>
		<td><label class="b"  for="element_2">Age   :</label><label class="c" id="pDob" > <?php echo $age?></label></td>
		<td><label class="b"  for="element_2">Phone   :</label><label class="c" id="pPhone" ><?php echo $patient_phone?> </label></td>
		
	</tr>
    <tr>
		<td><label class="b"  for="element_2">Occupation   :</label><label class="c" id="pOccupation" > <?php echo $patient_occupation?></label></td>
		<td><label class="b"  for="element_2">Marital Status   :</label><label class="c" id="pMarital" ><?php echo $patient_marital?> </label></td>
		
	</tr>
     <tr>
		<td><label class="b"  for="element_2">Religion   :</label><label class="c" id="pReligion" > <?php echo $patient_religion?></label></td>
		<td></td>
		
	</tr>
    
</table>
  <table>
		    <tr>
		      <?php 
		$search_id = $patient_id;
		$query = $this->db->get_where('examinationx24', array('searchID' => $search_id,'examinationID'=>$exam_id));
		$row['doc'] = $query->row()->docID;
		$row['height'] = $query->row()->patientHeight;
		$row['weight'] = $query->row()->patientWeight;
		$row['temp'] = $query->row()->patientTemperature;
		$row['PR'] = $query->row()->patientPR;		
		$row['BP'] = $query->row()->patientBP;
		$row['symptom'] = $query->row()->symptom;?>
		      <td><label class="b"  for="element_2">Height   :</label><input id="patient_height" name="patient_height"  type="text"  maxlength="255" value="<?php echo $row['height']; ?>"/> </td>
		      <td><label class="b"  for="element_2">Weight   :</label><input id="patient_weight" name="patient_weight"  type="text"  maxlength="255" value="<?php echo $row['weight']; ?>"/> </td>
		      <td><label class="b"  for="element_2">Temperature   :</label><input id="patient_temp" name="patient_temp"  type="text"  maxlength="255" value="<?php echo $row['temp']; ?>"/>  </label></td>
		      
		      </tr><tr>
		        <td><label class="b"  for="element_2">Pulse Rate   :</label><input id="patient_pr" name="patient_pr"  type="text"  maxlength="255" value="<?php echo $row['PR']; ?>"/> </td>
		        <td><label class="b"  for="element_2">Blood Pressure   :</label><input id="patient_bp" name="patient_bp"  type="text"  maxlength="255" value="<?php echo $row['BP']; ?>"/> </td>
		        <td></td>
		        
		        </tr>
		    <tr>
		      <td colspan="3"><p>
		        <label class="b"  for="element_2">Symptom   :</label> 
		        <br/>
		        <textarea id="symptom" name="symptom" class="element symptom medium"value= ><?php echo $row['symptom']; ?></textarea>
		        </p>
		        <p>
                <?php $operatorId = $this->flexi_auth->get_user_id(); 
				$operatorGrp = $this->flexi_auth->get_user_group_id()?>
                 <input type="hidden" id="groupID" name="groupID" value="<?php echo $operatorGrp?>"/>
                <label class="b"  for="element_2">Assigned Doctor   :</label> 
                <?php 
				
				
				//$operatorId = $this->flexi_auth->get_user_id();
				
				
				$query = $this->db->get_where('doctorx23', array('docID'=>$row['doc']));
				if($query->num_rows() >0)
				{
					$doc['name'] =  $query->row()->docName; ?>
					  <input id="doctorList_" name="doctorList_"  type="text"  maxlength="255" value="<?php echo '[Doc ID : '.  ($row['doc']+100). '] [Name  : '.$doc['name'].']';?>" readonly style="width:60%"/>
			<?php
				}else{ 
?>
				 <input id="doctorList_" name="doctorList_"  type="text"  maxlength="255" value="No Doctor Assigned" readonly style="width:60%"/>
<?php			
				}
				?>
              
             
               
                    </p>
                   </td>
					  
		      </tr>
		    
		    
		    </table>
           
        </td>
         <!--Patient Info-->
		<td width="53%">
        <div align="center">
        <input type="button" id="forceLoad" class="link_button_b small" value="Load Prescription">
        </div>
        <div id="prescription">
        
        
        </div>
      
        </td>
		
	</tr>
	<tr>
		<td>
		  
		
		  
		  </td>
		</tr>
        <tr>
        
        </tr>
</table>
<form id="genPrimary" method="post" action="<?php echo $base_url;?>bmpt/load_report" target="_blank">
        <div align="center">
         <input type="hidden" id="hptntID" name="hptntID" value="<?php echo $patient_id?>"/>
         <input type="hidden" id="hexamID" name="hexamID" value="<?php echo $exam_id?>"/>
         <input type="hidden" id="henabled" name="henabled" value=0 />
         <input type="submit" id="prescription_primary" class="link_button_b medium" value="Show Report" />
         <br/>
        </div>
        </form>

<div id="report">
</div>




			</div>

			
		</div>
	</div>

	<!-- Footer -->  
	<?php $this->load->view('includes/footer'); ?> 	
</div>

<!-- Scripts -->  
<?php $this->load->view('includes/scripts'); ?> 
<script src="<?php echo $includes_dir;?>js/diagnosis.js"></script>


</body>
</html>