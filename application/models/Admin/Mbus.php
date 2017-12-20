<?php

/**
 * @package			Codeigniter
 * @author      	Yulius
 * @license 		http://codeigniter.com/user_guide/license.html
 * @since 			Version 3.1.4
*/


// ------------------------------------------------------------------------

/**
 *	Application Controller Class Dashboard extends MY_Controller
 * 
 *	Class ini untuk halaman index / dashboard admin
 *
 *	@subpackage			library, helper
*/

defined('BASEPATH') OR exit('No direct script access allowed');

class Mbus extends CI_Model {


	// konstruktur
	function __construct()
	{
		parent::__construct();

		// HELPER
		$this->load->helper('date');

		// LIBRARY
		$this->load->library('upload');
	}

	// mengambil data bus
	public function load_data()
	{
		$this->db->select('*');
		$this->db->from('bb_vehicle');

		$query = $this->db->get();
		return $query->result();
	}

	// mengambil data bus per halaman
	/**
	 *
	 *	$order 	= menentukan order database, desc / asc / random
	 *	$offset = halaman
	 * 	$limit 	= Batas pengambilan data
	 * 	$search = Keyword / kata kunci 
	 *
	*/
	public function load_dataPage($order, $offset, $limit, $search)
	{

		$this->db->select('*');
		$this->db->from('bb_vehicle');

		// kondisi jika kata kunci tidak ada
		if($search != NULL)
		{
			$this->db->like('name_vh', $search);
		}

       	$this->db->order_by('id_vh', $order);

       	// kondisi jika pembatasan dan offset tidak ada
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

	// menyimpan data bus
	public function save_data($array_one, $array_two)
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
		file_put_contents('assets/hpublic/img_bus/'.$imageName, $data);

		$bus    = array(
				'name_vh'		=> $title,
				'desc_vh'		=> $desc,
				'slug_vh'		=> $slug,
				'image_vh'		=> $imageName,
				'price_vh'		=> $price,
				'date_vh'		=> $date,
				'time_vh'		=> $time,
				'date_time_vh'	=> $date.' '.$time
			);

		$this->db->insert('bb_vehicle', $bus);

		$id_bus = $this->db->insert_id();

		$id_fac   = $array;

		foreach($id_fac as $ifc)
		{
			$facbus[] = array(
					'id_vh'			=> $id_bus,
					'id_seat'		=> $ifc,
					'date_ms'		=> $date,
					'time_ms'		=> $time,
					'date_ms'		=> $date.' '.$time
				);
		}
		$this->db->insert_batch('bb_meta_seat', $facbus);

		$id_troom = $arraytwo;

		foreach($id_troom as $itr)
		{
			$itrhotel[] = array(
					'id_vh'				=> $id_bus,
					'id_cat'			=> $itr,
					'date_mc'			=> $date,
					'time_mc'			=> $time,
					'date_time_mc'		=> $date.' '.$time
				);
		}
		$this->db->insert_batch('bb_meta_category', $itrhotel);

		return $facbus;
	}

	// fungsi load data edit
	public function load_data_edit($id)
	{
		$this->db->select('*');
		$this->db->from('bb_vehicle');
		$this->db->where('id_vh', $id);

		$query = $this->db->get();
		return $query->result();
	}

	// fungsi hapus data
	public function delete_data($id)
	{
		$this->db->where('id_vh', $id);
		$this->db->delete('bb_vehicle');

		echo "Bus sudah di hapus";
	}

	// fungsi filter edit data


	// fungsi save edit data
	public function save_edit_data()
	{
		$id 		= $this->input->post('idbus');
		$title 		= $this->input->post('title');
		$desc  		= $this->input->post('desc');
		$price 		= $this->input->post('price');

		$date  = date('Y-m-d', now());
		$time  = date('H:i:s', now());

		$data  = $_POST['imageFile'];
		$slug  = url_title($title, '-', TRUE);


		if($data == 'data:,')
		{
			$bus    = array(
					'name_vh'		=> $title,
					'desc_vh'		=> $desc,
					'slug_vh'		=> $slug,
					'price_vh'		=> $price,
					'date_vh'		=> $date,
					'time_vh'		=> $time,
					'date_time_vh'	=> $date.' '.$time
				);

			$this->db->where('id_vh', $id);
			$this->db->update('bb_vehicle', $bus);
		}
		else
		{
			list($type, $data) = explode(';', $data);
			list(, $data)      = explode(',', $data);
			$data = base64_decode($data);
			$imageName = 'tg'.time().'.png';
			file_put_contents('assets/hpublic/img_hotel/'.$imageName, $data);

			$bus    = array(
					'name_vh'		=> $title,
					'desc_vh'		=> $desc,
					'slug_vh'		=> $slug,
					'image_vh'		=> $imageName,
					'price_vh'		=> $price,
					'date_vh'		=> $date,
					'time_vh'		=> $time,
					'date_time_vh'	=> $date.' '.$time
				);

			$this->db->where('id_vh', $id);
			$this->db->update('bb_vehicle', $bus);	
		}

		echo "Data sudah di edit";

	}

}