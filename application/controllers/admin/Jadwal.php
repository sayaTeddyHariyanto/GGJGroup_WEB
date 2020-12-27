<?php

// Class Zakat
class Jadwal extends CI_Controller
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
        $data['jadwal'] = $this->m_crud->getAll('jadwal_kegiatan')->result();
        $data['sidebar'] = 'website';
        $this->load->view('templates/admin_header');
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('templates/admin_navbar');
        $this->load->view('admin/jadwal', $data);
        $this->load->view('templates/admin_footer_js');
        $this->load->view('templates/admin_custom_js');
        $this->load->view('templates/admin_footer');
    }

    function ubah_status($id_kegiatan)
    {
        $where = array(
            'id_kegiatan' => $id_kegiatan
        );
        $data = array(
            'status_kegiatan' => 0
        );

        $this->m_crud->update($where, $data, 'jadwal_kegiatan');
        if ($this->db->affected_rows() == true) {
            $this->session->set_flashdata('pesan', '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Selamat!</strong> Anda berhasil mengubah status.
                    <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
            redirect("admin/jadwal");
        } else {
            $this->session->set_flashdata('pesan', '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Maaf!</strong> Anda gagal mengubah status.
                    <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                ');
            redirect("admin/jadwal");
        }
    }

    function ubah_status2($id_kegiatan)
    {
        $where = array(
            'id_kegiatan' => $id_kegiatan
        );
        $data = array(
            'status_kegiatan' => 1
        );

        $this->m_crud->update($where, $data, 'jadwal_kegiatan');
        if ($this->db->affected_rows() == true) {
            $this->session->set_flashdata('pesan', '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Selamat!</strong> Anda berhasil mengubah status.
                    <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
            redirect("admin/jadwal");
        } else {
            $this->session->set_flashdata('pesan', '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Maaf!</strong> Anda gagal mengubah status.
                    <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                ');
            redirect("admin/jadwal");
        }
    }

    function hapus($id_kegiatan)
    {
        $where = array(
            'id_kegiatan' => $id_kegiatan
        );

        $this->m_crud->delete($where, 'jadwal_kegiatan');
        if ($this->db->affected_rows() == true) {
            $this->session->set_flashdata('pesan', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Selamat!</strong> Anda berhasil menghapus data.
                <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            ');
            redirect("admin/jadwal");
        } else {
            $this->session->set_flashdata('pesan', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Maaf!</strong> Anda gagal menghapus data.
                <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            ');
            redirect("admin/jadwal");
        }
    }

    function tambah()
    {
        $data = array(
            'tanggal_kegiatan' => $this->input->post('tanggal'),
            'judul' => $this->input->post('judul'),
            'status_kegiatan' => $this->input->post('status')
        );

        $this->m_crud->insert($data, 'jadwal_kegiatan');
        if ($this->db->affected_rows() == true) {
            $this->session->set_flashdata('pesan', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Selamat!</strong> Anda berhasil menambahkan data Jadwal Kegiatan.
                <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            ');
            redirect('admin/jadwal');
        } else {
            $this->session->set_flashdata('pesan', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Maaf!</strong> Anda gagal menambahkan data Jadwal Kegiatan.
                <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            ');
            redirect('admin/jadwal');
        }
    }

    function edit($id_kegiatan)
    {
        $where = array('id_kegiatan' => $id_kegiatan);
        $data['jadwal'] = $this->m_crud->edit($where, 'jadwal_kegiatan')->result();
        $data['sidebar'] = 'website';
        $this->load->view('templates/admin_header');
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('templates/admin_navbar');
        $this->load->view('admin/jadwal_edit', $data);
        $this->load->view('templates/admin_footer_js');
        $this->load->view('templates/admin_custom_js');
        $this->load->view('templates/admin_footer');
    }

    function update()
    {
        $id_kegiatan = $this->input->post('id_kegiatan');

        $where = array(
            'id_kegiatan' => $id_kegiatan
        );

        $data = array(
            'tanggal_kegiatan' => $this->input->post('tanggal'),
            'judul' => $this->input->post('judul'),
            'status_kegiatan' => $this->input->post('status')
        );

        $this->m_crud->update($where, $data, 'jadwal_kegiatan');
        if ($this->db->affected_rows() == true) {
            $this->session->set_flashdata('pesan', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Selamat!</strong> Anda berhasil mengubah data.
                <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            ');
            redirect("admin/jadwal/edit/$id_kegiatan");
        } else {
            $this->session->set_flashdata('pesan', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Maaf!</strong> Anda gagal mengubah data.
                <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            ');
            redirect("admin/jadwal/edit/$id_kegiatan");
        }
    }
}
