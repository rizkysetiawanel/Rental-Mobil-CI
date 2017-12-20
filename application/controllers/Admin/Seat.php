<?php

/**
 * @package			Codeigniter
 * @author      	Yulius
 * @license 		http://codeigniter.com/user_guide/license.html
 * @since 			Version 3.1.4
*/


// ------------------------------------------------------------------------

/**
 *	Application Controller Class Seat extends MY_Controller
 * 
 *	Class ini untuk halaman seat
 *
 *	@subpackage			model, view
*/

defined('BASEPATH') OR exit('No direct script access allowed');

class Seat extends MY_Controller {


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
						'exDate_helper'
			);

		$array_model  = array(
						'admin/mseat',
			);

		// MODEL
		$this->load->model($array_model);

		// HELPER
		$this->load->helper($array_helper);
	}

	// fungsi index
	public function index()
	{
		// cek jika sudah login ata session login masih ada di cookie
		if ($this->is_logged_in()) 
		{
			// data
			$var['title_web'] 	= $this->web_title();
			$var['page_web']  	= 'Seat Kendaraan';

			// view
			$this->admin_template($var);
			$this->load->view('admin/part/seat/index');
			
		}else
			{
				redirect('');
			}
	}

	// fungsi data seat
	public function seat_data()
	{
		// data
		$var['seat_data'] = $this->mseat->load_data();
		// view
		$this->load->view('admin/part/seat/data', $var);
	}


	// fungsi input seat
	public function seat_input()
	{
		$this->load->view('admin/part/seat/input');
	}

	// fungsi save seat
	public function seat_save()
	{
		$do_save = $this->mseat->save_data();

		echo $do_save;
	}

	// fungsi edit seat
	public function seat_edit($id)
	{
		// data
		$var['seat_data'] = $this->mseat->edit_data($id);
		// view
		$this->load->view('admin/part/seat/edit', $var);
	}

	// fungsi menyimpan edit seat
	public function seat_save_edit()
	{
		$do_save = $this->mseat->filter_edit_data();

		echo $do_save;
	}

	// fungsi menghapus seat
	public function seat_delete($id)
	{
		$do_del 	= $this->mseat->delete_data($id);

		echo $do_del;
	}

// end model
}