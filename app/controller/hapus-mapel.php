<?php
session_start();
// koneksi ke database
require '../../resources/config/koneksi.php';

$id = $_GET['id'];

$koneksi->query("DELETE FROM mapel WHERE id='$id'");

$_SESSION['pesan'] = 'Data Berhasil di Hapus !';
$_SESSION['info'] = 'Berhasil !';
$_SESSION['warna'] = 'success';
echo "<script>location='../../?halaman=data-mapel';</script>"; 


?>