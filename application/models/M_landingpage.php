<?php

class M_landingpage extends CI_Model 
{
    function selectsum_distribusi()
    {
        $bulan = date('Y-m');
        return $this->db->query("SELECT SUM(nominal_distribusi) as total FROM distribusi_zakat WHERE tanggal_distribusi LIKE '$bulan%'");
    }

    function selectsum_pemasukan()
    {
        $bulan = date('Y-m');
        return $this->db->query("SELECT SUM(nominal_zakat) as total FROM pembayaran_zakat WHERE tanggal_zakat LIKE '$bulan%'");
    }

    function selectcount_penerima()
    {
        return $this->db->query("SELECT COUNT(*) as total FROM tb_penerima");
    }

    function SelectPembayaranById($id)
    {
        return $this->db->query("SELECT * FROM
        pembayaran_zakat, tb_anggota, metode_pembayaran WHERE
        pembayaran_zakat.id_anggota = tb_anggota.id_anggota AND
        pembayaran_zakat.id_metode = metode_pembayaran.id_metode AND
        pembayaran_zakat.id_zakat = '$id'");
    }
	
    function getBulanforSidebar()
    {
        return $this->db->query("SELECT tanggal_berita FROM tb_berita WHERE status_berita = '1' GROUP BY month(tanggal_berita) ORDER BY tanggal_berita DESC LIMIT 10");
    }

    function getBeritabyBulan($bulan)
    {
        return $this->db->query("SELECT * FROM tb_berita  WHERE status_berita = '1' AND tanggal_berita LIKE '%$bulan%' ORDER BY tanggal_berita ASC");
    }

    function searchresult($search, $number, $offset)
    {
        $this->db->like('judul_berita', $search);
        $this->db->where('status_berita', 1);
        $this->db->order_by('tanggal_berita', 'asc');
        return $query = $this->db->get('tb_berita',$number,$offset)->result();
    }

    function searchall($search)
    {
        return $this->db->query("SELECT * FROM tb_berita WHERE status_berita = '1' AND judul_berita LIKE '%$search%' ORDER BY tanggal_berita ASC");
    }

    function allresult($number, $offset)
    {
        $this->db->where('status_berita', 1);
        return $query = $this->db->get('tb_berita',$number,$offset)->result();
    }

    function landingpageberita()
    {
        $row = $this->db->query("SELECT * FROM tb_berita WHERE status_berita = 1")->num_rows();
        if ($row > 0 && $row < 6) {
            return $this->db->query("SELECT * FROM tb_berita WHERE status_berita = 1 LIMIT 3");
        }else if($row > 0 && $row >= 6){
            return $this->db->query("SELECT * FROM tb_berita WHERE status_berita = 1 LIMIT 6");
        }else{
            $this->db->query("SELECT * FROM tb_berita");
        }
    }
}
