<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class location_model extends CI_Model
	{
 
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
 
	public function get_locations()
	{
	  return $this->db->get("xin_office_location");
	}
	 
	 public function read_location_information($id) {
	
		$sql = 'SELECT * FROM xin_office_location WHERE location_id = ?';
		$binds = array($id);
		$query = $this->db->query($sql, $binds);
		
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return null;
		}
	}
	public function get_company_office_location($company_id) {
	
		$sql = 'SELECT * FROM xin_office_location WHERE company_id = ?';
		$binds = array($company_id);
		$query = $this->db->query($sql, $binds);
		return $query;
	}
	
	
	// Function to add record in table
	public function add($data){
		$this->db->insert('xin_office_location', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
	
	// Function to Delete selected record from table
	public function delete_record($id){
		$this->db->where('location_id', $id);
		$this->db->delete('xin_office_location');
		
	}
	
	// Function to update record in table
	public function update_record($data, $id){
		$this->db->where('location_id', $id);
		if( $this->db->update('xin_office_location',$data)) {
			return true;
		} else {
			return false;
		}		
	}
	
	// Function to update record without logo > in table
	public function update_record_no_logo($data, $id){
		$this->db->where('location_id', $id);
		if( $this->db->update('xin_office_location',$data)) {
			return true;
		} else {
			return false;
		}		
	}
	
	// get all office locations
	public function all_office_locations() {
	  $query = $this->db->query("SELECT * from xin_office_location");
  	  return $query->result();
	}
        
        public function get_divisions()
	{
          $query = $this->db->query("SELECT * from divisions");
  	  return $query->result();
	}
        public function get_division($id)
	{
          $sql = 'SELECT * FROM divisions WHERE id = ?';
		$binds = array($id);
		$query = $this->db->query($sql, $binds);
		
		if ($query->num_rows() > 0) {
			return $query->row();
		} else {
			return null;
		}
	}
         public function get_district($id)
	{
          $sql = 'SELECT * FROM districts WHERE id = ?';
		$binds = array($id);
		$query = $this->db->query($sql, $binds);
		
		if ($query->num_rows() > 0) {
			return $query->row();
		} else {
			return null;
		}
	}
        public function get_districts($division_id) {
	
		$sql = 'SELECT * FROM districts WHERE division_id = ?';
		$binds = array($division_id);
		$query = $this->db->query($sql, $binds);
		return $query->result();
	}
        public function get_upazilas($district_id) {
	
		$sql = 'SELECT * FROM upazilas WHERE district_id = ?';
		$binds = array($district_id);
		$query = $this->db->query($sql, $binds);
		return $query->result();
	}
        
         public function get_training_categories()
	{
          $query = $this->db->query("SELECT * from xin_professional_training_category");
  	  return $query->result();
	}
        public function get_training_ategory_info($id)
	{
            $sql = 'SELECT * FROM xin_professional_training_category WHERE id = ?';
            $binds = array($id);
            $query = $this->db->query($sql, $binds);
            return $query->result();
	}
        
}
?>