<?php if ($this->session->flashdata('flash')) : ?>
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Guru <strong>Berhasil</strong> <?= $this->session->flashdata('flash'); ?>.
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
            <h6 class="m-0 font-weight-bold text-primary">Data Guru</h6>
            <a href="<?= base_url(); ?>Admin/tambahGuru" class="btn btn-primary btn-circle mr-4">
                <!-- <i class="fab fa-facebook-f"></i> -->
                <i class="fa fa-plus" aria-hidden="true"></i>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nip</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Email</th>
                            <th>Alamat</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tampil_data_guru as $tampil_guru) { ?>
                            <tr>
                                <td><?= $tampil_guru['nip_guru']; ?></td>
                                <td><?= $tampil_guru['nama_guru']; ?></td>
                                <td><?= $tampil_guru['jenis_kelamin_guru']; ?></td>
                                <td><?= $tampil_guru['email_guru']; ?></td>
                                <td><?= $tampil_guru['alamat_guru']; ?></td>
                                <td>
                                    <div class=" d-flex justify-content-center">
                                        <a href="<?= base_url(); ?>Admin/editGuru/<?= $tampil_guru['id_guru']; ?>" class="btn btn-warning btn-sm btn-circle mr-4">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <a href="<?= base_url(); ?>Admin/deleteGuru/<?= $tampil_guru['id_guru']; ?>" class="btn btn-danger btn-sm btn-circle mr-4" onclick="return confirm('Apakah Anda Yakin Akan Menghapus?');">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>