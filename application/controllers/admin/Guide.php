<?php

class Guide extends CI_Controller 
{
    function index()
    {
        $this->load->view('templates/admin_header');
        $this->load->view('templates/admin_sidebar');
		$this->load->view('templates/admin_navbar');
		$this->load->view('admin/guide');
        $this->load->view('templates/admin_footer_js');
        $this->load->view('templates/admin_custom_js');
        $this->load->view('templates/admin_footer');
    }
}
