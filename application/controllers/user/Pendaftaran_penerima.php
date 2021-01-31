<?php

class Pendaftaran_penerima extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model(['m_penerima', 'm_crud']);

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
        $data['penerima'] = $this->m_penerima->tampil_tabel()->result();
        $data['kategori'] = $this->m_penerima->kategori();
        $data['anggota'] = $this->m_penerima->anggota();
        $this->load->view('templates/user_header');
        $this->load->view('templates/user_navbar');
        $this->load->view('user/pendaftaran_penerima', $data);
        $this->load->view('templates/user_footer_js');
        $this->load->view('templates/user_custom_js');
        $this->load->view('templates/user_footer');
    }

    function tambah_penerima2()
    {
        //rules
        $this->form_validation->set_rules('nama_penerima', 'Nama Penerima', 'trim|required|alpha_numeric_spaces|min_length[2]|max_length[100]');
        $this->form_validation->set_rules('alamat_penerima', 'Alamat Penerima', 'trim|required|callback_addr_line1|max_length[225]');
        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'trim|required|alpha_numeric_spaces|min_length[2]|max_length[100]');
        $this->form_validation->set_rules('jumlah_tanggungan', 'Jumlah Tanggungan', 'trim|required|numeric');
        $this->form_validation->set_rules('jumlah_terima', 'Jumlah Terima', 'trim|required|numeric');

        //pesan
        $this->form_validation->set_message('required', 'Maaf, {field} harus terisi');
        $this->form_validation->set_message('alpha_numeric_spaces', 'Mohon maaf, {field} isikan dengan huruf, angka, spasi');
        $this->form_validation->set_message('numeric', 'Mohon maaf, {field} harus diisi menggunakan angka saja');
        $this->form_validation->set_message('min_length', 'Mohon maaf, Masukan {field} minimum {param} karakter');
        $this->form_validation->set_message('max_length', 'Mohon maaf, Masukan {field} maximum {param} karakter');

        $this->form_validation->set_error_delimiters('<div class="text-center"><span class="badge badge-danger text-white mt-2 px-4">', '</span></div>');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('pesan', '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Maaf!</strong> coba lengkapi ulang form register.
                <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
                ');
            $data['penerima'] = $this->m_penerima->tampil_tabel()->result();
            $data['kategori'] = $this->m_crud->getAll('tb_kategori')->result();
            $data['anggota'] = $this->m_crud->getAll('tb_anggota')->result();

            $this->load->view('templates/user_header');
            $this->load->view('templates/user_navbar');
            $this->load->view('user/pendaftaran_penerima', $data);
            $this->load->view('templates/user_footer_js');
            $this->load->view('templates/user_custom_js');
            $this->load->view('templates/user_footer');
        } else {
            $data = array(
                'id_kategori' => $this->input->post('nama_kategori'),
                'id_anggota' => $this->session->userdata('id'),
                'nama_penerima' => $this->input->post('nama_penerima'),
                'alamat_penerima' => $this->input->post('alamat_penerima'),
                'pekerjaan' => $this->input->post('pekerjaan'),
                'jumlah_tanggungan' => $this->input->post('jumlah_tanggungan'),
                'jumlah_terima' => $this->input->post('jumlah_terima'),
                'status_penerima' => 0
            );

            $this->m_crud->insert($data, 'tb_penerima');
            if ($this->db->affected_rows() == true) {
                $this->session->set_flashdata('pesan', '
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Selamat!</strong> Anda berhasil menambahkan data baru.
                            <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        ');
                redirect('user/history_pendaftaran');
            } else {
                $this->session->set_flashdata('pesan', '
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Maaf!</strong> Anda gagal menambahkan data.
                            <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        ');
                redirect('user/pendaftaran_penerima');
            }
        }
    }
}
