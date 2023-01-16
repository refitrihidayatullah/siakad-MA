<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- my css -->


    <link rel="stylesheet" href="<?php echo base_url('assets/css/') ?>style.css">
    <!-- my css -->



    <title>Nilai Siswa</title>
</head>




<body>
    <div class="container text-center">
        <img src="<?php echo base_url('assets/img/') ?>kop_ma.png" alt="" width="500" srcset="">

    </div>
    <div class=" mt-2 container text-center fw-bold ">
        <header class="tnr">
            LAPORAN HASIL BELAJAR <br> </header>
    </div>
    <div class="container tnr  ">
        <?php foreach ($data_siswa as $ds) {
        ?>
            <div class="row">
                <div class="col-3">
                    NAMA : <?php echo $ds['nama_siswa']; ?> <br>
                    KELAS : <?php echo $ds['nama_kelas']; ?><br>
                </div>
                <div class="col-3">
                    TGL LAHIR : <?php echo $ds['tanggal_lahir_siswa']; ?> <br>
                    JURUSAN : <?php echo $ds['nama_jurusan'];  ?> <br>
                </div>
            </div>
        <?php } ?>


        <div class="tnr container mt-4 mb-4 ml-6 mr-6">

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Mata Pelajaran</th>
                        <th scope="col">Nilai</th>
                        <th scope="col">Kategori</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($rekap_nilai as $rn) {

                    ?>
                        <tr>
                            <th scope="row"><?php echo $no++ ?></th>
                            <td><?php echo $rn['nama_mapel']; ?></td>
                            <td><?php echo $rn['nilai']; ?></td>
                            <td><?php echo $rn['nama_kategori_nilai']; ?></td>

                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <!-- </div> -->

    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>