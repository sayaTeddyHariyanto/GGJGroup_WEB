<div class="container-fluid">

    <div class="row justify-content-center py-3">
        <div class="col-md-10 card shadow p-0">
            <div class="card-body pb-0">
                <h2 class="font-weight-bolder mb-0">Laporan Keuangan</h2>
                <ul class="breadcrumb bg-transparent ml-n3 mt-n3 mb-0">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>admin/dashboard"><i class="fa fa-home"></i> Dashboard</a></li>
                    <li class="breadcrumb-item active">Laporan Keuangan</li>
                </ul>
                <select id="laporan_distribusi" class="form-control mb-4" aria-label="Default select example">
                    <option selected>Pilih Berdasarkan</option>
                    <option <?= $data['jenis'] == 'box_tahunan' ? "selected" : "" ?> value="box_tahunan">Menurut Tahun</option>
                </select>

                <div class="box_laporan d-none" id="box_harian">
                    <div class="form-group">
                        <label for="awal">Pilih Tanggal :</label>

                        <form action="<?= base_url() . "admin/laporan_keuangan/harian_report" ?>" method="post">
                            <!-- <input type="text" name="awal" id="monthpicker" class="form-control mr-2" required> -->
                            <div class="input-group mb-3">
                                <input type="hidden" name="jenis" value="box_harian">
                                <input type="date" name="t_awal" id="t_awal" required value="<?= $data['jenis'] == 'box_harian' ? $data['t_awal'] : "" ?>" class="form-control" placeholder="Dari Tanggal . .">
                                <input type="date" name="t_akhir" id="t_akhir" required value="<?= $data['jenis'] == 'box_harian' ? $data['t_akhir'] : "" ?>" class="form-control" placeholder="Sampai Tanggal . .">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-warning" type="submit">Submit</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>

                <div class="box_laporan d-none" id="box_bulanan">
                    <div class="form-group">
                        <label for="awal">Pilih Bulan :</label>

                        <form action="<?= base_url() . "admin/laporan_keuangan/bulanan_report" ?>" method="post">
                            <!-- <input type="text" name="awal" id="monthpicker" class="form-control mr-2" required> -->
                            <div class="input-group mb-3">
                                <input type="hidden" name="jenis" value="box_bulanan">
                                <input type="month" name="bulan" id="bulan" value="<?= $data['jenis'] == 'box_bulanan' ? $data['bulan'] : "" ?>" required class="form-control" placeholder="Pilih Bulan . .">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-warning" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="box_laporan d-none" id="box_tahunan">
                    <div class="form-group">
                        <label for="awal">Pilih Tahun :</label>

                        <form action="<?= base_url() . "admin/laporan_keuangan/tahunan_report" ?>" method="post">
                            <!-- <input type="text" name="awal" id="monthpicker" class="form-control mr-2" required> -->
                            <div class="input-group mb-3">
                                <input type="hidden" name="jenis" value="box_tahunan">
                                <input type="text" name="tahun" id="tahun" value="<?= $data['jenis'] == 'box_tahunan' ? $data['tahun'] : "" ?>" required class="form-control" placeholder="Pilih Tahun . .">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-warning" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <?php if ($data['jenis'] == 'box_harian') { ?>
                    <a class="btn btn-primary mb-3" href="<?= base_url() . "admin/laporan_keuangan/print_pdf_rentang/" . $data['t_awal'] . "/" . $data['t_akhir'] ?>" role="button">
                        <i class="fas fa-file-pdf mr-2"></i> Cetak
                    </a>
                <?php } else if ($data['jenis'] == 'box_bulanan') { ?>
                    <a class="btn btn-primary mb-3" href="<?= base_url() . "admin/laporan_keuangan/print_pdf_bulanan/" . $data['bulan'] ?>" role="button">
                        <i class="fas fa-file-pdf mr-2"></i> Cetak
                    </a>
                <?php } else if ($data['jenis'] == 'box_tahunan') { ?>
                    <a class="btn btn-primary mb-3" href="<?= base_url() . "admin/laporan_keuangan/print_pdf_tahunan/" . $data['tahun'] ?>" role="button">
                        <i class="fas fa-file-pdf mr-2"></i> Cetak
                    </a>
                <?php } ?>
                <a class="btn btn-danger mb-3" href="<?= base_url() . "admin/laporan_keuangan/" ?>" role="button">
                    <i class="fas fa-arrow-left mr-2"></i> Kembali
                </a>

                <div class="card mb-4">
                    <div class="card-header bg-success py-3">
                        <h6 class="m-0 font-weight-bold text-white">Tabel Laporan Keuangan</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Pembayaran Zakat</th>
                                        <th>Pendistribusian Zakat</th>
                                        <th>Saldo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($pembayaran as $pmb) : 
                                        $bulanPembayaran = substr($pmb->tanggal_zakat, 0, 7);
                                        $total_zakat = $this->db->query("SELECT SUM(nominal_zakat) AS total FROM pembayaran_zakat WHERE tanggal_zakat LIKE '%$bulanPembayaran%'")->row()->total;
                                        $total_distribusi = $this->db->query("SELECT SUM(nominal_distribusi) AS total FROM distribusi_zakat WHERE tanggal_distribusi LIKE '%$bulanPembayaran%'")->row()->total;
                                        $saldo = $total_zakat - $total_distribusi;?>
                                        <tr>
                                        <td><?= $i ?>. </td>
                                            <td><?= substr($pmb->tanggal_zakat, 0, 7) ?></td>
                                            <td class="text-right">Rp. <?= number_format($total_zakat, 0, ',', '.') ?></td>
                                            <td class="text-right">Rp. <?= number_format($total_distribusi, 0, ',', '.') ?></td>
                                            <td class="text-right">Rp. <?= number_format($saldo, 0, ',', '.') ?></td>
                                        </tr>
                                    <?php $i++;
                                    endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Area Chart -->
                <div class="card mb-4">
                    <div class="card-header bg-success py-3">
                        <h6 class="m-0 font-weight-bold text-white">Grafik Keuangan</h6>
                    </div>
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas id="laporanArea"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>