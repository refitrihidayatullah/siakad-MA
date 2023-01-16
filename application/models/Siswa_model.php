<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa_model extends CI_Model
{
    function cek_login($table, $where)
    {
        return $this->db->get_where($table, $where);
    }
    // fungsi untuk mengupdate atau mengubah data di database
    function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    function get_siswa_ById($id)
    {
        return $this->db->query("SELECT * FROM tb_siswa WHERE id_siswa=$id")->row();
    }
    function get_kelas_siswa()
    {
        return $this->db->query("SELECT * FROM tb_kelas")->result_array();
    }
    function get_kelas_siswa_ById($id)
    {

        return $this->db->query("SELECT tb_siswa.id_kelas,tb_kelas.nama_kelas FROM tb_siswa LEFT JOIN tb_kelas ON tb_siswa.id_kelas = tb_kelas.id_kelas WHERE tb_siswa.id_siswa =$id")->row();
    }
    function get_jenis_kelamin_siswa_ById($id)
    {
        return $this->db->query("SELECT * FROM tb_siswa WHERE id_siswa = $id")->row();
    }
    function get_jurusan_siswa()
    {
        return $this->db->query("SELECT * FROM tb_jurusan")->result_array();
    }
    function get_jurusan_siswa_ById($id)
    {
        return $this->db->query("SELECT * FROM tb_siswa LEFT JOIN 
                                    tb_jurusan ON tb_siswa.id_jurusan = tb_jurusan.id_jurusan
                                    WHERE id_siswa =$id")->row();
    }
    function get_role_siswa()
    {
        return $this->db->query("SELECT * FROM tb_hak_akses WHERE id_hak_akses = 3")->row();
    }
    // fungsi ambil data
    function get_data_all()
    {
        return $this->db->query('SELECT * FROM tb_siswa LEFT JOIN
                                    tb_kelas ON tb_siswa.id_kelas = tb_kelas.id_kelas LEFT JOIN
                                    tb_jurusan ON tb_siswa.id_jurusan = tb_jurusan.id_jurusan')->result_array();
    }
    // fungsi insert data
    function insert_data($data, $table)
    {
        $this->db->insert($table, $data);
    }
    // fungsi update data 
    function delete_data($where, $table)
    {
        $this->db->delete($table, $where);
    }
    // fungsi untuk mengedit data
    function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
    function updateDataSiswa($data, $id_siswa)
    {
        $sql = "UPDATE tb_siswa SET nis_siswa=?,nama_siswa=?,email_siswa=?,jenis_kelamin_siswa=?,tempat_lahir_siswa=?,tanggal_lahir_siswa=?,alamat_siswa=?,id_kelas=?,id_jurusan=? WHERE id_siswa = $id_siswa";
        $this->db->query($sql, $data);
    }
    // AKHIR FUNGSI CRUD

    // dashboard siswa first
    function get_data_all_jadwal_mapel($dt_sess_id_siswa, $dt_sess_id_kelas, $dt_sess_id_jurusan)
    {
        $sql = "SELECT * FROM tb_jadwal_mapel LEFT JOIN
                              tb_guru ON tb_jadwal_mapel.id_guru = tb_guru.id_guru LEFT JOIN
                              tb_kelas ON tb_jadwal_mapel.id_kelas = tb_kelas.id_kelas LEFT JOIN
                              tb_jurusan ON tb_jadwal_mapel.id_jurusan = tb_jurusan.id_jurusan LEFT JOIN
                              tb_mapel ON tb_jadwal_mapel.id_mapel = tb_mapel.id_mapel LEFT JOIN
                              tb_kategori_nilai ON tb_jadwal_mapel.id_kategori_nilai = tb_kategori_nilai.id_kategori_nilai WHERE tb_jadwal_mapel.id_kelas = $dt_sess_id_kelas AND tb_jadwal_mapel.id_jurusan = $dt_sess_id_jurusan ";
        return $this->db->query($sql)->result_array();
    }
    // absen siswa
    function insertAbsenSiswa($arr_absen)
    {
        $this->db->insert('tb_absen', $arr_absen);
    }
    function getDataAbsenSiswa()
    {
        $id_siswa = $this->session->userdata('id_siswa');
        return $this->db->query("SELECT * FROM  tb_absen WHERE id_siswa = $id_siswa AND status_absen = 1 ")->row();
    }
    function cekDataAbsenSiswa()
    {
        $id_siswa = $this->session->userdata('id_siswa');
        return $this->db->query("SELECT * FROM  tb_absen WHERE id_siswa = $id_siswa AND status_absen = 1 ")->num_rows();
    }
    // dashboard siswa end
    public function dataAbsenSiswaById($dt_sess_id_siswa)
    {
        $sql = "SELECT * FROM tb_absen LEFT JOIN 
        tb_siswa ON tb_absen.id_siswa = tb_siswa.id_siswa LEFT JOIN
        tb_jadwal_mapel ON tb_absen.id_jadwal_mapel = tb_jadwal_mapel.id_jadwal_mapel LEFT JOIN
        tb_kelas ON tb_jadwal_mapel.id_kelas = tb_kelas.id_kelas LEFT JOIN
        tb_jurusan ON tb_jadwal_mapel.id_jurusan = tb_jurusan.id_jurusan LEFT JOIN
        tb_mapel ON tb_jadwal_mapel.id_mapel = tb_mapel.id_mapel WHERE tb_absen.id_siswa = $dt_sess_id_siswa";
        return $this->db->query($sql)->result_array();
    }
}
                
                        



/* End of file Data_Model_model.php and path \application\models\Data_Model_model.php */
