<?php
class Penerima extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model(['m_penerima', 'm_crud']);

        if ($this->session->userdata('status') == '') {
            redirect('admin/login');
        }
    }

    function index()
    {
        //$data['penerima'] = $this->m_crud->getAll('tb_penerima')->result();
        $data['penerima'] = $this->m_penerima->tampil_tabel()->result();
        $data['kategori'] = $this->m_penerima->kategori();
        $data['anggota'] = $this->m_penerima->anggota();
        $this->load->view('templates/admin_header');
        $this->load->view('templates/admin_sidebar');
        $this->load->view('templates/admin_navbar');
        $this->load->view('admin/penerima', $data);
        $this->load->view('templates/admin_footer_js');
        $this->load->view('templates/admin_custom_js');
        $this->load->view('templates/admin_footer');
    }

    function tambah_penerima()
    {
        //rules
        $this->form_validation->set_rules('nama_penerima', 'Nama Penerima', 'trim|required|alpha_numeric_spaces|min_length[2]|max_length[100]');
        $this->form_validation->set_rules('alamat_penerima', 'Alamat Penerima', 'trim|required|alpha_numeric_spaces|max_length[225]');
        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'trim|required|alpha_numeric_spaces|min_length[2]|max_length[100]');
        $this->form_validation->set_rules('jumlah_tanggungan', 'Jumlah Tanggungan', 'trim|required|numeric');
        $this->form_validation->set_rules('jumlah_terima', 'Jumlah Terima', 'trim|required|numeric');
        $this->form_validation->set_rules('status_penerima', 'Status Penerima', 'trim|required|numeric');

        //custom pesan
        $this->form_validation->set_message('required', 'Maaf, {field} harus terisi');
        $this->form_validation->set_message('alpha_numeric_spaces', 'Mohon maaf, {field} isikan dengan huruf, angka, spasi');
        $this->form_validation->set_message('numeric', 'Mohon maaf, {field} harus diisi menggunakan angka saja');
        $this->form_validation->set_message('min_length', 'Mohon maaf, Masukan {field} minimum {param} karakter');
        $this->form_validation->set_message('max_length', 'Mohon maaf, Masukan {field} maximum {param} karakter');

        //delimiter
        $this->form_validation->set_error_delimiters('<div class="text-center"><span class="badge badge-danger text-white mt-2 px-4">', '</span></div>');
        // cek inputan sudah sesuai rules apa belum
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('pesan', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Maaf!</strong> coba lengkapi ulang form.
            <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
            ');
            $data['penerima'] = $this->m_penerima->tampil_tabel()->result();
            $data['kategori'] = $this->m_crud->getAll('tb_kategori')->result();
            $data['anggota'] = $this->m_crud->getAll('tb_anggota')->result();

            $this->load->view('templates/admin_header');
            $this->load->view('templates/admin_sidebar');
            $this->load->view('templates/admin_navbar');
            $this->load->view('admin/penerima', $data);
            $this->load->view('templates/admin_footer_js');
            $this->load->view('templates/admin_custom_js');
            $this->load->view('templates/admin_footer');
        } else {
            $data = array(
                'id_kategori' => $this->input->post('nama_kategori'),
                'id_anggota' => $this->input->post('nama_anggota'),
                'nama_penerima' => $this->input->post('nama_penerima'),
                'alamat_penerima' => $this->input->post('alamat_penerima'),
                'pekerjaan' => $this->input->post('pekerjaan'),
                'jumlah_tanggungan' => $this->input->post('jumlah_tanggungan'),
                'jumlah_terima' => $this->input->post('jumlah_terima'),
                'status_penerima' => $this->input->post('status_penerima')
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
                redirect('admin/penerima');
            } else {
                $this->session->set_flashdata('pesan', '
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Maaf!</strong> Anda gagal menambahkan data.
                        <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    ');
                redirect('admin/penerima');
            }
        }
    }

    function edit_penerima($id_penerima)
    {
        $where = array(
            'id_penerima' => $id_penerima
        );
        $data['penerima'] = $this->m_crud->edit($where, 'tb_penerima')->result();
        $data['kategori'] = $this->m_crud->getAll('tb_kategori')->result();
        $data['anggota'] = $this->m_crud->getAll('tb_anggota')->result();
        //$where = array('id_penerima' => $id_penerima);
        //$data['penerima'] = $this->m_penerima->edit($where, 'tb_penerima')->result();
        $this->load->view('templates/admin_header');
        $this->load->view('templates/admin_sidebar');
        $this->load->view('templates/admin_navbar');
        $this->load->view('admin/penerima_edit', $data);
        $this->load->view('templates/admin_footer_js');
        $this->load->view('templates/admin_custom_js');
        $this->load->view('templates/admin_footer');
    }

    function update_penerima()
    {
        $id_penerima = $this->input->post('id_penerima');

        //rules
        $this->form_validation->set_rules('nama_penerima', 'Nama Penerima', 'trim|required|alpha_numeric_spaces|min_length[2]|max_length[100]');
        $this->form_validation->set_rules('alamat_penerima', 'Alamat Penerima', 'required');
        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'trim|required|alpha_numeric_spaces|min_length[2]|max_length[100]');
        $this->form_validation->set_rules('jumlah_tanggungan', 'Jumlah Tanggungan', 'trim|required|numeric');
        $this->form_validation->set_rules('jumlah_terima', 'Jumlah Terima', 'trim|required|numeric');
        $this->form_validation->set_rules('status_penerima', 'Status Penerima', 'trim|required|numeric');

        //custom pesan
        $this->form_validation->set_message('required', 'Maaf, {field} harus terisi');
        $this->form_validation->set_message('alpha_numeric_spaces', 'Mohon maaf, {field} isikan dengan huruf, angka, spasi');
        $this->form_validation->set_message('numeric', 'Mohon maaf, {field} harus diisi menggunakan angka saja');
        $this->form_validation->set_message('min_length', 'Mohon maaf, Masukan {field} minimum {param} karakter');
        $this->form_validation->set_message('max_length', 'Mohon maaf, Masukan {field} maximum {param} karakter');

        //delimiter
        $this->form_validation->set_error_delimiters('<div class="text-center"><span class="badge badge-danger text-white mt-2 px-4">', '</span></div>');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('pesan', 'strong>Maaf!</strong> Mohon periksa form masukan anda
                <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>');

            $where = array('id_penerima' => $id_penerima);
            $data['penerima'] = $this->m_crud->edit($where, 'tb_penerima')->result();
            $data['kategori'] = $this->m_crud->edit($where, 'tb_penerima')->result();
            $data['anggota']  = $this->m_crud->edit($where, 'tb_penerima')->result();
            $this->load->view('templates/admin_header');
            $this->load->view('templates/admin_sidebar');
            $this->load->view('templates/admin_navbar');
            $this->load->view('admin/penerima_edit', $data);
            $this->load->view('templates/admin_footer_js');
            $this->load->view('templates/admin_custom_js');
            $this->load->view('templates/admin_footer');
        } else {
            $where = array(
                'id_penerima' => $id_penerima
            );

            $data = array(
                'id_kategori' => $this->input->post('nama_kategori'),
                'id_anggota' => $this->input->post('nama_anggota'),
                'nama_penerima' => $this->input->post('nama_penerima'),
                'alamat_penerima' => $this->input->post('alamat_penerima'),
                'pekerjaan' => $this->input->post('pekerjaan'),
                'jumlah_tanggungan' => $this->input->post('jumlah_tanggungan'),
                'jumlah_terima' => $this->input->post('jumlah_terima'),
                'status_penerima' => $this->input->post('status_penerima')
            );

            $this->m_crud->update($where, $data, 'tb_penerima');
            if ($this->db->affected_rows() == true) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Selamat!</strong> Anda berhasil mengubah data.
                    <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>');

                redirect("admin/penerima/edit_penerima/$id_penerima");
            } else {
                $this->session->set_flashdata('pesan', '
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Maaf!</strong> Anda gagal mengubah data.
                        <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    ');
                //var_dump($data);
                //die;
                redirect("admin/penerima/edit_penerima/$id_penerima");
            }
        }
    }

    function hapus_penerima($id_penerima)
    {
        $where = array(
            'id_penerima' => $id_penerima
        );

        $this->m_penerima->delete($where, 'tb_penerima');
        if ($this->db->affected_rows() == true) {
            $this->session->set_flashdata('pesan', '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Selamat!</strong> Anda berhasil menghapus data.
                    <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                ');
            redirect('admin/penerima');
        } else {
            $this->session->set_flashdata('pesan', '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Maaf!</strong> Anda gagal menghapus data.
                    <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                ');
            redirect('admin/penerima');
        }
    }

    function detail_penerima($id_penerima)
    {
        //$where = array('id_penerima' => $id_penerima);

        $data['penerima'] = $this->m_penerima->detail($id_penerima)->result();

        $this->load->view('templates/admin_header');
        $this->load->view('templates/admin_sidebar');
        $this->load->view('templates/admin_navbar');
        $this->load->view('admin/penerima_detail', $data);
        $this->load->view('templates/admin_footer_js');
        $this->load->view('templates/admin_custom_js');
        $this->load->view('templates/admin_footer');
    }
}
