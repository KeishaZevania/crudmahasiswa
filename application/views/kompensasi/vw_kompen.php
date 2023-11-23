<div id="layoutSidenav_content">
    <div class="container-fluid">
        <div class="container-fluid px-4">
            <h1 class="mt-4">KOMPENSASI</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= base_url('Profil') ?>">Dashboard</a></li>
                <li class="breadcrumb-item active">KOMPENSASI</li>
            </ol>
            <h1 class="h3 mb-4 text-gray-800"><?php echo $judul2; ?></h1>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6"><a href="<?= base_url() ?>kompensasi/tambah" class="btn btn-info mb-2">Tambah Pengajuan Kompen</a></div>
                <div class="col-md-12">
                <?= $this->session->flashdata('message'); ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Nama Mahasiswa</td>
                                <td>Judul Pelanggaran</td>
                                <td>Jumlah Kompen</td>
                                <td>Bukti</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($kompensasi as $us) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $us['nama_mhs']; ?></td>
                                    <td><?= $us['judul_pelanggaran']; ?></td>
                                    <td><?= $us['jml_kompen']; ?></td>
                                    <td>
                                        <img src="<?= base_url('assets/img/kompensasi/') . $us['gambar']; ?>" style="width: 100px;" 
                                        class="img-thumbnail">
                                    </td>
                                    <td>
                                        <a href="<?= base_url('kompensasi/hapus/') . $us['id']; ?>" class="btn btn-danger">Hapus</a>
                                        <a href="<?= base_url('kompensasi/edit/') . $us['id']; ?>" class="btn btn-warning">Edit</a>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>