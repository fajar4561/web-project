<?php
session_start();
// koneksi ke database
require '../../resources/config/koneksi.php';

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
	$ambil = $koneksi->query("SELECT * FROM mapel WHERE kode_mapel='$key'");
	$pecah = $ambil->fetch_assoc();

	$kode_pelajaran = $pecah['kode_mapel'];
	$nama_mapel = $pecah['nama_mapel'];
	$katagori = $pecah['katagori_mapel'];
	$kkm = $pecah['kkm'];

	// ubah data di detail rapor
	$koneksi->query("UPDATE detail_rapor SET  kkm='$kkm', nilai='$value' WHERE kode_mapel='$key' AND kode_rapor='$kode'");
	

}
	// nilai rata-rata

	$jumlah_nilai = array_sum($nilai);
	$rata = $jumlah_nilai/count($nilai);

	// ubah data rapor
	$koneksi->query("UPDATE rapor SET  tgl_rapor='$tgl', rata_rata='$rata', catatan_rapor='$catatan' WHERE kode_rapor='$kode'");

	// simpan data ke absensi
	$koneksi->query("UPDATE absensi SET ijin='$ijin', sakit='$sakit', tanpa_keterangan='$tanpa_keterangan' WHERE kode_rapor='$kode'");


	$_SESSION['pesan'] = 'Data Rapor Berhasil di ubah !';
	$_SESSION['info'] = 'Berhasil !';
	$_SESSION['warna'] = 'success';
	echo "<script>location='../../?halaman=detail-rapor&nis=".$nis."';</script>";

?>