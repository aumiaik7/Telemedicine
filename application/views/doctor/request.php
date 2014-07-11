<!DOCTYPE html>
<html ><!--<![endif]-->
<head>
	<style type="text/css">
table.tftable {font-size:12px;color:#333333;width:100%;border-width: 1px;border-color: #729ea5;border-collapse: collapse;}
table.tftable th {font-size:12px;background-color:#acc8cc;border-width: 1px;padding: 2px;border-style: solid;border-color: #729ea5;text-align:center;}
table.tftable tr {background-color:#d4e3e5;}
table.tftable td {font-size:12px;border-width: 1px;padding: 2px;border-style: solid;border-color: #729ea5; text-align:center}
</style>

 <?php $this->load->view('includes/head'); 
 date_default_timezone_set('Asia/Dhaka');
 ?> 
 
     
</head>

                 

<body >

<input type="hidden" id="base_url" value="<?php echo $base_url;?>"/>

<div id="section_scroll" class="scroll-pane" >
<label class="b" style="font-size:16px;font-weight:bold;color:#036">New Patients</label>


<table  border="1" class="tftable" id="tfhover">
<tr ><th width="20%" >Patient ID</th><th width="25%" >Examination ID</th><th width="23%" >Center</th><th width="32%"></th> </tr>
<?php
	
	$u_id = $this->session->userdata('usr_id');
	$query = $this->db->get_where('doctorx23', array('userId' => $u_id));
	$doc_id = $query->row()->docID;
	$today = date("d/m/Y");
	$query = $this->db->get_where('examinationx24', array('docID' => $doc_id, 'pendingStatus' => 1 , 'date' => $today));
	
	foreach($query->result() as $row){
		$data['sid'] = ($row->searchID);
		$data['eid'] = $row->examinationID;
		$data['uid'] = $row->userID;
		$query1 = $this->db->get_where('operatory28', array('userID' => $data['uid']));
		if($query1->num_rows()>0)
		$data['center'] = $query1->row()->centerName;
		else
		$data['center'] = 'Admin';
 ?>
<tr class="test"><td  class="id"><?php echo $data['sid'];?></td><td class="eid"> <?php echo $data['eid']; ?> </td>
<td class="center"> <?php echo $data['center']; ?> </td>
<td> 
<input type="button" class="link_button " value="Accept Request"/>
</td> </tr>
<?php }?>
</table>



</div>

<hr/>

<div id="section_scroll" class="scroll-pane">
<label class="b" style="font-size:16px;font-weight:bold;color:#036">Old Patients</label>
<table width="65%" border="1" class="tftable" id="tfhover">
<tr ><th width="20%" >Patient ID</th><th width="25%" >Examination ID</th><th width="23%" >Center</th><th width="32%"></th> </tr>
<?php
	
	//$u_id = $this->session->userdata('usr_id');
	$query = $this->db->get_where('doctorx23', array('userId' => $u_id));
	$doc_id = $query->row()->docID;
	$today = date("d/m/Y");
	$query = $this->db->get_where('examinationx24', array('docID' => $doc_id, 'pendingStatus' => 2));
	
	foreach($query->result() as $row){
		$data['sid'] = ($row->searchID);
		$data['eid'] = $row->examinationID;
		$data['uid'] = $row->userID;
		$query1 = $this->db->get_where('operatory28', array('userID' => $data['uid']));
		if($query1->num_rows()>0)
		$data['center'] = $query1->row()->centerName;
		else
		$data['center'] = 'Admin';
 ?>
<tr class="test"><td  class="id"><?php echo $data['sid']; ?></td><td class="eid"> <?php echo $data['eid']; ?> </td>
<td class="center"> <?php echo $data['center']; ?> </td> <td> 
<input type="button" class="link_button " value="Accept Request"/>
</td> </tr>
<?php }?>
</table>
</div>

<hr/>

<div id="section_scroll" class="scroll-pane">
<label class="b" style="font-size:16px;font-weight:bold;color:#036">Today's checked Patients</label>

<table width="95%" border="1" class="tftable" id="tfhover">
<tr ><th width="20%" >Patient ID</th><th width="25%" >Examination ID</th><th width="23%" >Center</th><th width="32%"></th> </tr>
<?php
	
	//$u_id = $this->session->userdata('usr_id');
	$query = $this->db->get_where('doctorx23', array('userId' => $u_id));
	$doc_id = $query->row()->docID;
	$today = date("d/m/Y");
	$query = $this->db->get_where('examinationx24', array('docID' => $doc_id, 'pendingStatus' => 3 , 'date' => $today));
	
	foreach($query->result() as $row){
		$data['sid'] = ($row->searchID);
		$data['eid'] = $row->examinationID;
		$data['uid'] = $row->userID;
		$query1 = $this->db->get_where('operatory28', array('userID' => $data['uid']));
		if($query1->num_rows()>0)
		$data['center'] = $query1->row()->centerName;
		else
		$data['center'] = 'Admin';
 ?>
<tr class="test"><td  class="id"><?php echo $data['sid']; ?></td><td class="eid"> <?php echo $data['eid']; ?> </td>
<td class="center"> <?php echo $data['center']; ?> </td> <td> 
<input type="button" class="link_button " value="Show"/>
</td> </tr>
<?php }?>
</table>

</div>




<script type="text/javascript">
 $(document).ready(function() {
 $(".link_button").on('click', function() {
	
		var base_url = $('#base_url').val();
        var tr = $(this).closest('tr');
        var id = tr.find('.id').text();
        var exam_id = tr.find('.eid').text();
		var center = tr.find('.center').text();
		var data = { id:id, exam_id: exam_id }; 
		
		
		 $.ajax({
            url: base_url+'bmpt/get_diagnosis',
            type: 'POST',
            data: data ,
            dataType: "json",
            success: function(msg) {                    
                //$('#result').html(msg);
				//$('#patient_id').val(msg);
				//alert(msg['height']);
				
				if(msg != null)
				{
					
					//$('#pID').val('');
					$('#ptntID').text(id);
					$('#examID').text(exam_id);
					$('#centerName').text(center);
					$('#pName').text(msg['patient_name']);					
					$('#pSex').text(msg['patient_sex']);
					$('#pDob').text(msg['age']);
					$('#pPhone').text(msg['patient_phone']);
					$('#pOccupation').text(msg['patient_occupation']);
					$('#pMarital').text(msg['patient_marital']);
					$('#pReligion').text(msg['patient_religion']);
					$('#patient_height').val(msg['height']);
					$('#patient_weight').val(msg['weight']);
					$('#patient_temp').val(msg['temp']);
					$('#patient_pr').val(msg['pr']);
					$('#patient_bp').val(msg['bp']);
					$('#symptom').val(msg['symptom']);
					$('#primary').val(msg['primary']);
					$('#final').val(msg['final']);
					$('#showReport').show();
					$('#hptntID').val(id);
					$('#hexamID').val(exam_id);
					$('#prescription').val('');
					$('#prescriptionHolder').val('');
					
					
				}
				else
				{
					alert('Problem Occured Try again');
			
					
					
				}
				
            }
			
       }); 
		//$("#notice_div").html('id: '+id+', tester: ' + tester);
		//return FALSE;
		//event.preventDefault();  
    });
 });
 </script>


</body>
</html>

