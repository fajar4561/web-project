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

// chek terlebih dahulu apakah kelas sudah memiliki wali kelas atau tidak
$ambil2=$koneksi->query("SELECT * FROM wali_kelas WHERE kelas='$kelas'");
$yangcocok2 = $ambil2->num_rows;

if ($yangcocok==1) {
	// jika sudah terdaftar maka,
	$_SESSION['pesan'] = 'Guru Atas nama  <strong>'.$nama.'</strong> telah terdaftar di database, sebagai wali kelas ';
	$_SESSION['info'] = 'peringatan !';
	$_SESSION['warna'] = 'danger';
	echo "<script>location='../../?halaman=data-wali-kelas';</script>"; 
}
else if ($yangcocok2==1) {
	// chek apakah wali yang terdaftar sama seperti yang diinputkan
	// jika sudah terdaftar maka,
 	$_SESSION['pesan'] = 'Kelas  <strong>'.$kelas.'</strong> telah memiliki Wali kelas, <strong>'.$nama_wali_terdaftar.'</strong>';
 	$_SESSION['info'] = 'peringatan !';
 	$_SESSION['warna'] = 'danger';
 	echo "<script>location='../../?halaman=data-wali-kelas';</script>"; 
}
else {
	// cek apakah kelas sudah memiliki wali kelas atau belum
	if ($yangcocok2==1) {
		// apabila kelas sudah memiliki wali kelas maka
		// ambil data siapa wali kelasnya
		$pecah=$ambil2->fetch_assoc();
		$nama_wali_terdaftar = $pecah['nama_guru'];
		$_SESSION['pesan'] = 'Kelas  <strong>'.$kelas.'</strong> telah memiliki Wali kelas, <strong>'.$nama_wali_terdaftar.'</strong>';
		$_SESSION['info'] = 'peringatan !';
		$_SESSION['warna'] = 'danger';
		echo "<script>location='../../?halaman=data-wali-kelas';</script>"; 
		
	}
	else {
		// selain itu simpan data
		$koneksi->query("INSERT INTO wali_kelas (id,kode_wali,kelas,kode_guru,nama_guru) VALUES(null, '$kode', '$kelas', '$id', '$nama')");

		// alihkan halaman ke halaman data wali kelas
		$_SESSION['pesan'] = 'Data Berhasil di simpan !';
		$_SESSION['info'] = 'Berhasil !';
		$_SESSION['warna'] = 'success';
		echo "<script>location='../../?halaman=data-wali-kelas';</script>"; 
	}
}

?>