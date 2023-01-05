<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru_model extends CI_Model
{
    public function get_role()
    {
        $sql = "SELECT * FROM tb_hak_akses WHERE id_hak_akses =1";
        return  $this->db->query($sql)->row();
    }
}
