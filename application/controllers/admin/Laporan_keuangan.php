<?php



class Laporan_keuangan extends CI_Controller{

    
        function __construct()
        {
            parent::__construct();
            $this->load->model('m_crud');
            // $this->load->library('Primslib');
    
            if ($this->session->userdata('status') == '') {
                redirect('admin/login');
            }
        }
    }

