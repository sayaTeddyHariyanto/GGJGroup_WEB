<?php

class Guide extends CI_Controller 
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_crud');
        $this->load->library('form_validation');
        // $this->load->library('Primslib');
    }

    function index()
    {
        $this->load->view('templates/user_header');
		$this->load->view('templates/user_navbar');
		$this->load->view('user/guide');
        $this->load->view('templates/user_footer_js');
        $this->load->view('templates/user_custom_js');
        $this->load->view('templates/user_footer');
    }

    function blog()
    {
        $this->load->view('templates/user_header');
		$this->load->view('templates/user_navbar');
		$this->load->view('user/blog');
        $this->load->view('templates/user_footer_js');
        $this->load->view('templates/user_custom_js');
        $this->load->view('templates/user_footer');
    }
}
