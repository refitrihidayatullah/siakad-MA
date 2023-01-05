<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_model extends CI_Model
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
    // fungsi ambil data
    function get_data($table)
    {
        return $this->db->get($table);
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
    // AKHIR FUNGSI CRUD
}
                
                        



/* End of file Data_Model_model.php and path \application\models\Data_Model_model.php */
