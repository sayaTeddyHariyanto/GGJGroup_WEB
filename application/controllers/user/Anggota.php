<?php

class Anggota extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_crud');
        $this->load->library('form_validation');
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
        }
    }

    function edit()
    {
        $id = $this->session->userdata('id');
        $data['anggota'] = $this->m_crud->edit(['id_anggota' => $id], 'tb_anggota')->result();
        $this->load->view('templates/user_header');
        $this->load->view('templates/user_navbar');
        $this->load->view('user/profil_edit', $data);
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

    function ganti_password()
    {
        $this->load->view('templates/user_header');
        $this->load->view('templates/user_navbar');
        $this->load->view('user/ganti_password');
        $this->load->view('templates/user_footer_js');
        $this->load->view('templates/user_custom_js');
        $this->load->view('templates/user_footer');
    }

    function aturulang_sandi()
    {
        $id_anggota = $this->input->post('id_anggota');

        // rules
        $this->form_validation->set_rules('password_sekarang', 'Password Lama', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('password_baru', 'Password', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('password_baru2', 'Masukkan Ulang Password', 'trim|required|matches[password_baru]');
        // custom pesan
        $this->form_validation->set_message('required', 'Mohon maaf, {field} harus diisi');
        $this->form_validation->set_message('min_length', 'Mohon maaf, Masukan {field} minimum {param} karakter');
        $this->form_validation->set_message('matches', 'Kolom <strong>{field}</strong> harus sama persis dengan kolom <strong>{param}</strong>.');
        // custom wadah pesan (delimiter)
        $this->form_validation->set_error_delimiters('<div class="text-center"><span class="badge badge-danger text-white mt-2 px-4">', '</span></div>');

        // cek inputan sudah sesuai rules apa belum
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/user_header');
            $this->load->view('templates/user_navbar');
            $this->load->view('user/ganti_password');
            $this->load->view('templates/user_footer_js');
            $this->load->view('templates/user_custom_js');
            $this->load->view('templates/user_footer');
        }else{
            $id_anggota = $this->session->userdata('id');
            $passwordlama = $this->input->post('password_sekarang');
            $passwordbaru = $this->input->post('password_baru');
            $where = array('id_anggota' => $id_anggota, 'password_anggota' => md5($passwordlama));
            $cekpasswordlama = $this->m_crud->edit($where, 'tb_anggota');
            
            if ($cekpasswordlama->num_rows() > 0) {
                if ($passwordbaru != $passwordlama) {
                    $where = array('id_anggota' => $id_anggota);
                    $data = array('password_anggota' => md5($passwordbaru));
                    $this->db->trans_start();
                    $this->m_crud->update($where, $data, 'tb_anggota');
                    $this->db->trans_complete();
                    if ($this->db->trans_status() == true) {
                        $this->session->set_flashdata('pesan', '
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Selamat!</strong> Berhasil mengubah password, silahkan Login.
                            <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        ');
                        $this->session->sess_destroy();
                        redirect('user/auth/login_anggota');
                    }else{
                        $this->session->set_flashdata('pesan', '
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Maaf!</strong> Gagal Mengubah Password.
                            <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        ');
                        redirect("user/anggota/ganti_password");
                    }
                }else{
                    $this->session->set_flashdata('pesan', '
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Maaf!</strong> Password baru sama dengan password baru.
                        <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    ');
                    redirect("user/anggota/ganti_password");
                }
            }else{
                $this->session->set_flashdata('pesan', '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Maaf!</strong> Password lama yang dimasukkan salah.
                    <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                ');
                redirect("user/anggota/ganti_password");
            }
        }
    }

    function update()
    {
        // var_dump($_POST); die;
        $id_anggota = $this->input->post('id_anggota');

        // rules
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|callback_addr_line1');
        $this->form_validation->set_rules('no_hp', 'Nomor Hp', 'trim|required|numeric|min_length[10]|max_length[13]');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_dash|min_length[2]|max_length[32]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        // custom pesan
        $this->form_validation->set_message('required', 'Mohon maaf, {field} harus diisi');
        $this->form_validation->set_message('alpha_numeric', 'Mohon maaf, {field} harus diisi menggunakan huruf dan angka');
        $this->form_validation->set_message('numeric', 'Mohon maaf, {field} harus diisi menggunakan angka saja');
        $this->form_validation->set_message('alpha_dash', 'Mohon maaf, {field} harus diisi menggunakan huruf, angka, dash(-) dan underscore(_)');
        $this->form_validation->set_message('alpha_numeric_spaces', 'Mohon maaf, {field} harus diisi menggunakan huruf, angka, spasi');
        $this->form_validation->set_message('min_length', 'Mohon maaf, Masukan {field} minimum {param} karakter');
        $this->form_validation->set_message('max_length', 'Mohon maaf, Masukan {field} maximum {param} karakter');
        $this->form_validation->set_message('valid_email', 'Mohon maaf, Email yang anda masukkan harus valid');

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
            $where = array('id_anggota' => $id_anggota);
            $data['anggota'] = $this->m_crud->edit(['id_anggota' => $id_anggota], 'tb_anggota')->result();
            $this->load->view('templates/user_header');
            $this->load->view('templates/user_navbar');
            $this->load->view('user/profil_edit', $data);
            $this->load->view('templates/user_footer_js');
            $this->load->view('templates/user_custom_js');
            $this->load->view('templates/user_footer');
        } else {
            $where = array(
                'id_anggota' => $id_anggota
            );

            $data = array(
                'alamat_anggota' => $this->input->post('alamat'),
                'no_hp_anggota' => $this->input->post('no_hp'),
                'username_anggota' => $this->input->post('username'),
                'email_anggota' => $this->input->post('email'),
                'status_anggota' => $this->input->post('status')
            );

            $this->db->trans_start();
            $this->m_crud->update($where, $data, 'tb_anggota');
            $this->db->trans_complete();
            if ($this->db->trans_status() == true) {
                $this->session->set_flashdata('pesan', '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Selamat!</strong> Anda berhasil mengubah data.
                    <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                ');
                redirect("user/anggota/edit/$id_anggota");
            } else {
                $this->session->set_flashdata('pesan', '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Maaf!</strong> Anda gagal mengubah data.
                    <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                ');
                redirect("user/anggota/edit/$id_anggota");
            }
        }
    }

}