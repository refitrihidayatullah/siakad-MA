<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{


    public function __construct()
    {

        parent::__construct();
        // $this->load->model('Auth_model');
        // $this->load->library('form_validation');
    }

    public function index()
    {

        $this->load->view('login_form');
        // echo "test auth controller";
    }

    private function _login()
    {
        $username = htmlspecialchars($this->input->post('username'));
        $password = md5($this->input->post('password'));

        $cek_nis_siswa = $this->db->query("SELECT * FROM tb_siswa WHERE nis_siswa=$username AND password_siswa='$password';")->num_rows();

        $cek_nip_guru  = $this->db->query("SELECT * FROM tb_guru WHERE nip_guru = $username AND password_guru = $password")->num_rows();

        // ambil data
        $get_data_siswa = $this->db->query("SELECT * FROM tb_siswa WHERE nis_siswa = $username")->row();
        $get_data_guru = $this->db->query("SELECT * FROM tb_guru WHERE nip_guru = $username")->row();


        if ($cek_nip_guru > 0 || $cek_nis_siswa > 0) {
            if ($cek_nip_guru) {
                $data_session_guru = [
                    'id_guru' => $get_data_guru->{'id_guru'},
                    'nama_guru' => $get_data_guru->{'nama_guru'},
                    'id_hak_akses' => $get_data_guru->{'id_hak_akses'}
                ];
                $this->session->set_userdata($data_session_guru);
                redirect('Admin');
                // var_dump($this->session->userdata());
                // redirect('Admin');
            } else if ($cek_nis_siswa) {
                $data_session_siswa = [
                    'id_siswa' => $get_data_siswa->{'id_siswa'},
                    'nama_siswa' => $get_data_siswa->{'nama_siswa'},
                    'id_kelas' => $get_data_siswa->{'id_kelas'},
                    'id_jurusan' => $get_data_siswa->{'id_jurusan'},
                    'id_hak_akses' => $get_data_siswa->{'id_hak_akses'}
                ];
                $this->session->set_userdata($data_session_siswa);
                // var_dump($this->session->userdata());
                redirect('Admin');
            } else {
                echo "hem";
            }
        } else {
            redirect('Auth/index');
        }
        // if ($cek_nip_guru > 0) {
        //     $data_session_guru = [
        //         'nama_guru' => $get_data_guru->{'nama_guru'},
        //         'id_hak_akses' => $get_data_guru->{'id_hak_akses'}
        //     ];
        //     $this->session->set_userdata($data_session_guru);
        //     var_dump($this->session->userdata());
        // } elseif ($cek_nis_siswa > 0) {
        //     $data_session_siswa = [
        //         'nama_siswa' => $get_data_siswa->{'nama_siswa'},
        //         'id_hak_akses' => $get_data_siswa->{'id_hak_akses'}
        //     ];
        //     // $this->session->set_userdata($data_session_siswa);
        //     var_dump($this->session->userdata());
        // } else {
        // }

        // if ($cek_nis_siswa || $cek_nip_guru) {
        //     // is_active 0
        //     if ($cek_nis_siswa->{'is_active'} == 0 || $cek_nip_guru->{'is_active'}  == 0) {
        //         // cek pass
        //         if ($password == $cek_nis_siswa->{'password'}) {
        //             $data_siswa = [
        //                 'nama_siswa' => $cek_nip_guru->{'nama_siswa'},
        //                 'id_hak_akses' => $cek_nip_guru->{'id_hak_akses'}
        //             ];
        //             $this->session->set_userdata($data_siswa);
        //             redirect("Admin");
        //         } else if ($password == $cek_nip_guru->{'password_guru'} && $password == "0000000000000000") {
        //             $data_guru = [
        //                 'nama_guru' => $cek_nip_guru->{'nama_guru'},
        //                 'id_hak_akses' => $cek_nip_guru->{'id_hak_akses'}
        //             ];
        //             $this->session->set_userdata($data_guru);
        //             redirect("Admin");
        //         } else if ($password == $cek_nip_guru->{'password_guru'}) {
        //             $data_admin = [
        //                 'nama_guru' => $cek_nip_guru->{'nama_guru'},
        //                 'id_hak_akses' => $cek_nip_guru->{'id_hak_akses'}
        //             ];
        //             $this->session->set_userdata($data_admin);
        //             redirect("Admin");
        //         } else {
        //             $this->session->set_flashdata('flash', 'masuk');
        //             redirect('Auth/index');
        //         }
        //     } else {
        //         echo "hemm";
        //     }
        // }

        // $where = array(
        //     'username' => $username,
        //     'password' => md5($password)
        // );
        // $this->session->set_flashdata('flash', 'masuk');
        // var_dump($where);
    }

    public function login_aksi()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        // digunakan untuk validasi dari inputan user dan dibuatkan session di tiap masing masing hak akses
        // query di tiap tiap hak akses
        if ($this->form_validation->run() == false) {
            echo "gak ada data yang masuk";
            // redirect('Auth/index');
        } else {
            $this->_login();
        }
    }


    public function logout()
    {
        $this->session->sess_destroy();
        redirect('Auth/index');
    }
}

/* End of file Auth.php and path \application\controllers\Auth.php */
