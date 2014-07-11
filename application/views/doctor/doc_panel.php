<!doctype html>
<!--[if lt IE 7 ]><html lang="en" class="no-js ie6"><![endif]-->
<!--[if IE 7 ]><html lang="en" class="no-js ie7"><![endif]-->
<!--[if IE 8 ]><html lang="en" class="no-js ie8"><![endif]-->
<!--[if IE 9 ]><html lang="en" class="no-js ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en" class="no-js"><!--<![endif]-->
<head>
	<meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Telemedicine</title>
	<meta name="description" content="Telemedicine Project for rural areas of Bangladesh, By BMPT"/> 
	<meta name="keywords" content="Telemedicine, Rural health care,BMPT"/>
	 <?php $this->load->view('includes/head'); ?> 
     <?php $this->load->view('includes/form_patient'); ?> 
   	 <link rel="stylesheet" href="<?php echo $includes_dir;?>css/query-ui.css">
  
    <style type="text/css">
	.styled-select {
	width:100%;
    height: 26px;
    line-height: 21px;
    overflow:hidden;
    border: 1px solid #27292c;
    border-radius: 3px;
    background:   #FFFFFF;
	box-shadow:inset 0 0 1px #393939;
   
   
}

.styled-select select {
   
    -moz-appearance: window;
    background: transparent;
    width: 100%;
    wid\th: 112%;   /* IE hack */
    padding: 1px 5px 0 3px;
    border: 0;
}
	
	
	.myButton {
        
        -moz-box-shadow: 0px 10px 14px -7px #276873;
        -webkit-box-shadow: 0px 10px 14px -7px #276873;
        box-shadow: 0px 10px 14px -7px #276873;
        
        background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #599bb3), color-stop(1, #408c99));
        background:-moz-linear-gradient(top, #599bb3 5%, #408c99 100%);
        background:-webkit-linear-gradient(top, #599bb3 5%, #408c99 100%);
        background:-o-linear-gradient(top, #599bb3 5%, #408c99 100%);
        background:-ms-linear-gradient(top, #599bb3 5%, #408c99 100%);
        background:linear-gradient(to bottom, #599bb3 5%, #408c99 100%);
        filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#599bb3', endColorstr='#408c99',GradientType=0);
        
        background-color:#599bb3;
        
        -moz-border-radius:8px;
        -webkit-border-radius:8px;
        border-radius:4px;
        
        display:inline-block;
		color:#FFFFFF;
        font-size:14px;
        font-weight:normal;
        padding:5px 5px;
		text-decoration:none;
        margin-top:5px;
		text-align:center;
		
        text-shadow:0px 1px 0px #3d768a;
        
    }
	
    .myButton:hover {
        
        background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #408c99), color-stop(1, #599bb3));
        background:-moz-linear-gradient(top, #408c99 5%, #599bb3 100%);
        background:-webkit-linear-gradient(top, #408c99 5%, #599bb3 100%);
        background:-o-linear-gradient(top, #408c99 5%, #599bb3 100%);
        background:-ms-linear-gradient(top, #408c99 5%, #599bb3 100%);
        background:linear-gradient(to bottom, #408c99 5%, #599bb3 100%);
        filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#408c99', endColorstr='#599bb3',GradientType=0);
        
        background-color:#408c99;
    }
    .myButton:active {
        position:relative;
        top:1px;
    }
	
	
	.myButton2 {
        
        -moz-box-shadow: 0px 10px 14px -7px #276873;
        -webkit-box-shadow: 0px 10px 14px -7px #276873;
        box-shadow: 0px 10px 14px -7px #276873;
        
        background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #599bb3), color-stop(1, #408c99));
        background:-moz-linear-gradient(top, #599bb3 5%, #408c99 100%);
        background:-webkit-linear-gradient(top, #599bb3 5%, #408c99 100%);
        background:-o-linear-gradient(top, #599bb3 5%, #408c99 100%);
        background:-ms-linear-gradient(top, #599bb3 5%, #408c99 100%);
        background:linear-gradient(to bottom, #599bb3 5%, #408c99 100%);
        filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#599bb3', endColorstr='#408c99',GradientType=0);
        
        background-color:#599bb3;
        
        -moz-border-radius:8px;
        -webkit-border-radius:8px;
        border-radius:15px;
        
        display:inline-block;
		color:#FFFFFF;
        font-size:12px;
        font-weight:normal;
        padding:5px 5px;
		text-decoration:none;
        margin-top:5px;
		text-align:center;
		
        text-shadow:0px 1px 0px #3d768a;
        
    }
	
    .myButton2:hover {
        
        background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #408c99), color-stop(1, #599bb3));
        background:-moz-linear-gradient(top, #408c99 5%, #599bb3 100%);
        background:-webkit-linear-gradient(top, #408c99 5%, #599bb3 100%);
        background:-o-linear-gradient(top, #408c99 5%, #599bb3 100%);
        background:-ms-linear-gradient(top, #408c99 5%, #599bb3 100%);
        background:linear-gradient(to bottom, #408c99 5%, #599bb3 100%);
        filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#408c99', endColorstr='#599bb3',GradientType=0);
        
        background-color:#408c99;
    }
    .myButton2:active {
        position:relative;
        top:1px;
    }
	
	</style> 
</head>

                 

<body id="lite_library">
<input type="hidden" id="flag" value="0"/>
<input type="hidden" id="base_url" value="<?php echo $base_url;?>"/>
<div id="body_wrap">
	<!-- Header -->  
	<?php $this->load->view('includes/header_1'); 
	date_default_timezone_set('Asia/Dhaka');
	?> 

	<!-- Demo Navigation -->
	<?php $this->load->view('includes/menubar'); ?> 
	
	<!-- Intro Content -->
	<div class="content_wrap intro_bg">
		<div class="content clearfix"> 
			<div class="intro_text">
				<h1>Telemedicine Project</h1>
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
			<div class="w50 frame parallel_target" >				
				 <p>
                 <div align="center">

                 <input type="button" id="forceLoad" value="Force Load" class="link_button_b"/>
                 </div>
                    <div id="patient_list">
                                       
                      </div> 
                  </p>
               
                    <p></p>
                     
            </div>
            <div class="w60 frame parallel_target" >				
			<table  border="1" bordercolor="#000000" style="background-color:#FFFFFF" width="100%" cellpadding="0" cellspacing="0">
	<tr>
    <!--Patient Info-->
		<td width="47%" >
        <table class="abc" border="0" bordercolor="#ffffff" style="background-color:#FFFFFF" width="100%" cellpadding="0" cellspacing="0">
	<tr>
	  <td colspan="2" align="center"> <label class="b"  for="element_2" style=" font-weight:bold font-size:18px">Patient ID   :</label><label class="c" id="ptntID" >--</label></td>
	  </tr>
	<tr>
    	<td  > <label class="b"  for="element_2" style=" font-weight:bold font-size:18px">Examination ID   :</label><label class="c" id="examID" >--</label></td>
        <td ><label class="b"  for="element_2" style=" font-weight:bold font-size:18px">Center Name   :</label><label class="c" id="centerName" >--</label></td>
        
		</tr>
	<tr>
		<td width="39%"><label class="b"  for="element_2">Name   :</label><label class="c" id="pName" >-- </label></td>
		<td width="27%"><label class="b"  for="element_2">Sex   :</label><label class="c" id="pSex" >-- </label>
		</li></td>
		
	</tr>
	<tr>
		<td><label class="b"  for="element_2">Age   :</label><label class="c" id="pDob" >-- </label></td>
		<td><label class="b"  for="element_2">Phone   :</label> <label class="c" id="pPhone" >--</label></td>
		
	</tr>
     <tr>
		<td><label class="b"  for="element_2">Occupation   :</label><label class="c" id="pOccupation" >--</label></td>
		<td><label class="b"  for="element_2">Marital Status   :</label><label class="c" id="pMarital" >--</label></td>
		
	</tr>
     <tr>
		<td><label class="b"  for="element_2">Religion   :</label><label class="c" id="pReligion" >--</label></td>
		<td></td>
		
	</tr>
</table>
           
        </td>
         <!--Patient Info-->
		
		
	</tr>
	<tr>
		<td>
        
        <table>
        <tr>
       
		<td><label class="b"  for="element_2">Height   :</label><br/>
		  <input id="patient_height" name="patient_height"  type="text"  maxlength="255" value=""/>
		</td>
		<td><label class="b"  for="element_2">Weight   :</label><br/>
        <input id="patient_weight" name="patient_weight"  type="text"  maxlength="255" value=""/> </td>
        <td><label class="b"  for="element_2">Temperature   :</label><br/>
        <input id="patient_temp" name="patient_temp"  type="text"  maxlength="255" value=""/>  </label></td>
		
	</tr><tr>
		<td><label class="b"  for="element_2">Pulse Rate   :</label><br/>
        <input id="patient_pr" name="patient_pr"  type="text"  maxlength="255" value=""/> </td>
		<td><label class="b"  for="element_2">Blood Pressure   :</label><br/>
        <input id="patient_bp" name="patient_bp"  type="text"  maxlength="255" value=""/> </td>
        <td></td>
		
	</tr>
    <tr>
		<td colspan="3"><p>
		  <label class="b"  for="element_2">Symptom   :</label> 
          <br/>
		  <textarea id="symptom" name="symptom" class="element symptom medium" value="" ></textarea>
		</p>
        
		
	</tr>
    
        
        </table>
        
        </td>
		
		
	</tr>
	
</table>


<div id="showReport" style="display:none">
<form id="genPrimary" method="post" action="<?php echo $base_url;?>bmpt/load_report" target="_blank" >
        <div align="center">
         <input type="hidden" id="hptntID" name="hptntID" value="" />
         <input type="hidden" id="hexamID" name="hexamID" value="" />
         <input type="hidden" id="henabled" name="henabled" value=0 />
         <input type="submit" id="prescription_primary" class="link_button_b medium" value="Show Report" />
         <br/>
        </div>
        </form>
        </div>



</div>

          <div class="w200 frame " >
            <div id="report" style="display:none">
</div>
            
            <table width="479">
            
            <tr>
            <td width="239">
               <p>
		  <label class="b"  for="element_2">Primary Diagnosis   :</label> 
          <br/>
		  <textarea id="primary" name="primary" class="element diagnosis medium" value="" ></textarea>
          </p>
            </td>
            <td width="240">
             <p>
		
		  <label class="b"  for="element_2">Final Diagnosis  :</label> 
        <br/>
		  <textarea id="final" name="final" class="element diagnosis medium" value="" ></textarea>
		</p>
            </td>
            </tr>
            
            
            </table>
            <p>&nbsp;</p>
            <div align="center">
            <input id="prescriptionControl" type="button" class="link_button_b" value="Load Prescription Panel"/>
            </div>
        <table id="prescriptionTable" style="display:none">
       
        <tr>
          
          <td colspan="4">
           <div align="center" style="background:#CCF" >
     <label class="b" style="font-size:20px;font-weight:bold;color:#036">Prescription Panel</label>
    </div>
          </td>
        </tr>
        
        <tr>
        <td colspan="5">
           
           <div align="center">
       
         <label class="b" style="font-size:16px;font-weight:bold;color:#036">Select Medicine Type</label>
         </div>
         
        </td>
        </tr>
        <tr>
          <td colspan="3">
          
           
          
          
          <label class="b" style="font-size:16px;font-weight:bold;color:#036">Medicine List </label><br/>
          
          <input type="hidden" id="medTypeStore" value=""/>
          <div id="companyList">
          
           </div> 
          
          
          </td>
          </tr>
          <tr>
       
		<td colspan="3">		   <div align="center"><input type="button" id="editMedButton" value="Edit Medicine" class="link_button_b "/></div>
		  </td>
        </tr>
        <tr>
        <td colspan="2"  >
        
            <table id="tableMed"  style="background-color:#99C; display:none">
            <tr>
            <td colspan="3">
            <label class="b" style="font-size:16px;font-weight:bold;color:#036"> ADD/Delete/ Update Medicine</label>
            </td>
            </tr>
     <tr>
     <td width="30%"> Select Company Name </td>
     <td>
      
            <div class="styled-select">
  
  
   <select id="editComSelect" name="comSelect" style="min-width:150px" >
          <?php
		 
		  $this->db->order_by('priority asc');
		  $this->db->select('companyName,dbName');
  		  $query = $this->db->get('companyz22');
		  foreach($query->result() as $row){ 
		  $company['name'] =  $row->companyName;
		  $company['dbname'] =  $row->dbName;
		  ?>
          <option  value="<?php echo  $company['dbname'] ?>"><?php echo $company['name'];?> </option>
          <?php } ?>
          </select>
     </div> <p></p>
     </td>
     <td></td>
     </tr>
     <tr>
       <td>Medicine Name</td>
       <td> <input type="text" id="editMed" style="width:95%" class="large"/></td>
       <td><input type="button" id="delMed" value="Delete Medicine" class="link_button_a large "/></td>
     </tr>
     <tr>
      <td> Generic and Type </td>
     <td>
     <div align="center">
     <textarea id="editGeneric" name="editGeneric" class="element small "  style="width:95%" ></textarea><br/>
     
     </div>
     <div class="styled-select">
  
  
   <select id="editTypeSelect" name="editTypeSelect" style="min-width:150px" >
          <?php
		 
		  $this->db->select('medicineType');
  		  $query = $this->db->get('medicinetypey22');
		  foreach($query->result() as $row){ 
		  $type['name'] =  $row->medicineType;
		  
		  ?>
          <option  value="<?php echo  $type['name'] ?>"><?php echo $type['name'];?> </option>
          <?php } ?>
          </select>
     </div>
     </td>
     <td><input type="button" id="addMed" value="Add Medicine" class="link_button_a large "/></td>
     </tr>
     
     
     <tr>
      <td> Update Medicine Name</td>
     <td>
     
     <input type="text" id="updateMed" style="width:95%" class="large"/>
     </td>
     <td><input type="button" id="upMed" value="Update Medicine" class="link_button_a large "/></td>
     </tr>
     </table>
            </td>
            <td>
            </td>
        
        </tr>
        <tr>
		<td width="20%">
         <div id="advice" > 
         
         
        </div>
        <div id="editAdvice" align="center" style=" display:none; border-radius:5px;background-color:#99C">
        <label class="b" style="font-size:16px;font-weight:bold;color:#036">Add/Delete Advice</label><br/>
        <textarea id="newAdvice" name="newAdvice" style="width:90%"  value="ABCD" ></textarea><br/>
        <input type="button" id="addAdviceDb" value="Add Advice" class="link_button_a "/>
         <input type="button" id="deleteAdvice" value="Delete Advice" class="link_button_a "/>
         <p>&nbsp;</p>
       
        
        </div>
          
         <div id="editDose" align="center" style=" display:none; border-radius:5px;background-color:#99C">
         <div id="dose" style="width:80%"> 
         
         
         </div>
          <p>&nbsp;</p>
            <label class="b" style="font-size:16px;font-weight:bold;color:#036">Add/Delete Dose</label><br/>
		    <input type="text" id="newDose" style="width:80%"/><br/>
		    
		    <input type="button" id="addDose" value="Add Dose" class="link_button_a"/>
            <input type="button" id="deleteDose" value="Delete Dose" class="link_button_a "/>
           
		    <p>&nbsp;</p>
		    </div>
             
       
            
              
         
          <div id="editApplication" align="center" style="display:none; border-radius:5px;background-color:#99C">
          <div id="application" style="width:80%"> 
         
         
         </div>
          <p>&nbsp;</p>
            <label class="b" style="font-size:16px;font-weight:bold;color:#036">Add/Delete Application</label><br/>
		    <input type="text" id="newApplication" style="width:80%"/><br/>
		    
		    <input type="button" id="addApplication" value="Add Application" class="link_button_a "/>
            <input type="button" id="deleteApplication" value="Delete Application" class="link_button_a "/>
           
		    <p>&nbsp;</p>
		    </div>
  
            
            
            </td>
        <td width="20%">
        <div align="center">
        <label class="b" style="font-size:16px;font-weight:bold;color:#036">Test Type</label><br/>
       
        
            <input type="text" id="testType" />
           
            <input type="button" id="showTest" value="Show Test" class="link_button_a "/>
     
            
         </div>
       
     
 
         <div id="testDiv"> 
         
         
         </div>
         
             <input type="hidden" id="prescriptionHolder" name="prescriptionHolder"   value=""/>
			 <input type="hidden" id="medicineNameStore"  value=""/>       
             <input type="hidden" id="medicineIdStore"  value=""/>   
         
         
         
         
         
        
         	</td>
        <td colspan="3" width="60%">
        <label class="b" style="font-size:16px;font-weight:bold;color:#036">Search Prescription</label><br/>
         <input type="text" id="disease"/> <input type="button" id="getPresc" value="Get Prescription" class="link_button_b"/> 
        
         <div id="editPrescrip" align="left" style="display:none; border-radius:5px;background-color:#99C">
         <p>&nbsp;</p>
         &nbsp;<input type="button" id="addPrescrip" value="Save Prescription" class="link_button_b"/>
        
         <p>&nbsp;</p>
         </div>
        <br/>
         <label class="b"> Editable: </label>
         <input type="checkbox" id="checkedOrNot"/> <br/>
         <textarea id="prescription" name="prescription" class="element diagnosis medium" value="ABCD" readonly></textarea><br/>
         
         <input type="button" id="prPrescrip" value="Send as Primary Prescription" class="link_button_b " style="width:30%"/>
         <input type="button" id="finalPrescrip" value="Send as Final Prescription" class="link_button_b"/>&nbsp; &nbsp; &nbsp; <input align="right" type="button" id="clearTextArea" value="Clear Text Area" class="link_button_b"/>
        </td>
        </tr>
   
    
        
        </table>
           
            </div>
           
            </div>
            </div>
              <p id="back-up">
		<a href="#top"><span></span></a>
	</p>    
           <p id="back-down">
		<a href="#top"><span></span></a>
	</p>
            <div id="notice_div" > </div>
            

			
	</div>

	<!-- Footer -->  
	<?php $this->load->view('includes/footer'); ?> 	
</div>

<!-- Scripts -->  
<?php $this->load->view('includes/scripts'); ?> 
<?php $this->load->view('includes/scripts_autocomplete'); ?>
<script src="<?php echo $includes_dir;?>js/doc.js"></script>



</body>
</html>