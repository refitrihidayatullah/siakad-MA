<div class="d-sm-flex align-items-center  mb-4">

    <div class="card shadow mb-4 w-100">
        <div class="alert alert-primary mb-2" role="alert">


            <div class="container">
                <div class="row">
                    <?php foreach ($data_siswa as $ds) { ?>
                        <div class="col">
                            <span class="text-uppercase font-weight-bold">Nama Siswa :</span> <span class="text-uppercase"> <?php echo $ds['nama_siswa']; ?></span> <br>
                            <span class="text-uppercase font-weight-bold"> Kelas : </span> <span class="text-uppercase"> <?php echo $ds['nama_kelas']; ?> </span> <br>
                        </div>
                        <div class="col">
                            <span class="text-uppercase font-weight-bold"> Tanggal Lahir : </span> <span class="text-uppercase"> <?php echo $ds['tanggal_lahir_siswa']; ?> </span> <br>
                            <span class="text-uppercase font-weight-bold"> Jurusan : </span> <span class="text-uppercase"> <?php echo $ds['nama_jurusan']; ?> </span> <br>
                        </div>

                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="card-header py-3 d-sm-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Rekap Penilaian</h6>
            <a href="<?= base_url(); ?>Admin/eksporRekapNilai/<?= $ds['id_siswa']; ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Mata Pelajaran</th>
                            <th>Nilai</th>
                            <th>Kategori Nilai</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($rekap_nilai as $nilai) {
                            # code...
                        ?>
                            <tr>

                                <td><?php echo $nilai['nama_mapel']; ?></td>
                                <td><?php echo $nilai['nilai']; ?></td>
                                <td><?php echo $nilai['nama_kategori_nilai']; ?></td>

                            </tr>
                        <?php } ?>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal edit penilaian Siswa -->