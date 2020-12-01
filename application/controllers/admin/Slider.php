<?php

// Class Anggota
class Slider extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_crud');
        // $this->load->library('Primslib');
    }

    function index()
    {
        $data['slider'] = $this->m_crud->getAll('foto_slider')->result();
        $this->load->view('templates/admin_header');
        $this->load->view('templates/admin_sidebar');
		$this->load->view('templates/admin_navbar');
		$this->load->view('admin/slider', $data);
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
        $this->form_validation->set_rules('deskripsi', 'Deskripsi Slider', 'trim|callback_addr_line1');
        $this->form_validation->set_rules('nama', 'Nama Slider', 'trim|required|alpha_numeric_spaces|min_length[2]|max_length[100]');
        

        // custom pesan
        $this->form_validation->set_message('required', 'Mohon maaf, {field} harus diisi');
        $this->form_validation->set_message('alpha_numeric', 'Mohon maaf, {field} harus diisi menggunakan huruf dan angka');
        $this->form_validation->set_message('alpha_numeric_spaces', 'Mohon maaf, {field} harus diisi menggunakan huruf, angka, spasi');
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
            $data['slider'] = $this->m_crud->getAll('foto_slider')->result();
            $this->load->view('templates/admin_header');
            $this->load->view('templates/admin_sidebar');
            $this->load->view('templates/admin_navbar');
            $this->load->view('admin/slider', $data);
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
                $config['upload_path'] = './assets/user/img/slide';
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
                    $data['slider'] = $this->m_crud->getAll('foto_slider')->result();
                    $this->load->view('templates/admin_header');
                    $this->load->view('templates/admin_sidebar');
                    $this->load->view('templates/admin_navbar');
                    $this->load->view('admin/slider', $data);
                    $this->load->view('templates/admin_footer_js');
                    $this->load->view('templates/admin_custom_js');
                    $this->load->view('templates/admin_footer');
                }
                else
                {
                    $foto = $this->upload->data('file_name');
                }

        }
    }
            $data = array(
                'foto' => $this->input->post('nama'),
                'deskripsi' => $this->input->post('deskripsi'),
                'file' => $foto
            );

            $this->m_crud->insert($data, 'foto_slider');
            if ($this->db->affected_rows() == true) {
                $this->session->set_flashdata('pesan', '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Selamat!</strong> Anda berhasil menambahkan data.
                    <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                ');
                redirect('admin/slider');
            }else{
                $this->session->set_flashdata('pesan', '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Maaf!</strong> Anda gagal menambahkan data.
                    <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                ');
                redirect('admin/slider');
            }
        }
    }

    function edit($id_foto)
    {
        $where = array('id_foto' => $id_foto);
        $data['slider'] = $this->m_crud->edit($where, 'foto_slider')->result();
        $this->load->view('templates/admin_header');
        $this->load->view('templates/admin_sidebar');
		$this->load->view('templates/admin_navbar');
		$this->load->view('admin/slider_edit', $data);
        $this->load->view('templates/admin_footer_js');
        $this->load->view('templates/admin_custom_js');
        $this->load->view('templates/admin_footer');
    }

    function update()
    {
        $id_foto = $this->input->post('id_foto');

        // rules
        $this->form_validation->set_rules('deskripsi', 'Deskripsi Slider', 'trim|callback_addr_line1');
        $this->form_validation->set_rules('nama', 'Nama Slider', 'trim|required|alpha_numeric_spaces|min_length[2]|max_length[100]');
        

        // custom pesan
        $this->form_validation->set_message('required', 'Mohon maaf, {field} harus diisi');
        $this->form_validation->set_message('alpha_numeric', 'Mohon maaf, {field} harus diisi menggunakan huruf dan angka');
        $this->form_validation->set_message('alpha_numeric_spaces', 'Mohon maaf, {field} harus diisi menggunakan huruf, angka, spasi');
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
            $where = array('id_foto' => $id_foto);
            $data['slider'] = $this->m_crud->edit($where, 'foto_slider')->result();
            $this->load->view('templates/admin_header');
            $this->load->view('templates/admin_sidebar');
            $this->load->view('templates/admin_navbar');
            $this->load->view('admin/slider_edit', $data);
            $this->load->view('templates/admin_footer_js');
            $this->load->view('templates/admin_custom_js');
            $this->load->view('templates/admin_footer');
        }else{
            $foto = null;
            $foto = $_FILES['foto']['name'];
            $select = $this->m_crud->edit(array('id_foto' => $this->input->post('id_foto')), 'foto_slider');

            if ($foto != '') {
                $filename = explode(".", $select->row()->file)[0];
                array_map('unlink', glob(FCPATH."assets/user/img/slide/$filename.*"));

                $config['upload_path'] = './assets/user/img/slide/';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size'] = '3024';
                if ($select->num_rows() > 0 && $select->row()->file != '') {
                    $nama_database = explode('.', $select->row()->file); // nama pada database
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
                    $data['slider'] = $this->m_crud->getAll('foto_slider')->result();
                    $this->load->view('templates/admin_header');
                    $this->load->view('templates/admin_sidebar');
                    $this->load->view('templates/admin_navbar');
                    $this->load->view('admin/slider', $data);
                    $this->load->view('templates/admin_footer_js');
                    $this->load->view('templates/admin_custom_js');
                    $this->load->view('templates/admin_footer');
                }
                else
                {
                    $foto = $this->upload->data('file_name');
                }
                
                // Tentukan masukan ke database
                $save = array(
                    'foto' => $this->input->post('nama'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'file' => $foto
                );

                $where = array('id_foto' => $id_foto);
                // query update data ke database
                $this->m_crud->update($where, $save, 'foto_slider');
                // cek apakah update berhasil
                if ($this->db->affected_rows() == true) {
                    $this->session->set_flashdata('pesan', '
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Selamat!</strong> Anda berhasil mengubah data.
                        <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    ');
                    redirect("admin/slider/edit/$id_foto");
                }else{
                    $this->session->set_flashdata('pesan', '
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Maaf!</strong> Anda gagal mengubah data.
                        <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    ');
                    redirect("admin/slider/edit/$id_foto");
                }
                

            }else{

                $where = array(
                    'id_foto' => $id_foto
                );
    
                $data = array(
                    'foto' => $this->input->post('nama'),
                    'deskripsi' => $this->input->post('deskripsi')
                );
    
                $this->m_crud->update($where, $data, 'foto_slider');
                if ($this->db->affected_rows() == true) {
                    $this->session->set_flashdata('pesan', '
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Selamat!</strong> Anda berhasil mengubah data.
                        <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    ');
                    redirect("admin/slider/edit/$id_foto");
                }else{
                    $this->session->set_flashdata('pesan', '
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Maaf!</strong> Anda gagal mengubah data.
                        <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    ');
                    redirect("admin/slider/edit/$id_foto");
                }
                // terima kode data
                
                
            }
            
        }
    }

    function hapus($id_foto)
    {
        $where = array(
            'id_foto' => $id_foto
        );

        $this->m_crud->delete($where, 'foto_slider');
        if ($this->db->affected_rows() == true) {
            $this->session->set_flashdata('pesan', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Selamat!</strong> Anda berhasil menghapus data.
                <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            ');
            redirect("admin/slider");
        }else{
            $this->session->set_flashdata('pesan', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Maaf!</strong> Anda gagal menghapus data.
                <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            ');
            redirect("admin/slider");
        }
    }

    function detail($id_foto)
    {
        $where = array('id_foto' => $id_foto);
        $data['slider'] = $this->m_crud->edit($where, 'foto_slider')->result();
        $this->load->view('templates/admin_header');
        $this->load->view('templates/admin_sidebar');
		$this->load->view('templates/admin_navbar');
		$this->load->view('admin/slider_detail', $data);
        $this->load->view('templates/admin_footer_js');
        $this->load->view('templates/admin_custom_js');
        $this->load->view('templates/admin_footer');
    }
}
