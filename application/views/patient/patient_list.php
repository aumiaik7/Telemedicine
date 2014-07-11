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
     <link rel="stylesheet" href="<?php echo $includes_dir;?>css/query-ui.css">
     
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
				<h1>Patient List</h1>
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
			<div class="w76 frame parallel_target">				
				<h2>Search Patient</h2>
                    <div class="frame_note">
                    <form method="post" action="<?php echo $base_url;?>bmpt/show_all_patients">
                    
                      <input id="showAll" class="link_button medium" type="submit" name="showAll" value="Show All Patients"  />
                    
                </form>
                </div>
                
                
                   <div class="frame_note">
                    <form method="get" action="<?php echo $base_url;?>bmpt/show_patient_info">
                <input style="width:29%" id="pid" name="pid" class="element texta medium" type="text" maxlength="255" value=""/>
			   <input id="searchByID" class="link_button medium" type="submit" name="searchByID" value="Search Patient By ID"  /><br/><em style="font-size:9px"> &nbsp;&nbsp;  Enter atleast first 2 characters to search Patient ID</em>
               </form>
				</div>
                
                
                
                
                <div class="frame_note">
                    <form method="get" action="<?php echo $base_url;?>bmpt/show_patient_info_mobile">
                <input style="width:29%" id="pMobile" name="pMobile" class="element texta medium" type="text" maxlength="255" value=""/>
			   <input id="searchByMobile" class="link_button medium" type="submit" name="searchByMobile" value="Search Patient By Mobile Phone No."  /><br/><em style="font-size:9px"> &nbsp;&nbsp;  Enter atleast first 6 digits to search Mobile No</em>
               </form>
               </form>
				</div>
                
               
            <div class="frame_note">
           
            <div>
             <form method="post" action="<?php echo $base_url;?>bmpt/show_all_patients_center">
               <select id="operatorList" name="operatorList" style="width:30%" >
                 <option value="0" >Select Operator</option>
                 <?php 
				 
				  $this->db->select('operatorID');
				  $this->db->select('operatorName');
				  $this->db->select('userID');
				  $query = $this->db->get('operatory28');	
				  foreach($query->result() as $row){ 
				  $op['id'] =  $row->operatorID;
				  $op['name'] =  $row->operatorName;
				  $op['uid'] =  $row->userID;?>
                 <option value="<?php echo  $op['uid'] ?>" ><?php echo '[Operator ID : '.   $op['id']. '] [Name  : '.$op['name'].']';?></option>
                 <?php 					 } ?>
               </select>
               <input id="searchByOP" class="link_button medium" type="submit" name="searchByCenter" value="Search Patient By Operator"  />
              </form>
              </div>
            </div>
            <div class="frame_note">
             <div>
               <form method="post" action="<?php echo $base_url;?>bmpt/show_all_patients_doctor">
            <select id="doctorList" name="doctorList" style="width:30%" >
            <option value="0" >Select Doctor</option>
		            <?php 
				 
				 
				  $query = $this->db->get('doctorx23');	
				  foreach($query->result() as $row){ 
				  $doc['id'] =  $row->docID;
				  $doc['name'] =  $row->docName;
				  $doc['uid'] =  $row->userId;?>
				<option value="<?php echo    $doc['uid'] ?>" ><?php echo '[Doctor ID : '.   ($doc['id'] + 100). '] [Name  : '.$doc['name'].']';?></option>
	<?php 					 } ?>
                    </select>
                    
                   <input id="searchByDOC" class="link_button medium" type="submit" name="searchByCenter" value="Search Patient By Doctor"  />
                    </form>
                    </div>
            
            </div>
            
				</div>
			
				
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
 
 	$( "#pid" ).autocomplete({
			source: function(request, response) {
				$.ajax({
				url : base_url+'bmpt/suggestions_sid',
				data: { term: $("#pid").val()},
				dataType: "json",
				type: "POST",
				success: function(data){
					
					 
					response(data);
				}
			});
		},
		minLength: 2
		});
		
		
		$("#pMobile").autocomplete({
			source: function(request, response) {
				$.ajax({
				url : base_url+'bmpt/suggestions_mobile',
				data: { term: $("#pMobile").val()},
				dataType: "json",
				type: "POST",
				success: function(data){
					
					 
					response(data);
				}
			});
		},
		minLength: 5
		});
		
		
	
});
 </script>



</body>
</html>