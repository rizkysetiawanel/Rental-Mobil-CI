<?php

class MY_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function is_logged_in()
    {
        $user =	$this->session->userdata('user');
        return isset($user);
    }

    // TEMPLATE ADMIN
    public function admin_template($var)
    {
        $this->load->view('admin/template/head', $var);
        $this->load->view('admin/template/navigation', $var);
        $this->load->view('admin/template/head-bar', $var);
        $this->load->view('admin/template/content');
    }

    // TEMPLATE PUBLIC
    public function public_template($var)
    {
        $this->load->view('public/template/head', $var);
        $this->load->view('public/template/menu_head', $var);
        $this->load->view('public/template/content', $var);
    }

    public function web_title()
    {
        $this->db->select('name_ws');
        $this->db->from('bb_setting');

        $query = $this->db->get();

        $res = $query->result();

        foreach($res as $row)
        {
            $res2 = $row->name_ws;
        }

        return $res2;
    }



// akhir dari controller
}

