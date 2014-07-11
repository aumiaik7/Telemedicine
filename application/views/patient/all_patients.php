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
</head>

<body id="lite_library">

<div id="body_wrap">
	<!-- Header -->  
	<?php $this->load->view('includes/header_1'); ?> 

	<!-- Demo Navigation -->
	<?php $this->load->view('includes/menubar'); ?> 
	
	<!-- Intro Content -->
	<div class="content_wrap intro_bg">
		<div class="content clearfix"> 
			<div class="intro_text">
				<h1>List of  Patients</h1>
                <div align="right"> <label class="a"> <?php echo $this->session->userdata('hello') .  $this->session->userdata('uname') . " !" ?></label>
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
			<div class="w76 frame parallel_target" >				
				<h4>All registered patients are listed bellow (Click ID to View Details)</h4>
                <?php 
				if($results)
				{
				?>
                <table width="100%"  border="0">
                <th style="font-weight:bold">Patient ID</th>				
				<th style="font-weight:bold">Patient Name</th>
                <th style="font-weight:bold">Family Members</th>
				<?php
				
				foreach($results as $data) 
   				{?>
                <tr>
                <td>
                <a href="<?php echo $base_url;?>bmpt/show_patient_info?pid=<?php echo $data->searchID?>"><?php echo $data->searchID?></a>
                </td>
                <td>
				 <?php echo $data->patientName ?>
				</td>	
                <td>
                <?php 
				
				    $this->db->select('searchID');
		$query = $this->db->get_where('patientx22', array('referenceID'=> ($data->searchID)));
					if($query->num_rows()>0)
					{
					foreach ($query->result() as $row) { ?>	
	<a href="<?php echo $base_url;?>bmpt/show_patient_info?pid=<?php echo $row->searchID?>"><?php echo $row->searchID?>;</a>
					
					
				<?php }}?>
                </td>
                </tr>	
				<?php }?>
                </table>
                <?php } 
				
				else echo "No Patient is Registered by you yet";
				
				?>
			 <p><?php echo $links; ?></p>
				
		</div>
	</div>

	<!-- Footer -->  
	<?php $this->load->view('includes/footer'); ?> 	
</div>

<!-- Scripts -->  
<?php $this->load->view('includes/scripts'); ?> 

</body>
</html>