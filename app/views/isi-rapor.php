<?php
require 'resources/config/koneksi.php';

$nis = $_GET['nis'];

$ambil=$koneksi->query("SELECT * FROM siswa WHERE nis='$nis'");
$pecah=$ambil->fetch_assoc();

$today = date("Ymd");
$quer = mysqli_query($koneksi, "SELECT max(kode_rapor) as kodeTerbesar FROM rapor ");
$dat = mysqli_fetch_array($quer);
$kode= $dat['kodeTerbesar'];
$urutan = (int) substr($kode, 11, 3);
$urutan++;
$huruf='RPT';
$kode = $huruf.$today. sprintf("%03s", $urutan);
?>

<ul class="breadcrumb">
	<li class="breadcrumb-item"><a href="?halaman=beranda">BERANDA</a></li>
	<li class="breadcrumb-item active"><?=strtoupper($title)?></li>
</ul>

<h1 class="page-header">
	Halaman <?=ucwords($title)?> <?=ucwords($pecah['nama_siswa'])?>
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
		<div class="row mb-3 p-2">
			<div class="col-md-3 col-sm-3">
				<center>
					<img src="public/img/1.png" class="img" style="max-width: 60%; height: auto;">
				</center>
			</div>
			<div class="col-md-9 col-sm-9">
				<p class="align-center" style="margin-bottom: 0.5em;">
					<h2 class="text-uppercase text-center" style="margin-bottom: 0.5em;">dinas pendidikan kabupaten kendal</h2>
					<h4 class="text-uppercase text-center">unit pendidikan kecamatan patebon</h4>
					<h2 class="text-uppercase text-center">sdn 3 jambearum</h2>
					<h6 class="text-center">Jl. Sabuk Intan Desa Jambearum, Jambearum, Kec. Patebon, Kab. Kendal Prov. Jawa Tengah</h6>
				</p>
			</div>
		</div>
		<hr class="mb-3">
		<div class="row">
			<div class="col-md-12">
				<table class="table table-borderless">
					<tr>
						<td>Nis</td>
						<td> : </td>
						<td><?=$pecah['nis']?></td>
						<td > </td>
						<td>Semester/Tahun Pelajaran</td>
						<td> : </td>
						<td><?=$pecah['semester']?> / <?=$pecah['tahun_semester']?></td>
					</tr>
					<tr>
						<td>Nama Siswa</td>
						<td> : </td>
						<td><?=ucwords($pecah['nama_siswa'])?></td>
						<td > </td>
						<td>Kelas</td>
						<td> : </td>
						<td><?=$pecah['kelas']?></td>
					</tr>
				</table>
			</div>
			<div class="row">
				<div class="col-md-12">
					<form method="post" action="app/controller/simpan-rapor.php">
						<input type="hidden" name="kode" value="<?=$kode?>">
						<input type="hidden" name="nis" value="<?=$nis?>">
						<div class="row">
							<div class="col-md-12">
								<table class="table">
									<thead>
										<th>No</th>
										<th>Komponen</th>
										<th>KKM</th>
										<th>Nilai Hasil Belajar</th>
									</thead>
									<thead>
										<th colspan="4">A. Mata Pelajaran</th>
									</thead>
									<tbody>
										<?php
										require 'resources/config/koneksi.php';
										$ambildata = $koneksi->query("SELECT * FROM mapel WHERE kelas_mapel='$pecah[kelas]' AND katagori_mapel='mata pelajaran' ORDER BY nama_mapel ASC");
										$no = 1;
										while ($data = mysqli_fetch_assoc($ambildata)) { 
											?>
											<tr>
												<td><?=$no++?></td>
												<td><?=ucwords($data['nama_mapel'])?></td>
												<td><?=$data['kkm']?></td>
												<td>
													<div class="col-sm-4">
														<input type="hidden" name="kode_mapel[]" value="<?=$data['kode_mapel']?>">
														<input type="text" class="form-control" name="nilai[<?=$data['id']?>]" placeholder="Isi nilai" required>
													</div>
												</td>
											</tr>
										<?php } ?>
									</tbody>
									<thead>
										<th colspan="4">B. Muatan Lokal</th>
									</thead>
									<tbody>
										<?php
										$ambildata = $koneksi->query("SELECT * FROM mapel WHERE kelas_mapel='$pecah[kelas]' AND katagori_mapel='muatan lokal' ORDER BY nama_mapel ASC");
										$no2 = 1;
										while ($data = mysqli_fetch_assoc($ambildata)) { 
											?>
											<tr>
												<td><?=$no2++?></td>
												<td><?=ucwords($data['nama_mapel'])?></td>
												<td><?=$data['kkm']?></td>
												<td>
													<div class="col-sm-4">
														<input type="hidden" name="kode_mapel[]" value="<?=$data['kode_mapel']?>">
														<input type="text" class="form-control" name="nilai[<?=$data['id']?>]" placeholder="Isi nilai" required>
													</div>
												</td>
											</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
						<div class="row mt-3">
							<h5 class="text-uppercase">Absensi</h5>
							<div class="col-md-8">
								<table class="table">
									<thead>
										<th>No</th>
										<th>Alasan Ketidak Hadiran</th>
										<th>Lama Hari</th>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td>Ijin</td>
											<td>
												<div class="col-sm-4">
													<input type="text" class="form-control" name="ijin" placeholder="Isi nilai" required>
												</div>
											</td>
										</tr>
										<tr>
											<td>2</td>
											<td>Sakit</td>
											<td>
												<div class="col-sm-4">
													<input type="text" class="form-control" name="sakit" placeholder="Isi nilai" required>
												</div>
											</td>
										</tr>
										<tr>
											<td>3</td>
											<td>Tanpa Keterangan</td>
											<td>
												<div class="col-sm-4">
													<input type="text" class="form-control" name="tanpa_keterangan" placeholder="Isi nilai" required>
												</div>
											</td>
										</tr>
									</tbody>
								</table>
								<div class="row mb-3">
									<label for="inputEmail3" class="col-sm-2 col-form-label">Tgl Rapor</label>
									<div class="col-sm-9">
										<input type="date" class="form-control" name="tgl" placeholder="Alamat Lengkap Pengguna" required>
									</div>
								</div>
								<div class="row mb-3">
									<label for="inputEmail3" class="col-sm-2 col-form-label">Catatan</label>
									<div class="col-sm-9">
										<textarea class="form-control" name="catatan" placeholder="Catatan rapor / Catatan untuk siswa" rows="5"></textarea>
									</div>
								</div>
								<div class="row">
									<div class="form-group row">
										<div class="col-sm-12 offset-sm-8">
											<button type="submit" class="btn btn-primary" name="btn_simpan">Simpan</button>
											<button type="reset" class="btn btn-danger">Batal</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="hljs-container rounded-bottom">
		<pre><code class="xml" data-url="assets/data/form-elements/code-11.json"></code></pre>
	</div>
</div>
<script src="resources/config/tambah_user.js"></script>
<script src="resources/config/notif.js"></script>
<script src="resources/config/info.js"></script>