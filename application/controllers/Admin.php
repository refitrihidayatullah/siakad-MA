<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('Siswa_model');
        // $this->load->model('Guru_model');
        $this->load->model('Data_model');
        // $
    }



    public function index()
    {
        $data['title'] = "Dashboard";
        $this->load->view('templates/header', $data);
        $this->load->view('partials/admin/dashboard_admin');
        $this->load->view('templates/footer');
    }

    // functio siswa start


    public function tambahSiswa()
    {
        $data['title'] = "Tambah Siswa";
        $this->load->view('templates/header', $data);
        $this->load->view('partials/admin/siswa/tambah_siswa_admin');
        $this->load->view('templates/footer');
    }

    public function registerSiswa()
    {
        // lakukan validasi terhadap inputan user
        $this->form_validation->set_rules('nama_siswa', 'Nama Siswa', 'required');
        $this->form_validation->set_rules('nis_siswa', 'NIS', 'required|is_unique[tb_siswa.nis_siswa]');
        $this->form_validation->set_rules('email_siswa', 'Email Siswa', 'required');
        $this->form_validation->set_rules('password_siswa', 'Password', 'required');
        $this->form_validation->set_rules('tempat_lahir_siswa', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tanggal_lahir_siswa', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('jenis_kelamin_siswa', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('id_kelas');
        $this->form_validation->set_rules('jurusan');
        $this->form_validation->set_rules('alamat_siswa');
        // fungsi input pada form validation
        if ($this->form_validation->run() != false) {
            $nama_siswa = htmlspecialchars($this->input->post('nama_siswa'));
            $nis_siswa = htmlspecialchars($this->input->post('nis_siswa'));
            $email_siswa = htmlspecialchars($this->input->post('email_siswa'));
            $password_siswa = md5($this->input->post('password_siswa'));
            $tempat_lahir_siswa = htmlspecialchars($this->input->post('tempat_lahir_siswa'));
            $tanggal_lahir_siswa = htmlspecialchars($this->input->post('tanggal_lahir_siswa'));
            $jenis_kelamin_siswa = htmlspecialchars($this->input->post('jenis_kelamin_siswa'));
            $kelas_siswa = htmlspecialchars($this->input->post('id_kelas'));
            $jurusan_siswa = htmlspecialchars($this->input->post('jurusan'));
            $alamat_siswa = htmlspecialchars($this->input->post('alamat_siswa'));
            // masukkan data ke dalam array

            $data = array(
                'nama_siswa' => $nama_siswa,
                'nis_siswa' => $nis_siswa,
                'username' => $nis_siswa,
                'email_siswa' => $email_siswa,
                'password' => $password_siswa,
                'tempat_lahir_siswa' => $tempat_lahir_siswa,
                'tanggal_lahir_siswa' => $tanggal_lahir_siswa,
                'jenis_kelamin_siswa' => $jenis_kelamin_siswa,
                'id_kelas' => $kelas_siswa,
                'jurusan_siswa' => $jurusan_siswa,
                'alamat_siswa' => $alamat_siswa

            );
            // langsung ambil model dari database insert siswa
            $this->Data_model->insert_data($data, 'tb_siswa');
            $data['title'] = "Registrasi Siswa";
            $data['siswa'] = $this->Data_model->get_data('tb_siswa')->result();
            $this->load->view('templates/header', $data);
            $this->load->view('partials/admin/siswa/register_siswa_admin', $data);
            $this->load->view('templates/footer');
        } else {

            $data['title'] = "Registrasi Siswa";
            $data['siswa'] = $this->Data_model->get_data('tb_siswa')->result();
            $this->load->view('templates/header', $data);
            $this->load->view('partials/admin/siswa/register_siswa_admin', $data);
            $this->load->view('templates/footer');
        }
    }
    public function hapusSiswa($id)
    {
        $where = array(
            'id_siswa' => $id
        );
        $this->Data_model->delete_data($where, 'tb_siswa');
        redirect(base_url() . 'Admin/registerSiswa');

        // ini fungsi hapus data siswa
    }

    public function editSiswa($id)
    {
        $where = array('id_siswa' => $id);
        $data['siswa'] =  $this->Data_model->edit_data($where, 'tb_siswa')->result();
        $data['title'] = "Edit Siswa";
        $this->load->view('templates/header', $data);
        $this->load->view('partials/admin/siswa/edit_siswa_admin', $data);
        $this->load->view('templates/footer');
        // }
    }
    public function updateSiswa()
    {
        // var_dump($data['siswa']);

        $this->form_validation->set_rules('nama_siswa', 'Nama Siswa', 'required');
        $this->form_validation->set_rules('nis_siswa', 'NIS', 'required');
        $this->form_validation->set_rules('email_siswa', 'Email Siswa', 'required');
        $this->form_validation->set_rules('password_siswa', 'Password',);
        $this->form_validation->set_rules('tempat_lahir_siswa', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tanggal_lahir_siswa', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('jenis_kelamin_siswa', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('id_kelas');
        $this->form_validation->set_rules('jurusan');
        $this->form_validation->set_rules('alamat_siswa');

        if ($this->form_validation->run() != false) {
            $data = array(
                'id_siswa'  => htmlspecialchars($this->input->post('id_siswa')),
                'nama_siswa' => htmlspecialchars($this->input->post('nama_siswa')),
                'nis_siswa' => $username = htmlspecialchars($this->input->post('nis_siswa')),
                'username' => $username,
                'email_siswa' => htmlspecialchars($this->input->post('email_siswa')),
                'tempat_lahir_siswa' => htmlspecialchars($this->input->post('tempat_lahir_siswa')),
                'tanggal_lahir_siswa' => htmlspecialchars($this->input->post('tanggal_lahir_siswa')),
                'jenis_kelamin_siswa' => htmlspecialchars($this->input->post('jenis_kelamin_siswa')),
                'id_kelas' => htmlspecialchars($this->input->post('id_kelas')),
                'jurusan_siswa' => htmlspecialchars($this->input->post('jurusan')),
                'alamat_siswa' => htmlspecialchars($this->input->post('alamat_siswa')),

            );
            // cek isi password

            // $ps = $this->input->post('password_siswa') == "";


            // jika kolom password kosong kolom password abaikan
            if (in_array($this->input->post('password_siswa') == "", $data)) {
                $data = array(
                    'id_siswa'  => $id_sw = htmlspecialchars($this->input->post('id_siswa')),
                    'nama_siswa' => htmlspecialchars($this->input->post('nama_siswa')),
                    'nis_siswa' => $username = htmlspecialchars($this->input->post('nis_siswa')),
                    'username' => $username,
                    'email_siswa' => htmlspecialchars($this->input->post('email_siswa')),
                    'tempat_lahir_siswa' => htmlspecialchars($this->input->post('tempat_lahir_siswa')),
                    'tanggal_lahir_siswa' => htmlspecialchars($this->input->post('tanggal_lahir_siswa')),
                    'jenis_kelamin_siswa' => htmlspecialchars($this->input->post('jenis_kelamin_siswa')),
                    'id_kelas' => htmlspecialchars($this->input->post('id_kelas')),
                    'jurusan_siswa' => htmlspecialchars($this->input->post('jurusan')),
                    'alamat_siswa' => htmlspecialchars($this->input->post('alamat_siswa')),

                );
            } else {
                // jika di kolom password ditemukan ada perubahan maka lakukan perubahan di database
                $data = array(
                    'id_siswa'  => $id_sw =  htmlspecialchars($this->input->post('id_siswa')),
                    'nama_siswa' => htmlspecialchars($this->input->post('nama_siswa')),
                    'nis_siswa' => htmlspecialchars($this->input->post('nis_siswa')),
                    'email_siswa' => htmlspecialchars($this->input->post('email_siswa')),
                    'password' => md5($this->input->post('password_siswa')),
                    'tempat_lahir_siswa' => htmlspecialchars($this->input->post('tempat_lahir_siswa')),
                    'tanggal_lahir_siswa' => htmlspecialchars($this->input->post('tanggal_lahir_siswa')),
                    'jenis_kelamin_siswa' => htmlspecialchars($this->input->post('jenis_kelamin_siswa')),
                    'id_kelas' => htmlspecialchars($this->input->post('id_kelas')),
                    'jurusan_siswa' => htmlspecialchars($this->input->post('jurusan')),
                    'alamat_siswa' => htmlspecialchars($this->input->post('alamat_siswa')),

                );
            }

            $where = array('id_siswa' => $id_sw,);
            // lakukan query update ke database
            $this->Data_model->update_data($where, $data, 'tb_siswa');
            redirect(base_url() . 'index.php/Admin/registerSiswa');
        } else {
            $id = $this->input->post('id_siswa');
            $where = array('id_siswa' => $id);
            $data['siswa'] =  $this->Data_model->edit_data($where, 'tb_siswa')->result();
            $data['title'] = "Edit Siswa";
            $this->load->view('templates/header', $data);
            $this->load->view('partials/admin/siswa/edit_siswa_admin', $data);
            $this->load->view('templates/footer');
        }
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
