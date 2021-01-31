<?php

class Pembayaran_zakat extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_crud');
        $this->load->model('m_landingpage');
        // $this->load->library('Primslib');
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

    function index()
    {
        // $data['anggota'] = $this->m_crud->edit(['id_anggota' => $id, 'token_anggota' => $token], 'tb_anggota')->result();
        $data['metode'] = $this->m_crud->getAll('metode_pembayaran')->result();
        $this->load->view('templates/user_header');
        $this->load->view('templates/user_navbar');
        $this->load->view('user/pembayaran_zakat', $data);
        $this->load->view('templates/user_footer_js');
        $this->load->view('templates/user_custom_js');
        $this->load->view('templates/user_footer');
    }

    function verifikasi($id)
    {
        $data['pembayaran'] = $this->m_landingpage->SelectPembayaranById($id)->result();
        $this->load->view('templates/helper');
        $this->load->view('templates/user_header');
        $this->load->view('templates/user_navbar');
        $this->load->view('user/pembayaran_zakat_verifikasi', $data);
        $this->load->view('templates/user_footer_js');
        $this->load->view('templates/user_custom_js');
        $this->load->view('templates/user_footer');
    }

    function verifikasi_berhasil($id)
    {
        $data['pembayaran'] = $this->m_landingpage->SelectPembayaranById($id)->result();
        $this->load->view('templates/helper');
        $this->load->view('templates/user_header');
        $this->load->view('templates/user_navbar');
        $this->load->view('user/pembayaran_zakat_berhasil', $data);
        $this->load->view('templates/user_footer_js');
        $this->load->view('templates/user_custom_js');
        $this->load->view('templates/user_footer');
    }

    function buktipembayaran()
    {
        $id = $this->input->post('id_zakat');
        $bukti = null;
        // memeriksa apakah admin mengganti gambar atau tidak
        if ($_FILES['bukti']['name'] != null) {
            // jika memilih gambar
            $bukti = $_FILES['bukti']['name'];

            if ($bukti != '') {
                $select_pembayaran = $this->m_crud->edit(['id_zakat' => $id], 'pembayaran_zakat');
                if ($select_pembayaran->row()->bukti_zakat != null) {
                    $filename = explode(".", $select_pembayaran->row()->bukti_zakat)[0];
                    array_map('unlink', glob(FCPATH . "assets/user/img/bukti_bayar/$filename.*"));

                    $config['upload_path'] = './assets/user/img/bukti_bayar/';
                    $config['allowed_types'] = 'jpg|jpeg|png';
                    $config['max_size'] = '3024';

                    $nama_database = explode('.', $select_pembayaran->row()->bukti_zakat); // nama pada database
                    $type = explode(".", $_FILES['bukti']['name']); // tipe format yang dimasukkan saat ini
                    $config['file_name'] = $nama_database[0] . '.' . $type[1];
                } else {
                    $config['upload_path'] = './assets/user/img/bukti_bayar/';
                    $config['allowed_types'] = 'jpg|jpeg|png';
                    $config['max_size'] = '3024';
                    $config['encrypt_name'] = TRUE;
                }

                //$config['overwrite'] = true;
                //$config['file_name'] = $this->db->get_where('promo', array('id_promo' => $this->input->post('id_promo')))->row()->gambar;
                // $config['max_width']  = '2048';
                // $config['max_height']  = '2048';
                // $config['encrypt_name'] = TRUE;

                $this->load->library('upload');
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('bukti')) {
                    $this->session->set_flashdata('pesan', '
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Maaf!</strong> Anda gagal mengunggah bukti.
                        <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    ');
                    $data['pembayaran'] = $this->m_landingpage->SelectPembayaranById($id)->result();
                    $this->load->view('templates/helper');
                    $this->load->view('templates/user_header');
                    $this->load->view('templates/user_navbar');
                    $this->load->view('user/pembayaran_zakat_verifikasi', $data);
                    $this->load->view('templates/user_footer_js');
                    $this->load->view('templates/user_custom_js');
                    $this->load->view('templates/user_footer');
                } else {
                    $bukti = $this->upload->data('file_name');

                    $where = array(
                        'id_zakat' => $id
                    );

                    $data = array(
                        'bukti_zakat' => $bukti,
                        'status_zakat' => '0'
                    );

                    $this->db->trans_start();
                    $this->m_crud->update($where, $data, 'pembayaran_zakat');
                    $this->db->trans_complete();
                    if ($this->db->trans_status() == true) {
                        $this->session->set_flashdata('pesan', '
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Selamat!</strong> Berhasil mengunggah bukti pembayaran.
                            <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        ');
                        redirect('user/pembayaran_zakat/verifikasi_berhasil/' . $id);
                    } else {
                        $this->session->set_flashdata('pesan', '
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Maaf!</strong> Server sedang sibuk.
                            <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        ');
                        redirect('user/pembayaran_zakat/verifikasi/' . $id);
                    }
                }
            }
        }
    }

    function bayar()
    {
        $this->form_validation->set_rules('nominal', 'Email', 'trim|required|numeric');
        $this->form_validation->set_rules('bulan', 'Kritik/Saran', 'trim|required');
        $this->form_validation->set_message('numeric', 'Mohon maaf, {field} harus diisi hanya angka');
        $this->form_validation->set_message('alpha', 'Mohon maaf, {field} harus diisi hanya huruf');
        $this->form_validation->set_message('required', 'Mohon maaf, {field} harus diisi');
        $this->form_validation->set_error_delimiters('<div class="text-center"><span class="badge badge-danger text-white mt-2 px-4">', '</span></div>');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('pesan', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Maaf!</strong> tolong perbaiki masukan anda.
                <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            ');
            $this->index();
        } else {
            if ($this->session->userdata('id') != null) {
                $id = $this->session->userdata('id');
            } else {
                $id = '1';
            }

            $data = array(
                'id_anggota' => $id,
                'id_admin' => '2',
                'id_metode' => $this->input->post('metode'),
                'tanggal_zakat' => date('Y-m-d'),
                'bulan_zakat' => $this->input->post('bulan'),
                'nominal_zakat' => $this->input->post('nominal'),
                'bukti_zakat' => null,
                'status_zakat' => '0'
            );

            $this->m_crud->insert($data, 'pembayaran_zakat');
            $id_pembayaran = $this->db->insert_id();
            if ($this->db->affected_rows() == true) {
                $this->session->set_flashdata('pesan', '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Pembayaran telah ditambahkan pada sistem, harap dilanjutkan ke tahap selanjutnya.
                    <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                ');
                redirect("user/pembayaran_zakat/verifikasi/$id_pembayaran");
            } else {
                $this->session->set_flashdata('pesan', '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Maaf!</strong> Server sedang sibuk.
                    <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                ');
                redirect("user/pembayaran_zakat/verifikasi/$id_pembayaran");
            }
        }
    }
}
