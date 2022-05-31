<?php

class M_crud extends CI_Model
{
    public function edit($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function getAll($table)
    {
        return $this->db->get($table);
    }

    public function getIds($table, $order)
    {
        return $this->db->query("SELECT * FROM $table ORDER BY $order DESC LIMIT 1");
    }

    public function insert($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function delete($where, $table)
    {
        $this->db->delete($table, $where);
    }

    public function update($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    function select_notif()
    {
        return $this->db->query("SELECT id_zakat, pembayaran_zakat.id_anggota, tb_anggota.nama_anggota, bulan_zakat, nominal_zakat, tanggal_zakat, status_zakat FROM tb_anggota, pembayaran_zakat WHERE tb_anggota.id_anggota = pembayaran_zakat.id_anggota ORDER BY status_zakat ASC LIMIT 5");
    }

    function select_notifbelum()
    {
        return $this->db->query("SELECT id_zakat, pembayaran_zakat.id_anggota, tb_anggota.nama_anggota, bulan_zakat, nominal_zakat, tanggal_zakat, status_zakat FROM tb_anggota, pembayaran_zakat WHERE tb_anggota.id_anggota = pembayaran_zakat.id_anggota AND pembayaran_zakat.status_zakat = 0");
    }

    public function cetak($where)
    {
        return  $this->db->query("SELECT id_penerima, nama_penerima, tb_kategori.nama_kategori, tb_anggota.nama_anggota, alamat_penerima, pekerjaan, jumlah_tanggungan, jumlah_terima, status_penerima
            FROM tb_penerima, tb_kategori, tb_anggota
            WHERE tb_penerima.id_kategori = tb_kategori.id_kategori AND tb_penerima.id_anggota = tb_anggota.id_anggota AND tb_penerima.id_penerima='$where'");
        //return $this->db->get_where($table, $where, );
    }

}
