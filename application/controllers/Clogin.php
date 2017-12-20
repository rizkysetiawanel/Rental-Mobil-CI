<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clogin extends MY_Controller {

	function __construct()
	{
		parent::__construct();

		// load helper
		$this->load->helper('rpCurrency_helper');

		// load model
		$this->load->model('admin/mlogin');
	}

	function index()
	{
		if ($this->is_logged_in()) 
		{
			redirect('admin/beranda');
		}else
			{
				redirect('/login');
			}
	}

	public function P_login()
	{
		if ($this->is_logged_in()) 
		{
			redirect('admin/beranda');
		}else
			{
				// data
				$var['title_web']	= $this->web_title();
				$var['page_web'] 	= 'Login';

				// view
				$this->load->view('login/head', $var);
				$this->load->view('login/cover', $var);
				$this->load->view('login/form', $var);
			}
	}

		function login_process()
		{
			$res = $this->mlogin->check();

			if(count($res)>0)
			{
				foreach($res as $res)
				{
					$data = $res->id_admin;
				}

				$_SESSION['user'] = $data;

				echo "<script>window.location.href=bu+'admin/beranda';</script>";
			}else
				{
					echo "<script>$('.alert').slideDown('400').delay(3000).slideUp()</script>";
				}
		}

	public function logout()
	{
		session_destroy();
		redirect('login');
	}


// akhir controller
}