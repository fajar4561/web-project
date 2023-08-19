<?php require 'resources/components/head.php';?>
<body class='app-with-bg'>
	<!-- BEGIN #app -->
	<div id="app" class="app app-boxed-layout">
		<!-- BEGIN #header -->
		<div id="header" class="app-header">

			<!-- BEGIN #toggler -->
			<?php require 'resources/components/toggler.php';?>
			<!-- End #toggler -->

			<!-- BEGIN menu -->
			<?php require 'resources/components/menu.php';?>
			<!-- END menu -->
		</div>
		<!-- END #header -->
		
		<!-- BEGIN #sidebar -->
		<?php require 'resources/components/sidebar.php';?>
		<!-- END #sidebar -->
		
		<!-- BEGIN #content -->
		<div id="content" class="app app-content app-footer-fixed">
			<?php require 'app/route/router.php'?>
		</div>
		<!-- END #content -->

		<?php require 'resources/components/footer.php'?>
		
		<!-- BEGIN btn-scroll-top -->
		<a href="#" data-click="scroll-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>
		<!-- END btn-scroll-top -->
		<!-- BEGIN theme-panel -->
	<?php require 'resources/components/theme-panel.php';?>
	<!-- END theme-panel -->
	</div>
	<!-- END #app -->
	
	<?php require 'resources/components/js.php';?>
