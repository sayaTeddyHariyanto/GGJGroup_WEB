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
        $data['var_f'] = $this->m_penerima->fisik();
        $data['var_h'] = $this->m_penerima->hunian();
        $this->load->view('templates/user_header');
        $this->load->view('templates/user_navbar');
        $this->load->view('user/pendaftaran_penerima', $data);
        $this->load->view('templates/user_footer_js');
        $this->load->view('templates/user_custom_js');
        $this->load->view('templates/user_footer');
    }

    function tambah_penerima()
    {
        //rules
        
            $data = array(
                'id_kategori' => $this->input->post('nama_kategori'),
                'id_anggota' => $this->session->userdata('id'),
                'nama_penerima' => $this->input->post('nama_penerima'),
                'alamat_penerima' => $this->input->post('alamat_penerima'),
                'status_penerima' => 0,
                'penghasilan' => $this->input->post('penghasilan'),
                'penghasilan_p1' => $this->input->post('p1'),
                'penghasilan_p2' => $this->input->post('p2'),
                'penghasilan_p3' => $this->input->post('p3'),
                'jarak' => $this->input->post('jarak'),
                'jarak_p1' => $this->input->post('j1'),
                'jarak_p2' => $this->input->post('j2'),
                'jarak_p3' => $this->input->post('j3'),
                'fisik' => $this->input->post('fisik'),
                'fisik_p1' => $this->input->post('f1'),
                'fisik_p2' => $this->input->post('f2'),
                'fisik_p3' => $this->input->post('f3'),
                'hunian' => $this->input->post('hunian'),
                'hunian_p1' => $this->input->post('h1'),
                'hunian_p2' => $this->input->post('h2'),
                'hunian_p3' => $this->input->post('h3'),
                'skor' => $this->input->post('skor'),
                'prioritas' => $this->input->post('prioritas')
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
                redirect('user/tambah_penerima');
            }
        
    }
}
