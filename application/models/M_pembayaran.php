<?php
class M_pembayaran extends CI_Model
{


    function get_pembayaran()
    {
        $query = $this->db->query("SELECT id_zakat, tanggal_zakat, status_zakat, SUM(nominal_zakat) AS Total_zakat 
        FROM pembayaran_zakat WHERE pembayaran_zakat.status_zakat = 1
        GROUP BY tanggal_zakat");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $data) {
                $hasil[] = $data;
            }
            return $hasil;
        }
    }

    function day_pembayaran($t_awal, $t_akhir)
    {
        $query = $this->db->query("SELECT id_zakat, tanggal_zakat, status_zakat, SUM(nominal_zakat) AS Total_zakat FROM pembayaran_zakat WHERE pembayaran_zakat.status_zakat = 1 AND pembayaran_zakat.tanggal_zakat BETWEEN '$t_awal' AND '$t_akhir' GROUP BY tanggal_zakat ORDER BY pembayaran_zakat.tanggal_zakat ASC
        ");
        return $query;
    }

    function month_pembayaran($bulan)
    {
        $query = $this->db->query("SELECT id_zakat, tanggal_zakat, status_zakat, SUM(nominal_zakat) AS Total_zakat FROM pembayaran_zakat WHERE pembayaran_zakat.status_zakat = 1 AND pembayaran_zakat.tanggal_zakat LIKE '%$bulan%' GROUP BY tanggal_zakat ORDER BY pembayaran_zakat.tanggal_zakat ASC
        ");
        return $query;
    }

    function year_pembayaran($tahun)
    {
        $query = $this->db->query("SELECT id_zakat, tanggal_zakat, status_zakat, SUM(nominal_zakat) AS Total_zakat FROM pembayaran_zakat WHERE pembayaran_zakat.status_zakat = 1 AND pembayaran_zakat.tanggal_zakat LIKE '%$tahun%' GROUP BY month(tanggal_zakat) ORDER BY pembayaran_zakat.tanggal_zakat ASC
        ");
        return $query;
    }
}
