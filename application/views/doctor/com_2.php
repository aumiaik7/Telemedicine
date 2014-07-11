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


    
   
   




#list4 { width:100%; }
#list4 ul { list-style: none; }
#list4 ul li {padding:0px 0; }
#list4 ul li a { display:block; text-decoration:none; color:#000000; background-color:#FFFFFF; line-height:30px;
  border-bottom-style:solid; border-bottom-width:1px; border-bottom-color:#CCCCCC; padding-left:10px; cursor:pointer; }
#list4 ul li a:hover { color:#FFFFFF; background:#6CF; background-repeat:repeat-x; }
#list4 ul li a strong { margin-right:10px; }


</style>

<?php $this->load->view('includes/head'); ?> 

<script type="text/javascript">
$(function() {
	
	

var base_url = $('#base_url').val();
 //$( document ).tooltip();

 
  $('#loaded').fadeIn("slow").delay(2000).fadeOut("slow")
 

$("#medicineList1 li").not('.emptyMessage').click(function() {
		//alert($('a', this).text());
		//alert($('a', this).val());
		//alert($('a', this).attr('data-info'));
		if($('a', this).attr('data-info') != 0)
		{
			/*if( $('#prescription').val().indexOf(":Medicine:") >= 0)
			{
				$('#prescription').val($('#prescription').val() + '\u25A3 ' + $('a', this).text());
			   
			}
			else
			{
				 $('#prescription').val($('#prescription').val()+'::Medicine::' +'\n'+ '\u25A3 ' + $('a', this).text());
			}
			
			if( $('#prescriptionHolder').val().indexOf("#") >= 0)
			{
				$('#prescriptionHolder').val($('#prescriptionHolder').val()+ $('#comID1').val()+':'+ $('a', this).attr('data-info')+':');
			   
			}
			else
			{
				 $('#prescriptionHolder').val($('#prescriptionHolder').val()+'#^'+ $('#comID1').val()+':'+ $('a', this).attr('data-info')+':');
			}
			*/
			$('#medicineNameStore').val($('a', this).text());
			$('#medicineIdStore').val($('#comID1').val()+':'+ $('a', this).attr('data-info')+':');
			
			//$(this).before( $('#123').fadeIn("slow").delay(2000).fadeOut("slow"));
			 //$( "#dialog-form" ).dialog( "open" );
			/* $.post(base_url+"bmpt/show_dialog", function(data){
				$('#dialog-confirm').html(data);
				$('#dialog-confirm').dialog('open');
		   }, "html");*/
		   $('#dialog-confirm').dialog('open');
		}
		else 
			alert('Select a Medicine!');
		
			 
		 
		 return false;
		 });
		 
$("#medicineList2 li").not('.emptyMessage').click(function() {
		//alert($('a', this).text());
		//alert($('a', this).attr('data-info'));
		if($('a', this).attr('data-info') != 0)
		{
			/*if( $('#prescription').val().indexOf(":Medicine:") >= 0)
			{
				$('#prescription').val($('#prescription').val() + '\u25A3 ' + $('a', this).text());
			   
			}
			else
			{
				 $('#prescription').val($('#prescription').val()+'::Medicine::' +'\n'+ '\u25A3 ' + $('a', this).text());
			}
		    
			if( $('#prescriptionHolder').val().indexOf("#") >= 0)
			{
				$('#prescriptionHolder').val($('#prescriptionHolder').val()+ $('#comID2').val()+':'+ $('a', this).attr('data-info')+':');
			   
			}
			else
			{
				 $('#prescriptionHolder').val($('#prescriptionHolder').val()+'#^'+ $('#comID2').val()+':'+ $('a', this).attr('data-info')+':');
			}*/
			
			 //$(this).before( $('#123').fadeIn("slow").delay(2000).fadeOut("slow"));
			 //$( "#dialog-confirm" ).dialog( "open" );
			 //$( ".selector" ).dialog( "open" );
			/* $.post(base_url+"bmpt/show_dialog", function(data){
				$('#dialog-confirm').html(data);
				$('#dialog-confirm').dialog('open');
		   }, "html");*/
		  $('#medicineNameStore').val($('a', this).text());
			$('#medicineIdStore').val($('#comID2').val()+':'+ $('a', this).attr('data-info')+':');
		   $('#dialog-confirm').dialog('open');
		}
		else 
			alert('Select a Medicine!');
		 
		 return false;
		 });
 $("#medicineList3 li").not('.emptyMessage').click(function() {
		//alert($('a', this).text());
		//alert($('a', this).attr('data-info'));
		if($('a', this).attr('data-info') != 0)
		{
			/*if( $('#prescription').val().indexOf(":Medicine:") >= 0)
			{
				$('#prescription').val($('#prescription').val() + '\u25A3 ' + $('a', this).text());
			   
			}
			else
			{
				 $('#prescription').val($('#prescription').val()+'::Medicine::' +'\n'+ '\u25A3 ' + $('a', this).text());
			}
			if( $('#prescriptionHolder').val().indexOf("#") >= 0)
			{
				$('#prescriptionHolder').val($('#prescriptionHolder').val()+ $('#comID3').val()+':'+ $('a', this).attr('data-info')+':');
			   
			}
			else
			{
				 $('#prescriptionHolder').val($('#prescriptionHolder').val()+'#^'+ $('#comID3').val()+':'+ $('a', this).attr('data-info')+':');
			}
			*/
			
			// $(this).before( $('#123').fadeIn("slow").delay(2000).fadeOut("slow"));
			  //$( "#dialog-form" ).dialog( "open" );
			  //( ".selector" ).dialog( "open" );
			/* $.post(base_url+"bmpt/show_dialog", function(data){
				$('#dialog-confirm').html(data);
				$('#dialog-confirm').dialog('open');
		   }, "html");*/
		  $('#medicineNameStore').val($('a', this).text());
		  $('#medicineIdStore').val($('#comID3').val()+':'+ $('a', this).attr('data-info')+':');
		   $('#dialog-confirm').dialog('open');
		}
		else 
			alert('Select a Medicine!');
		 return false;
 });
 
 $("#medicineList4 li").not('.emptyMessage').click(function() {
		//alert($('a', this).text());
		//alert($('a', this).attr('data-info'));
		if($('a', this).attr('data-info') != 0)
		{
			/*if( $('#prescription').val().indexOf(":Medicine:") >= 0)
			{
				$('#prescription').val($('#prescription').val() + '\u25A3 ' + $('a', this).text());
			   
			}
			else
			{
				 $('#prescription').val($('#prescription').val()+'::Medicine::' +'\n'+ '\u25A3 ' + $('a', this).text());
			}
			if( $('#prescriptionHolder').val().indexOf("#") >= 0)
			{
				$('#prescriptionHolder').val($('#prescriptionHolder').val()+ $('#comID4').val()+':'+ $('a', this).attr('data-info')+':');
			   
			}
			else
			{
				 $('#prescriptionHolder').val($('#prescriptionHolder').val()+'#^'+ $('#comID4').val()+':'+ $('a', this).attr('data-info')+':');
			}*/
			 //$(this).before( $('#123').fadeIn("slow").delay(2000).fadeOut("slow"));
			 // $( "#dialog-form" ).dialog( "open" );
			 //( ".selector" ).dialog( "open" );
			/* $.post(base_url+"bmpt/show_dialog", function(data){
				$('#dialog-confirm').html(data);
				$('#dialog-confirm').dialog('open');
		   }, "html");*/
		  $('#medicineNameStore').val($('a', this).text());
			$('#medicineIdStore').val($('#comID4').val()+':'+ $('a', this).attr('data-info')+':');
		   $('#dialog-confirm').dialog('open');
		}
		else 
			alert('Select a Medicine!');
		 return false;
 });
 $("#medicineList5 li").not('.emptyMessage').click(function() {
		//alert($('a', this).text());
		//alert($('a', this).attr('data-info'));
		if($('a', this).attr('data-info') != 0)
		{
			/*if( $('#prescription').val().indexOf(":Medicine:") >= 0)
			{
				$('#prescription').val($('#prescription').val() + '\u25A3 ' + $('a', this).text());
			   
			}
			else
			{
				 $('#prescription').val($('#prescription').val()+'::Medicine::' +'\n'+ '\u25A3 ' + $('a', this).text());
			}
			
			if( $('#prescriptionHolder').val().indexOf("#") >= 0)
			{
				$('#prescriptionHolder').val($('#prescriptionHolder').val()+ $('#comID5').val()+':'+ $('a', this).attr('data-info')+':');
			   
			}
			else
			{
				 $('#prescriptionHolder').val($('#prescriptionHolder').val()+'#^'+ $('#comID5').val()+':'+ $('a', this).attr('data-info')+':');
			}*/
			 //$(this).before( $('#123').fadeIn("slow").delay(2000).fadeOut("slow"));
			 // $( "#dialog-form" ).dialog( "open" );
			 //( ".selector" ).dialog( "open" );
			 /* $.post(base_url+"bmpt/show_dialog", function(data){
				$('#dialog-confirm').html(data);
				$('#dialog-confirm').dialog('open');
		   }, "html");*/
		   $('#medicineNameStore').val($('a', this).text());
			$('#medicineIdStore').val($('#comID5').val()+':'+ $('a', this).attr('data-info')+':');
		   $('#dialog-confirm').dialog('open');
		}
		else 
			alert('Select a Medicine!');
		 return false;
 });
 
 
 $("#medicineList6 li").not('.emptyMessage').click(function() {
		//alert($('a', this).text());
		//alert($('a', this).attr('data-info'));
		if($('a', this).attr('data-info') != 0)
		{
			/*if( $('#prescription').val().indexOf(":Medicine:") >= 0)
			{
				$('#prescription').val($('#prescription').val() + '\u25A3 ' + $('a', this).text());
			   
			}
			else
			{
				 $('#prescription').val($('#prescription').val()+'::Medicine::' +'\n'+ '\u25A3 ' + $('a', this).text());
			}
			
			if( $('#prescriptionHolder').val().indexOf("#") >= 0)
			{
				$('#prescriptionHolder').val($('#prescriptionHolder').val()+ $('#comID6').val()+':'+ $('a', this).attr('data-info')+':');
			   
			}
			else
			{
				 $('#prescriptionHolder').val($('#prescriptionHolder').val()+'#^'+ $('#comID6').val()+':'+ $('a', this).attr('data-info')+':');
			}*/
			 //$(this).before( $('#123').fadeIn("slow").delay(2000).fadeOut("slow"));
			 // $( "#dialog-form" ).dialog( "open" );
			 //( ".selector" ).dialog( "open" );
			/* $.post(base_url+"bmpt/show_dialog", function(data){
				$('#dialog-confirm').html(data);
				$('#dialog-confirm').dialog('open');
		   }, "html");*/
		  $('#medicineNameStore').val($('a', this).text());
		  $('#medicineIdStore').val($('#comID6').val()+':'+ $('a', this).attr('data-info')+':');
		   $('#dialog-confirm').dialog('open');
		}
		else 
			alert('Select a Medicine!');
		 return false;
 });

$("#searchByGen").keyup(function(event){
    		if(event.keyCode == 13){
    	  		  $("#searchMedButton").click();
   			 }
		});
//add med to prescription on select med
$('#medicineList').change(function(){
       var value =  $('#medicineList option:selected').val() ;
	/* if( $('#prescription').val().indexOf(":Medicine:") >= 0)
	    {
			$('#prescription').val($('#prescription').val() + '\u25A3 ' + $('#medicineList :selected').text());
		   
	    }
		else
		{
			 $('#prescription').val($('#prescription').val()+'::Medicine::' +'\n'+ '\u25A3 ' + $('#medicineList :selected').text());
	    }
		
		if( $('#prescriptionHolder').val().indexOf("#") >= 0)
	    {
			$('#prescriptionHolder').val($('#prescriptionHolder').val()+ $('#comSelect :selected').attr('data-info')+':'+ $('#medicineList :selected').val()+':');
		   
	    }
		else
		{
			 $('#prescriptionHolder').val($('#prescriptionHolder').val()+'#^'+ $('#comSelect :selected').attr('data-info')+':'+ $('#medicineList :selected').val()+':');
	    }
					$('#com6Con').fadeIn("slow").delay(2000).fadeOut("slow");
					*/
					
					
		$('#medicineNameStore').val($('#medicineList :selected').text());
		$('#medicineIdStore').val($('#comSelect :selected').attr('data-info')+':'+ $('#medicineList :selected').val()+':');			
		
					
		var com = $('#comSelect option:selected').val() ;	
		var company = $('#comSelect option:selected').val();
		var medname =  $('#medicineList option:selected').text() ;
		//alert(company);	
					
		$.ajax({
				url : base_url+'bmpt/get_generic',
				type : "POST",
				data :  { medicineName:medname, company:company} ,
				dataType: "json",
				success : function(msg){
					
					
					$('#showGen').text('Generic: '+msg['generic']);
					$('#showGen').fadeIn("slow").delay(8000).fadeOut("slow");
					
					/* $.post(base_url+"bmpt/show_dialog", function(data){
				$('#dialog-confirm').html(data);
				$('#dialog-confirm').dialog('open');
		   }, "html");*/
		   $('#dialog-confirm').dialog('open');
					
					
					
					//$('span.success').text('Data Sent!').show();
					
					//alert(msg);
					
		
					//$('#dose').load(base_url+'bmpt/show_dose');
						
					
					//$('#wrap').html(newContent);
					
				}
				
			});				
					
	
       //alert( $(this).attr('prefix') );
});
$( "#dialog-confirm" ).dialog({
	  autoOpen:false,   
      height: 255,
      width: 400,
      modal: true,
      buttons: {
        "Add to Prescription": function() {
        var dose =  $('#doseSelectD option:selected').text();
		var doseDB = $('#doseSelectD option:selected').val();
		
		var day_s = "";
	//$('#prescription').val($('#prescription').val() +' '+' '+' '+' '+' '+' '+' '+ dose);
		 var day = $('#daysD').val();
		 if(day != "")
		{
			if(day > 1)
				day_s = 'days';
			else
				day_s = 'day';
				
			//$('#prescription').val($('#prescription').val() +' '+' '+' '+' '+' '+' '+ day+ ' '+ day_s);
		}
		else
		{
				day = ""; 
		}
		
		if(doseDB == "")
		{
			dose="";
		}
		var app =  $('#applicationSelectD option:selected').text();
		var appDB =  $('#applicationSelectD option:selected').val();
		
		if( $('#prescription').val().indexOf(":Medicine:") >= 0)
			{
				$('#prescription').val($('#prescription').val() + '\u25A3 ' +$('#medicineNameStore').val());
			   
			}
			else
			{
				 $('#prescription').val($('#prescription').val()+'::Medicine::' +'\n'+ '\u25A3 ' + $('#medicineNameStore').val());
			}
			
			if( $('#prescriptionHolder').val().indexOf("#") >= 0)
			{
				$('#prescriptionHolder').val($('#prescriptionHolder').val()+ $('#medicineIdStore').val());
			   
			}
			else
			{
				 $('#prescriptionHolder').val($('#prescriptionHolder').val()+'#^'+ $('#medicineIdStore').val());
			}
		
		
		
		if(appDB == "")
			app = "";
		$('#prescription').val($('#prescription').val() +' '+' '+' '+' '+' '+' '+ day+ ' '+ day_s+'\n'+dose+' '+ ' '+' '+' '+ app+'\n');
		$('#prescriptionHolder').val($('#prescriptionHolder').val() + day + 'd;'+doseDB+':'+ appDB+';');
		
	//$('#prescription').val($('#prescription').val() +'\n '+' '+' '+' '+ app); 
		$('#daysD').val('');
		$( this ).dialog( "close" );
        },
        Cancel: function() {
			//$('#prescription').val($('#prescription').val() + '\n');
			//$('#prescriptionHolder').val($('#prescriptionHolder').val() + '' + ';'+''+':'+ ''+';');
          $( this ).dialog( "close" );
        }
      },
      close: function() {
        allFields.val( "" ).removeClass( "ui-state-error" );
	
      }
    });

/*$('#click').click(function(){
	 $( "#dialog-form" ).dialog( "open" );
});*/

$('#searchMedButton').click(function(){
	
	var company = $('#comSelect option:selected').prop('value');
	var generic = $("#searchByGen").val();
		//alert(company);
	if(generic != "" )
			{
			 $.ajax({
				url : base_url+'bmpt/serach_med_by_gen',
				type : "POST",
				data :  { company: company, generic:generic} ,
				dataType:"json",
				success : function(msg){
									
					//$('span.success').text('Data Sent!').show();
					if(msg != null)
					{
						$('#medicineList').children().remove().end();
						$('#medicineList').append($('<option>', { value : '' }).text('Select Medicine'));
						$.each(msg, function(key, value) {  
						
						$('#medicineList').append($('<option>', { value : value[1] }).text(value[0]))});
					}
					else
					{
						$('#medicineList').children().remove().end();
						$('#medicineList').append($('<option>', { value : '' }).text('No medicine Found'));	
					}
					//alert(msg);
					
					
					
		
					//$('#dose').load(base_url+'bmpt/show_dose');
						
					
					//$('#wrap').html(newContent);
					
					
				}
				
			});
			}
			else
				alert('Generic Name empty!!');
		
		
});
		

//autocomplete for aci Medicine
		$( "#com1" ).autocomplete({
			
			
			source: function(request, response) {
				var company = $('#comSelect_ option:selected').prop('value');
				/*var company='';
				if(idx == 0)
					company = 'aci';
				else if(idx == 1)
					company = 'beximco';
				else if(idx == 2)
					company = 'square';
				else if(idx == 3)
					company = 'drugint';
				else if(idx == 4)
					company = 'incepta';*/
				
				
				$.ajax({
				url : base_url+'bmpt/suggestions_com',
				data: { term: $("#com1").val(),company:company},
				dataType: "json",
				type: "POST",
				success: function(data){
					
					 
					response(data);
				}
			});
		},
		minLength: 2,
		select: function(event, ui) {
            var company = $('#comSelect_ option:selected').prop('value');
				
             
			 this.value = ui.item.value;
             var value = ui.item.value;
          
		  	
            
                //event.preventDefault();
               // this.value = this.value + " abcd ";
				//$('#comName1').val(value);
				$.ajax({
				url : base_url+'bmpt/get_generic',
				type : "POST",
				data :  { medicineName:value, company:company} ,
				dataType: "json",
				success : function(msg){
					
					$('#com1Text').val(msg['generic']);
					/*if( $('#prescription').val().indexOf(":Medicine:") >= 0)
					{
						$('#prescription').val($('#prescription').val() + '\u25A3 ' +value);
					   
					}
					else
					{
						 $('#prescription').val($('#prescription').val()+'::Medicine::' +'\n'+ '\u25A3 ' + value);
					}
					
					if( $('#prescriptionHolder').val().indexOf("#") >= 0)
					{
						$('#prescriptionHolder').val($('#prescriptionHolder').val()+ $('#comSelect_ :selected').attr('data-info')+':'+ msg['id']+':');
					   
					}
					else
					{
						 $('#prescriptionHolder').val($('#prescriptionHolder').val()+'#^'+ $('#comSelect_ :selected').attr('data-info')+':'+ msg['id']+':');
					}
					$('#com1Con').fadeIn("slow").delay(2000).fadeOut("slow");
					*/
					
					/* $.post(base_url+"bmpt/show_dialog", function(data){
				$('#dialog-confirm').html(data);
				$('#dialog-confirm').dialog('open');                                                                                                                                                                           
		   }, "html");*/
		   $('#medicineNameStore').val(value);
		   $('#medicineIdStore').val($('#comSelect_ :selected').attr('data-info')+':'+ msg['id']+':');
		   $('#dialog-confirm').dialog('open');
					
					
					
					//$('span.success').text('Data Sent!').show();
					
					//alert(msg);
					
		
					//$('#dose').load(base_url+'bmpt/show_dose');
						
					
					//$('#wrap').html(newContent);
					
				}
				
			});
				
               // $('#search').focus();
           
        
            return false;
        }
		
		
		});
		
		//Medicine type select
		$(".myButton").on('click', function() {
	// alert($(this).attr('value'));
	var value = $(this).attr('value');
	var letter = $('#letter').val();
	//alert(letter);
	$('#medTypeStore').val(value);
	$('#companyList').load(base_url+'bmpt/show_med',{type:value,letter:'A'});
	
	
	 return false;
 	});
	
	
		//Medicine starting letter
	$(".myButton2").on('click', function() {
		// alert($(this).attr('value'));
		var letter = $(this).attr('value');
		var value = $('#medTypeStore').val();
		//alert(letter);
		//$('#medTypeStore').val(value);
		$('#companyList').load(base_url+'bmpt/show_med',{type:value,letter:letter});
		
		
		 return false;
 	});
	
		
		

});
</script>
</head>

                 

<body >

<?php

	
	   //$type= $_REQUEST['type'];// echo "Welcome ". $name;
		$type = isset( $_REQUEST['type'] ) ? $_REQUEST['type'] :'';
		$letter = isset( $_REQUEST['letter'] ) ? $_REQUEST['letter'] :'';
	?>
  <table>

  <tr>
  <td colspan="6">
  <div>
  <?php 
   		  $this->db->select('medicineType');
		  $query = $this->db->get('medicinetypey22');
		  foreach($query->result() as $row){ 
		  $medicine['type'] =  $row->medicineType;
		  ?>
		 	  
  <a  href="#" class="myButton" style="color:#FFF; min-width:70px" value="<?php echo $medicine['type']?>"><?php echo $medicine['type']?></a>  
  <?php } ?>
        <br/> <br/>
        <?php
		$letterCount = "A";
		 for($i=0;$i<26; $i++)
		{ ?>
        <a  href="#" class="myButton2" style="color:#FFF;min-width:12px" value="<?php echo $letterCount?>"><?php echo $letterCount?></a> 
        <?php 
		$letterCount++;
		}?>
        <a  href="#" class="myButton2" style="color:#FFF;min-width:12px" value="0">0(Zero)</a> 
        <div align="center">
        
        <?php if($type == "") {?>
  <label id="typeLabel" class="b" style="font-size:16px;font-weight:bold;color:#036">No Type Selected</label>
  <?php }  else {?>
  <br/>
  <div align="center" id="loaded" style="display:none; background:#A9F5F2">Loaded medicines of Type: <?php echo $type ?> and Names Start with: <?php echo "'". $letter ."'" ?></div>
  <label id="typeLabel" class="b" style="font-size:16px;font-weight:bold;color:#036"><?php echo $type ?></label>
  <?php } ?>
       
        
            
        </div>
          </div>
  </td>
  </tr>
  <tr>
 <td width="17%" valign="top">
 <?php
 
  $this->db->select('companyID,companyName,dbName');
  $query = $this->db->get_where('companyz22', array('priority' => 1));
  $company['id'] = $query->row()->companyID;
  $company['name'] = $query->row()->companyName;
  $company['dbname'] = $query->row()->dbName;
 ?>
 <div align="center">
 <input id="comID1" type="hidden" value="<?php echo $company['id']?>"/>
 <label class="b" style="font-size:16px;font-weight:bold;color:#036"><?php echo $company['name'] ;?></label><br/>
 </div>
  <div id="list4">
  <?php 
  $this->db->like('medicineName', $letter, 'after');
  $this->db->order_by('medicineName');
  $this->db->select('id,medicineName,generic');
  $query = $this->db->get_where($company['dbname'],array('type'=> $type)); 
  ?>
  <ul id="medicineList1">
  <?php
 if($query->num_rows() > 0) {
   foreach($query->result() as $row){ 
  			$medicine['id'] = $row->id;
		 	$medicine['name'] = $row->medicineName;
			$medicine['generic'] = $row->generic;
			
  ?>
      <li title="<?php echo $medicine['generic'] ?>"><a data-info="<?php echo $medicine['id'] ?>" href="#"><?php echo $medicine['name'] ?></a></li>
   <?php } }
   else
   { $medicine['name'] = 'Medicine List Empty'; ?>  
   <li ><a data-info="0" href="#"><?php echo $medicine['name'] ?></a></li>
   <?php } ?>
   </ul>
</div>
  
    </td>
    
     <td width="17%"  >
    <?php
 
  $this->db->select('companyID,companyName,dbName');
  $query = $this->db->get_where('companyz22', array('priority' => 2));
  $company['id'] = $query->row()->companyID;
  $company['name'] = $query->row()->companyName;
  $company['dbname'] = $query->row()->dbName;
 ?>
 <div align="center">
 <input id="comID2" type="hidden" value="<?php echo $company['id']?>"/>
 <label class="b" style="font-size:16px;font-weight:bold;color:#036"><?php echo $company['name'] ;?></label><br/>
 </div>
 <div id="list4">
  <?php 
  $this->db->like('medicineName', $letter, 'after');
  $this->db->order_by('medicineName');
  $this->db->select('id,medicineName,generic');
  $query = $this->db->get_where($company['dbname'],array('type'=> $type)); 
  ?>
  <ul id="medicineList2">
 <?php
  if($query->num_rows() > 0) {
   foreach($query->result() as $row){ 
  			$medicine['id'] = $row->id;
		 	$medicine['name'] = $row->medicineName;
			$medicine['generic'] = $row->generic;
			
  ?>
       <li title="<?php echo $medicine['generic'] ?>"><a data-info="<?php echo $medicine['id'] ?>" href="#"><?php echo $medicine['name'] ?></a></li>
   <?php } }
   else
   { $medicine['name'] = 'Medicine List Empty'; ?>  
   <li ><a data-info="0" href="#"><?php echo $medicine['name'] ?></a></li>
   <?php } ?>
   </ul>
</div>
</td>
    
     <td width="17%">
    <?php
 
  $this->db->select('companyID,companyName,dbName');
  $query = $this->db->get_where('companyz22', array('priority' => 3));
  $company['id'] = $query->row()->companyID;
  $company['name'] = $query->row()->companyName;
  $company['dbname'] = $query->row()->dbName;
 ?>
 <div align="center">
 <input id="comID3" type="hidden" value="<?php echo $company['id']?>"/>
 <label class="b" style="font-size:16px;font-weight:bold;color:#036"><?php echo $company['name'] ;?></label><br/>
 </div>
 <div id="list4">
  <?php 
  $this->db->like('medicineName', $letter, 'after');
  $this->db->order_by('medicineName');
   $this->db->select('id,medicineName,generic');
  $query = $this->db->get_where($company['dbname'],array('type'=> $type)); 
  ?>
  <ul id="medicineList3">
  <?php
  if($query->num_rows() > 0) {
  foreach($query->result() as $row){ 
  			$medicine['id'] = $row->id;
		 	$medicine['name'] = $row->medicineName;
			$medicine['generic'] = $row->generic;
			
  ?>
       <li title="<?php echo $medicine['generic'] ?>"><a data-info="<?php echo $medicine['id'] ?>" href="#"><?php echo $medicine['name'] ?></a></li>
   <?php } }
   else
   { $medicine['name'] = 'Medicine List Empty'; ?>  
   <li ><a data-info="0" href="#"><?php echo $medicine['name'] ?></a></li>
   <?php } ?>
   </ul>
</div>
</td>
    
    <td width="17%">
    <?php
 
  $this->db->select('companyID,companyName,dbName');
  $query = $this->db->get_where('companyz22', array('priority' => 4));
  $company['id'] = $query->row()->companyID;
  $company['name'] = $query->row()->companyName;
  $company['dbname'] = $query->row()->dbName;
 ?>
 <div align="center">
 <input id="comID4" type="hidden" value="<?php echo $company['id']?>"/>
 <label class="b" style="font-size:16px;font-weight:bold;color:#036"><?php echo $company['name'] ;?></label><br/>
 </div>
 <div id="list4">
  <?php 
  $this->db->like('medicineName', $letter, 'after');
  $this->db->order_by('medicineName');
   $this->db->select('id,medicineName,generic');
  $query = $this->db->get_where($company['dbname'],array('type'=> $type)); 
  ?>
  <ul id="medicineList4">
  <?php
  if($query->num_rows() > 0) {
  foreach($query->result() as $row){ 
  			$medicine['id'] = $row->id;
		 	$medicine['name'] = $row->medicineName;
			$medicine['generic'] = $row->generic;
			
  ?>
      <li title="<?php echo $medicine['generic'] ?>"><a data-info="<?php echo $medicine['id'] ?>" href="#"><?php echo $medicine['name'] ?></a></li>
   <?php } }
   else
   { $medicine['name'] = 'Medicine List Empty'; ?>  
   <li ><a data-info="0" href="#"><?php echo $medicine['name'] ?></a></li>
   <?php } ?>
   </ul>
</div>
</td>
    
    <td width="17%">
    <?php
 
  $this->db->select('companyID,companyName,dbName');
  $query = $this->db->get_where('companyz22', array('priority' => 5));
  $company['id'] = $query->row()->companyID;
  $company['name'] = $query->row()->companyName;
  $company['dbname'] = $query->row()->dbName;
 ?>
 <div align="center">
 <input id="comID5" type="hidden" value="<?php echo $company['id']?>"/>
 <label class="b" style="font-size:16px;font-weight:bold;color:#036"><?php echo $company['name'] ;?></label><br/>
 </div>
 <div id="list4">
  <?php 
  $this->db->like('medicineName', $letter, 'after');
  $this->db->order_by('medicineName');
  $this->db->select('id,medicineName,generic');
  $query = $this->db->get_where($company['dbname'],array('type'=> $type)); 
  ?>
  <ul id="medicineList5">
  <?php
  if($query->num_rows() > 0) {
   foreach($query->result() as $row){ 
  			$medicine['id'] = $row->id;
		 	$medicine['name'] = $row->medicineName;
			$medicine['generic'] = $row->generic;
			
  ?>
       <li title="<?php echo $medicine['generic'] ?>"><a data-info="<?php echo $medicine['id'] ?>" href="#"><?php echo $medicine['name'] ?></a></li>
   <?php } }
   else
   { $medicine['name'] = 'Medicine List Empty'; ?>  
   <li ><a data-info="0" href="#"><?php echo $medicine['name'] ?></a></li>
   <?php } ?>
   </ul>
</div>
</td>

<td width="17%" valign="top">
 <?php
 
  $this->db->select('companyID,companyName,dbName');
  $query = $this->db->get_where('companyz22', array('priority' => 6));
  $company['id'] = $query->row()->companyID;
  $company['name'] = $query->row()->companyName;
  $company['dbname'] = $query->row()->dbName;
 ?>
 <div align="center">
 <input id="comID6" type="hidden" value="<?php echo $company['id']?>"/>
 <label class="b" style="font-size:16px;font-weight:bold;color:#036"><?php echo $company['name'] ;?></label><br/>
 </div>
  <div id="list4">
  <?php 
  $this->db->like('medicineName', $letter, 'after');
  $this->db->order_by('medicineName');
  $this->db->select('id,medicineName,generic');
  $query = $this->db->get_where($company['dbname'],array('type'=> $type)); 
  ?>
  <ul id="medicineList6">
  <?php
 if($query->num_rows() > 0) {
   foreach($query->result() as $row){ 
  			$medicine['id'] = $row->id;
		 	$medicine['name'] = $row->medicineName;
			$medicine['generic'] = $row->generic;
			
  ?>
      <li title="<?php echo $medicine['generic'] ?>"><a data-info="<?php echo $medicine['id'] ?>" href="#"><?php echo $medicine['name'] ?></a></li>
   <?php } }
   else
   { $medicine['name'] = 'Medicine List Empty'; ?>  
   <li ><a data-info="0" href="#"><?php echo $medicine['name'] ?></a></li>
   <?php } ?>
   </ul>
</div>
  
    </td>
    
    
     </tr>
     <tr>
       <td colspan="5">&nbsp;</td>
     </tr>
     <tr>
     <td colspan="2"> 
     

      <label class="b" style="font-size:16px;font-weight:bold;color:#036">Search Medicine By Name</label>
       <br/>
     <table class="abc">
     <tr>
     <td width="45%"> Select Company Name </td>
     <td>
      
            <div class="styled-select">
  
  
   <select id="comSelect_" name="comSelect_" style="min-width:150px" >
          <?php
		  $this->db->order_by('priority asc');
		  $this->db->select('companyID,companyName,dbName');
  		  $query = $this->db->get('companyz22');
		  foreach($query->result() as $row){ 
		  $company['id'] =  $row->companyID;
		  $company['name'] =  $row->companyName;
		  $company['dbname'] =  $row->dbName;
		  ?>
          <option data-info="<?php echo  $company['id'] ?>"  value="<?php echo  $company['dbname'] ?>"><?php echo $company['name'];?> </option>
          <?php } ?>
          </select>
     </div> <p></p>
     </td>
     </tr>
     <tr>
       <td>Search Medicine</td>
       <td><input type="text" id="com1" style="width:95%" class="large"/><em style="font-size:10px">Type atleast first 2 letters of Medicine Name</em></td>
     </tr>
     <tr>
      <td> Generic</td>
     <td>
     <div align="center">
     <textarea  id="com1Text" style="width:95%" class="small"></textarea><br/>
     </div>
     </td>
     </tr>
    
     </table>
    
    <div align="center" id="com1Con" style="display:none; background:#A9F5F2"> Medicine Added to Prescription Maker</div>
    <br/>
    
    
    <div id="dialog-confirm" title="Add to prescription" align="left">


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
   
    
    
    
     <div id="123" style="display:none; background:#A9F5F2">
     Medicine Added to Prescription Maker
     </div>
     </td>
     <td colspan="2">
      <label class="b" style="font-size:16px;font-weight:bold;color:#036">Search Medicine By Generic</label><br/>
     <table class="abc">
     <tr>
     <td width="45%"> Select Company Name </td>
     <td>
      
            <div class="styled-select">
  
  
   <select id="comSelect" name="comSelect" style="min-width:150px" >
          <?php
		  $this->db->order_by('priority asc');
		  $this->db->select('companyID,companyName,dbName');
  		  $query = $this->db->get('companyz22');
		  foreach($query->result() as $row){ 
		  $company['id'] =  $row->companyID;
		  $company['name'] =  $row->companyName;
		  $company['dbname'] =  $row->dbName;
		  ?>
          <option data-info="<?php echo  $company['id'] ?>"  value="<?php echo  $company['dbname'] ?>"><?php echo $company['name'];?> </option>
          <?php } ?>
          </select>
     </div> <p></p>
     </td>
     </tr>
     <tr>
      <td> Generic</td>
     <td>
     <div align="center">
     <input type="text" id="searchByGen" style="width:95%" class="large"/><br/>
     </div>
     </td>
     </tr>
     <tr>
     <td colspan="2">
     <div align="center">
     <input type="button" id="searchMedButton" class="link_button_a large" value="Search Medicine By Generic"/>
     </div>
     </td>
     </tr>
     
     <tr>
      <td> Select Medicine  to Add </td>
     <td>
     
     <div class="styled-select">
      <select id="medicineList" name="medicineList" style="min-width:150px" >
      </select>
      
      
     </div>
     </td>
     </tr>
     </table>
     <div align="center" id="com6Con" style="display:none; background:#A9F5F2"> Medicine Added to Prescription Maker</div> 
     
    <p/>
     <div id="showGen" align="center" style="display:none; background:#C9F" >
    
     
     </div>
     </td>
    </tr>
     </table>
    


</body>
</html>