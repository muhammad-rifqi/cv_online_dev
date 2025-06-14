<?php
$api_url = 'http://localhost/tcpdf/api.php'; 
$json_data = file_get_contents($api_url);
$data = json_decode($json_data, true);
// echo "<pre>";
//     print_r($data);
// echo "</pre>";
?>