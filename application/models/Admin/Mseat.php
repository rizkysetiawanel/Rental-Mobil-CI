<?php

/**
 * @package			Codeigniter
 * @author      	Yulius
 * @license 		http://codeigniter.com/user_guide/license.html
 * @since 			Version 3.1.4
*/


// ------------------------------------------------------------------------

/**
 *	Application Controller Class seat extends MY_Controller
 * 
 *	Class ini untuk model seat
 *
 *	@subpackage			helper
*/

defined('BASEPATH') OR exit('No direct script access allowed');

class Mseat extends CI_Model {


	// Konstruktur
	function __construct()
	{
		parent::__construct();

		// mengambil data model, library, helper

		/**
		 *
		 * Model dan Helper di define dengan array
		 *
		*/
		$array_helper = array(
						'date'
			);

		// HELPER
		$this->load->helper($array_helper);
	}

	// function mengambil data
	public function load_data()
	{
		$this->db->select('*');
		$this->db->from('bb_seat');

		$query = $this->db->get();
		return $query->result();
	}

	// fugsi menyimpan data seat
	public function save_data()
	{
		// mengambil data dari post
		$title 		= $this->input->post('title');

		// waktu dan tanggal
		$date 		= date('Y-m-d', now());
		$time 		= date('H:i:s', now());

		// filter jika sama dengan database

		$check		= $this->db->query("select * from bb_seat where total_seat = '$title'");
		$check_res 	= $check->result();

		if(count($check_res)>0)
		{
			echo 'Total seat sudah ada silahkan ganti dengan yang lain';
		}
		else
		{
			// insert data
			$data 		= array(
							'total_seat' 	=> $title,
							'date_seat' 	=> $date,
							'time_seat'		=> $time,
							'date_time_seat'=> $date.' '.$time
				);

			$this->db->insert('bb_seat', $data);

			echo 'Seat telah disimpan';
		}
	}

	// fungsi edit data seat
	public function edit_data($id)
	{
		$this->db->select('*');
		$this->db->from('bb_seat');
		$this->db->where('id_seat', $id);

		$query = $this->db->get();
		return $query->result();
	}

	// fungsi filter edit data seat
	public function filter_edit_data()
	{
		// mengambil data input post
		$id 	= $this->input->post('id');
		$title  = $this->input->post('title');
		$titlef = $this->input->post('titlef');

		// check database untuk total seat yang sama
		if($title === $titlef)
		{
			$this->save_edit_data($id, $title);
		}
		else
		{
			$check		= $this->db->query("select * from bb_seat where total_seat = '$title'");
			$check_res 	= $check->result();

			if(count($check_res)>0)
			{
				echo "Total seat sudah ada ganti dengan yang lain";
			}
			else
			{
				$this->save_edit_data($id, $title);
			}
		}
	}


	// fungsin inset edit data ke database
	public function save_edit_data($id, $title)
	{
		// data
		$data = array(
				'total_seat' 	=> $title
			);

		// update
		$this->db->where('id_seat', $id);
		$this->db->update('bb_seat', $data);

		echo "Seat sudah disimpan";
	}

	// fungsi menghapus data
	public function delete_data($id)
	{
		$this->db->where('id_seat', $id);
		$this->db->delete('bb_seat');

		echo "Seat sudah dihapus";
	}

// end model
}