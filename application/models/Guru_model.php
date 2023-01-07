<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru_model extends CI_Model
{
    public function dashboard_get_total_guru()
    {
        // $sql = "SELECT COUNT('*') FROM tb_guru AS TOTAL WHERE id_hak_akses !=1 ";
        // return $this->db->query($sql);
        // return $this->db->count_all('tb_guru');
        // return $this->db->count_all('tb_guru');

        $this->db->select('*');
        $this->db->from('tb_guru');
        $this->db->where_not_in('id_hak_akses', 1);
        return $this->db->count_all_results();


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
}
