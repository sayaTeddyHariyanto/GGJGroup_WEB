<?php

class Nota_pembayaran extends CI_Controller 
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_crud');
        $this->load->model('m_landingpage');
        //$this->load->model('m_landingpage');
        // $this->load->library('Primslib');
        if ($this->session->userdata('id') == '') {
            $this->session->set_flashdata('pesan', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Sesi habis!</strong> mohon login terlebih dahulu.
                <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            ');
            redirect('user/auth/login_anggota');
        }else{
            $user = $this->m_crud->edit(['id_anggota' => $this->session->userdata('id')], 'tb_anggota')->row();
            if ($user->status_anggota == 0) { // jika password benar, maka lanjut
                $this->session->set_flashdata('pesan', '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Akun anda belum aktif, mohon tunggu aktivasi akun dari admin.
                    <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                ');
                redirect('user/dashboard');
            }
        }
    }

    function detail($id_zakat)
    {
        $where = array('id_zakat' => $id_zakat);
        $data['zakat'] = $this->m_landingpage->SelectPembayaranById($id_zakat)->result();
        $this->load->view('templates/user_header');
		$this->load->view('templates/user_navbar');
        $this->load->view('user/nota_pembayaran', $data);
        $this->load->view('templates/user_footer_js');
        $this->load->view('templates/user_custom_js');
        $this->load->view('templates/user_footer');
    }

    
}