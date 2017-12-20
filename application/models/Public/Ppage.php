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
 *	Class ini untuk model halaman
 *
 *	@subpackage			library, helper
*/

defined('BASEPATH') OR exit('No direct script access allowed');

class Ppage extends CI_Model {

	// LOAD DATA
	public function load_data()
	{

	}

	// LOAD DATA BY SLUG
	public function load_data_by_slug($slug)
	{
		$this->db->select('*');
		$this->db->from('bb_page');
		$this->db->where('slug_page', $slug);

		$query = $this->db->get();
		return $query->result();
	}

// end model
}