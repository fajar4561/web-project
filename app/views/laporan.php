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
		<form>
			<div class="mb-3 row">
				<label for="inputEmail3" class="col-sm-2 col-form-label">Jenis Laporan</label>
				<div class="col-sm-10">
					<select class="form-control" id="ex-basic" name="hak_akses" required>
						<option value="siswa">Siswa</option>
						<option value="rapor">Rapor</option>
						<option value="wali kelas">Wali Kelas</option>
					</select>
				</div>
			</div>
			<div class="mb-3 row">
				<label for="inputEmail3" class="col-sm-2 col-form-label">Jenis Laporan</label>
				<div class="col-sm-10">
					<select class="form-control" id="ex-basic" name="hak_akses" required>
						<option value="admin">Admin</option>
						<option value="guru">Guru</option>
						<option value="kepala sekolah">Kepala Sekolah</option>
					</select>
				</div>
			</div>
		</form>
	</div>
</div>

<script type="text/javascript">
	function tampil(jenis)
		{
			var tampil="";
			switch(jenis)
			{
				case "bulanan" : {
					tampil = '<select class="form-control" name="bulan" required=""><option>Pilih Bulan</option><option value="1">Januari</option><option value="2">Februari</option><option value="3">Maret</option><option value="4">April</option><option value="5">Mei</option><option value="6">Juni</option><option value="7">Juli</option><option value="8">Agustus</option><option value="9">September</option><option value="10">Oktober</option><option value="11">November</option><option value="12">Desember</option>></select>';
				}
				break;
				case "tahunan" : {
					tampil = '<select class="select2 form-control form-control-lg" name="tahun" required=""><?php $mulai= date('Y') - 50;for($i = $mulai;$i<$mulai + 100;$i++){$sel = $i == date('Y') ? ' selected="selected"' : '';echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>'; } ?></select>';
				}
				break;
				default :tampil ="";
			}
			var tampil2="";
			switch(jenis)
			{
				case "bulanan" : {
					tampil2 = '<select class="select2 form-control form-control-lg" name="tahun" required=""><?php $mulai= date('Y') - 50;for($i = $mulai;$i<$mulai + 100;$i++){$sel = $i == date('Y') ? ' selected="selected"' : '';echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>'; } ?></select>';
				}
				break;
				case "tahunan" : {
					tampil2 = '<button class="btn btn-primary" type="submit" name="lihat">Lihat</button>';
				}
				break;
				default :tampil2 ="";
			}
			var tampil3="";
			switch(jenis)
			{
				case "bulanan" : {
					tampil3 = '<button class="btn btn-primary" type="submit" name="lihat">Lihat</button>';
				}
				break;
				case "tahunan" : {
					tampil3 = '';
				}
				break;
				default :tampil3 ="";
			}
			document.getElementById('tampil').innerHTML =tampil;
			document.getElementById('tampil2').innerHTML =tampil2;
			document.getElementById('tampil3').innerHTML =tampil3;
		}
</script>
<script src="resources/config/tambah_user.js"></script>
<script src="resources/config/notif.js"></script>
<script src="resources/config/info.js"></script>