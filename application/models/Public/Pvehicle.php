<?php

/**
 * @package			Codeigniter
 * @author      	Yulius
 * @license 		http://codeigniter.com/user_guide/license.html
 * @since 			Version 3.1.4
*/


// ------------------------------------------------------------------------

/**
 *	Application Controller Class Pvehicle extends CI_Model
 * 
 *	Class ini untuk model kendaraan
 *
 *	@subpackage			library, helper
*/

defined('BASEPATH') OR exit('No direct script access allowed');

class Pvehicle extends CI_Model {

	// mengambil data kendaraan
	public function load_data()
	{
		$this->db->select('*');
		$this->db->from('bb_vehicle');
		$this->db->join('bb_meta_category', 'bb_meta_category.id_vh = bb_vehicle.id_vh');
		$this->db->join('bb_category', 'bb_category.id_cat = bb_meta_category.id_cat');

		$query = $this->db->get();
		return $query->result();
	}

	// mengambil nama kendaraan
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

	// mengambil data untuk single page kendaraan
	function load_sc($slug)
	{
		$this->db->select('*');
		$this->db->from('bb_vehicle');
		$this->db->where('slug_vh', $slug);

		$query = $this->db->get();
		return $query->result();
	}

	// mengambil data dari id
	function load_id($id)
	{
		$this->db->select('*');
		$this->db->from('bb_vehicle');
		$this->db->where('id_vh', $id);

		$query = $this->db->get();
		return $query->result();
	}




// end model
}