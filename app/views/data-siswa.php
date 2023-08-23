<ul class="breadcrumb">
	<li class="breadcrumb-item"><a href="?halaman=beranda">BERANDA</a></li>
	<li class="breadcrumb-item active"><?=strtoupper($title)?></li>
</ul>

<h1 class="page-header">
	Halaman <?=ucwords($title)?> <small>halaman ini digunakan untuk menambahdakan dafatar pengguna baru yang dapat mengakses sistem</small>
</h1>

<hr class="mb-4">

<?php 
    if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
    	echo '<div id="pesan" class="alert alert-'.$_SESSION['warna'].'"><strong>'.$_SESSION['info'].'</strong> '.$_SESSION['pesan'].' </div>';
    }
    $_SESSION['pesan'] = '';
?>

<div class="card">
	<ul class="nav nav-tabs nav-tabs-v2 px-4">
		<li class="nav-item me-3"><a href="#allTab" class="nav-link active px-2" data-bs-toggle="tab">All</a></li>
		<li class="nav-item me-3"><a href="#publishedTab" class="nav-link px-2" data-bs-toggle="tab">Published</a></li>
		<li class="nav-item me-3"><a href="#expiredTab" class="nav-link px-2" data-bs-toggle="tab">Expired</a></li>
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
							<th class="pt-0 pb-2">Product</th>
							<th class="pt-0 pb-2">Inventory</th>
							<th class="pt-0 pb-2">Type</th>
							<th class="pt-0 pb-2">Vendor</th>
						</tr>
					</thead>
					<tbody>
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
										<img alt="" class="mw-100 mh-100" src="assets/img/product/product-6.jpg">
									</div>
									<div class="ms-3">
										<a href="page_product_details.html">Force Majeure White T Shirt</a>
									</div>
								</div>
							</td>
							<td class="align-middle">83 in stock for 3 variants</td>
							<td class="align-middle">Cotton</td>
							<td class="align-middle">Force Majeure</td>
						</tr>
					</tbody>
				</table>
			</div>
			<!-- END table -->

			<div class="d-md-flex align-items-center">
				<div class="me-md-auto text-md-left text-center mb-2 mb-md-0">
					Showing 1 to 10 of 57 entries
				</div>
				<ul class="pagination mb-0 justify-content-center">
					<li class="page-item disabled"><a class="page-link">Previous</a></li>
					<li class="page-item"><a class="page-link" href="#">1</a></li>
					<li class="page-item active"><a class="page-link" href="#">2</a></li>
					<li class="page-item"><a class="page-link" href="#">3</a></li>
					<li class="page-item"><a class="page-link" href="#">4</a></li>
					<li class="page-item"><a class="page-link" href="#">5</a></li>
					<li class="page-item"><a class="page-link" href="#">6</a></li>
					<li class="page-item"><a class="page-link" href="#">Next</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<script src="resources/config/tambah_user.js"></script>
<script src="resources/config/notif.js"></script>
<script src="resources/config/info.js"></script>