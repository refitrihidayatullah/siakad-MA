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
        $data['dashboard_data_guru'] = $this->Guru_model->dashboard_get_total_guru();
        // var_dump($data['dashboard_data_guru']);
        $this->load->view('templates/header', $data);
        $this->load->view('partials/admin/dashboard_admin', $data);
        $this->load->view('templates/footer');
    }

    // function siswa start
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
    // functiion siswa end

    // function guru start
    public function registerGuru()
    {
        $data['title'] = "Registrasi Guru";
        $data['tampil_data_guru'] = $this->Guru_model->getDataGuru();
        $this->load->view('templates/header', $data);
        $this->load->view('partials/admin/guru/register_guru_admin', $data);
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

        if ($this->form_validation->run() == false) {
            $data['get_role'] = $this->Guru_model->get_role();
            $data['title'] = "Tambah Guru";
            $this->load->view('templates/header', $data);
            $this->load->view('partials/admin/guru/tambah_guru_admin', $data);
            $this->load->view('templates/footer');
        } else {
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

            $this->Guru_model->insertDataGuru($arrGuru);
            $this->session->set_flashdata('flash', 'Ditambahkan');

            // redirect(base_url('Admin/registerGuru'));
            redirect('Admin/registerGuru');
        }
    }

    public function editGuru($id)
    {
        $data['title'] = "Edit Guru";
        $data['getDataGuruById'] = $this->Guru_model->getDataGuruById($id);
        // var_dump($data['getDataGuruById']);
        $this->load->view('templates/header', $data);
        $this->load->view('partials/admin/guru/edit_guru_admin', $data);
        $this->load->view('templates/footer');
    }

    public function func_edit_guru()
    {

        $this->form_validation->set_rules('nip_guru', 'nip', 'required');
        $this->form_validation->set_rules('nama_guru', 'nama', 'required');
        $this->form_validation->set_rules('email_guru', 'email', 'required');
        // $this->form_validation->set_rules('password_guru', 'password', 'required');
        $this->form_validation->set_rules('jenis_kelamin_guru', 'jenis kelamin', 'required');
        $this->form_validation->set_rules('tempat_lahir_guru', 'tempat lahir', 'required');
        $this->form_validation->set_rules('tanggal_lahir_guru', 'tanggal lahir', 'required');
        $this->form_validation->set_rules('alamat_guru', 'alamat', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Edit Guru";
            $this->load->view('templates/header', $data);
            $this->load->view('partials/admin/guru/edit_guru_admin', $data);
            $this->load->view('templates/footer');
        } else {
            $id = htmlspecialchars($this->input->post('id_guru'));
            $nip = htmlspecialchars($this->input->post('nip_guru'));
            $nama = htmlspecialchars($this->input->post('nama_guru'));
            $email = htmlspecialchars($this->input->post('email_guru'));
            // $password = md5($this->input->post('password_guru'));
            $jenis_kelamin = htmlspecialchars($this->input->post('jenis_kelamin_guru'));
            $tempat_lahir = htmlspecialchars($this->input->post('tempat_lahir_guru'));
            $tanggal_lahir = htmlspecialchars($this->input->post('tanggal_lahir_guru'));
            $alamat = htmlspecialchars($this->input->post('alamat_guru'));
            $hak_akses = htmlspecialchars($this->input->post('id_hak_akses'));

            $updateGuru = array(
                // 'id_guru' => $id,
                'nip_guru' => $nip,
                'nama_guru' => $nama,
                // 'password_guru' => $password,
                'email_guru' => $email,
                'jenis_kelamin_guru' => $jenis_kelamin,
                'tempat_lahir_guru' => $tempat_lahir,
                'tanggal_lahir_guru' => $tanggal_lahir,
                'alamat_guru' => $alamat,
                'id_hak_akses' => $hak_akses
            );
            // var_dump($updateGuru);

            $this->Guru_model->updateDataGuru($updateGuru, $id);
            $this->session->set_flashdata('flash', 'Diupdate');

            // redirect(base_url('Admin/registerGuru'));
            redirect('Admin/registerGuru');
        }
    }

    public function deleteGuru($id_guru)
    {
        $this->Guru_model->deleteDataGuru($id_guru);
        $this->session->set_flashdata('flash', 'Diedit');
        redirect('Admin/registerGuru');
    }
}
