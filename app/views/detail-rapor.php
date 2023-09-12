<?php
require 'resources/config/koneksi.php';
require 'resources/config/tgl_indo.php';

$nis = $_GET['nis'];

$ambil=$koneksi->query("SELECT * FROM siswa WHERE nis='$nis'");
$pecah=$ambil->fetch_assoc();
?>

<ul class="breadcrumb">
	<li class="breadcrumb-item"><a href="?halaman=beranda">BERANDA</a></li>
	<li class="breadcrumb-item "><a href="?halaman=input-rapor">DATA SISWA</a></li>
	<li class="breadcrumb-item active"><?=strtoupper($pecah['nama_siswa'])?></li>
</ul>

<div class="row">
	<div class="col-md-10 col-sm-9">
		<h1 class="page-header">
			Halaman <?=ucwords($title)?>
		</h1>
	</div>
</div>

<hr class="mb-4">

<?php 
    if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
    	echo '<div id="pesan" class="alert alert-'.$_SESSION['warna'].'"><strong>'.$_SESSION['info'].'</strong> '.$_SESSION['pesan'].' </div>';
    }
    $_SESSION['pesan'] = '';
?>

<div class="profile">
	<div class="profile-header">
		<div class="profile-header-cover"></div>

		<div class="profile-header-content">
			<div class="profile-header-img">
				<img src="public/img/<?=$pecah['foto_siswa']?>" alt="">
			</div>
		</div>
	</div>
</div>

<div class="row gx-4 mt-3">
	<div class="col-xl-8">
		<div class="card mb-4">
			<div class="card-header bg-none fw-bold">
				<div class="row">
					<div class="col-md-9 col-sm-9">
						Data Rapor <?=ucwords($pecah['nama_siswa'])?>
					</div>
					<div class="col-md-3 col-sm-3">
						<a href="?halaman=isi-rapor&nis=<?=$pecah['nis']?>" class="btn btn-theme"><i class="fa fa-plus-circle fa-fw me-1"></i> Rapor</a>
					</div>
				</div>
			</div>
			<div class="card-body">
				<table class="table">
					<thead>
						<th>No</th>
						<th>Kode Rapor</th>
						<th>Tgl</th>
						<th>Kelas</th>
						<th>Semester</th>
						<th>Tahun</th>
						<th>Aksi</th>
					</thead>
					<tbody>
						<?php
							$ambildata = $koneksi->query("SELECT * FROM rapor WHERE nis='$nis'");
							$no = 1;
							while ($data = mysqli_fetch_assoc($ambildata)) { 
						?>
						<tr>
							<td><?=$no++?></td>
							<td><?=$data['kode_rapor']?></td>
							<td><?=tgl_indo(date('Y-m-d', strtotime($data['tgl_rapor'])))?></td>
							<td><?=$data['kelas_rapor']?></td>
							<td><?=$data['semester_rapor']?></td>
							<td><?=$data['tahun_rapor']?></td>
							<td>
								<div class="dropdown">
									<button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">

									</button>
									<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
										<li><a class="dropdown-item" href="?halaman=ubah-rapor&nis=<?=$nis?>&kode_rapor=<?=$data['kode_rapor']?>">Ubah</a></li>
										<li><a class="dropdown-item" href="?halaman=lihat-rapor&nis=<?=$nis?>&kode_rapor=<?=$data['kode_rapor']?>">Detail</a></li>
										<li><a class="dropdown-item" href="app/controller/hapus-rapor?kode_rapor=<?=$data['kode_rapor']?>&nis=<?=$nis?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data <?=ucwords($data['nama'])?> ?')">Hapus</a></li>
									</ul>
								</div>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="col-xl-4">
		<div class="card mb-4">
			<div class="card-header bg-none fw-bold d-flex align-items-center">
				<div class="flex-1">
					<div><?=ucwords($pecah['nama_siswa'])?></div>
				</div>
				<div><a href="#" class="text-decoration-none fw-normal link-secondary"></a></div>
			</div>
			<div class="card-body">
				<div class="d-flex">
					<div class="flex-1 d-flex">
						<div class="me-3"><i class="fa fa-address-book fa-lg fa-fw text-body text-opacity-25"></i></div>
						<div><?=$pecah['nis']?></div>
					</div>
				</div>
				<hr class="my-3 opacity-1">
				<div class="d-flex">
					<div class="flex-1 d-flex">
						<div class="me-3"><i class="fa fa-university fa-lg fa-fw text-body text-opacity-25"></i></div>
						<div>Kelas <?=$pecah['kelas']?> / Semester <?=$pecah['semester']?> <?=$pecah['tahun_semester']?></div>
					</div>
				</div>
				<hr class="my-3 opacity-1">
				<div class="d-flex">
					<div class="flex-1 d-flex">
						<div class="me-3"><i class="fa fa-home fa-lg fa-fw text-body text-opacity-25"></i></div>
						<div><?=ucwords($pecah['kelurahan'])?>, <?=ucwords($pecah['alamat'])?></div>
					</div>
				</div>
				<hr class="my-3 opacity-1">
				<div class="d-flex">
					<div class="flex-1 d-flex">
						<div class="me-3"><i class="fa fa-user fa-lg fa-fw text-body text-opacity-25"></i></div>
						<div><?=ucwords($pecah['wali_siswa'])?> (<?=$pecah['telpon_wali']?>)</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="resources/config/tambah_user.js"></script>
<script src="resources/config/notif.js"></script>
<script src="resources/config/info.js"></script>
<script src="resources/config/lokasi.js"></script>