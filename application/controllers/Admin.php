<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('Siswa_model');
        $this->load->model('Guru_model');
        $this->load->model('Siswa_model');
    }
    public function index()
    {
        $dt_sess = $this->session->userdata('id_hak_akses');
        if ($dt_sess == 1 || $dt_sess == 2) {

            // }
            $data['title'] = "Dashboard";
            $data['dashboard_data_guru'] = $this->Guru_model->dashboard_get_total_guru();
            $data['dashboard_data_siswa'] = $this->Guru_model->dashboard_get_total_siswa();
            $data['dashboard_data_mapel'] = $this->Guru_model->dashboard_get_total_mapel();
            $data['session_data'] = $this->session->userdata();
            // var_dump($data['dashboard_data_guru']);
            $this->load->view('templates/header', $data);
            $this->load->view('partials/admin/dashboard_admin', $data);
            $this->load->view('templates/footer');
        } else {
            $dt_sess_id_siswa = $this->session->userdata('id_siswa');
            $dt_sess_id_kelas = $this->session->userdata('id_kelas');
            $dt_sess_id_jurusan = $this->session->userdata('id_jurusan');
            $data['title'] = "Dashboard Siswa";

            $data['get_data_jadwal_mapel'] = $this->Siswa_model->get_data_all_jadwal_mapel($dt_sess_id_siswa, $dt_sess_id_kelas, $dt_sess_id_jurusan);
            $data['get_data_absen_siswa'] = $this->Siswa_model->getDataAbsenSiswa();
            $data['cek_data_absen_siswa'] = $this->Siswa_model->cekDataAbsenSiswa();



            $this->load->view('templates/header', $data);
            $this->load->view('partials/siswa/dashboard_siswa', $data);
            $this->load->view('templates/footer');
        }
    }

    // function siswa start
    public function registerSiswa()
    {
        $data['title'] = "Registrasi Siswa";
        $data['siswa'] = $this->Siswa_model->get_data_all();
        $this->load->view('templates/header', $data);
        $this->load->view('partials/admin/siswa/register_siswa_admin', $data);
        $this->load->view('templates/footer');
    }

    public function tambahSiswa()
    {
        $data['title'] = "Tambah Siswa";
        $data['get_kelas'] = $this->Siswa_model->get_kelas_siswa();
        $data['get_jurusan'] = $this->Siswa_model->get_jurusan_siswa();
        $data['get_role'] = $this->Siswa_model->get_role_siswa();
        $this->load->view('templates/header', $data);
        $this->load->view('partials/admin/siswa/tambah_siswa_admin', $data);
        $this->load->view('templates/footer');
    }


    public function func_tambah_siswa()
    {
        // lakukan validasi terhadap inputan user
        $this->form_validation->set_rules('nis_siswa', 'NIS', 'required|is_unique[tb_siswa.nis_siswa]');
        $this->form_validation->set_rules('password_siswa', 'Password', 'required');
        $this->form_validation->set_rules('nama_siswa', 'Nama Siswa', 'required');
        $this->form_validation->set_rules('email_siswa', 'Email Siswa', 'required');
        $this->form_validation->set_rules('jenis_kelamin_siswa', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('tempat_lahir_siswa', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tanggal_lahir_siswa', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('alamat_siswa', 'Alamat', 'required');
        $this->form_validation->set_rules('id_kelas', 'Kelas', 'required');
        $this->form_validation->set_rules('id_jurusan', 'Jurusan', 'required');
        $this->form_validation->set_rules('id_hak_akses');
        // fungsi input pada form validation
        if ($this->form_validation->run() != false) {
            $nis_siswa = htmlspecialchars($this->input->post('nis_siswa'));
            $password_siswa = md5($this->input->post('password_siswa'));
            $nama_siswa = htmlspecialchars($this->input->post('nama_siswa'));
            $email_siswa = htmlspecialchars($this->input->post('email_siswa'));
            $jenis_kelamin_siswa = htmlspecialchars($this->input->post('jenis_kelamin_siswa'));
            $tempat_lahir_siswa = htmlspecialchars($this->input->post('tempat_lahir_siswa'));
            $tanggal_lahir_siswa = htmlspecialchars($this->input->post('tanggal_lahir_siswa'));
            $alamat_siswa = htmlspecialchars($this->input->post('alamat_siswa'));
            $kelas_siswa = htmlspecialchars($this->input->post('id_kelas'));
            $jurusan_siswa = htmlspecialchars($this->input->post('id_jurusan'));
            $role = htmlspecialchars($this->input->post('id_hak_akses'));
            // masukkan data ke dalam array

            $data = array(
                'nis_siswa' => $nis_siswa,
                'password' => $password_siswa,
                'nama_siswa' => $nama_siswa,
                'email_siswa' => $email_siswa,
                'jenis_kelamin_siswa' => $jenis_kelamin_siswa,
                'tempat_lahir_siswa' => $tempat_lahir_siswa,
                'tanggal_lahir_siswa' => $tanggal_lahir_siswa,
                'alamat_siswa' => $alamat_siswa,
                'id_kelas' => $kelas_siswa,
                'id_jurusan' => $jurusan_siswa,
                'id_hak_akses' => $role

            );
            // langsung ambil model dari database insert siswa
            $this->Siswa_model->insert_data($data, 'tb_siswa');
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('Admin/registerSiswa');
        } else {
            $this->session->set_flashdata('flashs', 'Ditambahkan');
            redirect('Admin/registerSiswa');
        }
    }
    public function hapusSiswa($id)
    {
        $where = array(
            'id_siswa' => $id
        );
        $this->Siswa_model->delete_data($where, 'tb_siswa');
        $this->session->set_flashdata('flash', 'Didelete');
        redirect(base_url() . 'Admin/registerSiswa');

        // ini fungsi hapus data siswa
    }

    public function editSiswa($id)
    {
        // $where = array('id_siswa' => $id);
        // $data['siswa'] =  $this->Siswa_model->edit_data($where, 'tb_siswa')->result();
        $data['siswa_ById'] = $this->Siswa_model->get_siswa_ById($id);
        $data['data_kelas'] = $this->Siswa_model->get_kelas_siswa();
        $data['data_kelas_By_Id'] = $this->Siswa_model->get_kelas_siswa_ById($id);
        $data['data_jenis_kelamin_By_Id'] = $this->Siswa_model->get_jenis_kelamin_siswa_ById($id);
        $data['data_jurusan_By_Id'] = $this->Siswa_model->get_jurusan_siswa_ById($id);
        $data['get_jurusan'] = $this->Siswa_model->get_jurusan_siswa();
        $data['title'] = "Edit Siswa";
        $this->load->view('templates/header', $data);
        $this->load->view('partials/admin/siswa/edit_siswa_admin', $data);
        $this->load->view('templates/footer');
    }
    public function updateSiswa()
    {
        $this->form_validation->set_rules('nis_siswa', 'NIS', 'required');
        // $this->form_validation->set_rules('password_siswa', 'Password', 'required');
        $this->form_validation->set_rules('nama_siswa', 'Nama Siswa', 'required');
        $this->form_validation->set_rules('email_siswa', 'Email Siswa', 'required');
        $this->form_validation->set_rules('jenis_kelamin_siswa', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('tempat_lahir_siswa', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tanggal_lahir_siswa', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('alamat_siswa', 'Alamat', 'required');
        $this->form_validation->set_rules('id_kelas', 'Kelas', 'required');
        $this->form_validation->set_rules('id_jurusan', 'Jurusan', 'required');
        // $this->form_validation->set_rules('id_hak_akses');
        // fungsi input pada form validation
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('flashs', 'Diupdate');
            redirect('Admin/registerSiswa');
        } else {
            $id_siswa = htmlspecialchars($this->input->post('id_siswa'));
            $nis_siswa = htmlspecialchars($this->input->post('nis_siswa'));
            // $password_siswa = md5($this->input->post('password_siswa'));
            $nama_siswa = htmlspecialchars($this->input->post('nama_siswa'));
            $email_siswa = htmlspecialchars($this->input->post('email_siswa'));
            $jenis_kelamin_siswa = htmlspecialchars($this->input->post('jenis_kelamin_siswa'));
            $tempat_lahir_siswa = htmlspecialchars($this->input->post('tempat_lahir_siswa'));
            $tanggal_lahir_siswa = htmlspecialchars($this->input->post('tanggal_lahir_siswa'));
            $alamat_siswa = htmlspecialchars($this->input->post('alamat_siswa'));
            $kelas_siswa = htmlspecialchars($this->input->post('id_kelas'));
            $jurusan_siswa = htmlspecialchars($this->input->post('id_jurusan'));
            // $role = htmlspecialchars($this->input->post('id_hak_akses'));
            // masukkan data ke dalam array
            var_dump($id_siswa, $nis_siswa, $nama_siswa, $email_siswa, $jenis_kelamin_siswa, $tempat_lahir_siswa, $tanggal_lahir_siswa, $alamat_siswa, $kelas_siswa, $jurusan_siswa);

            $data = array(
                'nis_siswa' => $nis_siswa,
                // 'password' => $password_siswa,
                'nama_siswa' => $nama_siswa,
                'email_siswa' => $email_siswa,
                'jenis_kelamin_siswa' => $jenis_kelamin_siswa,
                'tempat_lahir_siswa' => $tempat_lahir_siswa,
                'tanggal_lahir_siswa' => $tanggal_lahir_siswa,
                'alamat_siswa' => $alamat_siswa,
                'id_kelas' => $kelas_siswa,
                'id_jurusan' => $jurusan_siswa,
                // 'id_hak_akses' => $role

            );

            $this->Siswa_model->updateDataSiswa($data, $id_siswa);
            $this->session->set_flashdata('flash', 'Diupdate');
            redirect('Admin/registerSiswa');
        }
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
        $this->session->set_flashdata('flash', 'Didelete');
        redirect('Admin/registerGuru');
    }


    // master kelas
    public function tambahKelas()
    {
        $this->form_validation->set_rules('nama_kelas', 'nama', 'required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('flashs', 'Ditambahkan');
            redirect('Admin/masterMapel');
        } else {
            $nama = htmlspecialchars($this->input->post('nama_kelas'));
            $arrKelas = array(
                'nama_kelas' => $nama
            );
            $this->Guru_model->insertDataKelas($arrKelas);
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('Admin/masterMapel');
        }
    }

    // master mapel
    public function masterMapel()
    {
        $data['title'] = "Master Mapel";
        $data['getDataKelas'] = $this->Guru_model->getDataKelas();
        $data['getDataJurusan'] = $this->Guru_model->getDataJurusan();
        $data['getDataKategoriNilai'] = $this->Guru_model->getDataKategoriNilai();
        $data['getDataMapel'] = $this->Guru_model->getDataMapel();
        $this->load->view('templates/header', $data);
        $this->load->view('partials/admin/mapel/master_mapel_admin', $data);
        $this->load->view('templates/footer');
    }
    public function updateKelas()
    {
        $this->form_validation->set_rules('nama_kelas', 'nama', 'required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('flashs', 'Diupdate');
            redirect('Admin/masterMapel');
        } else {
            $nama = htmlspecialchars($this->input->post('nama_kelas'));
            $id = htmlspecialchars($this->input->post('id_kelas'));

            $this->Guru_model->updateDataKelas($nama, $id);
            $this->session->set_flashdata('flash', 'Diupdate');
            redirect('Admin/masterMapel');
        }
    }
    public function deleteMasterKelas($id)
    {
        $this->Guru_model->deleteDataKelas($id);
        $this->session->set_flashdata('flash', 'Didelete');
        redirect('Admin/masterMapel');
    }

    public function tambahJurusan()
    {
        $this->form_validation->set_rules('nama_jurusan', 'nama', 'required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('flashs', 'Ditambahkan');
            redirect('Admin/masterMapel');
        } else {
            $nama = htmlspecialchars($this->input->post('nama_jurusan'));
            $arrJurusan = array(
                'nama_jurusan' => $nama
            );
            $this->Guru_model->insertDataJurusan($arrJurusan);
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('Admin/masterMapel');
        }
    }
    public function updateJurusan()
    {
        $this->form_validation->set_rules('nama_jurusan', 'nama', 'required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('flashs', 'Diupdate');
            redirect('Admin/masterMapel');
        } else {
            $nama = htmlspecialchars($this->input->post('nama_jurusan'));
            $id = htmlspecialchars($this->input->post('id_jurusan'));

            $this->Guru_model->updateDataJurusan($nama, $id);
            $this->session->set_flashdata('flash', 'Diupdate');
            redirect('Admin/masterMapel');
        }
    }
    public function deleteMasterJurusan($id)
    {
        $this->db->query("DELETE FROM tb_jurusan WHERE id_jurusan = $id");
        $this->session->set_flashdata('flash', 'Didelete');
        redirect('Admin/masterMapel');
    }

    // master kategori nilai
    public function tambahKategoriNilai()
    {
        $this->form_validation->set_rules('nama_kategori_nilai', 'nama', 'required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('flashs', 'Ditambahkan');
            redirect('Admin/masterMapel');
        } else {
            $nama = htmlspecialchars($this->input->post('nama_kategori_nilai'));
            $arrKategoriNilai = array(
                'nama_kategori_nilai' => $nama
            );
            $this->Guru_model->insertDataKategoriNilai($arrKategoriNilai);
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('Admin/masterMapel');
        }
    }
    public function updateKategoriNilai()
    {
        $this->form_validation->set_rules('nama_kategori_nilai', 'nama', 'required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('flashs', 'Diupdate');
            redirect('Admin/masterMapel');
        } else {
            $nama = htmlspecialchars($this->input->post('nama_kategori_nilai'));
            $id = htmlspecialchars($this->input->post('id_kategori_nilai'));

            $this->Guru_model->updateDataKategoriNilai($nama, $id);
            $this->session->set_flashdata('flash', 'Diupdate');
            redirect('Admin/masterMapel');
        }
    }
    public function deleteMasterKategoriNilai($id)
    {
        $this->db->query("DELETE FROM tb_kategori_nilai WHERE id_kategori_nilai = $id");
        $this->session->set_flashdata('flash', 'Didelete');
        redirect('Admin/masterMapel');
    }


    // master mapel 
    public function tambahMapel()
    {
        $this->form_validation->set_rules('nama_mapel', 'nama', 'required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('flashs', 'Ditambahkan');
            redirect('Admin/masterMapel');
        } else {
            $nama = htmlspecialchars($this->input->post('nama_mapel'));
            $arrMapel = array(
                'nama_mapel' => $nama
            );
            $this->Guru_model->insertDataMapel($arrMapel);
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('Admin/masterMapel');
        }
    }
    public function updateMapel()
    {
        $this->form_validation->set_rules('nama_mapel', 'nama', 'required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('flashs', 'Diupdate');
            redirect('Admin/masterMapel');
        } else {
            $nama = htmlspecialchars($this->input->post('nama_mapel'));
            $id = htmlspecialchars($this->input->post('id_mapel'));

            $this->Guru_model->updateDataMapel($nama, $id);
            $this->session->set_flashdata('flash', 'Diupdate');
            redirect('Admin/masterMapel');
        }
    }
    public function deleteMasterMapel($id)
    {
        $this->db->query("DELETE FROM tb_mapel WHERE id_mapel='$id'");
        $this->session->set_flashdata('flash', 'Didelete');
        redirect('Admin/masterMapel');
    }



    // master jadwal
    public function masterJadwalMapel()
    {
        $data['title'] = "Jadwal Mata Pelajaran";
        $data['get_data_guru'] = $this->Guru_model->getDataGuruJadwal();
        $data['get_data_mapel'] = $this->Guru_model->getDataMapelJadwal();
        $data['get_data_kelas'] = $this->Guru_model->getDataKelasJadwal();
        $data['get_data_jurusan'] = $this->Guru_model->getDataJurusanJadwal();
        $data['get_data_kategori'] = $this->Guru_model->getDataKategoriJadwal();
        $data['get_data_all_jadwal'] = $this->Guru_model->getDataAllJadwal();


        // edit
        // $data['getDataJadwalMapel'] = $this->Guru_model->getDataJadwalMapel($id)->row();

        $this->load->view('templates/header', $data);
        $this->load->view('partials/admin/jadwal/jadwal_mapel_admin', $data);
        $this->load->view('templates/footer');
    }
    public function tambahJadwalMapel()
    {
        $this->form_validation->set_rules('id_guru', 'nama guru', 'required');
        $this->form_validation->set_rules('id_kelas', 'nama kelas', 'required');
        $this->form_validation->set_rules('id_jurusan', 'nama jurusan', 'required');
        $this->form_validation->set_rules('id_mapel', 'nama mapel', 'required');
        $this->form_validation->set_rules('id_kategori_nilai', 'nama kategori', 'required');
        $this->form_validation->set_rules('tanggal_jadwal', 'tanggal jadwal', 'required');
        $this->form_validation->set_rules('jam_jadwal_mulai', 'jam jadwal mulai', 'required');
        $this->form_validation->set_rules('jam_jadwal_akhir', 'jam jadwal akhir', 'required');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('flashs', 'Ditambahkan');
            redirect('Admin/masterJadwalMapel');
        } else {
            $arrJadwal = [
                'id_guru' => htmlspecialchars($this->input->post('id_guru')),
                'id_kelas' => htmlspecialchars($this->input->post('id_kelas')),
                'id_jurusan' => htmlspecialchars($this->input->post('id_jurusan')),
                'id_mapel' => htmlspecialchars($this->input->post('id_mapel')),
                'id_kategori_nilai' => htmlspecialchars($this->input->post('id_kategori_nilai')),
                'tanggal_jadwal' => htmlspecialchars($this->input->post('tanggal_jadwal')),
                'jam_jadwal_mulai' => htmlspecialchars($this->input->post('jam_jadwal_mulai')),
                'jam_jadwal_akhir' => htmlspecialchars($this->input->post('jam_jadwal_akhir'))
            ];

            $this->Guru_model->insertJadwalMapel($arrJadwal);
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('Admin/masterJadwalMapel');
        }
    }
    public function updateJadwalMapel()
    {
        $this->form_validation->set_rules('id_guru', 'nama guru', 'required');
        $this->form_validation->set_rules('id_kelas', 'nama kelas', 'required');
        $this->form_validation->set_rules('id_jurusan', 'nama jurusan', 'required');
        $this->form_validation->set_rules('id_mapel', 'nama mapel', 'required');
        $this->form_validation->set_rules('id_kategori_nilai', 'nama kategori', 'required');
        $this->form_validation->set_rules('tanggal_jadwal', 'tanggal jadwal', 'required');
        $this->form_validation->set_rules('jam_jadwal_mulai', 'jam jadwal mulai', 'required');
        $this->form_validation->set_rules('jam_jadwal_akhir', 'jam jadwal akhir', 'required');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('flashs', 'Diupdate');
            redirect('Admin/masterJadwalMapel');
        } else {
            $id_jadwal_mapel = $this->input->post('id_jadwal_mapel');
            $arrJadwal = [
                'id_guru' => htmlspecialchars($this->input->post('id_guru')),
                'id_kelas' => htmlspecialchars($this->input->post('id_kelas')),
                'id_jurusan' => htmlspecialchars($this->input->post('id_jurusan')),
                'id_mapel' => htmlspecialchars($this->input->post('id_mapel')),
                'id_kategori_nilai' => htmlspecialchars($this->input->post('id_kategori_nilai')),
                'tanggal_jadwal' => htmlspecialchars($this->input->post('tanggal_jadwal')),
                'jam_jadwal_mulai' => htmlspecialchars($this->input->post('jam_jadwal_mulai')),
                'jam_jadwal_akhir' => htmlspecialchars($this->input->post('jam_jadwal_akhir'))
            ];
            $this->Guru_model->updateDataJadwalMapel($arrJadwal, $id_jadwal_mapel);
            $this->session->set_flashdata('flash', 'Diupdate');
            redirect('Admin/masterJadwalMapel');
        }
    }
    public function jadwalMapel($id)
    {
        $cek = $this->db->query("SELECT * FROM tb_absen")->num_rows();
        if ($cek > 0) {
            $this->db->query("DELETE tb_jadwal_mapel, tb_absen FROM tb_jadwal_mapel JOIN tb_absen ON tb_jadwal_mapel.id_jadwal_mapel = tb_absen.id_jadwal_mapel WHERE tb_jadwal_mapel.id_jadwal_mapel = $id AND tb_absen.id_jadwal_mapel = $id");
        } else {
            $this->db->query("DELETE tb_jadwal_mapel FROM tb_jadwal_mapel WHERE id_jadwal_mapel = $id");
        }
        $this->session->set_flashdata('flash', 'Didelete');
        redirect('Admin/masterJadwalMapel');
    }

    // absen siswa
    public function func_absen_siswa()
    {

        $tanggal_absen = $this->input->post('tanggal_absen');
        $waktu_absen = $this->input->post('waktu_absen');
        $id_siswa = $this->input->post('id_siswa');
        $id_jadwal_mapel = $this->input->post('id_jadwal_mapel');
        $cek_absen = $this->db->query("SELECT * FROM tb_absen WHERE id_siswa = $id_siswa AND id_jadwal_mapel = $id_jadwal_mapel")->num_rows();
        $arr_absen = [
            'status_absen' => 1,
            'tanggal_absen' => $tanggal_absen,
            'waktu_absen' => $waktu_absen,
            'id_siswa' => $id_siswa,
            'id_jadwal_mapel' => $id_jadwal_mapel
        ];

        if ($cek_absen > 0) {
            $this->session->set_flashdata('flashs', 'Absen');
            redirect('Admin/index');
        } else {
            $this->Siswa_model->insertAbsenSiswa($arr_absen);
            $this->session->set_flashdata('flash', 'Absen');
            redirect('Admin/index');
        }
    }
    // penilaian siswa
    public function penilaianSiswa()
    {
        $data['title'] = "Penilaian Siswa";
        $data['get_all_siswa'] = $this->Guru_model->get_data_all_siswa();
        $data['get_all_mapel'] = $this->Guru_model->get_data_all_mapel();
        $data['get_kategori_nilai'] = $this->Guru_model->get_kategori_nilai_penilaian();
        $data['cek_data_penilaian'] = $this->Guru_model->cekDataPenilaian();
        $data['tampil_nilai_siswa'] = $this->Guru_model->tampilNilaiSiswa();

        $this->load->view('templates/header', $data);
        $this->load->view('partials/admin/penilaian/penilaian_siswa_admin', $data);
        $this->load->view('templates/footer');
    }

    // public function penilaianPerSiswa($id)
    // {
    //     $data['title'] = "Penilaian Setiap Siswa";
    //     $data['get_all_mapel'] = $this->Guru_model->get_data_all_mapel();
    //     $data['get_siswaByid'] = $this->Guru_model->get_siswaByid($id);
    //     $this->load->view('templates/header', $data);
    //     $this->load->view('partials/admin/penilaian/penilaian_setiap_siswa_admin', $data);
    //     $this->load->view('templates/footer');
    // }
    // public function nilaiSiswa($id, $id_mapel)
    // {
    //     $data['title'] = "Penilaian Setiap Siswa hm ";
    //     $data['get_siswaByid'] = $this->Guru_model->get_siswaByid($id);
    //     $data["get_kategori_nilai"] = $this->Guru_model->get_kategori_nilai_penilaian();
    //     $this->load->view('templates/header', $data);
    //     $this->load->view('partials/admin/penilaian/nilai_siswa', $data);
    //     $this->load->view('templates/footer');
    // }
    public function func_tambah_nilai_siswa()
    {
        $id_siswa = $this->input->post('id_siswa');
        $id_mapel = $this->input->post('id_mapel');
        $nilai = $this->input->post('nilai');
        $id_kategori_nilai = $this->input->post('id_kategori_nilai');
        $tgl = date('Y-m-d');
        $arrNilai = [
            'id_siswa' => htmlspecialchars($id_siswa),
            'id_mapel' => htmlspecialchars($id_mapel),
            'nilai' => htmlspecialchars($nilai),
            'id_kategori_nilai' => htmlspecialchars($id_kategori_nilai),
            'tanggal_penilaian' => $tgl
        ];
        $checknilai = $this->Guru_model->checkDataNilai($id_siswa, $id_mapel);
        if ($checknilai > 0) {
            $this->session->set_flashdata('flashs', 'Ada');
            redirect('Admin/penilaianSiswa');
        } else {
            $this->Guru_model->insertNilai($arrNilai, $id_siswa, $id_mapel);
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('Admin/penilaianSiswa');
        }
    }
    public function updatePenilaianSiswa()
    {
        $id_penilaian_siswa = $this->input->post('id_penilaian_siswa');
        $id_siswa = $this->input->post('id_siswa');
        $id_mapel = $this->input->post('id_mapel');
        $nilai = $this->input->post('nilai');
        $id_kategori_nilai = $this->input->post('id_kategori_nilai');
        $tanggal_penilaian = date('Y-m-d');

        $arrUpdateNilai =
            [
                'id_penilaian_siswa' => $id_penilaian_siswa,
                'id_siswa' => $id_siswa,
                'id_mapel' => $id_mapel,
                'nilai' => $nilai,
                'id_kategori_nilai' => $id_kategori_nilai,
                'tanggal_penilaian' => $tanggal_penilaian
            ];
        $checkDataNilaiUpdate = $this->Guru_model->checkdatanilaiupdate($id_siswa, $id_mapel);
        if ($checkDataNilaiUpdate > 0) {
            $this->session->set_flashdata('updates', 'ada');
            redirect('Admin/penilaianSiswa');
        } else {
            $this->Guru_model->updateNilai($arrUpdateNilai, $id_penilaian_siswa);
            $this->session->set_flashdata('update', 'Diubah');
            redirect('Admin/penilaianSiswa');
        }
    }
}
