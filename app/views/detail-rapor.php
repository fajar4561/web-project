<?php
require 'resources/config/koneksi.php';

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
						<a href="?halaman=tambah-wali-kelas" class="btn btn-theme"><i class="fa fa-plus-circle fa-fw me-1"></i> Rapor</a>
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

					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="col-xl-4">
		<div class="card mb-4">
			<div class="card-header bg-none fw-bold d-flex align-items-center">
				<div class="flex-1">
					<div>Sales channels (2/3)</div>
				</div>
				<div><a href="#" class="text-decoration-none fw-normal link-secondary">Manage</a></div>
			</div>
			<div class="card-body">
				<div class="d-flex">
					<div class="flex-1 d-flex">
						<div class="me-3"><i class="fa fa-store fa-lg fa-fw text-body text-opacity-25"></i></div>
						<div>Online Store</div>
						<span class="badge bg-theme-subtle text-theme fw-bold fs-12px ms-auto me-2 d-flex align-items-center">2022-01-05</span>
					</div>
					<div class="w-50px text-center"><a href="#" class="text-decoration-none link-secondary"><i class="fa fa-calendar fa-lg"></i></a></div>
				</div>
				<hr class="my-3 opacity-1">
				<div class="d-flex">
					<div class="flex-1 d-flex">
						<div class="me-3"><i class="fab fa-shopify fa-lg fa-fw text-body text-opacity-25"></i></div>
						<div>Shopify</div>
						<span class="badge bg-theme-subtle text-theme fw-bold fs-12px ms-auto me-2 d-flex align-items-center">2022-01-05</span>
					</div>
					<div class="w-50px text-center"><a href="#" class="text-decoration-none link-secondary"><i class="fa fa-calendar fa-lg"></i></a></div>
				</div>
				<hr class="my-3 opacity-1">
				<div class="d-flex">
					<div class="flex-1 d-flex">
						<div class="me-3"><i class="fab fa-amazon fa-lg fa-fw text-body text-opacity-25"></i></div>
						<div>
							<div>Amazon</div>
							<div class="d-flex mt-1 text-body text-opacity-50 small">
								<div><i class="fa fa-circle text-warning fs-6px d-block mt-2"></i></div>
								<div class="flex-1 ps-2">
									<div class="mb-2">
										Amazon is disconnected. Connect your Amazon Seller Central account to continue using this sales channel.
									</div>
									<a href="#">Learn more</a>
								</div>
							</div>
						</div>
					</div>
					<div class="w-50px text-center"><a href="#" class="text-decoration-none link-secondary"><i class="fa fa-circle-xmark fa-lg fa-fw"></i></a></div>
				</div>
			</div>
		</div>
		<div class="card mb-4">
			<div class="card-header bg-none fw-bold d-flex align-items-center">
				<div class="flex-1">
					<div>Organization</div>
				</div>
			</div>
			<div class="card-body">
				<div class="mb-3">
					<label class="form-label">Product type</label>
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Product type">
						<button class="btn btn-default"><i class="fa fa-search"></i></button>
					</div>
				</div>
				<div class="mb-0">
					<label class="form-label">Vendor</label>
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Apple store supplies">
						<button class="btn btn-default"><i class="fa fa-search"></i></button>
					</div>
				</div>
			</div>
		</div>
		<div class="card mb-4">
			<div class="card-header bg-none fw-bold d-flex align-items-center">
				<div class="flex-1">
					<div>Collections</div>
				</div>
			</div>
			<div class="card-body">
				<div class="d-flex align-items-center position-relative mb-2">
					<span class="position-absolute top-0 bottom-0 start-0 d-flex align-items-center px-10px"><i class="fa fa-search"></i></span>
					<input type="text" class="form-control ps-30px" placeholder="Search for collections">
				</div>
				<p class="mb-0 small text-body text-opacity-50">
					<i class="fa fa-question-circle fa-fw"></i> Add this product to a collection so it's easy to find in your store.
				</p>
			</div>
		</div>
		<div class="card mb-4">
			<div class="card-header bg-none fw-bold d-flex align-items-center">
				<div class="flex-1">
					<div>Tags</div>
				</div>
			</div>
			<div class="card-body">
				<ul id="tags" class="tagit form-control mb-3">
					<li>Laptop</li>
					<li>Apple</li>
				</ul>
				<div class="small"><a href="#">View all tags</a></div>
			</div>
		</div>
	</div>
</div>
<script src="resources/config/tambah_user.js"></script>
<script src="resources/config/notif.js"></script>
<script src="resources/config/info.js"></script>
<script src="resources/config/lokasi.js"></script>
<script type="text/javascript">
	$("select[name=provinsi]").on("change",function(){
		var selectElement = document.getElementById("provinsi");
		var selectedValue = selectElement.value;
		$("input[name=provinsi2]").val(selectedValue);
	});

	$("select[name=kota]").on("change",function(){
		var kotaTerpilih = document.getElementById("kota");
		var hasilKota = kotaTerpilih.value;
		$("input[name=kota2]").val(hasilKota);
	});

	$("select[name=Kecamatan]").on("change",function(){
		var kecamatanTerpilih = document.getElementById("kecamatan");
		var hasilKecamatan = kecamatanTerpilih.value;
		$("input[name=kecamatan2]").val(hasilKecamatan);
	});

	$("select[name=Kelurahan]").on("change",function(){
		var kelurahanTerpilih = document.getElementById("kelurahan");
		var hasilKelurahan = kelurahanTerpilih.value;
		$("input[name=kelurahan2]").val(hasilKelurahan);
	});
</script>