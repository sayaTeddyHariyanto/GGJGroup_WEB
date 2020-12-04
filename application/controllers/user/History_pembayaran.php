<?php

class History_pembayaran extends CI_Controller 
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_crud');
        $this->load->model('m_landingpage');
        //$this->load->model('m_landingpage');
        // $this->load->library('Primslib');
    }

    function index()
    {
        // $data['anggota'] = $this->m_crud->edit(['id_anggota' => $id, 'token_anggota' => $token], 'tb_anggota')->result();
        //$data['metode'] = $this->m_crud->getAll('metode_pembayaran')->result();
        $id_anggota = $this->session->userdata('id');
        $where = array('id_anggota' => $id_anggota);
        $data['zakat'] = $this->m_crud->edit($where, 'pembayaran_zakat')->result();
        $this->load->view('templates/user_header');
		$this->load->view('templates/user_navbar');
        $this->load->view('user/history_pembayaran', $data);
        $this->load->view('templates/user_footer_js');
        $this->load->view('templates/user_custom_js');
        $this->load->view('templates/user_footer');
    }

    function detail($id_zakat)
    {
        $where = array('id_zakat' => $id_zakat);
        $data['zakat'] = $this->m_landingpage->SelectPembayaranById($id_zakat)->result();
        $this->load->view('templates/user_header');
		$this->load->view('templates/user_navbar');
        $this->load->view('user/history_pembayaran_detail', $data);
        $this->load->view('templates/user_footer_js');
        $this->load->view('templates/user_custom_js');
        $this->load->view('templates/user_footer');
    }

    
}

   
