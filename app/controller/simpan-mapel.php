<?php
session_start();
// koneksi ke database
require '../../resources/config/koneksi.php';

$kode = $_POST['kode'];
$nama = $_POST['nama'];
$katagori = $_POST['katagori'];
$kelas = $_POST['kelas'];
$kkm = $_POST['kkm'];

// ambil data terlebih dahulu apakah mata pelajaran sudah terdaftar
$ambil = $koneksi->query("SELECT * FROM mapel WHERE nama_mapel LIKE '%".$nama."%' AND kelas_mapel='$kelas'");
$pecah = $ambil->fetch_assoc();
$yangcocok = $ambil->num_rows;

if ($yangcocok==1) {
	$_SESSION['pesan'] = 'Mata Pelajaran  <strong>'.$nama.' kelas '.$kelas.'</strong> telah terdaftar di database, Silahkan periksa kembali';
	$_SESSION['info'] = 'peringatan !';
	$_SESSION['warna'] = 'danger';
	echo "<script>window.location=history.go(-1);</script>";
}
else {
	// simpan data
	$koneksi->query("INSERT INTO mapel (id,kode_mapel,nama_mapel,katagori_mapel,kelas_mapel,kkm) VALUES (null, '$kode', '$nama', '$katagori', '$kelas', '$kkm')");

	$_SESSION['pesan'] = 'Data Berhasil di simpan !';
	$_SESSION['info'] = 'Berhasil !';
	$_SESSION['warna'] = 'success';
	echo "<script>location='../../?halaman=data-mapel';</script>"; 
}


?>