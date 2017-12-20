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
 *	@subpackage			helper
*/

defined('BASEPATH') OR exit('No direct script access allowed');

class Mpage extends CI_Model {


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

	// fungsi load data halaman
	public function load_data()
	{
		$this->db->select('*');
		$this->db->from('bb_page');

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
	public function load_data_page($order, $offset, $limit, $search)
	{

		$this->db->select('*');
		$this->db->from('bb_page');

		// kondisi jika kata kunci tidak ada
		if($search != NULL)
		{
			$this->db->like('name_page', $search);
		}

       	$this->db->order_by('id_page', $order);

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

	// fungsi menyimpan data halaman
	public function save_data()
	{
		// mengambil data input metode post
		$title		= $this->input->post('title');
		$desc		= $this->input->post('desc');

		// tanggal dan waktu
		$date 		= date('Y-m-d', now());
		$time		= date('H:i:s', now());

		// membuat slug / url halaman
		$slug		= url_title($title, '-', TRUE);

		// mengecheck jika judul halaman sudah dipakai
		$check		= $this->db->query("select * from bb_page where name_page = '$title'");
		$check_res	= $check->result();

		if(count($check_res)>0)
		{
			echo "Judul halaman sudah ada";
		}
		else
		{
			$data 	= array(
						'name_page'			=> $title,
						'desc_page'			=> $desc,
						'slug_page'			=> $slug,
						'date_page'			=> $date,
						'time_page'			=> $time,
						'date_time_page'	=> $date.' '.$time
				);

			// memasukan data ke database
			$this->db->insert('bb_page', $data);

			echo "Halaman sudah disimpan";
		}
	}

	// fungsi menload data edit
	public function edit_data($id)
	{
		$this->db->select('*');
		$this->db->from("bb_page");
		$this->db->where('id_page', $id);

		$query = $this->db->get();
		return $query->result();
	}

	// fungsi memfilter halaman yang diedit
	public function filter_edit_data()
	{
		$id 	= $this->input->post('id');
		$title 	= $this->input->post('title');
		$desc 	= $this->input->post('desc');
		$namef  = $this->input->post('namef');

		// mengecheck jika judul halaman sudah ada di database
		if($title === $namef)
		{
			$this->save_edit_data($id, $title, $desc);
		}
		else
		{
			$check 		= $this->db->query('SELECT * FROM bb_page WHERE id_page = "$title"');
			$check_res	= $check->result();

			if(count($check_res)>0)
			{
				echo "Judul halaman sudah ada silahkan ganti dengan yang lain";
			}
			else
			{
				$this->save_edit_data($id, $title, $desc);
			}
		}
	}

	// fungsi menyiman halaman yang diedit
	public function save_edit_data($id, $title, $desc)
	{
		$data 	= array(
					'name_page'	=> $title,
					'desc_page'	=> $desc,
					'slug_page'	=> url_title($title, '-', TRUE)
			);

		$this->db->where('id_page', $id);
		$this->db->update('bb_page', $data);

		echo "Halaman sudah diedit";
	}

	// fungsi menghapus halaman
	public function delete_data($id)
	{
		$this->db->where('id_page', $id);
		$this->db->delete('bb_page');

		echo 'Halaman sudah dihapus';
	}

// end model
}

