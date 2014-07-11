<!DOCTYPE html>
<html ><!--<![endif]-->
<head>
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
</style>

<?php $this->load->view('includes/head'); ?> 
<script type="text/javascript">
$(document).ready(function() {
	
	$('#adviceSelect').change(function(){

	//alert($(this).find(':selected').attr('data-info'));
	var value =  $('#adviceSelect option:selected').text() ;
	var valueDB =  $('#adviceSelect option:selected').val() ;
	
	if(valueDB == "")
	 value="";
	if( $('#prescription').val().indexOf("Advice:") >= 0)
	{
		if($('#adviceSelect option:selected').val() != '')
		$('#prescription').val($('#prescription').val() + '\u25A3 ' + value+'\n');
		
	}
	else
	{
		$('#prescription').val($('#prescription').val()+'Advice:' + '\n'+'\u25A3 ' + value+'\n');
		
	}
	if( $('#prescriptionHolder').val().indexOf("$") >= 0)
	    {
			$('#prescriptionHolder').val($('#prescriptionHolder').val()+ valueDB +';');
		   
	    }
		else
		{
			 $('#prescriptionHolder').val($('#prescriptionHolder').val()+'$~'+ valueDB +';');
	    }
	
	
});

});
</script>

</head>

                 

<body >

 <?php
 // $type= $_REQUEST['type'];
  
 ?>
<div align="center">
<label class="b" style="font-size:16px;font-weight:bold;color:#036">Advice</label></div>
<input type="hidden" id="base_url" value="<?php echo $base_url;?>"/>
 <div class="styled-select">
  
  
   <select id="adviceSelect" name="adviceSelect" style="min-width:150px" >
    <option  value="">Select and add to Prescription </option>
          <?php
		 
		 
		  $this->db->select('id,advice');
		  $query = $this->db->get('advicez25');
		  foreach($query->result() as $row){ 
		   $advice['id'] =  $row->id;
		  $advice['name'] =  $row->advice;
		  ?>
          <option  value="<?php echo  $advice['id'] ?>"><?php echo $advice['name'];?> </option>
          <?php } ?>
          </select> <br/>
     </div>
<p></p>
</body>
</html>