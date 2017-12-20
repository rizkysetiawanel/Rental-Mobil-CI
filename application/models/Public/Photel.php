<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Photel extends CI_Model {


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
		$this->db->from('bb_vehicle');
		$this->db->join('bb_meta_category', 'bb_meta_category.id_vh = bb_vehicle.id_vh');
		$this->db->join('bb_category', 'bb_category.id_cat = bb_meta_category.id_cat');

		$query = $this->db->get();
		return $query->result();
	}

	function load_name($slug)
	{
		$this->db->select('*');
		$this->db->from('bb_vehicle');
		$this->db->where('slug_vh', $slug);

		$query = $this->db->get();
		
		foreach($query->result() as $row)
		{
			$res = $row->name_vh;
		}

		return $res;
	}

	function load_sc($slug)
	{
		$this->db->select('*');
		$this->db->from('bb_vehicle');
		$this->db->where('slug_vh', $slug);

		$query = $this->db->get();
		return $query->result();
	}

	function load_id($id)
	{
		$this->db->select('*');
		$this->db->from('bb_vehicle');
		$this->db->where('id_vh', $id);

		$query = $this->db->get();
		return $query->result();
	}

	function load_inv($unique_id)
	{
		$this->db->select('*');
		$this->db->from('bb_invoice');
		$this->db->where('code_inv', $unique_id);

		$query = $this->db->get();
		return $query->result();
	}

// end of model
}