<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Superadmin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Pastikan yang login adalah superadmin
        if (!$this->session->userdata('role') == 'superadmin') {
            redirect('login');
        }
        $this->load->model('User_model');
        $this->load->model('Room_model');
        $this->load->model('Guest_model');
    }

    public function index() {
        // Menampilkan dashboard Superadmin
        $data['title'] = 'Dashboard Superadmin';
        $data['admins'] = $this->User_model->get_admins();
        $data['rooms'] = $this->Room_model->get_all_rooms();
        
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('superadmin/dashboard', $data);
        $this->load->view('template_admin/footer');
    }

    public function manage_rooms() {
        // Mengelola ruangan (CRUD)
        $data['rooms'] = $this->Room_model->get_all_rooms();
        
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('superadmin/manage_rooms', $data);
        $this->load->view('template_admin/footer');
    }
    
    public function edit_room($room_id) {
        if ($this->input->post()) {
            $data = array(
                'id' => $this->input->post('id'),
                'room_name' => $this->input->post('room_name')
            );

            // Update admin lewat model
            $this->Room_model->update_room($room_id, $data);
            redirect('superadmin/manage_rooms'); // Redirect ke halaman daftar admin
        }
        // Mengelola ruangan (CRUD)
        $data['room'] = $this->Room_model->get_room_by_id($room_id);
        
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('superadmin/edit_rooms', $data);
        $this->load->view('template_admin/footer');
    }

    public function manage_admins() {
        // Mengelola admin ruangan
        $data['admins'] = $this->User_model->get_admins();
        $data['rooms'] = $this->Room_model->get_all_rooms();
        
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('superadmin/manage_admins', $data);
        $this->load->view('template_admin/footer');
    }

    // Menambahkan admin baru
    public function add_admin() {
        if ($this->input->post()) {
            // Ambil data dari form
            $data = array(
                'name' => $this->input->post('name'),
                'username' => $this->input->post('username'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT), // Enkripsi password
                'status' => 'admin_ruangan', // Set role admin
                'room_id' => $this->input->post('room_id')
            );
            // Tambah admin lewat model
            $this->User_model->add_admin($data);
            redirect('superadmin/manage_admins'); // Redirect ke halaman daftar admin
        }

        // Ambil data ruangan untuk dropdown
        $data['rooms'] = $this->Room_model->get_all_rooms();
        $this->load->view('superadmin/add_admin', $data);
    }

    // Mengedit data admin
    public function edit_admin($id) {
        if ($this->input->post()) {
            $data = array(
                'username' => $this->input->post('username'),
                'room_id' => $this->input->post('room_id')
            );

            // Jika password diisi, update password
            if ($this->input->post('password')) {
                $data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            }

            // Update admin lewat model
            $this->User_model->update_admin($id, $data);
            redirect('superadmin/manage_admins'); // Redirect ke halaman daftar admin
        }

        // Ambil data admin yang akan diedit
        $data['admin'] = $this->db->get_where('users', ['id' => $id, 'status' => 'admin_ruangan'])->row();
        $data['rooms'] = $this->Room_model->get_all_rooms();
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('superadmin/edit_admin', $data);
        $this->load->view('template_admin/footer');
    }

    // Menghapus admin
    public function delete_admin($id) {
        // Hapus admin lewat model
        $this->User_model->delete_admin($id);
        redirect('superadmin/manage_admins'); // Redirect ke halaman daftar admin
    }

    public function manage_guests() {
        // Mengambil data tamu dari model
        $data['guests'] = $this->Guest_model->get_all_guests();
        
        // Memuat halaman manage_guests
        $this->load->view('superadmin/manage_guests', $data);
    }

    public function add_room() {
        // Menambahkan ruangan
        $room_name = $this->input->post('room_name');
        $result = $this->Room_model->add_room($room_name);
        if ($result === true) {
            // Menampilkan pesan jika ruangan tidak bisa dihapus karena masih ada tamu
            $this->session->set_flashdata('add_room_success', 'Ruangan berhasil ditambahkan.');
            redirect('superadmin/manage_rooms');
        }
    }

    public function delete_room($room_id) {
        // Menghapus ruangan
        // $this->Room_model->delete_room($room_id);
        // redirect('superadmin/manage_rooms');
    
        $this->load->model('Room_model');
    
        $result = $this->Room_model->delete_room($room_id);

        if ($result === false) {
            // Menampilkan pesan jika ruangan tidak bisa dihapus karena masih ada tamu
            $this->session->set_flashdata('error', 'Ruangan ini tidak dapat dihapus karena terdapat tamu yang terdaftar.');
            redirect('superadmin/manage_rooms'); // Redirect ke halaman manajemen ruangan
        } else {
            // Jika berhasil menghapus ruangan
            $this->session->set_flashdata('success', 'Ruangan ini berhasil dihapus.');
            redirect('superadmin/manage_rooms'); // Redirect ke halaman manajemen ruangan
        }
    }

    public function assign_admin_to_room() {
        // Menugaskan admin ke ruangan
        $admin_id = $this->input->post('admin_id');
        $room_id = $this->input->post('room_id');
        $this->User_model->assign_admin_to_room($admin_id, $room_id);
        redirect('superadmin/manage_admins');
    }

    public function export_guests() {
        // Mengelola admin ruangan
        $data['admins'] = $this->User_model->get_admins();
        $data['rooms'] = $this->Room_model->get_all_rooms();
        
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('superadmin/export_guests', $data);
        $this->load->view('template_admin/footer');
    }
    
}
