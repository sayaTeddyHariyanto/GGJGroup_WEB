<?php

// Class Anggota
class Kontak extends CI_Controller
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
        $data['kontak'] = $this->m_crud->getAll('kontak')->result();
        $this->load->view('templates/admin_header');
        $this->load->view('templates/admin_sidebar');
		$this->load->view('templates/admin_navbar');
		$this->load->view('admin/kontak', $data);
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
        public function check_valid_url( $param )
    {
    if( ! filter_var($param, FILTER_VALIDATE_URL) ){
        $this->form_validation->set_message('check_valid_url', 'Masukkan {field} link yang benar');
        return FALSE;
    }else{
        return TRUE;
    }
    
    } 

    function tambah()
    {
        // rules
        $this->form_validation->set_rules('nama', 'Nama Sosial Media', 'trim|required|alpha_numeric_spaces|min_length[2]|max_length[100]');
        $this->form_validation->set_rules('akun', 'Nama Akun', 'trim|required|alpha_numeric_spaces|min_length[2]|max_length[100]');
        $this->form_validation->set_rules('link', 'Link Akun', 'trim|required|callback_check_valid_url');

        // custom pesan
        $this->form_validation->set_message('required', 'Mohon maaf, {field} harus diisi');
        $this->form_validation->set_message('alpha_numeric', 'Mohon maaf, {field} harus diisi menggunakan huruf dan angka');
        $this->form_validation->set_message('alpha_numeric_spaces', 'Mohon maaf, {field} harus diisi menggunakan huruf, angka, spasi');
        $this->form_validation->set_message('min_length', 'Mohon maaf, Masukan {field} minimum {param} karakter');
        $this->form_validation->set_message('max_length', 'Mohon maaf, Masukan {field} maximum {param} karakter');
        $this->form_validation->set_message('valid_url', 'Mohon maaf, Url yang anda masukkan harus valid');
        

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
            $data['kontak'] = $this->m_crud->getAll('kontak')->result();
            $this->load->view('templates/admin_header');
            $this->load->view('templates/admin_sidebar');
            $this->load->view('templates/admin_navbar');
            $this->load->view('admin/kontak', $data);
            $this->load->view('templates/admin_footer_js');
            $this->load->view('templates/admin_custom_js');
            $this->load->view('templates/admin_footer');
        }else{
                switch ($this->input->post('nama')) {
                    case 'Whatsapp':
                    $icon = 'bxl-whatsapp';
                    break;
                    case 'Instagram':
                    $icon = 'bxl-instagram';
                    break;
                    case 'Facebook':
                    $icon = 'bxl-facebook';
                    break;
                    case 'Twitter':
                    $icon = 'bxl-twitter';
                    break;
                }

            $data = array(
                'nama_sosmed' => $this->input->post('nama'),
                'ikon' => $icon,
                'nama_akun' => $this->input->post('akun'),
                'link_akun' => $this->input->post('link')
            );

            $this->m_crud->insert($data, 'kontak');
            if ($this->db->affected_rows() == true) {
                $this->session->set_flashdata('pesan', '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Selamat!</strong> Anda berhasil menambahkan data.
                    <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                ');
                redirect('admin/kontak');
            }else{
                $this->session->set_flashdata('pesan', '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Maaf!</strong> Anda gagal menambahkan data.
                    <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                ');
                redirect('admin/kontak');
            }
        }
    }

    function edit($id_kontak)
    {
        $where = array('id_kontak' => $id_kontak);
        $data['kontak'] = $this->m_crud->edit($where, 'kontak')->result();
        $this->load->view('templates/admin_header');
        $this->load->view('templates/admin_sidebar');
		$this->load->view('templates/admin_navbar');
		$this->load->view('admin/kontak_edit', $data);
        $this->load->view('templates/admin_footer_js');
        $this->load->view('templates/admin_custom_js');
        $this->load->view('templates/admin_footer');
    }

    function update()
    {
        $id_kontak = $this->input->post('id_kontak');

        // rules
        $this->form_validation->set_rules('nama', 'Nama Sosial Media', 'trim|required|alpha_numeric_spaces|min_length[2]|max_length[100]');
        $this->form_validation->set_rules('akun', 'Nama Akun', 'trim|required|alpha_numeric_spaces|min_length[2]|max_length[100]');
        $this->form_validation->set_rules('link', 'Link Akun', 'trim|required|callback_check_valid_url');

        // custom pesan
        $this->form_validation->set_message('required', 'Mohon maaf, {field} harus diisi');
        $this->form_validation->set_message('alpha_numeric', 'Mohon maaf, {field} harus diisi menggunakan huruf dan angka');
        $this->form_validation->set_message('alpha_numeric_spaces', 'Mohon maaf, {field} harus diisi menggunakan huruf, angka, spasi');
        $this->form_validation->set_message('min_length', 'Mohon maaf, Masukan {field} minimum {param} karakter');
        $this->form_validation->set_message('max_length', 'Mohon maaf, Masukan {field} maximum {param} karakter');
        $this->form_validation->set_message('valid_url', 'Mohon maaf, Url yang anda masukkan harus valid');
        

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
            $where = array('id_kontak' => $id_kontak);
            $data['kontak'] = $this->m_crud->edit($where, 'kontak')->result();
            $this->load->view('templates/admin_header');
            $this->load->view('templates/admin_sidebar');
            $this->load->view('templates/admin_navbar');
            $this->load->view('admin/kontak_edit', $data);
            $this->load->view('templates/admin_footer_js');
            $this->load->view('templates/admin_custom_js');
            $this->load->view('templates/admin_footer');
        }else{
            switch ($this->input->post('nama')) {
                case 'Whatsapp':
                $icon = 'bxl-whatsapp';
                break;
                case 'Instagram':
                $icon = 'bxl-instagram';
                break;
                case 'Facebook':
                $icon = 'bxl-facebook';
                break;
                case 'Twitter':
                $icon = 'bxl-twitter';
                break;
            }

            $where = array(
                'id_kontak' => $id_kontak
            );

            $data = array(
                'nama_sosmed' => $this->input->post('nama'),
                'ikon' => $icon,
                'nama_akun' => $this->input->post('akun'),
                'link_akun' => $this->input->post('link')
            );

            $this->m_crud->update($where, $data, 'kontak');
            if ($this->db->affected_rows() == true) {
                $this->session->set_flashdata('pesan', '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Selamat!</strong> Anda berhasil mengubah data.
                    <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                ');
                redirect("admin/kontak/edit/$id_kontak");
            }else{
                $this->session->set_flashdata('pesan', '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Maaf!</strong> Anda gagal mengubah data.
                    <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                ');
                redirect("admin/kontak/edit/$id_kontak");
            }
        }
    }

    function hapus($id_kontak)
    {
        $where = array(
            'id_kontak' => $id_kontak
        );

        $this->m_crud->delete($where, 'kontak');
        if ($this->db->affected_rows() == true) {
            $this->session->set_flashdata('pesan', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Selamat!</strong> Anda berhasil menghapus data.
                <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            ');
            redirect("admin/kontak");
        }else{
            $this->session->set_flashdata('pesan', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Maaf!</strong> Anda gagal menghapus data.
                <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            ');
            redirect("admin/kontak");
        }
    }

    function detail($id_kontak)
    {
        $where = array('id_kontak' => $id_kontak);
        $data['kontak'] = $this->m_crud->edit($where, 'kontak')->result();
        $this->load->view('templates/admin_header');
        $this->load->view('templates/admin_sidebar');
		$this->load->view('templates/admin_navbar');
		$this->load->view('admin/kontak_detail', $data);
        $this->load->view('templates/admin_footer_js');
        $this->load->view('templates/admin_custom_js');
        $this->load->view('templates/admin_footer');
    }
}
