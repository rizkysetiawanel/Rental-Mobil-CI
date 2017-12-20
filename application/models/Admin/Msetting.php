<?php

/**
 * @package			Codeigniter
 * @author      	Yulius
 * @license 		http://codeigniter.com/user_guide/license.html
 * @since 			Version 3.1.4
*/


// ------------------------------------------------------------------------

/**
 *	Application Controller Class Type extends MY_Controller
 * 
 *	Class ini untuk model tipe bus
 *
 *	@subpackage			helper
*/

defined('BASEPATH') OR exit('No direct script access allowed');

class Msetting extends CI_Model {


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
						'date',
			);

		$array_library = array(
						'upload',
			);

		// HELPER
		$this->load->helper($array_helper);

		// LIBRARY
		$this->load->library($array_library);
	}

	/**
	 *
	 * FUNGSI WEB SETTING
	 *
	*/
	public function load_data_ws()
	{
		$this->db->select('*');
		$this->db->from('bb_setting');

		$query = $this->db->get();
		return $query->result();

	}

	/**
	 *
	 * FUNGSI BANK SETTING
	 *
	*/

	// load data bank
	public function load_data_bank()
	{
		$this->db->select('*');
		$this->db->from('bb_bank');

		$query = $this->db->get();
		return $query->result();
	}

 	// load data page bank
 	public function load_data_page_bank($order, $offset, $limit, $search)
 	{

		$this->db->select('*');
		$this->db->from('bb_bank');

		// kondisi jika kata kunci tidak ada
		if($search != NULL)
		{
			$this->db->like('name_bank', $search);
		}

       	$this->db->order_by('id_bank', $order);

       	// kondisi jika pembatasan dan offset tidak ada
        if($limit != NULL && $offset!=NULL)
        {
        	$this->db->limit($limit,$offset);
        }
       	elseif($offset == NULL)
       	{
       		$this->db->limit($limit);
       	}
        
        $query = $this->db->get();
        
        return $query->result();
 	}

 	// fungsi filter data bank
 	public function filter_data_bank()
 	{
 		// mengambil data post
 		$bank_name 		= $this->input->post('bankName');
 		$no_acc 		= $this->input->post('noAcc');
 		$owner 			= $this->input->post('owner');

 		// check nama bank dari database
 		$check  		= $this->db->query('SELECT * FROM bb_bank WHERE name_bank = "$bank_name"');
 		$check_res 		= $check->result();

 		if(count($check_res)>0)
 		{
 			echo "Bank yang anda masukan sudah ada silahkan ganti dengan yang lain!";
 		}
 		else
 		{
 			$this->save_data_bank($bank_name, $no_acc, $owner);
 		}

 	}

 	// fungsi simpan data bank
 	public function save_data_bank($bank_name, $no_acc, $owner)
 	{

 		// waktu dan tanggal
 		$date 	= date('Y-m-d', now());
 		$time 	= date('H:i:s', now());

 		// mengambil data gambar
 		$data 	= $_POST['imageFile'];

		list($type, $data) = explode(';', $data);
		list(, $data)      = explode(',', $data);
		$data = base64_decode($data);
		$imageName = 'tg'.time().'.png';
		file_put_contents('assets/hpublic/img_bank/'.$imageName, $data);

		// insert ke database
		$data 	= array(
					'name_bank' 	=> $bank_name,
					'acc_bank'		=> $no_acc,
					'owner_bank'	=> $owner,
					'logo_bank' 	=> $imageName,
					'date_bank'		=> $date,
					'time_bank'		=> $time,
					'date_time_bank'=> $date.' '.$time
			);

		$this->db->insert('bb_bank', $data);

		echo "Data bank sudah disimpan";

 	}

 	// fungsi load bank edit
 	public function load_edit_bank($id)
 	{
 		$this->db->select('*');
 		$this->db->from('bb_bank');
 		$this->db->where('id_bank', $id);

 		$query = $this->db->get();
 		return $query->result();
 	}

 	// fungsi simpan bank edit
 	public function save_edit_bank()
 	{
 		$id = $this->input->post('idbank');
 		// mengambil data post
 		$bank_name 		= $this->input->post('bankName');
 		$no_acc 		= $this->input->post('noAcc');
 		$owner 			= $this->input->post('owner');

		// waktu dan tanggal
 		$date 	= date('Y-m-d', now());
 		$time 	= date('H:i:s', now());

 		// data gambar
 		$data 	= $_POST['imageFile'];

 		if($data == 'data:,')
 		{
			$data 	= array(
						'name_bank' 	=> $bank_name,
						'acc_bank'		=> $no_acc,
						'owner_bank'	=> $owner,
						'date_bank'		=> $date,
						'time_bank'		=> $time,
						'date_time_bank'=> $date.' '.$time
				);

			$this->db->where('id_bank', $id);
			$this->db->update('bb_bank', $data);
 		}
 		else
 		{

			list($type, $data) = explode(';', $data);
			list(, $data)      = explode(',', $data);
			$data = base64_decode($data);
			$imageName = 'tg'.time().'.png';
			file_put_contents('assets/hpublic/img_bank/'.$imageName, $data);

			$data 	= array(
						'name_bank' 	=> $bank_name,
						'acc_bank'		=> $no_acc,
						'owner_bank'	=> $owner,
						'logo_bank' 	=> $imageName,
						'date_bank'		=> $date,
						'time_bank'		=> $time,
						'date_time_bank'=> $date.' '.$time
				);

			$this->db->where('id_bank', $id);
			$this->db->update('bb_bank', $data);
 		}
 	}

 	// fungsi menu
 	public function load_menu()
 	{
 		$this->db->select('*');
 		$this->db->from('bb_menu');
 		$this->db->join('bb_page', 'bb_page.id_page = bb_menu.id_page');
 		$this->db->order_by('id_menu', 'ASC');

 		$query = $this->db->get();
 		return $query->result();

 	}

 	// simpan data menu
 	function save_menu()
	{
		$this->db->empty_table('bb_menu');

		$idpage = $this->input->post('idmenu');

		foreach($idpage as $idpage)
		{
			$data[] = array(
					'id_page' => $idpage
				);		
		}

		$this->db->insert_batch('bb_menu', $data);
		return $data;

	}

	// simpan website setting
	public function save_ws()
	{
		$name 		= $this->input->post('title');
		$slogan		= $this->input->post('slogan');
		$telp		= $this->input->post('telp');
		$email		= $this->input->post('email');
		$addr 		= $this->input->post('address');

		$data = array(
				'name_ws'		=> $name,
				'slogan_ws' 	=> $slogan,
				'telp_ws' 		=> $telp,
				'email_ws' 		=> $email,
				'address_ws' 	=> $addr
			);

		$this->db->where('id_ws', 1);
		$this->db->update('bb_setting', $data);
	}


// end model
}
