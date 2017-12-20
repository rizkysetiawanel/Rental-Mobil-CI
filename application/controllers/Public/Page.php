<?php

/**
 * @package			Codeigniter
 * @author      	Yulius
 * @license 		http://codeigniter.com/user_guide/license.html
 * @since 			Version 3.1.4
*/


// ------------------------------------------------------------------------

/**
 *	Application Controller Class Page extends MY_Controller
 * 
 *	Class ini untuk halaman tagihan
 *
 *	@subpackage			model, view, helper, date
*/

defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends MY_Controller {


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
						'public/ppage',
						'admin/msetting'
			);

		// MODEL
		$this->load->model($array_model);

		// HELPER
		$this->load->helper($array_helper);
	}


	// FUNGSI INDEX
	public function index($slug)
	{
		// var
		$var['title_web']		= 'Royal Java';
		$var['page_web']		= 'Kendaraan';

		// data
		$var['menu'] 			= $this->msetting->load_menu();
		$var['page_data'] 		= $this->ppage->load_data_by_slug($slug);

		// setting
		$var['bank_data']  		= $this->msetting->load_data_bank();

		// template
		$this->public_template($var);
		$this->load->view('public/part/page/index', $var);
		$this->load->view('public/template/end_content');
		$this->load->view('public/template/footer');
	}

// end controller
}
