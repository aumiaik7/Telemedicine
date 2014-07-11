<?php
/**
 * Autocomplete_Model
 *
 * @package autocomplete
 */

class Autocomplete_Model extends CI_Model
{
    //Autocomplete for medicine type
	function GetAutocomplete($options = array())
    {
	    $this->db->select('medicineType');
	    $this->db->like('medicineType', $options['keyword'], 'after');
   		$query = $this->db->get('medicinetypey22');
		return $query->result();
    }
	
	//Autocomplete for disease for prescription
	function GetAutocomplete_disease($options = array())
    {
	    $this->db->select('disease');
	    $this->db->like('disease', $options['keyword'], 'after');
   		$query = $this->db->get('prescriptiony25');
		return $query->result();
    }
	
	
	// autocomplete for incepta medicine
	function GetAutocomplete_com5($options = array())
    {
		
	    $this->db->select('medicineName');
	    $this->db->like('medicineName', $options['keyword'], 'like');
   		$query = $this->db->get('incepta');
		return $query->result();
    }
	
	
	// autocomplete for aci medicine
	function GetAutocomplete_com($options = array())
    {
	    $this->db->select('medicineName');
	    $this->db->like('medicineName', $options['keyword'], 'after');
		$this->db->or_like('medicineName', ' '.$options['keyword']);
   		$query = $this->db->get($options['company']);
		return $query->result();
    }
	
	//autocomplete for test
	function GetAutocomplete_test($options = array())
    {
	    $this->db->select('testType');
	    $this->db->like('testType', $options['keyword'], 'after');
   		$query = $this->db->get('testtypey26');
		return $query->result();
    }
	
	//autocomplete for search Patient ID
	function GetAutocomplete_sid($options = array())
    {
	    $this->db->select('searchID');
	    $this->db->like('searchID', $options['keyword'], 'after');
   		$query = $this->db->get('patientx22');
		return $query->result();
    }
	
	//autocomplete for search Patient Mobile
	function GetAutocomplete_mobile($options = array())
    {
	    $this->db->distinct();
		$this->db->select('phone');
	    $this->db->like('phone', $options['keyword'], 'like');
   		$query = $this->db->get('patientx22');
		return $query->result();
    }
	
	
	function GetAutocomplete_report($options = array())
    {
		
	    $fields = $this->db->list_fields('reportz23');
		return $fields;
    }
}