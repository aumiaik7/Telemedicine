<!doctype html>
<!--[if lt IE 7 ]><html lang="en" class="no-js ie6"><![endif]-->
<!--[if IE 7 ]><html lang="en" class="no-js ie7"><![endif]-->
<!--[if IE 8 ]><html lang="en" class="no-js ie8"><![endif]-->
<!--[if IE 9 ]><html lang="en" class="no-js ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en" class="no-js"><!--<![endif]-->
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
$uploader = $ajax->uploader('upload_photo','uploads',
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

<div id="body_wrap">
<input type="hidden" id="base_url" value="<?php echo $base_url;?>"/>

	<!-- Header -->  
	<?php $this->load->view('includes/header_1'); ?> 

	<!-- Demo Navigation -->
	<?php $this->load->view('includes/menubar'); ?> 
	
	<!-- Intro Content -->
	<div class="content_wrap intro_bg">
		<div class="content clearfix"> 
			<div class="intro_text">
				<h1>Patient Information</h1>
                <div align="right"> <label class="a"> <?php echo $this->session->userdata('hello') .  $this->session->userdata('uname') . " !" ?></label>
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
			
				
			<div class="w40 r_margin frame parallel_target" >				
				
     <!-- Form 1 -->
     
     <div id="form_container">
     <?php
	 	$query = $this->db->get_where('patientx22', array('searchID' => $id));
			
		$row = $query->row(); 
				
				$array = array($row->patientName,$row->sexOfPatient,$row->dobOfPatient,$row->addressOfPatient,$row->phone,$row->occupation,$row->maritalStatus,$row->religion,$row->nationalId, $row->centerName,$row->picLocation, $row->referenceID);
				
	 ?>
	
		<h1 class="b" ><a>Untitled Form</a></h1>
        <div id="wrap">
		<form id="form_595085" class="appnitro" enctype="multipart/form-data" method="post" action="">
			<input type="hidden" id="pID" name="pID" value="<?php echo ($id);?>"/>
            		<div class="form_description">
					  <h3>Patient Info for ID: <?php echo ($id)?> </h2>
			<p>Patient Details are given Bellow</p>
		</div>						
			<ul >
			
						<li id="li_2" >
		<label class="description" for="element_2" id="aba">Name </label>
		<div>
			<input id="patient_name" name="patient_name" class="element texta medium" type="text" maxlength="255" value="<?php echo $array[0] ?>"/> 
		</div>
		</li>		<li id="li_3" >
		<label class="description" for="element_7">Sex </label>
		<span>
			<input id="element_7_1" name="element_7" class="element radio" type="radio" value="Male" <?php if($array[1] == "Male"){?> checked <?php }?> />
<label class="choice" for="element_7_1">Male</label>
<input id="element_7_2" name="element_7" class="element radio" type="radio" value="Female" 
<?php if($array[1] == "Female"){?> checked <?php }?> />
<label class="choice" for="element_7_2">Female</label>
<input id="element_7_3" name="element_7" class="element radio" type="radio" value="Other"
<?php if($array[1] == "Other"){?> checked <?php }?> />
<label class="choice" for="element_7_3">Other</label>

		</span> 
		</li>		<li id="li_3" >
		<label class="description" for="element_3">Date of Birth </label>
		<span>
        <?php $parts = explode('/',$array[2]);?>
			<input id="element_3_1" name="element_3_1" class="element texta" size="2" maxlength="2" value="<?php echo $parts[0]?>" type="text"> /
			<label for="element_3_1" class="date">DD</label>
		</span>
		<span>
			<input id="element_3_2" name="element_3_2" class="element texta" size="2" maxlength="2" value="<?php echo $parts[1]?>" type="text"> /
			<label for="element_3_2" class="date">MM</label>
		</span>
		<span>
	 		<input id="element_3_3" name="element_3_3" class="element texta" size="4" maxlength="4" value="<?php echo $parts[2]?>" type="text">
			<label for="element_3_3" class="date">YYYY</label>
		</span>
	
		<span id="calendar_3">
			<img id="cal_img_3" class="datepicker" src="../includes/form_resource/calendar.gif" alt="Pick a date.">	
		</span>
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
        <?php $parts = explode(';',$array[3]);?>
			<input id="village" name="village" class="element texta" size="9"  value="<?php echo $parts[0]?>" type="text"> 
			<label for="village" class="date">Village</label>
		</span>
		<span>
			<input id="po" name="po" class="element texta" size="9"  value="<?php echo $parts[1]?>" type="text"> 
			<label for="po" class="date">P/O</label>
		</span>
		<span>
       
        
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
			<input id="phone" name="phone" class="element texta medium" type="text" maxlength="255" value="<?php echo $array[4]?>"/> 
		</div> 
		</li>	
        <li id="li_5" >
		<label class="description" for="element_4">Occupation </label>
		<div>
			<input id="occupation" name="occupation" class="element texta medium" type="text" maxlength="255" value="<?php echo $array[5]?>"/> 
		</div> 
		</li>		
        <li id="li_5" >
		<label class="description" for="element_4">Marital Status </label>
		<div>
			<select id="maritalStatus" name="maritalStatus" class="element medium">
		       
                <option   value="0">Select</option>
                <option value="Single" <?php if($array[6] == "Single" ){?>Selected<?php }?> >Single</option>
                    <option value="Married" <?php if($array[6] == "Married" ){?>Selected<?php }?> >Married</option>
                    <option value="Widowed" <?php if($array[6] == "Widowed" ){?>Selected<?php }?> >Widowed</option>
              
					
	
                    </select>
		</div> 
		</li>		
        <li id="li_5" >
		<label class="description" for="element_4">Religion </label>
			<div>
			<select id="religion" name="religion" class="element medium">
		       
               <option   value="0">Select</option>
                  
               <option value="Muslim" <?php if($array[7] == "Muslim" ){?>Selected<?php }?>>Muslim</option>
                    <option value="Hindu" <?php if($array[7] == "Hindu" ){?>Selected<?php }?> >Hindu</option>
                    <option value="Christian" <?php if($array[7] == "Christian" ){?>Selected<?php }?>>Christian</option>
                    <option value="Buddhist" <?php if($array[7] == "Buddhist" ){?>Selected<?php }?> >Buddhist</option>
                    <option value="Other" <?php if($array[7] == "Other" ){?>Selected<?php }?>>Other</option>
              
					
	
                    </select>
		</div> 
		</li>		
       	<li id="li_6" >
		<label class="description" for="element_5">National ID Card No </label>
		<div>
		  <input id="national_id" name="national_id" class="element texta medium" type="text" maxlength="255" value="<?php echo $array[8]?>"/>
		</div> 
		</li>	
        <li id="li_6" >
		<label class="description" for="element_5" style="width:80%">Reference ID (For Family Members) </label>
		<div>
		  <input id="ref_id" name="ref_id" class="element texta medium" type="text" maxlength="255" value="<?php if($array[11]!=0)echo ($array[11]+101000) ?>"/>
		</div> 
		</li>		
       
        
        
		  
			
			
					<li class="buttons">
			    <input type="hidden" name="form_id" value="595085" />
			    <input id="updateButton" class="link_button medium" type="button" name="btnSubmit" value="Update" />
				</li>
                	<li class="buttons">
		
				</li>
			</ul>
		</form>	
        </div>
		
	</div>
     
     
     <!-- Form 1 -->           
               
                
                	
			</div>
            
            <div class="w40 r_margin frame parallel_target" >
            <div align="center">
              <input type="image" width="300px" height="350px" src="<?php echo $base_url;?>uploads/<?php echo $array[10]?>"/>
              </div>
              <form id="form1" class="appnitro"  method="post" action="">
			<div class="form_description">
				<h2>Upload Photo</h2>
				<p>Upload photo for patient</p>
			</div>						
			<ul>
            
		
			<li id="li_3" >
            <label class="description" for="element_4">Select File  </label>
			<div>
				<input id="imageUpload" name="my_file[]" class="element text large" type="file" maxlength="255" value=""/> 
			</div> 
			</li>
		
	
		
			<li class="buttons">
					<input id="upload_photo" class="link_button medium" type="button"  value="Submit" />
			</li>
				</ul>
			</form>	
            		<div align="center" id="placeholder"  >
                    </div>
                    
                    <div class="form_description">
				<h2>Family Members</h2>
				
			</div>
            <div>
            <?php 
				    $this->db->select('patientID');
					$query = $this->db->get_where('patientx22', array('referenceID'=>($id-101000)));
					foreach ($query->result() as $row) { ?>	
					<a href="<?php echo $base_url;?>bmpt/show_patient_info?pid=<?php echo $row->patientID?>"><?php echo ($row->patientID + 101000)?>;</a>
					
					
				<?php }?>
            </div>	
                    
		</div>
        
        <div align="center" class="w40 r_margin frame parallel_target" >
         <form method="post" action="<?php echo $base_url;?>bmpt/show_exam">
         <ul>
         <li class="buttons">
         <input type="hidden" id="hpID" name="pID2" value="<?php echo ($id);?>"/>
        <input id="prevExam" style="width:70%" class="link_button medium" type="submit"  value="Show Previous Examination(s)" />
        </li>
        </form>
        </div>
     

			
			
		
				
		</div>

    

	<!-- Footer -->  
	<?php $this->load->view('includes/footer'); ?> 	
</div>

<!-- Scripts -->  
<?php $this->load->view('includes/scripts'); ?> 
<?php $this->load->view('includes/scripts_autocomplete'); ?>
<script type="text/javascript">
$(document).ready(function() {
var base_url = $('#base_url').val();

//upload patient photo
$('#upload_photo').click(function(){

       var patient_id=$('#pID').val(); 
	   var search_image=$('#imageUpload').attr('value') 
	   var leafname= search_image.split('\\').pop().split('/').pop();
	   var parts = leafname.split('.');
	   //alert(parts[0]);     
	  
		   if (search_image !=''){
       $.ajax({
            url: base_url+'bmpt/image_store',
            type: 'POST',
            data: "id="+patient_id+"&image="+parts[0]+"&image_ext="+parts[1] ,
            dataType: "html",
            success: function(msg) {                    
                //$('#result').html(msg);
				//$('#patient_id').val(msg);
				//alert(msg);
				
            }
			
       });        }  
	   else 
	   {
			alert(' Field(s) empty');
		}  
       event.preventDefault();             
       //return false;          
  });  
  
  
  
  //update patient info
  $('#updateButton').click(function(){
        //send ajax request
        
        $.ajax({
            url : base_url+'bmpt/update_patient',
            type : "POST",
            data : $('#wrap form').serialize(),
            success : function(msg){
                
                //$('span.success').text('Data Sent!').show();
				if(msg == 'Patient not created')
				alert(msg);
				else if (msg == '')
				{
					alert('Wrong Reference ID ');
				}
				else
				{
					alert('Patient Updated Successfully');
				
					
				}
					
				
				//$('#wrap').html(newContent);
                
            }
            
        })
		/*var day = $('#element_3_1').val();
		var male = $('input[name=element_7]:checked').val();
		 alert($('input[name=element_7]:checked').val());
     	$('span.displayData').html('<p>Day   : '+day+'  MOnth  : '+male+'</p>').show();*/
      return false;
    });
  
  $( "#ref_id" ).autocomplete({
			source: function(request, response) {
				$.ajax({
				url : base_url+'bmpt/suggestions_sid',
				data: { term: $("#ref_id").val()},
				dataType: "json",
				type: "POST",
				success: function(data){
					
					 
					response(data);
				}
			});
		},
		minLength: 2
		});
  

  
  
  });

</script>

</body>
</html>