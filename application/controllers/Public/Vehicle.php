<?php

/**
 * @package			Codeigniter
 * @author      	Yulius
 * @license 		http://codeigniter.com/user_guide/license.html
 * @since 			Version 3.1.4
*/


// ------------------------------------------------------------------------

/**
 *	Application Controller Class Vehicle extends MY_Controller
 * 
 *	Class ini untuk halaman Kendaraan
 *
 *	@subpackage			model, view, helper, date
*/

defined('BASEPATH') OR exit('No direct script access allowed');

class Vehicle extends MY_Controller {


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
						'exDate_helper',
						'webSetting_helper'
			);

		$array_model  = array(
						'admin/msetting',
						'public/pvehicle',
			);

		// MODEL
		$this->load->model($array_model);

		// HELPER
		$this->load->helper($array_helper);
	}

	// fungsi index
	public function index()
	{
		// var
		$var['title_web']		= 'Royal Java';
		$var['page_web']		= 'Kendaraan';

		// data
		$var['menu'] 			= $this->msetting->load_menu();
		$var['bus_data'] 		= $this->pvehicle->load_data();

		// setting
		$var['bank_data']  		= $this->msetting->load_data_bank();

		// template
		$this->public_template($var);
		$this->load->view('public/part/bus/index', $var);
		$this->load->view('public/template/end_content');
		$this->load->view('public/template/footer');

	}

	// fungsi kendaraan / halaman
	public function single_page($slug)
	{
		// var
		$var['title_web']		= 'Royal Java';
		$var['page_web']		= $this->pvehicle->load_name($slug);
		$var['menu'] 			= $this->msetting->load_menu();

		// data
		$var['bus_data']  		= $this->pvehicle->load_sc($slug);

		// setting
		$var['bank_data']  		= $this->msetting->load_data_bank();

		// template
		$this->public_template($var);
		$this->load->view('public/part/single/bus', $var);
		$this->load->view('public/template/footer', $var);
	}

// end model
}