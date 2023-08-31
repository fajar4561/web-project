<?php 
require 'resources/config/koneksi.php';
$quer = mysqli_query($koneksi, "SELECT max(kode_wali) as kodeTerbesar FROM wali_kelas ");
$dat = mysqli_fetch_array($quer);
$kodeProduk = $dat['kodeTerbesar'];
$urutan = (int) substr($kodeProduk, 3, 3);
$urutan++;
$huruf='WL-';
$kodeProduk = $huruf. sprintf("%03s", $urutan);
?>
<ul class="breadcrumb">
	<li class="breadcrumb-item"><a href="?halaman=beranda">BERANDA</a></li>
	<li class="breadcrumb-item active"><?=strtoupper($title)?></li>
</ul>

<h1 class="page-header">
	Halaman <?=ucwords($title)?>
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
		<form method="post" enctype="multipart/form-data" action="app/controller/simpan-wali-kelas.php">
			<div class="mb-3 row">
				<label for="inputEmail3" class="col-sm-2 col-form-label">Kode Wali Kelas</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" name="kode" value="<?=$kodeProduk?>" readonly>
				</div>
			</div>
			<div class="mb-3 row">
				<label for="inputEmail3" class="col-sm-2 col-form-label">Kelas</label>
				<div class="col-sm-7">
					<select class="form-select form-control" name="kelas" required>
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
			<input type="hidden" name="id" id="oke">
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
	<?php echo $jsArrayKode; ?>  
	function changeValueKode(x)
	{  
		document.getElementById('oke').value = prdKode[x].id;
	}; 
</script>