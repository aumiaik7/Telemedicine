<!doctype html>
<!--[if lt IE 7 ]><html lang="en" class="no-js ie6"><![endif]-->
<!--[if IE 7 ]><html lang="en" class="no-js ie7"><![endif]-->
<!--[if IE 8 ]><html lang="en" class="no-js ie8"><![endif]-->
<!--[if IE 9 ]><html lang="en" class="no-js ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en" class="no-js"><!--<![endif]-->
<head>

       
</head>
<body >
<input type="hidden" id="base_url" value="<?php echo $base_url;?>"/>
<h1 class="b"><a>Untitled Form</a></h1>
        <div id ="docForm">	
		<form id="form_598641" class="appnitro"  method="post" action="">
					<div class="form_description">
			<h2>Add/Edit Center</h2>
			<p>Add/Edit Center Name</p>
		</div>						
			<ul >
             <li id="li_2" >
		<label class="description" for="element_2">Center List </label><div>
		 <select id="centerList" name="centerList" class="element medium">
		          <?php 
				  
				  				 
		  		  $query = $this->db->get('centerx25');
				  foreach($query->result() as $row){ 
				  $center['name'] =  $row->centerName;
				 
				  ?>
                  
                    <option value="<?php echo $center['name'] ?>" ><?php echo $center['name'] ?></option>
                  
	<?php }	?>
                    </select>		</div> 
		</li>
			
					<li id="li_1" >Add/Edit Center
					  <label class="description" for="element_1"></label>
		<div>
		  <input id="center_name" name="center_name" class="element texta medium" type="text" maxlength="255" value=""/>
		</div> 
		
		</li>
			
					<li class="buttons">
			    <input type="hidden" name="form_id" value="598641" />
			    <input id="addCenter" class="link_button medium" type="button" name="addCenter" value="Add Center" /> <br/>
				<input id="upCenter" class="link_button medium" type="button" name="upCenter" value="Update Center" /><br/>
                <input id="delCenter" class="link_button medium" type="button" name="delCenter" value="Delete Center" />
		</li>
			</ul>
		</form>	
        

<script type="text/javascript">
$(function() {
	
var base_url = $('#base_url').val();

// Add center
$('#addCenter').click(function(){
		
			 $.ajax({
				url : base_url+'auth_lite/add_center',
				type : "POST",
				data :  { centerName: $("#center_name").val()} ,
				success : function(msg){
					
					//$('span.success').text('Data Sent!').show();
					
					alert(msg);
					
		
					$('#form_container').load(base_url+'auth_lite/center_');
					$("#center_name").val('');
						
					
					//$('#wrap').html(newContent);
					
				}
				
			});
		
		
	});
	
	// Delete Center
	$('#delCenter').click(function(){
		
			 $.ajax({
				url : base_url+'auth_lite/del_center',
				type : "POST",
				data :  { centerName: $('#centerList option:selected').val()} ,
				success : function(msg){
					
					//$('span.success').text('Data Sent!').show();
					
					alert(msg);
					$('#form_container').load(base_url+'auth_lite/center_');
					$("#center_name").val('');
						
					
					//$('#wrap').html(newContent);
					
				}
				
			});
		
		
		
		
	});
	
	

	
	///Update Center Name
	$('#upCenter').click(function(){
		
		var center = $('#center_name').val();
			if( center != "")
			{
				
				
			 $.ajax({
				url : base_url+'auth_lite/up_center',
				type : "POST",
				data :  { centerName:$('#centerList option:selected').val(), upCenter:center} ,
				success : function(msg){
					
					//$('span.success').text('Data Sent!').show();
					
					alert(msg);
					$('#form_container').load(base_url+'auth_lite/center_');
					$("#center_name").val('');
					
						
					
					//$('#wrap').html(newContent);
					
				}
				
			});
			}
			else
				alert('Center Name EMPTY!!');
		
		
	});
	
		});
</script>


</body>
</html>