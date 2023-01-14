<div class="card">
    <div class="card-header bg-primary text-white">
        Form Pendaftaran Siswa
    </div>
    <div class="card-body">
        <form method="POST" action="<?php echo base_url('Admin/func_tambah_siswa') ?>">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nama_siswa">Nama</label>
                    <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" placeholder="masukkan nama siswa..">
                    <?= form_error('nama_siswa');  ?>
                </div>
                <div class="form-group col-md-6">
                    <label for="nis_siswa">Nis</label>
                    <input type="text" class="form-control" id="nis_siswa" name="nis_siswa" maxlength="10" placeholder="masukkan nis siswa..">
                    <?= form_error('nis_siswa');  ?>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="email_siswa">Email</label>
                    <input type="email" class="form-control" id="email_siswa" name="email_siswa" placeholder="masukkan email siswa..">
                    <?= form_error('email_siswa');  ?>
                </div>
                <div class="form-group col-md-6">
                    <label for="password_siswa">Password</label>
                    <input type="password" class="form-control" id="password_siswa" name="password_siswa" placeholder="masukkan password siswa..">
                    <?= form_error('password_siswa');  ?>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="tempat_lahir_siswa">Tempat Lahir</label>
                    <input type="text" class="form-control" id="tempat_lahir_siswa" name="tempat_lahir_siswa" placeholder="tempat lahir..">
                    <?= form_error('tempat_lahir_siswa');  ?>
                </div>

                <div class="form-group col-md-6">
                    <label for="tanggal_lahir_siswa">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tanggal_lahir_siswa" name="tanggal_lahir_siswa">
                    <?= form_error('tanggal_lahir_siswa');  ?>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="jenis_kelamin_siswa">Jenis Kelamin</label>
                    <select id="jenis_kelamin_siswa" name="jenis_kelamin_siswa" class="form-control">
                        <option selected>Pilih...</option>
                        <option value="LAKI-LAKI">LAKI-LAKI</option>
                        <option value="PEREMPUAN">PEREMPUAN</option>
                    </select>
                    <?= form_error('jenis_kelamin_siswa');  ?>
                </div>
                <div class="form-group col-md-4">
                    <label for="id_kelas">kelas</label>
                    <select id="id_kelas" name="id_kelas" class="form-control">
                        <option selected>Pilih...</option>
                        <?php foreach ($get_kelas as $get_kls) { ?>
                            <option value="<?= $get_kls['id_kelas']; ?>"><?= $get_kls['nama_kelas']; ?></option>
                        <?php } ?>
                    </select>
                    <?= form_error('id_kelas');  ?>
                </div>
                <div class="form-group col-md-4">
                    <label for="jurusan">Jurusan</label>
                    <select id="id_jurusan" name="id_jurusan" class="form-control">
                        <option selected>Pilih...</option>
                        <?php foreach ($get_jurusan as $get_jrsn) { ?>
                            <option value="<?= $get_jrsn['id_jurusan']; ?>"><?= $get_jrsn['nama_jurusan']; ?></option>
                        <?php } ?>
                    </select>
                    <?= form_error('id_jurusan');  ?>
                </div>
            </div>

            <div class="form-group">
                <label for="alamat_siswa">Alamat</label>
                <input type="text" class="form-control" id="alamat_siswa" name="alamat_siswa" placeholder="alamat..">
                <?= form_error('alamat_siswa');  ?>
            </div>

            <input type="hidden" class="form-control" id="id_hak_akses" value="<?= $get_role->{'id_hak_akses'}; ?>" name="id_hak_akses">
            <?= form_error('id_hak_akses');  ?>

            <hr>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="<?= base_url(); ?>Admin/RegisterSiswa" type="submit" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>