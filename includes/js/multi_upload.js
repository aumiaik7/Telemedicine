


$(document).ready(function() {
	
	
	
	var base_url = $('#base_url').val();
	
	
	$('#upImage').click(function(){
       var pID=$('#ptntID').text();  
	   var eID=$('#examID').text(); 
	  
	  
	   var parts1 = [];
	   var parts2 = [];
	   var parts3 = [];
	   var parts4 = [];
	   var parts5 = [];
	   parts1.push('');
	   parts1.push('');
	    parts2.push('');
	   parts2.push('');
	    parts3.push('');
	   parts3.push('');
	    parts4.push('');
	   parts4.push('');
	    parts5.push('');
	   parts5.push('');
	 
	 
	 
	   var search_image1=$('#report1').attr('value') ;
	   if( search_image1 !='')
	   {   
	   	   var leafname1 = search_image1.split('\\').pop().split('/').pop();
		   parts1 = leafname1.split('.');
	   }
	   
	   var search_image2=$('#report2').attr('value') ;
	   if( search_image2 !='')
	   {  
	        var leafname2= search_image2.split('\\').pop().split('/').pop();
		    parts2 = leafname2.split('.');
	   }
	   
	   var search_image3=$('#report3').attr('value') ;
	   if( search_image3 !='')
	   {   
	   		var leafname3= search_image3.split('\\').pop().split('/').pop();
		    parts3 = leafname3.split('.');
	   }
	   
	   var search_image4=$('#report4').attr('value') ;
	   if( search_image4 !='')
	   {   
	   	   var leafname4= search_image4.split('\\').pop().split('/').pop();
		   parts4 = leafname4.split('.');
	   }
	   
	   var search_image5=$('#report5').attr('value') ;
	   if( search_image5 !='')
	   {   
	   	   var leafname5= search_image5.split('\\').pop().split('/').pop();
		   parts5 = leafname5.split('.');
	   }
	   //alert(parts1[0]+'.'+parts1[1]+parts2[0]+'.'+parts2[1]+parts3[0]+'.'+parts3[1]);     
	  
		   if (pID != '' && eID !=''){
       		$.ajax({
            url: base_url+'bmpt/report_store',
            type: 'POST',
            data: {pID:pID, eID:eID, im1:parts1[0],im1_:parts1[1] , im2:parts2[0],im2_:parts2[1] , im3:parts3[0],im3_:parts3[1] , im4:parts4[0],im4_:parts4[1] , im5:parts5[0],im5_:parts5[1]},
            dataType: "html",
            success: function(msg) {                    
                //$('#result').html(msg);
				//$('#patient_id').val(msg);
				//alert(msg);
				
            }
			
       });        }  
	   else 
	   {
			alert(' No Patient Selected!!S');
		}  
       //event.preventDefault();             
       //return false;          
  });

});