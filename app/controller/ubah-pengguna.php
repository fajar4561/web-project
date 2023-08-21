<?php
session_start();
// koneksi ke database
require '../../resources/config/koneksi.php';

// deklarasi variabel
$id = $_POST['id'];
$nama = $_POST['nama'];
$gender = $_POST['gender'];
$alamat = $_POST['alamat'];
$telpon = $_POST['telpon'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$hak_akses = $_POST['hak_akses'];
$foto = $_FILES['foto']['name'];
$lokasi = $_FILES['foto']['tmp_name'];
$passwordLength = strlen($password);

# ambil data yang lama user
$ambil = $koneksi->query("SELECT * FROM pengguna WHERE id='$id'");
$pecah = $ambil->fetch_assoc();

$username_lama = $pecah['username'];
$email_lama = $pecah['email'];


if ($username != $username_lama) {
	$ambil2 = $koneksi->query("SELECT * FROM pengguna WHERE username='$username'");
	$yangcocok = $ambil2->num_rows;

	if ($yangcocok ==1) {
		$_SESSION['pesan'] = 'Username  <strong>'.$username.'</strong> telah terdaftar di database, Silahkan periksa kembali';
		$_SESSION['info'] = 'peringatan !';
		$_SESSION['warna'] = 'danger';
		echo "<script>window.location=history.go(-1);</script>";
	}
	else {
		if ($email != $email_lama) {
			$ambil3 = $koneksi->query("SELECT * FROM pengguna WHERE email='$email'");
			$yangcocok2 = $ambil3->num_rows;

			if ($yangcocok2 == 1) {
				$_SESSION['pesan'] = 'Alamat email <strong> '.$email.' </strong> telah terdaftar, Silahkan periksa kembali';
				$_SESSION['info'] = 'Peringatan !';
				$_SESSION['warna'] = 'danger';
				echo "<script>window.location=history.go(-1);</script>";
			}
			else {
				if (!empty($lokasi)) {
					# update dengan photo
					if ($passwordLength < 6) {
						$_SESSION['pesan'] = 'Kata sandi minimal harus 6 karakter !';
						$_SESSION['info'] = 'Peringatan !';
						$_SESSION['warna'] = 'danger';
						echo "<script>window.location=history.go(-1);</script>";
					}
					else {
						$uniqId = uniqid();
						$fotobaru = $uniqId."_".$foto;
						move_uploaded_file($lokasi, "../../public/img/".$fotobaru);
						$koneksi->query("UPDATE pengguna SET nama='$nama', gender='$gender', alamat='$alamat', telpon='$telpon', email='$email', username='$username', password='$password', hak_akses='$hak_akses', foto='$fotobaru' WHERE id='$id' ");

						$_SESSION['pesan'] = 'Data <strong>'.ucwords($nama).'</strong> Berhasil di simpan !';
						$_SESSION['info'] = 'Berhasil !';
						$_SESSION['warna'] = 'success';
						echo "<script>location='../../?halaman=data-pengguna';</script>";
					}
				}
				else {
					# update tanpa photo
					if ($passwordLength < 6) {
						$_SESSION['pesan'] = 'Kata sandi minimal harus 6 karakter !';
						$_SESSION['info'] = 'Peringatan !';
						$_SESSION['warna'] = 'danger';
						echo "<script>window.location=history.go(-1);</script>";
					}
					else {
						$koneksi->query("UPDATE pengguna SET nama='$nama', gender='$gender', alamat='$alamat', telpon='$telpon', email='$email', username='$username', password='$password', hak_akses='$hak_akses' WHERE id='$id' ");

						$_SESSION['pesan'] = 'Data <strong>'.ucwords($nama).'</strong> Berhasil di simpan !';
						$_SESSION['info'] = 'Berhasil !';
						$_SESSION['warna'] = 'success';
						echo "<script>location='../../?halaman=data-pengguna';</script>";
					}
				}
			}
		}
		else {
			if (!empty($lokasi)) {
					# update dengan photo
				if ($passwordLength < 6) {
					$_SESSION['pesan'] = 'Kata sandi minimal harus 6 karakter !';
					$_SESSION['info'] = 'Peringatan !';
					$_SESSION['warna'] = 'danger';
					echo "<script>window.location=history.go(-1);</script>";
				}
				else {
					$uniqId = uniqid();
					$fotobaru = $uniqId."_".$foto;
					move_uploaded_file($lokasi, "../../public/img/".$fotobaru);
					$koneksi->query("UPDATE pengguna SET nama='$nama', gender='$gender', alamat='$alamat', telpon='$telpon', email='$email', username='$username', password='$password', hak_akses='$hak_akses', foto='$fotobaru' WHERE id='$id' ");

					$_SESSION['pesan'] = 'Data <strong>'.ucwords($nama).'</strong> Berhasil di simpan !';
					$_SESSION['info'] = 'Berhasil !';
					$_SESSION['warna'] = 'success';
					echo "<script>location='../../?halaman=data-pengguna';</script>";
				}
			}
			else {
					# update tanpa photo
				if ($passwordLength < 6) {
					$_SESSION['pesan'] = 'Kata sandi minimal harus 6 karakter !';
					$_SESSION['info'] = 'Peringatan !';
					$_SESSION['warna'] = 'danger';
					echo "<script>window.location=history.go(-1);</script>";
				}
				else {
					$koneksi->query("UPDATE pengguna SET nama='$nama', gender='$gender', alamat='$alamat', telpon='$telpon', email='$email', username='$username', password='$password', hak_akses='$hak_akses' WHERE id='$id' ");

					$_SESSION['pesan'] = 'Data <strong>'.ucwords($nama).'</strong> Berhasil di simpan !';
					$_SESSION['info'] = 'Berhasil !';
					$_SESSION['warna'] = 'success';
					echo "<script>location='../../?halaman=data-pengguna';</script>";	
				}
			}
		}		
	}
}
# 2. Tahap kedua
# chek apakah email telah ada
# apabila username baru tidak ada di database maka ambil data dari database user sesuai id
# chek apakah email sudah terdaftar
# apabila tidak terdafatar maka chek kembali jumlah panjang karakter password
else if ($email != $email_lama) { 
	$ambil3 = $koneksi->query("SELECT * FROM pengguna WHERE email='$email'");
	$yangcocok2 = $ambil3->num_rows;
	if ($yangcocok2 == 1) {
		$_SESSION['pesan'] = 'Alamat email <strong> '.$email.' </strong> telah terdaftar, Silahkan periksa kembali';
		$_SESSION['info'] = 'Peringatan !';
		$_SESSION['warna'] = 'danger';
		echo "<script>window.location=history.go(-1);</script>";
	}
	else {
		if (!empty($lokasi)) {
			# update dengan photo
			if ($passwordLength < 6) {
				$_SESSION['pesan'] = 'Kata sandi minimal harus 6 karakter !';
				$_SESSION['info'] = 'Peringatan !';
				$_SESSION['warna'] = 'danger';
				echo "<script>window.location=history.go(-1);</script>";
			}
			else {
				$uniqId = uniqid();
				$fotobaru = $uniqId."_".$foto;
				move_uploaded_file($lokasi, "../../public/img/".$fotobaru);
				$koneksi->query("UPDATE pengguna SET nama='$nama', gender='$gender', alamat='$alamat', telpon='$telpon', email='$email', username='$username', password='$password', hak_akses='$hak_akses', foto='$fotobaru' WHERE id='$id' ");

				$_SESSION['pesan'] = 'Data <strong>'.ucwords($nama).'</strong> Berhasil di simpan !';
				$_SESSION['info'] = 'Berhasil !';
				$_SESSION['warna'] = 'success';
				echo "<script>location='../../?halaman=data-pengguna';</script>";
			}
		}
		else {
			# update tanpa photo
			if ($passwordLength < 6) {
				$_SESSION['pesan'] = 'Kata sandi minimal harus 6 karakter !';
				$_SESSION['info'] = 'Peringatan !';
				$_SESSION['warna'] = 'danger';
				echo "<script>window.location=history.go(-1);</script>";
			}
			else {
				$koneksi->query("UPDATE pengguna SET nama='$nama', gender='$gender', alamat='$alamat', telpon='$telpon', email='$email', username='$username', password='$password', hak_akses='$hak_akses' WHERE id='$id' ");

				$_SESSION['pesan'] = 'Data <strong>'.ucwords($nama).'</strong> Berhasil di simpan !';
				$_SESSION['info'] = 'Berhasil !';
				$_SESSION['warna'] = 'success';
				echo "<script>location='../../?halaman=data-pengguna';</script>";
			}
		}
	}
}
else {
	if (!empty($lokasi)) {
		# update dengan photo
		if ($passwordLength < 6) {
			$_SESSION['pesan'] = 'Kata sandi minimal harus 6 karakter !';
			$_SESSION['info'] = 'Peringatan !';
			$_SESSION['warna'] = 'danger';
			echo "<script>window.location=history.go(-1);</script>";
		}
		else {
			$uniqId = uniqid();
			$fotobaru = $uniqId."_".$foto;
			move_uploaded_file($lokasi, "../../public/img/".$fotobaru);
			$koneksi->query("UPDATE pengguna SET nama='$nama', gender='$gender', alamat='$alamat', telpon='$telpon', email='$email', username='$username', password='$password', hak_akses='$hak_akses', foto='$fotobaru' WHERE id='$id' ");

			$_SESSION['pesan'] = 'Data <strong>'.ucwords($nama).'</strong> Berhasil di simpan !';
			$_SESSION['info'] = 'Berhasil !';
			$_SESSION['warna'] = 'success';
			echo "<script>location='../../?halaman=data-pengguna';</script>";
		}
	}
	else {
		# update tanpa photo
		if ($passwordLength < 6) {
			$_SESSION['pesan'] = 'Kata sandi minimal harus 6 karakter !';
			$_SESSION['info'] = 'Peringatan !';
			$_SESSION['warna'] = 'danger';
			echo "<script>window.location=history.go(-1);</script>";
		}
		else {
			$koneksi->query("UPDATE pengguna SET nama='$nama', gender='$gender', alamat='$alamat', telpon='$telpon', email='$email', username='$username', password='$password', hak_akses='$hak_akses' WHERE id='$id' ");

			$_SESSION['pesan'] = 'Data <strong>'.ucwords($nama).'</strong> Berhasil di simpan !';
			$_SESSION['info'] = 'Berhasil !';
			$_SESSION['warna'] = 'success';
			echo "<script>location='../../?halaman=data-pengguna';</script>";
		}
	}
}

?>