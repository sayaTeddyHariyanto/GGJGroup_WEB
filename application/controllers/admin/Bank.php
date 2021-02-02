<?php

// Class Anggota
class Bank extends CI_Controller
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
        $data['bank'] = $this->m_crud->getAll('metode_pembayaran')->result();
        $data['sidebar'] = 'website';
        $this->load->view('templates/admin_header');
        $this->load->view('templates/admin_sidebar', $data);
		$this->load->view('templates/admin_navbar');
		$this->load->view('admin/bank', $data);
        $this->load->view('templates/admin_footer_js');
        $this->load->view('templates/admin_custom_js');
        $this->load->view('templates/admin_footer');
    }

    function tambah()
    {
        // rules
        $this->form_validation->set_rules('nomor', 'Nomor', 'trim|required|numeric');
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required|min_length[2]|max_length[100]');
        $this->form_validation->set_rules('atas_nama', 'Atas Nama', 'trim|required|min_length[2]|max_length[100]');
        
        // custom pesan
        $this->form_validation->set_message('required', 'Mohon maaf, {field} harus diisi');
        $this->form_validation->set_message('numeric', 'Mohon maaf, {field} harus diisi menggunakan hanya angka');
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

            $data['bank'] = $this->m_crud->getAll('metode_pembayaran')->result();
            $data['sidebar'] = 'website';
            $this->load->view('templates/admin_header');
            $this->load->view('templates/admin_sidebar', $data);
            $this->load->view('templates/admin_navbar');
            $this->load->view('admin/bank', $data);
            $this->load->view('templates/admin_footer_js');
            $this->load->view('templates/admin_custom_js');
            $this->load->view('templates/admin_footer');

        }else{

            $foto = null;
            // memeriksa apakah admin mengganti gambar atau tidak
            if ($_FILES['foto']['name'] != null) {
            // jika memilih gambar
            $foto = $_FILES['foto']['name'];

                if ($foto != '') {
                    $config['upload_path'] = './assets/user/img/metode_pembayaran';
                    $config['allowed_types'] = 'jpg|jpeg|png';
                    $config['max_size'] = '3024';
                    //$config['overwrite'] = true;
                    $config['encrypt_name'] = TRUE;
                    //$config['file_name'] = $this->db->get_where('promo', array('id_promo' => $this->input->post('id_promo')))->row()->gambar;
                    // $config['max_width']  = '2048';
                    // $config['max_height']  = '2048';
                    // $config['encrypt_name'] = TRUE;
                    
                    $this->load->library('upload');
                    $this->upload->initialize($config);
                    
                    if (!$this->upload->do_upload('foto'))
                    {
                        $this->session->set_flashdata('pesan', '
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Maaf!</strong> Anda gagal mengunggah foto.
                            <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        ');
                        $data['bank'] = $this->m_crud->getAll('metode_pembayaran')->result();
                        $data['sidebar'] = 'website';
                        $this->load->view('templates/admin_header');
                        $this->load->view('templates/admin_sidebar', $data);
                        $this->load->view('templates/admin_navbar');
                        $this->load->view('admin/bank', $data);
                        $this->load->view('templates/admin_footer_js');
                        $this->load->view('templates/admin_custom_js');
                        $this->load->view('templates/admin_footer');
                    }else{
                        $foto = $this->upload->data('file_name');
                    }

                }
            }

            $data = array(
                'nama_metode' => $this->input->post('nama'),
                'nomer_metode' => $this->input->post('nomor'),
                'atas_nama' => $this->input->post('atas_nama'),
                'logo_metode' => $foto
            );

            $this->m_crud->insert($data, 'metode_pembayaran');
            if ($this->db->affected_rows() == true) {
                $this->session->set_flashdata('pesan', '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Selamat!</strong> Anda berhasil menambahkan data.
                    <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                ');
                redirect('admin/bank');
            }else{
                $this->session->set_flashdata('pesan', '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Maaf!</strong> Anda gagal menambahkan data.
                    <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                ');
                redirect('admin/bank');
            }

        }
        
    }

    function edit($id_metode)
    {
        $where = array('id_metode' => $id_metode);
        $data['bank'] = $this->m_crud->edit($where, 'metode_pembayaran')->result();
        $data['sidebar'] = 'website';
        $this->load->view('templates/admin_header');
        $this->load->view('templates/admin_sidebar', $data);
		$this->load->view('templates/admin_navbar');
		$this->load->view('admin/bank_edit', $data);
        $this->load->view('templates/admin_footer_js');
        $this->load->view('templates/admin_custom_js');
        $this->load->view('templates/admin_footer');
    }

    function update()
    {
        $id_metode = $this->input->post('id_metode');

        // rules
        $this->form_validation->set_rules('nomor', 'Nomor', 'trim|required|numeric');
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required|min_length[2]|max_length[100]');
        $this->form_validation->set_rules('atas_nama', 'Atas Nama', 'trim|required|min_length[2]|max_length[100]');
        

        // custom pesan
        $this->form_validation->set_message('required', 'Mohon maaf, {field} harus diisi');
        $this->form_validation->set_message('numeric', 'Mohon maaf, {field} harus diisi menggunakan hanya angka');
        $this->form_validation->set_message('min_length', 'Mohon maaf, Masukan {field} minimum {param} karakter');
        $this->form_validation->set_message('max_length', 'Mohon maaf, Masukan {field} maximum {param} karakter');


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
            $where = array('id_metode' => $id_metode);
            $data['bank'] = $this->m_crud->edit($where, 'metode_pembayaran')->result();
            $data['sidebar'] = 'website';
            $this->load->view('templates/admin_header');
            $this->load->view('templates/admin_sidebar', $data);
            $this->load->view('templates/admin_navbar');
            $this->load->view('admin/bank_edit', $data);
            $this->load->view('templates/admin_footer_js');
            $this->load->view('templates/admin_custom_js');
            $this->load->view('templates/admin_footer');
        }else{
            $foto = null;
            $foto = $_FILES['foto']['name'];
            $select = $this->m_crud->edit(array('id_metode' => $this->input->post('id_metode')), 'metode_pembayaran');

            if ($foto != '') {
                $filename = explode(".", $select->row()->logo_metode)[0];
                array_map('unlink', glob(FCPATH."assets/user/img/metode_pembayaran/$filename.*"));

                $config['upload_path'] = './assets/user/img/metode_pembayaran/';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size'] = '3024';
                if ($select->num_rows() > 0 && $select->row()->logo_metode != '') {
                    $nama_database = explode('.', $select->row()->logo_metode); // nama pada database
                    $type = explode(".", $_FILES['foto']['name']); // tipe format yang dimasukkan saat ini
                    $config['file_name'] = $nama_database[0] . '.' . $type[1];
                }else{
                    $config['encrypt_name'] = TRUE;
                }
                // $config['max_width']  = '2048';
                // $config['max_height']  = '2048';
                
                $this->load->library('upload');
                $this->upload->initialize($config);
                
                if (!$this->upload->do_upload('foto'))
                {
                    $this->session->set_flashdata('pesan', '
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Maaf!</strong> Anda gagal mengunggah foto.
                        <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    ');
                    $where = array('id_metode' => $id_metode);
                    $data['bank'] = $this->m_crud->edit($where, 'metode_pembayaran')->result();
                    $data['sidebar'] = 'website';
                    $this->load->view('templates/admin_header');
                    $this->load->view('templates/admin_sidebar', $data);
                    $this->load->view('templates/admin_navbar');
                    $this->load->view('admin/bank_edit', $data);
                    $this->load->view('templates/admin_footer_js');
                    $this->load->view('templates/admin_custom_js');
                    $this->load->view('templates/admin_footer');
                }
                else
                {
                    $foto = $this->upload->data('file_name');
                }
                
                // var_dump($foto); exit;
                // Tentukan masukan ke database
                $save = array(
                    'nama_metode' => $this->input->post('nama'),
                    'nomer_metode' => $this->input->post('nomor'),
                    'atas_nama' => $this->input->post('atas_nama'),
                    'logo_metode' => $foto
                );

                $where = array('id_metode' => $id_metode);
                // query update data ke database
                $this->db->trans_start();
                $this->m_crud->update($where, $save, 'metode_pembayaran');
                $this->db->trans_complete();
                // cek apakah update berhasil
                if ($this->db->trans_status() == true) {
                    $this->session->set_flashdata('pesan', '
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Selamat!</strong> Anda berhasil mengubah data.
                        <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    ');
                    redirect("admin/bank/edit/$id_metode");
                }else{
                    $this->session->set_flashdata('pesan', '
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Maaf!</strong> Anda gagal mengubah data.
                        <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    ');
                    redirect("admin/bank/edit/$id_metode");
                }
                

            }else{

                $where = array(
                    'id_metode' => $id_metode
                );
    
                $data = array(
                    'nama_metode' => $this->input->post('nama'),
                    'nomer_metode' => $this->input->post('nomor'),
                    'atas_nama' => $this->input->post('atas_nama')
                );
    
                $this->m_crud->update($where, $data, 'metode_pembayaran');
                if ($this->db->affected_rows() == true) {
                    $this->session->set_flashdata('pesan', '
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Selamat!</strong> Anda berhasil mengubah data.
                        <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    ');
                    redirect("admin/bank/edit/$id_metode");
                }else{
                    $this->session->set_flashdata('pesan', '
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Maaf!</strong> Anda gagal mengubah data.
                        <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    ');
                    redirect("admin/bank/edit/$id_metode");
                }
                // terima kode data
                
                
            }
            
        }
    }

    function hapus($id_metode)
    {
        $where = array(
            'id_metode' => $id_metode
        );
        $_id = $this->db->get_where('metode_pembayaran',['id_metode' => $id_metode])->row();
        $this->m_crud->delete($where, 'metode_pembayaran');
        if ($this->db->affected_rows() == true) {
            $filename = explode(".", $_id->logo_metode)[0];
            array_map('unlink', glob(FCPATH."assets/user/img/metode_pembayaran/$filename.*"));
            $this->session->set_flashdata('pesan', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Selamat!</strong> Anda berhasil menghapus data.
                <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            ');
            redirect("admin/bank");
        }else{
            $this->session->set_flashdata('pesan', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Maaf!</strong> Anda gagal menghapus data.
                <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            ');
            redirect("admin/bank");
        }
    }

}