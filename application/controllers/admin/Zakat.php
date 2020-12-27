<?php

// Class Zakat
class Zakat extends CI_Controller
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
        $where = array(
            'status_zakat' => 1
        );
        $data['zakat'] = $this->m_crud->edit($where, 'pembayaran_zakat')->result();
        $data['sidebar'] = 'zakat';
        $this->load->view('templates/admin_header');
        $this->load->view('templates/admin_sidebar', $data);
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
        $data['sidebar'] = 'zakat';
        $this->load->view('templates/admin_header');
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('templates/admin_navbar');
        $this->load->view('admin/zakat_detail', $data);
        $this->load->view('templates/admin_footer_js');
        $this->load->view('templates/admin_custom_js');
        $this->load->view('templates/admin_footer');
    }


    //================================================================================
    //VERIFIKASI

    function verifikasi()
    {
        $where = array(
            'status_zakat' => 0
        );
        $data['zakat'] = $this->m_crud->edit($where, 'pembayaran_zakat')->result();
        $data['sidebar'] = 'zakat';
        $this->load->view('templates/admin_header');
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('templates/admin_navbar');
        $this->load->view('admin/verifikasi', $data);
        $this->load->view('templates/admin_footer_js');
        $this->load->view('templates/admin_custom_js');
        $this->load->view('templates/admin_footer');
    }

    function ubah_status($id_zakat)
    {
        $where = array(
            'id_zakat' => $id_zakat
        );
        $data = array(
            'status_zakat' => 1
        );
        $this->m_crud->update($where, $data, 'pembayaran_zakat');
        if ($this->db->affected_rows() == true) {
            $this->session->set_flashdata('pesan', '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Selamat!</strong> Anda berhasil mengubah status.
                    <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                ');
            redirect("admin/zakat/verifikasi");
        } else {
            $this->session->set_flashdata('pesan', '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Maaf!</strong> Anda gagal mengubah status.
                    <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                ');
            redirect("admin/zakat/detail/$id_zakat");
        }
    }
}
