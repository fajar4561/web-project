<?php
session_start();
// koneksi ke database
require '../../resources/config/koneksi.php';

// deklarasi variabel

// deklarasi variabel
$kode =  $_POST['kode'];
$nis = $_POST['nis'];
$tgl = $_POST['tgl'];
$catatan = $_POST['catatan'];
$kode_mapel = $_POST['kode_mapel'];
$nilai = $_POST['nilai'];

// absensi
$ijin = $_POST['ijin'];
$sakit = $_POST['sakit'];
$tanpa_keterangan = $_POST['tanpa_keterangan'];


// ambil data nis
$ambil_siswa = $koneksi->query("SELECT * FROM siswa WHERE nis='$nis'");
$data_siswa = $ambil_siswa->fetch_assoc();

$nama_siswa = $data_siswa['nama_siswa'];
$kelas = $data_siswa['kelas'];
$semester = $data_siswa['semester'];
$tahun = $data_siswa['tahun_semester'];


foreach ($nilai as $key => $value) {

	// ambil data
	$ambil = $koneksi->query("SELECT * FROM mapel WHERE id='$key'");
	$pecah = $ambil->fetch_assoc();

	$kode_pelajaran = $pecah['kode_mapel'];
	$nama_mapel = $pecah['nama_mapel'];
	$katagori = $pecah['katagori_mapel'];
	$kkm = $pecah['kkm'];

	// simpan data ke detail_rapor
	$koneksi->query("INSERT INTO detail_rapor (id,kode_rapor,kode_mapel,nama_mapel,katagori_mapel,kkm,nilai) VALUES (null, '$kode', '$kode_pelajaran', '$nama_mapel', '$katagori', '$kkm', '$value')");

}
	// nilai rata-rata
	$jumlah_nilai = array_sum($nilai);
	$rata = $jumlah_nilai/count($nilai);

	// simpan data ke database rapor
	$koneksi->query("INSERT INTO rapor (id,kode_rapor,tgl_rapor,nis,nama_siswa,kelas_rapor,semester_rapor,tahun_rapor,rata_rata,catatan_rapor) VALUES (null, '$kode', '$tgl', '$nis', '$nama_siswa', '$kelas', '$semester', '$tahun', '$rata', '$catatan')");

	// simpan data ke absensi
	$koneksi->query("INSERT INTO absensi (id,kode_rapor,ijin,sakit,tanpa_keterangan) VALUES(null, '$kode', '$ijin', '$sakit', '$tanpa_keterangan')");


	$_SESSION['pesan'] = 'Data Rapor Berhasil di simpan !';
	$_SESSION['info'] = 'Berhasil !';
	$_SESSION['warna'] = 'success';
	echo "<script>location='../../?halaman=detail-rapor&nis=".$nis."';</script>";


?>