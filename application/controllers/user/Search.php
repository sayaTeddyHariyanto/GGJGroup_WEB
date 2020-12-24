<?php

class Search extends CI_Controller 
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_crud');
        $this->load->model('m_landingpage');
        $this->load->helper(array('url'));
        // $this->load->library('Primslib');
    }

    function blog()
    {
        $this->form_validation->set_rules('search', 'Pencarian', 'trim|required|callback_addr_line1');
        $this->form_validation->set_message('required', 'Mohon maaf, {field} harus diisi');
        $this->form_validation->set_error_delimiters('<div class="text-center"><span class="badge badge-danger text-white mt-2 px-4">', '</span></div>');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('pesan', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Maaf!</strong> tolong perbaiki masukan anda. Terdapat karakter spesial yang kami hindari.
                <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            ');
            redirect('user/search/result/xyz');
        }else{
            $search = $this->input->post('search');
            redirect("user/search/result/$search");
        }
    }

    function result($search)
    {
        $jumlah_data = $this->m_landingpage->searchall($search)->num_rows();
        $this->load->library('pagination');
        $config['base_url'] = site_url('user/search/result/' . $search);
        $config['total_rows'] = $jumlah_data;
        $config['per_page'] = 6;  //show record per halaman
        $config["uri_segment"] = 5;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="blog-pagination" data-aos="fade-up"><ul class="justify-content-center">';
        $config['full_tag_close']   = '</ul></div>';
        $config['num_tag_open']     = '<li>';
        $config['num_tag_close']    = '</li>';
        $config['cur_tag_open']     = '<li class="active"><a href="">';
        $config['cur_tag_close']    = '</a></li>';
        $config['next_tag_open']    = '<li>';
        $config['next_tagl_close']  = '<i class="icofont-rounded-right"></i></li>';
        $config['prev_tag_open']    = '<li>';
        $config['prev_tagl_close']  = '</li>';
        $config['first_tag_open']   = '<li>';
        $config['first_tagl_close'] = '</li>';
        $config['last_tag_open']    = '<li>';
        $config['last_tagl_close']  = '</li>';
        $this->pagination->initialize($config);	
        
        $data['page'] = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
        $data['result'] = $this->m_landingpage->searchresult($search, $config["per_page"], $data['page']);
        $data['pagination'] = $this->pagination->create_links();
        $data['breadcrum'] = 'Search';

        $this->load->view('templates/helper');
        $this->load->view('templates/user_header');
        $this->load->view('templates/user_navbar');
        $this->load->view('user/search_result', $data);
        $this->load->view('templates/user_footer_js');
        $this->load->view('templates/user_custom_js');
        $this->load->view('templates/user_footer');
    }

    function addr_line1($addr_line1)
    {
        if (preg_match('/[\^£$%&*}{@#~><>?!|=+¬]/', $addr_line1)) {
            $this->form_validation->set_message('addr_line1', 'Mohon maaf tidak diperbolehkan menggunakan karakter spesial');
            return false;
        } else {
            return true;
        }
    }

}