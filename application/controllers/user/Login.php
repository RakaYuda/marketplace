
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user/user_model');
    }

    public function index()
    {
        $this->load->view('user/login');
    }

    public function proses()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        if ($this->user_model->login_user($username, $password)) {
            redirect('user/dashboard');
        } else {
            $this->session->set_flashdata('error', 'Username & Password salah');
            redirect('user/login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('is_login');
        redirect('user/login');
    }
}