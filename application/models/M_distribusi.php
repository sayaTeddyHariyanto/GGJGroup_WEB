<?php
class M_distribusi extends CI_Model
{


    function get_distribusi()
    {
        $query = $this->db->query("SELECT id_distribusi, tb_kategori.nama_kategori, judul_distribusi, tanggal_distribusi, status_distribusi, SUM(nominal_distribusi) AS Total_distribusi 
        FROM distribusi_zakat, tb_kategori 
        WHERE distribusi_zakat.id_kategori=tb_kategori.id_kategori 
        GROUP BY tanggal_distribusi");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $data) {
                $hasil[] = $data;
            }
            return $hasil;
        }
    }

    function day_distribusi($t_awal, $t_akhir)
    {
        $query = $this->db->query("SELECT id_distribusi, tb_kategori.nama_kategori, judul_distribusi, tanggal_distribusi, status_distribusi, SUM(nominal_distribusi) AS Total_distribusi FROM distribusi_zakat, tb_kategori WHERE distribusi_zakat.id_kategori=tb_kategori.id_kategori AND distribusi_zakat.tanggal_distribusi BETWEEN '$t_awal' AND '$t_akhir' GROUP BY day(tanggal_distribusi) ORDER BY distribusi_zakat.tanggal_distribusi ASC
        ");
        return $query;
    }

    function month_distribusi($bulan)
    {
        $query = $this->db->query("SELECT id_distribusi, tb_kategori.nama_kategori, judul_distribusi, tanggal_distribusi, status_distribusi, SUM(nominal_distribusi) AS Total_distribusi FROM distribusi_zakat, tb_kategori WHERE distribusi_zakat.id_kategori=tb_kategori.id_kategori AND distribusi_zakat.tanggal_distribusi LIKE '%$bulan%' GROUP BY day(tanggal_distribusi) ORDER BY distribusi_zakat.tanggal_distribusi ASC
        ");
        return $query;
    }

    function year_distribusi($tahun)
    {
        $query = $this->db->query("SELECT id_distribusi, tb_kategori.nama_kategori, judul_distribusi, tanggal_distribusi, status_distribusi, SUM(nominal_distribusi) AS Total_distribusi FROM distribusi_zakat, tb_kategori WHERE distribusi_zakat.id_kategori=tb_kategori.id_kategori AND distribusi_zakat.tanggal_distribusi LIKE '%$tahun%' GROUP BY day(tanggal_distribusi) ORDER BY distribusi_zakat.tanggal_distribusi ASC
        ");
        return $query;
    }
}
