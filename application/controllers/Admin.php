<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Siswa_model');
    }



    public function index()
    {
        // $data['kata'] = "bangsat";
        // $data['databases'] = $this->Siswa_model->siswa();

        $this->load->view('templates/header');
        $this->load->view('partials/admin/dashboard_admin');
        $this->load->view('templates/footer');
    }
}
