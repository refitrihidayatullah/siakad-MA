<div class="d-sm-flex align-items-center  mb-4">

    <div class="card shadow mb-4 w-100">
        <div class="card-header py-3 d-sm-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Data Penilaian Siswa</h6>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>NIS</th>
                            <th>Nama Siswa</th>
                            <th>Jenis Kelamin</th>
                            <th>Kelas</th>
                            <th>Jurusan</th>
                            <th>Detail Penilaian</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php foreach ($siswa as $sw) {
                            ?>

                                <td><?php echo $sw['nis_siswa']; ?></td>
                                <td><?php echo $sw['nama_siswa']; ?></td>
                                <td><?php echo $sw['jenis_kelamin_siswa']; ?></td>
                                <td><?php echo $sw['nama_kelas']; ?></td>
                                <td><?php echo $sw['nama_jurusan']; ?></td>
                                <td>
                                    <a href="<?php echo base_url('admin/lihatRekapNIlai/') . $sw['id_siswa']; ?>" class="btn btn-primary btn-sm btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-eye"></i>
                                        </span>
                                        <span class="text">Lihat Penilaian</span>
                                    </a>

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