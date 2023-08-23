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
			<a href="?halaman=tambah-siswa" class="btn btn-theme"><i class="fa fa-plus-circle fa-fw me-1"></i> Siswa</a>
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
	<ul class="nav nav-tabs nav-tabs-v2 px-4">
		<li class="nav-item me-3"><a href="#allTab" class="nav-link active px-2" data-bs-toggle="tab">Semua</a></li>
		<li class="nav-item me-3"><a href="#publishedTab" class="nav-link px-2" data-bs-toggle="tab">Lulus</a></li>
		<li class="nav-item me-3"><a href="#expiredTab" class="nav-link px-2" data-bs-toggle="tab">Pindah</a></li>
		<li class="nav-item me-3"><a href="#deletedTab" class="nav-link px-2" data-bs-toggle="tab">Deleted</a></li>
	</ul>
	<div class="tab-content p-4">
		<div class="tab-pane fade show active" id="allTab">
			<!-- BEGIN input-group -->
			<div class="input-group mb-4">
				<button class="btn btn-default dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Filter products &nbsp;</button>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="#">Action</a>
					<a class="dropdown-item" href="#">Another action</a>
					<a class="dropdown-item" href="#">Something else here</a>
					<div role="separator" class="dropdown-divider"></div>
					<a class="dropdown-item" href="#">Separated link</a>
				</div>
				<div class="flex-fill position-relative z-1">
					<div class="input-group">
						<div class="input-group-text position-absolute top-0 bottom-0 bg-none border-0" style="z-index: 1020;">
							<i class="fa fa-search opacity-5"></i>
						</div>
						<input type="text" class="form-control ps-35px" placeholder="Search products">
					</div>
				</div>
			</div>
			<!-- END input-group -->

			<!-- BEGIN table -->
			<div class="table-responsive">
				<table class="table table-hover text-nowrap">
					<thead>
						<tr>
							<th class="pt-0 pb-2"></th>
							<th class="pt-0 pb-2">Nama</th>
							<th class="pt-0 pb-2">NIS</th>
							<th class="pt-0 pb-2">Kelas</th>
							<th class="pt-0 pb-2">Status</th>
						</tr>
					</thead>
					<tbody>
						<?php
							require 'resources/config/koneksi.php';
							$batas = 10;
							$page = isset($_GET['page'])?(int)$_GET['page'] : 1;
							$halaman_awal = ($page>1) ? ($page * $batas) - $batas : 0;
							$previous = $page - 1;
							$next = $page + 1;
							$dat = mysqli_query($koneksi,"SELECT * FROM siswa ");
							$jumlah_data = mysqli_num_rows($dat);
							$total_halaman = ceil($jumlah_data / $batas);
							if(isset($_GET['cari'])){
								$cari = $_GET['cari'];
								$data1 = $koneksi-> query("SELECT * FROM siswa WHERE nama_siswa like '%".$cari."%' OR nis like '%".$cari."%' ORDER BY nama_siswa ASC");       
							}else{
								$data1 = $koneksi->query("SELECT * FROM siswa ORDER BY nama_siswa ASC LIMIT $halaman_awal, $batas");   
							}
							while($data = mysqli_fetch_assoc($data1)){
						?>
							<tr>
								<td class="w-10px align-middle">
									<div class="form-check">
										<input type="checkbox" class="form-check-input" id="product1">
										<label class="form-check-label" for="product1"></label>
									</div>
								</td>
								<td>
									<div class="d-flex align-items-center">
										<div class="w-60px h-60px bg-gray-100 d-flex align-items-center justify-content-center">
											<img alt="" class="mw-100 mh-100" src=public/img/<?=$data['foto_siswa']?>>
										</div>
										<div class="ms-3">
											<a href="?halaman=detail-siswa&nis=<?=$data['nis']?>"><?=ucwords($data['nama_siswa'])?></a>
										</div>
									</div>
								</td>
								<td class="align-middle"><?=$data['nis']?></td>
								<td class="align-middle"><?=$data['kelas']?></td>
								<td class="align-middle">
									<?php  if ($data['status_siswa']=='aktif') { ?>
										<span class="badge bg-success"><?=ucwords($data['status_siswa'])?></span>
									<?php } else if ($data['status_siswa']=='lulus') { ?>
										<span class="badge bg-info"><?=ucwords($data['status_siswa'])?></span>
									<?php } else { ?>
										<span class="badge bg-danger"><?=ucwords($data['status_siswa'])?></span>
									<?php } ?>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
			<!-- END table -->

			<div class="d-md-flex align-items-center">
				<div class="me-md-auto text-md-left text-center mb-2 mb-md-0">
					Showing 1 to 10 of 57 entries
				</div>
				<ul class="pagination mb-0 justify-content-center">
					<li <?php if($page > 1) { echo 'class="page-item"'; } else {echo 'class="page-item disabled"';} ?>><a class="page-link" <?php if($page > 1) { echo "href='?halaman=data-siswa&page=$previous'"; } ?>>Previous</a></li>

					<?php for($x=1;$x<=$total_halaman;$x++){
						$pages = $page;
						if ($pages == $x) {
							$aktive = 'active';
						}
						else {
							$aktive =' ';
						}
					?> 

					<li class="page-item <?=$aktive?>"><a class="page-link" href="?halaman=data-siswa&page=<?php echo $x ?>"><?php echo $x; ?></a></li>
					<?php } ?>

					<li <?php if($page < $total_halaman) { echo 'class="page-item"'; } else {echo 'class="page-item disabled"';} ?>><a class="page-link" <?php if($page < $total_halaman) { echo "href='?halaman=data-siswa&page=$next'"; } ?>>Next</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<script src="resources/config/tambah_user.js"></script>
<script src="resources/config/notif.js"></script>
<script src="resources/config/info.js"></script>