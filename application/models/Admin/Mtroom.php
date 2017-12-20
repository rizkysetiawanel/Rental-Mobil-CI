<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mtroom extends CI_Model {


	function __construct()
	{
		parent::__construct();

		// load helper
		$this->load->helper('date');

		// load library
		$this->load->library('upload');
	}


	// load data
	function load_data()
	{
		$this->db->select('*');
		$this->db->from('bb_category');

		$query = $this->db->get();
		return $query->result();
	}

	function load_dataPage($order, $offset, $limit, $search)
	{

		$this->db->select('*');
		$this->db->from('bb_category');

		if($search != NULL)
		{
			$this->db->like('name_cat', $search);
		}
       	$this->db->order_by('id_cat', $order); 
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

	// save data
	function save_data()
	{
		$title	= $this->input->post('title');
		$desc	= $this->input->post('desc');

		$slug 	= url_title($title, '-', TRUE);

		$date   = date('Y-m-d', now());
		$time 	= date('H:i:s', now());

		$data 	= array(
					'name_cat'		=> $title,
					'desc_cat'		=> $desc,
					'slug_cat'		=> $slug,
					'date_cat'		=> $date,
					'time_cat'		=> $time,
					'date_time_cat'	=> $date.' '.$time
			);

		$this->db->insert('bb_category', $data);

		$res = 'Tipe hotel sudah disimpan';

		return $res;
	}

// end model
}