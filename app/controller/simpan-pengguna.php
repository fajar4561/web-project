<?php
session_start();
// koneksi ke database
require '../../resources/config/koneksi.php';

// deklarasi variabel
$nama = $_POST['nama'];
$gender = $_POST['gender'];
$alamat = $_POST['alamat'];
$telpon = $_POST['telpon'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$hak_akses = $_POST['hak_akses'];
$foto = $_FILES['foto']['name'];
$passwordLength = strlen($password);

# Chek apakah username / email sudah terdaftar
$ambil = $koneksi->query("SELECT * FROM pengguna WHERE username='$username'");
$yangcocok = $ambil->num_rows;

$ambil2 = $koneksi->query("SELECT * FROM pengguna WHERE email='$email'");
$yangcocok2 = $ambil2->num_rows;

if ($yangcocok==1) {
	$_SESSION['pesan'] = 'Username  <strong>'.$username.'</strong> telah terdaftar di database, Silahkan periksa kembali';
	$_SESSION['info'] = 'peringatan !';
	$_SESSION['warna'] = 'danger';
	echo "<script>window.location=history.go(-1);</script>";
}
else if ($yangcocok2==1) {
	$_SESSION['pesan'] = 'Alamat email <strong> '.$email.' </strong> telah terdaftar, Silahkan periksa kembali';
	$_SESSION['info'] = 'Peringatan !';
	$_SESSION['warna'] = 'danger';
	echo "<script>window.location=history.go(-1);</script>";
}
else if ($passwordLength < 6) {
	$_SESSION['pesan'] = 'Kata sandi minimal harus 6 karakter !';
	$_SESSION['info'] = 'Peringatan !';
	$_SESSION['warna'] = 'danger';
	echo "<script>window.location=history.go(-1);</script>";
}
else {
	// chek format foto
	$allowedExtensions = ["jpg", "jpeg", "png", "gif"]; // Format gambar yang diperbolehkan
	$uploadedFile = $foto;
	$extension = pathinfo($uploadedFile, PATHINFO_EXTENSION);
	if (in_array(strtolower($extension), $allowedExtensions)) {
    	$lokasi = $_FILES['foto']['tmp_name'];
    	$uniqId = uniqid();
		$fotobaru = $uniqId."_".$foto;
		$koneksi->query("INSERT INTO pengguna (id,nama,gender,alamat,telpon,email,username,password,hak_akses,foto) VALUES(null, '$nama', '$gender', '$alamat', '$telpon', '$email', '$username', '$password', '$hak_akses', '$fotobaru')");
		move_uploaded_file($lokasi, "../../public/img/".$fotobaru);

		// alihkan halaman
		$_SESSION['pesan'] = 'Data <strong>'.$nama.'</strong> Berhasil di simpan !';
		$_SESSION['info'] = 'Berhasil !';
		$_SESSION['warna'] = 'success';
		echo "<script>location='../../?halaman=data-pengguna';</script>"; 

    } else {
    	$_SESSION['pesan'] = 'Format file tidak diizinkan. Hanya format gambar yang diperbolehkan !';
    	$_SESSION['info'] = 'Peringatan !';
    	$_SESSION['warna'] = 'danger';
    	echo "<script>window.location=history.go(-1);</script>";
    }
}






?>