<?php

class Guide extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    // if ($this->session->userdata('nama') == '') {
    //   redirect('admin/login/');
    // }
    $this->load->model('M_dashboard');

    if ($this->session->userdata('status') == '') {
      redirect('admin/login');
    }
  }

  function index()
  {
    $data['anggota'] = $this->M_dashboard->getAll();
    //$data['history'] = $this->M_dashboard->getHistory();
    $data['masukan'] = $this->M_dashboard->getBulananPembayaran();
    $data['distribusi'] = $this->M_dashboard->getBulananPendistribusian();
    $data['saldo'] = $this->M_dashboard->getSisaSaldo();
    //$data['favorit']= $this->M_dashboard->getFavorit()->result();
    //$data['grafik']= $this->M_dashboard->getMingguan()->result();
    $this->load->view('templates/admin_header');
    $this->load->view('templates/admin_sidebar');
    $this->load->view('templates/admin_navbar');
    $this->load->view('admin/guide', $data);
    $this->load->view('templates/admin_footer_js');
    $this->load->view('templates/admin_custom_js');
    $this->load->view('templates/admin_footer');
  }
}
