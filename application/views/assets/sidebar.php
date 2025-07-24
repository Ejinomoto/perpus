<!-- navbar.php -->
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-menu-fixed" dir="ltr" data-theme="theme-default"
	data-assets-path="<?php echo base_url('assets/vuexy/assets/'); ?>" data-template="vertical-menu-template-starter">

<head>
	<meta charset="utf-8" />
	<meta name="viewport"
		content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

	<title>ElyArchives</title>

	<link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/logo-white.webp'); ?> " />

	<!-- Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link
		href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
		rel="stylesheet" />

	<!-- Icons -->
	<link rel="stylesheet" href="<?php echo base_url('assets/vuexy/assets/vendor/fonts/fontawesome.css'); ?> " />
	<link rel="stylesheet" href="<?php echo base_url('assets/vuexy/assets/vendor/fonts/tabler-icons.css'); ?> " />
	<link rel="stylesheet" href="<?php echo base_url('assets/vuexy/assets/vendor/fonts/flag-icons.css'); ?> " />

	<!-- Core CSS -->
	<link rel="stylesheet" href="<?php echo base_url('assets/vuexy/assets/vendor/css/rtl/core.css" class="template-customizer-core-css'); ?> " />
	<link rel="stylesheet" href="<?php echo base_url('assets/vuexy/assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css'); ?> " />
	<link rel="stylesheet" href="<?php echo base_url('assets/vuexy/assets/css/demo.css'); ?> " />

	<!-- Vendors CSS -->
	<link rel="stylesheet" href="<?php echo base_url('assets/vuexy/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css'); ?> " />
	<link rel="stylesheet" href="<?php echo base_url('assets/vuexy/assets/vendor/libs/node-waves/node-waves.css'); ?> " />
	<link rel="stylesheet" href="<?php echo base_url('assets/vuexy/assets/vendor/libs/bootstrap-select/bootstrap-select.css'); ?> " />
	<link rel="stylesheet" href="<?php echo base_url('assets/vuexy/assets/vendor/libs/typeahead-js/typeahead.css'); ?> " />
	<link rel="stylesheet" href="<?php echo base_url('assets/vuexy/assets/vendor/libs/dropzone/dropzone.css'); ?> " />
	<link rel="stylesheet" href="<?php echo base_url('assets/vuexy/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css'); ?> " />
	<link rel="stylesheet" href="<?php echo base_url('assets/vuexy/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css'); ?> " />
	<link rel="stylesheet" href="<?php echo base_url('assets/vuexy/assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css'); ?> " />
	<link rel="stylesheet" href="<?php echo base_url('assets/vuexy/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css'); ?> " />
	<link rel="stylesheet" href="<?php echo base_url('assets/vuexy/assets/vendor/libs/flatpickr/flatpickr.css'); ?> " />

	<link rel="stylesheet" href="<?php echo base_url('assets/vuexy/assets/vendor/css/pages/cards-advance.css'); ?>" />
	<!-- Row Group CSS -->
	<link rel="stylesheet" href="<?php echo base_url('assets/vuexy/assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css'); ?> " />
	<!-- Form Validation -->
	<link rel="stylesheet" href="<?php echo base_url('assets/vuexy/assets/vendor/libs/formvalidation/dist/css/formValidation.min.css'); ?> " />

	<!-- Page CSS -->

	<!-- Helpers -->
	<script src="<?php echo base_url('assets/vuexy/assets/vendor/js/helpers.js'); ?> ">
	</script>

	<!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
	<!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->

	</script>
	<!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
	<script src="<?php echo base_url('assets/vuexy/assets/js/config.js'); ?> "></script>

</head>
<!-- Menu -->

<!-- / Menu -->

<!-- Navbar -->

<body>
	<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme" data-bg-class="bg-menu-theme" style="touch-action: none; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
		<div class="app-brand demo">
			<a href="index.html" class="app-brand-link">
				<img src="
                            <?php echo base_url('assets/logo.webp'); ?>
                            " alt="" style="width: 40px;">
				<span class="app-brand-text demo menu-text fw-bold">
					ElyArchives
				</span>
			</a>


		</div>



		<script>
			document.addEventListener('DOMContentLoaded', function() {
				const toggleButton = document.querySelector('.layout-menu-toggle');
				const sidebar = document.getElementById('layout-menu');

				if (toggleButton && sidebar) {
					toggleButton.addEventListener('click', function() {
						sidebar.classList.toggle('collapsed');
					});
				}
			});
		</script>

		<div class="menu-inner-shadow"></div>
		<ul class="menu-inner py-1">
			<li class="menu-header small text-uppercase">
				<span class="menu-header-text">Dashboard</span>
			</li>
			<li class="menu-item <?= ($this->uri->segment(1) === 'dashboard') ? 'active' : ''; ?>">
				<a href="<?php echo site_url('dashboard'); ?>" class="menu-link">
					<i class="ti ti-clipboard"></i>
					<div> Dashboard</div>
				</a>
			</li>
			<li class="menu-header small text-uppercase">
				<span class="menu-header-text">Books</span>
			</li>
			<li class="menu-item <?= ($this->uri->segment(1) === 'backend') ? 'active' : ''; ?>">
				<a href="<?php echo site_url('backend'); ?>" class="menu-link">
					<i class="ti ti-books"></i>
					<div> Books</div>
				</a>
			</li>
			<li class="menu-item <?= ($this->uri->segment(1) === 'gbook') ? 'active' : ''; ?>">
				<a href="<?php echo site_url('gbook'); ?>" class="menu-link">
					<i class="ti ti-books"></i>
					<div> Google Books</div>
				</a>
			</li>


			<?php if ($user_role === 'admin'): ?>
				<li class="menu-header small text-uppercase">
					<span class="menu-header-text">Users</span>
				</li>
				<li class="menu-item <?= ($this->uri->segment(1) === 'userlist') ? 'active' : ''; ?>">
					<a href="<?php echo site_url('userlist'); ?>" class="menu-link">
						<i class="ti ti-user"></i>
						<div> Users</div>
					</a>
				</li>
			<?php endif; ?>


			<li class="menu-header small text-uppercase">
				<span class="menu-header-text">Genre & Category</span>
			</li>
			<li class="menu-item <?= ($this->uri->segment(1) === 'genre') ? 'active' : ''; ?>">
				<a href="<?php echo site_url('genre'); ?>" class="menu-link">
					<i class="menu-icon tf-icons ti ti-device-tv"></i>
					<div> Genre</div>
				</a>
			</li>

			<li class="menu-header small text-uppercase">
				<span class="menu-header-text">Rentals</span>
			</li>
			<?php $pending_rentals = isset($pending_rentals) ? $pending_rentals : 0; ?>
			<li class="menu-item <?= ($this->uri->segment(1) === 'rental' && $this->uri->segment(2) === null) ? 'active' : ''; ?>">
				<a href="<?php echo site_url('rental'); ?>" class="menu-link">
					<i class="ti ti-clipboard"></i>
					<div> Rental Requests</div>
					<?php if ($pending_rentals > 0): ?>
						<div class="badge bg-label-danger rounded-pill ms-auto"><?= $pending_rentals; ?></div>
					<?php endif; ?>
				</a>
			</li>
			<li class="menu-item <?= ($this->uri->segment(1) === 'rental' && $this->uri->segment(2) === 'status') ? 'active' : ''; ?>">
				<a href="<?php echo site_url('rental/status'); ?>" class="menu-link">
					<i class="ti ti-clipboard"></i>
					<div> Rental Status</div>
				</a>
			</li>

			<li class="menu-header small text-uppercase">
				<span class="menu-header-text">Log out</span>
			</li>
			<li class="menu-item <?= ($this->uri->segment(1) === 'logout') ? 'active' : ''; ?>">
				<a href="<?php echo site_url('auth/logout'); ?>" class="menu-link">
					<i class="ti ti-logout"></i>
					<div> Log Out</div>
				</a>
			</li>
		</ul>

	</aside>

	<!-- Core JS -->
	<!-- build:js assets/vendor/js/core.js -->
	<script src="<?php echo base_url('assets/vuexy/assets/vendor/libs/jquery/jquery.js'); ?> "></script>
	<script src="<?php echo base_url('assets/vuexy/assets/vendor/libs/popper/popper.js'); ?> "></script>
	<script src="<?php echo base_url('assets/vuexy/assets/vendor/js/bootstrap.js'); ?> "></script>
	<script src="<?php echo base_url('assets/vuexy/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js'); ?> "></script>
	<script src="<?php echo base_url('assets/vuexy/assets/vendor/libs/node-waves/node-waves.js'); ?> "></script>

	<script src="<?php echo base_url('assets/vuexy/assets/vendor/libs/hammer/hammer.js'); ?> "></script>
	<script src="<?php echo base_url('assets/vuexy/assets/vendor/libs/i18n/i18n.js'); ?> "></script>
	<script src="<?php echo base_url('assets/vuexy/assets/vendor/libs/typeahead-js/typeahead.js'); ?> "></script>

	<script src="<?php echo base_url('assets/vuexy/assets/vendor/js/menu.js'); ?> "></script>
	<!-- endbuild -->
	<script src="<?php echo base_url('assets/vuexy/assets/vendor/libs/bootstrap-select/bootstrap-select.js'); ?> "></script>

	<!-- Vendors JS -->
	<script src="<?php echo base_url('assets/vuexy/assets/vendor/libs/datatables/jquery.dataTables.js'); ?> "></script>
	<script src="<?php echo base_url('assets/vuexy/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js'); ?> "></script>
	<script src="<?php echo base_url('assets/vuexy/assets/vendor/libs/datatables-responsive/datatables.responsive.js'); ?> "></script>
	<script src="<?php echo base_url('assets/vuexy/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js'); ?> "></script>
	<script src="<?php echo base_url('assets/vuexy/assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.js'); ?> "></script>
	<script src="<?php echo base_url('assets/vuexy/assets/vendor/libs/datatables-buttons/datatables-buttons.js'); ?> "></script>
	<script src="<?php echo base_url('assets/vuexy/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.js'); ?> "></script>
	<script src="<?php echo base_url('assets/vuexy/assets/vendor/libs/jszip/jszip.js'); ?> "></script>
	<script src="<?php echo base_url('assets/vuexy/assets/vendor/libs/pdfmake/pdfmake.js'); ?> "></script>
	<script src="<?php echo base_url('assets/vuexy/assets/vendor/libs/datatables-buttons/buttons.html5.js'); ?> "></script>
	<script src="<?php echo base_url('assets/vuexy/assets/vendor/libs/datatables-buttons/buttons.print.js'); ?> "></script>
	<!-- Flat Picker -->
	<script src="<?php echo base_url('assets/vuexy/assets/vendor/libs/moment/moment.js'); ?> "></script>
	<script src="<?php echo base_url('assets/vuexy/assets/vendor/libs/flatpickr/flatpickr.js'); ?> "></script>
	<!-- Row Group JS -->
	<script src="<?php echo base_url('assets/vuexy/assets/vendor/libs/datatables-rowgroup/datatables.rowgroup.js'); ?> "></script>
	<script src="<?php echo base_url('assets/vuexy/assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.js'); ?> "></script>
	<!-- Form Validation -->
	<script src="<?php echo base_url('assets/vuexy/assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js'); ?> "></script>
	<script src="<?php echo base_url('assets/vuexy/assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js'); ?> "></script>
	<script src="<?php echo base_url('assets/vuexy/assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js'); ?> "></script>

	<!-- Main JS -->
	<script src="<?php echo base_url('assets/vuexy/assets/js/main.js'); ?> "></script>

	<script src="<?php echo base_url('assets/vuexy/assets/vendor/libs/dropzone/dropzone.js'); ?> "></script>

	<!-- Page JS -->
	<script src="<?php echo base_url('assets/vuexy/assets/js/forms-file-upload.js'); ?> "></script>

	<!-- Page JS -->
	<script src="<?php echo base_url('assets/vuexy/assets/js/tables-datatables-basic.js'); ?> "></script>
	<script src="<?php echo base_url('assets/vuexy/assets/js/dashboards-analytics.js'); ?>"></script>
</body>