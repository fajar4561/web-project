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
			<a href="?halaman=tambah-mapel" class="btn btn-theme"><i class="fa fa-plus-circle fa-fw me-1"></i> Mapel</a>
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
					<th>Kode Mapel</th>
					<th>Nama Mapel</th>
					<th>Katagori</th>
					<th>Kelas</th>
					<th>KKM</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
                  require 'resources/config/koneksi.php';
                  $ambildata = $koneksi->query("SELECT * FROM mapel ORDER BY nama_mapel ASC");
                  $no = 1;
                  while ($data = mysqli_fetch_assoc($ambildata)) { 
                ?>
					<tr>
						<td><?=$no++?></td>
						<td><?=$data['kode_mapel']?></td>
						<td><?=ucwords($data['nama_mapel'])?></td>
						<td>
							<?php  if ($data['katagori_mapel']=='mata pelajaran') { ?>
								<span class="badge bg-primary"><?=ucwords($data['katagori_mapel'])?></span>
							<?php } else { ?>
								<span class="badge bg-info"><?=ucwords($data['katagori_mapel'])?></span>
							<?php } ?>
						</td>
						<td>Kelas <?=$data['kelas_mapel']?></td>
						<td><?=$data['kkm']?></td>
						<td>
							<div class="dropdown">
								<button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">

								</button>
								<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
									<li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#ubah<?=$data['id']?>">Ubah</a></li>
									<li><a class="dropdown-item" href="app/controller/hapus-mapel?id=<?=$data['id']?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini ?')">Hapus</a></li>
								</ul>
							</div>
						</td>
						<div class="modal fade" id="ubah<?=$data['id']?>">
							<div class="modal-dialog modal-lg">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title">Ubah Data <?=ucwords($data['nama_mapel'])?> Kelas <?=$data['kelas_mapel']?></h5>
										<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
									</div>
									<div class="modal-body">
										<form method="post" enctype="multipart/form-data" action="app/controller/ubah-mapel.php">
											<div class="mb-3 row">
												<label for="inputEmail3" class="col-sm-2 col-form-label">Kode Mapel</label>
												<div class="col-sm-4">
													<input type="text" class="form-control" name="kode" value="<?=$data['kode_mapel']?>" readonly>
												</div>
											</div>
											<div class="mb-3 row">
												<label for="inputEmail3" class="col-sm-2 col-form-label">Nama Mapel</label>
												<div class="col-sm-6">
													<input type="text" class="form-control" name="nama" value="<?=$data['nama_mapel']?>" placeholder="Nama Mapel" required>
												</div>
											</div>
											<div class="mb-3 row">
												<label for="inputEmail3" class="col-sm-2 col-form-label">Katagori Mapel</label>
												<div class="col-sm-7">
													<select class="form-select form-control" name="katagori" required>
														<option value="<?=$data['katagori_mapel']?>"><?=$data['katagori_mapel']?></option>
														<option>--- Pilih Katagori ---</option>
														<option value="mata pelajaran">Mata Pelajaran</option>
														<option value="muatan lokal">Muatan Lokal</option>
													</select>
												</div>
											</div>
											<div class="mb-3 row">
												<label for="inputEmail3" class="col-sm-2 col-form-label">Kelas</label>
												<div class="col-sm-7">
													<select class="form-select form-control" name="kelas" required>
														<option value="<?=$data['kelas_mapel']?>"><?=$data['kelas_mapel']?></option>
														<option>--- Pilih Kelas ---</option>
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
														<option value="5">5</option>
														<option value="6">6</option>
													</select>
												</div>
											</div>
											<div class="mb-3 row">
												<label for="inputEmail3" class="col-sm-2 col-form-label">KKM Mapel</label>
												<div class="col-sm-6">
													<input type="text" class="form-control" name="kkm" placeholder="KKM Mapel" value="<?=$data['kkm']?>" required>
												</div>
											</div>
											<input type="hidden" name="id" id="oke">
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