<?php
require 'resources/config/koneksi.php';

$kode_rapor = $_GET['kode_rapor'];
$nis = $_GET['nis'];

$ambil=$koneksi->query("SELECT * FROM siswa WHERE nis='$nis'");
$pecah=$ambil->fetch_assoc();

$kelas_siswa = $pecah['kelas'];
$semester_siswa = $pecah['semester'];
$tahun_semester = $pecah['tahun_semester'];

// ambil data absensi
$ambil_absensi = $koneksi->query("SELECT * FROM absensi WHERE kode_rapor='$kode_rapor'");
$data_absen = $ambil_absensi->fetch_assoc();

// ambil data rapor
$ambil_rapor = $koneksi->query("SELECT * FROM rapor WHERE kode_rapor='$kode_rapor'");
$data_rapor = $ambil_rapor->fetch_assoc();


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
					<form method="post" action="app/controller/ubah-rapor.php">
						<input type="hidden" name="kode" value="<?=$kode_rapor?>">
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
										$ambildata = $koneksi->query("SELECT * FROM detail_rapor WHERE kode_rapor= '$kode_rapor' AND katagori_mapel='mata pelajaran' ORDER BY nama_mapel ASC ");
										$no = 1;
										while ($data = mysqli_fetch_assoc($ambildata)) { 
											?>
											<tr>
												<td><?=$no++?></td>
												<td><?=ucwords($data['nama_mapel'])?></td>
												<td><?=$data['kkm']?></td>
												<td><?=$data['nilai']?></td>
											</tr>
										<?php } ?>
									</tbody>
									<thead>
										<th colspan="4">B. Muatan Lokal</th>
									</thead>
									<tbody>
										<?php
										$ambildata = $koneksi->query("SELECT * FROM detail_rapor WHERE kode_rapor= '$kode_rapor' AND katagori_mapel='muatan lokal' ORDER BY nama_mapel ASC");
										$no2 = 1;
										while ($data = mysqli_fetch_assoc($ambildata)) { 
											?>
											<tr>
												<td><?=$no2++?></td>
												<td><?=ucwords($data['nama_mapel'])?></td>
												<td><?=$data['kkm']?></td>
												<td><?=$data['nilai']?></td>												
											</tr>
										<?php } ?>
									</tbody>
									<tfoot>
										<th colspan="3">Nilai Rata-Rata</th>
										<th><?=$data_rapor['rata_rata']?></th>
									</tfoot>
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
											<td><?=$data_absen['ijin']?></td>
										</tr>
										<tr>
											<td>2</td>
											<td>Sakit</td>
											<td><?=$data_absen['sakit']?></td>
										</tr>
										<tr>
											<td>3</td>
											<td>Tanpa Keterangan</td>
											<td><?=$data_absen['tanpa_keterangan']?></td>
										</tr>
									</tbody>
								</table>
								<div class="row mb-3">
									<div class="col-md-8">
										<p><small><strong>Catatan Guru :</strong><br><?=$data_rapor['catatan_rapor']?></small></p>
									</div>
								</div>													
								<div class="row">
									<div class="form-group row">
										<div class="col-sm-12 offset-sm-8">
											<a href="app/cetak/print-rapor.php?&nis=<?=$nis?>&kode_rapor=<?=$kode_rapor?>" target="_blank" class="btn btn-primary">Cetak</a>											
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