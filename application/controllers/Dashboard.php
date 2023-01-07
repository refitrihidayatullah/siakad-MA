<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        // echo "ini untuk dashboard";
        $this->load->view('templates/header');
        // letak if else bagian partial dashboard disesuaikan masing masing level ex if siswa daftar siswa elseif guru dashboard guru dll.
        $this->load->view('partials/admin/dashboard_admin');
        $this->load->view('templates/footer');

        // untuk siswa nanti if else lewat session level yang login lakukan dan sesuaikan dashboard tiap masing masing hak akses
    }

}

/* End of file Dashboard.php and path \application\controllers\Dashboard.php */
