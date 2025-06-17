<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Room_model extends CI_Model {

    // Menampilkan semua data ruangan
    public function get_all_rooms() {
        // Mengambil semua data dari tabel rooms
        return $this->db->get('rooms')->result();
    }

    // Menambahkan ruangan baru
    public function add_room($room_name) {
        // Data yang akan dimasukkan ke dalam tabel rooms
        $data = [
            'room_name' => $room_name
        ];
        // Menyimpan data ke tabel rooms
        return $this->db->insert('rooms', $data);
    }

    // Mengupdate data ruangan
    public function update_rooms($room_id, $room_name) {
        // Data yang akan diperbarui
        $data = [
            'room_name' => $room_name
        ];
        // Melakukan update data pada tabel rooms berdasarkan id
        $this->db->where('id', $room_id);
        return $this->db->update('rooms', $data);
    }

    public function update_room($room_id, $data) {
        $this->db->where('id', $room_id);
        return $this->db->update('rooms', $data);
    }
    // Fungsi untuk menghapus data ruangan
    public function delete_room($room_id) {
        // Cek apakah ada tamu yang terdaftar di ruangan tersebut
        $this->db->where('room_id', $room_id);
        $guest_count = $this->db->count_all_results('guests'); // Menghitung jumlah tamu di ruangan tersebut

        if ($guest_count > 0) {
            // Jika ada tamu, tidak dapat menghapus ruangan
            return false; // Mengembalikan false jika ada tamu
        }

        // Jika tidak ada tamu, lanjutkan penghapusan ruangan
        $this->db->where('id', $room_id);
        return $this->db->delete('rooms'); // Menghapus ruangan
    }


    // Mendapatkan data ruangan berdasarkan id
    public function get_room_by_id($room_id) {
        // Mengambil data ruangan berdasarkan id
        $this->db->where('id', $room_id);
        return $this->db->get('rooms')->row();
    }
}
