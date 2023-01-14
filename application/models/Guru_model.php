<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru_model extends CI_Model
{
    public function dashboard_get_total_guru()
    {
        // $sql = "SELECT COUNT('*') FROM tb_guru AS TOTAL WHERE id_hak_akses !=1 ";
        // return $this->db->query($sql)->num_rows();
        // return $this->db->count_all('tb_guru');
        // return $this->db->count_all('tb_guru');

        $this->db->select('*');
        $this->db->from('tb_guru');
        $this->db->where_not_in('id_hak_akses', 1);
        return $this->db->count_all_results();
        // return $this->db->get('tb_guru')->num_rows();


        // $this->db->where('id_hak_akses != 1');
    }
    public function dashboard_get_total_siswa()
    {
        $this->db->select('*');
        $this->db->from('tb_siswa');
        return $this->db->count_all_results();
    }
    public function dashboard_get_total_mapel()
    {
        $this->db->select('*');
        $this->db->from('tb_mapel');
        return $this->db->count_all_results();
    }
    public function get_role()
    {
        $sql = "SELECT * FROM tb_hak_akses WHERE id_hak_akses =2";
        return  $this->db->query($sql)->row();
    }

    public function insertDataGuru($data)
    {
        $this->db->insert('tb_guru', $data);
    }
    public function getDataGuru()
    {
        $sql = "SELECT * FROM tb_guru INNER JOIN tb_hak_akses ON tb_guru.id_hak_akses = tb_hak_akses.id_hak_akses WHERE tb_guru.id_hak_akses != 1";
        return $this->db->query($sql)->result_array();
    }
    public function getDataGuruById($id)
    {
        $sql = "SELECT * FROM tb_guru WHERE id_guru = ?";
        return $this->db->query($sql, $id)->row();
    }
    public function updateDataGuru($updateGuru, $id)
    {
        // $this->db->where('id_guru', $id);
        // $this->db->update('tb_guru', $updateGuru);
        $sql = "UPDATE tb_guru SET nip_guru=?,nama_guru=?,email_guru=?,jenis_kelamin_guru=?,tempat_lahir_guru=?,tanggal_lahir_guru=?,alamat_guru=?,id_hak_akses=? where id_guru=$id";
        $this->db->query($sql, $updateGuru);
    }

    public function deleteDataGuru($id_guru)
    {
        // $this->db->where('id_guru', $id_guru);
        // $this->db->delete('tb_guru');
        $sql = "DELETE FROM tb_guru WHERE id_guru = ?";
        $this->db->query($sql, $id_guru);
    }

    // masterkelas
    public function insertDataKelas($arrKelas)
    {
        $this->db->insert('tb_kelas', $arrKelas);
    }
    public function getDataKelas()
    {
        $sql = "SELECT * FROM tb_kelas";
        return $this->db->query($sql)->result_array();
    }

    public function updateDataKelas($nama, $id)
    {
        // $sql = "UPDATE tb_kelas SET nama_kelas=? WHERE id_kelas= $id";
        // $this->db->query($sql, $arrKelas);
        // $this->db->update('tb_kelas', $nama);
        // $this->db->query($sql, $nama);
        $this->db->query("UPDATE tb_kelas SET nama_kelas ='$nama' WHERE id_kelas='$id'");
    }
    public function deleteDataKelas($id)
    {
        $sql = "DELETE FROM tb_kelas WHERE id_kelas = ?";
        $this->db->query($sql, $id);
    }
    public function insertDataJurusan($arrJurusan)
    {
        $this->db->insert('tb_jurusan', $arrJurusan);
    }
    public function getDataJurusan()
    {
        return $this->db->query("SELECT * FROM tb_jurusan")->result_array();
    }
    public function updateDataJurusan($nama, $id)
    {
        $this->db->query("UPDATE tb_jurusan SET nama_jurusan='$nama' WHERE id_jurusan ='$id' ");
    }
    public function insertDataKategoriNilai($arrKategoriNilai)
    {

        $this->db->insert('tb_kategori_nilai', $arrKategoriNilai);
    }
    public function getDataKategoriNilai()
    {
        return $this->db->query("SELECT * FROM tb_kategori_nilai")->result_array();
    }
    public function updateDataKategoriNilai($nama, $id)
    {
        $this->db->query("UPDATE tb_kategori_nilai SET nama_kategori_nilai='$nama' WHERE id_kategori_nilai ='$id'");
    }

    // master mapel
    public function insertDataMapel($arrMapel)
    {
        $this->db->insert('tb_mapel', $arrMapel);
    }
    public function getDataMapel()
    {
        return $this->db->query("SELECT * FROM tb_mapel")->result_array();
    }
    public function updateDataMapel($nama, $id)
    {
        $this->db->query("UPDATE tb_mapel SET nama_mapel='$nama' WHERE id_mapel='$id'");
    }

    // master jadwal
    public function getDataGuruJadwal()
    {
        return $this->db->query("SELECT id_guru, nama_guru FROM tb_guru WHERE id_guru != 1")->result_array();
    }
    public function getDataMapelJadwal()
    {
        return $this->db->query("SELECT * FROM tb_mapel")->result_array();
    }
    public function getDataKelasJadwal()
    {
        return $this->db->query("SELECT * FROM tb_kelas")->result_array();
    }
    public function getDataJurusanJadwal()
    {
        return $this->db->query("SELECT * FROM tb_jurusan")->result_array();
    }
    public function getDataKategoriJadwal()
    {
        return $this->db->query('SELECT* FROM tb_kategori_nilai')->result_array();
    }
    public function insertJadwalMapel($arrJadwal)
    {
        $this->db->insert('tb_jadwal_mapel', $arrJadwal);
    }
    public function getDataAllJadwal()
    {
        $sql = "SELECT * FROM tb_jadwal_mapel LEFT JOIN
                        tb_guru ON tb_jadwal_mapel.id_guru = tb_guru.id_guru LEFT JOIN
                        tb_kelas ON tb_jadwal_mapel.id_kelas = tb_kelas.id_kelas LEFT JOIN
                        tb_jurusan ON tb_jadwal_mapel.id_jurusan = tb_jurusan.id_jurusan LEFT JOIN
                        tb_mapel ON tb_jadwal_mapel.id_mapel = tb_mapel.id_mapel LEFT JOIN
                        tb_kategori_nilai ON tb_jadwal_mapel.id_kategori_nilai = tb_kategori_nilai.id_kategori_nilai ";
        return $this->db->query($sql)->result_array();
    }
    public function updateDataJadwalMapel($arrJadwal, $id_jadwal_mapel)
    {
        $sql = "UPDATE tb_jadwal_mapel SET id_guru=?,id_kelas=?,id_jurusan=?,id_mapel=?,id_kategori_nilai=?,tanggal_jadwal=?,jam_jadwal_mulai=?,jam_jadwal_akhir=? WHERE id_jadwal_mapel=$id_jadwal_mapel";
        $this->db->query($sql, $arrJadwal);
    }
    public function get_data_all_siswa()
    {
        return $this->db->query("SELECT * FROM tb_siswa")->result_array();
    }
    public function get_data_all_mapel()
    {
        return $this->db->query("SELECT * FROM tb_mapel")->result_array();
    }

    public function get_kategori_nilai_penilaian()
    {
        return $this->db->query("SELECT * FROM tb_kategori_nilai")->result_array();
    }
    // input nilai
    public function insertNilai($arrNilai)
    {
        $this->db->insert('tb_penilaian_siswa', $arrNilai);
    }
    public function checkDataNilai($id_siswa, $id_mapel)
    {
        return $this->db->query("SELECT * FROM tb_penilaian_siswa WHERE id_siswa = $id_siswa AND id_mapel = $id_mapel")->num_rows();
    }
    public function cekDataPenilaian()
    {
        return $this->db->query("SELECT * FROM tb_penilaian_siswa")->num_rows();
    }
    public function tampilNilaiSiswa()
    {
        return $this->db->query("SELECT * FROM tb_penilaian_siswa LEFT JOIN
                                               tb_siswa ON tb_penilaian_siswa.id_siswa = tb_siswa.id_siswa LEFT JOIN
                                               tb_mapel ON tb_penilaian_siswa.id_mapel = tb_mapel.id_mapel LEFT JOIN
                                               tb_kategori_nilai ON tb_penilaian_siswa.id_kategori_nilai = tb_kategori_nilai.id_kategori_nilai")->result_array();
    }
    public function updateNilai($arrUpdateNilai, $id_penilaian_siswa)
    {
        $sql = "UPDATE tb_penilaian_siswa SET id_penilaian_siswa=?,id_siswa=?,id_mapel=?,nilai=?,id_kategori_nilai=?,tanggal_penilaian=? WHERE id_penilaian_siswa=$id_penilaian_siswa";
        $this->db->query($sql, $arrUpdateNilai);
    }
    public function checkdatanilaiupdate($id_siswa, $id_mapel)
    {
        return $this->db->query("SELECT * FROM tb_penilaian_siswa WHERE id_siswa = $id_siswa AND id_mapel = $id_mapel")->num_rows();
    }
}
