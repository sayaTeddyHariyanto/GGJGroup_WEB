<?php

// Class Zakat
class Berita extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_crud');
        // $this->load->library('Primslib');

        // parent::__construct();
        // $this->load->helper(array('form', 'url'));

        if ($this->session->userdata('status') == '') {
            redirect('admin/login');
        }
    }

    function index()
    {
        $data['berita'] = $this->m_crud->getAll('tb_berita')->result();
        $this->load->view('templates/admin_header');
        $this->load->view('templates/admin_sidebar');
        $this->load->view('templates/admin_navbar');
        $this->load->view('admin/berita', $data);
        $this->load->view('templates/admin_footer_js');
        $this->load->view('templates/admin_custom_js');
        $this->load->view('templates/admin_footer');
    }

    function ubah_status($id_berita)
    {
        $where = array(
            'id_berita' => $id_berita
        );
        $data = array(
            'status_berita' => 0
        );

        $this->m_crud->update($where, $data, 'tb_berita');
        if ($this->db->affected_rows() == true) {
            $this->session->set_flashdata('pesan', '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Selamat!</strong> Anda berhasil mengubah status tampil berita ke-Nonaktif.
                    <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
            redirect("admin/berita");
        } else {
            $this->session->set_flashdata('pesan', '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Maaf!</strong> Anda gagal mengubah status tampil berita ke-Nonaktif.
                    <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                ');
            redirect("admin/berita");
        }
    }

    function ubah_status2($id_berita)
    {
        $where = array(
            'id_berita' => $id_berita
        );
        $data = array(
            'status_berita' => 1
        );

        $this->m_crud->update($where, $data, 'tb_berita');
        if ($this->db->affected_rows() == true) {
            $this->session->set_flashdata('pesan', '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Selamat!</strong> Anda berhasil mengubah status tampil berita ke-Aktif.
                    <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
            redirect("admin/berita");
        } else {
            $this->session->set_flashdata('pesan', '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Maaf!</strong> Anda gagal mengubah status tampil berita ke-Aktif.
                    <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                ');
            redirect("admin/berita");
        }
    }

    function hapus($id_berita)
    {
        $where = array(
            'id_berita' => $id_berita
        );

        $this->m_crud->delete($where, 'tb_berita');
        if ($this->db->affected_rows() == true) {
            $this->session->set_flashdata('pesan', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Selamat!</strong> Anda berhasil menghapus data.
                <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            ');
            redirect("admin/berita");
        } else {
            $this->session->set_flashdata('pesan', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Maaf!</strong> Anda gagal menghapus data.
                <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            ');
            redirect("admin/berita");
        }
    }

    function tambah()
    {
        $thumbnail = null;
        // memeriksa apakah admin mengganti gambar atau tidak
        if ($_FILES['thumbnail']['name'] != null) {
            // jika memilih gambar
            $thumbnail = $_FILES['thumbnail']['name'];

            if ($thumbnail != '') {
                $config['upload_path'] = './assets/admin/img/berita/';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size'] = '33024';
                //$config['overwrite'] = true;
                $config['encrypt_name'] = TRUE;
                //$config['file_name'] = $this->db->get_where('promo', array('id_promo' => $this->input->post('id_promo')))->row()->gambar;
                // $config['max_width']  = '2048';
                // $config['max_height']  = '2048';
                // $config['encrypt_name'] = TRUE;

                $this->load->library('upload');
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('thumbnail')) {
                    $this->session->set_flashdata('pesan', '
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Maaf!</strong> Anda gagal mengunggah thumbnail.
                        <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    ');
                    $data['berita'] = $this->m_crud->getAll('tb_berita')->result();
                    $this->load->view('templates/admin_header');
                    $this->load->view('templates/admin_sidebar');
                    $this->load->view('templates/admin_navbar');
                    $this->load->view('admin/berita', $data);
                    $this->load->view('templates/admin_footer_js');
                    $this->load->view('templates/admin_custom_js');
                    $this->load->view('templates/admin_footer');
                } else {
                    $thumbnail = $this->upload->data('file_name');
                }
            }

            $data = array(
                'judul_berita' => $this->input->post('judul'),
                'deskripsi' => $this->input->post('deskripsi'),
                'tanggal_berita' => $this->input->post('tanggal'),
                'konten' => $this->input->post('editor1'),
                'status_berita' => $this->input->post('status'),
                'thumbnail' => $thumbnail
            );

            $this->m_crud->insert($data, 'tb_berita');
            if ($this->db->affected_rows() == true) {
                $this->session->set_flashdata('pesan', '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Selamat!</strong> Anda berhasil menambahkan data.
                    <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                ');
                redirect('admin/berita');
            } else {
                $this->session->set_flashdata('pesan', '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Maaf!</strong> Anda gagal menambahkan data.
                    <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                ');
                redirect('admin/berita');
            }
        }
    }

    function edit($id_berita)
    {
        $where = array('id_berita' => $id_berita);
        $data['berita'] = $this->m_crud->edit($where, 'tb_berita')->result();
        $this->load->view('templates/admin_header');
        $this->load->view('templates/admin_sidebar');
        $this->load->view('templates/admin_navbar');
        $this->load->view('admin/berita_edit', $data);
        $this->load->view('templates/admin_footer_js');
        $this->load->view('templates/admin_custom_js');
        $this->load->view('templates/admin_footer');
    }

    function update()
    {
        $id_berita = $this->input->post('id_berita');

        $thumbnail = null;
        $thumbnail = $_FILES['thumbnail']['name'];
        $select = $this->m_crud->edit(array('id_berita' => $this->input->post('id_berita')), 'tb_berita');

        if ($thumbnail != '') {
            $filename = explode(".", $select->row()->file)[0];
            array_map('unlink', glob(FCPATH . "./assets/admin/img/berita/$filename.*"));

            $config['upload_path'] = './assets/admin/img/berita/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = '23024';
            if ($select->num_rows() > 0 && $select->row()->file != '') {
                $nama_database = explode('.', $select->row()->file); // nama pada database
                $type = explode(".", $_FILES['thumbnail']['name']); // tipe format yang dimasukkan saat ini
                $config['file_name'] = $nama_database[0] . '.' . $type[1];
            } else {
                $config['encrypt_name'] = TRUE;
            }
            // $config['max_width']  = '2048';
            // $config['max_height']  = '2048';

            $this->load->library('upload');
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('thumbnail')) {
                $this->session->set_flashdata('pesan', '
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Maaf!</strong> Anda gagal mengunggah thumbnail.
                        <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    ');
                $data['berita'] = $this->m_crud->getAll('tb_berita')->result();
                $this->load->view('templates/admin_header');
                $this->load->view('templates/admin_sidebar');
                $this->load->view('templates/admin_navbar');
                $this->load->view('admin/berita', $data);
                $this->load->view('templates/admin_footer_js');
                $this->load->view('templates/admin_custom_js');
                $this->load->view('templates/admin_footer');
            } else {
                $thumbnail = $this->upload->data('file_name');
            }

            // Tentukan masukan ke database
            $save = array(
                'judul_berita'  => $this->input->post('judul'),
                'deskripsi'     => $this->input->post('deskripsi'),
                'konten'        => $this->input->post('editor1'),
                'tanggal_berita' => $this->input->post('tanggal'),
                'status_berita'   => $this->input->post('status'),
                'thumbnail' => $this->input->post('thumbnail')
            );

            $where = array('id_berita' => $id_berita);
            // query update data ke database
            $this->m_crud->update($where, $save, 'tb_berita');
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
                redirect("admin/berita/edit/$id_berita");
            } else {
                $this->session->set_flashdata('pesan', '
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Maaf!</strong> Anda gagal mengubah data.
                        <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    ');
                redirect("admin/berita/edit/$id_berita");
            }
        } else {

            $where = array(
                'id_berita' => $id_berita
            );

            $data = array(
                'judul_berita'  => $this->input->post('judul'),
                'deskripsi'     => $this->input->post('deskripsi'),
                'konten'        => $this->input->post('editor1'),
                'tanggal_berita' => $this->input->post('tanggal'),
                'status_berita' => $this->input->post('status'),
                'thumbnail' => $this->input->post('thumbnail')
            );

            $this->m_crud->update($where, $data, 'tb_berita');
            if ($this->db->affected_rows() == true) {
                $this->session->set_flashdata('pesan', '
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Selamat!</strong> Anda berhasil mengubah data.
                        <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    ');
                redirect("admin/berita/edit/$id_berita");
            } else {
                $this->session->set_flashdata('pesan', '
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Maaf!</strong> Anda gagal mengubah data.
                        <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    ');
                redirect("admin/berita/edit/$id_berita");
            }
            // terima kode data


        }
    }

    public function upload_ck()
    {
        ob_get_level();

        //Image Save Option
        //저장 옵션
        //$getpath = $this->input->get('path');
        $path = 'assets/admin/img/konten/';

        $config['upload_path'] = './' . $path; //YOUR PATH
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = '0';
        // $config['file_name'] = 'file_name';
        $config['encrypt_name'] = TRUE;
        $config['remove_spaces'] = TRUE;

        //Form Upload, Drag & Drop
        $CKEditorFuncNum = $this->input->get('CKEditorFuncNum');
        if (empty($CKEditorFuncNum)) {
            ////////////////////////////////////////////////////////////////////////////////////////////////////////
            // Drag & Drop
            ////////////////////////////////////////////////////////////////////////////////////////////////////////
            header('Content-Type: application/json');

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload("upload")) {
                $jsondata = array('uploaded' => 0, 'fileName' => 'null', 'url' => 'null');
                echo json_encode($jsondata);
            } else {
                $data = $this->upload->data();

                // JPG compression
                if ($this->upload->data('file_ext') === '.jpg') {
                    $filename = $this->upload->data('full_path');
                    $img = imagecreatefromjpeg($filename);
                    imagejpeg($img, $filename, 80);
                }

                $filename = $data['file_name'];
                $url = base_url() . $path . $filename;

                $jsondata = array('uploaded' => 1, 'fileName' => $filename, 'url' => $url);
                echo json_encode($jsondata);
            }
        } else {
            ////////////////////////////////////////////////////////////////////////////////////////////////////////
            // Form Upload
            ////////////////////////////////////////////////////////////////////////////////////////////////////////
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload("upload")) {
                echo "<script>alert('Send Fail" . $this->upload->display_errors('', '') . "')</script>";
            } else {
                $CKEditorFuncNum = $this->input->get('CKEditorFuncNum');
                $data = $this->upload->data();

                // JPG compression
                if ($this->upload->data('file_ext') === '.jpg') {
                    $filename = $this->upload->data('full_path');
                    $img = imagecreatefromjpeg($filename);
                    imagejpeg($img, $filename, 80);
                }

                $filename = $data['file_name'];

                $url = base_url() . $path . $filename;
                echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction('" . $CKEditorFuncNum . "', '" . $url . "', 'Send OK')</script>";
            }
        }

        ob_end_flush();
    }
}
