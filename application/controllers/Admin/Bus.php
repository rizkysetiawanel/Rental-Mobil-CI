<?php

/**
 * @package			Codeigniter
 * @author      	Yulius
 * @license 		http://codeigniter.com/user_guide/license.html
 * @since 			Version 3.1.4
*/


// ------------------------------------------------------------------------

/**
 *	Application Controller Class Bus extends MY_Controller
 * 
 *	Class ini untuk halaman Bus admin
 *
 *	@subpackage			model, view, helper, date
*/

defined('BASEPATH') OR exit('No direct script access allowed');

class Bus extends MY_Controller {


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
						'rpCurrency_helper',
						'exDate_helper'
			);

		$array_model  = array(
						'admin/mbus',
						'admin/mfacility',
						'admin/mtroom'
			);

		// MODEL
		$this->load->model($array_model);

		// HELPER
		$this->load->helper($array_helper);
	}

	// Fungsi Index
	public function index()
	{
		// cek jika sudah login ata session login masih ada di cookie
		if ($this->is_logged_in()) 
		{
			// data
			$var['title_web'] 	= $this->web_title();
			$var['page_web']  	= 'Kendaraan';


			// view
			$this->admin_template($var);
			$this->load->view('admin/part/bus/index', $var);
			
		}else
			{
				redirect('');
			}	
	}

	// fungsi data bus
	public function bus_data()
	{
		$order 	= $_GET['order'];	// order database
		$offset = $_GET['offset'];	// offset 
		$limit 	= $_GET['limit'];   // batas menarik data

		if(isset($_GET['search']))
		{
			$search = $_GET['search']; // keyword
		}
		else
		{
			$search = NULL;
		}

		$result = array();
		$count  = $this->mbus->load_data();
		$res	= $this->mbus->load_dataPage($order, $offset, $limit, $search);

		foreach($res as $row)
			{
				$result[] = array(
							'title'		=> $row->name_vh, 
							'desc'		=> $row->desc_vh,
							'price'		=> 'Rp. '.rpCurrency($row->price_vh),
							'date'		=> exDate($row->date_vh),
							'action'	=> '<button id="edit" class="btn btn-primary" idcontent="'.$row->id_vh.'"><span class="glyphicon glyphicon-pencil"></span></button> <div id="delete" class="btn btn-danger" idcontent="'.$row->id_vh.'">
            					<span class="glyphicon glyphicon-trash"></span></div>'
							);
			}

		// konversi array ke json
		echo json_encode(array('total'=>count($count), 'rows'=>$result));
	}

	// fungsi input bus
	public function bus_input()
	{
		// data
		$var['facility_data']	= $this->mfacility->load_data();
		$var['troom_data']		= $this->mtroom->load_data();

		// view
		$this->load->view('admin/part/bus/input', $var);
	}


	// fungsi menghapus data bus
	public function bus_delete($id)
	{
		$do_del = $this->mbus->delete_data($id);
		echo $do_del;
	}

	// fungsi menyimpan databus
	public function bus_save()
	{

		// ajax passing ke php konvert ke array untuk seat
		$id_fac   = $this->input->post('facility');
			
		foreach($id_fac as $ifc)
			{
				$data = $ifc;
			}

		$array = explode(',', $data);

		// ajax passing ke php konvert ke array untuk tipe bus
		$id_troom   = $this->input->post('troom');
			
		foreach($id_troom as $itr)
			{
				$datatwo = $itr;
			}

		$arraytwo = explode(',', $datatwo);

		$this->mbus->save_data($array, $arraytwo);

		echo 'data sudah disimpan';
	}

	// fungsi edit data
	public function bus_edit($id)
	{
		// data
		$var['facility_data']	= $this->mfacility->load_data();
		$var['troom_data']		= $this->mtroom->load_data();
		$var['bus_data']  		= $this->mbus->load_data_edit($id);

		// view
		$this->load->view('admin/part/bus/edit', $var);
	}

	// fungsi save edit data
	public function bus_save_edit()
	{
		$do_save = $this->mbus->save_edit_data();

		echo $do_save;
	}

}