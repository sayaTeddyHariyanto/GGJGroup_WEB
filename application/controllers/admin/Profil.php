<?php

// Class Anggota
class Profil extends CI_Controller
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

    function addr_line1($addr_line1)
    {
        if (preg_match('/[\^£$%&*}{@#~><>|=+¬]/', $addr_line1)) {
            $this->form_validation->set_message('addr_line1', 'Mohon maaf tidak diperbolehkan menggunakan karakter spesial');
            return false;
        } else {
            return true;
        }
    }

    function index()
    {
        $data['profil'] = $this->m_crud->edit(['id_profil' => 1], 'profil')->result();
        $data['sidebar'] = 'website';
        $this->load->view('templates/admin_header');
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('templates/admin_navbar');
        $this->load->view('admin/profil', $data);
        $this->load->view('templates/admin_footer_js');
        $this->load->view('templates/admin_custom_js');
        $this->load->view('templates/admin_footer');
    }

    function update()
    {
        $id_profil = $this->input->post('id_profil');

        // rules
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|callback_addr_line1');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|callback_addr_line1');
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required|min_length[2]|max_length[100]');
        $this->form_validation->set_rules('no_hp', 'Nomor Hp', 'trim|required|min_length[10]|max_length[15]');
        $this->form_validation->set_rules('maps', 'Maps', 'trim|required|valid_url');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        // custom pesan
        $this->form_validation->set_message('required', 'Mohon maaf, {field} harus diisi');
        $this->form_validation->set_message('min_length', 'Mohon maaf, Masukan {field} minimum {param} karakter');
        $this->form_validation->set_message('max_length', 'Mohon maaf, Masukan {field} maximum {param} karakter');
        $this->form_validation->set_message('valid_email', 'Mohon maaf, Email yang anda masukkan harus valid');
        $this->form_validation->set_message('valid_url', 'Mohon maaf, URL maps yang anda masukkan harus valid');

        // custom wadah pesan (delimiter)
        $this->form_validation->set_error_delimiters('<div class="text-center"><span class="badge badge-danger text-white mt-2 px-4">', '</span></div>');

        // cek inputan sudah sesuai rules apa belum
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('pesan', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Maaf!</strong> Mohon periksa form masukan anda
                <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            ');
            $data['profil'] = $this->m_crud->edit(['id_profil' => 1], 'profil')->result();
            $data['sidebar'] = 'website';
            $this->load->view('templates/admin_header');
            $this->load->view('templates/admin_sidebar', $data);
            $this->load->view('templates/admin_navbar');
            $this->load->view('admin/profil', $data);
            $this->load->view('templates/admin_footer_js');
            $this->load->view('templates/admin_custom_js');
            $this->load->view('templates/admin_footer');
        } else {
            $where = array(
                'id_profil' => $id_profil
            );

            $data = array(
                'nama_profil' => $this->input->post('nama'),
                'alamat_profil' => $this->input->post('alamat'),
                'deskripsi_about' => $this->input->post('deskripsi'),
                'konten_about' => $this->input->post('konten'),
                'no_telp_profil' => $this->input->post('no_hp'),
                'email_profil' => $this->input->post('email'),
                'maps' => $this->input->post('maps')
            );

            $this->m_crud->update($where, $data, 'profil');
            if ($this->db->affected_rows() == true) {
                $this->session->set_flashdata('pesan', '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Selamat!</strong> Anda berhasil mengubah data.
                    <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                ');
                redirect("admin/profil/");
            } else {
                $this->session->set_flashdata('pesan', '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Maaf!</strong> Anda gagal mengubah data.
                    <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                ');
                redirect("admin/profil/");
            }
        }
    }
}