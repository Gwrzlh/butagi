<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    // Get all users
    public function get_all_users() {
        return $this->db->get('users')->result();
    }

    public function assign_admin_to_room($admin_id, $room_id) {
        // Data yang akan diupdate
        $data = array(
            'room_id' => $room_id
        );
        
        // Update room_id pada user (admin) berdasarkan id
        $this->db->where('id', $admin_id);
        return $this->db->update('users', $data);  // Update data admin
    }

    public function get_admins() {
        // Ambil data admin beserta nama ruangan
        $this->db->select('users.*, rooms.room_name');
        $this->db->from('users');
        $this->db->join('rooms', 'rooms.id = users.room_id', 'left');
        $this->db->where('users.status', 'admin_ruangan');
        return $this->db->get()->result();
    }

    public function get_admin_with_rooms()
    {
        $this->db->select('users.id, users.name as admin_name, rooms.room_name as room_name, rooms.id as room_id');
        $this->db->from('users');
        $this->db->join('rooms', 'users.room_id = rooms.id', 'left');
        return $this->db->get()->result();
    }


    // Get user by ID
    public function get_user($id) {
        return $this->db->get_where('users', ['id' => $id])->row();
    }

    // Verifikasi login
    public function check_login($username, $password) {

        $this->db->select('users.*, rooms.room_name as room_name'); // Ambil data user dan room_name
        $this->db->from('users');
        $this->db->join('rooms', 'users.room_id = rooms.id', 'left'); // Join tabel rooms
        $this->db->where('users.username', $username);
        $query = $this->db->get();  
        $user = $query->row();

        if ($user) {
            // Verifikasi password menggunakan password_verify
            if (password_verify($password, $user->password)) {
                return $user; // Jika password cocok, kembalikan data user
            } else {
                return false; // Password salah
            }
        }

        return false; // User tidak ditemukan
        }

    // Menambah admin baru
    public function add_admin($data) {
        $this->db->insert('users', $data);
        return $this->db->insert_id();
    }

    // Mengupdate data admin
    public function update_admin($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('users', $data);
    }

    // Menghapus admin
    public function delete_admin($id) {
        $this->db->where('id', $id);
        return $this->db->delete('users');
    }

    // Get all admin ruangan with room_id
    public function get_all_admins() {
        return $this->db->get_where('users', ['role' => 'admin_ruangan'])->result();
    }
}