<?php

class Login_anggota extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    function index()
    {
        $this->load->view('user/login_anggota');
    }

    function login_anggota()
    {
        $this->form_validation->set_rules('username_anggota', 'Username Anggota', 'trim|required');
        $this->form_validation->set_rules('password_anggota', 'Password', 'trim|required');

        $this->form_validation->set_message('required', 'Mohon maaf, {field} wajib terisi');

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert>', '</div>');

        if ($this->form_validation->run() == false) {
            $this->load->view('user/login_anggota');
        } else {
            $nama = $this->input->post('username_anggota');
            $password = $this->input->post('password_anggota');

            $user = $this->db->get_where('tb_anggota', ['username_anggota' => $nama])->row_array();
            if ($user != null) {
                if (md5($password) == $user['password_anggota']) {
                    $data = [
                        'username_anggota' => $user['username_anggota']
                    ];
                    $this->session->set_userdata($data);
                    redirect('user/guide');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Salah</div>');
                    redirect('user/login_anggota');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username Tidak Terdaftar</div>');
                redirect('user/login_anggota');
            }
        }
    }
}
