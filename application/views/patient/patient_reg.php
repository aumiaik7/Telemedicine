<!doctype html>
<!--[if lt IE 7 ]><html lang="en" class="no-js ie6"><![endif]-->
<!--[if IE 7 ]><html lang="en" class="no-js ie7"><![endif]-->
<!--[if IE 8 ]><html lang="en" class="no-js ie8"><![endif]-->
<!--[if IE 9 ]><html lang="en" class="no-js ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->

<html lang="en" class="no-js"><!--<![endif]-->
<?php

error_reporting(E_ALL ^ E_WARNING);

require_once "ajax.php";
$ajax = ajax();

## The  validation array below uses the exact same format as it does in the Jquery.validate plugin javascript format.

# you may use custom handlers:
# submitHandler  => "function() {}"
# invalidHandler  => "function() {}"

### button_id, $validate - rules, messages, handlers, errorElement, see jquery.validation to see available options.

//$ajax->log = 1;
$img =  md5(time(). rand(1,10000000));
$newdata = array(
                   'imageIdent'  => $img,
                 );
$this->session->set_userdata($newdata);
$uploader = $ajax->uploader('btn_saveForm','uploads',
	//settings are optional
	array(
		'url' => '../'.'ajax.php?upload_file/post', //post request after files are uploaded
		'suffix' => $img, // makes files names universally unique,
		'success_message' => 'File @files successfully uploaded.', //@files tag is replaced by files uploaded.
		'ext' => array('jpg','gif', 'png','jpeg')
	)
);

$uploader->preview($base_url.'uploads', array(
	"placeholder"=> "<img style='max-width: 250px;' src='#image1#' />"
));










### below is an HTML form.  All you need is the id of the form, and all the code is needed is above. 
### look inside controllers/send_form.php for response code sample.


?>
<head>
	<meta charset="utf-8">
	<title>Telemedicine</title>
	<meta name="description" content="Telemedicine Project for rural areas of Bangladesh, By BMPT"/> 
	<meta name="keywords" content="Telemedicine, Rural health care,BMPT"/>
	 <?php $this->load->view('includes/head'); ?> 
     <?php $this->load->view('includes/form_patient'); ?> 
     <link rel="stylesheet" href="<?php echo $includes_dir;?>css/query-ui.css">
     <?php echo $ajax->init($base_url);?>
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
				<h2 class="a">Telemedicine Project</h2>
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
			<div  align="center" style="font-size:24px"  id="result"></div>
			<div class="w40 r_margin frame parallel_target" >				
				
     <!-- Form 1 -->
     
     <div id="form_container">
	
		<h1 class="b" ><a>Untitled Form</a></h1>
        <div id="wrap">
		<form id="form_595085" class="appnitro" enctype="multipart/form-data" method="post" action="">
					<div class="form_description">
			<h2>Create Patient</h2>
			<p>Fill all the options given bellow</p>
		</div>						
			<ul >
			
						<li id="li_2" >
		<label class="description" for="element_2" id="aba">Name </label>
		<div>
			<input id="patient_name" name="patient_name" class="element texta medium" type="text" maxlength="255" value=""/> <em style="color:#F00">*</em>
		</div>
		</li>		<li id="li_3" >
		<label class="description" for="element_7">Sex </label>
		<span>
			<input id="element_7_1" name="element_7" class="element radio" type="radio" value="Male" />
<label class="choice" for="element_7_1">Male</label>
<input id="element_7_2" name="element_7" class="element radio" type="radio" value="Female" />
<label class="choice" for="element_7_2">Female</label>
<input id="element_7_3" name="element_7" class="element radio" type="radio" value="Other" />
<label class="choice" for="element_7_3">Other</label>

		</span> 
		</li>		<li id="li_3" >
		<label class="description" for="element_3">Date of Birth </label>
		<span>
			<input id="element_3_1" name="element_3_1" class="element texta" size="2" maxlength="2" value="" type="text"> /
			<label for="element_3_1" class="date">DD</label>
		</span>
		<span>
			<input id="element_3_2" name="element_3_2" class="element texta" size="2" maxlength="2" value="" type="text"> /
			<label for="element_3_2" class="date">MM</label>
		</span>
		<span>
	 		<input id="element_3_3" name="element_3_3" class="element texta" size="4" maxlength="4" value="" type="text">
			<label for="element_3_3" class="date">YYYY</label>
		</span>
	
		<span id="calendar_3">
			<img id="cal_img_3" class="datepicker" src="../includes/form_resource/calendar.gif" alt="Pick a date.">	
		</span><em style="color:#F00">*</em>
		<script type="text/javascript">
			Calendar.setup({
			inputField	 : "element_3_3",
			baseField    : "element_3",
			displayArea  : "calendar_3",
			button		 : "cal_img_3",
			ifFormat	 : "%B %e, %Y",
			onSelect	 : selectEuropeDate
			});
		</script>
        
		 </li>		
         
         
         <li id="li_3" >
		<label class="description" for="element_3">Address </label>
		<span>
			<input id="village" name="village" class="element texta" size="9"  value="" type="text"> 
			<label for="village" class="date">Village</label>
		</span>
		<span>
			<input id="po" name="po" class="element texta" size="9"  value="" type="text"> 
			<label for="po" class="date">P/O</label>
		</span>
		<span>
        <?php
        $operatorId = $this->flexi_auth->get_user_id();
		$query = $this->db->get_where('operatory28', array('userID' => $operatorId));
		if($query->num_rows() > 0)
		{
		$operator['center'] = $query->row()->centerName;
		$operator['address'] = $query->row()->address;
		if(count($operator['address'])==5)
		$parts = explode(';', $operator['address']);
		else
		{
			$operator['center'] = 'not Set';
			$parts[2] = 'not Set';
			$parts[3] = 'not set';
			$parts[4] = 'not set';
			}
		}
		else
		{
				$operator['center'] = 'Admin Center';
				$parts[2] = 'admin';
				$parts[3] = 'admin';
				$parts[4] = 'admin';
		}
		?>
        
	 		<input id="union" name="union" class="element texta" size="9"  value="<?php echo $parts[2]?>" type="text" readonly>
			<label for="union" class="date">Union</label>
		</span>
        <span>
	 		<input id="upazila" name="upazila" class="element texta" size="9"  value="<?php echo $parts[3]?>" type="text" readonly>
			<label for="upazila" class="date">Upazila</label>
		</span>
        <span>
	 		<input id="zila" name="zila" class="element texta" size="9"  value="<?php echo $parts[4]?>" type="text" readonly>
			<label for="zila" class="date">Zila</label>
		</span>
	
		
        
		 </li>		
         
        
		</li>		<li id="li_5" >
		<label class="description" for="element_4">Phone </label>
		<div>
			<input id="phone" name="phone" class="element texta medium" type="text" maxlength="255" value=""/> 
		</div> 
		</li>	
        <li id="li_5" >
		<label class="description" for="element_4">Occupation </label>
		<div>
			<input id="occupation" name="occupation" class="element texta medium" type="text" maxlength="255" value=""/> 
		</div> 
		</li>		
        <li id="li_5" >
		<label class="description" for="element_4">Marital Status </label>
		<div>
			<select id="maritalStatus" name="maritalStatus" class="element medium">
		       
                    <option value="" selected>Select</option>
                    <option value="Single" >Single</option>
                    <option value="Married" >Married</option>
                    <option value="Widowed" >Widowed</option>
              
					
	
                    </select>
		</div> 
		</li>		
        <li id="li_5" >
		<label class="description" for="element_4">Religion </label>
			<div>
			<select id="religion" name="religion" class="element medium">
		       
                    <option value="" selected>Select</option>
                    <option value="Muslim" >Muslim</option>
                    <option value="Hindu" >Hindu</option>
                    <option value="Christian" >Christian</option>
                    <option value="Buddhist" >Buddhist</option>
                    <option value="Other" >Other</option>
              
					
	
                    </select>
		</div> 
		</li>		
       	<li id="li_6" >
		<label class="description" for="element_5">National ID Card No </label>
		<div>
		  <input id="national_id" name="national_id" class="element texta medium" type="text" maxlength="255" value=""/>
		</div> 
		</li>	
        <li id="li_6" >
		<label class="description" for="element_5" style="width:80%">Reference ID (For Family Members) </label>
		<div>
		  <input id="ref_id" name="ref_id" class="element texta medium" type="text" maxlength="255" value=""/><br/><em style="font-size:9px"> Enter atleast first 2 characters to search Patient ID</em>
		</div> 
		</li>		
       
        
        <input type="hidden" id="center" name="center" class="element medium" value="<?php echo $operator['center']; ?>"/>
		  
			
			
					<li class="buttons">
			    <input type="hidden" name="form_id" value="595085" />
			    <input id="btnSubmit" class="link_button medium" type="button" name="btnSubmit" value="Submit" />
				</li>
                	<li class="buttons">
		
				</li>
			</ul>
		</form>	
        </div>
		
	</div>
     
     
     <!-- Form 1 -->           
               
                
                	
			</div>

		<div class="w40 r_margin  frame parallel_target">
				
                
      <!-- Form 2 -->
     <div id="form_container" >
		
			<h1 class="b"><a>Upload file using Ajax..</a></h1>
	
			<form id="form1" class="appnitro"  method="post" action="">
			<div class="form_description">
				<h2>Upload Photo</h2>
				<p>Upload photo for created patient</p>
			</div>						
			<ul>
            <li id="li_2" >
		<label class="description" for="element_2">Patient ID </label>
		<div>
			<input id="patient_id" name="patient_id" class="element texta medium" type="text" maxlength="255" value="" readonly/> 
		</div>
		</li>	
			<li id="li_3" >
            <label class="description" for="element_4">Select File  </label>
			<div>
				<input id="imageUpload" name="my_file[]" class="element text large" type="file" maxlength="255" value=""/> 
			</div> 
			</li>
		
	
		
			<li class="buttons">
					<input id="btn_saveForm" class="link_button medium" type="button"  value="Submit" />
			</li>
				</ul>
			</form>	
            		<div align="center" id="placeholder"  >
                    
		</div>

			
			
		</div>
     
     
     
     <!-- Form 2 -->    
        </div>	
        <div id"placeholder"></span>
        
        <div class="w40  frame parallel_target">				
			 <!-- Form 3 -->
     
   
      <div id="form_container_2">
	
		<h1 class="b" ><a>Untitled Form</a></h1>
        
		
					<div class="form_description">
			<h2 style="margin-left:20px; margin-top:15px">Search Patient</h2>
			<p style="margin-left:20px">Search using Id or mobile no for existing patient</p>
		</div>						
			<ul >
            	<li class="buttons" style="margin-left:20px">
                <input id="pID" name="pID" class="element texta medium" type="text" maxlength="255" value=""/><br/><em style="font-size:9px"> Enter atleast first 2 characters to search Patient ID</em>
			    
			    <input id="searchByID" class="link_button medium" type="button" name="searchByID" value="By ID"  />
				</li>
                
                <li style="margin-left:20px">
		<label class="b"  >Patient ID   :</label><label class="c" id="ptntID" >-- </label>
        
		</li>		
			
		<li style="margin-left:20px">
		<label class="b"  >Name   :</label><label class="c" id="pName" >-- </label>
        
		</li>		
						<li style="margin-left:20px" >
		<label class="b"  >Sex   :</label><label class="c" id="pSex" >-- </label>
        
		</li>		<li  style="margin-left:20px">
		<label class="b"  >Date of Birth   :</label><label class="c" id="pDob" >-- </label>
        
		 </li>		<li style="margin-left:20px">
		<label class="b"  >Address   :</label><label class="c" id="pAddress" >-- </label></li>
        <li style="margin-left:20px" >
		<label class="b" >Phone   :</label><label class="c" id="pPhone" >-- </label></li>
		<li style="margin-left:20px">
		<label class="b" >Occupation   :</label><label class="c" id="pOccupation" >-- </label></li>
        
        	<li style="margin-left:20px">
		<label class="b" >Marital Status   :</label><label class="c" id="pMarital" >-- </label></li>
        
                
        	<li style="margin-left:20px">
		<label class="b" >Religion   :</label><label class="c" id="pReligion" >-- </label></li>
        	
        
        <li style="margin-left:20px">
		<label class="b"  >National ID Card No.   :</label><label class="c" id="pNid" >-- </label>
		
        </li>		
        	<li style="margin-left:20px">
		<label class="b"  >Reference ID   :</label><label class="c" id="pRef" >-- </label>
		
        </li>		
			
            <li  style="margin-left:20px">
		<label class="b" >Image   :</label>
		</li>		
				
        
         <li style="margin-left:20px">
        <div align="center">
             <img id="pImage" width="200px" height="250px" >                    
                               
        </div>
        </li>
        
        	
       
        </ul>	
	
        
        <form id="patientReport" method="post" action="<?php echo $base_url;?>bmpt/hello_world" target="_blank">
          
          <input type="hidden" id="hptntID" name="hptntID" value=""/>
        <input type="hidden" id="hpName" name="hpName" value=""/>
        <input type="hidden" id="hpSex" name="hpSex" value=""/>
        <input type="hidden" id="hpDob" name="hpDob" value=""/>
        <input type="hidden" id="hpAddress" name="hpAddress" value=""/>
        <input type="hidden" id="hpPhone" name="hpPhone" value=""/>
        
        <input type="hidden" id="hpOccupation" name="hpOccupation" value=""/>
        <input type="hidden" id="hpMarital" name="hpMarital" value=""/>
        <input type="hidden" id="hpReligion" name="hpReligion" value=""/>
        
        <input type="hidden" id="hpNid" name="hpNid" value=""/>
        <input type="hidden" id="hpCenter" name="hpCenter" value=""/>
        <input type="hidden" id="hpRef" name="hpRef" value=""/>
        <ul>
         <li class="buttons">
        <input id="genReport" class="link_button medium" type="submit" name="genReport" value="Print Patient Info"  />
        </li>
       
       
        </ul>	
      </form>
        
        <form method="post" action="<?php echo $base_url;?>bmpt/start_diagnosis">
         <li  class="buttons">
		<label class="description" for="element_8">Patient ID </label>
		<div>
		  <input id="pID2" name="pID2" class="element texta medium" type="text" maxlength="255" value=""/>
		</div> 
			
        
        <input id="startDiagnosis" class="link_button medium" type="submit" name="startDiagnosis" ="start diagnosis" />
        <input type="hidden" name="transaction_id" value="<?php echo md5(time(). rand(1,10000000)) ?>" />
        
        </li>
                </form>	
      
		
	</div>
     
     <!-- Form 3 -->    	
              
              
                	
			</div>		
        
        
        
        </div>
			
		</div>
        
	    
    
    
    

	<!-- Footer -->  
	<?php $this->load->view('includes/footer'); ?> 	
</div>

<!-- Scripts --> 

 
<?php $this->load->view('includes/scripts_1'); ?> 
<?php $this->load->view('includes/scripts_autocomplete'); ?>


</body>
</html>