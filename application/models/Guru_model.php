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
}
