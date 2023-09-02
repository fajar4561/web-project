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
			<a href="?halaman=tambah-wali-kelas" class="btn btn-theme"><i class="fa fa-plus-circle fa-fw me-1"></i> Wali Kelas</a>
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
					<th>Kode Wali Kelas</th>
					<th>Nama Guru</th>
					<th>Kelas</th>
					<th>No Telepon</th>					
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
                  require 'resources/config/koneksi.php';
                  $ambildata = $koneksi->query("SELECT * FROM wali_kelas INNER JOIN pengguna ON wali_kelas.kode_guru = pengguna.id ");
                  $no = 1;
                  while ($data = mysqli_fetch_assoc($ambildata)) { 
                ?>
					<tr>
						<td><?=$no++?></td>
						<td><?=$data['kode_wali']?></td>						
						<td><?=ucwords($data['nama_guru'])?></td>
						<td><?=$data['kelas']?></td>
						<td><?=$data['telpon']?></td>						
						<td>
							<div class="dropdown">
								<button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">

								</button>
								<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
									<!-- 
									<li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#ubah<?=$data['id']?>">Ubah</a></li>
									-->
									<li><a class="dropdown-item" href="app/controller/hapus-wali-kelas?kode=<?=$data['kode_wali']?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini ??')">Hapus</a></li>
								</ul>
							</div>
						</td>
						<div class="modal fade" id="ubah<?=$data['id']?>">
							<div class="modal-dialog modal-lg">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title">Ubah Data Wali Kelas <?=ucwords($data['kelas'])?></h5>
										<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
									</div>
									<div class="modal-body">
										<form method="post" enctype="multipart/form-data" action="app/controller/ubah-wali-kelas.php">
											<input type="hidden" name="id" value="<?=$data['id']?>">
											<div class="mb-3 row">
												<label for="inputEmail3" class="col-sm-2 col-form-label">Kode Wali Kelas</label>
												<div class="col-sm-4">
													<input type="text" class="form-control" name="kode" value="<?=$data['kode_wali']?>" readonly>
												</div>
											</div>
											<div class="mb-3 row">
												<label for="inputEmail3" class="col-sm-2 col-form-label">Kelas</label>
												<div class="col-sm-7">
													<select class="form-select form-control" name="kelas" required>
														<option value="<?=$data['kelas']?>"><?=$data['kelas']?></option>
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
												<label for="inputEmail3" class="col-sm-2 col-form-label">Nama Guru</label>
												<div class="col-sm-9">
													<select class="form-select form-control"  name="nama" onchange="changeValueKode(this.value)" required>
														<option value="<?=$data['nama_guru']?>"><?=$data['nama_guru']?></option>
														<option>--- Pilih Guru ---</option>
														<?php
														require 'resources/config/koneksi.php'; 
														$sql=$koneksi->query("SELECT * FROM pengguna WHERE hak_akses='guru' ");
														$jsArrayKode = "var prdKode = new Array();\n";
														while ($dat=mysqli_fetch_assoc($sql)) 
														{

															echo '<option value="'.$dat['nama'].'">'.$dat['nama'].'</option> ';
															$jsArrayKode .= "prdKode['" . $dat['nama'] . "'] = {id:'" . addslashes($dat['id']) . "'} ;\n";                                      
														}
														?>
													</select>
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