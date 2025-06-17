<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('session');

        // Pastikan hanya Superadmin yang bisa mengakses fungsi ini
        if ($this->session->userdata('role') != 'superadmin') {
            redirect('login'); // Alihkan ke halaman login jika bukan Superadmin
        }
    }

    // Menampilkan halaman daftar admin ruangan
    public function index() {
        $data['admins'] = $this->User_model->get_all_admins();
        $this->load->view('user/admin_list', $data);
    }

    // Menampilkan form untuk menambah admin ruangan
    public function create() {
        // Ambil daftar ruangan untuk dipilih
        $data['rooms'] = $this->db->get('rooms')->result(); // Ambil data ruangan
        $this->load->view('user/admin_create', $data);
    }

    // Menyimpan data admin ruangan baru
    public function store() {
        $username = $this->input->post('username');
        $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        $role = 'admin_ruangan';
        $status = $this->input->post('status');
        $room_id = $this->input->post('room_id');  // Ambil room_id

        $data = [
            'username' => $username,
            'password' => $password,
            'role' => $role,
            'status' => $status,
            'room_id' => $room_id  // Simpan room_id
        ];

        $this->User_model->insert_user($data);
        redirect('user');
    }

    // Menampilkan form untuk mengedit admin ruangan
    public function edit($id) {
        $data['admin'] = $this->User_model->get_user($id);
        $data['rooms'] = $this->db->get('rooms')->result(); // Ambil data ruangan untuk dropdown
        $this->load->view('user/admin_edit', $data);
    }

    // Mengupdate data admin ruangan
    public function update($id) {
        $username = $this->input->post('username');
        $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        $status = $this->input->post('status');
        $room_id = $this->input->post('room_id');  // Ambil room_id

        $data = [
            'username' => $username,
            'password' => $password,
            'status' => $status,
            'room_id' => $room_id  // Update room_id
        ];

        $this->User_model->update_user($id, $data);
        redirect('user');
    }

    // Menghapus admin ruangan
    public function delete($id) {
        $this->User_model->delete_user($id);
        redirect('user');
    }
}
