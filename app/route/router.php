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
	else {
		echo "<script>location='?halaman=beranda';</script>";
	}
}
else {
		echo "<script>location='?halaman=beranda';</script>";
	}