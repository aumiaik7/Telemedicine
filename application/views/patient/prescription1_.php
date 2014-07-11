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
     <script type="text/javascript">

    function PrintElem(elem)
    {
        Popup($(elem).html());
    }

    function Popup(data) 
    {
        var mywindow = window.open('', 'my div');
        mywindow.document.write('<html><head>');
        /*optional stylesheet*/ //mywindow.document.write('<link rel="stylesheet" href="main.css" type="text/css" />');
        mywindow.document.write('</head><body >');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');

        mywindow.print();
        mywindow.close();

        return true;
    }

</script>
</head>

<?php

	$test = '-';
	$medicine = '-';
	$parts = array();
	$parts1 = array();
	
	
	if(strpos($prescription, '::Medicine::') !== false)
	{
		$parts = explode('::Medicine::', $prescription);
		 
		
		if(strpos($parts[1], '::Test(s)::') !== false)
		{
			$parts1 = explode('::Test(s)::', $parts[1]);
			$medicine = $parts1[0];
			$test = $parts1[1];
		}
		else if(strpos($parts[0], '::Test(s)::') !== false)
		{
			$parts1 = explode('::Test(s)::', $parts[0]);
			$medicine = $parts[1];
			$test = $parts1[1];	
		}
		else
		{
			$medicine = $parts[1];	
			$test = '-';
		}

	}
	else if(strpos($prescription, '::Test(s)::') !== false)
	{
		$parts = explode('::Test(s)::', $prescription);
		$test = $parts[1];
	}
	
	/*
	if(strpos($prescription, '::Test(s)::') !== false)
	{
		$parts = explode('::Test(s)::', $prescription);
		if($parts[0] == "")
		{
			if(strpos($parts[1], '::Medicine::') !== false)
			{
				$parts1 = explode('::Medicine::', $parts[1]);
				$test = $parts1[0];
				$medicine = $parts1[1];
			}
			else
			{
				$medicine = '-';
				$test = $parts[1];	
				
			}
		}
		else
		{
			$test = $parts[1];
			$parts1 = explode('::Medicine::', $parts[0]);
			$medicine = $parts1[1];
				
		}
		
	}
	
	
	else
	{
		if($prescription == NULL)
		{
			$test = '-';
			$medicine = '-';
		}
		else
		{
			$parts = explode(':Medicine:', $prescription);
			$medicine = $parts[1];
			$test = '-';	
		}
	}
	*/
?>


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
				<h1>Print Prescription</h1>
                <div align="right"> <label class="a"> <?php echo $this->session->userdata('hello') .  $this->session->userdata('uname') . " !" ?></label>
                </div>			
				<p class="a">Print the following prescription</p>
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
		<table class="no" style="width:100%; height:100%">
        <tr>
        <td style="width:45%">
				
					<div id="prescription" style="width:149mm; height:210mm; border:1px solid black">
                    <table class="no" style="width:100%" >
                    <tr>
                      <td height="95" colspan="2" >&nbsp;</td>
                    </tr>
                    <tr>
                    <td width="60%" style="vertical-align:text-top;border-bottom:1px solid black; ;  border-right: 1px solid black;"> <table class="no" style="width:100%">
                     <tr>
                     <td style="font-size:10px" >
                     <strong>Patient ID: </strong> <?php echo ($patient_id)?> &nbsp;&nbsp;
                     <strong>Examination ID: </strong> <?php echo $exam_id?>
                     </td>
                     </tr>
                      <tr>
                     <td height="52" style="font-size:11px;vertical-align:text-top"><strong>Name: </strong> <?php echo $patient_name?> &nbsp;&nbsp;&nbsp;&nbsp;
                     <strong>Sex: </strong> <?php echo $patient_sex?>&nbsp;&nbsp;&nbsp;&nbsp;
                     <strong>Age: </strong> <?php echo $patient_age?> <br/>
                     <strong>Mobile No: </strong> <?php echo $patient_phone?>&nbsp;&nbsp;&nbsp;&nbsp;
                     <strong>Date: </strong> <?php echo date("d-M-Y")?></td>
                     </tr>
                     
                     </table>
                    </td>
                   
                    <td  style="font-size:9px; vertical-align:text-top; border-bottom:1px solid black" height="91"  align="center">
                     <div align="right">
                <span style="font-size:11px">Prescription Given By: </span><br/>
                <span style="font-size:10px"><strong><?php echo $doc_name;?></strong></span><br/>
                     <textarea  name="textarea" rows="5" style=" margin-top:1px;border:none; overflow:hidden;text-align:right;width:100%; font-family:'Times New Roman', Times, serif;  font-size:8px" readonly><?php echo $doc_designation;?></textarea>
                     </div>
                    
                   
                    </td>
                     </tr>
                    
                                       
                    </table>
                    <table  class="no" style="width:100%;height:auto">
                    <tr>
                    <td width="40%" height="408" style="vertical-align:text-top" >
                    <span style="font-size:10px"><strong>Symptom:</strong></span>
                    <textarea name="textarea2" rows="12" readonly  style=" font-family:'Times New Roman', Times, serif; border: none;width:100%; margin-top:2px; font-size:10px"><?php echo $symptom?></textarea>
                    <span style="font-size:10px"><strong>Test(s):</strong></span>
                     <textarea rows="16" style=" font-family:'Times New Roman', Times, serif; border: none; width:100%; margin-top:2px; font-size:10px" readonly><?php echo $test?></textarea>
                    </td>
                    <td width="60%" style="vertical-align:text-top">
                    <p align="center" style="font-size:9px">এই প্রেসক্রিপশন রেজিস্টার্ড চিকিৎসক কর্তৃক টেলিমেডিসিন সফটওয়্যার ব্যবহার করে প্রদানকৃত। হাতে লেখা কোন ঔষধ/পরামর্শ গ্রহনযোগ্য নয়।</p>
                    <hr/>
                    <span style="font-size:20px">&#8478;</span>
                    <br/>
                      <textarea rows="20" cols="50"  style="font-family:'Times New Roman', Times, serif;  font-size:12px; font-weight:500;border:0px" readonly><?php echo $medicine?></textarea>
                      
                      
                      
                      </td>
                    </tr>
                    </table>
                   
                     
                    </div>
                    </td>
                    <td>
                    
                          <input type="button" class="link_button" value="Print Prescription" onclick="PrintElem('#prescription')" />
                          </td>
                    
				</tr>
               
              </table>
			
				
		
	</div>

	<!-- Footer -->  
	<?php $this->load->view('includes/footer'); ?> 	
</div>

<!-- Scripts -->  
<?php $this->load->view('includes/scripts'); ?> 

</body>
</html>