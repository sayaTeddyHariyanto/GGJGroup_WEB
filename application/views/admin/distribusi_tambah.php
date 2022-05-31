<div class="container-fluid">

    <div class="row justify-content-center py-3">
        <div class="col-md-8 card p-0">
            <div class="card-header pb-0">
                <h2 class="font-weight-bolder mb-0">Tambah Data</h2>
                <ul class="breadcrumb bg-transparent ml-n3 mt-n3 mb-0">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>admin/dashboard"><i class="fa fa-home"></i> Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>admin/distribusi"></i> Distribusi</a></li>
                    <li class="breadcrumb-item active">Tambah Data Distribusi</li>
                </ul>
            </div>
            <div class="card-body">
            <form action="<?= base_url() ?>admin/distribusi/tambah" method="post">
                    <div class="form-group">
                        <label for="judul">Judul:</label>
                        <input type="text" class="form-control" pattern="[a-zA-Z0-9 ,.-]{2,100}" name="judul" id="judul"maxlength="100" placeholder="Masukkan Judul..." required value="<?= set_value('judul') ?>">
                        <small id="judul" class="form-text text-muted">Judul maksimum 100 karakter</small>
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal:</label>
                        <input type="date" required class="form-control" name="tanggal" id="tanggal">
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Nominal:</label>
                        <input type="number" required class="form-control" min="0" placeholder="Masukkan nominal distribusi zakat" name="nominal" id="nominal">
                    </div>
                    <div class="form-group">
                        <label for="status">Status Tampil:</label>
                        <select class="custom-select" name="status" id="status" required>
                            <option value="" selected>Pilih Status</option>
                            <option value="0">PERENCANAAN</option>
                            <option value="1">SUDAH DILAKSANAKAN</option>
                        </select>
                    </div>                    
                    
                    <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Prioritas</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i=1; foreach($kat as $rowkat) :?>
                        <tr>
                        <th scope="row"><?= $i?></th>
                        <td><?=$rowkat->nama_penerima?></td>
                        <td><?=$rowkat->prioritas?></td>
                        </tr>
                    <?php $i++; endforeach;?>
                    </tbody>
                    </table>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Tambah</button>
                </div>
                </form>
            </div>
        </div>



</div>
