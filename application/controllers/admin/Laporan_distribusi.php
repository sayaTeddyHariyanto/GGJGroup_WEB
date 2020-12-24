<?php
class Laporan_distribusi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_distribusi');
    }
    function index()
    {
        $data['distribusi'] = $this->M_distribusi->get_distribusi();
        $this->load->view('templates/admin_header');
        $this->load->view('templates/admin_sidebar');
        $this->load->view('templates/admin_navbar');
        $this->load->view('admin/laporan/distribusi1', $data);
        $this->load->view('templates/admin_footer_js');
        $this->load->view('templates/admin_custom_js');
        $this->load->view('templates/admin_footer');
    }

    function harian_report()
    {
        $t_awal = $this->input->post('t_awal');
        $t_akhir = $this->input->post('t_akhir');
        $jenis = $this->input->post('jenis');

        $data['distribusi'] = $this->M_distribusi->day_distribusi($t_awal, $t_akhir)->result();
        $data['data'] = array(
            't_awal' => $t_awal,
            't_akhir' => $t_akhir,
            'jenis'  => $jenis
        );

        $this->load->view('templates/admin_header');
        $this->load->view('templates/admin_sidebar');
        $this->load->view('templates/admin_navbar');
        $this->load->view('admin/laporan/distribusi2', $data);
        $this->load->view('templates/admin_footer_js');
        $this->load->view('templates/admin_custom_js');
        $this->load->view('templates/admin_footer');
    }

    function print_pdf_rentang($awal, $akhir)
    {
        $data['distribusi'] = $this->M_distribusi->day_distribusi($awal, $akhir)->result();
        $data['jenis'] = 'Harian';
        $this->load->library('Dompdf_gen');

        $this->load->view('admin/laporan/distribusi_harian', $data);

        $paper_size = 'A4';
        $oriantation = 'potrait';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $oriantation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan_harian_" . date('Y-m-d_H-i-s') . ".pdf", array('Attachment' => 0));
    }

    function bulanan_report()
    {
        $bulan = $this->input->post('bulan');
        $jenis = $this->input->post('jenis');

        $data['distribusi'] = $this->M_distribusi->month_distribusi($bulan)->result();
        $data['data'] = array(
            'bulan' => $bulan,
            'jenis'  => $jenis
        );

        $this->load->view('templates/admin_header');
        $this->load->view('templates/admin_sidebar');
        $this->load->view('templates/admin_navbar');
        $this->load->view('admin/laporan/distribusi2', $data);
        $this->load->view('templates/admin_footer_js');
        $this->load->view('templates/admin_custom_js');
        $this->load->view('templates/admin_footer');
    }

    function print_pdf_bulanan($hasil_cari)
    {
        $data['distribusi'] = $this->M_distribusi->month_distribusi($hasil_cari)->result();
        $data['jenis'] = 'Bulanan';
        $this->load->library('Dompdf_gen');

        $this->load->view('admin/laporan/distribusi_harian', $data);

        $paper_size = 'A4';
        $oriantation = 'potrait';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $oriantation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan_bulanan_" . date('Y-m-d_H-i-s') . ".pdf", array('Attachment' => 0));
    }

    function tahunan_report()
    {
        $tahun = $this->input->post('tahun');
        $jenis = $this->input->post('jenis');

        $data['distribusi'] = $this->M_distribusi->year_distribusi($tahun)->result();
        $data['data'] = array(
            'tahun' => $tahun,
            'jenis'  => $jenis
        );
        $this->load->view('templates/admin_header');
        $this->load->view('templates/admin_sidebar');
        $this->load->view('templates/admin_navbar');
        $this->load->view('admin/laporan/distribusi2', $data);
        $this->load->view('templates/admin_footer_js');
        $this->load->view('templates/admin_custom_js');
        $this->load->view('templates/admin_footer');
    }


    function print_pdf_tahunan($hasil_cari)
    {
        $data['distribusi'] = $this->M_distribusi->year_distribusi($hasil_cari)->result();
        $data['jenis'] = 'Tahunan';
        $this->load->library('Dompdf_gen');

        $this->load->view('admin/laporan/distribusi_harian', $data);

        $paper_size = 'A4';
        $oriantation = 'potrait';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $oriantation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan_tahunan_" . date('Y-m-d_H-i-s') . ".pdf", array('Attachment' => 0));
    }
}
