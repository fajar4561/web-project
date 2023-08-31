<?php
session_start();
// koneksi ke database
require '../../resources/config/koneksi.php';

$kode = $_POST['kode'];
$kelas = $_POST['kelas'];
$nama = $_POST['nama'];
$id = $_POST['id']; // id guru (kode guru)

// chek terlebih dahulu apakah sudah ada yang terdaftar sebagai wali kelas di 
$ambil=$koneksi->query("SELECT * FROM wali_kelas WHERE kode_guru='$id'");
$yangcocok = $ambil->num_rows;

$pecah=$ambil->fetch_assoc();

if ($yangcocok==1) {
	// jika sudah terdaftar maka,
	$_SESSION['pesan'] = 'Guru Atas nama  <strong>'.$nama.'</strong> telah terdaftar di database, sebagai wali kelas '.$pecah['kelas'];
	$_SESSION['info'] = 'peringatan !';
	$_SESSION['warna'] = 'danger';
	echo "<script>window.location=history.go(-1);</script>";
}
else {
	// selain itu, simpan data
	$koneksi->query("INSERT INTO wali_kelas (id,kode_wali,kelas,kode_guru,nama_guru) VALUES(null, '$kode', '$kelas', '$id', '$nama')");

	// alihkan halaman ke halaman data wali kelas
	$_SESSION['pesan'] = 'Data Berhasil di simpan !';
	$_SESSION['info'] = 'Berhasil !';
	$_SESSION['warna'] = 'succsess';
	echo "<script>location='../../?halaman=data-wali-kelas';</script>"; 

}



?>