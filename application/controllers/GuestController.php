<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property Guest_model $Guest_model
 * @property User_model $User_model
 * @property CI_Input $input
 * @property CI_Session $session
 * @property CI_Loader $load
 */

class GuestController extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Guest_model');
        $this->load->model('User_model');
    }

    public function index() {
        $data['guests'] = $this->Guest_model->get_all_guests();
        $data['rooms'] = $this->Guest_model->get_all_rooms();
        $this->load->view('templates/header');
        $this->load->view('templates/navigator');
        $this->load->view('guest/form', $data);
        $this->load->view('templates/footer');
    }
    
    public function guest_form() {
        $data['admins'] = $this->User_model->get_admin_with_rooms(); // Admin + Ruangan
        $data['rooms'] = $this->Guest_model->get_all_rooms();
        $this->load->view('templates/header');
        $this->load->view('templates/navigator');
        $this->load->view('guest/guest_form', $data);
        $this->load->view('templates/footer');
    }

    public function submit_form() {
        $name = $this->input->post('name');
        $phone = $this->input->post('phone');
        $institution = $this->input->post('institution');
        $purpose = $this->input->post('purpose');
        $user_id = $this->input->post('user_id');
        $photo = $this->input->post('photo');
        $signature = $this->input->post('signature');
    
        // Decode Base64
        $signature_data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $signature));

        $file_name = uniqid() . '.png';
        // Path file
        $file_path = 'assets/uploads/signatures/' . $file_name;

        // Simpan file
        file_put_contents($file_path, $signature_data);

        // Decode foto dari base64
        if ($photo) {
            $photo = str_replace('data:image/png;base64,', '', $photo);
            $photo = str_replace(' ', '+', $photo);
            $photoData = base64_decode($photo);
    
            // Simpan foto ke folder
            $photoName = uniqid() . '.png';
            file_put_contents('assets/uploads/' . $photoName, $photoData);
        }
    
        // Simpan data tamu
        $data = [
            'name' => $name,
            'phone' => $phone,
            'institution' => $institution,
            'purpose' => $purpose,
            'user_id' => $user_id,  // Simpan user_id (admin yang dituju)
            'photo' => isset($photoName) ? $photoName : null,
            'status' => 'pending',
            'signature' => $file_name,
            'created_at' => date('Y-m-d H:i:s')
        ];
    
        $this->Guest_model->add_guest($data);
        $this->session->set_flashdata('success', 'Mohon menunggu konfirmasi terlebih dahulu dengan duduk di kursi yang telah disediakan.');
        redirect('/');
    }
    

    public function today() {
        $data['guests'] = $this->Guest_model->get_today_guests();
        $this->load->view('guest/today', $data);
    }
    
}
