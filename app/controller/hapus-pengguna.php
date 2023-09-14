<?php
session_start();
require '../../resources/config/koneksi.php';

$id = $_GET['id'];
$nama = $_GET['nama'];
$hak_akses = $_GET['hak_akses'];

if ($hak_akses=='admin') {
    $_SESSION['pesan'] = 'Pengguna Deangan Hak Akses <strong>Admin</strong> Tidak Boleh Di Hapus !';
    $_SESSION['info'] = 'Peringatan !';
    $_SESSION['warna'] = 'danger';
    echo "<script>window.location=history.go(-1);</script>";
}

else {
    $koneksi->query("DELETE FROM pengguna WHERE id='$id'");

    $_SESSION['pesan'] = 'Data <strong>'.ucwords($nama).'</strong> Berhasil di hapus !';
    $_SESSION['info'] = 'Berhasil !';
    $_SESSION['warna'] = 'success';
    echo "<script>location='../../?halaman=data-pengguna';</script>"; 
}

 ?>