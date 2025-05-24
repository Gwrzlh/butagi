<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Guest_model');
        $this->load->model('Room_model');
    }

    public function index() {
        // Ambil data jumlah tamu
        $data['total_guests'] = $this->Guest_model->count_all_guests();
        $data['pending_guests'] = $this->Guest_model->count_guests_by_status('pending');
        $data['approved_guests'] = $this->Guest_model->count_guests_by_status('approved');
        $data['rejected_guests'] = $this->Guest_model->count_guests_by_status('rejected');

        $room_id = $this->session->userdata('room_id'); // Ambil ID ruangan admin
        $data['guests'] = $this->Guest_model->get_pending_guests($room_id);
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/dashboard', $data);
        $this->load->view('template_admin/footer');
    }

    public function approve($guest_id) {
        $this->db->set('status', 'approved');
        $this->db->where('id', $guest_id);
        $this->db->update('guests');
        $this->session->set_flashdata('success', 'Tamu telah disetujui.');
        redirect('AdminController/dashboard');
    }

    public function reject($guest_id) {
        $this->db->set('status', 'rejected');
        $this->db->where('id', $guest_id);
        $this->db->update('guests');
        $this->session->set_flashdata('error', 'Tamu telah ditolak.');
        redirect('AdminController/dashboard');
    }
    
    // Halaman Export
    public function export_guests() {
        // Ambil data ruangan untuk dropdown
        $data['rooms'] = $this->db->get('rooms')->result_array(); // Replace 'rooms' dengan nama tabel ruangan
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/export_guests', $data);
        $this->load->view('template_admin/footer');
    }

    public function export_guests_pdf() {
        $room_id = $this->input->post('room_id');
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');
    
        // Ubah format tanggal menjadi format yang sesuai dengan timestamp di MySQL
        $start_date = date('Y-m-d 00:00:00', strtotime($start_date));
        $end_date = date('Y-m-d 23:59:59', strtotime($end_date));
    
        // Ambil data tamu yang sudah difilter
        // $guests = $this->Guest_model->get_filtered_guests($room_id, $start_date, $end_date);

        // Ambil data tamu yang sudah difilter
        // Jika room_id kosong, ambil data tamu dari semua ruangan
        if (empty($room_id)) {
            // Ambil semua tamu dari seluruh ruangan
            $guests = $this->Guest_model->get_filtered_guests(null, $start_date, $end_date);
        } else {
            // Ambil tamu berdasarkan room_id tertentu
            $guests = $this->Guest_model->get_filtered_guests($room_id, $start_date, $end_date);
        }
    
        if (empty($guests)) {
            // Jika tidak ada data tamu, tampilkan pesan
            echo "Tidak ada tamu untuk kriteria yang dipilih.";
            return;
        }
    
        // Load TCPDF library
        $pdf = tcpdf_init();
    
        // Set properti dokumen PDF
        $pdf->SetCreator('CodeIgniter');
        $pdf->SetAuthor('Admin');
        $pdf->SetTitle('Daftar Tamu');
        $pdf->SetSubject('Export Data Tamu');
    
        // Set header dan footer dengan font yang lebih kecil dan formal
        $pdf->setHeaderFont(['times', '', 10]);
        $pdf->setFooterFont(['times', '', 8]);

         // Mengatur font utama untuk isi dokumen
        $pdf->SetFont('times', '', 9); // Font: 'times', Ukuran: 9 (lebih kecil)
        
        // Set margin normal (15mm di kiri, atas, dan kanan)
        $pdf->SetMargins(15, 15, 15); // margin kiri, atas, kanan
        $pdf->SetHeaderMargin(5); // Margin header
        $pdf->SetFooterMargin(10); // Margin footer
    
        // Mengatur ukuran kertas F4 (folio)
        $pdf->AddPage('P', 'F4'); // 'P' = Portrait (orientasi vertikal), 'F4' = ukuran kertas folio (210mm x 330mm)
    
        // Membuat HTML untuk tabel tamu
        $html = '<h3 style="text-align: center;">Daftar Tamu</h3>';
        $html .= '<table border="1" cellpadding="4">';
        $html .= '<thead>
                    <tr>
                        <th style="width: 5%;">No</th>
                        <th style="width: 10%;">Tanggal</th>
                        <th style="width: 15%;">Nama</th>
                        <th style="width: 10%;">Nomor HP</th>
                        <th style="width: 20%;">Asal Instansi</th>
                        <th style="width: 20%;">Keperluan</th>
                        <th style="width: 10%;">Bertemu dengan</th>
                        <th style="width: 10%;">Ruangan</th>
                    </tr>
                  </thead>';
        $html .= '<tbody>';
        $nomor = 1;
        foreach ($guests as $guest) {
            $html .= '<tr>
                        <td style="width: 5%;">' . $nomor++ . '</td>
                        <td style="width: 10%;">' . $guest['created_at'] . '</td>
                        <td style="width: 15%;">' . $guest['guest_name'] . '</td>
                        <td style="width: 10%;">' . $guest['phone'] . '</td>
                        <td style="width: 20%;">' . $guest['institution'] . '</td>
                        <td style="width: 20%;">' . $guest['purpose'] . '</td>
                        <td style="width: 10%;">' . $guest['admin_name'] . '</td>
                        <td style="width: 10%;">' . $guest['room_name'] . '</td>
                      </tr>';
        }
        $html .= '</tbody>';
        $html .= '</table>';
    
        // Menulis HTML ke dalam file PDF
        $pdf->writeHTML($html, true, false, true, false, '');
    
        // Tampilkan PDF di browser (Preview)
        $pdf->Output('Daftar_Tamu.pdf', 'I'); // I = Inline (ditampilkan langsung di browser)
    }
    
    
    
}
