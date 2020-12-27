<div class="container-fluid">

    <div class="row justify-content-center py-3">
        <div class="col-md-10 card shadow p-0">
            <div class="card-body pb-0">
                <h2 class="font-weight-bolder mb-0">Pembayaran Zakat</h2>
                <ul class="breadcrumb bg-transparent ml-n3 mt-n3 mb-0">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>admin/dashboard"><i class="fa fa-home"></i> Dashboard</a></li>
                    <li class="breadcrumb-item active">Laporan Pembayaran Zakat</li>
                </ul>
                <select id="laporan_distribusi" class="form-control mb-4" aria-label="Default select example">
                    <option selected>Pilih Berdasarkan</option>
                    <option value="box_harian">Menurut Hari</option>
                    <option value="box_bulanan">Menurut Bulan</option>
                    <option value="box_tahunan">Menurut Tahun</option>
                </select>

                <div class="box_laporan d-none" id="box_harian">
                    <div class="form-group">
                        <label for="awal">Pilih Tanggal :</label>

                        <form action="<?= base_url() . "admin/pembayaran_zakat/harian_report" ?>" method="post">
                            <!-- <input type="text" name="awal" id="monthpicker" class="form-control mr-2" required> -->
                            <div class="input-group mb-3">
                                <input type="hidden" name="jenis" value="box_harian">
                                <input type="date" name="t_awal" id="t_awal" required class="form-control" placeholder="Dari Tanggal . .">
                                <input type="date" name="t_akhir" id="t_akhir" required class="form-control" placeholder="Sampai Tanggal . .">
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

                        <form action="<?= base_url() . "admin/pembayaran_zakat/bulanan_report" ?>" method="post">
                            <!-- <input type="text" name="awal" id="monthpicker" class="form-control mr-2" required> -->
                            <div class="input-group mb-3">
                                <input type="hidden" name="jenis" value="box_bulanan">
                                <input type="month" name="bulan" id="bulan" required class="form-control" placeholder="Pilih Bulan . .">
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

                        <form action="<?= base_url() . "admin/pembayaran_zakat/tahunan_report" ?>" method="post">
                            <!-- <input type="text" name="awal" id="monthpicker" class="form-control mr-2" required> -->
                            <div class="input-group mb-3">
                                <input type="hidden" name="jenis" value="box_tahunan">
                                <input type="text" name="tahun" id="tahun" required class="form-control" placeholder="Pilih Tahun . .">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-warning" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card border-success mb-4">
                    <div class="card-header bg-success py-3">
                        <h6 class="m-0 font-weight-bold text-white">Tabel pembayaran Zakat</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal Pembayaran Zakat</th>
                                        <th>Nominal Pembayaran Zakat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($pembayaran as $dst) : ?>
                                        <tr>
                                            <td><?= $i ?>. </td>
                                            <td><?= $dst->tanggal_zakat ?></td>
                                            <td  class="text-right">Rp. <?= number_format($dst->Total_zakat, 0, ',', '.') ?></td>
                                        </tr>
                                    <?php $i++;
                                    endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Area Chart -->
                <div class="card border-success mb-4">
                    <div class="card-header bg-success py-3">
                        <h6 class="m-0 font-weight-bold text-white">Grafik Pembayaran Zakat</h6>
                    </div>
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas id="laporanZakat"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>