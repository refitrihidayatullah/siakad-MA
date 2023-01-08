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

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div class="col-md-3 col-md-6">
        <div class="card ">
            <div class="d-sm-flex justify-content-between">
                <h5 class="card-header rounded-0 bg-gradient-primary text-white col-md-6">Master Kelas</h5>
                <div class="col-md-6 bg-gradient-primary rounded-0 text-white d-flex justify-content-end">
                    <button type="button" class="btn btn-success btn-sm align-self-center btn-circle mr-4" data-toggle="modal" data-target="#addMasterKelas">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <table id="" class=" display1" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kelas</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($getDataKelas as $kls) {  ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $kls['nama_kelas']; ?></td>
                                <td>
                                    <div class=" d-flex justify-content-start">
                                        <button type="button" class="btn btn-warning btn-sm btn-circle mr-4" data-toggle="modal" data-target="#editMasterKelas<?= $kls['id_kelas']; ?>">
                                            <i class="fas fa-pencil-alt"></i>
                                        </button>
                                        <a href="<?= base_url(); ?>Admin/deleteMasterKelas/<?= $kls['id_kelas']; ?>" class="btn btn-danger btn-sm btn-circle mr-4" onclick="return confirm('Apakah Anda Yakin Akan Menghapus?');">
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
    <div class="col-md-3 col-md-6">
        <div class="card">
            <div class="d-sm-flex justify-content-between">
                <h5 class="card-header rounded-0 bg-gradient-primary text-white col-md-6">Master Jurusan</h5>
                <div class="col-md-6 bg-gradient-primary rounded-0 text-white d-flex justify-content-end">
                    <button type="button" class="btn btn-success btn-sm align-self-center btn-circle mr-4" data-toggle="modal" data-target="#addMasterJurusan">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <table id="" class=" display2" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jurusan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($getDataJurusan as $jrsn) :   ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $jrsn['nama_jurusan']; ?></td>
                                <td>
                                    <div class=" d-flex justify-content-start">
                                        <button type="button" class="btn btn-warning btn-sm btn-circle mr-4" data-toggle="modal" data-target="#editMasterJurusan<?= $jrsn['id_jurusan']; ?>">
                                            <i class="fas fa-pencil-alt"></i>
                                        </button>
                                        <a href="<?= base_url(); ?>Admin/deleteMasterJurusan/<?= $jrsn['id_jurusan']; ?>" class="btn btn-danger btn-sm btn-circle mr-4" onclick="return confirm('Apakah Anda Yakin Akan Menghapus?');">
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



<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div class="col-md-3 col-md-6">
        <div class="card ">
            <div class="d-sm-flex justify-content-between">
                <h5 class="card-header rounded-0 bg-gradient-primary text-white col-md-6">Master Kategori Nilai</h5>
                <div class="col-md-6 bg-gradient-primary rounded-0 text-white d-flex justify-content-end">
                    <button type="button" class="btn btn-success btn-sm align-self-center btn-circle mr-4" data-toggle="modal" data-target="#addMasterKategoriNilai">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <table id="" class=" display3" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Ketegori Penilaian</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($getDataKategoriNilai as $katNilai) :   ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $katNilai['nama_kategori_nilai']; ?></td>
                                <td>
                                    <div class=" d-flex justify-content-start">
                                        <button type="button" class="btn btn-warning btn-sm btn-circle mr-4" data-toggle="modal" data-target="#editMasterKategoriNilai<?= $katNilai['id_kategori_nilai']; ?>">
                                            <i class="fas fa-pencil-alt"></i>
                                        </button>
                                        <a href="<?= base_url(); ?>Admin/deleteMasterKategoriNilai/<?= $katNilai['id_kategori_nilai']; ?>" class="btn btn-danger btn-sm btn-circle mr-4" onclick="return confirm('Apakah Anda Yakin Akan Menghapus?');">
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
    <div class="col-md-3 col-md-6">
        <div class="card">
            <div class="d-sm-flex justify-content-between">
                <h5 class="card-header rounded-0 bg-gradient-primary text-white col-md-6">Master Mata Pelajaran</h5>
                <div class="col-md-6 bg-gradient-primary rounded-0 text-white d-flex justify-content-end">
                    <button type="button" class="btn btn-success btn-sm align-self-center btn-circle mr-4" data-toggle="modal" data-target="#addMasterMapel">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <table id="" class=" display4" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Mata Pelajaran</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($getDataMapel as $mpl) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $mpl['nama_mapel']; ?></td>
                                <td>
                                    <div class=" d-flex justify-content-start">
                                        <button type="button" class="btn btn-warning btn-sm btn-circle mr-4" data-toggle="modal" data-target="#editMasterMapel<?= $mpl['id_mapel']; ?>">
                                            <i class="fas fa-pencil-alt"></i>
                                        </button>
                                        <a href="<?= base_url(); ?>Admin/deleteMasterMapel/<?= $mpl['id_mapel']; ?>" class="btn btn-danger btn-sm btn-circle mr-4" onclick="return confirm('Apakah Anda Yakin Akan Menghapus?');">
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


<!-- Modal add master kelas -->
<div class="modal fade" id="addMasterKelas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Kelas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mr-3 ml-3">
                <form action="<?= base_url() . 'Admin/tambahKelas' ?>" method="POST">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="nama_kelas">Nama Kelas</label>
                            <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" placeholder="masukkan nama kelas..">
                            <?= form_error('nama_kelas');  ?>
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

<!-- Modal edit master kelas -->
<?php $no = 0;
foreach ($getDataKelas as $kls) : $no++;  ?>
    <div class="modal fade" id="editMasterKelas<?php echo $kls['id_kelas']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Kelas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mr-3 ml-3">
                    <form method="POST" action="<?php echo base_url() . 'Admin/updateKelas/' ?>">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <input type="hidden" name="id_kelas" value="<?php echo $kls['id_kelas']; ?>">
                                <label for="nama_kelas">Nama Kelas</label>
                                <input type="text" class="form-control" id="nama_kelas" value="<?php echo $kls['nama_kelas']; ?>" name="nama_kelas" placeholder="masukkan nama kelas..">
                                <?= form_error('nama_kelas');  ?>
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



<!-- Modal add master jurusan -->
<div class="modal fade" id="addMasterJurusan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Jurusan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mr-3 ml-3">
                <form action="<?= base_url() . 'Admin/tambahJurusan' ?>" method="POST">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="nama_jurusan">Nama Jurusan</label>
                            <input type="text" class="form-control" id="nama_jurusan" name="nama_jurusan" placeholder="masukkan nama jurusan..">
                            <?= form_error('nama_jurusan');  ?>
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


<!-- Modal edit master Jurusan -->
<?php $no = 0;
foreach ($getDataJurusan as $jrsn) : $no++;  ?>
    <div class="modal fade" id="editMasterJurusan<?php echo $jrsn['id_jurusan']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Jurusan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mr-3 ml-3">
                    <form method="POST" action="<?php echo base_url() . 'Admin/updateJurusan/' ?>">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <input type="hidden" name="id_jurusan" value="<?php echo $jrsn['id_jurusan']; ?>">
                                <label for="nama_jurusan">Nama Jurusan</label>
                                <input type="text" class="form-control" id="nama_jurusan" value="<?php echo $jrsn['nama_jurusan']; ?>" name="nama_jurusan" placeholder="masukkan nama jurusan..">
                                <?= form_error('nama_jurusan');  ?>
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



<!-- Modal add master kategori nilai -->
<div class="modal fade" id="addMasterKategoriNilai" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori Nilai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mr-3 ml-3">
                <form action="<?= base_url() . 'Admin/tambahKategoriNilai' ?>" method="POST">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="nama_kategori_nilai">Nama Kategori Nilai</label>
                            <input type="text" class="form-control" id="nama_kategori_nilai" name="nama_kategori_nilai" placeholder="masukkan nama kategori nilai..">
                            <?= form_error('nama_kategori_nilai');  ?>
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


<!-- Modal edit master Kategori Nilai -->
<?php $no = 0;
foreach ($getDataKategoriNilai as $katNilai) : $no++;  ?>
    <div class="modal fade" id="editMasterKategoriNilai<?php echo $katNilai['id_kategori_nilai']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Kategori Nilai</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mr-3 ml-3">
                    <form method="POST" action="<?php echo base_url() . 'Admin/updateKategoriNilai/' ?>">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <input type="hidden" name="id_kategori_nilai" value="<?php echo $katNilai['id_kategori_nilai']; ?>">
                                <label for="nama_jurusan">Nama Jurusan</label>
                                <input type="text" class="form-control" id="nama_kategori_nilai" value="<?php echo $katNilai['nama_kategori_nilai']; ?>" name="nama_kategori_nilai" placeholder="masukkan nama jurusan..">
                                <?= form_error('nama_kategori_nilai');  ?>
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


<!-- Modal add master Mapel -->
<div class="modal fade" id="addMasterMapel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Mata Pelajaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mr-3 ml-3">
                <form action="<?= base_url() . 'Admin/tambahMapel' ?>" method="POST">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="nama_mapel">Nama Mata Pelajaran</label>
                            <input type="text" class="form-control" id="nama_mapel" name="nama_mapel" placeholder="masukkan mata pelajaran..">
                            <?= form_error('nama_mapel');  ?>
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

<!-- Modal editMasterMapel -->
<?php $no = 0;
foreach ($getDataMapel as $mpl) : $no++;  ?>
    <div class="modal fade" id="editMasterMapel<?php echo $mpl['id_mapel']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Mata Pelajaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mr-3 ml-3">
                    <form method="POST" action="<?php echo base_url() . 'Admin/updateMapel/' ?>">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <input type="hidden" name="id_mapel" value="<?php echo $mpl['id_mapel']; ?>">
                                <label for="nama_mapel">Nama Mata Pelajaran</label>
                                <input type="text" class="form-control" id="nama_mapel" value="<?php echo $mpl['nama_mapel']; ?>" name="nama_mapel" placeholder="masukkan mata pelajaran..">
                                <?= form_error('nama_mapel');  ?>
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