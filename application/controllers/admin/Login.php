<?php

class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Adm_login');
        if ($this->session->userdata('status') != '') {
            redirect('admin/guide');
        }
    }

    function index()
    {
        $this->load->view('admin/login');
    }

    function login()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password_admin', 'Password', 'trim|required');

        $this->form_validation->set_message('required', 'Mohon maaf, {field} harus diisi');

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');
        if ($this->form_validation->run() == false) {
            $this->load->view('admin/login');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password_admin');

            $admin = $this->db->get_where('tb_admin', ['username' => $username])->row_array();
            if ($admin != null) {
                if (md5($password) == $admin['password_admin']) {
                    $data = [
                        'username' => $admin['username'],
                        'id'       => $admin['id_admin'],
                        'status'   => $admin['status']
                    ];
                    $this->session->set_userdata($data);
                    redirect('admin/guide');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Salah</div>');
                    redirect('admin/login');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username Tidak Terdaftar</div>');
                redirect('admin/login');
            }
        }
    }

    function logout(){
		$this->session->sess_destroy(); //menghentikan semua sesion
		redirect(base_url('admin/login')); // diarahkan ke form login
	}


    /*
    function index()
    {
        if ($this->session->userdata('username') != '') {
            $this->load->view('/admin/login');
        }
    }

    function login_admin()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password_admin');

        $where = array(
            'username' => $username,
            'password_admin' => md5($password)
        );

        $admin = $this->Adm_login->cek_login("tb_admin", $where);

        if ($admin->num_rows() > 0) {
            $data_session = array(
                'id_admin' => $admin->row()->id_admin,
                'username' => $username,
                'password_admin' => $password
            );
            $this->session->set_userdata($data_session);
            redirect(base_url('admin/anggota'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            <button type="button" class="close pt-2" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
            </button>
            Username atau Password yang Dimasukkan Salah!
            </div>');
            redirect('admin/login');
        }
    }
    */

    /*
    function login_admin()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password_admin', 'Password_admin', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view('admin/login');
        } else {
            $admin = $this->adm_login->cek_login();
            if ($admin == false) {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Username atau Password yang Anda masukkan salah
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>'
                );
                redirect('admin/login_admin');
            } else {
                $this->session->set_userdata('username', $admin->username);
                redirect('admin/anggota');
            }
        }
    }
    */
}
