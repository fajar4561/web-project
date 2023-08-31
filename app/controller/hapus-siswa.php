<?php
session_start();
// koneksi ke database
require '../../resources/config/koneksi.php';

$nis = $_GET['nis'];

$koneksi->query("DELETE FROM siswa WHERE nis='$nis'");

$_SESSION['pesan'] = 'Data Berhasil di Hapus !';
$_SESSION['info'] = 'Berhasil !';
$_SESSION['warna'] = 'success';
echo "<script>location='../../?halaman=data-siswa';</script>"; 


?>