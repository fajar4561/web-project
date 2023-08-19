<?php
if (isset($_GET['halaman'])) 
{
	if ($_GET["halaman"] == "beranda") {
		require "app/views/base.php";
	}
	else if ($_GET["halaman"] == "tambah-pengguna") {
		require "app/views/tambah-pengguna.php";
	}
	else {
		echo "<script>location='?halaman=beranda';</script>";
	}
}
else {
		echo "<script>location='?halaman=beranda';</script>";
	}