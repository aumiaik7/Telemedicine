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
	
	$('#testSelect').change(function(){

	//alert($(this).find(':selected').attr('data-info'));
	var value =  $('#testSelect option:selected').text() ;
	var valueDB =  $('#testSelect option:selected').val() ;
	
	if( $('#prescription').val().indexOf(":Test(s):") >= 0)
	{
		if($('#testSelect option:selected').val() != ' ')
		$('#prescription').val($('#prescription').val() + '\u25A3 ' + value+'\n');
		
	}
	else
	{
		$('#prescription').val($('#prescription').val()+'::Test(s)::' +'\n'+ '25% Discount for Tests' + '\n'+'\u25A3 ' + value+'\n');
		
	}
	if( $('#prescriptionHolder').val().indexOf("&") >= 0)
	    {
			$('#prescriptionHolder').val($('#prescriptionHolder').val()+ valueDB +';');
		   
	    }
		else
		{
			 $('#prescriptionHolder').val($('#prescriptionHolder').val()+'&!'+ valueDB +';');
	    }
	
});

});
</script>

</head>

                 

<body >

 <?php
  $type= $_REQUEST['type'];
  
 ?>
<div align="center">
<label class="b" style="font-size:16px;font-weight:bold;color:#036">Test Name</label></div>
<input type="hidden" id="base_url" value="<?php echo $base_url;?>"/>
 <div class="styled-select">
  
  
   <select id="testSelect" name="testSelect" style="min-width:150px" >
    <option  value=" ">Select Test </option>
          <?php
		 
		 
		  $this->db->select('id,testName');
		  $query = $this->db->get_where('testy27', array('testType' => $type));
		  foreach($query->result() as $row){ 
		   $test['id'] =  $row->id;
		  $test['name'] =  $row->testName;
		  ?>
          <option value="<?php echo  $test['id'] ?>"><?php echo $test['name'];?> </option>
          <?php } ?>
          </select> <br/>
     </div>
<p></p>
</body>
</html>