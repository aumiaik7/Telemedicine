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


</head>

                 

<body >
<div align="center">
<label class="b" style="font-size:16px;font-weight:bold;color:#036">Application</label>
</div>
<input type="hidden" id="base_url" value="<?php echo $base_url;?>"/>
  <div class="styled-select">
  
   <select id="applicationSelect" name="applicationSelect" style="min-width:150px" >
          <?php
		
		  $query = $this->db->get('applicationy29');
		  foreach($query->result() as $row){ 
		  $app['id'] =  $row->id;
		  $app['application'] =  $row->application;
		  ?>
          <option  value="<?php echo  $app['id'] ?>"><?php echo $app['application'];?> </option>
          <?php } ?>
          </select>
          

</div>
<p></p>



</body>
</html>