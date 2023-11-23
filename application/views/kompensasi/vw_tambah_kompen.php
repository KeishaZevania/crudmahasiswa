<div id="layoutSidenav_content">
    <div class="container-fluid">
        <div class="container-fluid px-4">
            <h1 class="mt-4">KOMPENSASI</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= base_url('Profil') ?>">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="<?= base_url('kompensasi') ?>">Kompensasi</a></li>
                <li class="breadcrumb-item active">Tambah</li>
            </ol>
            <h1 class="h3 mb-4 text-gray-800">
                <?php echo $judul; ?>
            </h1>
        </div>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header justify-content-center">
                            Form Tambah Pengajuan KOMPENSASI
                        </div>
                        <div class="card-body">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="nama_mhs">Nama Mahasiswa</label>
                                    <input type="text" name="judul_pelanggaran" class="form-control"
                                        value="<?= set_value('judul_pelanggaran') ?>" id="judul_pelanggaran"
                                        placeholder="Judul Pelanggaran">
                                    <?= form_error('judul_pelanggaran', '<small class="text-danger p1-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="judul_pelanggaran">Judul Pelanggaran</label>
                                    <input type="text" name="aktifitas" class="form-control"
                                        value="<?= set_value('judul_pelanggaran') ?>" id="judul_pelanggaran"
                                        placeholder="judul_pelanggaran">
                                    <?= form_error('judul_pelanggaran', '<small class="text-danger p1-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="jml_kompen">Jumlah Kompen</label>
                                    <input type="text" name="jml_kompen" class="form-control"
                                        value="<?= set_value('jml_kompen') ?>" id="jml_kompen" placeholder="jml_kompen">
                                    <?= form_error('jml_kompen', '<small class="text-danger p1-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="gambar">Gambar</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="gambar" id="gambar">
                                        <label for="gambar" class="custom-file-label">Choose file</label>
                                    </div>
                                </div>
                                <a href="<?= base_url('kompensasi') ?>" class="btn btn-danger">Tutup</a>
                                <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah
                                    Kompen</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>