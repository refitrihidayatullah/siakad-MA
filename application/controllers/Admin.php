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
        // $
    }

    public function test()
    {
        $this->load->view('v_coba');
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
            $this->Siswa_model->insert_data($data, 'tb_siswa');
            $data['title'] = "Registrasi Siswa";
            $data['siswa'] = $this->Siswa_model->get_data('tb_siswa')->result();
            $this->load->view('templates/header', $data);
            $this->load->view('partials/admin/siswa/register_siswa_admin', $data);
            $this->load->view('templates/footer');
        } else {

            $data['title'] = "Registrasi Siswa";
            $data['siswa'] = $this->Siswa_model->get_data('tb_siswa')->result();
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
        $this->Siswa_model->delete_data($where, 'tb_siswa');
        redirect(base_url() . 'Admin/registerSiswa');

        // ini fungsi hapus data siswa
    }

    public function editSiswa($id)
    {
        $where = array('id_siswa' => $id);
        $data['siswa'] =  $this->Siswa_model->edit_data($where, 'tb_siswa')->result();
        $data['title'] = "Edit Siswa";
        $this->load->view('templates/header', $data);
        $this->load->view('partials/admin/siswa/edit_siswa_admin', $data);
        $this->load->view('templates/footer');
        // }
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
}
