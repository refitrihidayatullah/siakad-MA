<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{


    public function __construct()
    {

        parent::__construct();
        $this->load->model('Auth_model');
        // $this->load->library('form_validation');
    }

    public function index()
    {

        $this->load->view('login_form');
        // echo "test auth controller";
    }


    public function login_aksi()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        // digunakan untuk validasi dari inputan user dan dibuatkan session di tiap masing masing hak akses
        // query di tiap tiap hak akses
        if ($this->form_validation->run() != false) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $where = array(
                'username' => $username,
                'password' => md5($password)
            );
            var_dump($where);
        } else {
            echo "gak ada data yang masuk";
        }
    }

    public function logout()
    {
    }
}

/* End of file Auth.php and path \application\controllers\Auth.php */
