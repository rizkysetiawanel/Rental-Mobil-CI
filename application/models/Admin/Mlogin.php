<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mlogin extends CI_Model {


	function check()
	{
		$username = $this->input->post('username');
		$password  = md5($this->input->post('password'));

		$query = $this->db->query("select * from bb_admin where username_admin = '$username' and password_admin = '$password'");

		return $query->result();
	}

// akhir dari model
}