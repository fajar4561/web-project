<?php
session_start();
// koneksi ke database
require '../../resources/config/koneksi.php';

echo "<pre>";
print_r($_POST);
echo "</pre>";

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

?>