<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadmin extends MY_Controller {

	function __construct()
	{
		parent::__construct();

		// load helper
		$this->load->helper('rpCurrency_helper');
		$this->load->helper('exDate_helper');

		// load model
		$this->load->model('admin/mfacility');
		$this->load->model('admin/mhotel');
		$this->load->model('admin/mtroom');
	}

	public function index()
	{
		if ($this->is_logged_in()) 
		{
			redirect('admin/beranda');
		}else
			{
				redirect('');
			}
	}

	// FUNCTION HOTEL
	public function p_hotel()
	{
		if ($this->is_logged_in()) 
		{
			// data
			$var['title_web'] 	= $this->web_title();
			$var['page_web']  	= 'Bus';


			// view
			$this->admin_template($var);
			$this->load->view('admin/part/hotel/index', $var);
			
		}else
			{
				redirect('');
			}
	}

		function hotel_data()
		{

			$order 	= $_GET['order'];
			$offset = $_GET['offset'];
			$limit 	= $_GET['limit'];

			if(isset($_GET['search']))
			{
				$search = $_GET['search'];
			}
			else
			{
				$search = NULL;
			}

			$result = array();
			$count  = $this->mhotel->load_data();
			$res	= $this->mhotel->load_dataPage($order, $offset, $limit, $search);

			foreach($res as $row)
			{
				$result[] = array(
							'title'		=> $row->name_vh, 
							'desc'		=> $row->desc_vh,
							'price'		=> 'Rp. '.rpCurrency($row->price_vh),
							'date'		=> exDate($row->date_vh),
							'action'	=> '<button class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span></button>
											<div id="delete" class="btn btn-danger" idhotel="'.$row->id_vh.'">
            								<span class="glyphicon glyphicon-trash"></span>
            								</div>
											'
							);
			}
			echo json_encode(array('total'=>count($count), 'rows'=>$result));
		}

		function hotel_input()
		{
			$var['facility_data']	= $this->mfacility->load_data();
			$var['troom_data']		= $this->mtroom->load_data();

			// view
			$this->load->view('admin/part/hotel/input', $var);
		}

		function hotel_save()
		{
			$id_fac   = $this->input->post('facility');
			foreach($id_fac as $ifc)
			{
				$data = $ifc;
			}

			$array = explode(',', $data);

			$id_troom   = $this->input->post('troom');
			foreach($id_troom as $itr)
			{
				$datatwo = $itr;
			}

			$arraytwo = explode(',', $datatwo);

			$this->mhotel->save_data($array, $arraytwo);

			echo 'data sudah disimpan';
		}

		function hotel_delete()
		{
			$do_del = $this->mhotel->delete_data();
			echo $do_del;
		}


	// FUNCTION ROOM TYPE
	public function p_type_room()
	{
		if ($this->is_logged_in()) 
		{
			// data
			$var['title_web'] 	= $this->web_title();
			$var['page_web']  	= 'Tipe Bus';

			// view
			$this->admin_template($var);
			$this->load->view('admin/part/troom/index', $var);
			
		}else
			{
				redirect('');
			}
	}

		// child function
		function type_room_data()
		{
			$order 	= $_GET['order'];
			$offset = $_GET['offset'];
			$limit 	= $_GET['limit'];

			if(isset($_GET['search']))
			{
				$search = $_GET['search'];
			}
			else
			{
				$search = NULL;
			}

			$result = array();
			$count  = $this->mtroom->load_data();
			$res	= $this->mtroom->load_dataPage($order, $offset, $limit, $search);

			foreach($res as $row)
			{
				$result[] = array(
							'title'		=> $row->name_cat, 
							'desc'		=> $row->desc_cat,
							'date'		=> exDate($row->date_cat),
							'action'	=> '<button class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span></button>
											<div id="delete" class="btn btn-danger" idhotel="'.$row->id_cat.'">
            								<span class="glyphicon glyphicon-trash"></span>
            								</div>
											'
							);
			}
			echo json_encode(array('total'=>count($count), 'rows'=>$result));
		}

		function type_room_input()
		{
			$this->load->view('admin/part/troom/input');
		}

		function type_room_save()
		{
			$do_save = $this->mtroom->save_data();

			echo $do_save;
		}

	// FUNCTION FACILITY
	public function p_facility()
	{
		if ($this->is_logged_in()) 
		{
			// data
			$var['title_web'] 	= $this->web_title();
			$var['page_web']  	= 'Seat';

			// view
			$this->admin_template($var);
			$this->load->view('admin/part/facility/index', $var);
			
		}else
			{
				redirect('');
			}
	}

		function facility_data()
		{
			$var['facility_data'] = $this->mfacility->load_data();

			$this->load->view('admin/part/facility/data', $var);
		}

		function facility_input()
		{
			$this->load->view('admin/part/facility/input');
		}

		function facility_save()
		{
			$do_save = $this->mfacility->save_data();

			echo $do_save;
		}


// akhir controller
}