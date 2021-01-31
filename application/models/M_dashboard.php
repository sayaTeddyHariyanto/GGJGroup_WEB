<?php

use PhpParser\Node\Expr\FuncCall;

class M_dashboard extends CI_Model{

    public function getAll(){

        $data = $this->db->get('tb_anggota');

		return $data->num_rows();
    }

    // public function getHistory(){

    //     $today = date("Y-m-d");
    //     $query = $this->db->query("SELECT tanggal_zakat, SUM(nominal_zakat) AS nominal_zakat FROM pembayaran_zakat 
    //     WHERE tanggal_zakat LIKE '%$today%' GROUP BY tanggal_zakat");
        
    //     return $query->num_rows();
    // }

    public function getBulananPembayaran(){

        $bulan_sekarang = date("Y-m");

        $query = $this->db->query("SELECT SUM(pembayaran_zakat.nominal_zakat) as nominal_zakat FROM pembayaran_zakat WHERE pembayaran_zakat.tanggal_zakat LIKE '%$bulan_sekarang%' AND pembayaran_zakat.status_zakat = 1")->row()->nominal_zakat;
        
        return $query;
    }

    public function getBulananPendistribusian(){

        $bulan_sekarang = date("Y-m");

        $query = $this->db->query("SELECT SUM(distribusi_zakat.nominal_distribusi) as nominal_distribusi FROM distribusi_zakat WHERE distribusi_zakat.tanggal_distribusi LIKE '%$bulan_sekarang%' AND distribusi_zakat.status_distribusi = 1 ")->row()->nominal_distribusi;
        
        return $query;
    }

    public function getSisaSaldo(){

        $bulan_sekarang = date("Y-m");

        $total_zakat = $this->db->query("SELECT SUM(pembayaran_zakat.nominal_zakat) as nominal_zakat FROM pembayaran_zakat WHERE pembayaran_zakat.tanggal_zakat LIKE '%$bulan_sekarang%' AND pembayaran_zakat.status_zakat = 1")->row()->nominal_zakat;
        $total_distribusi = $this->db->query("SELECT SUM(distribusi_zakat.nominal_distribusi) as nominal_distribusi FROM distribusi_zakat WHERE distribusi_zakat.tanggal_distribusi LIKE '%$bulan_sekarang%' AND distribusi_zakat.status_distribusi = 1")->row()->nominal_distribusi;

        $sisa_saldo = $total_zakat - $total_distribusi;
        return $sisa_saldo;
    }
    
    public function laporanBulanan(){
        $bulan_sekarang = date("Y-m");
        $total = $this->db->query("SELECT *, SUM(pembayaran_zakat.nominal_zakat) AS total FROM pembayaran_zakat GROUP BY month(pembayaran_zakat.tanggal_zakat)");
        
    }

    // public function getFavorit()
    // {
    //     $favorit = date("Y-m");

    //     $query = $this->db->query("SELECT tb_anggota.nama_anggota, SUM(detail_transaksi.berat) as total_berat 
    //     FROM user, transaksi, detail_transaksi
    //     WHERE transaksi.id_user = user.id_user 
    //     AND transaksi.id_transaksi = detail_transaksi.id_transaksi 
    //     AND transaksi.tgl_transaksi LIKE '%$favorit%' 
    //     GROUP BY user.nama_user ORDER BY total_berat DESC LIMIT 5");

    //     return $query;
    // }

    public function getMingguan()   
    {

        $h_7 = date("Y-m-d", mktime(0, 0, 0, date("n"), date("j")-6, date("Y")));
        $h = date("Y-m-d", mktime(0, 0, 0, date("n"), date("j")+1, date("Y")));

        $query = $this->db->query("SELECT pembayaran_zakat.tanggal_zakat, SUM(pembayaran_zakat.nominal_zakat) as nominal_zakat
        FROM pembayaran_zakat WHERE tanggal_zakat BETWEEN '$h_7' AND '$h' 
        GROUP BY day(pembayaran_zakat.tanggal_zakat) ORDER BY tanggal_zakat ASC");

        return $query;
    }

        
}

?>