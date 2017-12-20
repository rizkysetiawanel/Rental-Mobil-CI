<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pfacility extends CI_Model {


	function __construct()
	{
		parent::__construct();

		// load helper
		$this->load->helper('date');

		// load library
		$this->load->library('upload');
	}

	function load_data()
	{
		$this->db->select('*');
		$this->db->from('facility');

		$query = $this->db->get();
		return $query->result();
	}

	// load data for hotel sp
	function load_dataHsp()
	{
		$this->db->select('*');
		$this->db->from('hotel_facility_meta');
		$this->db->join('facility', 'hotel_facility_meta.id_facility = facility.id_facility');

		$query = $this->db->get();
		return $query->result();
	}

// end of model
}