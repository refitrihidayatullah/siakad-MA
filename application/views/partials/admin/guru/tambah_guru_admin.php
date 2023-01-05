<div class="card">
    <div class="card-header bg-primary text-white">
        Form Pendaftaran Guru
    </div>
    <div class="card-body">

        <form action="func_tambah_guru" method="POST">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nip_guru">NIP</label>
                    <input type="text" class="form-control" id="nip_guru" name="nip_guru" maxlength="16" placeholder="masukkan nip guru..">
                </div>
                <div class="form-group col-md-6">
                    <label for="nama_guru">Nama</label>
                    <input type="text" class="form-control" id="nama_guru" name="nama_guru" placeholder="masukkan nama guru..">
                    <h1><?= form_error('nama_guru');  ?></h1>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="email_guru">Email</label>
                    <input type="email" class="form-control" id="email_guru" name="email_guru" placeholder="masukkan email guru..">
                </div>
                <div class="form-group col-md-6">
                    <label for="password_guru">Password</label>
                    <input type="password" class="form-control" id="password_guru" name="password_guru" placeholder="masukkan password guru..">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="tempat_lahir_guru">Tempat Lahir</label>
                    <input type="text" class="form-control" id="tempat_lahir_guru" name="tempat_lahir_guru" placeholder="tempat lahir..">
                </div>

                <div class="form-group col-md-6">
                    <label for="tanggal_lahir_guru">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tanggal_lahir_guru" name="tanggal_lahir_guru">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="jenis_kelamin_guru">Jenis Kelamin</label>
                    <select id="jenis_kelamin_guru" name="jenis_kelamin_guru" class="form-control">
                        <option selected>Pilih...</option>
                        <option value="LAKI-LAKI">LAKI-LAKI</option>
                        <option value="PEREMPUAN">PEREMPUAN</option>
                    </select>
                </div>
                <div class="form-group col-md-8">
                    <label for="alamat_guru">Alamat</label>
                    <input type="text" class="form-control" id="alamat_guru" name="alamat_guru" placeholder="alamat..">
                </div>

            </div>
            <div class="form-group col-md-4">
                <label for="id_hak_akses">Role</label>
                <input type="number" class="form-control" value="<?= $get_role->{'id_hak_akses'}; ?>" id="id_hak_akses" name="id_hak_akses">
            </div>
            <hr>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="<?= base_url(); ?>Admin/RegisterSiswa" type="submit" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>