<?php
require 'resources/config/koneksi.php';

$nis = $_GET['nis'];

$ambil=$koneksi->query("SELECT * FROM siswa WHERE nis='$nis'");
$pecah=$ambil->fetch_assoc();
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
						<td>Tahun Pelajaran</td>
						<td> : </td>
						<td><?=$pecah['tahun_semester']?></td>
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
					<form>
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
										$ambildata = $koneksi->query("SELECT * FROM mapel WHERE kelas_mapel='$pecah[kelas]' ORDER BY nama_mapel ASC");
										$no = 1;
										while ($data = mysqli_fetch_assoc($ambildata)) { 
									?>
									<tr>
										<td><?=$no++?></td>
										<td><?=ucwords($data['nama_mapel'])?></td>
										<td><?=$data['kkm']?></td>
										<td>
											<div class="col-sm-4">
												<input type="text" class="form-control" name="nilai[]" placeholder="Isi nilai" required>
											</div>
										</td>
									</tr>
									<?php } ?>
							</tbody>
						</table>
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