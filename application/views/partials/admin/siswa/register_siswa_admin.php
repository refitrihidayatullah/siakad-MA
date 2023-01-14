<?php if ($this->session->flashdata('flash')) : ?>
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data <strong>Berhasil</strong> <?= $this->session->flashdata('flash'); ?>.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php if ($this->session->flashdata('flashs')) : ?>
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data <strong>Gagal</strong> <?= $this->session->flashdata('flashs'); ?>.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
<?php endif; ?>
<div class="d-sm-flex align-items-center  mb-4">


    <div class="card shadow mb-4 w-100">
        <div class="card-header py-3 d-sm-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Data Siswa</h6>
            <a href="<?= base_url(); ?>Admin/tambahSiswa" class="btn btn-primary btn-circle mr-4">
                <!-- <i class="fab fa-facebook-f"></i> -->
                <i class="fa fa-plus" aria-hidden="true"></i>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nis</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Kelas</th>
                            <th>Alamat</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        ?>
                        <?php foreach ($siswa as $sw) {
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $sw['nis_siswa']; ?></td>
                                <td><?= $sw['nama_siswa']; ?></td>
                                <td><?= $sw['jenis_kelamin_siswa']; ?></td>
                                <td><?= $sw['nama_kelas']; ?></td>
                                <td><?= $sw['alamat_siswa']; ?></td>
                                <td>
                                    <div class=" d-flex justify-content-center">
                                        <a href="<?= base_url(); ?>Admin/editSiswa/<?= $sw['id_siswa']; ?>" class="btn btn-warning btn-sm btn-circle mr-4">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <a href="<?= base_url(); ?>Admin/hapusSiswa/<?= $sw['id_siswa']; ?>" class="btn btn-danger btn-sm btn-circle mr-4">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            <?php } ?>
                            </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>