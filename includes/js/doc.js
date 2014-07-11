

$(document).ready(function() {
	
	var base_url = $('#base_url').val();
	 $( document ).tooltip();
	 
	 $.ajaxSetup ({
      cache: false
});
	 
	
	 
	$("#sortable1 li").not('.emptyMessage').click(function() {
		alert($('a', this).text());
		 return false;
		 });
	
	
	
	$('#showReportButton').click(function(){
		var pid = $('#ptntID').text();
		var eid = $('#examID').text();
		
		
		if(pid != "--")
		{
			
				$('#report').load(base_url+'bmpt/load_report_1', {pid:pid, eid:eid});
				$('#report').show();
			
		}
		else
		{
			alert('No Patient Selected');
		}
		
	});
	
	
	$('#hideReportButton').click(function(){
		
				$('#report').hide();
				
		
	});
	
	//show prescription Panel
	

	$('#prescriptionControl').click(function(){
			 $("#prescriptionTable").show();
				
			//load 5 company's medicine name (actually blank)
			
			$('#companyList').load(base_url+'bmpt/show_med');
			
			//load dose
			$('#dose').load(base_url+'bmpt/show_dose');
			
			//load application
			$('#application').load(base_url+'bmpt/show_application');
			
			//load Test
			var test = $('#testType').val();
			$('#testDiv').load(base_url+'bmpt/show_test',{type:test});
			
			//load advice
			$('#advice').load(base_url+'bmpt/show_advice');
		
	});
	
	
	
	//Force Load Patient List
	$('#forceLoad').click(function(){
		$('#patient_list').load(base_url+'bmpt/time_1');
	});
	
	//Load and auto refresh patient List	
	$('#patient_list').load(base_url+'bmpt/time_1');
	var auto_refresh = setInterval(
	function ()
	{
		$('#patient_list').load(base_url+'bmpt/time_1');
		
	}, 10000);
	
	
	
	
	
	
	
	//autocomplete for testTtype
		$( "#testType" ).autocomplete({
			source: function(request, response) {
				$.ajax({
				url : base_url+'bmpt/suggestions_test',
				data: { term: $("#testType").val()},
				dataType: "json",
				type: "POST",
				success: function(data){
					
					 
					response(data);
				}
			});
		},
		minLength: 1
		});
	
	//autocomplete for medicinetype
		$( "#medicineType" ).autocomplete({
			source: function(request, response) {
				$.ajax({
				url : base_url+'bmpt/suggestions',
				data: { term: $("#medicineType").val()},
				dataType: "json",
				type: "POST",
				success: function(data){
					
					 
					response(data);
				}
			});
		},
		minLength: 1,
		select: function(event, ui) {
            
             
			this.value = ui.item.value;
            var value = ui.item.value;
          $('#companyList').load(base_url+'bmpt/show_med',{type:value});
            
        }
		});

		
		///Set days on press enter key
		$("#days").keyup(function(event){
    		if(event.keyCode == 13){
    	  		  $("#addDays").click();
   			 }
		});
		
		
		//get medicine type on press enter key
		$("#testType").keyup(function(event){
    		if(event.keyCode == 13){
    	  		  $("#showTest").click();
   			 }
		});
		//get medicine type on press enter key
		$("#medicineType").keyup(function(event){
    		if(event.keyCode == 13){
    	  		  $("#showMed").click();
   			 }
		});
		//get prescription on press enter key
		$("#disease").keyup(function(event){
    		if(event.keyCode == 13){
    	  		  $("#getPresc").click();
   			 }
		});
		
		//autocomplete for disease
		$( "#disease" ).autocomplete({
			source: function(request, response) {
				$.ajax({
				url : base_url+'bmpt/suggestions_disease',
				data: { term: $("#disease").val()},
				dataType: "json",
				type: "POST",
				success: function(data){
					
					 
					response(data);
				}
			});
		},
		minLength: 1
		});

	
	
	
	//Show tests for selected type
	$('#showTest').click(function(){
		var test = $('#testType').val();
		
		$('#testDiv').load(base_url+'bmpt/show_test',{type:test});
		
		
	});
	
	
	//Show medicine for selected type
	$('#showMed').click(function(){
		var com = $('#medicineType').val();
		
		$('#companyList').load(base_url+'bmpt/show_med',{type:com});
		
		
	});
	
	
	
	
	///add day(s) to prescription
	$('#addDays').click(function(){
		
		var day = $('#days').val();
		var day_s = "";
		if(day != "")
		{
			if(day > 1)
				day_s = 'days';
			else
				day_s = 'day';
				
			$('#prescription').val($('#prescription').val() +' '+' '+' '+' '+' '+' '+ day+ ' '+ day_s);
		}
		
	});
	
	///Show or hide Medicine database edit
	var toggle = 1;
	$('#editMedButton').click(function(){
			if(toggle == 1)
			{
				 
				 $("#editDose").show();
				 $("#editPrescrip").show();
				 $("#editApplication").show();
				 $("#editAdvice").show();
				 $("#tableMed").show();
				
				 
				 toggle = 2;
				 $('#editMedButton').val('Hide edit Medicine');
			}
			else if(toggle == 2)
			{
				
				 $("#editDose").hide();
				 $("#editPrescrip").hide();
				 $("#editApplication").hide();
				 $("#editAdvice").hide();
				 $("#tableMed").hide();
				
				 
				 toggle = 1;
				 $('#editMedButton').val('Edit Medicine');
			}
		
		
	});
	
	$( "#editMed" ).autocomplete({
			
			
			source: function(request, response) {
			var com = $('#editComSelect option:selected').val() ;	
			var company = $('#editComSelect option:selected').prop('value');
			
				
				
				//alert(base_url);
				$.ajax({
				url : base_url+'bmpt/suggestions_com',
				data: { term: $("#editMed").val(),company: company},
				dataType: "json",
				type: "POST",
				success: function(data){
					
					 
					response(data);
				}
			});
		},
		minLength: 2,
		select: function(event, ui) {
            
             
			 this.value = ui.item.value;
            var value = ui.item.value;
			
			var company = $('#editComSelect option:selected').prop('value');
			
          
            
                //event.preventDefault();
               // this.value = this.value + " abcd ";
				//$('#comName1').val(value);
				$.ajax({
				url : base_url+'bmpt/get_generic',
				type : "POST",
				data :  { medicineName:value, company:company} ,
				dataType: "json",
				success : function(msg){
					
					$('#editGeneric').val(msg['generic']);
					//alert(msg['type']);
					$("#editTypeSelect option").each(function(i){
						
       					if(msg['type'].toLowerCase() == $(this).val().toLowerCase())
						 {
							$('#editTypeSelect').val( $(this).val());
						 }
    				});
					
					
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
	
	
	//delete medicine
	$('#delMed').click(function(){
		
		
			
			var company = $('#editComSelect option:selected').prop('value');
			
			var med = $("#editMed").val();
	
		
			if( med != '')
			{
				
			 $.ajax({
				url : base_url+'bmpt/del_med',
				type : "POST",
				data :  { medName:med,company:company} ,
				success : function(msg){
					
					//$('span.success').text('Data Sent!').show();
					
					alert(msg);
					$("#editMed").val('');
					$("#editGeneric").val('');
						
					
					//$('#wrap').html(newContent);
					
				}
				
			});
			}
			else
				alert('No medicine selected');
		
		
		
	});
	
	
	///add medicine for company a
	$('#addMed').click(function(){
		
			var company = $('#editComSelect option:selected').prop('value');
			var type = $('#editTypeSelect option:selected').prop('value');
		
			var med = $("#editMed").val();
			var generic = $("#editGeneric").val();
		
		
		
			if( med != "")
			{
			 $.ajax({
				url : base_url+'bmpt/add_med',
				type : "POST",
				data :  { medName: med,company:company, generic:generic, type:type} ,
				success : function(msg){
					
					//$('span.success').text('Data Sent!').show();
					
					alert(msg);
					$("#editMed").val('');
					$("#editGeneric").val('');
					
						
					
					//$('#wrap').html(newContent);
					
				}
				
			});
			}
			else
				alert('Medicine name EMPTY!!');
		
		
	});
	
	
	///update medicine 
	$('#upMed').click(function(){
		
			var company = $('#editComSelect option:selected').prop('value');
			var med = $("#editMed").val();
			var generic =$("#editGeneric").val();
			var newMed = $("#updateMed").val();
			var type = $('#editTypeSelect option:selected').val();
		
			
			
		
		if(med != "" )
		{
			if(newMed == "")
			{
				newMed = med;	
			}
			 $.ajax({
				url : base_url+'bmpt/up_med',
				type : "POST",
				data :  { medName: med,company:company, newMed: newMed, generic:generic, type:type} ,
				success : function(msg){
					
					//$('span.success').text('Data Sent!').show();
					
					alert(msg);
					$("#editMed").val('');
					$("#editGeneric").val('');
					$("#updateMed").val('');
						
					
					//$('#wrap').html(newContent);
					
				}
				
			});
			}
			else
				alert('Medicine Name EMPTY!!');
		
		
			
		
		
	});
	
	
	//checkbox for make prescription textarea editable or not
	$('#checkedOrNot').click(function(){
		if ($('#checkedOrNot').is(':checked')) {
			
			$('#prescription').attr('readonly',false);
		} else {
			$('#prescription').attr('readonly',true);
		} 
		
	});
	
	
	
	//add advice to db
	$('#addAdviceDb').click(function(){
		if($("#newAdvice").val() != "" )
			{
			 $.ajax({
				url : base_url+'bmpt/add_advice',
				type : "POST",
				data :  { advice:$("#newAdvice").val()} ,
				success : function(msg){
					
					//$('span.success').text('Data Sent!').show();
					
					alert(msg);
					
		
					$('#advice').load(base_url+'bmpt/show_advice');
					$("#newAdvice").val('');
					//load 5 company's medicine name (actually blank)
			  		$('#companyList').load(base_url+'bmpt/show_med');	
				
					
				}
				
			});
			}
			else
			{
					alert('Avdice Textarea EMPTY!!');
			}
				
				
	});
	
	
	///add dose
	$('#addDose').click(function(){
		if($("#newDose").val() != "" )
			{
			 $.ajax({
				url : base_url+'bmpt/add_dose',
				type : "POST",
				data :  { dose:$("#newDose").val()} ,
				success : function(msg){
					
					//$('span.success').text('Data Sent!').show();
					
					alert(msg);
					
		
					$('#dose').load(base_url+'bmpt/show_dose');
					$("#newDose").val('');
					
					 //$( ".dialogSelector" ).dialog( "destroy" );
					//load 5 company's medicine name (actually blank)
			  		$('#companyList').load(base_url+'bmpt/show_med');	
				
					
				}
				
			});
			}
			else
			{
					alert('Dose EMPTY!!');
			}
				
				
	});
	
	//delete dose
	$('#deleteDose').click(function(){
	
			 $.ajax({
				url : base_url+'bmpt/del_dose',
				type : "POST",
				data :  { doseId:$('#doseSelect option:selected').val()} ,
				success : function(msg){
					
					//$('span.success').text('Data Sent!').show();
					
					alert(msg);
					
		
					$('#dose').load(base_url+'bmpt/show_dose');
						
					
					//$('#wrap').html(newContent);
					
				}
				
			});
			
	});
	
	//delete Advice
	$('#deleteAdvice').click(function(){
	
			 $.ajax({
				url : base_url+'bmpt/del_advice',
				type : "POST",
				data :  { id:$('#adviceSelect option:selected').val()} ,
				success : function(msg){
					
					//$('span.success').text('Data Sent!').show();
					
					alert(msg);
					
		
					$('#advice').load(base_url+'bmpt/show_advice');
						
					
					//$('#wrap').html(newContent);
					
				}
				
			});
			
	});
	
	
	///add Application
	$('#addApplication').click(function(){
		if($("#newApplication").val() != "" )
			{
			 $.ajax({
				url : base_url+'bmpt/add_application',
				type : "POST",
				data :  { app:$("#newApplication").val()} ,
				success : function(msg){
					
					//$('span.success').text('Data Sent!').show();
					
					alert(msg);
					
		
					$('#application').load(base_url+'bmpt/show_application');
					$("#newApplication").val('');
					
					//load 5 company's medicine name (actually blank)
			  		$('#companyList').load(base_url+'bmpt/show_med');	
					
					//$('#wrap').html(newContent);
					
				}
				
			});
			}
			else
				alert('Application EMPTY!!');
	});
	
	//delete application
	$('#deleteApplication').click(function(){
	
	//alert($('#applicationSelect option:selected').val());
			 $.ajax({
				url : base_url+'bmpt/del_Application',
				type : "POST",
				data :  { appId:$('#applicationSelect option:selected').val()} ,
				success : function(msg){
					
					//$('span.success').text('Data Sent!').show();
					
					alert(msg);
					
		
					$('#application').load(base_url+'bmpt/show_application');
						
					
					//$('#wrap').html(newContent);
					
				}
				
			});
			
	});
	
	
	
	
	///add test 
	$('#addTest').click(function(){
		
		
			if($("#testType").val() != "" && $("#test").val() != "")
			{
			 $.ajax({
				url : base_url+'bmpt/add_test',
				type : "POST",
				data :  { testName: $("#test").val() ,testType: $("#testType").val()} ,
				success : function(msg){
					
					//$('span.success').text('Data Sent!').show();
					
					alert(msg);
					//load Test
					var test = $('#testType').val();
					$('#testDiv').load(base_url+'bmpt/show_test',{type:test});
					$("#test").val('');
						
					
					//$('#wrap').html(newContent);
					
				}
				
			});
			}
			else
				alert('Test Type/Name EMPTY!!');
		
		
	});
	
	
	///add medicine for company a
	
	
	//delete medicine
	$('#delTest').click(function(){
		
			var testName = $('#testSelect option:selected').val();
			
			if( testName != undefined)
			{
				
			 $.ajax({
				url : base_url+'bmpt/del_test',
				type : "POST",
				data :  { testName:testName, testType: $("#testType").val()} ,
				success : function(msg){
					
					//$('span.success').text('Data Sent!').show();
					
					alert(msg);
					var test = $('#testType').val();
					$('#testDiv').load(base_url+'bmpt/show_test',{type:test});	
					
					//$('#wrap').html(newContent);
					
				}
				
			});
			}
			else
				alert('No Test selected');
		
		
		
	});
	
	
	
	
	///fetch test 
	$('#fetchTest').click(function(){
		
			$("#test").val($('#testSelect option:selected').val());
		
		
		
			
		
		
	});
	
	
	
	
	///update test 
	$('#upTest').click(function(){
		
			var test  = $('#testSelect option:selected').val();
			var newTest = $("#test").val();
		
		
		if($("#testType").val()!="" && test != "" && newTest != "")
			{
			 $.ajax({
				url : base_url+'bmpt/up_test',
				type : "POST",
				data :  { testName: test, testType: $("#testType").val(), newTest: newTest} ,
				success : function(msg){
					
					//$('span.success').text('Data Sent!').show();
					
					alert(msg);
					var test = $('#testType').val();
					$('#testDiv').load(base_url+'bmpt/show_test',{type:test});	
					$("#test").val('');
						
					
					//$('#wrap').html(newContent);
					
				}
				
			});
			}
			else
				alert('Test Type/Name EMPTY!!');
		
		
			
		
		
	});
	
	
	
	
	
	
	/////Function for deleting test type from medicinetypey22
	$('#delTestType').click(function(){
		if($("#testType").val() != "")
		{
		 $.ajax({
            url : base_url+'bmpt/del_test_type',
            type : "POST",
            data :  { testType: $("#testType").val()} ,
            success : function(msg){
                
                //$('span.success').text('Data Sent!').show();
				if(msg == 'Deleted')
					$("#testType").val('');
				alert(msg);
			
					
				
				//$('#wrap').html(newContent);
                
            }
            
        });
		}
		else
			alert('Medicine Type EMPTY!!');
		
	});
	
	
	/////Function for deleting medicine type from medicinetypey22
	$('#delType').click(function(){
		if($("#medicineType").val() != "")
		{
		 $.ajax({
            url : base_url+'bmpt/del_med_type',
            type : "POST",
            data :  { medType: $("#medicineType").val()} ,
            success : function(msg){
                
                //$('span.success').text('Data Sent!').show();
				if(msg == 'Deleted')
					$("#medicineType").val('');
				alert(msg);
			
					
				
				//$('#wrap').html(newContent);
                
            }
            
        });
		}
		else
			alert('Medicine Type EMPTY!!');
		
	});
	
	//Add prescription
	$('#addPrescrip').click(function(){
		
	
        var prescription = "";
		if($('#checkedOrNot').is(':checked'))
		   prescription = $('#prescription').val();
		else
			 prescription = $('#prescriptionHolder').val();	
		
		if($("#disease").val() != "" && $("#prescription").val() !="")
		{
		 $.ajax({
            url : base_url+'bmpt/add_prescrip',
            type : "POST",
            data :  { disease: $("#disease").val(), prescription:prescription} ,
            success : function(msg){
                
                //$('span.success').text('Data Sent!').show();
				
				alert(msg);
			
					
				
				//$('#wrap').html(newContent);
                
            }
            
        });
		}
		else
			alert('Disease/Prescription field EMPTY!!');
		
	});
	
	//Get prescription
	$('#getPresc').click(function(){
		if($("#disease").val() != "")
		{
		 $.ajax({
            url : base_url+'bmpt/get_prescrip',
            type : "POST",
            data :  { disease: $("#disease").val()} ,
			dataType: "json",
            success : function(msg){
                
                //$('span.success').text('Data Sent!').show();
				if(msg != null)
				{
					
					if(msg['flag'] == 1)
					{
						$("#prescriptionHolder").val(msg['prescriptionH']);
						$("#prescription").val(msg['prescription']);
						$('#checkedOrNot').prop('checked', false);	
						$('#prescription').attr('readonly',true);
					}
					else
					{
							$("#prescription").val(msg['prescription']);
							$("#prescriptionHolder").val('');
							$('#checkedOrNot').prop('checked', true);
							$('#prescription').attr('readonly',false);
					}
				}
				else
				{
					alert('No Prescription Found!');
					$("#prescription").val('');
					$("#prescriptionHolder").val('');
					$('#checkedOrNot').prop('checked', false);
				}
			
					
				
				//$('#wrap').html(newContent);
                
            }
            
        });
		}
		else
			alert('Disease field EMPTY!!');
		
	});
	
	//send prescription
	$('#sendPrescrip').click(function(){
		
		var pID = $('#ptntID').text();
		var eID = $('#examID').text();
		var symptom = $('#symptom').val();
		var primary = $('#primary').val();
		var final = $('#final').val();
		//alert(pID + " "+eID + " "+ symptom + " "+ primary+ " " + final);
		
		if(primary != "" || final != "" )
		{
		 $.ajax({
            url : base_url+'bmpt/send_prescrip',
            type : "POST",
            data :  { pID:pID, eID:eID , symptom:symptom, primary:primary, final:final } ,
		    success : function(msg){
                
                //$('span.success').text('Data Sent!').show();
				
				alert(msg);
			
					
				
				//$('#wrap').html(newContent);
                
            }
            
        });
		}
		else
			alert('Fild(s) Empty!!');
		
		});
	
	
	
	//send as primary prescription
	$('#prPrescrip').click(function(){
		
		var pID = $('#ptntID').text();
		var eID = $('#examID').text();
		var symptom = $('#symptom').val();
		//var prescription = $('#prescriptionHolder').val();
		var prescription = "";
		if($('#checkedOrNot').is(':checked'))
		   prescription = $('#prescription').val();
		else
			 prescription = $('#prescriptionHolder').val();
		
		//alert(pID + " "+eID + " "+ symptom + " "+ primary+ " " + final);
		if(pID !='--')
		{
			if(prescription != ""  )
			{
			 $.ajax({
				url : base_url+'bmpt/send_primary_prescrip',
				type : "POST",
				data :  { pID:pID, eID:eID , symptom:symptom, prescription:prescription } ,
				success : function(msg){
					
					//$('span.success').text('Data Sent!').show();
					
					alert(msg);
				
						
					
					//$('#wrap').html(newContent);
					
				}
				
			});
			}
			else
				alert('Prescription Empty!!');
		}
		else
		  alert('No Patient Selected!!');
		});
		
	
	//clear prescription Text area
	$('#clearTextArea').click(function(){	
		$('#prescription').val('');
		$('#prescriptionHolder').val('');
	});
		
		//send as primary prescription
	$('#finalPrescrip').click(function(){
		
		var pID = $('#ptntID').text();
		var eID = $('#examID').text();
		var symptom = $('#symptom').val();
		//var prescription = $('#prescriptionHolder').val();
		var prescription = "";
		if($('#checkedOrNot').is(':checked'))
		   prescription = $('#prescription').val();
		else
			 prescription = $('#prescriptionHolder').val();
	
		//alert(pID + " "+eID + " "+ symptom + " "+ primary+ " " + final);
		if(pID !='--')
		{
			if(prescription != ""  )
			{
			 $.ajax({
				url : base_url+'bmpt/send_final_prescrip',
				type : "POST",
				data :  { pID:pID, eID:eID , symptom:symptom, prescription:prescription } ,
				success : function(msg){
					
					//$('span.success').text('Data Sent!').show();
					
					alert(msg);
				
						
					
					//$('#wrap').html(newContent);
					
				}
				
			});
			}
			else
				alert('Prescription Empty!!');
		}
		else
		  alert('No Patient Selected!!');
		});
	
	
	
	/////Function for adding medicine type to testTypey26
	$('#addTestType').click(function(){
		if($("#testType").val() != "")
		{
		 $.ajax({
            url : base_url+'bmpt/add_test_type',
            type : "POST",
            data :  { testType: $("#testType").val()} ,
		    success : function(msg){
                
                //$('span.success').text('Data Sent!').show();
				
				alert(msg);
			
					
				
				//$('#wrap').html(newContent);
                
            }
            
        });
		}
		else
			alert('Test Type EMPTY!!');
		
	});
	
	
	/////Function for adding medicine type to medicinetypey22
	$('#addType').click(function(){
		if($("#medicineType").val() != "")
		{
		 $.ajax({
            url : base_url+'bmpt/add_med_type',
            type : "POST",
            data :  { medType: $("#medicineType").val()} ,
		    success : function(msg){
                
                //$('span.success').text('Data Sent!').show();
				
				alert(msg);
			
					
				
				//$('#wrap').html(newContent);
                
            }
            
        });
		}
		else
			alert('Medicine Type EMPTY!!');
		
	});
	
	$("#back-up").hide();
    $("#back-down").hide();
	
	// fade in #back-top
	$(function () {
		$(window).scroll(function () {
			if ($(this).scrollTop() > 100) {
				$('#back-up').fadeIn();
				$('#back-down').fadeIn();
			} else {
				$('#back-up').fadeOut();
				$('#back-down').fadeOut();
			}
		});

		// scroll body to 0px on click
		$('#back-up a').click(function () {
		var bottomPosition = $(document).height();
      
		var y = $(window).scrollTop();  
		$("html, body").animate({ scrollTop: y-$(window).height() }, 400);
			return false;
		});
		
		$('#back-down a').click(function () {
		var bottomPosition = $(document).height();
      
		var y = $(window).scrollTop();  
		$("html, body").animate({ scrollTop: y+$(window).height() }, 400);
			return false;
		});
	});
	
	
	
	


	

});