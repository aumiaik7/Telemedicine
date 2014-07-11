<!DOCTYPE html>
<html ><!--<![endif]-->
<head>



<?php $this->load->view('includes/head'); ?> 
 <link rel="stylesheet" href="<?php echo $includes_dir;?>css/query-ui.css">


</head>

                 

<body >
<input type="hidden" id="base_url" value="<?php echo $base_url;?>"/>
<?php 
 		$patient_id= $_REQUEST['pid'];
		$patient_id = $patient_id - 101000;
		$exam_id= $_REQUEST['eid'];
 ?>

  <table>
  <tr>
    <td colspan="5">
    <div align="center" style="background:#CCF" >
     <label class="b" style="font-size:20px;font-weight:bold;color:#036">Test Report Panel</label>
    </div>
    </td>
    </tr>
  <tr>
 <td width="20%">
 <?php 
 
 /*for($x=0;$x<$arrlength;$x++)
  {
  echo $fields[$x];
  echo "<br>";
  }*/
  ?>
  
  <div align="center">
     <input class="link_button_b medium" type="button" id="edit" value="Edit"/>
     </div>
 
    </td>
    
    <td width="20%">
     
     <div id="fieldDiv" align="center" style="display:none; border-radius:5px;  background-color:#99C ">
     <p>&nbsp;</p>
    <input type="text" id="fieldName"/><br/>
    <input class="link_button_b medium" type="button" id="addFieldToDb" value="Create Field" />
    
    </div>
    </td>
    
     <td width="20%">
        <div id="fieldDivDel" align="center" style="display:none; border-radius:5px;  background-color:#99C " >
         <p>&nbsp;</p>
    <input type="text" id="delField"/><br/>
    <input class="link_button_b medium" type="button" id="delFieldfromDb" value="Delete Field" />
    
    </div>
   
    
    </td>
    
    <td width="20%">
 
    </td>
    
    <td width="20%">
    
    </td>
    
    
    </tr>
     
     <?php 
	 $fields = $this->db->list_fields('reportz23');
 	 $arrlength= count($fields);
	 $j = 4;
	 $query = $this->db->get_where('reportz23', array('patientID' => $patient_id,
	 'examinationID' => $exam_id));
	 while(true)
	 {
		
		
			
			 ?>
         
    <tr>
    <?php
	if($j < $arrlength)
	{
	?>
 	<td width="20%">
    
  		<div id="fieldDiv" align="center">
       
        <input type="hidden" id="fieldCount" value="<?php echo $arrlength?>"/>
        <label id="reportName_<?php echo $j;?>" class="b" style="font-size:16px;font-weight:bold;color:#036" ><?php echo  $fields[$j]?></label><br/>
    	<input type="text" id="fieldName_<?php echo $j;?>" value="<?php echo $query->row()->$fields[$j]?>"/><br/>
   		
    
    </div>
     </td>
     <?php
	 $j++;
	}
	else
		break;
	?>
   
    
    <?php
	if($j < $arrlength)
	{
	?>
 	<td width="20%">
  		<div id="fieldDiv" align="center">
        <label id="reportName_<?php echo $j;?>" class="b" style="font-size:16px;font-weight:bold;color:#036"><?php echo  $fields[$j]?></label><br/>
    	<input class="report" type="text" id="fieldName_<?php echo $j;?>" value="<?php echo $query->row()->$fields[$j]?>"/><br/>
   		
    
    </div>
     </td>
     <?php
	 $j++;
	}
	else
		break;
	?>
    
      <?php
	if($j < $arrlength)
	{
	?>
 	<td width="20%">
  		<div id="fieldDiv" align="center">
        <label id="reportName_<?php echo $j;?>" class="b" style="font-size:16px;font-weight:bold;color:#036"><?php echo  $fields[$j]?></label><br/>
    	<input class="report" type="text" id="fieldName_<?php echo $j;?>" value="<?php echo $query->row()->$fields[$j]?>"/><br/>
   		
    
    </div>
     </td>
     <?php
	 $j++;
	}
	else
		break;
	?>
    
     <?php
	if($j < $arrlength)
	{
	?>
 	<td width="20%">
  		<div id="fieldDiv" align="center">
        <label id="reportName_<?php echo $j;?>" class="b" style="font-size:16px;font-weight:bold;color:#036"><?php echo  $fields[$j]?></label><br/>
    	<input class="report" type="text" id="fieldName_<?php echo $j;?>" value="<?php echo $query->row()->$fields[$j]?>"/><br/>
   		
    
    </div>
     </td>
     <?php
	 $j++;
	}
	else
		break;
	?>
    
    <?php
	if($j < $arrlength)
	{
	?>
 	<td width="20%">
  		<div id="fieldDiv" align="center">
        <label id="reportName_<?php echo $j;?>" class="b" style="font-size:16px;font-weight:bold;color:#036"><?php echo  $fields[$j]?></label><br/>
    	<input class="report" type="text" id="fieldName_<?php echo $j;?>" value="<?php echo $query->row()->$fields[$j]?>"/><br/>
   		
    
    </div>
     </td>
     <?php
	 $j++;
	}
	else
		break;
	?>
    
    
     </tr>   
	
			 <?php 
	 }
	 ?>
     
     <tr>
    <td colspan="5">
    
   <div align="center">
     <input class="link_button_b medium" type="button" id="submitReport" value="Submit Report"/>
     </div>
     <p></p>
     <div align="left">
     
     <?php
	 $data['report'] = $query->row()->reportUrl;
	 if($data['report'] != NULL)
	 {
		?>
        <label class="b" style="font-size:16px;font-weight:bold;color:#036">Uploaded Report(s)</label>
        <?php
		 $reportList =  explode(';', $data['report']);
		
	 ?>
     <ul>
     <?php for($i = 0; $i < (sizeof($reportList)-1); $i++)
	 {?>
     <li>
     <a href="<?php echo $base_url;?>upload_report/<?php echo  $reportList[$i];?>" target="_blank">Report <?php echo ($i+1)?></a>
     </li>
     <?php }?>
     </ul>
          <?php }?>
     </div>
    </td>
    </tr>
   
     </table>
    
<?php $this->load->view('includes/scripts'); ?> 
<?php $this->load->view('includes/scripts_autocomplete'); ?>
<script src="<?php echo $includes_dir;?>js/report.js"></script>


</body>
</html>