
<?php
class Patients extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }

    public function record_count() {
        return $this->db->count_all("patientx22");
    }
	public function record_count_op($opID) {
        
		$query = $this->db->get_where("patientx22",array('user'=>$opID));
		return $query->num_rows();
		
    }
	public function record_count_doc($docID) {
        
		$query = $this->db->get_where("examinationx24",array('docID'=>$docID));
		return $query->num_rows();
		
    }

    public function fetch_patients($limit, $start) {
        $this->db->limit($limit, $start);
		$this->db->order_by("patientID", "asc");
		$this->db->select('searchID,patientName'); 
        $query = $this->db->get("patientx22");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
    public function fetch_patients_op($limit, $start, $opID) {
        $this->db->limit($limit, $start);
		$this->db->order_by("patientID", "asc"); 
		$this->db->select('searchID,patientName');
		$query = $this->db->get_where("patientx22",array('user'=>$opID));

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
   
    public function fetch_patients_mobile($limit, $start, $mobile) {
        $this->db->limit($limit, $start);
		//$this->db->order_by("patientID", "asc"); 
		$this->db->select_min('patientID');
		$this->db->select('searchID,patientName');
		$query = $this->db->get_where("patientx22",array('phone'=>$mobile));

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
   
   
    public function fetch_patients_doc($limit, $start, $docID) {
        $this->db->limit($limit, $start);
		$this->db->order_by("searchID", "asc");
		$this->db->distinct(); 
		$this->db->select('searchID');
		$query = $this->db->get_where("examinationx24",array('docID'=>$docID));

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
   
}