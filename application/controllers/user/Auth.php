<?php

class Auth extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_crud');
        $this->load->library('form_validation');
        // $this->load->library('Primslib');
        
        if ($this->session->userdata('id') != '') {
            $this->session->set_flashdata('pesan', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Dimohon untuk logout terlebih dahulu.
                <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            ');
            redirect('user/dashboard');
        }
        
    }

    function reset_password($token, $id)
    {
        $data['anggota'] = $this->m_crud->edit(['id_anggota' => $id, 'token_anggota' => $token], 'tb_anggota')->result();
        $this->load->view('templates/user_header');
        // $this->load->view('templates/user_navbar');
        $this->load->view('user/reset_password', $data);
        $this->load->view('templates/user_footer_js');
        $this->load->view('templates/user_custom_js');
        $this->load->view('templates/user_footer');
    }

    function password_reset()
    {
        // menangkap masukan dari form
        $token = $this->input->post('token');
        $id = $this->input->post('id');
        $password = md5($this->input->post('password'));

        // rules
        $this->form_validation->set_rules('password', 'Kata Sandi', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('repassword', 'Ulangi Kata Sandi', 'trim|required|matches[password]');
        // custom pesan
        $this->form_validation->set_message('required', 'Mohon maaf, <strong>{field}</strong> harus diisi.');
        $this->form_validation->set_message('matches', 'Kolom <strong>{field}</strong> harus sama persis dengan kolom <strong>{param}</strong>.');
        $this->form_validation->set_message('min_length', 'Mohon maaf, Masukan <strong>{field}</strong> minimum <strong>{param}</strong> karakter.');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible fade show" role="alert">', '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        // validasi form
        if ($this->form_validation->run() == false) { // jika validasi gagal
            $data['anggota'] = $this->m_crud->edit(['id_anggota' => $id, 'token_anggota' => $token], 'tb_anggota')->result();
            $this->load->view('templates/user_header');
            // $this->load->view('templates/user_navbar');
            $this->load->view('user/reset_password', $data);
            $this->load->view('templates/user_footer_js');
            $this->load->view('templates/user_custom_js');
            $this->load->view('templates/user_footer');
        } else {                                      // jika validasi benar
            $where = array( 
                'token_anggota' => $token,
                'id_anggota' => $id
            );

            $data = array(  // menyimpan password baru
                'password_anggota' => $password
            );
            // memanggil fungsi update ke tabel anggota
            $this->m_crud->update($where, $data, 'tb_anggota');
            if ($this->db->affected_rows() == true) {   // jika update berhasil
                $this->session->set_flashdata('pesan', '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Selamat!</strong> Berhasil membuat kata sandi baru, silahkan login.
                    <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                ');
                return redirect("user/auth/login"); // arahkan pengguna ke halaman login
            } else {    // jika update tidak berhasil
                $password_database = $this->m_crud->edit($where, 'tb_anggota')->row()->password_anggota;
                if ($password_database == $password) {  // jika ternyata password yang dimasukkan sama dengan password sebelumnya
                    $this->session->set_flashdata('pesan', '
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Maaf!</strong> Anda memasukkan password lama anda, silahkan login dengan password lama anda.
                        <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    ');
                } else {    // jika gagal mengupdate password anggota
                    $this->session->set_flashdata('pesan', '
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Maaf!</strong> Gagal membuat password baru, mohon ulangi atau hubungi admin.
                        <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    ');
                }
                return redirect("user/auth/reset_password/$token/$id");     // arahkan pengguna kembali ke halaman reset password
            }
        }
    }

    function lupa_password()
    {
        $this->load->view('templates/user_header');
        // $this->load->view('templates/user_navbar');
        $this->load->view('user/lupa_password');
        $this->load->view('templates/user_footer_js');
        $this->load->view('templates/user_custom_js');
        $this->load->view('templates/user_footer');
    }

    function forgot_password()
    {
        // rules
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        // custom message
        $this->form_validation->set_message('required', 'Mohon maaf, {field} harus diisi');
        $this->form_validation->set_message('valid_email', 'Periksa kembali penulisan {field} anda.');
        // custom delimiter
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible fade show" role="alert">', '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        // validasi
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/user_header');
            // $this->load->view('templates/user_navbar');
            $this->load->view('user/lupa_password');
            // $this->load->view('templates/user_footer_js');
            $this->load->view('templates/user_custom_js');
            $this->load->view('templates/user_footer');
        } else {
            $email = $this->input->post('email');
            $where = array(
                'email_anggota' => $email
            );

            $anggota = $this->m_crud->edit($where, 'tb_anggota');
            if ($anggota->num_rows() > 0) {
                // kirim notif ke Email, menentukan config
                $this->load->library('Configemail');
                $config = $this->configemail->config_email();
                $this->load->library('Email', $config);
                $this->email->from('ggjgroupzakah.official@gmail.com', 'GGJ Group Zakah');
                $this->email->to($email);
                // menentukan subjek
                $subject = 'Lupa Password Anda? | GGJ Group Zakah';
                $this->email->subject($subject);
                // menentukan nama user
                $nama = $anggota->row()->nama_anggota;
                $pesan = 'Anda akan diberi akses untuk mengatur ulang kata sandi anda, sebaiknya ingat baik baik password baru anda nanti.
                        Silahkan Klik tombol dibawah ini untuk mengatur ulang password anda.';
                $link = base_url() . "user/auth/reset_password/" . $anggota->row()->token_anggota . '/' . $anggota->row()->id_anggota;
                $message = '';
                $subject = 'Lupa Password?';
                $this->load->library('Emailtouser');
                $message = $this->emailtouser->verifikasiakun($subject, $nama, $pesan, $link, $email);
                $this->email->message($message);

                if ($this->email->send()) {
                    $this->session->set_flashdata('pesan', '
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Selamat!</strong> Email telah kami kirim, mohon periksa untuk Reset Password.
                        <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    ');
                    return redirect('user/auth/lupa_password');
                } else {
                    $this->session->set_flashdata('pesan', '
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Maaf!</strong> Email gagal dikirim.
                        <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    ');
                    return redirect('user/auth/lupa_password');
                }
            } else {
                $this->session->set_flashdata('pesan', '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Maaf!</strong> Pengguna dengan email ' . $email . ' tidak dapat kami temukan pada sistem.
                    <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                ');
                return redirect('user/auth/lupa_password');
            }
        }
    }

    function index()
    {
        $this->load->view('user/login_anggota');
    }

    function login_anggota()
    {
        // Menentukan konfigurasi validasi masukan dari form
        $this->form_validation->set_rules('username_anggota', 'Username Anggota', 'trim|required');
        $this->form_validation->set_rules('password_anggota', 'Password', 'trim|required');
        $this->form_validation->set_message('required', 'Mohon maaf, {field} wajib terisi');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert>', '</div>');
        // Memeriksa apakah sesuai form validasi?
        if ($this->form_validation->run() == false) {
            $this->load->view('user/login_anggota'); // jika tidak sesuai dengan form validasi
        } else {
            // jika sesuai dengan form validasi
            $nama = $this->input->post('username_anggota'); // menangkap inputan username
            $password = $this->input->post('password_anggota'); // menangkap inputan password
            // Memeriksa apakah ada username yang sama pada database?
            $user = $this->db->get_where('tb_anggota', ['username_anggota' => $nama])->row_array();
            if ($user != null) { // jika username ditemukan, maka lanjut memeriksa apakah inputan password sama dengan pemilik username tersebut?
                if (md5($password) == $user['password_anggota']) { // jika password benar, maka lanjut
                    $data = [
                        'username_anggota' => $user['username_anggota'],
                        'id' => $user['id_anggota']
                    ];
                    $this->session->set_userdata($data); // session dibuat dengan membawa 2 variabel pada array
                    redirect('user/landingpage'); // setelah membuat session, user diarahkan ke halaman landingpage
                } else { // jika password salah, maka munculkan pesan 'password salah'
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Salah</div>');
                    redirect('user/Auth/login_anggota');
                }
            } else { // jika username tidak ditemukan, maka munculkan pesan 'username salah'
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username Tidak Terdaftar</div>');
                redirect('user/Auth/login_anggota');
            }
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect('user/auth/login_anggota');
    }
}
