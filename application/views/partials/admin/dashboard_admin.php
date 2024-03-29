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

            <strong><?= $this->session->userdata('nama_guru'); ?></strong> .
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
</div>



<!-- Content Row -->

<!-- <div class="row"> -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Siswa</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?= $dashboard_data_siswa; ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Total Guru</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $dashboard_data_guru; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-chalkboard-teacher fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Mapel
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $dashboard_data_mapel; ?></div>
                            </div>
                            <!-- <div class="col">
                                <div class="progress progress-sm mr-2">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-book fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Total Pengguna</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?= $dashboard_data_guru + $dashboard_data_siswa ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>


<!-- </div> -->