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
                    <input type="hidden" name="id_kategori" value="<?=$id_kategori?>">
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
                    <div class="form-group">
                        <label for="">Pilih Penerima</label><br>       
                        <?php foreach ($penerima as $key) { ?> 
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" name="penerima[]" id="" value="<?=$key->id_penerima?>"> <?=$key->nama_penerima . ' ('. $key->prioritas .')'?>
                            </label>
                        </div>
                        <?php }?>   
                        
                    </div>
                    <div class="form-group">
                        <label for="">Pilih Anggota</label><br>       
                        <?php foreach ($anggota as $ang) { ?> 
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" name="anggota[]" id="" value="<?=$ang->id_anggota?>"> <?=$ang->nama_anggota?>
                            </label>
                        </div>
                        <?php }?>   
                        
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Tambah</button>
                </div>
                </form>
            </div>
        </div>



</div>
