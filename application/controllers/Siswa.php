<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Siswa_model');
    }

    public function index()
    {
    }
}

/* End of file Siswa.php and path \application\controllers\Siswa.php */
