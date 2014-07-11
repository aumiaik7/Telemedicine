$(document).ready(function() {
	
var base_url = $('#base_url').val();
$("#addField").on('click', function(){
	$('#fieldDiv').show();

	
});


var toggle = 1;
	$('#edit').click(function(){
			if(toggle == 1)
			{
				 $("#fieldDiv").show();
				 $("#fieldDivDel").show();
				 toggle = 2;
				 $('#edit').val('Hide edit');
			}
			else if(toggle == 2)
			{
				 $("#fieldDiv").hide();
				 $("#fieldDivDel").hide();
				 toggle = 1;
				 $('#edit').val('Edit');
			}
		
		
	});



$("#addFieldToDb").on('click', function(){
	
	var fieldName = $('#fieldName').val();
	
	 $.ajax({
				url : base_url+'bmpt/add_field',
				type : "POST",
				data :  {fieldName:fieldName} ,
				success : function(msg){
					
					//$('span.success').text('Data Sent!').show();
					
					alert(msg);
					
					var pid = $('#ptntID').text();
					var eid = $('#examID').text();
					$('#report').load(base_url+'bmpt/load_report', {pid:pid, eid:eid});
					
					
						
					
					//$('#wrap').html(newContent);
					
				}
				
			});
			
				
});

		$( "#delField" ).autocomplete({
				
			source: function(request, response) {
				$.ajax({
				url : base_url+'bmpt/suggestions_reportField',
				data: { term: $("#delField").val()},
				dataType: "json",
				type: "POST",
				success: function(data){
					
					 
					response(data);
				}
			});
		},
		minLength: 1
		});

$("#submitReport").on('click', function(){
	
	//alert($('#fieldCount').val());
	var report_name = [];
	var report = [];
	var pID = $('#ptntID').text();
	var eID = $('#examID').text();
	
	var count = $('#fieldCount').val();
	for (var i = 4; i < count ; i ++)
	{
		report_name.push($('#reportName_'+i).text());
		report.push($('#fieldName_'+i).val());
	}
		
	//alert(pID);
	 $.ajax({
				url : base_url+'bmpt/submit_report',
				type : "POST",
				data :  {pID:pID, eID:eID, report_name:report_name,report:report } ,
				success : function(msg){
					
					//$('span.success').text('Data Sent!').show();
					
					alert(msg);
					
					
						
					
					//$('#wrap').html(newContent);
					
				}
				
			});
	
	
	
	
	});
	
	
	$("#delFieldfromDb").on('click', function(){
	
	//alert($('#fieldCount').val());
	var fieldName = $('#delField').val();
	
		
	//alert(pID);
	 $.ajax({
				url : base_url+'bmpt/field_del',
				type : "POST",
				data :  {fieldName:fieldName } ,
				success : function(msg){
					
					//$('span.success').text('Data Sent!').show();
					
					alert(msg);
					var pid = $('#ptntID').text();
					var eid = $('#examID').text();
					$('#report').load(base_url+'bmpt/load_report', {pid:pid, eid:eid});
					
					
						
					
					//$('#wrap').html(newContent);
					
				}
				
			});
			
	
	
	
	
	});
	
	$("#fieldName").keyup(function(event){
    		if(event.keyCode == 13){
    	  		  $("#addFieldToDb").click();
   			 }
		});
		
			$("#delField").keyup(function(event){
    		if(event.keyCode == 13){
    	  		  $("#delFieldfromDb").click();
   			 }
		});
	
});