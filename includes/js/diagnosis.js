


$(document).ready(function() {
	var base_url = $('#base_url').val();
	var pid = $('#ptntID').text();
	var eid = $('#examID').text();
	//alert(base_url);
	//$('#prescription').load(base_url+'bmpt/load_prescrip', {pid:pid, eid:eid});
	
	//$('#report').load(base_url+'bmpt/load_report', {pid:pid, eid:eid});
	
	$('#forceLoad').click(function(){
		
		var pid = $('#ptntID').text();
		var eid = $('#examID').text();
		$('#prescription').load(base_url+'bmpt/load_prescrip',{pid:pid, eid:eid});
	});
	
	
	
	
	
	$('#diagSubmit').click(function(){
        //send ajax request
		var id = $('#ptntID').text();
		var exam_id = $('#examID').text();
		var height = $('#patient_height').val();
		var weight = $('#patient_weight').val();
		var temp = $('#patient_temp').val();
		var pr = $('#patient_pr').val();
		var bp = $('#patient_bp').val();
		var symptom = $('textarea[name=symptom]').val();
		
		if($("#groupID").val() == 4)
		{
			var doc =  $("#doctorList_1").val();
			
		}
		else if ($("#groupID").val() == 3)
		{
			var doc = $('#doctorList option:selected').val();
			
		}
        
        $.ajax({
            url : base_url+'bmpt/submit_diagnosis',
            type : "POST",
            data : "id="+id+"&exam_id="+exam_id+"&height="+height+"&weight="+weight+"&temp="+temp+"&pr="+pr+"&bp="+bp+"&symptom="+symptom+"&doc="+doc ,
			dataType: "html",
            success : function(msg){
                
               
				
				alert(msg);
			
					
				
				
                
            }
            
        })
		/*var day = $('#element_3_1').val();
		var male = $('input[name=element_7]:checked').val();
		 alert($('input[name=element_7]:checked').val());
     	$('span.displayData').html('<p>Day   : '+day+'  MOnth  : '+male+'</p>').show();*/
     event.preventDefault();      
    });
})