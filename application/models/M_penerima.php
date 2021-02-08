<?php
class M_penerima extends CI_Model
{
    function tampil_tabel()
    {
        $data = $this->db->query("SELECT id_penerima, nama_penerima, tb_kategori.nama_kategori, tb_anggota.nama_anggota, jumlah_terima, status_penerima
            FROM tb_penerima, tb_kategori, tb_anggota
            WHERE tb_penerima.id_kategori = tb_kategori.id_kategori AND tb_penerima.id_anggota = tb_anggota.id_anggota");
        return $data;
    }

    public function detail($where)
    {
        return  $this->db->query("SELECT id_penerima, nama_penerima, tb_kategori.nama_kategori, tb_anggota.nama_anggota, alamat_penerima, pekerjaan, jumlah_tanggungan, jumlah_terima, status_penerima
            FROM tb_penerima, tb_kategori, tb_anggota
            WHERE tb_penerima.id_kategori = tb_kategori.id_kategori AND tb_penerima.id_anggota = tb_anggota.id_anggota AND tb_penerima.id_penerima='$where'");
        //return $this->db->get_where($table, $where, );
    }

    public function edit($where)
    {
        return  $this->db->query("SELECT id_penerima, nama_penerima, tb_kategori.nama_kategori, tb_anggota.nama_anggota, alamat_penerima, pekerjaan, jumlah_tanggungan, jumlah_terima, status_penerima
            FROM tb_penerima, tb_kategori, tb_anggota
            WHERE tb_penerima.id_kategori = tb_kategori.id_kategori AND tb_penerima.id_anggota = tb_anggota.id_anggota AND tb_penerima.id_penerima='$where'");
        //return $this->db->get_where($table, $where, );
    }

    public function update($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    function kategori()
    {
        $data = $this->db->query("SELECT * FROM tb_kategori");
        return $data->result();
    }

    function anggota()
    {
        $data = $this->db->query("SELECT * FROM tb_anggota");
        return $data->result();
    }

    public function delete($where, $table)
    {
        $this->db->delete($table, $where);
    }

}
