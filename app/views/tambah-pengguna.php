<ul class="breadcrumb">
	<li class="breadcrumb-item"><a href="?halaman=beranda">BERANDA</a></li>
	<li class="breadcrumb-item active"><?=strtoupper($title)?></li>
</ul>

<h1 class="page-header">
	Halaman <?=ucwords($title)?> <small>halaman ini digunakan untuk menambahdakan dafatar pengguna baru yang dapat mengakses sistem</small>
</h1>

<hr class="mb-4">

<?php 
    if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
    	echo '<div id="pesan" class="alert alert-'.$_SESSION['warna'].'"><strong>'.$_SESSION['info'].'</strong> '.$_SESSION['pesan'].' </div>';
    }
    $_SESSION['pesan'] = '';
?>

<div class="card">
	<div class="card-body">
		<form method="post" enctype="multipart/form-data" action="app/controller/simpan-pengguna.php">
			<div class="mb-3 row">
				<label for="inputEmail3" class="col-sm-2 col-form-label">Nama Pengguna</label>
				<div class="col-sm-7">
					<input type="text" class="form-control" name="nama" placeholder="Nama Lengkap Pengguna" required>
				</div>
			</div>
			<fieldset class="mb-2">
				<div class="row">
					<label class="col-form-label col-sm-2 pt-0">Jenis Kelamin</label>
					<div class="col-sm-3">
						<div class="form-check">
							<input class="form-check-input" type="radio" name="gender" id="gridRadios1" value="Laki-laki" checked>
							<label class="form-check-label" for="gridRadios1">
								Laki-laki
							</label>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-check">
							<input class="form-check-input" type="radio" name="gender" id="gridRadios2" value="Perempuan">
							<label class="form-check-label" for="gridRadios2">
								Perempuan
							</label>
						</div>
					</div>
				</div>
			</fieldset>
			<div class="mb-3 row">
				<label for="inputEmail3" class="col-sm-2 col-form-label">Alamat</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" name="alamat" placeholder="Alamat Lengkap Pengguna" required>
				</div>
			</div>
			<div class="mb-3 row">
				<label for="inputEmail3" class="col-sm-2 col-form-label">No Telepon</label>
				<div class="col-sm-7">
					<input type="text" class="form-control" name="telpon" placeholder="No Telephone / Whatsapp Pengguna" required>
				</div>
			</div>
			<div class="mb-3 row">
				<label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
				<div class="col-sm-7">
					<input type="email" class="form-control" name="email" placeholder="Alamat email pengguna" required>
				</div>
			</div>
			<div class="mb-3 row">
				<label for="inputEmail3" class="col-sm-2 col-form-label">Username</label>
				<div class="col-sm-7">
					<input type="text" class="form-control" name="username" placeholder="Username pengguna untuk login sistem" required>
				</div>
			</div>
			<div class="mb-3 row">
				<label for="inputEmail3" class="col-sm-2 col-form-label">Password</label>
				<div class="col-sm-4">
					<input type="password" class="form-control" name="password" id="password" placeholder="Kata Sandi Pengguna" required>
				</div>
				<div class="col-sm-5">
					<input type="password" class="form-control" name="password" id="konfirmasiPassword" placeholder="Ulangi Kata Sandi" required onkeyup="confirmPassword()">
					<div class="invalid-feedback">
                      * Password tidak sama!<br>
                      * Pastikan password sama !<br>
                      * Pastikan Jumlah password 6 karakter
                    </div>
				</div>
				<div class="col-sm-2">
					
				</div>
				<div class="col-sm-4 mt-2">
					<div class="form-check form-check-inline switch">
						<input type="checkbox" class="form-check-input" id="lihatPassword" onclick="showHide()">
						<label class="form-label" for="lihatPassword">Lihat Password</label>
					</div>
				</div>
			</div>
			<div class="mb-3 row">
				<label for="inputEmail3" class="col-sm-2 col-form-label">Hak Akses</label>
				<div class="col-sm-7">
					<select class="form-control" id="ex-basic" name="hak_akses" required>
						<option value="admin">Admin</option>
						<option value="guru">Guru</option>
						<option value="kepala sekolah">Kepala Sekolah</option>
					</select>
				</div>
			</div>
			<div class="mb-3 row">
				<label for="inputEmail3" class="col-sm-2 col-form-label">Foto Profil Pengguna</label>
				<div class="col-sm-7">
					<input type="file" class="form-control" id="defaultFile" name="foto" required>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-sm-4 offset-sm-2">
					<button type="submit" class="btn btn-primary" name="btn_simpan">Simpan</button>
					<button type="reset" class="btn btn-danger">Batal</button>
				</div>
			</div>
		</form>
	</div>
	<div class="hljs-container rounded-bottom">
		<pre><code class="xml" data-url="assets/data/form-elements/code-11.json"></code></pre>
	</div>
</div>
<script src="resources/config/tambah_user.js"></script>
<script src="resources/config/notif.js"></script>
<script src="resources/config/info.js"></script>