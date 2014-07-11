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
</head>

<body id="lite_library">

<div id="body_wrap">
	<!-- Header -->  
	<?php $this->load->view('includes/header_1'); ?> 

	<!-- Demo Navigation -->
	<?php $this->load->view('includes/menubar'); ?> 
     <?php $this->load->view('includes/form_patient'); ?> 
	
	<!-- Intro Content -->
	<div class="content_wrap intro_bg">
		<div class="content clearfix"> 
			<div class="intro_text">
				<h1>Sorry!!!</h1>
                <div align="right"> <label class="a"> <?php echo $this->session->userdata('hello') .  $this->session->userdata('uname') . "!" ?></label>
                </div>			
				<p class="a">&nbsp;</p>
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
			
            
            
            <!--prescription Panel-->
            
            <div class="w200 frame " >
            
            
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
            
            <tr>
              <td colspan="2"><div align="center">
              <input type="button" id="sendPrescrip" value="Send Prescription" class="link_button_b "/>
              </div></td>
              
            </tr>
            </table>
            <p>&nbsp;</p>
            <div align="center">
            <input id="prescriptionControl" type="button" class="link_button_b" value="Load Prescription Panel"/>
            </div>
        <table id="prescriptionTable" style="display:">
        <tr>
          
          <td colspan="4">
           <div align="center" style="background:#CCF" >
     <label class="b" style="font-size:20px;font-weight:bold;color:#036">Prescription Panel</label>
    </div>
          </td>
        </tr>
        <tr>
       
		<td colspan="4">		   <div align="center"><input type="button" id="editMed" value="Edit Medicine" class="link_button_b "/></div>
		  </td>
        </tr>
        <tr>
        <td colspan="5">
           
           <div align="center">
       
         <label class="b" style="font-size:16px;font-weight:bold;color:#036">Select Medicine Type</label>
         </div>
         <div>
  <?php 
   		  $this->db->select('medicineType');
		  $query = $this->db->get('medicineTypey22');
		  foreach($query->result() as $row){ 
		  $medicine['type'] =  $row->medicineType;
		  ?>
		 	  
  <a  href="#" class="myButton" style="color:#FFF; min-width:70px" value="<?php echo $medicine['type']?>"><?php echo $medicine['type']?></a>  
  <?php } ?>
        <br/>
        <div align="center">
  <label id="typeLabel" class="b" style="font-size:16px;font-weight:bold;color:#036">No Type Selected</label>
  </div>
  </div>
        </td>
        </tr>
        <tr>
          <td colspan="3">
          
           
          
          
          <label class="b" style="font-size:16px;font-weight:bold;color:#036">Medicine List </label><br/>
          <div id="com_1"> </div> 
          
          
          </td>
          </tr>
        <tr>
		<td width="20%">
        
          
         <div id="editDose" align="center" style=" display:none; border-radius:5px;background-color:#99C">
         <div id="dose" style="width:80%"> 
         
         
         </div>
          <p>&nbsp;</p>
		    <input type="text" id="newDose" style="width:80%"/><br/>
		    
		    <input type="button" id="addDose" value="Add Dose" class="link_button_a "/>
            <input type="button" id="deleteDose" value="Delete Dose" class="link_button_a "/>
           
		    <p>&nbsp;</p>
		    </div>
             
       
            
              
         
          <div id="editApplication" align="center" style="display:none; border-radius:5px;background-color:#99C">
          <div id="application" style="width:80%"> 
         
         
         </div>
          <p>&nbsp;</p>
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
         
         
         
         
         
        
         	</td>
        <td colspan="3" width="60%">
        <label class="b" style="font-size:16px;font-weight:bold;color:#036">Search Prescription</label><br/>
         <input type="text" id="disease"/> <input type="button" id="getPresc" value="Get Prescription" class="link_button_b"/> 
        
         <div id="editPrescrip" align="left" style="display:none; border-radius:5px;background-color:#99C">
         <p>&nbsp;</p>
         &nbsp;<input type="button" id="addPrescrip" value="Save Prescription" class="link_button_b"/>
         <input type="button" id="upPrescrip" value="Update Prescription" class="link_button_b"/>
         <p>&nbsp;</p>
         </div>
         <p>&nbsp;</p>
         <textarea id="prescription" name="prescription" class="element diagnosis medium" value="ABCD" ></textarea><br/>
         <input type="button" id="prPrescrip" value="Add to Primary Diagnosis" class="link_button_b"/>
         <input type="button" id="finalprescrip" value="Add to Final Diagnosis" class="link_button_b"/>
        </td>
        </tr>
   
    
        
        </table>
           
            </div>
            
            
            
            
            
            
            
            
            
            
            <!--prescription Panel-->
            
            
			
				
		</div>
	</div>

	<!-- Footer -->  
	<?php $this->load->view('includes/footer'); ?> 	
</div>

<!-- Scripts -->  
<?php $this->load->view('includes/scripts'); ?> 

</body>
</html>