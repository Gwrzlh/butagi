<?php
function tcpdf_init() {
    require_once APPPATH . 'third_party/tcpdf/tcpdf.php';
    $pdf = new TCPDF();
    return $pdf;
}
