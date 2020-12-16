<?php

// Class Anggota
class Anggota extends CI_Controller
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

    function printpdf()
    {
        $this->load->library('Dompdf_gen');

        $data['anggota'] = $this->m_crud->getAll('tb_anggota')->result();

        $this->load->view('admin/anggota_print', $data);

        $paper_size = 'A4';
        $oriantation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $oriantation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan_anggota_" . date('Y-m-d_H-i-s') . ".pdf", array('Attachment' => 0));
    }

    function index()
    {
        $data['anggota'] = $this->m_crud->getAll('tb_anggota')->result();
        $this->load->view('templates/admin_header');
        $this->load->view('templates/admin_sidebar');
        $this->load->view('templates/admin_navbar');
        $this->load->view('admin/anggota', $data);
        $this->load->view('templates/admin_footer_js');
        $this->load->view('templates/admin_custom_js');
        $this->load->view('templates/admin_footer');
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

    function tambah()
    {
        // rules
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|callback_addr_line1');
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required|alpha_numeric_spaces|min_length[2]|max_length[100]');
        $this->form_validation->set_rules('no_hp', 'Nomor Hp', 'trim|required|numeric|min_length[10]|max_length[13]');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_dash|min_length[2]|max_length[32]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('status', 'Status', 'trim|required|numeric');
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
                <strong>Maaf!</strong> Anda gagal menambahkan data.
                <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            ');
            $data['anggota'] = $this->m_crud->getAll('tb_anggota')->result();
            $this->load->view('templates/admin_header');
            $this->load->view('templates/admin_sidebar');
            $this->load->view('templates/admin_navbar');
            $this->load->view('admin/anggota', $data);
            $this->load->view('templates/admin_footer_js');
            $this->load->view('templates/admin_custom_js');
            $this->load->view('templates/admin_footer');
        } else {
            $data = array(
                'nama_anggota' => $this->input->post('nama'),
                'alamat_anggota' => $this->input->post('alamat'),
                'no_hp_anggota' => $this->input->post('no_hp'),
                'email_anggota' => $this->input->post('email'),
                'username_anggota' => $this->input->post('username'),
                'password_anggota' => md5($this->input->post('password')),
                'token_anggota' => md5(rand(0, 1000)),
                'status_anggota' => $this->input->post('status')
            );

            $this->m_crud->insert($data, 'tb_anggota');
            if ($this->db->affected_rows() == true) {
                $this->session->set_flashdata('pesan', '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Selamat!</strong> Anda berhasil menambahkan data.
                    <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                ');
                redirect('admin/anggota');
            } else {
                $this->session->set_flashdata('pesan', '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Maaf!</strong> Anda gagal menambahkan data.
                    <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                ');
                redirect('admin/anggota');
            }
        }
    }

    function edit($id_anggota)
    {
        $where = array('id_anggota' => $id_anggota);
        $data['anggota'] = $this->m_crud->edit($where, 'tb_anggota')->result();
        $this->load->view('templates/admin_header');
        $this->load->view('templates/admin_sidebar');
        $this->load->view('templates/admin_navbar');
        $this->load->view('admin/anggota_edit', $data);
        $this->load->view('templates/admin_footer_js');
        $this->load->view('templates/admin_custom_js');
        $this->load->view('templates/admin_footer');
    }

    function update()
    {
        $id_anggota = $this->input->post('id_anggota');

        // rules
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|callback_addr_line1');
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required|alpha_numeric_spaces|min_length[2]|max_length[100]');
        $this->form_validation->set_rules('no_hp', 'Nomor Hp', 'trim|required|numeric|min_length[10]|max_length[13]');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_dash|min_length[2]|max_length[32]');
        $this->form_validation->set_rules('status', 'Status', 'trim|required|numeric');
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
            $data['anggota'] = $this->m_crud->edit($where, 'tb_anggota')->result();
            $this->load->view('templates/admin_header');
            $this->load->view('templates/admin_sidebar');
            $this->load->view('templates/admin_navbar');
            $this->load->view('admin/anggota_edit', $data);
            $this->load->view('templates/admin_footer_js');
            $this->load->view('templates/admin_custom_js');
            $this->load->view('templates/admin_footer');
        } else {
            $where = array(
                'id_anggota' => $id_anggota
            );

            $data = array(
                'nama_anggota' => $this->input->post('nama'),
                'alamat_anggota' => $this->input->post('alamat'),
                'no_hp_anggota' => $this->input->post('no_hp'),
                'username_anggota' => $this->input->post('username'),
                'email_anggota' => $this->input->post('email'),
                'status_anggota' => $this->input->post('status')
            );

            $this->m_crud->update($where, $data, 'tb_anggota');
            if ($this->db->affected_rows() == true) {
                $this->session->set_flashdata('pesan', '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Selamat!</strong> Anda berhasil mengubah data.
                    <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                ');
                redirect("admin/anggota/edit/$id_anggota");
            } else {
                $this->session->set_flashdata('pesan', '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Maaf!</strong> Anda gagal mengubah data.
                    <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                ');
                redirect("admin/anggota/edit/$id_anggota");
            }
        }
    }

    function hapus($id_anggota)
    {
        $where = array(
            'id_anggota' => $id_anggota
        );

        $this->m_crud->delete($where, 'tb_anggota');
        if ($this->db->affected_rows() == true) {
            $this->session->set_flashdata('pesan', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Selamat!</strong> Anda berhasil menghapus data.
                <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            ');
            redirect("admin/anggota");
        } else {
            $this->session->set_flashdata('pesan', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Maaf!</strong> Anda gagal menghapus data.
                <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            ');
            redirect("admin/anggota");
        }
    }

    function detail($id_anggota)
    {
        $where = array('id_anggota' => $id_anggota);
        $data['anggota'] = $this->m_crud->edit($where, 'tb_anggota')->result();
        $this->load->view('templates/admin_header');
        $this->load->view('templates/admin_sidebar');
        $this->load->view('templates/admin_navbar');
        $this->load->view('admin/anggota_detail', $data);
        $this->load->view('templates/admin_footer_js');
        $this->load->view('templates/admin_custom_js');
        $this->load->view('templates/admin_footer');
    }
}
