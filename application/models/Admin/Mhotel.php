<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mhotel extends CI_Model {


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

		$query = $this->db->get();
		return $query->result();
	}

	function load_dataPage($order, $offset, $limit, $search)
	{

		$this->db->select('*');
		$this->db->from('bb_vehicle');

		if($search != NULL)
		{
			$this->db->like('name_vh', $search);
		}
       	$this->db->order_by('id_vh', $order); 
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

	function save_data($array, $arraytwo)
	{
		$title 		= $this->input->post('title');
		$desc  		= $this->input->post('desc');
		$price 		= $this->input->post('price');

		$date  = date('Y-m-d', now());
		$time  = date('H:i:s', now());

		$data  = $_POST['imageFile'];
		$slug  = url_title($title, '-', TRUE);

		list($type, $data) = explode(';', $data);
		list(, $data)      = explode(',', $data);
		$data = base64_decode($data);
		$imageName = 'tg'.time().'.png';
		file_put_contents('assets/hpublic/img_hotel/'.$imageName, $data);

		$hotel = array(
				'name_vh'		=> $title,
				'desc_vh'		=> $desc,
				'slug_vh'		=> $slug,
				'image_vh'		=> $imageName,
				'price_vh'		=> $price,
				'date_vh'		=> $date,
				'time_vh'		=> $time,
				'date_time_vh'	=> $date.' '.$time
			);

		$this->db->insert('bb_vehicle', $hotel);

		$id_hotel = $this->db->insert_id();

		$id_fac   = $array;

		foreach($id_fac as $ifc)
		{
			$fachotel[] = array(
					'id_vh'			=> $id_hotel,
					'id_seat'		=> $ifc,
					'date_ms'		=> $date,
					'time_ms'		=> $time,
					'date_ms'		=> $date.' '.$time
				);
		}
		$this->db->insert_batch('bb_meta_seat', $fachotel);

		$id_troom = $arraytwo;

		foreach($id_troom as $itr)
		{
			$itrhotel[] = array(
					'id_vh'				=> $id_hotel,
					'id_cat'			=> $itr,
					'date_mc'			=> $date,
					'time_mc'			=> $time,
					'date_time_mc'		=> $date.' '.$time
				);
		}
		$this->db->insert_batch('bb_meta_category', $itrhotel);

		return $fachotel;
	}

	function delete_data()
	{
		$id_hotel = $this->input->post('id');

		// delete hotel
		$this->db->where('id_hotel', $id_hotel);
		$this->db->delete('hotel');

		// delete meta
		$this->db->where('id_hotel', $id_hotel);
		$this->db->delete('hotel_facility_meta');

		$res = 'Data hotel sudah dihapus';

		return $res;
	}

// end of model
}