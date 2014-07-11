<!DOCTYPE html>

<?php
error_reporting(E_ALL ^ E_WARNING);
require_once "ajax.php";

$ajax = ajax();

$img =  md5(time(). rand(1,10000000));
$newdata = array(
                   'imageIdent'  => $img,
                 );
$this->session->set_userdata($newdata);

//button id, upload directory
$uploader = $ajax->uploader('upImage', 'upload_report',
	//settings are optional
	array(
		'url' => '../'.'ajax.php?upload_file/post', //post request after files are uploaded
		'suffix' => $img, // makes files names universally unique,
		'success_message' => 'File(s) @files successfully uploaded.', //@files tag is replaced by files uploaded.
		'ext' => array('jpg','gif', 'png','jpeg','xml'),
		'no_files' => 'Please select a file'
	)
);





?>
<head>


<?php echo $ajax->init($base_url);?>
 <?php $this->load->view('includes/head'); ?> 
     <?php $this->load->view('includes/form_patient'); ?> 
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
				<h1>Telemedicine Project <?php echo $this->session->flashdata('age').' '.$this->session->flashdata('exam_id') ?></h1>
                <div align="right"> <label class="a"> <?php echo $this->session->userdata('hello') .  $this->session->userdata('uname') . "!" ?></label>
                </div>			
				<p class="a">It is an initiative to provide quality health service to the rural areas of Bangladesh</p>
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
			<div class="w200 frame parallel_target" >				
<?php 
 		$search_id= $this->input->post('hptntID');
		$exam_id= $this->input->post('hexamID');
		$enabled = $this->input->post('henabled');
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
    <td>
    <label class="b"  for="element_2" style=" font-weight:bold font-size:18px">Patient ID   :</label><label class="c" id="ptntID" ><?php echo $search_id?></label></td>
        
    </td>
    <td>
    <label class="b"  for="element_2" style=" font-weight:bold font-size:18px">Examination ID   :</label><label class="c" id="examID" > <?php echo $exam_id?> </label>
    </td>
    <td colspan="3">
    </td>
    </tr>
   <?php 
   if($enabled == 1 || $this->flexi_auth->get_user_group() == 'Doctor')
   {
   ?>
  <tr>
 <td width="20%">
 
  
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
    <?php } ?>
     
     <?php 
	 $fields = $this->db->list_fields('reportz23');
 	 $arrlength= count($fields);
	 $j = 4;
	 $query = $this->db->get_where('reportz23', array('searchID' => $search_id,
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
      <?php 
   if($enabled == 1)
   {
   ?>
   <div align="center">
     <input class="link_button_b medium" type="button" id="submitReport" value="Submit Test Report"/>
     </div>
     <?php } ?>
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
      <?php 
   if($enabled == 1)
   {
   ?>
    <div>

<form id="form1" class="appnitro"  method="post" action="" style="width:40%">
			<div class="form_description">
				<h2>Upload Report(s)</h2>
				
			</div>						
			<ul>
			<li id="li_3" >
            <label class="description" for="element_4">Select File 1 </label>
			<div>
				<input id="report1" name="my_file[]" class="element text medium" type="file" maxlength="255" value=""/> 
			</div> 
			</li>
			<li id="li_4" >
			<label class="description" for="element_4">Select File 2 </label>
	
			<div>
				<input id="report2" name="my_file[]" class="element text medium" type="file" maxlength="255" value=""/> 
			</div> 
			</li>
			<li id="li_5" >
			<label class="description" for="element_4">Select File 3 </label>
	
			<div>
				<input id="report3" name="my_file[]" class="element text medium" type="file" maxlength="255" value=""/> 
			</div> 
			</li>
            <li id="li_6" >
			<label class="description" for="element_4">Select File 4 </label>
	
			<div>
				<input id="report4" name="my_file[]" class="element text medium" type="file" maxlength="255" value=""/> 
			</div> 
			</li>
            <li id="li_7" >
			<label class="description" for="element_4">Select File 5 </label>
	
			<div>
				<input id="report5" name="xfile" class="element text medium" type="file" maxlength="255" value=""/> 
			</div> 
			</li>
			<li class="buttons">
					<input id="upImage" class="link_button small" type="button"  value="Submit" />
			</li>
				</ul>
			</form>
			</div>
            <?php } ?>
		</div>
		</div>
	 


<?php $this->load->view('includes/scripts'); ?> 
<?php $this->load->view('includes/scripts_autocomplete'); ?>
<script src="<?php echo $includes_dir;?>js/report.js"></script>
<script src="<?php echo $includes_dir;?>js/multi_upload.js?v=1.0"></script>


</body>
</html>