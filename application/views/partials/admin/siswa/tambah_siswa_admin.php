<div class="card">
    <div class="card-header bg-primary text-white">
        Form Pendaftaran Siswa
    </div>
    <div class="card-body">
        <form>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nama_siswa">Nama</label>
                    <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" placeholder="masukkan nama siswa.." required>
                </div>
                <div class="form-group col-md-6">
                    <label for="nis_siswa">Nis</label>
                    <input type="number" class="form-control" id="nis_siswa" name="nis_siswa" placeholder="masukkan nis siswa.." required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="email_siswa">Email</label>
                    <input type="email" class="form-control" id="email_siswa" name="email_siswa" placeholder="masukkan email siswa.." required>
                </div>
                <div class="form-group col-md-6">
                    <label for="password_siswa">Password</label>
                    <input type="password" class="form-control" id="password_siswa" name="password_siswa" placeholder="masukkan password siswa.." required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="tempat_lahir_siswa">Tempat Lahir</label>
                    <input type="text" class="form-control" id="tempat_lahir_siswa" name="tempat_lahir_siswa" placeholder="tempat lahir.." required>
                </div>

                <div class="form-group col-md-6">
                    <label for="tanggal_lahir_siswa">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tanggal_lahir_siswa" name="tanggal_lahir_siswa">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="jenis_kelamin_siswa">Jenis Kelamin</label>
                    <select id="jenis_kelamin_siswa" name="jenis_kelamin_siswa" class="form-control">
                        <option selected>Pilih...</option>
                        <option>L</option>
                        <option>P</option>
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
            <div class="form-group">
                <label for="foto_siswa">Foto</label>
                <input type="file" class="form-control" id="foto_siswa" name="foto_siswa" placeholder="alamat.." required>
            </div>
            <hr>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="<?= base_url(); ?>Admin/RegisterSiswa" type="submit" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>