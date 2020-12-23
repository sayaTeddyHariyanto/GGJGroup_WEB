<?php

class Distribusi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_crud');
        $this->load->model('m_landingpage');
        $this->load->library('form_validation');
        // $this->load->library('Primslib');
    }

    function all()
    {
        $jumlah_data = $this->m_crud->getAll('tb_berita')->num_rows();
        $this->load->library('pagination');
        $config['base_url'] = site_url('user/landingpage/blog_all/');
        $config['total_rows'] = $jumlah_data;
        $config['per_page'] = 9;  //show record per halaman
        $config["uri_segment"] = 4;  // uri parameter
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
        
        $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data['result'] = $this->m_landingpage->allresult($config["per_page"], $data['page']);
        $data['pagination'] = $this->pagination->create_links();
        $data['breadcrum'] = 'Pendistribusian';

        $this->load->view('templates/helper');
        $this->load->view('templates/user_header');
        $this->load->view('templates/user_navbar');
        $this->load->view('user/search_result', $data);
        $this->load->view('templates/user_footer_js');
        $this->load->view('templates/user_custom_js');
        $this->load->view('templates/user_footer');
    }

    function detail($id)
    {
        $data['blog'] = $this->m_crud->edit(['id_berita' => $id], 'tb_berita')->result();
        $this->load->view('templates/user_header');
		$this->load->view('templates/user_navbar');
		$this->load->view('user/blog', $data);
        $this->load->view('templates/user_footer_js');
        $this->load->view('templates/user_custom_js');
        $this->load->view('templates/user_footer');
    }
}