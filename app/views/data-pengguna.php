<ul class="breadcrumb">
	<li class="breadcrumb-item"><a href="?halaman=beranda">BERANDA</a></li>
	<li class="breadcrumb-item active"><?=strtoupper($title)?></li>
</ul>

<div class="row">
	<div class="col-md-10 col-sm-9">
		<h1 class="page-header">
			Halaman <?=ucwords($title)?>
		</h1>
	</div>
	<div class="col-md-2 col-sm-3">
		<div class="ms-auto">
			<a href="?halaman=tambah-pengguna" class="btn btn-theme"><i class="fa fa-plus-circle fa-fw me-1"></i> Pengguna</a>
		</div>
	</div>
</div>

<hr class="mb-4">

<?php 
    if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
    	echo '<div id="pesan" class="alert alert-'.$_SESSION['warna'].'"><strong>'.$_SESSION['info'].'</strong> '.$_SESSION['pesan'].' </div>';
    }
    $_SESSION['pesan'] = '';
?>

<div class="card">
	<div class="card-body">
		<table id="datatableDefault" class="table text-nowrap w-100">
			<thead>
				<tr>
					<th>No</th>
					<th> </th>
					<th>Nama</th>
					<th>Email</th>
					<th>No Telepon</th>
					<th>Hak Akses</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
                  require 'resources/config/koneksi.php';
                  $ambildata = $koneksi->query("SELECT * FROM pengguna ORDER BY nama ASC");
                  $no = 1;
                  while ($data = mysqli_fetch_assoc($ambildata)) { 
                ?>
					<tr>
						<td><?=$no++?></td>
						<td>
							<div class="w-40px h-40px d-flex align-items-center justify-content-center ms-n1">
								<img src="public/img/<?=$data['foto']?>" alt="" class="ms-100 mh-100 rounded-circle">
							</div>
						</td>
						<td><?=ucwords($data['nama'])?></td>
						<td><?=$data['email']?></td>
						<td><?=$data['telpon']?></td>
						<td>
							<?php  if ($data['hak_akses']=='admin') { ?>
								<span class="badge bg-primary"><?=ucwords($data['hak_akses'])?></span>
							<?php } else if ($data['hak_akses']=='kepala sekolah') { ?>
								<span class="badge bg-info"><?=ucwords($data['hak_akses'])?></span>
							<?php } else { ?>
								<span class="badge bg-danger"><?=ucwords($data['hak_akses'])?></span>
							<?php } ?>
						</td>
						<td>
							<div class="dropdown">
								<button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">

								</button>
								<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
									<li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#ubah<?=$data['id']?>">Ubah</a></li>
									<li><a class="dropdown-item" href="app/controller/hapus-pengguna?id=<?=$data['id']?>&nama=<?=$data['nama']?>&hak_akses=<?=$data['hak_akses']?>" nclick="return confirm('Apakah Anda yakin ingin menghapus data <?=ucwords($data['nama'])?> ?')">Hapus</a></li>
								</ul>
							</div>
						</td>
						<div class="modal fade" id="ubah<?=$data['id']?>">
							<div class="modal-dialog modal-lg">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title">Ubah Data <?=ucwords($data['nama'])?></h5>
										<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
									</div>
									<div class="modal-body">
										<form method="post" enctype="multipart/form-data" action="app/controller/ubah-pengguna.php">
											<input type="hidden" name="id" value="<?=$data['id']?>">
											<div class="mb-3 row">
												<label for="inputEmail3" class="col-sm-2 col-form-label">Nama Pengguna</label>
												<div class="col-sm-7">
													<input type="text" class="form-control" name="nama" placeholder="Nama Lengkap Pengguna" required value="<?=$data['nama']?>">
												</div>
											</div>
											<fieldset class="mb-2">
												<div class="row">
													<label class="col-form-label col-sm-2 pt-0">Jenis Kelamin</label>
													<?php  if ($data['gender']=='Perempuan') { ?>
														<div class="col-sm-3">
															<div class="form-check">
																<input class="form-check-input" type="radio" name="gender" id="gridRadios1" value="Laki-laki">
																<label class="form-check-label" for="gridRadios1">
																	Laki-laki
																</label>
															</div>
														</div>
														<div class="col-sm-3">
															<div class="form-check">
																<input class="form-check-input" type="radio" name="gender" id="gridRadios2" value="Perempuan" checked>
																<label class="form-check-label" for="gridRadios2">
																	Perempuan
																</label>
															</div>
														</div>
													<?php } else { ?>
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
													<?php } ?>
												</div>
											</fieldset>
											<div class="mb-3 row">
												<label for="inputEmail3" class="col-sm-2 col-form-label">Alamat</label>
												<div class="col-sm-9">
													<input type="text" class="form-control" name="alamat" placeholder="Alamat Lengkap Pengguna" required value="<?=$data['alamat']?>">
												</div>
											</div>
											<div class="mb-3 row">
												<label for="inputEmail3" class="col-sm-2 col-form-label">No Telepon</label>
												<div class="col-sm-7">
													<input type="text" class="form-control" name="telpon" placeholder="No Telephone / Whatsapp Pengguna" required value="<?=$data['telpon']?>">
												</div>
											</div>
											<div class="mb-3 row">
												<label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
												<div class="col-sm-7">
													<input type="email" class="form-control" name="email" placeholder="Alamat email pengguna" required value="<?=$data['email']?>">
												</div>
											</div>
											<div class="mb-3 row">
												<label for="inputEmail3" class="col-sm-2 col-form-label">Username</label>
												<div class="col-sm-7">
													<input type="text" class="form-control" name="username" placeholder="Username pengguna untuk login sistem" required value="<?=$data['username']?>">
												</div>
											</div>
											<div class="mb-3 row">
												<label for="inputEmail3" class="col-sm-2 col-form-label">Password</label>
												<div class="col-sm-4">
													<input type="password" class="form-control" name="password" id="password" placeholder="Kata Sandi Pengguna" required value="<?=$data['password']?>">
												</div>
												<div class="col-sm-5">
													<input type="password" class="form-control" name="password" id="konfirmasiPassword" placeholder="Ulangi Kata Sandi" required onkeyup="confirmPassword()" value="<?=$data['password']?>">
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
													<select class="form-control" name="hak_akses" required>
														<option value="<?=$data['hak_akses']?>"><?=ucwords($data['hak_akses'])?></option>
														<option>--- Pilih ---</option>
														<option value="admin">Admin</option>
														<option value="guru">Guru</option>
														<option value="kepala sekolah">Kepala Sekolah</option>
													</select>
												</div>
											</div>
											<div class="mb-3 row">
												<label for="inputEmail3" class="col-sm-2 col-form-label">Foto Profil Pengguna</label>
												<div class="col-sm-7">
													<input type="file" class="form-control" id="defaultFile" name="foto">
												</div>
											</div>
											<div class="form-group row">
												<div class="col-sm-4 offset-sm-2">
													<button type="submit" class="btn btn-primary" name="btn_simpan">Ubah</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
	<div class="hljs-container rounded-bottom">
		<pre><code class="xml" data-url="assets/data/form-elements/code-11.json"></code></pre>
	</div>
</div>
<script src="resources/config/tambah_user.js"></script>
<script src="resources/config/notif.js"></script>
<script src="resources/config/info.js"></script>