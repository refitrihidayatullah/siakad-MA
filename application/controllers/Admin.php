<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Siswa_model');
        $this->load->model('Guru_model');
    }



    public function index()
    {
        $data['title'] = "Dashboard";
        $this->load->view('templates/header', $data);
        $this->load->view('partials/admin/dashboard_admin');
        $this->load->view('templates/footer');
    }

    // functio siswa start
    public function registerSiswa()
    {
        $data['title'] = "Registrasi Siswa";
        $this->load->view('templates/header', $data);
        $this->load->view('partials/admin/siswa/register_siswa_admin');
        $this->load->view('templates/footer');
    }

    public function tambahSiswa()
    {
        $data['title'] = "Tambah Siswa";
        $this->load->view('templates/header', $data);
        $this->load->view('partials/admin/siswa/tambah_siswa_admin');
        $this->load->view('templates/footer');
    }


    // function guru start
    public function registerGuru()
    {
        $data['title'] = "Registrasi Guru";
        $this->load->view('templates/header', $data);
        $this->load->view('partials/admin/guru/register_guru_admin');
        $this->load->view('templates/footer');
    }
    public function tambahGuru()
    {
        $data['get_role'] = $this->Guru_model->get_role();
        $data['title'] = "Tambah Guru";
        $this->load->view('templates/header', $data);
        $this->load->view('partials/admin/guru/tambah_guru_admin', $data);
        $this->load->view('templates/footer');
    }
    public function func_tambah_guru()
    {

        $this->form_validation->set_rules('nip_guru', 'nip', 'required');
        $this->form_validation->set_rules('nama_guru', 'nama', 'required');
        $this->form_validation->set_rules('email_guru', 'email', 'required');
        $this->form_validation->set_rules('password_guru', 'password', 'required');
        $this->form_validation->set_rules('jenis_kelamin_guru', 'jenis kelamin', 'required');
        $this->form_validation->set_rules('tempat_lahir_guru', 'tempat lahir', 'required');
        $this->form_validation->set_rules('tanggal_lahir_guru', 'tanggal lahir', 'required');
        $this->form_validation->set_rules('alamat_guru', 'alamat', 'required');

        if ($this->form_validation->run() != false) {
            // echo "form validation oke";
            $nip = htmlspecialchars($this->input->post('nip_guru'));
            $nama = htmlspecialchars($this->input->post('nama_guru'));
            $email = htmlspecialchars($this->input->post('email_guru'));
            $password = md5($this->input->post('password_guru'));
            $jenis_kelamin = htmlspecialchars($this->input->post('jenis_kelamin_guru'));
            $tempat_lahir = htmlspecialchars($this->input->post('tempat_lahir_guru'));
            $tanggal_lahir = htmlspecialchars($this->input->post('tanggal_lahir_guru'));
            $alamat = htmlspecialchars($this->input->post('alamat_guru'));
            $hak_akses = htmlspecialchars($this->input->post('id_hak_akses'));

            $arrGuru = array(
                'nip_guru' => $nip,
                'nama_guru' => $nama,
                'password_guru' => $password,
                'email_guru' => $email,
                'jenis_kelamin_guru' => $jenis_kelamin,
                'tempat_lahir_guru' => $tempat_lahir,
                'tanggal_lahir_guru' => $tanggal_lahir,
                'alamat_guru' => $alamat,
                'id_hak_akses' => $hak_akses
            );
            var_dump($arrGuru);
            echo $nip, $nama, $email, $password, $jenis_kelamin, $tempat_lahir, $tanggal_lahir, $tanggal_lahir, $alamat, $hak_akses;
        } else {

            $data['get_role'] = $this->Guru_model->get_role();
            $data['title'] = "Tambah Guru";
            $this->load->view('templates/header', $data);
            $this->load->view('partials/admin/guru/tambah_guru_admin', $data);
            $this->load->view('templates/footer');
        }
    }
}
