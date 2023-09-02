<?php
session_start();
// koneksi ke database
require '../../resources/config/koneksi.php';

echo "<pre>";
print_r($_POST);
echo "</pre>";

# deklarasi Variabel
$kode = $_POST['kode'];
$kelas = $_POST['kelas'];
$nama = $_POST['nama'];
$id = $_POST['id']; // id guru (kode guru)

// chek terlebih daulu apakah data berubah atau tidak
// ambil data terlebih dahulu berdasarkan kode wali kelas
$ambil_data = $koneksi->query("SELECT * FROM wali_kelas WHERE kode_wali = '$kode' ");
$data = $ambil_data->fetch_assoc();

// data kelas dan guru yang lama
$data_guru = $data['nama_guru'];
$data_kelas = $data['kelas'];

if ($kelas != $data_kelas) {
	// jika kelas berberda
	// chek terlebih dahulu apakah gurunya sama atau tidak
	if ($data_guru != $nama) {
		// jika guru berbeda
		// chek apakah guru tersebut sudah terdaftar apa belum
		
	}
}

?>