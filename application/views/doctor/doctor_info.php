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
				<h1>Telemedicine Project</h1>
                <div align="right"> <label class="a"><?php echo $this->session->userdata('hello') .  $this->session->userdata('uname') . " !" ?></label>
                </div>			
				<p class="a">It is an initiative to provide quality health service to the rural areas of Bangladesh</p>
				<p></p>
			</div>		
		</div>
	</div>

	<!-- Main Content -->
	<div class="content_wrap main_content_bg" >
		<div class="content main_content_bg parallel clearfix">
			
			<div class="w76 frame parallel_target" >	
            
            <!-- Form Start --> 
            		
				<div id="form_container">
	
		<h1 class="b"><a>Untitled Form</a></h1>
        <div id ="doctorForm">	
		<form id="form_598641" class="appnitro"  method="post" action="">
					<div class="form_description">
			<h2>Doctor Info</h2>
			<p>You can see or update Doctor Info here</p>
		</div>						
			<ul >
            <li>
            <label class="description" for="element_2">Doctor List</label>
            <div>
            <select id="doctorList" style="width:80%" >
            <option value="0" >Select Doctor</option>
		            <?php 
				 
				  $this->db->select('docID');
				  $this->db->select('docName');
				  $query = $this->db->get('doctorx23');	
				  foreach($query->result() as $row){ 
				  $doc['id'] =  $row->docID;
				  $doc['name'] =  $row->docName;?>
				<option value="<?php echo   $doc['id'] ?>" ><?php echo '[Doctor ID : '.   ($doc['id'] + 100). '] [Name  : '.$doc['name'].']';?></option>
	<?php 					 } ?>
                    </select>
                    </div>
            </li>
             <li id="li_2" >
               <label class="description" for="element_2">Doctor ID </label><div>
		  <input id="doc_id" name="doc_id" class="element text medium" type="text" maxlength="255"  style=" font-weight:bold " readonly />
		</div> 
        <li>
        <label class="description" for="element_2">Assigned Operator(s) </label>
        <div>
        <textarea id="operatorList" class="medium" style="width:80%" readonly>
        </textarea>
                    </div>
        </li>
		</li>
			
					<li id="li_1" >
		<label class="description" for="element_1">Doctor Name </label>
		<div>
		  <input id="doc_name" name="doc_name" style="width:80%" class="element texta medium" type="text" maxlength="255" />
		</div> 
        <li id="li_2" >
		<label class="description" for="element_2">Designation </label>
		<div>
			<textarea id="designation" name="designation" class="element textarea medium" ></textarea> 
		</div> 
		</li>
        
		</li>		
			
					<li class="buttons">
			    <input type="hidden" name="form_id" value="598641" />
			    
				<input id="submitDoctor" class="link_button medium" type="button" name="submitDoc" value="Update" />
		</li>
			</ul>
		</form>	
		
	</div>
    </div>
    <!--Form End-->
    
			</div>

			
		</div>
	</div>

	<!-- Footer -->  
	<?php $this->load->view('includes/footer'); ?> 	
</div>

<!-- Scripts -->  
<?php $this->load->view('includes/scripts'); ?> 
 <script type="text/javascript">
		$(function() {
		var base_url = $('#base_url').val();
		$('#submitDoctor').click(function(){
        //send ajax request
       // alert('AAA');
        $.ajax({
            url : base_url+'bmpt/sendToDbDoc',
            type : "POST",
            data : $('#doctorForm form').serialize(),
            success : function(msg){
                
                //$('span.success').text('Data Sent!').show();
				
				alert(msg);
			
					
				
				//$('#wrap').html(newContent);
                
            }
            
        })
		
      //return false;
    });
	$('#doctorList').change(function(){
        //send ajax request
       // alert('AAA');
	   if($('#doctorList option:selected').val() != 0)
	   {
	   
        $.ajax({
            url : base_url+'bmpt/get_doctor',
            type : "POST",
            data : {docId:$('#doctorList option:selected').val()},
			dataType:"json",
            success : function(msg){
                
                //$('span.success').text('Data Sent!').show();
				if(msg == null)
				{
					alert("Problem Occured. Try again");
				}
				else
				{
					$('#doc_id').val(parseInt($('#doctorList option:selected').val()) + 100);
					$('#doc_name').val(msg['name']);
					$('#operatorList').val(msg['operator']);
					$('#designation').val(msg['designation']);
					
					
					
				}
			
					
				
				//$('#wrap').html(newContent);
                
            }
            
        })
	   }
	   else
	   {
		   $('#doc_id').val('');
		   $('#doc_name').val('');
		  $('#operatorList').val('');
		   $('#designation').val('');
		  
		   
		}
		
      //return false;
    });
	
	
		});
</script>


</body>
</html>