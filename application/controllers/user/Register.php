<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user/user_model');
    }

    public function index()
    {
        $this->load->view('user/register');
    }

    public function proses()
    {
        $this->form_validation->set_rules('username', 'username', 'trim|required|min_length[1]|max_length[255]|is_unique[mp_user.username]');
        $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[1]|max_length[255]');
        $this->form_validation->set_rules('name', 'name', 'trim|required|min_length[1]|max_length[255]');
        if ($this->form_validation->run() == true) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $name = $this->input->post('name');
            $this->user_model->register($username, $password, $name);
            $this->session->set_flashdata('success_register', 'Proses Pendaftaran User Berhasil');
            redirect('user/login');
        } else {
            $this->session->set_flashdata('error', validation_errors());
            redirect('user/register');
        }
    }
}
