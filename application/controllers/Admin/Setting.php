<?php

/**
 * @package			Codeigniter
 * @author      	Yulius
 * @license 		http://codeigniter.com/user_guide/license.html
 * @since 			Version 3.1.4
*/


// ------------------------------------------------------------------------

/**
 *	Application Controller Class Setting extends MY_Controller
 * 
 *	Class ini untuk halaman setting
 *
 *	@subpackage			model, view
*/

defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends MY_Controller {


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
						'admin/msetting',
						'admin/mpage',
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
			$var['page_web']  	= 'Setting';

			// view
			$this->admin_template($var);
			$this->load->view('admin/part/setting/index');
			
		}else
			{
				redirect('');
			}
	}

	// fungsi web setting
	public function web_setting()
	{
		$var['web_setting'] = $this->msetting->load_data_ws();
		$this->load->view('admin/part/setting/web_setting', $var);
	}

	// fungsi menu setting
	public function menu_setting()
	{
		$var['menu'] = $this->msetting->load_menu();
		$var['page'] = $this->mpage->load_data();
		$this->load->view('admin/part/setting/menu_setting', $var);
	}

	// fungsi bank setting
	public function bank_setting()
	{
		$this->load->view('admin/part/setting/bank_setting');
	}

	// fungsi data bank seting
	public function bank_setting_data()
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
		$count  = $this->msetting->load_data_bank();
		$res	= $this->msetting->load_data_page_bank($order, $offset, $limit, $search);

		foreach($res as $row)
			{
				$result[] = array(
							'title'		=> $row->name_bank,
							'desc'		=> $row->acc_bank,
							'date'		=> exDate($row->date_bank),
							'action'	=> '<button id="edit" class="btn btn-primary edit" idcontent="'.$row->id_bank.'"><span class="glyphicon glyphicon-pencil"></span></button> <div id="delete" class="btn btn-danger" idcontent="'.$row->id_bank.'">
            					<span class="glyphicon glyphicon-trash"></span></div>'
							);
			}

		// konversi array ke json
		echo json_encode(array('total'=>count($count), 'rows'=>$result));
	}

	// fungsi input bank setting
	public function bank_setting_input()
	{
		$this->load->view('admin/part/setting/input_bank_setting');	
	}

	// fungsi input bank setting save
	public function bank_setting_save()
	{
		$do_save = $this->msetting->filter_data_bank();

		echo $do_save;
	}

	// fungsi edit bank setting
	public function bank_edit($id)
	{
		$var['bank_data'] = $this->msetting->load_edit_bank($id);
		// view
		$this->load->view('admin/part/setting/edit_bank_setting', $var);
	}

	// fungsi simpan edit bank
	public function bank_save_edit()
	{
		$this->msetting->save_edit_bank();

		echo "Data bank sudah disimpan";
	}

	// fungsi hapus bank
	public function bank_delete($id)
	{
		$this->db->where('id_bank', $id);
		$this->db->delete('bb_bank');

		echo "Data sudah di hapus";
	}

	// fungsi save menu web
	public function save_menu_web()
	{
		$do_save = $this->msetting->save_menu();

		echo 'Data menu sudah disimpan';
	}

	// fungsi save setting web
	public function save_setting_ws()
	{
		$do_save = $this->msetting->save_ws();

		echo 'Setting website sudah di simpan';
	}

// end model
}
