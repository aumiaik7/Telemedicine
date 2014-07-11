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
        <div id ="operatorForm">	
		<form id="form_598641" class="appnitro"  method="post" action="">
					<div class="form_description">
			<h2>Operator Info</h2>
			<p>You can see or update Operator Info here</p>
		</div>						
			<ul >
            <li>
            <label class="description" for="element_2">Operator List</label>
            <div>
            <select id="operatorList" style="width:80%" >
            <option value="0" >Select Operator</option>
		            <?php 
				 
				  $this->db->select('operatorID');
				  $this->db->select('operatorName');
				  $query = $this->db->get('operatory28');	
				  foreach($query->result() as $row){ 
				  $op['id'] =  $row->operatorID;
				  $op['name'] =  $row->operatorName;?>
				<option value="<?php echo   $op['id'] ?>" ><?php echo '[Operator ID : '.   $op['id']. '] [Name  : '.$op['name'].']';?></option>
	<?php 					 } ?>
                    </select>
                    </div>
            </li>
             <li id="li_2" >
		<label class="description" for="element_2">Operator ID </label><div>
		  <input id="op_id" name="op_id" class="element text medium" type="text" maxlength="255"  style=" font-weight:bold " readonly />
		</div> 
        <li>
        <label class="description" for="element_2">Assigned Doctor </label>
        <div>
        <select id="doctorList" name="doctorList" style="width:80%" >
         <option value="0" > Assign Doctor</option>
		            <?php 
				  $id = $patient_id - 101000;
				 
				  $this->db->select('docID, docName');
		  		  $query = $this->db->get('doctorx23');
				  foreach($query->result() as $row){ 
				  $doc['id'] =  $row->docID;
				  $doc['name'] =  $row->docName;
				  
				  ?>
                 <option value="<?php echo  $doc['id'] ?>" ><?php echo '[Doc ID : '.  ($doc['id']+100). '] [Name  : '.$doc['name'].']';?></option>
	<?php 				 } ?>
                    </select>
                    </div>
        </li>
		</li>
			
					<li id="li_1" >
		<label class="description" for="element_1">Operator Name </label>
		<div>
		  <input id="op_name" name="op_name" class="element texta medium" type="text" maxlength="255" />
		</div> 
        <li id="li_1" >
		<label class="description" for="element_1">Center Name </label>
		<div>
		  <input id="center_name" name="center_name" class="element texta medium" type="text" maxlength="255" />
		</div> 
        
		</li>	 <li id="li_3" >
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
	 		<input id="union" name="union" class="element texta" size="9"  value="" type="text" >
			<label for="union" class="date">Union</label>
		</span>
        <span>
	 		<input id="upazila" name="upazila" class="element texta" size="9"  value="" type="text" >
			<label for="upazila" class="date">Upazila</label>
		</span>
        <span>
	 		<input id="zila" name="zila" class="element texta" size="9"  value="" type="text" r>
			<label for="zila" class="date">Zila</label>
		</span>
	
		
        
		 </li>		
			
					<li class="buttons">
			    <input type="hidden" name="form_id" value="598641" />
			    
				<input id="submitOperator" class="link_button medium" type="button" name="submitDoc" value="Update" />
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
		$('#submitOperator').click(function(){
        //send ajax request
       // alert('AAA');
        $.ajax({
            url : base_url+'bmpt/sendToDbOperator',
            type : "POST",
            data : $('#operatorForm form').serialize(),
            success : function(msg){
                
                //$('span.success').text('Data Sent!').show();
				
				alert(msg);
			
					
				
				//$('#wrap').html(newContent);
                
            }
            
        })
		
      //return false;
    });
	$('#operatorList').change(function(){
        //send ajax request
       // alert('AAA');
	   if($('#operatorList option:selected').val() != 0)
	   {
	   
        $.ajax({
            url : base_url+'bmpt/get_operator',
            type : "POST",
            data : {opId:$('#operatorList option:selected').val()},
			dataType:"json",
            success : function(msg){
                
                //$('span.success').text('Data Sent!').show();
				if(msg == null)
				{
					alert("Problem Occured. Try again");
				}
				else
				{
					$('#op_id').val($('#operatorList option:selected').val());
					$('#op_name').val(msg['name']);
					$('#doctorList').val(msg['doc']);
					$('#center_name').val(msg['center']);
					
					if(msg['address'] != "")
					{
						var parts = msg['address'].split(';');
						$('#village').val(parts[0]);
						$('#po').val(parts[1]);
						$('#union').val(parts[2]);
						$('#upazila').val(parts[3]);
						$('#zila').val(parts[4]);
						
					}
					
				}
			
					
				
				//$('#wrap').html(newContent);
                
            }
            
        })
	   }
	   else
	   {
		   $('#op_id').val('');
		   $('#op_name').val('');
		   $('#doctorList').val(0);
		   $('#center_name').val('');
		   $('#village').val('');
		   $('#po').val('');
		   $('#union').val('');
		   $('#upazila').val('');
		   $('#zila').val('');
		   
		}
		
      //return false;
    });
	
	
		});
</script>


</body>
</html>