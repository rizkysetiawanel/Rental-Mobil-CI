<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mfacility extends CI_Model {


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
		$this->db->from('bb_seat');

		$query = $this->db->get();
		return $query->result();
	}

	function load_dataPage($order, $offset, $limit, $search)
	{

		$this->db->select('*');
		$this->db->from('facility');

		if($search != NULL)
		{
			$this->db->like('title_facility', $search);
		}
       	$this->db->order_by('id_facility', $order); 
        if($limit != NULL && $offset!=NULL)
        {
        	$this->db->limit($limit,$offset);
        }
       	elseif($offset == NULL)
       	{
       		$this->db->limit($limit);
       	}
        
        $query = $this->db->get();
        
        return $query->result();
	}

	function save_data()
	{
		// var data
		$title 		= $this->input->post('facility');

		$date  		= date('Y-m-d', now());
		$time  		= date('H:i:s', now());

		$data = array(
				'total_seat' 		=> $title,
				'date_seat'			=> $date,
				'time_seat'			=> $time,
				'date_time_seat'	=> $date.' '.$time
			);

		$this->db->insert('bb_seat', $data);

		$res = 'Data seat berhasil di input';

		return $res;

	}

// end of model
}