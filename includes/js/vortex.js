


$(document).ready(function() {
	var base_url = $('#base_url').val();
	
	/*//Generate Report from Patient Info
	$('#genReport').click(function(){
		//alert('AAA');
		  $.ajax({
            url: base_url+'bmpt/hello_world',
            type: 'POST',
            dataType: "json"
           
			
       });     
	});
	*/
	
	
	
	
	
	
	$('#searchByID').click(function(){
       var search_id= $('#pID').val();  
	  
		if (search_id != '' ){
        $.ajax({
            url: base_url+'bmpt/search_patient_byid',
            type: 'POST',
            data: "id="+search_id ,
            dataType: "json",
            success: function(msg) {                    
                //$('#result').html(msg);
				//$('#patient_id').val(msg);
				//alert(msg);
				if(msg[0] == 1)
				{
					
					$('#ptntID').text('--');
					$('#pName').text('--');
					$('#pSex').text('--');
					$('#pDob').text('--');
					$('#pAddress').text('--');
					$('#pPhone').text('--');
					$('#pOccupation').text('--');
					$('#pMarital').text('--');
					$('#pReligion').text('--');
					$('#pNid').text('--');
					//$('#pCenter').text('--');
					$('#pRef').text('--');
					$('#pImage').attr("src","../uploads/whiteImage.jpg");
					$('#pID2').val('');
					alert(msg[1]);
				}
				else
				{
					
					$('#ptntID').text(search_id);
					$('#pName').text(msg[0]);
					$('#pSex').text(msg[1]);
					$('#pDob').text(msg[2]);
					var parts = msg[3].split(';');
					var address = 'Village :'+parts[0]+' P/O :'+parts[1]+' Union :'+parts[2]+' Upazila :'+parts[3]+' Zila :'+parts[4];
					$('#pAddress').text(address);
					$('#pPhone').text(msg[4]);
					$('#pOccupation').text(msg[5]);
					$('#pMarital').text(msg[6]);
					$('#pReligion').text(msg[7]);
					$('#pNid').text(msg[8]);
					//$('#pCenter').text(msg[9]);
					$('#pImage').attr("src","../uploads/"+msg[10]);
					if(msg[11]!=0)
					$('#pRef').text(parseInt(msg[11])+101000);
					$('#pID2').val(search_id);
					
					$('#hptntID').val(search_id);
					$('#hpName').val(msg[0]);
					$('#hpSex').val(msg[1]);
					$('#hpDob').val(msg[2]);
					$('#hpAddress').val(address);
					$('#hpPhone').val(msg[4]);
					$('#hpOccupation').val(msg[5]);
					$('#hpMarital').val(msg[6]);
					$('#hpReligion').val(msg[7]);
					$('#hpNid').val(msg[8]);
					//$('#hpCenter').val(msg[9]);
					if(msg[11]!=0)
					$('#hpRef').val(parseInt(msg[11])+101000);
					
				}
				
            }
			
       });        }  
	   else 
	   {
			alert(' Field(s) empty');
		}  
       event.preventDefault();             
       //return false;          
  });
	
	
	
	
	
	$('#btn_saveForm').click(function(){
       var patient_id=$('#patient_id').val();  
	   var search_image=$('#imageUpload').attr('value') 
	   var leafname= search_image.split('\\').pop().split('/').pop();
	   var parts = leafname.split('.');
	   //alert(parts[0]);     
	  
		   if (patient_id != '' && search_image !=''){
       $.ajax({
            url: base_url+'bmpt/image_store',
            type: 'POST',
            data: "id="+patient_id+"&image="+parts[0]+"&image_ext="+parts[1] ,
            dataType: "html",
            success: function(msg) {                    
                //$('#result').html(msg);
				//$('#patient_id').val(msg);
				//alert(msg);
				
            }
			
       });        }  
	   else 
	   {
			alert(' Field(s) empty');
		}  
       event.preventDefault();             
       //return false;          
  });
  
  
	$('#btnSubmit').click(function(){
		
	
        //send ajax request
     
	 
	  
                   
	  var name = $.trim($('#patient_name').val());
	  var parts = name.split(' ');
	  var year = $('#element_3_3').val();
	  if(parts.length>1 && parts[0].length >1 && parts[parts.length-1].length >1 && $('#element_3_1').val() != '' && $('#element_3_2').val() != '' && year.length ==4)
       { 
	   //$('#btnSubmit').unbind('click');
		
	   $.ajax({
            url : base_url+'bmpt/sendToDb',
            type : "POST",
            data : $('#wrap form').serialize(),
			beforeSend: function() {
            if (window.nextPageProcess) {
              return false;
            } 
			else {
              window.nextPageProcess = 1;
             }
             },
            success : function(msg){
                
				
                //$('span.success').text('Data Sent!').show();
				if(msg == 'Patient not created')
				alert(msg);
				else if (msg == '')
				{
					alert('Wrong Reference ID ');
				}
				else
				{
					alert('Patient Created Successfully');
				//clear elements
					$('#patient_name').val('');//name
					
					var ele = document.getElementsByName("element_7");
					for(var i=0;i<ele.length;i++)
						ele[i].checked = false;

					//$('#aba').text('Mobile'); // day					
					$('#element_3_1').val(''); // day
					$('#element_3_2').val(''); //month
					$('#element_3_3').val('');  //year
					$('#village').val(''); // address
					$('#po').val(''); // address
					$('#phone').val('') // phone
					$('#occupation').val('') // occupation
					$('#national_id').val(''); // national ID
					$('#center').val(''); // center
						
					$('#result').html('Patient ID is :'+ msg);
					$('#patient_id').val(msg);
					
					
				}
					
				
				//$('#wrap').html(newContent);
				window.nextPageProcess = false;
                
            }
            
        });
	   }
	   else
	   {
			if(parts.length < 2 || parts[parts.length-1] ==  '' || parts[0].length <2 || parts[parts.length-1].length <2)
			{
				alert('Patient name atleast have 2 parts. Each part atleast of two characters');
			}  
			else
			{
				alert('Date of Birth input is not Okay.');	
			} 
		}
		/*var day = $('#element_3_1').val();
		var male = $('input[name=element_7]:checked').val();
		 alert($('input[name=element_7]:checked').val());
     	$('span.displayData').html('<p>Day   : '+day+'  MOnth  : '+male+'</p>').show();*/
		
		  //$('#btnSubmit').bind('click');
		   e.preventDefault();
      
    });
	
	$("#pID").keyup(function(event){
    		if(event.keyCode == 13){
    	  		  $("#searchByID").click();
   			 }
		});
		
		
		//autocomplete for testTtype
		$( "#ref_id" ).autocomplete({
			source: function(request, response) {
				$.ajax({
				url : base_url+'bmpt/suggestions_sid',
				data: { term: $("#ref_id").val()},
				dataType: "json",
				type: "POST",
				success: function(data){
					
					 
					response(data);
				}
			});
		},
		minLength: 2
		});
		
		$( "#pID" ).autocomplete({
			source: function(request, response) {
				$.ajax({
				url : base_url+'bmpt/suggestions_sid',
				data: { term: $("#pID").val()},
				dataType: "json",
				type: "POST",
				success: function(data){
					
					 
					response(data);
				}
			});
		},
		minLength: 2
		});
		
		$( "#pID2" ).autocomplete({
			source: function(request, response) {
				$.ajax({
				url : base_url+'bmpt/suggestions_sid',
				data: { term: $("#pID2").val()},
				dataType: "json",
				type: "POST",
				success: function(data){
					
					 
					response(data);
				}
			});
		},
		minLength: 2
		});
		
		
	
});