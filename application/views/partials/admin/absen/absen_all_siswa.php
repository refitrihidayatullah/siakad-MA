<div class="d-sm-flex align-items-center  mb-4">
    <div class="card shadow mb-4 w-100">
        <div class="card-header py-3 d-sm-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Riwayat Absen Siswa</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Jurusan</th>
                            <th>Mata Pelajaran</th>
                            <th>Jam</th>
                            <th>Waktu Absen</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data_absen_all_siswa as $dt_absn_all_siswa) { ?>
                            <tr>
                                <td><?= $dt_absn_all_siswa['tanggal_absen']; ?></td>
                                <td><?= $dt_absn_all_siswa['nama_siswa']; ?></td>
                                <td><?= $dt_absn_all_siswa['nama_kelas']; ?></td>
                                <td><?= $dt_absn_all_siswa['nama_jurusan']; ?></td>
                                <td><?= $dt_absn_all_siswa['nama_mapel']; ?></td>
                                <td><?= $dt_absn_all_siswa['jam_jadwal_mulai']; ?>-<?= $dt_absn_all_siswa['jam_jadwal_akhir']; ?></td>
                                <td><?= $dt_absn_all_siswa['waktu_absen']; ?></td>
                                <td>
                                    <?php if ($dt_absn_all_siswa['status_absen'] == 1) { ?>
                                        <span class="badge badge-success ml-4">Hadir</span>
                                    <?php } else { ?>
                                        <span class="badge badge-danger ml-4">Tidak Hadir</span>
                                        <span class="badge badge-info ml-4">#<?= $dt_absn_all_siswa['keterangan']; ?></span>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>