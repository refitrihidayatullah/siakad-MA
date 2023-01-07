<div class="card">
    <div class="card-header bg-primary text-white">
        Form Edit Pendaftaran Guru
    </div>
    <div class="card-body">

        <form action="<?= base_url(); ?>Admin/func_edit_guru" method="POST">
            <div class="form-row">
                <input type="hidden" name="id_guru" value="<?= $getDataGuruById->{'id_guru'}; ?>">

                <div class="form-group col-md-6">
                    <label for="nip_guru">NIP</label>
                    <input type="text" class="form-control" id="nip_guru" value="<?= $getDataGuruById->{'nip_guru'}; ?>" name="nip_guru" maxlength="16" placeholder="masukkan nip guru..">

                    <?= form_error('nip_guru');  ?>

                </div>
                <div class="form-group col-md-6">
                    <label for="nama_guru">Nama</label>
                    <input type="text" class="form-control" id="nama_guru" value="<?= $getDataGuruById->{'nama_guru'}; ?>" name="nama_guru" placeholder="masukkan nama guru..">

                    <?= form_error('nama_guru');  ?>

                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="email_guru">Email</label>
                    <input type="email" class="form-control" id="email_guru" value="<?= $getDataGuruById->{'email_guru'}; ?>" name=" email_guru" placeholder="masukkan email guru..">

                    <?= form_error('email_guru');  ?>

                </div>
                <!-- <div class="form-group col-md-6">
                    <label for="password_guru">Password</label>
                    <input type="password" class="form-control" id="password_guru" value="<?= $getDataGuruById->{'password_guru'}; ?>" name=" password_guru" placeholder="masukkan password guru..">

                  

                </div> -->
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="tempat_lahir_guru">Tempat Lahir</label>
                    <input type="text" class="form-control" id="tempat_lahir_guru" value="<?= $getDataGuruById->{'tempat_lahir_guru'}; ?>" name=" tempat_lahir_guru" placeholder="tempat lahir..">

                    <?= form_error('tempat_lahir_guru');  ?>

                </div>

                <div class="form-group col-md-6">
                    <label for="tanggal_lahir_guru">Tanggal Lahir</label>
                    <input type="date" class="form-control" value="<?= $getDataGuruById->{'tanggal_lahir_guru'}; ?>" id=" tanggal_lahir_guru" name="tanggal_lahir_guru">

                    <?= form_error('tanggal_lahir_guru');  ?>

                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="jenis_kelamin_guru">Jenis Kelamin</label>
                    <select id="jenis_kelamin_guru" name="jenis_kelamin_guru" class="form-control">
                        <option value="<?= $getDataGuruById->{'jenis_kelamin_guru'}; ?>" selected><?= $getDataGuruById->{'jenis_kelamin_guru'}; ?></option>
                        <option value="LAKI-LAKI">LAKI-LAKI</option>
                        <option value="PEREMPUAN">PEREMPUAN</option>
                    </select>

                    <?= form_error('jenis_kelamin_guru');  ?>

                </div>

                <div class="form-group col-md-8">
                    <label for="alamat_guru">Alamat</label>
                    <input type="text" class="form-control" value="<?= $getDataGuruById->{'alamat_guru'}; ?>" id=" alamat_guru" name="alamat_guru" placeholder="alamat..">

                    <?= form_error('alamat_guru');  ?>

                </div>

            </div>
            <div class="form-group col-md-4">
                <input type="hidden" class="form-control" value="<?= $getDataGuruById->{'id_hak_akses'}; ?>" id=" id_hak_akses" name="id_hak_akses">
            </div>
            <hr>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="<?= base_url(); ?>Admin/RegisterGuru" type="submit" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>