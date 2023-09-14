<?php
require 'resources/config/koneksi.php';

// ambil jumlah mapel
$ambil_pengguna = $koneksi->query("SELECT * FROM pengguna");
$jml_pengguna = $ambil_pengguna->num_rows;

$ambil_guru = $koneksi->query("SELECT * FROM pengguna WHERE hak_akses='guru'");
$jml_guru = $ambil_guru->num_rows;

$ambil_siswa = $koneksi->query("SELECT * FROM siswa WHERE status_siswa='aktif'");
$jml_siswa = $ambil_siswa->num_rows;

$ambil_mapel = $koneksi->query("SELECT * FROM mapel");
$jml_mapel = $ambil_mapel->num_rows;

?>

<h1 class="page-header mb-3">
	Hi, Sean. <small>here's what's happening with your store today.</small>
</h1>

<div class="row">
	<div class="col-xl-6 mb-3">
		<!-- BEGIN card -->
		<div class="card h-100 overflow-hidden">
			<!-- BEGIN card-img-overlay -->
			<div class="card-img-overlay d-block d-lg-none bg-blue rounded"></div>
			<!-- END card-img-overlay -->

			<!-- BEGIN card-img-overlay -->
			<div class="card-img-overlay d-none d-md-block bg-blue rounded mb-n1 mx-n1" style="background-image: url(resources/assets/img/bg/wave-bg.png); background-position: right bottom; background-repeat: no-repeat; background-size: 100%;"></div>
			<!-- END card-img-overlay -->

			<!-- BEGIN card-img-overlay -->
			<div class="card-img-overlay d-none d-md-block bottom-0 top-auto">
				<div class="row">
					<div class="col-md-8 col-xl-6"></div>
					<div class="col-md-4 col-xl-6 mb-n2">
						<img src="resources/assets/img/page/dashboard.svg" alt="" class="d-block ms-n3 mb-5" style="max-height: 310px">
					</div>
				</div>
			</div>
			<!-- END card-img-overlay -->

			<!-- BEGIN card-body -->
			<div class="card-body position-relative text-white text-opacity-70">
				<!-- BEGIN row -->
				<div class="row">
					<!-- BEGIN col-8 -->
					<div class="col-md-8">
						<!-- stat-top -->
						<div class="d-flex">
							<div class="me-auto">
								<h5 class="text-white text-opacity-80 mb-3">Weekly Earning</h5>
								<h3 class="text-white mt-n1 mb-1">$2,999.80</h3>
								<p class="mb-1 text-white text-opacity-60 text-truncate">
									<i class="fa fa-caret-up"></i> <b>32%</b> increase compare to last week
								</p>
							</div>
						</div>

						<hr class="bg-white bg-opacity-75 mt-3 mb-3">

						<!-- stat-bottom -->
						<div class="row">
							<div class="col-6 col-lg-5">
								<div class="mt-1">
									<i class="fa fa-fw fa-shopping-bag fs-28px text-black text-opacity-50"></i>
								</div>
								<div class="mt-1">
									<div>Store Sales</div>
									<div class="fw-600 text-white">$1,629.80</div>
								</div>
							</div>
							<div class="col-6 col-lg-5">
								<div class="mt-1">
									<i class="fa fa-fw fa-retweet fs-28px text-black text-opacity-50"></i>
								</div>
								<div class="mt-1">
									<div>Referral Sales</div>
									<div class="fw-600 text-white">$700.00</div>
								</div>
							</div>
						</div>

						<hr class="bg-white bg-opacity-75 mt-3 mb-3">

						<div class="mt-3 mb-2">
							<a href="#" class="btn btn-yellow btn-rounded btn-sm ps-5 pe-5 pt-2 pb-2 fs-14px fw-600"><i class="fa fa-wallet me-2 ms-n2"></i> Withdraw money</a>
						</div>
						<p class="fs-12px">
							It usually takes 3-5 business days for transferring the earning to your bank account.
						</p>
					</div>
					<!-- END col-8 -->

					<!-- BEGIN col-4 -->
					<div class="col-md-4 d-none d-md-block" style="min-height: 380px;"></div>
					<!-- END col-4 -->
				</div>
				<!-- END row -->
			</div>
			<!-- END card-body -->
		</div>
		<!-- END card -->
	</div>
	<div class="col-xl-6">
		<!-- BEGIN row -->
		<div class="row">
			<!-- BEGIN col-6 -->
			<div class="col-sm-6">
				<!-- BEGIN card -->
				<div class="card mb-3 overflow-hidden fs-13px border-0 bg-gradient-custom-orange" style="min-height: 199px;">
					<!-- BEGIN card-img-overlay -->
					<div class="card-img-overlay mb-n4 me-n4 d-flex" style="bottom: 0; top: auto;">
						<img src="resources/assets/img/icon/order.svg" alt="" class="ms-auto d-block mb-n3" style="max-height: 105px">
					</div>
					<!-- END card-img-overlay -->

					<!-- BEGIN card-body -->
					<div class="card-body position-relative">
						<h5 class="text-white text-opacity-80 mb-3 fs-16px">Jumlah Guru</h5>
						<h3 class="text-white mt-n1"><?=$jml_guru?> Orang</h3>
						<div class="progress bg-black bg-opacity-50 mb-2" style="height: 6px">
							<div class="progrss-bar progress-bar-striped bg-white" style="width: 80%"></div>
						</div>
						
					</div>
					<!-- BEGIN card-body -->
				</div>
				<!-- END card -->

				<!-- BEGIN card -->
				<div class="card mb-3 overflow-hidden fs-13px border-0 bg-gradient-custom-teal" style="min-height: 199px;">
					<!-- BEGIN card-img-overlay -->
					<div class="card-img-overlay mb-n4 me-n4 d-flex" style="bottom: 0; top: auto;">
						<img src="resources/assets/img/icon/visitor.svg" alt="" class="ms-auto d-block mb-n3" style="max-height: 105px">
					</div>
					<!-- END card-img-overlay -->

					<!-- BEGIN card-body -->
					<div class="card-body position-relative">
						<h5 class="text-white text-opacity-80 mb-3 fs-16px">Jumlah Pengguna</h5>
						<h3 class="text-white mt-n1"><?=$jml_pengguna?> Users</h3>
						<div class="progress bg-black bg-opacity-50 mb-2" style="height: 6px">
							<div class="progrss-bar progress-bar-striped bg-white" style="width: 50%"></div>
						</div>
						
					</div>
					<!-- END card-body -->
				</div>
				<!-- END card -->
			</div>
			<!-- END col-6 -->

			<!-- BEGIN col-6 -->
			<div class="col-sm-6">
				<!-- BEGIN card -->
				<div class="card mb-3 overflow-hidden fs-13px border-0 bg-gradient-custom-pink" style="min-height: 199px;">
					<!-- BEGIN card-img-overlay -->
					<div class="card-img-overlay mb-n4 me-n4 d-flex" style="bottom: 0; top: auto;">
						<img src="resources/assets/img/icon/email.svg" alt="" class="ms-auto d-block mb-n3" style="max-height: 105px">
					</div>
					<!-- END card-img-overlay -->

					<!-- BEGIN card-body -->
					<div class="card-body position-relative">
						<h5 class="text-white text-opacity-80 mb-3 fs-16px">Jumlah Siswa Aktif</h5>
						<h3 class="text-white mt-n1"><?=$jml_siswa?> Siswa</h3>
						<div class="progress bg-black bg-opacity-50 mb-2" style="height: 6px">
							<div class="progrss-bar progress-bar-striped bg-white" style="width: 80%"></div>
						</div>
					</div>
					<!-- END card-body -->
				</div>
				<!-- END card -->

				<!-- BEGIN card -->
				<div class="card mb-3 overflow-hidden fs-13px border-0 bg-gradient-custom-indigo" style="min-height: 199px;">
					<!-- BEGIN card-img-overlay -->
					<div class="card-img-overlay mb-n4 me-n4 d-flex" style="bottom: 0; top: auto;">
						<img src="resources/assets/img/icon/browser.svg" alt="" class="ms-auto d-block mb-n3" style="max-height: 105px">
					</div>
					<!-- end card-img-overlay -->

					<!-- BEGIN card-body -->
					<div class="card-body position-relative">
						<h5 class="text-white text-opacity-80 mb-3 fs-16px">Jumlah Mapel</h5>
						<h3 class="text-white mt-n1"><?=$jml_mapel?> Mapel</h3>
						<div class="progress bg-black bg-opacity-50 mb-2" style="height: 6px">
							<div class="progrss-bar progress-bar-striped bg-white" style="width: 80%"></div>
						</div>
					</div>
					<!-- END card-body -->
				</div>
				<!-- END card -->
			</div>
			<!-- BEGIN col-6 -->
		</div>
		<!-- END row -->
	</div>
</div>