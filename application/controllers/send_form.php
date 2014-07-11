<?php
 


class controller_send_form {
	
	function validate()
	{
		$ajax = ajax();
		
		$ajax->info("Successful");
	}
	
	function submit_form($form_fields)
	{
		 $ajax = ajax(); 
         
        $ajax->alert("Server Says....\n\t\t".print_r($form_fields,1)); 
	}
}