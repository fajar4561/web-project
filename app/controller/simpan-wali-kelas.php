<?php
session_start();
// koneksi ke database
require '../../resources/config/koneksi.php';

echo "<pre>";
print_r($_POST);
echo "</pre>";

$kode = $_POST['kode'];
$kelas = $_POST['nama'];
$id = $_POST['id']; // id guru

?>