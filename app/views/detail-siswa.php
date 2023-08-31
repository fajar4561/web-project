<?php
require 'resources/config/koneksi.php';

$nis = $_GET['nis'];

$ambil=$koneksi->query("SELECT * FROM siswa WHERE nis='$nis'");
$pecah=$ambil->fetch_assoc();
?>

<ul class="breadcrumb">
	<li class="breadcrumb-item"><a href="?halaman=beranda">BERANDA</a></li>
	<li class="breadcrumb-item "><a href="?halaman=data-siswa">DATA SISWA</a></li>
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
				Data <?=ucwords($pecah['nama_siswa'])?>
			</div>
			<div class="card-body">
				<form method="post" enctype="multipart/form-data" action="app/controller/ubah-siswa.php">
					<div class="mb-3 row">
						<label for="inputEmail3" class="col-sm-2 col-form-label">NIS</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="nis" value="<?=$pecah['nis']?>" readonly>
						</div>
					</div>
					<div class="mb-3 row">
						<label for="inputEmail3" class="col-sm-2 col-form-label">Nama Siswa</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="nama" placeholder="Nama Lengkap Siswa" required value="<?=$pecah['nama_siswa']?>">
						</div>
					</div>
					<fieldset class="mb-2">
						<div class="row">
							<label class="col-form-label col-sm-3 pt-0">Jenis Kelamin</label>
							<?php  if ($pecah['gender_siswa']=='Perempuan') { ?>
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
						<label for="inputEmail3" class="col-sm-2 col-form-label">TTL</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir Siswa" required value="<?=$pecah['tempat_lahir']?>">
						</div>
						<div class="col-sm-5">
							<input type="date" class="form-control" name="tgl_lahir" required value="<?=$pecah['tgl_lahir']?>">
						</div>
					</div>
					<div class="mb-3 row">
						<label for="inputEmail3" class="col-sm-2 col-form-label">Agama</label>
						<div class="col-sm-10">
							<select class="form-select form-control" name="agama" required>
								<option value="<?=$pecah['agama_siswa']?>"><?=ucwords($pecah['agama_siswa'])?></option>
								<option>--- Pilih ---</option>
								<option value="islam">Islam</option>
								<option value="khatolik">Khatolik</option>
								<option value="protestan">Protestan</option>
								<option value="budha">Budha</option>
								<option value="hindu">Hindu</option>
								<option value="konghuchu">Konghuchu</option>
							</select>
						</div>
					</div>
					<div class="mb-3 row">
						<label for="inputEmail3" class="col-sm-2 col-form-label">Alamat</label>
						<div class="col-sm-5 mb-3">
							<select class="form-select form-control" name="provinsi" id="provinsi">
								<option>---Pilih Provinsi---</option>
							</select>
						</div>
						<input type="hidden" name="provinsi2" id="provinsi2" value="<?=$pecah['provinsi']?>">
						<div class="col-sm-5 mb-3">
							<select class="form-select form-control" name="kota" id="kota">
								<option>---Pilih Kota/Kabupaten---</option>
							</select>
						</div>
						<input type="hidden" name="kota2" id="kota2" value="<?=$pecah['kabupaten']?>">
						<div class="col-sm-2 mb-3">
							<label for="inputEmail3" class="col-sm-2 col-form-label"> </label>
						</div>
						<div class="col-sm-5">
							<select class="form-select form-control" name="Kecamatan" id="kecamatan">
								<option>---Pilih Kecamatan---</option>
							</select>
						</div>
						<input type="hidden" name="kecamatan2" id="kecamatan2" value="<?=$pecah['kecamatan']?>">
						<div class="col-sm-5 mb-3">
							<select class="form-select form-control" name="Kelurahan" id="kelurahan">
								<option>---Pilih Desa---</option>
							</select>
						</div>
						<input type="hidden" name="kelurahan2" id="kelurahan2" value="<?=$pecah['kelurahan']?>">
						<div class="col-sm-2 mb-3">
							
						</div>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="alamat" placeholder="Tuliskan RT/RW/No.Jalan" required value="<?=$pecah['alamat']?>">
						</div>
					</div>
					<div class="row">
						<label for="inputEmail3" class="col-sm-2 col-form-label"> </label>
						
					</div>
					<div class="mb-3 row">
						<label for="inputEmail3" class="col-sm-2 col-form-label">Kelas</label>
						<div class="col-sm-10">
							<select class="form-select form-contro" name="kelas" required>
								<option value="<?=$pecah['kelas']?>"><?=$pecah['kelas']?></option>
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
						<label for="inputEmail3" class="col-sm-2 col-form-label">Semester</label>
						<div class="col-sm-5">
							<select class="form-select form-contro" name="semester" required>
								<option value="<?=$pecah['semester']?>"><?=$pecah['semester']?></option>
								<option>--- Pilih Semester Siswa ---</option>
								<option value="1">1</option>
								<option value="2">2</option>
							</select>
						</div>
						<div class="col-sm-5">
							<select class="form-select form-contro" name="tahun_ajaran" required>
								<option value="<?=$pecah['tahun_semester']?>"><?=$pecah['tahun_semester']?></option>
								<?php $mulai= date('Y') - 50;for($i = $mulai;$i<$mulai + 100;$i++){$sel = $i == date('Y') ? : '';echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>'; } ?>
							</select>
						</div>
					</div>
					<div class="mb-3 row">
						<label for="inputEmail3" class="col-sm-2 col-form-label">Status Siswa</label>
						<div class="col-sm-10">
							<select class="form-select form-contro" name="status_siswa" required>
								<option value="<?=$pecah['status_siswa']?>"><?=ucwords($pecah['status_siswa'])?></option>
								<option>--- Pilih Status Siswa ---</option>
								<option value="aktif">Aktif</option>
								<option value="lulus">Lulus</option>
								<option value="pindah">Pindah</option>
							</select>
						</div>
					</div>
					<hr class="mb-3">
					<div class="mb-3 row">
						<label for="inputEmail3" class="col-sm-2 col-form-label">Nama Wali</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="nama_wali" placeholder="Nama Wali Murid" required value="<?=$pecah['wali_siswa']?>">
						</div>
					</div>
					<div class="mb-3 row">
						<label for="inputEmail3" class="col-sm-2 col-form-label">No Telepon</label>
						<div class="col-sm-7">
							<input type="text" class="form-control" name="telpon" placeholder="No Telephone Wali Murid" required value="<?=$pecah['telpon_wali']?>">
						</div>
					</div>
					<div class="mb-3 row">
						<label for="inputEmail3" class="col-sm-2 col-form-label">Foto Siswa</label>
						<div class="col-sm-7">
							<input type="file" class="form-control" id="defaultFile" name="foto" >
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-4 offset-sm-2">
							<button type="submit" class="btn btn-primary" name="btn_simpan" onclick="return confirm('Apakah Anda yakin ingin mengubah data <?=$pecah['nama_siswa']?> ????')">Ubah</button>
							<a href="app/controller/hapus-siswa?nis=<?=$pecah['nis']?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin HAPUS data <?=$pecah['nama_siswa']?> ????')">Hapus Data</a>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="card mb-4">
			<div class="card-header d-flex align-items-center bg-none fw-bold">
				Media
			</div>
			<form id="fileupload" action="//jquery-file-upload.appspot.com/" name="file_upload_form" method="POST" enctype="multipart/form-data">
				<div class="card-body pb-2">
					<div class="fileupload-buttonbar mb-2">
						<div class="d-block d-lg-flex align-items-center">
							<span class="btn btn-theme fs-13px fw-semibold fileinput-button me-2 mb-1">
								<i class="fa fa-fw fa-plus"></i>
								<span>Add files...</span>
								<input type="file" name="files[]" multiple>
							</span>
							<button type="submit" class="btn btn-default fs-13px fw-semibold me-2 mb-1 start">
								<i class="fa fa-fw fa-upload"></i>
								<span>Start upload</span>
							</button>
							<button type="reset" class="btn btn-default fs-13px fw-semibold me-2 mb-1 cancel">
								<i class="fa fa-fw fa-ban"></i>
								<span>Cancel upload</span>
							</button>
							<button type="button" class="btn btn-default fs-13px fw-semibold me-2 mb-1 delete">
								<i class="fa fa-fw fa-trash"></i>
								<span>Delete</span>
							</button>
							<div class="form-check ms-2 mb-1">
								<input type="checkbox" id="toggle-delete" class="form-check-input toggle">
								<label for="toggle-delete" class="form-check-label">Select Files</label>
							</div>
						</div>
					</div>
					<div id="error-msg"></div>
				</div>
				<table class="table table-card mb-0 fs-13px">
					<thead>
						<tr class="fs-12px">
							<th class="pt-2 pb-2 w-25">Preview</th>
							<th class="pt-2 pb-2 w-25">Filename</th>
							<th class="pt-2 pb-2 w-25">Size</th>
							<th class="pt-2 pb-2 w-25">Action</th>
						</tr>
					</thead>
					<tbody class="files">
						<tr class="empty-row">
							<td colspan="4" class="text-center p-3">
								<div class="text-body text-opacity-25 my-3"><i class="fa fa-file-archive fa-3x"></i></div> 
								No file uploaded
							</td>
						</tr>
					</tbody>
				</table>
			</form>
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