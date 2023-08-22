<?php 
#generated kode transaksi pengajuan
require 'resources/config/koneksi.php';
$today = date("Y");
$quer = mysqli_query($koneksi, "SELECT max(nis) as kodeTerbesar FROM siswa WHERE nis LIKE '%".$today."%' ");
$dat = mysqli_fetch_array($quer);
$kode= $dat['kodeTerbesar'];
$urutan = (int) substr($kode, 12, 3);
$urutan++;
$huruf='20321763';
$kode = $huruf.$today. sprintf("%03s", $urutan);

?>
<ul class="breadcrumb">
	<li class="breadcrumb-item"><a href="?halaman=beranda">BERANDA</a></li>
	<li class="breadcrumb-item active"><?=strtoupper($title)?></li>
</ul>

<h1 class="page-header">
	Halaman <?=ucwords($title)?> <small>halaman ini digunakan untuk menambahdakan dafatar siswa baru </small>
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
		<form method="post" enctype="multipart/form-data" action="app/controller/simpan-siswa.php">
			<div class="mb-3 row">
				<label for="inputEmail3" class="col-sm-2 col-form-label">NIS</label>
				<div class="col-sm-7">
					<input type="text" class="form-control" name="nis" value="<?=$kode?>" readonly>
				</div>
			</div>
			<div class="mb-3 row">
				<label for="inputEmail3" class="col-sm-2 col-form-label">Nama Siswa</label>
				<div class="col-sm-7">
					<input type="text" class="form-control" name="nama" placeholder="Nama Lengkap Siswa" required>
				</div>
			</div>
			<fieldset class="mb-2">
				<div class="row">
					<label class="col-form-label col-sm-2 pt-0">Jenis Kelamin</label>
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
				</div>
			</fieldset>
			<div class="mb-3 row">
				<label for="inputEmail3" class="col-sm-2 col-form-label">TTL</label>
				<div class="col-sm-3">
					<input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir Siswa" required>
				</div>
				<div class="col-sm-4">
					<input type="date" class="form-control" name="tgl_lahir" required>
				</div>
			</div>
			<div class="mb-3 row">
				<label for="inputEmail3" class="col-sm-2 col-form-label">Agama</label>
				<div class="col-sm-7">
					<select class="form-control" id="ex-basic" name="agama" required>
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
				<div class="col-sm-3">
					<select class="form-select form-control" name="provinsi" id="provinsi">
						<option>---Pilih Provinsi---</option>
					</select>
				</div>
				<div class="col-sm-3">
					<select class="form-select form-control" name="kota" id="kota">
						<option>---Pilih Kota/Kabupaten---</option>
					</select>
				</div>
				<div class="col-sm-3">
					<select class="form-select form-control" name="Kecamatan" id="kecamatan">
						<option>---Pilih Kecamatan---</option>
					</select>
				</div>
			</div>
			<div class="row mb-3">
				<label for="inputEmail3" class="col-sm-2 col-form-label"> </label>
				<div class="col-sm-3">
					<select class="form-select form-control" name="Kelurahan" id="kelurahan">
						<option>---Pilih Desa---</option>
					</select>
				</div>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="alamat" placeholder="Tuliskan RT/RW/No.Jalan" required>
				</div>
			</div>
			<div class="mb-3 row">
				<label for="inputEmail3" class="col-sm-2 col-form-label">Kelas</label>
				<div class="col-sm-7">
					<select class="form-select form-contro" name="kelas" required>
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
				<div class="col-sm-4">
					<select class="form-select form-contro" name="semester" required>
						<option>--- Pilih Semester Siswa ---</option>
						<option value="1">Ganjil</option>
						<option value="2">Genap</option>
					</select>
				</div>
				<div class="col-sm-3">
					<select class="form-select form-contro" name="tahun_ajaran" required>
						<?php $mulai= date('Y') - 50;for($i = $mulai;$i<$mulai + 100;$i++){$sel = $i == date('Y') ? ' selected="selected"' : '';echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>'; } ?>
					</select>
				</div>
			</div>
			<div class="mb-3 row">
				<label for="inputEmail3" class="col-sm-2 col-form-label">Status Siswa</label>
				<div class="col-sm-7">
					<select class="form-select form-contro" name="status_siswa" required>
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
				<div class="col-sm-7">
					<input type="text" class="form-control" name="nama_wali" placeholder="Nama Wali Murid" required>
				</div>
			</div>
			<div class="mb-3 row">
				<label for="inputEmail3" class="col-sm-2 col-form-label">No Telepon</label>
				<div class="col-sm-7">
					<input type="text" class="form-control" name="telpon" placeholder="No Telephone Wali Murid" required>
				</div>
			</div>
			<div class="mb-3 row">
				<label for="inputEmail3" class="col-sm-2 col-form-label">Foto Siswa</label>
				<div class="col-sm-7">
					<input type="file" class="form-control" id="defaultFile" name="foto" required>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-sm-4 offset-sm-2">
					<button type="submit" class="btn btn-primary" name="btn_simpan">Simpan</button>
					<button type="reset" class="btn btn-danger">Batal</button>
				</div>
			</div>
		</form>
	</div>
	<div class="hljs-container rounded-bottom">
		<pre><code class="xml" data-url="assets/data/form-elements/code-11.json"></code></pre>
	</div>
</div>
<script src="resources/config/tambah_user.js"></script>
<script src="resources/config/notif.js"></script>
<script src="resources/config/info.js"></script>
  <script type="text/javascript">
    fetch(`https://kanglerian.github.io/api-wilayah-indonesia/api/provinces.json`)
    .then(response => response.json())
    .then(provinces => {
      var data = provinces;
      var tampung ='<option>---Pilih Provinsi---</option>';
      data.forEach(elment => {
        tampung += `<option data-reg="${elment.id}" value="${elment.name}">${elment.name}</option>`;
      });
      document.getElementById('provinsi').innerHTML = tampung;
    });
  </script>
  <script type="text/javascript">
    const selectProvinsi = document.getElementById('provinsi');

    selectProvinsi.addEventListener('change', (e) => {
      var provinsi = e.target.options[e.target.selectedIndex].dataset.reg;
      
      fetch(`https://kanglerian.github.io/api-wilayah-indonesia/api/regencies/${provinsi}.json`)
      .then(response => response.json())
      .then(regencies => {
        var data = regencies;
        var tampung ='<option>---Pilih---</option>';
        data.forEach(elment => {
          tampung += `<option data-dist="${elment.id}" value="${elment.name}">${elment.name}</option>`;
        });
        document.getElementById('kota').innerHTML = tampung;
      });
    });

    const selectKota = document.getElementById('kota');

    selectKota.addEventListener('change', (e) => {
      var kota = e.target.options[e.target.selectedIndex].dataset.dist;
      
      fetch(`https://kanglerian.github.io/api-wilayah-indonesia/api/districts/${kota}.json`)
      .then(response => response.json())
      .then(districts => {
        var data = districts;
        var tampung ='<option>---Pilih---</option>';
        data.forEach(elment => {
          tampung += `<option data-vill="${elment.id}" value="${elment.name}">${elment.name}</option>`;
        });
        document.getElementById('kecamatan').innerHTML = tampung;
      });
    });

    const selectKecamatan = document.getElementById('kecamatan');

    selectKecamatan.addEventListener('change', (e) => {
      var kecamatan = e.target.options[e.target.selectedIndex].dataset.vill;
      
      fetch(`https://kanglerian.github.io/api-wilayah-indonesia/api/villages/${kecamatan}.json`)
      .then(response => response.json())
      .then(villages => {
        var data = villages;
        var tampung ='<option>---Pilih---</option>';
        data.forEach(elment => {
          tampung += `<option value="${elment.name}">${elment.name}</option>`;
        });
        document.getElementById('kelurahan').innerHTML = tampung;
      });
    });
  </script>