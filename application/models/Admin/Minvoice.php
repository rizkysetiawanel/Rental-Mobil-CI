<?php

/**
 * @package			Codeigniter
 * @author      	Yulius
 * @license 		http://codeigniter.com/user_guide/license.html
 * @since 			Version 3.1.4
*/


// ------------------------------------------------------------------------

/**
 *	Application Controller Class Minvoice extends MY_Controller
 * 
 *	Class ini untuk model tagihan
 *
 *	@subpackage			helper
*/

defined('BASEPATH') OR exit('No direct script access allowed');

class Minvoice extends CI_Model {


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
						'date'
			);

		$array_library = array(
						'upload'
			);

		// HELPER
		$this->load->helper($array_helper);

		// LIBRARY
		$this->load->library($array_library);
	}

	/**
	 *
	 * FUNGSI TAGIHAN PENDING
	 *
	*/

	// load data tagihan pending
	public function load_data_pending()
	{
		$this->db->select('*');
		$this->db->from('bb_invoice');
		$this->db->where('status_inv', '0');

		$query = $this->db->get();
		return $query->result();
	}

	// load data page tagihan pending
	/**
	 *
	 *	$order 	= menentukan order database, desc / asc / random
	 *	$offset = halaman
	 * 	$limit 	= Batas pengambilan data
	 * 	$search = Keyword / kata kunci 
	 *
	*/
	public function load_data_page_pending($order, $offset, $limit, $search)
	{

		$this->db->select('*');
		$this->db->from('bb_invoice');
		$this->db->where('status_inv', '0');

		// kondisi jika kata kunci tidak ada
		if($search != NULL)
		{
			$this->db->group_start();
			$this->db->like('name_inv', $search);
			$this->db->or_like('code_inv', $search);
			$this->db->group_end();
		}

       	$this->db->order_by('id_inv', $order);

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

	/**
	 *
	 * FUNGSI TAGIHAN KONFIRMASI
	 *
	*/

	// load data tagihan konfirmasi
	public function load_data_confirm()
	{
		$this->db->select('*');
		$this->db->from('bb_invoice');
		$this->db->where('status_inv', '1');

		$query = $this->db->get();
		return $query->result();
	}

	// load data page tagihan konfirmasi
	/**
	 *
	 *	$order 	= menentukan order database, desc / asc / random
	 *	$offset = halaman
	 * 	$limit 	= Batas pengambilan data
	 * 	$search = Keyword / kata kunci 
	 *
	*/
	public function load_data_page_confirm($order, $offset, $limit, $search)
	{

		$this->db->select('*');
		$this->db->from('bb_invoice');
		$this->db->where('status_inv', '1');

		// kondisi jika kata kunci tidak ada
		if($search != NULL)
		{
			$this->db->group_start();
			$this->db->like('name_inv', $search);
			$this->db->or_like('code_inv', $search);
			$this->db->group_end();
		}

       	$this->db->order_by('id_inv', $order);

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

	/**
	 *
	 * FUNGSI TAGIHAN SELESAI
	 *
	*/

	public function load_data_clear()
	{
		$this->db->select('*');
		$this->db->from('bb_invoice');
		$this->db->where('status_inv', '2');

		$query = $this->db->get();
		return $query->result();
	}

	// load data page tagihan konfirmasi
	/**
	 *
	 *	$order 	= menentukan order database, desc / asc / random
	 *	$offset = halaman
	 * 	$limit 	= Batas pengambilan data
	 * 	$search = Keyword / kata kunci 
	 *
	*/
	public function load_data_page_clear($order, $offset, $limit, $search)
	{

		$this->db->select('*');
		$this->db->from('bb_invoice');
		$this->db->where('status_inv', '2');

		// kondisi jika kata kunci tidak ada
		if($search != NULL)
		{
			$this->db->group_start();
			$this->db->like('name_inv', $search);
			$this->db->or_like('code_inv', $search);
			$this->db->group_end();
		}

       	$this->db->order_by('id_inv', $order);

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

	/**
	 *
	 * FUNGSI TAGIHAN DIBATALKAN
	 *
	*/

	public function load_data_draff()
	{
		$this->db->select('*');
		$this->db->from('bb_invoice');
		$this->db->where('status_inv', '9');

		$query = $this->db->get();
		return $query->result();
	}

	// load data page tagihan konfirmasi
	/**
	 *
	 *	$order 	= menentukan order database, desc / asc / random
	 *	$offset = halaman
	 * 	$limit 	= Batas pengambilan data
	 * 	$search = Keyword / kata kunci 
	 *
	*/
	public function load_data_page_draff($order, $offset, $limit, $search)
	{

		$this->db->select('*');
		$this->db->from('bb_invoice');
		$this->db->where('status_inv', '9');

		// kondisi jika kata kunci tidak ada
		if($search != NULL)
		{
			$this->db->group_start();
			$this->db->like('name_inv', $search);
			$this->db->or_like('code_inv', $search);
			$this->db->group_end();
		}

       	$this->db->order_by('id_inv', $order);

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

	// KONFIRMASI DATA
	public function confirm_data($id)
	{
		$data = array(
				'status_inv' => 2
			);

		$this->db->where('id_inv', $id);
		$this->db->update('bb_invoice', $data);
	}

	// SIMPAN DENDA
	public function save_penalty()
	{
		$id 	 = $this->input->post('idinv');
		$penalty = $this->input->post('penalty');

		$data = array(
				'penalty_inv' => $penalty
			);

		$this->db->where('id_inv', $id);
		$this->db->update('bb_invoice', $data);
	}

	// grafik data
	public function graphic()
	{
		$this->db->select('*');
		$this->db->from('bb_invoice');

		$query = $this->db->get();
		return $query->result();

	}

	// pending
	public function load_pend()
	{
		$query = $this->db->query('select * from bb_invoice where status_inv="0"');
		return $query->result();
	}

	public function load_conf()
	{
		$query = $this->db->query('select * from bb_invoice where status_inv="1"');
		return $query->result();
	}

	public function load_cancel()
	{
		$query = $this->db->query('select * from bb_invoice where status_inv="9"');
		return $query->result();
	}

// end model
}