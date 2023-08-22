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
	else {
		echo "<script>location='?halaman=beranda';</script>";
	}
}
else {
		echo "<script>location='?halaman=beranda';</script>";
	}