<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property M_chatbot $M_chatbot
 * @property CI_Input $input
 * @property CI_Loader $load
 */

class chatbotController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_chatbot');
    }

    public function index() {
        $this->load->view('chatbot/index');
    }

    public function ask() {
        $user_input = $this->input->post('chatInput');
        $response = $this->M_chatbot->getResponse($user_input);
        echo $response;
    }

}
?>