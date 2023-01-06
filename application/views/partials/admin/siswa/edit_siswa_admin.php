<div class="card">
    <div class="card-header bg-primary text-white">
        Form Pendaftaran Siswa
    </div>
    <div class="card-body">
        <form method="POST" action="<?php echo base_url('index.php/admin/updateSiswa') ?>">
            <?php foreach ($siswa as $sw) {
                var_dump($sw);
            ?>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nama_siswa">Nama</label>
                        <input type="hidden" class="form-control" id="nama_siswa" value="<?php echo htmlspecialchars($sw->id_siswa) ?>" name="id_siswa" placeholder="masukkan nama siswa.." required>
                        <input type="text" class="form-control" id="nama_siswa" value="<?php echo htmlspecialchars($sw->nama_siswa) ?>" name="nama_siswa" placeholder="masukkan nama siswa.." required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="nis_siswa">Nis</label>
                        <input type="number" class="form-control" id="nis_siswa" value="<?php echo htmlspecialchars($sw->nis_siswa) ?>" name="nis_siswa" placeholder="masukkan nis siswa.." required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="email_siswa">Email</label>
                        <input type="email" class="form-control" id="email_siswa" value="<?php echo htmlspecialchars($sw->email_siswa) ?>" name="email_siswa" placeholder="masukkan email siswa.." required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="password_siswa">Password</label>
                        <input type="password" class="form-control" id="password_siswa" name="password_siswa" placeholder="masukkan password siswa..">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="tempat_lahir_siswa">Tempat Lahir</label>
                        <input type="text" class="form-control" id="tempat_lahir_siswa" value="<?php echo htmlspecialchars($sw->tempat_lahir_siswa) ?>" name="tempat_lahir_siswa" placeholder="tempat lahir.." required>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="tanggal_lahir_siswa">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir_siswa" value="<?php echo htmlspecialchars($sw->tanggal_lahir_siswa) ?>" name="tanggal_lahir_siswa">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="jenis_kelamin_siswa">Jenis Kelamin</label>
                        <select id="jenis_kelamin_siswa" name="jenis_kelamin_siswa" class="form-control">
                            <option selected>Pilih...</option>
                            <option value="LAKI-LAKI">L</option>
                            <option value="PEREMPUAN">P</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="id_kelas">kelas</label>
                        <select id="id_kelas" name="id_kelas" class="form-control">
                            <option selected>Pilih...</option>
                            <option>x pa</option>
                            <option>x p1</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="jurusan">Jurusan</label>
                        <select id="jurusan" name="jurusan" class="form-control">
                            <option selected>Pilih...</option>
                            <option>IPA</option>
                            <option>IPS</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="alamat_siswa">Alamat</label>
                    <input type="text" class="form-control" id="alamat_siswa" name="alamat_siswa" placeholder="alamat.." required>
                </div>
                <hr>
            <?php } ?>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="<?= base_url(); ?>Admin/RegisterSiswa" type="submit" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>