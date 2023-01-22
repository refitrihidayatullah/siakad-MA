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
            <h6 class="m-0 font-weight-bold text-primary">Daftar Guru Mengajar</h6>
            <a href="<?= base_url(); ?>Admin/tambahGuru" class="btn btn-primary btn-circle mr-4" data-toggle="modal" data-target="#addMasterJadwalMapel">
                <!-- <i class="fab fa-facebook-f"></i> -->
                <i class="fa fa-plus" aria-hidden="true"></i>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Guru</th>
                            <th>Mata Pelajaran</th>
                            <th>Kelas</th>
                            <th>Jurusan</th>
                            <th>Kategori</th>
                            <th>Tanggal</th>
                            <th>Waktu mulai</th>
                            <th>Waktu akhir</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($get_data_all_jadwal as $dt_all_jadwal) : ?>
                            <tr>
                                <td><?= $dt_all_jadwal['nama_guru']; ?></td>
                                <td><?= $dt_all_jadwal['nama_mapel']; ?></td>
                                <td><?= $dt_all_jadwal['nama_kelas']; ?></td>
                                <td><?= $dt_all_jadwal['nama_jurusan']; ?></td>
                                <td><?= $dt_all_jadwal['nama_kategori_nilai']; ?></td>
                                <td><?= $dt_all_jadwal['tanggal_jadwal']; ?></td>
                                <td><?= $dt_all_jadwal['jam_jadwal_mulai']; ?></td>
                                <td><?= $dt_all_jadwal['jam_jadwal_akhir']; ?></td>
                                <td>
                                    <?php date_default_timezone_set('Asia/Jakarta');
                                    if ($dt_all_jadwal['tanggal_jadwal'] == date('Y-m-d') && date('H:i:s') >= $dt_all_jadwal['jam_jadwal_mulai'] && date('H:i:s') <= $dt_all_jadwal['jam_jadwal_akhir']) { ?>
                                        <span class="badge badge-light">Tersedia</span>
                                    <?php } else { ?>
                                        <span class="badge badge-danger">Expired</span>
                                    <?php } ?>

                                </td>
                                <td>
                                    <div class=" d-flex justify-content-center">
                                        <button class="btn btn-warning btn-sm btn-circle mr-4" data-toggle="modal" data-target="#editMasterJadwalMapel<?= $dt_all_jadwal['id_jadwal_mapel'] ?>">
                                            <i class="fas fa-pencil-alt"></i>
                                        </button>
                                        <a href="<?= base_url(); ?>Admin/jadwalMapel/<?= $dt_all_jadwal['id_jadwal_mapel']; ?>" class="btn btn-danger btn-sm btn-circle mr-4" onclick="return confirm('Apakah Anda Yakin Akan Menghapus?');">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- Modal add master jadwal -->
<div class="modal fade" id="addMasterJadwalMapel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Jadwal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mr-3 ml-3">
                <form action="<?= base_url() . 'Admin/tambahJadwalMapel' ?>" method="POST">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="id_guru">Nama Guru</label>
                            <select id="id_guru" name="id_guru" class="form-control">
                                <option selected>Pilih...</option>
                                <?php foreach ($get_data_guru as $dt_gr) {  ?>
                                    <option value="<?= $dt_gr['id_guru']; ?>"><?= $dt_gr['nama_guru']; ?></option>
                                <?php } ?>
                            </select>
                            <?= form_error('id_guru');  ?>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="id_mapel">Mata Pelajaran</label>
                            <select id="id_mapel" name="id_mapel" class="form-control">
                                <option selected>Pilih...</option>
                                <?php foreach ($get_data_mapel as $dt_mpl) { ?>
                                    <option value="<?= $dt_mpl['id_mapel']; ?>"><?= $dt_mpl['nama_mapel']; ?></option>
                                <?php } ?>
                            </select>
                            <?= form_error('id_mapel');  ?>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="id_kelas">Kelas Mengajar</label>
                            <select id="id_kelas" name="id_kelas" class="form-control">
                                <option selected>Pilih...</option>
                                <?php foreach ($get_data_kelas as $dt_kls) { ?>
                                    <option value="<?= $dt_kls['id_kelas']; ?>"><?= $dt_kls['nama_kelas']; ?></option>
                                <?php } ?>
                            </select>
                            <?= form_error('id_kelas');  ?>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="id_jurusan">Jurusan</label>
                            <select id="id_jurusan" name="id_jurusan" class="form-control">
                                <option selected>Pilih...</option>
                                <?php foreach ($get_data_jurusan as $dt_jrsn) { ?>
                                    <option value="<?= $dt_jrsn['id_jurusan']; ?>"><?= $dt_jrsn['nama_jurusan']; ?></option>
                                <?php } ?>
                            </select>
                            <?= form_error('id_jurusan');  ?>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="id_kategori_nilai">Jadwal Kategori</label>
                            <select id="id_kategori_nilai" name="id_kategori_nilai" class="form-control">
                                <option selected>Pilih...</option>
                                <?php foreach ($get_data_kategori as $dt_ktgr) { ?>
                                    <option value="<?= $dt_ktgr['id_kategori_nilai']; ?>"><?= $dt_ktgr['nama_kategori_nilai']; ?></option>
                                <?php } ?>
                            </select>
                            <?= form_error('id_kategori_nilai');  ?>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="tanggal_jadwal">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal_jadwal" name="tanggal_jadwal" placeholder="masukkan tanggal..">
                            <?= form_error('tanggal_jadwal');  ?>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="jam_jadwal_mulai">Jam dimulai</label>
                            <input type="time" class="form-control" id="jam_jadwal_mulai" name="jam_jadwal_mulai" placeholder="masukkan jam dimulai..">
                            <?= form_error('jam_jadwal_mulai');  ?>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="jam_jadwal_akhir">Jam diakhiri</label>
                            <input type="time" class="form-control" id="jam_jadwal_akhir" name="jam_jadwal_akhir" placeholder="masukkan jam diakhiri..">
                            <?= form_error('jam_jadwal_akhir');  ?>
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal edit master jadwal -->
<?php $no = 0;
foreach ($get_data_all_jadwal as $dt_all_jadwal) : $no++; ?>
    <div class="modal fade" id="editMasterJadwalMapel<?= $dt_all_jadwal['id_jadwal_mapel']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Jadwal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mr-3 ml-3">
                    <form action="<?= base_url() . 'Admin/updateJadwalMapel' ?>" method="POST">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="id_guru">Nama Guru</label>
                                <select id="id_guru" name="id_guru" class="form-control">
                                    <option value="<?= $dt_all_jadwal['id_guru']; ?>" selected><?= $dt_all_jadwal['nama_guru'] ?></option>
                                    <?php foreach ($get_data_guru as $dt_gr) {  ?>
                                        <option value="<?= $dt_gr['id_guru']; ?>"><?= $dt_gr['nama_guru']; ?></option>
                                    <?php } ?>
                                </select>
                                <?= form_error('id_guru');  ?>
                            </div>
                            <input type="hidden" name="id_jadwal_mapel" value="<?= $dt_all_jadwal['id_jadwal_mapel']; ?>">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="id_mapel">Mata Pelajaran</label>
                                <select id="id_mapel" name="id_mapel" class="form-control">
                                    <option value="<?= $dt_all_jadwal['id_mapel']; ?>" selected><?= $dt_all_jadwal['nama_mapel']; ?></option>
                                    <?php foreach ($get_data_mapel as $dt_mpl) { ?>
                                        <option value="<?= $dt_mpl['id_mapel']; ?>"><?= $dt_mpl['nama_mapel']; ?></option>
                                    <?php } ?>
                                </select>
                                <?= form_error('id_mapel');  ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="id_kelas">Kelas Mengajar</label>
                                <select id="id_kelas" name="id_kelas" class="form-control">
                                    <option value="<?= $dt_all_jadwal['id_kelas']; ?>" selected><?= $dt_all_jadwal['nama_kelas']; ?></option>
                                    <?php foreach ($get_data_kelas as $dt_kls) { ?>
                                        <option value="<?= $dt_kls['id_kelas']; ?>"><?= $dt_kls['nama_kelas']; ?></option>
                                    <?php } ?>
                                </select>
                                <?= form_error('id_kelas');  ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="id_jurusan">Jurusan</label>
                                <select id="id_jurusan" name="id_jurusan" class="form-control">
                                    <option value="<?= $dt_all_jadwal['id_jurusan']; ?>" selected><?= $dt_all_jadwal['nama_jurusan']; ?></option>
                                    <?php foreach ($get_data_jurusan as $dt_jrsn) { ?>
                                        <option value="<?= $dt_jrsn['id_jurusan']; ?>"><?= $dt_jrsn['nama_jurusan']; ?></option>
                                    <?php } ?>
                                </select>
                                <?= form_error('id_jurusan');  ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="id_kategori_nilai">Jadwal Kategori</label>
                                <select id="id_kategori_nilai" name="id_kategori_nilai" class="form-control">
                                    <option value="<?= $dt_all_jadwal['id_kategori_nilai']; ?>" selected><?= $dt_all_jadwal['nama_kategori_nilai']; ?></option>
                                    <?php foreach ($get_data_kategori as $dt_ktgr) { ?>
                                        <option value="<?= $dt_ktgr['id_kategori_nilai']; ?>"><?= $dt_ktgr['nama_kategori_nilai']; ?></option>
                                    <?php } ?>
                                </select>
                                <?= form_error('id_kategori_nilai');  ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="tanggal_jadwal">Tanggal</label>
                                <input type="date" class="form-control" id="tanggal_jadwal" value="<?= $dt_all_jadwal['tanggal_jadwal']; ?>" name="tanggal_jadwal" placeholder="masukkan tanggal..">
                                <?= form_error('tanggal_jadwal');  ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="jam_jadwal_mulai">Jam dimulai</label>
                                <input type="time" class="form-control" id="jam_jadwal_mulai" value="<?= $dt_all_jadwal['jam_jadwal_mulai']; ?>" name="jam_jadwal_mulai" placeholder="masukkan jam dimulai..">
                                <?= form_error('jam_jadwal_mulai');  ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="jam_jadwal_akhir">Jam diakhiri</label>
                                <input type="time" class="form-control" id="jam_jadwal_akhir" value="<?= $dt_all_jadwal['jam_jadwal_akhir']; ?>" name="jam_jadwal_akhir" placeholder="masukkan jam diakhiri..">
                                <?= form_error('jam_jadwal_akhir');  ?>
                            </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>