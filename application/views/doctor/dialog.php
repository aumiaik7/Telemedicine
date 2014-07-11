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

 <?php
  //$type= $_REQUEST['type'];
  
 ?>
<div class="dialogSelector" title="Add to prescription" align="left">


     <label class="b" style="font-size:16px;font-weight:bold;color:#036">Dose</label>


  
   <select id="doseSelectD" name="doseSelectD" style="width:80%" >
   <option  value="">Select Dose </option>
          <?php
		  $this->db->select('id,dose');
		  $query = $this->db->get('dosey24');
		  foreach($query->result() as $row){ 
		  $doc['doseid'] =  $row->id;
		  $doc['dose'] =  $row->dose;
		  
		  ?>
          <option  value="<?php echo  $doc['doseid'] ?>"><?php echo $doc['dose'];?></option>
          <?php } ?>
          </select>
          

<br/>
 <label class="b" style="font-size:16px;font-weight:bold;color:#036">Days</label>
 <input type="text" id="daysD" style="width:78%" /><br/>
 
  <label class="b" style="font-size:16px;font-weight:bold;color:#036">Application</label>

<br/>
  
   <select id="applicationSelectD" name="doseSelectD" style="width:95%" >
    <option  value="">Select Application </option>
          <?php
		  $query = $this->db->get('applicationy29');
		  foreach($query->result() as $row){ 
		  $doc['id'] =  $row->id;
		  $doc['application'] =  $row->application;
		  ?>
          <option value="<?php echo  $doc['id'] ?>"><?php echo $doc['application'];?> </option>
          <?php } ?>
          </select>
          

<br/>
 


     </div>
<p></p>
</body>
</html>