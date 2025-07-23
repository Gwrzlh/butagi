<?php
class M_chatbot extends CI_Model {
    public function getResponse($keyword) {
        $this->db->select('keyword, response');
        $faq = $this->db->get('chatbot_faq')->result();

    foreach ($faq as $row) {
        if (stripos($keyword, $row->keyword) !== false) {
            return $row->response;
        }
    }

    return "Maaf, saya belum mengerti pertanyaan Anda.";
    }
}
?>
