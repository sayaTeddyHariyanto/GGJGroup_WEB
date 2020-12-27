<?php

// Class Zakat
class Distribusi extends CI_Controller
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
        $data['dis'] = $this->m_crud->getAll('distribusi_zakat')->result();
        $data['kategori'] = $this->m_crud->getAll('tb_kategori')->result();
        $data['anggota'] = $this->m_crud->edit(['status_anggota' => 1], 'tb_anggota')->result();
        $data['penerima'] = $this->m_crud->edit(['status_penerima' => 1], 'tb_penerima')->result();
        $data['sidebar'] = 'distribusi';
        $this->load->view('templates/admin_header');
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('templates/admin_navbar');
        $this->load->view('admin/distribusi', $data);
        $this->load->view('templates/admin_footer_js');
        $this->load->view('templates/admin_custom_js');
        $this->load->view('templates/admin_footer');
    }

    function tambah()
    {
        // rules
        $this->form_validation->set_rules('status', 'Status', 'trim|required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'trim|required');
        $this->form_validation->set_rules('judul', 'Judul', 'trim|required|min_length[2]|max_length[100]|callback_addr_line1');
        $this->form_validation->set_rules('nominal', 'Nomor Hp', 'trim|required|numeric');

        // custom pesan
        $this->form_validation->set_message('required', 'Mohon maaf, {field} harus diisi');
        $this->form_validation->set_message('numeric', 'Mohon maaf, {field} harus diisi menggunakan angka saja');
        $this->form_validation->set_message('min_length', 'Mohon maaf, Masukan {field} minimum {param} karakter');
        $this->form_validation->set_message('max_length', 'Mohon maaf, Masukan {field} maximum {param} karakter');

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
            $data['dis'] = $this->m_crud->getAll('distribusi_zakat')->result();
            $data['kategori'] = $this->m_crud->getAll('tb_kategori')->result();
            $data['anggota'] = $this->m_crud->getAll('tb_anggota')->result();
            $data['penerima'] = $this->m_crud->getAll('tb_penerima')->result();
            $data['sidebar'] = 'distribusi';
            $this->load->view('templates/admin_header');
            $this->load->view('templates/admin_sidebar', $data);
            $this->load->view('templates/admin_navbar');
            $this->load->view('admin/distribusi', $data);
            $this->load->view('templates/admin_footer_js');
            $this->load->view('templates/admin_custom_js');
            $this->load->view('templates/admin_footer');
        }else{
            $data = array(
                'id_kategori' => $this->input->post('kategori'),
                'judul_distribusi' => $this->input->post('judul'),
                'tanggal_distribusi' => $this->input->post('tanggal'),
                'nominal_distribusi' => $this->input->post('nominal'),
                'status_distribusi' => $this->input->post('status'),
            );

            $this->m_crud->insert($data, 'distribusi_zakat');
            if ($this->db->affected_rows() == true) {
                $insert_id = $this->db->insert_id();
                $anggota = $this->input->post('anggota');
                for ($i=0; $i < count($anggota); $i++) { 
                    $dataAng = array(
                        'id_anggota' => $anggota[$i],
                        'id_distribusi' => $insert_id
                    );

                    $this->m_crud->insert($dataAng, 'tb_detail_anggota');
                }

                $penerima = $this->input->post('penerima');
                for ($i=0; $i < count($penerima); $i++) { 
                    $dataAng = array(
                        'id_penerima' => $penerima[$i],
                        'id_distribusi' => $insert_id
                    );

                    $this->m_crud->insert($dataAng, 'tb_detail_penerima');
                }

                if ($this->db->affected_rows() == true) {
                    $this->session->set_flashdata('pesan', '
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Selamat!</strong> Anda berhasil menambahkan data.
                        <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    ');
                    redirect('admin/distribusi');
                }else{
                    $this->session->set_flashdata('pesan', '
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Maaf!</strong> Anda gagal menambahkan detail data.
                        <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    ');
                    redirect('admin/distribusi');
                }
            } else {
                $this->session->set_flashdata('pesan', '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Maaf!</strong> Anda gagal menambahkan data.
                    <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                ');
                redirect('admin/distribusi');
            }
        }
    }

    function edit($id)
    {
        $data['dis'] = $this->m_crud->edit(['id_distribusi' => $id],'distribusi_zakat')->result();
        $data['det_anggota'] = $this->m_crud->edit(['id_distribusi' => $id],'tb_detail_anggota')->result();
        $data['det_penerima'] = $this->m_crud->edit(['id_distribusi' => $id],'tb_detail_penerima')->result();
        $data['kategori'] = $this->m_crud->getAll('tb_kategori')->result();
        $data['anggota'] = $this->m_crud->getAll('tb_anggota')->result();
        $data['penerima'] = $this->m_crud->getAll('tb_penerima')->result();
        $data['sidebar'] = 'distribusi';

        $this->load->view('templates/admin_header');
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('templates/admin_navbar');
        $this->load->view('admin/distribusi_edit', $data);
        $this->load->view('templates/admin_footer_js');
        $this->load->view('templates/admin_custom_js');
        $this->load->view('templates/admin_footer');
    }

    function detail($id)
    {
        $data['dis'] = $this->m_crud->edit(['id_distribusi' => $id],'distribusi_zakat')->result();
        $data['det_anggota'] = $this->m_crud->edit(['id_distribusi' => $id],'tb_detail_anggota')->result();
        $data['det_penerima'] = $this->m_crud->edit(['id_distribusi' => $id],'tb_detail_penerima')->result();
        $data['kategori'] = $this->m_crud->getAll('tb_kategori')->result();
        $data['anggota'] = $this->m_crud->getAll('tb_anggota')->result();
        $data['penerima'] = $this->m_crud->getAll('tb_penerima')->result();
        $data['sidebar'] = 'distribusi';

        $this->load->view('templates/admin_header');
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('templates/admin_navbar');
        $this->load->view('admin/distribusi_detail', $data);
        $this->load->view('templates/admin_footer_js');
        $this->load->view('templates/admin_custom_js');
        $this->load->view('templates/admin_footer');
    }

    function hapus($id_distribusi)
    {
        $where = array(
            'id_distribusi' => $id_distribusi
        );

        $this->m_crud->delete($where, 'tb_detail_anggota');
        $this->m_crud->delete($where, 'tb_detail_penerima');
        $this->m_crud->delete($where, 'distribusi_zakat');
        if ($this->db->affected_rows() == true) {
            $this->session->set_flashdata('pesan', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Selamat!</strong> Anda berhasil menghapus data.
                <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            ');
            redirect("admin/distribusi");
        } else {
            $this->session->set_flashdata('pesan', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Maaf!</strong> Anda gagal menghapus data.
                <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            ');
            redirect("admin/distribusi");
        }
    }

    function update()
    {
        $id_distribusi = $this->input->post('id_distribusi');
        // rules
        $this->form_validation->set_rules('status', 'Status', 'trim|required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'trim|required');
        $this->form_validation->set_rules('judul', 'Judul', 'trim|required|min_length[2]|max_length[100]|callback_addr_line1');
        $this->form_validation->set_rules('nominal', 'Nomor Hp', 'trim|required|numeric');

        // custom pesan
        $this->form_validation->set_message('required', 'Mohon maaf, {field} harus diisi');
        $this->form_validation->set_message('numeric', 'Mohon maaf, {field} harus diisi menggunakan angka saja');
        $this->form_validation->set_message('min_length', 'Mohon maaf, Masukan {field} minimum {param} karakter');
        $this->form_validation->set_message('max_length', 'Mohon maaf, Masukan {field} maximum {param} karakter');

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
            $data['dis'] = $this->m_crud->edit(['id_distribusi' => $id],'distribusi_zakat')->result();
            $data['det_anggota'] = $this->m_crud->edit(['id_distribusi' => $id],'tb_detail_anggota')->result();
            $data['det_penerima'] = $this->m_crud->edit(['id_distribusi' => $id],'tb_detail_penerima')->result();
            $data['kategori'] = $this->m_crud->getAll('tb_kategori')->result();
            $data['anggota'] = $this->m_crud->getAll('tb_anggota')->result();
            $data['penerima'] = $this->m_crud->getAll('tb_penerima')->result();
            $data['sidebar'] = 'distribusi';
            $this->load->view('templates/admin_header');
            $this->load->view('templates/admin_sidebar', $data);
            $this->load->view('templates/admin_navbar');
            $this->load->view('admin/distribusi_edit', $data);
            $this->load->view('templates/admin_footer_js');
            $this->load->view('templates/admin_custom_js');
            $this->load->view('templates/admin_footer');
        }else{
            $data = array(
                'id_kategori' => $this->input->post('kategori'),
                'judul_distribusi' => $this->input->post('judul'),
                'tanggal_distribusi' => $this->input->post('tanggal'),
                'nominal_distribusi' => $this->input->post('nominal'),
                'status_distribusi' => $this->input->post('status'),
            );

            $where = ['id_distribusi' => $id_distribusi];

            $this->db->trans_start();
            $this->m_crud->update($where, $data, 'distribusi_zakat');
            $this->db->trans_complete();
            if ($this->db->trans_status() == true) {
                $anggota = $this->input->post('anggota');
                $this->m_crud->delete($where, 'tb_detail_anggota');
                for ($i=0; $i < count($anggota); $i++) { 

                    $dataAng = array(
                        'id_anggota' => $anggota[$i],
                        'id_distribusi' => $id_distribusi
                    );

                    $this->m_crud->insert($dataAng, 'tb_detail_anggota');
                }

                $penerima = $this->input->post('penerima');
                $this->m_crud->delete($where, 'tb_detail_penerima');
                for ($i=0; $i < count($penerima); $i++) { 
                    $dataAng = array(
                        'id_penerima' => $penerima[$i],
                        'id_distribusi' => $id_distribusi
                    );

                    $this->m_crud->insert($dataAng, 'tb_detail_penerima');
                }

                if ($this->db->affected_rows() == true) {
                    $this->session->set_flashdata('pesan', '
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Selamat!</strong> Anda berhasil mengubah data.
                        <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    ');
                    redirect('admin/distribusi/edit/' . $id_distribusi);
                }else{
                    $this->session->set_flashdata('pesan', '
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Maaf!</strong> Anda gagal mengubah detail data.
                        <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    ');
                    redirect('admin/distribusi/edit/' . $id_distribusi);
                }
            } else {
                $this->session->set_flashdata('pesan', '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Maaf!</strong> Anda gagal mengubah data.
                    <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                ');
                redirect('admin/distribusi/edit/' . $id_distribusi);
            }
        }
    }
}
