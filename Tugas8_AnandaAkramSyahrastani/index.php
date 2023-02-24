<?php 

// File root dari project Tugas8_AnandaAkramSyahrastani

include './application/controller/Selling.php'; // root controller

$root = new Selling(); // instansiasi object dari Class Controller Selling
$root->index(); // jalankan method index dari Class Controller Selling

?>