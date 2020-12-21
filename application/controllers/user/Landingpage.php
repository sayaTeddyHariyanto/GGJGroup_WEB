<?php

class Landingpage extends CI_Controller 
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_crud');
        $this->load->model('m_landingpage');
        // $this->load->library('Primslib');
    }

    function index()
    {
        $distribusi = $this->m_landingpage->selectsum_distribusi()->row()->total;
        $pemasukan = $this->m_landingpage->selectsum_pemasukan()->row()->total;
        $saldo = $pemasukan - $distribusi;

        if ($saldo <= 0) {
            $saldo = 0;
        }

        $data['distribusi'] = $distribusi;
        $data['pemasukan'] = $pemasukan;
        $data['saldo'] = $saldo;
        $data['penerima'] = $this->m_landingpage->selectcount_penerima()->row()->total;
        $data['slider'] = $this->m_crud->getAll('foto_slider')->result();
        $data['berita'] = $this->m_crud->getAll('tb_berita')->result();
        $data['jadwal'] = $this->m_crud->getAll('jadwal_kegiatan')->result();
        $this->load->view('templates/helper');
        $this->load->view('templates/user_header');
		$this->load->view('templates/user_navbar');
		$this->load->view('user/landing_page', $data);
        $this->load->view('templates/user_footer_js');
        $this->load->view('templates/user_custom_js');
        $this->load->view('templates/user_footer');
    }

    function dashboard()
    {
        $id = $this->session->userdata('id');
        $data['profil'] = $this->m_crud->edit(['id_anggota' => $id], 'tb_anggota')->row();
        $this->load->view('templates/helper');
        $this->load->view('templates/user_header');
		$this->load->view('templates/user_navbar');
		$this->load->view('user/dashboard_user', $data);
        $this->load->view('templates/user_footer_js');
        $this->load->view('templates/user_custom_js');
        $this->load->view('templates/user_footer');
    }

    function addr_line1($addr_line1)
    {
        if (preg_match('/[\^£$%&*}{@#~><>|=+¬]/', $addr_line1)) {
            $this->form_validation->set_message('addr_line1', 'Mohon maaf tidak diperbolehkan menggunakan karakter spesial');
            return false;
        } else {
            return true;
        }
    }

    function saran()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('kritik', 'Kritik/Saran', 'trim|required|callback_addr_line1');
        $this->form_validation->set_message('required', 'Mohon maaf, {field} harus diisi');
        $this->form_validation->set_message('valid_email', 'Mohon maaf, Email yang anda masukkan harus valid');
        $this->form_validation->set_error_delimiters('<div class="text-center"><span class="badge badge-danger text-white mt-2 px-4">', '</span></div>');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('pesan_footer', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Maaf!</strong> tolong perbaiki masukan anda.
                <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            ');
            $this->index();
        }else{
            $data = array(
                'email_saran' => $this->input->post('email'),
                'saran' => $this->input->post('kritik')
            );

            $this->m_crud->insert($data, 'tb_saran');
            if ($this->db->affected_rows() == true) {
                $this->session->set_flashdata('pesan_footer', '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Selamat!</strong> Kritik anda kami terima, Terimakasih.
                    <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                ');
                redirect('user/landingpage#email');
            }else{
                $this->session->set_flashdata('pesan_footer', '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Maaf!</strong> Server sedang sibuk.
                    <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                ');
                redirect('user/landingpage#email');
            }
        }
        
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
