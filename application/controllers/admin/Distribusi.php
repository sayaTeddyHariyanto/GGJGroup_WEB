<?php

// Class Zakat
class Distribusi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_crud');
        // $this->load->library('Primslib');

        if ($this->session->userdata('status') == '') {
            redirect('admin/login');
        }
    }

    function index()
    {
        $data['dis'] = $this->m_crud->getAll('distribusi_zakat')->result();
        $data['kategori'] = $this->m_crud->getAll('kategori')->result();
        $this->load->view('templates/admin_header');
        $this->load->view('templates/admin_sidebar');
        $this->load->view('templates/admin_navbar');
        $this->load->view('admin/distribusi', $data);
        $this->load->view('templates/admin_footer_js');
        $this->load->view('templates/admin_custom_js');
        $this->load->view('templates/admin_footer');
    }
}
