<?php
class News_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	public function ins()
	{
			$data = array(
               'name' => 'Aumi'
               );
			$this->db->insert('test1', $data); 
	}

}