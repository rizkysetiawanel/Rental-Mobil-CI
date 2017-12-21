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
 *	@subpackage			model, view
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
						'exDate_helper',
						'rpCurrency_helper'
			);

		$array_model  = array(
						'admin/minvoice',
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
			$var['page_web']  	= 'Tagihan';

			// view
			$this->admin_template($var);
			$this->load->view('admin/part/invoice/index');
			
		}else
			{
				redirect('');
			}
	}

	// fungsi data tagihan pending
	public function invoice_pending_view()
	{
		//view
		$this->load->view('admin/part/invoice/data_pending');
	}

	public function invoice_pending_data()
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
		$count  = $this->minvoice->load_data_pending();
		$res	= $this->minvoice->load_data_page_pending($order, $offset, $limit, $search);

		foreach($res as $row)
			{
				$result[] = array(
							'title'		=> $row->name_inv, 
							'code'		=> '<a target="_blank" href="'.base_url().'/invoice/'.$row->code_inv.'">'.$row->code_inv.'</a>',
							'price'		=> 'Rp. '.rpCurrency($row->total_inv),
							'date'		=> exDate($row->date_inv),
							'action'	=> '<div id="delete" class="btn btn-danger" idbus="'.$row->id_inv.'">
            					<span class="glyphicon glyphicon-trash"></span></div>'
							);
			}

		// konversi array ke json
		echo json_encode(array('total'=>count($count), 'rows'=>$result));
	}

	// fungsi data tagihan konfirmasi
	public function invoice_confirm_view()
	{
		//view
		$this->load->view('admin/part/invoice/data_confirm');
	}

	public function invoice_confirm_data()
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
		$count  = $this->minvoice->load_data_confirm();
		$res	= $this->minvoice->load_data_page_confirm($order, $offset, $limit, $search);

		foreach($res as $row)
			{
				$result[] = array(
							'title'		=> $row->name_inv,
							'code'		=> '<a target="_blank" href="'.base_url().'/invoice/'.$row->code_inv.'">'.$row->code_inv.'</a>',
							'price'		=> 'Rp. '.rpCurrency($row->total_inv),
							'proof' 	=> '<img src="'.base_url().'assets/hpublic/img_inv/'.$row->img_inv.'" invimg="'.$row->img_inv.'" style="width:84px; height:59px;">',
							'date'		=> exDate($row->date_inv),
							'action'	=> '<div id="conf" class="btn btn-primary" idbus="'.$row->id_inv.'">
            					<span class="glyphicon glyphicon-ok"></span></div> <div id="delete" class="btn btn-danger del" idbus="'.$row->id_inv.'">
            					<span class="glyphicon glyphicon-trash"></span></div>'
							);
			}

		// konversi array ke json
		echo json_encode(array('total'=>count($count), 'rows'=>$result));
	}

	// fungsi data tagihan selesai
	public function invoice_clear_view()
	{
		//view
		$this->load->view('admin/part/invoice/data_clear');
	}

	public function invoice_clear_data()
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
		$count  = $this->minvoice->load_data_clear();
		$res	= $this->minvoice->load_data_page_clear($order, $offset, $limit, $search);

		foreach($res as $row)
			{
				$result[] = array(
							'title'		=> $row->name_inv,
							'code'		=> '<a target="_blank" href="'.base_url().'/invoice/'.$row->code_inv.'">'.$row->code_inv.'</a>',
							'price'		=> 'Rp. '.rpCurrency($row->total_inv+$row->penalty_inv),
							'proof' 	=> '<img src="'.base_url().'assets/hpublic/img_inv/'.$row->img_inv.'" invimg="'.$row->img_inv.'">',
							'date'		=> exDate($row->date_inv),
							'action' 	=> '<div id="penal" class="btn btn-success" idbus="'.$row->id_inv.'">Denda</div>'
							);
			}

		// konversi array ke json
		echo json_encode(array('total'=>count($count), 'rows'=>$result));
	}

	// fungsi data tagihan cancel
	public function invoice_draff_view()
	{
		//view
		$this->load->view('admin/part/invoice/data_draff');
	}

	public function invoice_draff_data()
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
		$count  = $this->minvoice->load_data_draff();
		$res	= $this->minvoice->load_data_page_draff($order, $offset, $limit, $search);

		foreach($res as $row)
			{
				$result[] = array(
							'title'		=> $row->name_inv,
							'code'		=> '<a target="_blank" href="'.base_url().'/invoice/'.$row->code_inv.'">'.$row->code_inv.'</a>',
							'price'		=> 'Rp. '.rpCurrency($row->total_inv),
							'date'		=> exDate($row->date_inv),
							'action'	=> '<div id="delete" class="btn btn-danger del" idbus="'.$row->id_inv.'">
            					<span class="glyphicon glyphicon-trash"></span></div>'
							);
			}

		// konversi array ke json
		echo json_encode(array('total'=>count($count), 'rows'=>$result));
	}

	// fungsi preview image
	public function invoice_prev($src)
	{
		$var['src'] = $src;
		$this->load->view('admin/part/invoice/prev', $var);
	}

	public function invoice_confirm($id)
	{
		$this->minvoice->confirm_data($id);
		echo "Tagihan sudah di konfirmasi";
	}

	// fungsi denda
	public function invoice_penalty($id)
	{
		// variable
		$var['idinv'] = $id;
		// view
		$this->load->view('admin/part/invoice/penalty', $var);
	}

	// fungsi simpan denda
	public function invoice_save_penalty()
	{
		$this->minvoice->save_penalty();
		echo "Denda sudah dimasukan";
	}

	// fungsi hapus tagihan
	public function invoice_delete($id)
	{
		$this->db->where('id_inv', $id);
		$this->db->delete('bb_invoice');

		echo 'Tagihan sudah di hapus';
	}


// end model
}
