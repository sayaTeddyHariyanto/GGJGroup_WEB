<div class="container-fluid mb-5">

    <div class="row justify-content-center py-3">
        <div class="col-md-8 card shadow p-0">
            <div class="card-header pb-0">
                <h2 class="font-weight-bolder mb-0">Detail Data</h2>
                <ul class="breadcrumb bg-transparent ml-n3 mt-n3 mb-0">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>admin/dashboard"><i class="fa fa-home"></i> Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>admin/distribusi"></i> Distribusi</a></li>
                    <li class="breadcrumb-item active">Detail Distribusi</li>
                </ul>
            </div>
            <div class="card-body">
                <div class="px-2">
                    <?php echo $this->session->flashdata('pesan'); ?>
                </div>

                <?php foreach ($dis as $detDis) { ?>

                        <table class="table table-borderless mt-1">
                            <tbody>
                                <tr>
                                    <td class="text-right">Nama Kategori :</td>
                                    <td>
                                    <?php foreach($kategori as $kat){?>
                                    <?=$kat->id_kategori == $detDis->id_kategori ? $kat->nama_kategori : ""?>
                                    <?php }?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-right">Judul :</td>
                                    <td ><?=$detDis->judul_distribusi?></td>
                                </tr>
                                <tr>
                                    <td class="text-right">Tanggal :</td>
                                    <td ><?=$detDis->tanggal_distribusi?></td>
                                </tr>
                                <tr>
                                    <td class="text-right">Nominal :</td>
                                    <td >Rp. <?= number_format($detDis->nominal_distribusi, 0, ',', '.') ?></td>
                                </tr>
                                <tr>
                                    <td class="text-right">Status Anggota :</td>
                                    <td ><?=$detDis->status_distribusi==1?"SELESAI":"PERENCANAAN"?></td>
                                </tr>
                            </tbody>
                        </table>

                        <hr>
                        <div class="px-5">
                            <h5 class="text-center">Daftar Anggota</h5>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Anggota</th>
                                        <th>No HP Anggota</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; foreach($det_anggota as $detAng):?>
                                    <tr>
                                        <td scope="row"><?=$i?>.</td>
                                        <td><?php foreach($anggota as $ang){echo $ang->id_anggota == $detAng->id_anggota ? $ang->nama_anggota : "";}?></td>
                                        <td><?php foreach($anggota as $ang){echo $ang->id_anggota == $detAng->id_anggota ? $ang->no_hp_anggota : "";}?></td>
                                    </tr>
                                    <?php $i++; endforeach;?>
                                </tbody>
                            </table>
                        </div>

                        <hr>
                        <div class="px-5">
                            <h5 class="text-center">Daftar Penerima</h5>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Penerima</th>
                                        <th>Alamat Penerima</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; foreach($det_penerima as $detPnm):?>
                                    <tr>
                                        <td scope="row"><?=$i?>.</td>
                                        <td><?php foreach($penerima as $pnm){echo $pnm->id_penerima == $detPnm->id_penerima ? $pnm->nama_penerima : "";}?></td>
                                        <td><?php foreach($penerima as $pnm){echo $pnm->id_penerima == $detPnm->id_penerima ? $pnm->alamat_penerima : "";}?></td>
                                    </tr>
                                    <?php $i++; endforeach;?>
                                </tbody>
                            </table>
                        </div>

                <?php }?>

            </div>
            <div class="card-footer text-center">
                <a class="btn btn-secondary" href="<?=base_url()?>admin/distribusi" role="button"><i class="fas fa-arrow-left mr-2"></i>Kembali</a>
            </div>
        </div>
    </div>


</div>