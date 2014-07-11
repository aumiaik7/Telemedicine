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
     
     <style>
	
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
	<?php $this->load->view('includes/header_1'); ?> 

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
			
           
          

          <div class="w200 frame " >
         
            
            
           
            
        <table id="prescriptionTable" >
        <tr>
          
          <td colspan="3">
           <div align="center" style="background:#CCF" >
     <label class="b" style="font-size:20px;font-weight:bold;color:#036">Prescription Panel</label>
    </div>
          </td>
        </tr>
       
        <tr>
          <td colspan="2" >
           <label class="b" style="font-size:16px;font-weight:bold;color:#036">&nbsp;Add Medicine Type By Generic</label>
            <table>
            <tr>
              <td>
                Medicine Type
                </td>
              <td>
                <input type="text" id="emedicineType" style="width:95%"/>
                </td> 
              <td>
                <input type="button" id="delType" value="Delete Type" class="link_button_a" style="width:95%" />
                </td>   
              
            <tr>
	          <td>Generic</td>
	          <td><input type="text" id="eGeneric" style="width:95%"/></td>
              <td> <input type="button" id="addType" value="Add Type" class="link_button_a" style="width:95%" /></td>
	          </tr>
          
         
  
         </table>
         </td>
         <td width="50%"></td>
        </tr>
         
        <tr>
          <td colspan="3">
          <?php 
		  if($this->flexi_auth->get_user_identity()== 'imtiaz.admin')
		  {
		  ?>
         
           <div> 
          	<table id="tableCom"   style=" background-color: #99C">
            <tr>
            <td width="20%">
            <div id="editCom1" align="center" >
		    <input type="text" id="comName1"/><br/>
		    
		    <input type="button" id="upCom1" value="Edit Company Name" class="link_button_a "/>
            
		    
		    </div>
            </td>
            <td width="20%">
             <div id="editCom2" align="center" >
		    <input type="text" id="comName2"/><br/>
		    
		    <input type="button" id="upCom2" value="Edit Company Name" class="link_button_a "/>
            
		    </div>
            
            </td>
            <td width="20%">
            
             <div id="editCom3" align="center" >
		    <input type="text" id="comName3"/><br/>
		    
		    <input type="button" id="upCom3" value="Edit Company Name" class="link_button_a "/>
         
		    </div>	
            </td>
            <td width="20%">
            
             <div id="editCom4" align="center">
		    <input type="text" id="comName4"/><br/>
		    
		    <input type="button" id="upCom4" value="Edit Company Name" class="link_button_a "/>
          
		    </div>
            </td>
            <td width="20%">
            	 <div id="editCom5" align="center" >
		    <input type="text" id="comName5"/><br/>
		    
		    <input type="button" id="upCom5" value="Edit Company Name" class="link_button_a "/>
          
		    </div>
            </td>
            </tr>
           
            
            </table>
            </div>
             <?php }?>
           
            
            
            
           <div align="center">
       
         <label class="b" style="font-size:16px;font-weight:bold;color:#036">Select Medicine Type</label><br/>
         <input type="hidden" id="medTypeStore" value=""/>
         </div>
         
          
          
          <div id="companyList"> </div> 
          <div> 
          <label class="b" style="font-size:16px;font-weight:bold;color:#036"> ADD/Delete/ Update Medicine</label><br/>
          <table id="tableMed"  style="  background-color:#99C ">
            <tr>
            <td colspan="2" >
            <table class="abc">
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
            <td  width="10%">
            
            </td>
            <td width="20%">
            	
            </td>
            <td width="20%">
            	
            </td>
            </tr>
            
            </table>
          </div>
          
          </td>
          </tr>
        <tr>
		<td width="20%">
        
          <div id="dose"> 
         
         
         </div>
         
          <div id="editDose" align="center" style=" border-radius:5px;background-color:#99C">
          <p>&nbsp;</p>
		    <input type="text" id="newDose" style="width:80%"/><br/>
		    
		    <input type="button" id="addDose" value="Add Dose" class="link_button_a "/>
            <input type="button" id="deleteDose" value="Delete Dose" class="link_button_a "/>
           
		    <p>&nbsp;</p>
		    </div>
            
             <p>&nbsp;</p>
             <div id="application"> 
         
         
         </div>
         
          <div id="editApplication" align="center" style=" border-radius:5px;background-color:#99C">
          <p>&nbsp;</p>
		    <input type="text" id="newApplication" style="width:80%"/><br/>
		    
		    <input type="button" id="addApplication" value="Add Application" class="link_button_a "/>
            <input type="button" id="deleteApplication" value="Delete Application" class="link_button_a "/>
           
		    <p>&nbsp;</p>
		    </div>
            
            
              <div id="advice"> 
         
         
         </div>
         
          <div id="editAdvice" align="center" style=" border-radius:5px;background-color:#99C">
          <p>&nbsp;</p>
		    <input type="text" id="newAdvice" style="width:80%"/><br/>
		    
		    <input type="button" id="addAdviceDb" value="Add Advice" class="link_button_a "/>
            <input type="button" id="deleteAdvice" value="Delete Advice" class="link_button_a "/>
           
		    <p>&nbsp;</p>
		    </div>
            
            </td>
        <td width="20%">
        <div align="center">
        <label class="b" style="font-size:16px;font-weight:bold;color:#036">Test Type</label><br/>
       
        
            <input type="text" id="testType"/>
           
            <input type="button" id="showTest" value="Show Test" class="link_button_a "/>
     
            <div id="type" style="border-radius:5px; background-color:#99C" >
          <p>&nbsp;</p>
            <input type="button" id="addTestType" value="Add Type" class="link_button_a" /><br/>
            <input type="button" id="delTestType" value="Delete Type" class="link_button_a" />
            <p>&nbsp;</p>
            </div>
         </div>
         <div id="testDiv"> 
         
         
         </div>
         
         
         <div id="edit1" align="center" >
		    <input type="text" id="test"/><br/>
		    
		    <input type="button" id="addTest" value="Add Test" class="link_button_a "/><br/>
            <input type="button" id="delTest" value="Delete Test" class="link_button_a "/>
            <hr/>
            <input type="button" id="fetchTest" value="Fetch Test" class="link_button_a "/><br/>
            <input type="button" id="upTest" value="Update Test" class="link_button_a "/>
		    <input type="hidden" id="prescriptionHolder" name="prescriptionHolder"   value=""/>
            <input type="hidden" id="medicineNameStore"  value=""/>       
             <input type="hidden" id="medicineIdStore"  value=""/>  
		    </div>
         
         
        
         	</td>
        <td colspan="3" width="60%">
        <label class="b" style="font-size:16px;font-weight:bold;color:#036">Search Prescription</label><br/>
         <input type="text" id="disease"/> <input type="button" id="getPresc" value="Get Prescription" class="link_button_b"/> 
        
         <div id="editPrescrip" align="left" style=" border-radius:5px;background-color:#99C">
         <p>&nbsp;</p>
         &nbsp;<input type="button" id="addPrescrip" value="Save Prescription" class="link_button_b"/>
                  <p>&nbsp;</p>
         </div>
         <label class="b"> Editable: </label>
         <input type="checkbox" id="checkedOrNot"/> <br/>
         <textarea id="prescription" name="prescription" class="element diagnosis medium" value="ABCD" readonly ></textarea><br/>
          <input align="right" type="button" id="clearTextArea" value="Clear Text Area" class="link_button_b"/>
         
         
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
<script src="<?php echo $includes_dir;?>js/medicine.js"></script>



</body>
</html>