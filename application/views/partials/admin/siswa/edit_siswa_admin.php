<div class="card">
    <div class="card-header bg-primary text-white">
        Form Pendaftaran Siswa
    </div>
    <div class="card-body">
        <form method="POST" action="<?php echo base_url('index.php/admin/updateSiswa') ?>">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nama_siswa">Nama</label>
                    <input type="hidden" class="form-control" id="nama_siswa" value="<?= $siswa_ById->{'id_siswa'}; ?>" name="id_siswa" placeholder="masukkan nama siswa.." required>
                    <input type="text" class="form-control" id="nama_siswa" value="<?= $siswa_ById->{'nama_siswa'}; ?>" name="nama_siswa" placeholder="masukkan nama siswa.." required>
                    <?= form_error('nama_siswa');  ?>
                </div>
                <div class="form-group col-md-6">
                    <label for="nis_siswa">Nis</label>
                    <input type="number" class="form-control" id="nis_siswa" value="<?= $siswa_ById->{'nis_siswa'}; ?>" name="nis_siswa" placeholder="masukkan nis siswa.." required>
                    <?= form_error('nis_siswa');  ?>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="email_siswa">Email</label>
                    <input type="email" class="form-control" id="email_siswa" value="<?= $siswa_ById->{'email_siswa'}; ?>" name="email_siswa" placeholder="masukkan email siswa.." required>
                    <?= form_error('email_siswa');  ?>
                </div>
                <!-- <div class="form-group col-md-6">
                        <label for="password_siswa">Password</label>
                        <input type="password" class="form-control" id="password_siswa" name="password_siswa" placeholder="masukkan password siswa..">
                    </div> -->
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="tempat_lahir_siswa">Tempat Lahir</label>
                    <input type="text" class="form-control" id="tempat_lahir_siswa" value="<?= $siswa_ById->{'tempat_lahir_siswa'}; ?>" name="tempat_lahir_siswa" placeholder="tempat lahir.." required>
                    <?= form_error('tempat_lahir_siswa');  ?>
                </div>

                <div class="form-group col-md-6">
                    <label for="tanggal_lahir_siswa">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tanggal_lahir_siswa" value="<?= $siswa_ById->{'tanggal_lahir_siswa'}; ?>" name="tanggal_lahir_siswa">
                    <?= form_error('tanggal_lahir_siswa');  ?>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="jenis_kelamin_siswa">Jenis Kelamin</label>
                    <select id="jenis_kelamin_siswa" name="jenis_kelamin_siswa" class="form-control">
                        <option value="<?= $data_jenis_kelamin_By_Id->{'jenis_kelamin_siswa'}; ?>" selected><?= $data_jenis_kelamin_By_Id->{'jenis_kelamin_siswa'}; ?></option>
                        <option value="LAKI-LAKI">LAKI-LAKI</option>
                        <option value="PEREMPUAN">PEREMPUAN</option>
                    </select>
                    <?= form_error('jenis_kelamin_siswa');  ?>
                </div>
                <div class="form-group col-md-4">
                    <label for="id_kelas">kelas</label>
                    <select id="id_kelas" name="id_kelas" class="form-control">
                        <option value="<?= $data_kelas_By_Id->{'id_kelas'}; ?>" selected><?= $data_kelas_By_Id->{'nama_kelas'}; ?></option>
                        <?php foreach ($data_kelas as $dt_kls) { ?>
                            <option value="<?= $dt_kls['id_kelas']; ?>"><?= $dt_kls['nama_kelas']; ?></option>
                        <?php } ?>
                    </select>
                    <?= form_error('id_kelas');  ?>
                </div>
                <div class="form-group col-md-4">
                    <label for="jurusan">Jurusan</label>
                    <select id="id_jurusan" name="id_jurusan" class="form-control">
                        <option value="<?= $data_jurusan_By_Id->{'nama_jurusan'}; ?>" selected><?= $data_jurusan_By_Id->{'nama_jurusan'}; ?></option>
                        <?php foreach ($get_jurusan as $jrsn) { ?>
                            <option value="<?= $jrsn['id_jurusan']; ?>"><?= $jrsn['nama_jurusan']; ?></option>
                        <?php } ?>
                    </select>
                    <?= form_error('id_jurusan');  ?>
                </div>
            </div>

            <div class="form-group">
                <label for="alamat_siswa">Alamat</label>
                <input type="text" class="form-control" id="alamat_siswa" value="<?= $siswa_ById->{'alamat_siswa'}; ?>" name="alamat_siswa" placeholder="alamat.." required>
                <?= form_error('alamat_siswa');  ?>
            </div>
            <hr>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="<?= base_url(); ?>Admin/RegisterSiswa" type="submit" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>