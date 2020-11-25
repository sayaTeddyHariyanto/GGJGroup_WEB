<?php

//Class Register
class Register extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_crud');
        // $this->load->library('Primslib');
    }

    function index(){

        $this->load->view('user/register');


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

        
    
    function daftar(){
        //set rules
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required|alpha_numeric_spaces|min_length[2]|max_length[100]');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|callback_addr_line1');
        $this->form_validation->set_rules('no_hp', 'Nomor Hp', 'trim|required|numeric|min_length[10]|max_length[13]');
        $this->form_validation->set_rules('name', 'Username', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tb_anggota.email_anggota]');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[4]');
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        //custom message
        $this->form_validation->set_message('alpha_numeric', 'Mohon maaf, {field} harus diisi menggunakan huruf dan angka');
        $this->form_validation->set_message('alpha_numeric_spaces', 'Mohon maaf, {field} harus diisi menggunakan huruf, angka, spasi');
        $this->form_validation->set_message('required', 'Mohon maaf, {field} harus diisi');
        $this->form_validation->set_message('min_length', 'Mohon maaf, Masukan {field} minimum {param} karakter');
        $this->form_validation->set_message('valid_email', 'Mohon maaf, Email yang anda masukkan harus valid');
        $this->form_validation->set_message('is_unique', 'Mohon maaf, Email yang anda masukkan sudah terdaftar');
        $this->form_validation->set_message('matches', 'Mohon maaf, Password yang anda masukkan tidak cocok');

        if ($this->form_validation->run() == false){
            $data['anggota'] = $this->m_crud->getAll('tb_anggota')->result();
            $this->load->view('user/register');
        }else{
            $data = array(
                'nama_anggota' => $this->input->post('nama'),
                'alamat_anggota' => $this->input->post('alamat'),
                'no_hp_anggota' => $this->input->post('no_hp'),
                'email_anggota' => $this->input->post('email'),
                'username_anggota' => $this->input->post('name'),
                'password_anggota' => md5($this->input->post('password')),
                'token_anggota' => md5(rand(0, 1000)),
                'status_anggota' => '0'
            );
            

            $this->m_crud->insert($data, 'tb_anggota');
            if ($this->db->affected_rows() == true) {
                $this->session->set_flashdata('pesan', '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Selamat!</strong> Akun Anda Berhasil Dibuat.
                    <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                ');
                redirect('admin/anggota');
            }else{
                $this->session->set_flashdata('pesan', '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Maaf!</strong> Akun Anda Gagal Dibuat.
                    <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                ');
                redirect('admin/anggota');
            }
        }

    }
    





}