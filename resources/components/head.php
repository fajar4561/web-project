<?php
session_start();

if (isset($_GET['halaman'])) {
 	$title = str_replace("-", " ", $_GET['halaman']);
 } 

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>SIAKAD | <?=ucwords($title)?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	
	<!-- ================== BEGIN core-css ================== -->
	<link href="resources/assets/css/vendor.min.css" rel="stylesheet">
	<link href="resources/assets/css/app.min.css" rel="stylesheet">
	<!-- ================== END core-css ================== -->

	<script src="resources/plugins/jquery/jquery.min.js"></script>

	<link href="resources/assets/plugins/tag-it/css/jquery.tagit.css" rel="stylesheet">
	<link href="resources/assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" rel="stylesheet">
	<link href="resources/assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
	<link href="resources/assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet">
	<link href="resources/assets/plugins/bootstrap-slider/dist/css/bootstrap-slider.min.css" rel="stylesheet">
	<link href="resources/assets/plugins/blueimp-file-upload/css/jquery.fileupload.css" rel="stylesheet">
	<link href="resources/assets/plugins/summernote/dist/summernote-lite.css" rel="stylesheet">
	<link href="resources/assets/plugins/spectrum-colorpicker2/dist/spectrum.min.css" rel="stylesheet">
	<link href="resources/assets/plugins/select-picker/dist/picker.min.css" rel="stylesheet">
	<link href="resources/assets/plugins/jquery-typeahead/dist/jquery.typeahead.min.css" rel="stylesheet">

	<link href="resources/assets/plugins/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
	<link href="resources/assets/plugins/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet">
	<link href="resources/assets/plugins/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet">
	<link href="resources/assets/plugins/bootstrap-table/dist/bootstrap-table.min.css" rel="stylesheet">
	
</head>