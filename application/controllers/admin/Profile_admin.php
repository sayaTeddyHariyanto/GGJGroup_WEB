<?php
class Profile_admin extends CI_Controller
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

        $data['admin'] = $this->m_crud->getIds('tb_admin', 'id_admin')->result();

        $this->load->view('templates/admin_header');
        $this->load->view('templates/admin_sidebar');
        $this->load->view('templates/admin_navbar');
        $this->load->view('admin/edit_profile', $data);
        $this->load->view('templates/admin_footer_js');
        $this->load->view('templates/admin_custom_js');
        $this->load->view('templates/admin_footer');
    }
    function edit_profil($id_admin)
    {
        $where = array('id_admin' => $id_admin);
        $data['admin'] = $this->m_crud->edit($where, 'tb_admin')->result();

        $this->load->view('templates/admin_header');
        $this->load->view('templates/admin_sidebar');
        $this->load->view('templates/admin_navbar');
        $this->load->view('admin/edit_profile', $data);
        $this->load->view('templates/admin_footer_js');
        $this->load->view('templates/admin_custom_js');
        $this->load->view('templates/admin_footer');
    }
    function update_profil()
    {
        $id_admin = $this->input->post('id_admin');
        //rules
        $this->form_validation->set_rules('nama_admin', 'Nama Admin', 'trim|required|alpha_numeric_spaces|min_length[2]|max_length[100]');
        $this->form_validation->set_rules('no_hp_admin', 'NO Hp', 'trim|required|numeric|min_length[10]|max_length[13]');
        $this->form_validation->set_rules('alamat_admin', 'Alamat Admin', 'required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_numeric_spaces|min_length[2]|max_length[32]');
        $this->form_validation->set_rules('password_admin', 'Password', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        //custom pesan
        $this->form_validation->set_message('required', 'Maaf, {field} harus terisi');
        $this->form_validation->set_message('alpha_numeric_spaces', 'Mohon maaf, {field} isikan dengan huruf, angka, spasi');
        $this->form_validation->set_message('numeric', 'Mohon maaf, {field} harus diisi menggunakan angka saja');
        $this->form_validation->set_message('min_length', 'Mohon maaf, Masukan {field} minimum {param} karakter');
        $this->form_validation->set_message('max_length', 'Mohon maaf, Masukan {field} maximum {param} karakter');
        //wadah pesan
        $this->form_validation->set_error_delimiters('<div class="text-center"><span class="badge badge-danger text-white mt-2 px-4">', '</span></div>');
        //cek inputan sesuai rules atau tak?
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('pesan', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Maaf!</strong> Mohon periksa form masukan anda
                <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            ');
            $where = array('id_admin' => $id_admin);
            $data['admin'] = $this->m_crud->edit($where, 'tb_admin')->result();
            $this->load->view('templates/admin_header', $data);
            $this->load->view('templates/admin_sidebar');
            $this->load->view('templates/admin_navbar', $data);
            $this->load->view('admin/edit_profile', $data);
            $this->load->view('templates/admin_footer_js');
            $this->load->view('templates/admin_custom_js');
            $this->load->view('templates/admin_footer');
        } else {
            $where = array(
                'id_admin' => $id_admin
            );
            $data = array(
                'nama_admin' => $this->input->post('nama_admin'),
                'no_hp_admin' => $this->input->post('no_hp_admin'),
                'alamat_admin' => $this->input->post('alamat_admin'),
                'username' => $this->input->post('username'),
                'password_admin' => $this->input->post('password_admin'),
                'status' => $this->input->post('status')
            );
            $this->m_crud->update($where, $data, 'tb_admin');
            if ($this->db->affected_rows() == true) {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Selamat!</strong> Anda berhasil mengubah data.
                    <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>'
                );
                redirect("admin/profile_admin/edit_profil/$id_admin");
            } else {
                $this->session->set_flashdata('pesan', '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Maaf!</strong> Anda gagal mengubah data.
                    <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                ');
                redirect("admin/profile_admin/edit_profil/$id_admin");
            }
        }
    }

    function view_profil($id_admin)
    {
        $where = array('id_admin' => $id_admin);
        $data['admin'] = $this->m_crud->edit($where, 'tb_admin')->result();

        $this->load->view('templates/admin_header');
        $this->load->view('templates/admin_sidebar');
        $this->load->view('templates/admin_navbar');
        $this->load->view('admin/view_admin', $data);
        $this->load->view('templates/admin_footer_js');
        $this->load->view('templates/admin_custom_js');
        $this->load->view('templates/admin_footer');
    }
    function update()
    {
        $this->form_validation->set_rules('nama_admin', 'Nama Admin', 'trim|required|alpha_numeric_spaces|min_length[2]|max_length[100]');
        $this->form_validation->set_rules('no_hp_admin', 'NO Hp', 'trim|required|numeric|min_length[10]|max_length[13]');
        $this->form_validation->set_rules('alamat_admin', 'Alamat Admin', 'required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_numeric_spaces|min_length[2]|max_length[32]');
        $this->form_validation->set_rules('password_admin', 'Password', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');

        $this->form_validation->set_message('required', 'Maaf, {field} harus terisi');
        $this->form_validation->set_message('alpha_numeric_spaces', 'Mohon maaf, {field} isikan dengan huruf, angka, spasi');
        $this->form_validation->set_message('numeric', 'Mohon maaf, {field} harus diisi menggunakan angka saja');
        $this->form_validation->set_message('min_length', 'Mohon maaf, Masukan {field} minimum {param} karakter');
        $this->form_validation->set_message('max_length', 'Mohon maaf, Masukan {field} maximum {param} karakter');

        $this->form_validation->set_error_delimiters('<div class="text-center"><span class="badge badge-danger text-white mt-2 px-4">', '</span></div>');
        $id_admin = $this->input->post('id_admin');


        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('pesan', 'strong>Maaf!</strong> Mohon periksa form masukan anda
            <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>');

            $where = array('id_admin' => $id_admin);
            $data['admin'] = $this->m_crud->edit($where, 'tb_admin')->result();

            $this->load->view('templates/admin_header');
            $this->load->view('templates/admin_sidebar');
            $this->load->view('templates/admin_navbar');
            $this->load->view('admin/edit_profile', $data);
            $this->load->view('templates/admin_footer_js');
            $this->load->view('templates/admin_custom_js');
            $this->load->view('templates/admin_footer');
        } else {
            $where = array('id_penerima' => $id_admin);

            $data = array(
                'nama_admin' => $this->input->post('nama_admin'),
                'no_hp_admin' => $this->input->post('no_hp_admin'),
                'alamat_admin'

            );
        }
    }
}
