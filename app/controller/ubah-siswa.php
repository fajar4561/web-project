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
$provinsi = $_POST['provinsi2'];
$kota = $_POST['kota2'];
$kecamatan = $_POST['kecamatan2'];
$kelurahan = $_POST['kelurahan2'];
$alamat = $_POST['alamat'];
$kelas = $_POST['kelas'];
$semester = $_POST['semester'];
$tahun_ajaran = $_POST['tahun_ajaran'];
$status_siswa = $_POST['status_siswa'];
$nama_wali = $_POST['nama_wali'];
$telpon = $_POST['telpon'];
$foto = $_FILES['foto']['name'];


// ubah data siswa
// cek terlebih dahulu apakah upload foto apa tidak
$lokasi = $_FILES['foto']['tmp_name'];

if (!empty($lokasi)) {
	// jika lokasi tidak kosong maka,
	// cek format file gambar
	$allowedExtensions = ["jpg", "jpeg", "png", "gif"]; // Format gambar yang diperbolehkan
	$uploadedFile = $foto;
	$extension = pathinfo($uploadedFile, PATHINFO_EXTENSION);

	if (in_array(strtolower($extension), $allowedExtensions)) {
		// apabila format foto sesuai
		// rename foto ke id uniq
		$lokasi = $_FILES['foto']['tmp_name'];
		$uniqId = uniqid();
		$fotobaru = $uniqId."_".$foto;

		// simpan data
		$koneksi->query("UPDATE siswa SET nama_siswa ='$nama',
			gender_siswa='$gender',
			agama_siswa = '$agama',
			tempat_lahir ='$tempat_lahir',
			tgl_lahir = '$tgl_lahir',
			provinsi = '$provinsi',
			kabupaten= '$kota',
			kecamatan = '$kecamatan',
			kelurahan = '$kelurahan',
			alamat = '$alamat',
			kelas = '$kelas',
			semester = '$semester',
			tahun_semester = '$tahun_ajaran',
			status_siswa = '$status_siswa',
			wali_siswa = '$nama_wali',
			telpon_wali = '$telpon',
			foto_siswa = '$fotobaru'
			WHERE nis = '$nis'
			");

		// alihkan halaman ke halaman detail siswa
		$_SESSION['pesan'] = 'Data <strong>'.$nama.'</strong> Berhasil di ubah !';
		$_SESSION['info'] = 'Berhasil !';
		$_SESSION['warna'] = 'success';
		echo "<script>location='../../?halaman=detail-siswa&nis=".$nis."';</script>"; 
	}
	else {
		// apabila format foto tidak sesuai
		// alihkan halaman ke halaman sebelumnya
		$_SESSION['pesan'] = 'Format file tidak diizinkan. Hanya format gambar yang diperbolehkan !';
		$_SESSION['info'] = 'Peringatan !';
		$_SESSION['warna'] = 'danger';
		echo "<script>window.location=history.go(-1);</script>";
	}
}
else {
	// apabila tidak melampirkan foto
	// simpan data tanpa foto
	$koneksi->query("UPDATE siswa SET nama_siswa ='$nama',
			gender_siswa='$gender',
			agama_siswa = '$agama',
			tempat_lahir ='$tempat_lahir',
			tgl_lahir = '$tgl_lahir',
			provinsi = '$provinsi',
			kabupaten= '$kota',
			kecamatan = '$kecamatan',
			kelurahan = '$kelurahan',
			alamat = '$alamat',
			kelas = '$kelas',
			semester = '$semester',
			tahun_semester = '$tahun_ajaran',
			status_siswa = '$status_siswa',
			wali_siswa = '$nama_wali',
			telpon_wali = '$telpon'
			WHERE nis = '$nis'
			");

		// alihkan halaman ke halaman detail siswa
		$_SESSION['pesan'] = 'Data <strong>'.$nama.'</strong> Berhasil di ubah !';
		$_SESSION['info'] = 'Berhasil !';
		$_SESSION['warna'] = 'success';
		echo "<script>location='../../?halaman=detail-siswa&nis=".$nis."';</script>"; 

}

?>