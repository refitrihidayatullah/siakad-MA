<?php if ($this->session->flashdata('flash')) : ?>
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Anda <strong>Berhasil</strong> <?= $this->session->flashdata('flash'); ?>.
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
                Anda <strong>Sudah</strong> <?= $this->session->flashdata('flashs'); ?>.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php if ($this->session->flashdata('flashss')) : ?>
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Alasan keterlambatan <strong>Sudah</strong> <?= $this->session->flashdata('flashss'); ?>.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
<?php endif; ?>


<div class="row">
    <div class="col-md-12">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Halo, <?php
                    $waktu = gmdate("H:i", time() + 7 * 3600);
                    $t = explode(":", $waktu);
                    $jam = $t[0];
                    $menit = $t[1];

                    if ($jam >= 00 and $jam < 10) {
                        if ($menit > 00 and $menit < 60) {
                            $ucapan = "Selamat Pagi";
                        }
                    } else if ($jam >= 10 and $jam < 15) {
                        if ($menit > 00 and $menit < 60) {
                            $ucapan = "Selamat Siang";
                        }
                    } else if ($jam >= 15 and $jam < 18) {
                        if ($menit > 00 and $menit < 60) {
                            $ucapan = "Selamat Sore";
                        }
                    } else if ($jam >= 18 and $jam <= 24) {
                        if ($menit > 00 and $menit < 60) {
                            $ucapan = "Selamat Malam";
                        }
                    } else {
                        $ucapan = "Error";
                    }

                    echo $ucapan;

                    ?>

            <strong><?= $this->session->userdata('nama_siswa'); ?></strong> .
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
</div>

<div class="d-sm-flex align-items-center justify-content-start mb-4 flex-wrap">

    <!-- Earnings (Monthly) Card Example -->
    <?php foreach ($get_data_jadwal_mapel as $dt_jdwl_mpl) : ?>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Mapel : <?= $dt_jdwl_mpl['nama_mapel']; ?> </div>
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Guru : <?= $dt_jdwl_mpl['nama_guru']; ?> </div>
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                kelas : <?= $dt_jdwl_mpl['nama_kelas'];  ?> / <?= $dt_jdwl_mpl['nama_jurusan'];  ?> </div>
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                tanggal : <?= $dt_jdwl_mpl['tanggal_jadwal'];  ?> </div>
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                waktu : <?= $dt_jdwl_mpl['jam_jadwal_mulai'];  ?> - <?= $dt_jdwl_mpl['jam_jadwal_akhir'];  ?> </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>


                    <?php date_default_timezone_set('Asia/Jakarta');
                    if (date('Y-m-d') < $dt_jdwl_mpl['tanggal_jadwal'] || date('Y-m-d') > $dt_jdwl_mpl['tanggal_jadwal']) { ?>

                    <?php } ?>


                    <?php date_default_timezone_set('Asia/Jakarta');
                    if ($dt_jdwl_mpl['tanggal_jadwal'] == date('Y-m-d') && date('H:i:s') >= $dt_jdwl_mpl['jam_jadwal_mulai'] && date('H:i:s') <= $dt_jdwl_mpl['jam_jadwal_akhir']) { ?>
                        <?php
                        $id_siswa = $this->session->userdata('id_siswa');
                        $id_jadwal_mapel = $dt_jdwl_mpl['id_jadwal_mapel'];
                        $cek_absen = $this->db->query("SELECT * FROM tb_absen WHERE id_siswa = $id_siswa AND id_jadwal_mapel = $id_jadwal_mapel")->num_rows();

                        if ($cek_absen > 0) { ?>
                            <a href="#" class="btn btn-sm btn-success btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-check"></i>
                                </span>
                                <button class="btn btn-success btn-sm" class="text">Anda Sudah Absen!</button>
                            </a>
                        <?php } else { ?>
                            <div class="mb-0 mt-2 text-gray-800">
                                <form action="<?= base_url(); ?>Admin/func_absen_siswa" method="POST">
                                    <input type="hidden" name="tanggal_absen" value="<?= $dt_jdwl_mpl['tanggal_jadwal']; ?>">
                                    <input type="hidden" name="waktu_absen" value="<?= date('H:i:s'); ?>">
                                    <input type="hidden" name="id_siswa" value="<?= $this->session->userdata('id_siswa'); ?>">
                                    <input type="hidden" name="id_jadwal_mapel" value="<?= $dt_jdwl_mpl['id_jadwal_mapel']; ?>">
                                    <a href="#" class="btn btn-sm btn-primary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-info-circle"></i>
                                        </span>
                                        <button class="btn btn-primary btn-sm" class="text">Absen Sekarang!</button>
                                    </a>
                                </form>
                            </div>
                        <?php } ?>

                    <?php } else { ?>
                        <a href="#" class="btn btn-sm bg-gray-100 btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-info-circle"></i>
                            </span>
                            <button class="btn btn-grey btn-sm" class="text">Absen Tidak Tersedia!</button>
                        </a>
                        <?php
                        $id_siswa = $this->session->userdata('id_siswa');
                        $id_jadwal_mapel = $dt_jdwl_mpl['id_jadwal_mapel'];
                        $cek_absen = $this->db->query("SELECT * FROM tb_absen WHERE id_siswa = $id_siswa AND id_jadwal_mapel = $id_jadwal_mapel")->num_rows();


                        if ($cek_absen <= 0) { ?>
                            <form action="<?= base_url(); ?>Admin/func_tidak_absen_siswa" method="POST">
                                <input type="hidden" name="tanggal_absen" value="<?= $dt_jdwl_mpl['tanggal_jadwal']; ?>">
                                <input type="hidden" name="waktu_absen" value="<?= date('H:i:s'); ?>">
                                <input type="hidden" name="id_siswa" value="<?= $this->session->userdata('id_siswa'); ?>">
                                <input type="hidden" name="id_jadwal_mapel" value="<?= $dt_jdwl_mpl['id_jadwal_mapel']; ?>">


                                <div class="form-group">
                                    <label for="alasanTerlambat">Alasan Terlambat</label>
                                    <select class="form-control" name="alasanTerlambat" id="alasanTerlambat">
                                        <option value="alpha">Alpha</option>
                                        <option value="sakit">Sakit</option>
                                        <option value="ijin">Ijin</option>
                                        <option value="lupa presensi">Lupa Presensi</option>
                                        <option value="jaringan buruk">Jaringan Buruk</option>
                                        <option value="alasan lainnya">Alasan Lainnya</option>
                                    </select>
                                </div>

                                <a href="#" class="btn btn-sm btn-danger btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-info-circle"></i>
                                    </span>
                                    <button class="btn btn-danger btn-sm" class="text">Absen Terlambat!</button>
                                </a>
                            </form>
                        <?php } else { ?>
                            <a href="#" class="btn btn-sm bg-gray-100 btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-info-circle"></i>
                                </span>
                                <button class="btn btn-grey btn-sm" class="text">Anda Sudah Absen!</button>
                            </a>
                        <?php  } ?>

                    <?php } ?>

                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<div class="d-sm-flex align-items-center  mb-4">
    <div class="card shadow mb-4 w-100">
        <div class="card-header py-3 d-sm-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Riwayat Absen <?= $this->session->userdata('nama_siswa'); ?></h6>
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
                        <?php foreach ($data_absen_siswa_ById as $dt_absn_siswaById) { ?>
                            <tr>
                                <td><?= $dt_absn_siswaById['tanggal_absen']; ?></td>
                                <td><?= $dt_absn_siswaById['nama_siswa']; ?></td>
                                <td><?= $dt_absn_siswaById['nama_kelas']; ?></td>
                                <td><?= $dt_absn_siswaById['nama_jurusan']; ?></td>
                                <td><?= $dt_absn_siswaById['nama_mapel']; ?></td>
                                <td><?= $dt_absn_siswaById['jam_jadwal_mulai']; ?>-<?= $dt_absn_siswaById['jam_jadwal_akhir']; ?></td>
                                <td><?= $dt_absn_siswaById['waktu_absen']; ?></td>
                                <td>
                                    <?php if ($dt_absn_siswaById['status_absen'] == 1) { ?>
                                        <span class="badge badge-success ml-4">Hadir</span>
                                    <?php } else { ?>
                                        <span class="badge badge-danger ml-4">Tidak Hadir</span>
                                        <span class="badge badge-info ml-4">#<?= $dt_absn_siswaById['keterangan']; ?></span>
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