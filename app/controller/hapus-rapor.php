<?php
session_start();
require '../../resources/config/koneksi.php';

$nis = $_GET['nis'];
$kode_rapor = $_GET['kode_rapor'];

// hapus data dari database rapor
$koneksi->query("DELETE FROM rapor WHERE kode_rapor='$kode_rapor'");
// hapus data dari detail rapor
$koneksi->query("DELETE FROM detail_rapor WHERE kode_rapor='$kode_rapor'");
// hapus data absensi
$koneksi->query("DELETE FROM absensi WHERE kode_rapor='$kode_rapor'");


// alihkan halaman
$_SESSION['pesan'] = 'Data Rapor Dengan Kode <strong>'.ucwords($kode_rapor).'</strong> Berhasil di hapus !';
$_SESSION['info'] = 'Berhasil !';
$_SESSION['warna'] = 'success';
echo "<script>window.location=history.go(-1);</script>";


 ?>