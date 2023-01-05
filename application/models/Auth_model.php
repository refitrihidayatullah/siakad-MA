<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    function cek_login($table, $where)
    {
        return $this->db->get_where($table, $where);
    }
}


/* End of file Auth_model.php and path \application\models\Auth_model.php */
