<?php

// Class Zakah
class Zakat extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_crud');
        // $this->load->library('Primslib');
    }

    function index()
    {
        $data['zakat'] = $this->m_crud->getAll('pembayaran_zakat')->result();
        $this->load->view('templates/admin_header');
        $this->load->view('templates/admin_sidebar');
        $this->load->view('templates/admin_navbar');
        $this->load->view('admin/zakat', $data);
        $this->load->view('templates/admin_footer_js');
        $this->load->view('templates/admin_custom_js');
        $this->load->view('templates/admin_footer');
    }

    function detail($id_zakat)
    {
        $where = array('id_zakat' => $id_zakat);
        $data['zakat'] = $this->m_crud->edit($where, 'pembayaran_zakat')->result();
        $this->load->view('templates/admin_header');
        $this->load->view('templates/admin_sidebar');
        $this->load->view('templates/admin_navbar');
        $this->load->view('admin/zakat_detail', $data);
        $this->load->view('templates/admin_footer_js');
        $this->load->view('templates/admin_custom_js');
        $this->load->view('templates/admin_footer');
    }
}
