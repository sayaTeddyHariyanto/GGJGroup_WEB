    <div class="row card mt-3 mb-4 mx-1">
        <div class="col card-body table-responsive">
            <h2>Detail Transaksi</h2>
            <div class="row">
            <div class="col-6">
                <a href="<?= base_url() . 'admin/Laporan_rentang_hari/print_pdf_bulanan/' . $hasil_cari ?>" class="btn btn-sm btn-warning mb-2"><i class="fas fa-file-pdf fa-sm mr-2"></i>Cetak Pdf</a>
            </div>
            </div>
            <div class="row">
            <div class="col-md-8 col-sm-12">
                <table class="table table-bordered bg-white" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr class="text-center">
                    <th>No</th>
                    <th>Tanggal Transaksi</th>
                    <th>Total Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($data_bulanan as $dt) {
                        //$jenis = $this->db->query("SELECT nama_jenis_paket FROM jenis_paket WHERE id_jenis_paket = '$pk->id_jenis_paket'")->row();
                        ?>
                    <tr>
                        <td class="text-center"><?= $no++ ?></td>
                        <td class="text-center"><?= substr($dt->tanggal_zakat, 0, 10) ?></td>
                        <td class="text-right">Rp. <?= number_format($dt->nominal_zakat, 0, ",", ".") ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
                </table>
            </div>