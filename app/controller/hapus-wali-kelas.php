<?php
session_start();
// koneksi ke database
require '../../resources/config/koneksi.php';

$kode = $_GET['kode'];

$koneksi->query("DELETE FROM wali_kelas WHERE kode_wali='$kode'");

$_SESSION['pesan'] = 'Data Berhasil di Hapus !';
$_SESSION['info'] = 'Berhasil !';
$_SESSION['warna'] = 'success';
echo "<script>location='../../?halaman=data-wali-kelas';</script>"; 


?>