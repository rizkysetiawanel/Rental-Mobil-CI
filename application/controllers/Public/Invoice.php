<?php

/**
 * @package			Codeigniter
 * @author      	Yulius
 * @license 		http://codeigniter.com/user_guide/license.html
 * @since 			Version 3.1.4
*/


// ------------------------------------------------------------------------

/**
 *	Application Controller Class Invoice extends MY_Controller
 * 
 *	Class ini untuk halaman tagihan
 *
 *	@subpackage			model, view, helper, date
*/

defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends MY_Controller {


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
						'public/pvehicle',
						'public/pinvoice',
						'admin/msetting'
			);

		// MODEL
		$this->load->model($array_model);

		// HELPER
		$this->load->helper($array_helper);
	}

	// fungsi index
	public function index($unique_id)
	{
		// var
		$var['title_web']		= 'Royal Java';
		$var['page_web']		= 'Tagihan';
		$var['date_now']		= date('H:i:s', now());

		// data
		$res = $this->pinvoice->load_inv($unique_id);
		$var['menu'] 			= $this->msetting->load_menu();

		foreach($res as $row)
		{
			$idhotel = $row->id_vh;
		}

		$var['hotel_data']		= $this->pvehicle->load_id($idhotel);
		$var['inv_data']		= $this->pinvoice->load_inv($unique_id);

		// setting
		$var['bank_data']  		= $this->msetting->load_data_bank();

		//confirmation
		$time		= $this->pinvoice->load_inv($unique_id);
		$date_now	= date('Y-m-d H:i:s', now());

		foreach($time as $row)
		{
			$datetime = $row->date_time_inv;
		}

		$awal  = new DateTime($datetime);
		$akhir = new DateTime($date_now);
		$diff  = $awal->diff($akhir);

		$var['limit'] 		   = $diff->h;

		// view
		$this->public_template($var);
		$this->load->view('public/part/single/invoice', $var);
		$this->load->view('public/template/end_content');
		$this->load->view('public/template/footer', $var);
	}

	// timer tagihan
	public function timer($unique)
	{

		$res		= $this->pinvoice->load_inv($unique);
		$date_now	= date('Y-m-d H:i:s', now());

		foreach($res as $row)
		{
			$datetime = $row->date_time_inv;
		}

		$awal  = new DateTime($datetime);
		$akhir = new DateTime($date_now);
		$diff  = $awal->diff($akhir);

		if($diff->h > 0)
		{
			echo "Waktu pembayaran telah habis";
		}
		else
		{
			echo 60-$diff->i . ' Menit ';
			echo 60-$diff->s . ' Detik ';
			echo "<br><br><div class='btn btn-success conf'>Konfirmasi Pemabayaran</div><br><br>";		
		}
	}

	// konfirmasi tagihan
	public function conf_invoice($unique_id)
	{
		$var['inv_data'] 	= $this->pinvoice->load_inv($unique_id);

		// view
		$this->load->view('public/part/single/confirm_invoice.php', $var);
	}

	public function process_invoice()
	{
		$this->pinvoice->confirm();

		echo "Terimakasih telah konfirmasi pembayaran, konfirmasi akan kami process.";
	}



// end model
}