<?php

class Guide extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    // if ($this->session->userdata('nama') == '') {
    //   redirect('admin/login/');
    // }
    $this->load->model('m_dashboard');
    $this->load->model('m_pembayaran');
    $this->load->model('m_distribusi');
    $this->load->model('m_crud');

    if ($this->session->userdata('status') == '') {
      redirect('admin/login');
    }
  }

  function index()
  {
    $bulan = date('Y-m');
    $data['anggota'] = $this->m_dashboard->getAll();
    //$data['history'] = $this->m_dashboard->getHistory();
    $data['masukan'] = $this->m_dashboard->getBulananPembayaran();
    $data['distribusiCount'] = $this->m_dashboard->getBulananPendistribusian();
    $data['saldo'] = $this->m_dashboard->getSisaSaldo();
    $data['pembayaran'] = $this->m_pembayaran->month_pembayaran($bulan)->result();
    $data['distribusi'] = $this->m_distribusi->month_distribusi($bulan)->result();
    $data['sidebar'] = 'dashboard';
    //$data['favorit']= $this->M_dashboard->getFavorit()->result();
    //$data['grafik']= $this->M_dashboard->getMingguan()->result();
    $this->load->view('templates/admin_header');
    $this->load->view('templates/admin_sidebar', $data);
    $this->load->view('templates/admin_navbar');
    $this->load->view('admin/guide', $data);
    $this->load->view('templates/admin_footer_js');
    $this->load->view('templates/admin_custom_js');
    $this->load->view('templates/admin_chart_zakat', $data);
    $this->load->view('templates/admin_chart_area', $data);
    $this->load->view('templates/admin_footer');
  }
  
  public function fetch_message()
  {
      $output = '';
      if($this->input->post('view') == ''){
          $data = $this->m_crud->getAll('tb_saran');
          $data_row = $data->row();
          $data_result = $data->result();
          // print_r($data_result);
          

          foreach ($data_result as $result ) {
              if(strlen($result->saran) >= 50){$saran = substr($result->saran, 0, 50) . '..';}else{$saran = $result->saran;}
              if ($result->status_saran == 1) {
                  $text = 'bg-light';
              }else{
                    $text = 'bg-white';
              }
              $output .= '
              <a class="dropdown-item d-flex align-items-center '.$text.'" href="'.base_url('admin/saran/detail/' . $result->id_saran).'">
                  <div class="font-weight-bold">
                      <div class="text-truncate">'.$result->email_saran.'</div>
                      <div class="small text-gray-500">'.$saran.'</div>
                  </div>
              </a>
              ';
          }

      }else{
          $output .= '
              <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="font-weight-bold">
                      <div class="text-truncate my-3">Tidak ada kritik & saran.</div>
                  </div>
              </a>';
      }

      $jumlah_unseen = $this->m_crud->edit(['status_saran' => 0], 'tb_saran')->num_rows();

      $data = array(
          'saran' => $output,
          'unseen_saran' => $jumlah_unseen
      );

      echo json_encode($data);
  }

  public function fetch_notif()
  {
      $output = '';
      if($this->input->post('view') == ''){
          $data = $this->m_crud->select_notif();
          $data_row = $data->row();
          $data_result = $data->result();
          // print_r($data_result);
          

          foreach ($data_result as $result ) {
              if ($result->status_zakat == 0) {
                  $bg = 'bg-white';
                  $icon = 'bg-success';
              }else{
                  $bg = 'bg-light';
                  $icon = 'bg-secondary';
              }

              $output .= '
                <a class="dropdown-item d-flex align-items-center '.$bg.'" href="'.base_url('admin/zakat/detail/' . $result->id_zakat).'">
                    <div class="mr-3">
                        <div class="icon-circle '.$icon.'">
                        <i class="fas fa-file-alt text-white"></i>
                        </div>
                    </div>
                    <div>
                        <div class="small text-gray-500">'.$result->tanggal_zakat.'</div>
                        <span class="font-weight-bold">'.$result->nama_anggota.' - '.$result->bulan_zakat.'</span>
                    </div>
                </a>
              ';
          }

      }else{
          $output .= '
              <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="font-weight-bold">
                      <div class="text-truncate my-3">Tidak ada notifikasi.</div>
                  </div>
              </a>';
      }

      $jumlah_unseen = $this->m_crud->select_notifbelum()->num_rows();

      $data = array(
          'notification' => $output,
          'unseen_notification' => $jumlah_unseen
      );

      echo json_encode($data);
  }
}
