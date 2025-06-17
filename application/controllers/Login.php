<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('session');
    }

    // Halaman Login
    public function index() {
        $this->load->view('templates/header');
        $this->load->view('templates/navigator');
        $this->load->view('login/login_form');
        $this->load->view('templates/footer');
    }

    // Verifikasi Login
    public function verify() {
        // Ambil data dari form
        $username = $this->input->post('username');
        $password = $this->input->post('password');
    
        // Cek apakah username dan password valid
        $user = $this->User_model->check_login($username, $password);
    
        if ($user) {
            // Memastikan properti status ada pada objek user
            if (isset($user->status)) {
                // Simpan data user ke session
                $this->session->set_userdata([
                    'user_id' => $user->id,
                    'name' => $user->name,
                    'username' => $user->username,
                    'role' => $user->status,
                    'room_id' => $user->room_id,
                    'room_name' => $user->room_name,
                ]);
    
                // Redirect ke halaman dashboard berdasarkan role
                if ($user->status == 'superadmin') {
                    redirect('superadmin/');
                } elseif ($user->status == 'admin_ruangan') {
                    redirect('AdminController/');
                }
            } else {
                // Jika properti 'status' tidak ditemukan
                $this->session->set_flashdata('error', 'Role pengguna tidak ditemukan!');
                redirect('login');
            }
        } else {
            // Set pesan error jika login gagal
            $this->session->set_flashdata('error', 'Username atau Password salah!');
            redirect('login');
        }
    }
    

    // Logout
    public function logout() {
        $this->session->sess_destroy();
        redirect('login');
    }
}
