<?php
session_start();
// koneksi ke database
require '../../resources/config/koneksi.php';

$kode = $_POST['kode'];
$nama = $_POST['nama'];
$katagori = $_POST['katagori'];
$kelas = $_POST['kelas'];
$kkm = $_POST['kkm'];

$koneksi->query("UPDATE mapel SET nama_mapel='$nama',
	katagori_mapel='$katagori',
	kelas_mapel='$kelas',
	kkm='$kkm' WHERE kode_mapel='$kode'");

$_SESSION['pesan'] = 'Data Berhasil di ubah !';
$_SESSION['info'] = 'Berhasil !';
$_SESSION['warna'] = 'success';
echo "<script>location='../../?halaman=data-mapel';</script>"; 

?>