<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pinvoice extends CI_Model {

	function __construct()
	{
		parent::__construct();

		// load helper
		$this->load->helper('date');

		// load library
		$this->load->library('upload');
	}

	// FUNCTION LOAD DATA
	function load_data()
	{
		$this->db->select('*');
		$this->db->from('bb_invoice');

		$query = $this->db->get();
		return $query->result();
	}

	// function load_check
	function load_data_check()
	{
		$this->db->select('*');
		$this->db->from('bb_invoice');
		$this->db->where('status_inv', '0');

		$query = $this->db->get();
		return $query->result();
	}


	// FUNCTION ORDER CHECK
	function order_check($id, $hp)
	{
		$query = $this->db->query("select * from bb_invoice where code_inv = '$id' and handphone_inv = '$hp'");

		return $query->result();
	}

	// mengambil data kendaraan untuk invoice
	function load_inv($unique_id)
	{
		$this->db->select('*');
		$this->db->from('bb_invoice');
		$this->db->join('bb_bank', 'bb_bank.id_bank = bb_invoice.id_bank');
		$this->db->where('code_inv', $unique_id);

		$query = $this->db->get();
		return $query->result();
	}

	// AUTO UPDATE STATUS INVOICE
	function update($id, $status)
	{
		if($status == 0)
		{	
			$data = array(
					'status_inv'=>9
				);

			$this->db->where('id_inv', $id);
			$this->db->update('bb_invoice', $data);
		}
	}

	// KONFIRMASI TAGIHAN
	function confirm()
	{
		$img = $_FILES['invImg']['name'];
		$code= $this->input->post('code');
		$config['upload_path']   = './assets/hpublic/img_inv';
        $config['allowed_types'] = 'jpg|jpeg|png';

		$data = array(
				'img_inv'=>$img,
				'status_inv'=>'1'
			);

		$this->db->where('code_inv', $code);
		$this->db->update('bb_invoice', $data);

		$this->upload->initialize($config);
		$this->upload->do_upload('invImg');
		$this->upload->data();
	}

}