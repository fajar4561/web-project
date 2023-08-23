<?php
session_start();
// koneksi ke database
require '../../resources/config/koneksi.php';

# deklarasi Variabel
$nis = $_POST['nis'];
$nama = $_POST['nama'];
$gender = $_POST['gender'];
$tempat_lahir = $_POST['tempat_lahir'];
$tgl_lahir = $_POST['tgl_lahir'];
$agama = $_POST['agama'];
$provinsi = $_POST['provinsi'];
$kota = $_POST['kota'];
$kecamatan = $_POST['Kecamatan'];
$kelurahan = $_POST['Kelurahan'];
$alamat = $_POST['alamat'];
$kelas = $_POST['kelas'];
$semester = $_POST['semester'];
$tahun_ajaran = $_POST['tahun_ajaran'];
$status_siswa = $_POST['status_siswa'];
$nama_wali = $_POST['nama_wali'];
$telpon = $_POST['telpon'];
$foto = $_FILES['foto']['name'];

// cek apakah formaat foto sudah sesuai
$allowedExtensions = ["jpg", "jpeg", "png", "gif"]; // Format gambar yang diperbolehkan
$uploadedFile = $foto;
$extension = pathinfo($uploadedFile, PATHINFO_EXTENSION);

if (in_array(strtolower($extension), $allowedExtensions)) {
	$lokasi = $_FILES['foto']['tmp_name'];
	$uniqId = uniqid();
	$fotobaru = $uniqId."_".$foto;

	// simpan data
	$koneksi->query("INSERT INTO siswa (id,nis,nama_siswa,gender_siswa,agama_siswa,tempat_lahir,tgl_lahir,provinsi,kabupaten,kecamatan,kelurahan,alamat,kelas,semester,tahun_semester,status_siswa,wali_siswa,telpon_wali,foto_siswa) VALUES (null, '$nis',
		'$nama',
		'$gender',
		'$agama',
		'$tempat_lahir',
		'$tgl_lahir',
		'$provinsi',
		'$kota',
		'$kecamatan',
		'$kelurahan',
		'$alamat',
		'$kelas',
		'$semester',
		'$tahun_ajaran',
		'$status_siswa',
		'$nama_wali',
		'$telpon',
		'$fotobaru')");

	// Simpan foto ke folder public
	move_uploaded_file($lokasi, "../../public/img/".$fotobaru);

	// alihkan halaman
		$_SESSION['pesan'] = 'Data <strong>'.$nama.'</strong> Berhasil di simpan !';
		$_SESSION['info'] = 'Berhasil !';
		$_SESSION['warna'] = 'success';
		echo "<script>location='../../?halaman=data-siswa';</script>"; 
}
else {
	$_SESSION['pesan'] = 'Format file tidak diizinkan. Hanya format gambar yang diperbolehkan !';
	$_SESSION['info'] = 'Peringatan !';
	$_SESSION['warna'] = 'danger';
	echo "<script>window.location=history.go(-1);</script>";
}

?>