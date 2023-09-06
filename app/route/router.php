<?php
if (isset($_GET['halaman'])) 
{
	if ($_GET["halaman"] == "beranda") {
		require "app/views/base.php";
	}
	else if ($_GET["halaman"] == "tambah-pengguna") {
		require "app/views/tambah-pengguna.php";
	}
	else if ($_GET["halaman"] == "data-pengguna") {
		require "app/views/data-pengguna.php";
	}
	else if ($_GET["halaman"] == "tambah-siswa") {
		require "app/views/tambah-siswa.php";
	}
	else if ($_GET["halaman"] == "data-siswa") {
		require "app/views/data-siswa.php";
	}
	else if ($_GET["halaman"] == "detail-siswa") {
		require "app/views/detail-siswa.php";
	}
	else if ($_GET["halaman"] == "tambah-wali-kelas") { // digunakan untuk 
		require "app/views/tambah-wali-kelas.php";
	}
	else if ($_GET["halaman"] == "data-wali-kelas") { 
		require "app/views/data-wali-kelas.php";
	}
	else if ($_GET["halaman"] == "tambah-mapel") { 
		require "app/views/tambah-mapel.php";
	}
	else if ($_GET["halaman"] == "data-mapel") { 
		require "app/views/data-mapel.php";
	}
	else if ($_GET["halaman"] == "input-rapor") { 
		require "app/views/input-raport.php";
	}
	else if ($_GET["halaman"] == "isi-rapor") { 
		require "app/views/isi-rapor.php";
	}
	else if ($_GET["halaman"] == "detail-rapor") { 
		require "app/views/detail-rapor.php";
	}
	else {
		echo "<script>location='?halaman=beranda';</script>";
	}
}
else {
		echo "<script>location='?halaman=beranda';</script>";
	}