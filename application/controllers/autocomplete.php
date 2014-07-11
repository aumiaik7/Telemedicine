<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Autocomplete extends CI_Controller {

	 function __construct() 
    {
        parent::__construct();
		
		$this->load->helper('url');
		
		$filename = "ip.txt";
		/*
		$filename = "http://www.in.gr";
		*/
		//The "x" parameter can be "r","w" or "a"
		$handle = fopen($filename, "r");
		$contents = fread($handle, filesize($filename));
		fclose($handle);
		// Note: This is only included to create base urls for purposes of this demo only and are not necessarily considered as 'Best practice'.
		$this->load->vars('base_url', $contents.'telemedicine/');
		$this->load->vars('includes_dir',  $contents.'telemedicine/includes/');
		$this->load->vars('current_url', $this->uri->uri_to_assoc(1));
	}
	function index()
	{
		$this->load->view('autocomplete');
	}

	function suggestions()
	{
		$this->load->model('autocomplete_model');
	$term = $this->input->post('term',TRUE);

	if (strlen($term) < 2) break;

	$rows = $this->autocomplete_model->GetAutocomplete(array('keyword' => $term));

	$json_array = array();
	foreach ($rows as $row)
		 array_push($json_array, $row->mystring);

	echo json_encode($json_array);
	}
}

/* End of file autocomplete.php */
/* Location: ./application/controllers/autocomplete.php */