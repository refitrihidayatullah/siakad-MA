<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Test_session extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        var_dump($this->session->userdata());
        die;
    }
}

/* End of file Test_session.php and path \application\controllers\Test_session.php */
