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

    function printpdf($id_zakat)
    {
        $this->load->library('Dompdf_gen');
            
        $data['pembayaran'] = $this->m_landingpage->SelectPembayaranById($id_zakat)->result();

        $this->load->view('user/nota_pembayaran', $data);

        $paper_size = 'A4';
        $oriantation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $oriantation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("nota_pembayaran_" . date('Y-m-d_H-i-s') . ".pdf", array('Attachment' => 0));
    }

    
}


