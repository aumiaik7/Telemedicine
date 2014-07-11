

$(document).ready(function() {
	
	var base_url = $('#base_url').val();
	
	
	
	
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
	
	
	
	
	//load 5 company's medicine name (actually blank)
	//var com = $('#medicineType').val();
	//$('#com_1').load(base_url+'bmpt/show_med',{type:com});
	
	//load dose
	$('#dose').load(base_url+'bmpt/show_dose');
	
	//load Test
	var test = $('#testType').val();
	$('#testDiv').load(base_url+'bmpt/show_test',{type:test});
	
	//load application
	$('#application').load(base_url+'bmpt/show_application');
	//load Company wise medicine list
	$('#companyList').load(base_url+'bmpt/show_med');
	//load advice
	$('#advice').load(base_url+'bmpt/show_advice');
	
	
		
		
		
		
		
		/*
	
	//autocomplete for aci Medicine
		$( "#aci" ).autocomplete({
			
			source: function(request, response) {
				$.ajax({
				url : base_url+'bmpt/suggestions_com',
				data: { term: $("#aci").val(),company:'aci'},
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
          
            
                //event.preventDefault();
               // this.value = this.value + " abcd ";
				//$('#comName1').val(value);
				$.ajax({
				url : base_url+'bmpt/get_generic',
				type : "POST",
				data :  { medicineName:value, company:'aci'} ,
				dataType: "json",
				success : function(msg){
					
					$('#com1Text').val(msg['generic']);
					$('#com1Con').fadeIn("slow").delay(2000).fadeOut("slow");
					
					
					
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
		
		//autocomplete for beximco Medicine
		$( "#beximco" ).autocomplete({
			source: function(request, response) {
				$.ajax({
				url : base_url+'bmpt/suggestions_com',
				data: { term: $("#beximco").val(),company:'beximco'},
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
          
            
                //event.preventDefault();
               // this.value = this.value + " abcd ";
				//$('#comName1').val(value);
				$.ajax({
				url : base_url+'bmpt/get_generic',
				type : "POST",
				data :  { medicineName:value, company:'beximco'} ,
				dataType: "json",
				success : function(msg){
					
					$('#com2Text').val(msg['generic']);
					$('#com2Con').fadeIn("slow").delay(2000).fadeOut("slow");
					
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
		
		//autocomplete for square Medicine
		$( "#square" ).autocomplete({
			source: function(request, response) {
				$.ajax({
				url : base_url+'bmpt/suggestions_com',
				data: { term: $("#square").val(),company:'square'},
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
          
            
                //event.preventDefault();
               // this.value = this.value + " abcd ";
				//$('#comName1').val(value);
				$.ajax({
				url : base_url+'bmpt/get_generic',
				type : "POST",
				data :  { medicineName:value, company:'square'} ,
				dataType: "json",
				success : function(msg){
					
					$('#com3Text').val(msg['generic']);
					$('#com3Con').fadeIn("slow").delay(2000).fadeOut("slow");
					
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
		
		//autocomplete for drugint Medicine
		$( "#drugint" ).autocomplete({
			source: function(request, response) {
				$.ajax({
				url : base_url+'bmpt/suggestions_com',
				data: { term: $("#drugint").val(),company:'drugint'},
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
          
            
                //event.preventDefault();
               // this.value = this.value + " abcd ";
				//$('#comName1').val(value);
				$.ajax({
				url : base_url+'bmpt/get_generic',
				type : "POST",
				data :  { medicineName:value, company:'drugint'} ,
				dataType: "json",
				success : function(msg){
					
					$('#com4Text').val(msg['generic']);
					$('#com4Con').fadeIn("slow").delay(2000).fadeOut("slow");
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
		
		//autocomplete for incepta Medicine
		$( "#incepta" ).autocomplete({
			source: function(request, response) {
				$.ajax({
				url : base_url+'bmpt/suggestions_com',
				data: { term: $("#incepta").val(), company:'incepta'},
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
          
            
                //event.preventDefault();
               // this.value = this.value + " abcd ";
				//$('#comName1').val(value);
				$.ajax({
				url : base_url+'bmpt/get_generic',
				type : "POST",
				data :  { medicineName:value, company:'incepta'} ,
				dataType: "json",
				success : function(msg){
					
					$('#com5Text').val(msg['generic']);
					$('#com5Con').fadeIn("slow").delay(2000).fadeOut("slow");
					
					//$('span.success').text('Data Sent!').show();
					
					//alert(msg);
					
		
					//$('#dose').load(base_url+'bmpt/show_dose');
						
					
					//$('#wrap').html(newContent);
					
				}
				
			});
				
               // $('#search').focus();
           
        
            return false;
        }
		});*/
	
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
	
	//autocomplete for emedicinetype
		$( "#emedicineType" ).autocomplete({
			source: function(request, response) {
				$.ajax({
				url : base_url+'bmpt/suggestions',
				data: { term: $("#emedicineType").val()},
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
		
		$('#com_1').load(base_url+'bmpt/show_med',{type:com});
		
		
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
					//load 5 company's medicine name (actually blank)
			  		$('#companyList').load(base_url+'bmpt/show_med');	
						
					
					//$('#wrap').html(newContent);
					
				}
				
			});
			}
			else
				alert('Dose EMPTY!!');
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
				data :  { id:$('#adviceSelect').find(':selected').attr('data-info')} ,
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
	
	//delete test
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
	
	
	///fetch test 
	$('#fetchTest').click(function(){
		
			$("#test").val($('#testSelect option:selected').val());
		
		
		
			
		
		
	});
	
	///fetch medicine 
	$('*[id^="fetchMed"]').click(function(){
		var id = this.id;
		//alert("ababuba");
		var med = "";
		if(id == 'fetchMed1')
		{
			$("#med1").val($('#com1').val());
		}
		else if(id == 'fetchMed2')
		{
			$("#med2").val($('#com2').val());
		}
		else if(id == 'fetchMed3')
		{
			$("#med3").val($('#com3').val());
		}
		else if(id == 'fetchMed4')
		{
			$("#med4").val($('#com4').val());
		}
		else 
		{
			$("#med5").val($('#com5').val());
		}
		
		
			
		
		
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
	
	
		///update company name
	$('*[id^="upCom"]').click(function(){
		var id = this.id;
		//alert("ababuba");
		var com = "";
		if(id == 'upCom1')
		{
			comID = 1;
			com = $("#comName1").val();
			
		}
		else if(id == 'upCom2')
		{
			comID = 2;
			com = $("#comName2").val();
		}
		else if(id == 'upCom3')
		{
			comID = 3;
			com = $("#comName3").val();
		}
		else if(id == 'upCom4')
		{
			comID = 4;
			com = $("#comName4").val();
		}
		else if(id == 'upCom5')
		{
			comID = 5;
			com = $("#comName5").val();
		}
		
		
			if( com != "")
			{
			 $.ajax({
				url : base_url+'bmpt/up_company',
				type : "POST",
				data :  { comID:comID, company:com} ,
				success : function(msg){
					
					//$('span.success').text('Data Sent!').show();
					
					alert(msg);
					var com = $('#medicineType').val();
		
					$('#companyList').load(base_url+'bmpt/show_med',{type:com});
					
						
					
					//$('#wrap').html(newContent);
					
				}
				
			});
			}
			else
				alert('Company Name EMPTY!!');
		
		
	});
	
	
	//update prescription
	$('#upPrescrip').click(function(){
		
		//alert("ababuba");
		
		
		var disease  = $('#disease').val();
		var prescription = $('#prescription').val();
			
		
		
		if(  disease != "" && prescription != "")
			{
			 $.ajax({
				url : base_url+'bmpt/up_prescrip',
				type : "POST",
				data :  { disease:disease, prescription:prescription} ,
				success : function(msg){
					
					//$('span.success').text('Data Sent!').show();
					
					alert(msg);
							
					
						
					
					//$('#wrap').html(newContent);
					
				}
				
			});
			}
			else
				alert('Disease/Prescription EMPTY!!');
		
		
			
		
		
	});
	
	
	
	
	
	/////Function for deleting test type from testy27
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
		if($("#emedicineType").val() != "")
		{
		 $.ajax({
            url : base_url+'bmpt/del_med_type',
            type : "POST",
            data :  { medType: $("#emedicineType").val()} ,
            success : function(msg){
                
                //$('span.success').text('Data Sent!').show();
				if(msg == 'Deleted')
				{	
					$("#emedicineType").val('');
					$("#eGeneric").val('');
					$('#companyList').load(base_url+'bmpt/show_med');
				}
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
	
	//checkbox for make prescription textarea editable or not
	$('#checkedOrNot').click(function(){
		if ($('#checkedOrNot').is(':checked')) {
			
			$('#prescription').attr('readonly',false);
		} else {
			$('#prescription').attr('readonly',true);
		} 
		
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
	
	//clear prescription Text area
	$('#clearTextArea').click(function(){	
		$('#prescription').val('');
		$('#prescriptionHolder').val('');
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
		if($("#emedicineType").val() != "" &&  $("#eGeneric").val() != "")
		{
				
		 $.ajax({
            url : base_url+'bmpt/add_med_type',
            type : "POST",
            data :  { medType: $("#emedicineType").val(), generic: $("#eGeneric").val()} ,
		    success : function(msg){
                
                //$('span.success').text('Data Sent!').show();
				if(msg == 'No entries updated. Check Generic spelling')
				{
						$("#eGeneric").val('');
				}
				else
				{
					
					$("#emedicineType").val('');
					$("#eGeneric").val('');
					$('#companyList').load(base_url+'bmpt/show_med');
				
				}
				
				alert(msg);
			
					
				
				//$('#wrap').html(newContent);
                
            }
            
        });
		}
		else
			alert('Medicine Type and/or Generic EMPTY!!');
		
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