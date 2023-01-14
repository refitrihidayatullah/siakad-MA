<?php if ($this->session->flashdata('flash')) : ?>
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Penilaian <strong>Berhasil</strong> <?= $this->session->flashdata('flash'); ?>.
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
                Data Penilaian <strong>Sudah</strong> <?= $this->session->flashdata('flashs'); ?>.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
<?php endif; ?>




<div class="card mb-3">
    <div class="card-header bg-primary text-white">
        Form Penilaian Siswa
    </div>
    <div class="card-body">

        <form action="<?= base_url() ?>Admin/func_tambah_nilai_siswa" method="POST">
            <div class="form-row">
                <div class="form-group col-md-6">

                    <label for="id_siswa">Nama Siswa</label>
                    <select id="id_siswa" name="id_siswa" class="form-control" required>
                        <option selected>Pilih...</option>
                        <?php foreach ($get_all_siswa as $gt_siswa) { ?>
                            <option value="<?= $gt_siswa['id_siswa']; ?>"><?= $gt_siswa['nama_siswa']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="id_mapel">Mata Pelajaran</label>
                    <select id="id_mapel" name="id_mapel" class="form-control" required>
                        <option selected>Pilih...</option>
                        <?php foreach ($get_all_mapel as $dt_mpl) { ?>
                            <option value="<?= $dt_mpl['id_mapel']; ?>"><?= $dt_mpl['nama_mapel']; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="id_kategori_nilai">Kategori</label>
                    <select id="id_kategori_nilai" name="id_kategori_nilai" class="form-control" required>
                        <option selected>Pilih...</option>
                        <?php foreach ($get_kategori_nilai as $ktgr) { ?>
                            <option value="<?= $ktgr['id_kategori_nilai']; ?>"><?= $ktgr['nama_kategori_nilai']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="nilai">Nilai</label>
                    <input type="number" class="form-control" id="nilai" name="nilai" required>
                </div>
            </div>
            <hr>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>


<?php if ($this->session->flashdata('update')) : ?>
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Penilaian <strong>Berhasil</strong> <?= $this->session->flashdata('update'); ?>.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php if ($this->session->flashdata('updates')) : ?>
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Penilaian <strong>Sudah</strong> <?= $this->session->flashdata('updates'); ?>.
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
            <h6 class="m-0 font-weight-bold text-primary">Data Penilaian Siswa</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Siswa</th>
                            <th>Kategori</th>
                            <th>Mata Pelajaran</th>
                            <th>Nilai</th>
                            <th>Tanggal Penilaian</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($cek_data_penilaian > 0) { ?>
                            <?php foreach ($tampil_nilai_siswa as $tmpl_nilai) { ?>
                                <tr>
                                    <td><?= $tmpl_nilai['nama_siswa']; ?></td>
                                    <td><?= $tmpl_nilai['nama_kategori_nilai']; ?></td>
                                    <td><?= $tmpl_nilai['nama_mapel']; ?></td>
                                    <td><?= $tmpl_nilai['nilai']; ?></td>
                                    <td><?= $tmpl_nilai['tanggal_penilaian']; ?></td>
                                    <td>
                                        <div class=" d-flex justify-content-center">
                                            <a href="#" data-toggle="modal" data-target="#editPenilaianSiswa<?= $tmpl_nilai['id_penilaian_siswa']; ?>" class=" btn btn-warning btn-sm btn-circle mr-4">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>

                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        <?php } else { ?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>


                                </td>
                            </tr>

                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal edit penilaian Siswa -->
<?php $no = 0;
foreach ($tampil_nilai_siswa as $tmpl_nilai) : $no++;  ?>
    <div class="modal fade" id="editPenilaianSiswa<?= $tmpl_nilai['id_penilaian_siswa']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Jurusan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mr-3 ml-3">
                    <form method="POST" action="<?php echo base_url() . 'Admin/updatePenilaianSiswa/' ?>">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <input type="hidden" name="id_penilaian_siswa" value="<?= $tmpl_nilai['id_penilaian_siswa']; ?>">
                                <input type="hidden" name="id_siswa" value="<?= $tmpl_nilai['id_siswa']; ?>">
                                <label for="nama_siswa">Nama Siswa</label>
                                <input type="text" class="form-control" id="nama_siswa" value="<?= $tmpl_nilai['nama_siswa']; ?>" name="nama_siswa" placeholder="masukkan nama siswa..">
                                <?= form_error('nama_jurusan');  ?>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="id_kategori_nilai">Kategori</label>
                                <select id="id_kategori_nilai" name="id_kategori_nilai" class="form-control" required>
                                    <option value="<?= $tmpl_nilai['id_kategori_nilai']; ?>" selected><?= $tmpl_nilai['nama_kategori_nilai']; ?></option>
                                    <?php foreach ($get_kategori_nilai as $ktgr) { ?>
                                        <option value="<?= $ktgr['id_kategori_nilai']; ?>"><?= $ktgr['nama_kategori_nilai']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="id_mapel">Mapel</label>
                                <select id="id_mapel" name="id_mapel" class="form-control" required>
                                    <option value="<?= $tmpl_nilai['id_mapel']; ?>" selected><?= $tmpl_nilai['nama_mapel']; ?></option>
                                    <?php foreach ($get_all_mapel as $get_mapel) { ?>
                                        <option value="<?= $get_mapel['id_mapel']; ?>"><?= $get_mapel['nama_mapel']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="nilai">Nilai</label>
                                <input type="number" class="form-control" id="nilai" value="<?= $tmpl_nilai['nilai']; ?>" name="nilai" required>
                            </div>

                        </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>