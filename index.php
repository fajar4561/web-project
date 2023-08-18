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
			<ul class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">LAYOUT</a></li>
				<li class="breadcrumb-item active">BOXED LAYOUT</li>
			</ul>
			
			<h1 class="page-header">
				Boxed Layout <small>page header description goes here...</small>
			</h1>
			
			<hr class="mb-4">
			
			<p>
				Add the <code>.app-boxed-layout</code> css class to <code>.app</code> container and <code>.app-with-bg</code> css class to <code>&lt;body&gt;</code> for boxed layout page setting.
			</p>
			
			<div class="card">
				<div class="hljs-container rounded">
					<pre><code class="xml" data-url="resources/assets/data/layout-boxed-layout/code-1.json"></code></pre>
				</div>
			</div>
		</div>
		<!-- END #content -->

		<!-- BEGIN #footer -->
		<div id="footer" class="app-footer">
			&copy; 2023 seanTheme All Right Reserved
		</div>
		<!-- END #footer -->
		
		<!-- BEGIN btn-scroll-top -->
		<a href="#" data-click="scroll-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>
		<!-- END btn-scroll-top -->
		<!-- BEGIN theme-panel -->
	<?php require 'resources/components/theme-panel.php';?>
	<!-- END theme-panel -->
	</div>
	<!-- END #app -->
	
	<!-- ================== BEGIN core-js ================== -->
	<script src="resources/assets/js/vendor.min.js"></script>
	<script src="resources/assets/js/app.min.js"></script>
	<!-- ================== END core-js ================== -->
	
	<!-- ================== BEGIN page-js ================== -->
	<script src="resources/assets/plugins/@highlightjs/cdn-assets/highlight.min.js"></script>
	<script src="resources/js/demo/highlightjs.demo.js"></script>
	<!-- ================== END page-js ================== -->
	
</body>
</html>
