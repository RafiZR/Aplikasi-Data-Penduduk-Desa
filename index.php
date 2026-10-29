<?php
    //Mulai Sesion
    session_start();
    if (isset($_SESSION["ses_username"])==""){
	header("location: login.php");
    
    }else{
      $data_id = $_SESSION["ses_id"];
      $data_nama = $_SESSION["ses_nama"];
      $data_user = $_SESSION["ses_username"];
	  $data_level = $_SESSION["ses_level"];
    }

    //KONEKSI DB
    include "inc/koneksi.php";
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Database Penduduk</title>
	<link rel="icon" href="dist/img/lemahabang.png">
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="dist/css/adminlte.min.css">
	<!-- Select2 -->
	<link rel="stylesheet" href="plugins/select2/css/select2.min.css">
	<link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<!-- Google Fonts: Poppins for modern look -->
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
	<!-- Alert -->
	<script src="plugins/alert.js"></script>
	
	<style>
		:root {
			--primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
			--secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
			--success-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
			--warning-gradient: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
			--dark-gradient: linear-gradient(135deg, #434343 0%, #000000 100%);
			--glass-bg: rgba(255, 255, 255, 0.1);
			--glass-border: rgba(255, 255, 255, 0.2);
			--shadow-soft: 0 8px 32px rgba(0, 0, 0, 0.1);
			--shadow-hover: 0 12px 40px rgba(0, 0, 0, 0.15);
		}

		* {
			font-family: 'Poppins', sans-serif !important;
		}

		body {
			background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
			min-height: 100vh;
		}

		/* Modern Navbar */
		.main-header.navbar {
			background: var(--primary-gradient) !important;
			border: none;
			box-shadow: var(--shadow-soft);
			backdrop-filter: blur(10px);
			border-bottom: 1px solid var(--glass-border);
		}

		.navbar-nav .nav-link {
			transition: all 0.3s ease;
			border-radius: 8px;
			margin: 0 5px;
		}

		.navbar-nav .nav-link:hover {
			background: var(--glass-bg);
			transform: translateY(-2px);
		}

		/* Modern Sidebar */
		.main-sidebar {
			background: var(--dark-gradient) !important;
			box-shadow: var(--shadow-soft);
			border-right: 1px solid var(--glass-border);
		}

		.brand-link {
			background: var(--glass-bg) !important;
			backdrop-filter: blur(10px);
			border-bottom: 1px solid var(--glass-border) !important;
			transition: all 0.3s ease;
		}

		.brand-link:hover {
			background: var(--glass-border) !important;
			transform: scale(1.02);
		}

		.brand-image {
			transition: all 0.3s ease;
			filter: drop-shadow(0 4px 8px rgba(0, 0, 0, 0.3));
		}

		.brand-link:hover .brand-image {
			transform: rotate(360deg);
		}

		/* User Panel Styling */
		.user-panel {
			background: var(--glass-bg);
			backdrop-filter: blur(10px);
			border-radius: 15px;
			margin: 15px 10px;
			padding: 15px !important;
			border: 1px solid var(--glass-border);
			transition: all 0.3s ease;
		}

		.user-panel:hover {
			transform: translateY(-2px);
			box-shadow: var(--shadow-hover);
		}

		.user-panel .image img {
			border-radius: 50%;
			border: 3px solid var(--glass-border);
			transition: all 0.3s ease;
		}

		.user-panel:hover .image img {
			transform: scale(1.1);
			border-color: #fff;
		}

		.badge-success {
			background: var(--success-gradient) !important;
			border: none;
			padding: 5px 12px;
			border-radius: 20px;
			font-weight: 500;
			text-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
		}

		/* Modern Navigation */
		.nav-pills .nav-link {
			border-radius: 12px !important;
			margin: 5px 10px;
			transition: all 0.3s ease;
			position: relative;
			overflow: hidden;
		}

		.nav-pills .nav-link::before {
			content: '';
			position: absolute;
			top: 0;
			left: -100%;
			width: 100%;
			height: 100%;
			background: var(--primary-gradient);
			transition: all 0.3s ease;
			z-index: -1;
		}

		.nav-pills .nav-link:hover::before {
			left: 0;
		}

		.nav-pills .nav-link:hover {
			color: white !important;
			transform: translateX(10px);
			box-shadow: var(--shadow-soft);
		}

		.nav-pills .nav-link.active {
			background: var(--primary-gradient) !important;
			color: white !important;
			box-shadow: var(--shadow-soft);
		}

		.nav-treeview .nav-link {
			margin-left: 20px;
			border-radius: 8px;
			background: var(--glass-bg);
			backdrop-filter: blur(5px);
		}

		.nav-treeview .nav-link:hover {
			background: var(--warning-gradient);
			color: white !important;
		}

		/* Nav Header Styling */
		.nav-header {
			background: var(--glass-bg);
			backdrop-filter: blur(10px);
			margin: 15px 10px 10px 10px;
			padding: 10px 15px;
			border-radius: 10px;
			border: 1px solid var(--glass-border);
			color: #fff !important;
			font-weight: 600;
			text-transform: uppercase;
			letter-spacing: 1px;
			font-size: 12px;
		}

		/* Content Wrapper */
		.content-wrapper {
			background: transparent !important;
			margin-left: 250px;
			transition: all 0.3s ease;
		}

		/* Modern Cards and Content */
		.container-fluid {
			padding: 20px;
		}

		/* Floating Action Animations */
		@keyframes float {
			0%, 100% { transform: translateY(0px); }
			50% { transform: translateY(-10px); }
		}

		.nav-icon {
			animation: float 3s ease-in-out infinite;
			transition: all 0.3s ease;
			display: inline-block !important;
			visibility: visible !important;
			opacity: 1 !important;
			color: inherit !important;
			font-size: 16px !important;
			margin-right: 8px !important;
		}

		.nav-link:hover .nav-icon {
			animation-play-state: paused;
			transform: scale(1.2) rotate(15deg);
			color: inherit !important;
		}

		/* Ensure all FontAwesome icons are visible */
		.fas, .far, .fab, .fal, .fad {
			display: inline-block !important;
			visibility: visible !important;
			opacity: 1 !important;
			font-family: "Font Awesome 5 Free" !important;
			font-weight: 900 !important;
		}

		.far {
			font-weight: 400 !important;
		}

		/* Button and CRUD icons */
		.btn .fas, .btn .far, .btn .fab {
			margin-right: 5px !important;
			display: inline-block !important;
			opacity: 1 !important;
		}

		/* DataTable buttons icons */
		.dt-button .fas, .dt-button .far {
			margin-right: 5px !important;
			display: inline-block !important;
			opacity: 1 !important;
		}

		/* Ensure treeview icons are visible */
		.nav-treeview .nav-icon {
			color: #ffc107 !important;
			display: inline-block !important;
			opacity: 1 !important;
			margin-right: 8px !important;
		}

		/* Footer Styling */
		.main-footer {
			background: var(--primary-gradient) !important;
			color: white !important;
			border-top: 1px solid var(--glass-border);
			backdrop-filter: blur(10px);
			margin-left: 250px;
		}

		.main-footer a {
			color: #fff !important;
			text-decoration: none;
			transition: all 0.3s ease;
		}

		.main-footer a:hover {
			color: #f0f8ff !important;
			text-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
		}

		/* Responsive Design */
		@media (max-width: 768px) {
			.content-wrapper,
			.main-footer {
				margin-left: 0;
			}
		}

		/* Loading Animation */
		.nav-link {
			position: relative;
		}

		.nav-link::after {
			content: '';
			position: absolute;
			bottom: 0;
			left: 50%;
			width: 0;
			height: 2px;
			background: var(--success-gradient);
			transition: all 0.3s ease;
			transform: translateX(-50%);
		}

		.nav-link:hover::after {
			width: 80%;
		}

		/* Glassmorphism Effect for Sidebar */
		.sidebar {
			background: rgba(0, 0, 0, 0.1) !important;
			backdrop-filter: blur(10px);
		}

		/* Custom Scrollbar */
		::-webkit-scrollbar {
			width: 8px;
		}

		::-webkit-scrollbar-track {
			background: var(--glass-bg);
			border-radius: 10px;
		}

		::-webkit-scrollbar-thumb {
			background: var(--primary-gradient);
			border-radius: 10px;
		}

		::-webkit-scrollbar-thumb:hover {
			background: var(--secondary-gradient);
		}

		/* Pulse Animation for Important Elements */
		@keyframes pulse {
			0% { box-shadow: 0 0 0 0 rgba(102, 126, 234, 0.7); }
			70% { box-shadow: 0 0 0 10px rgba(102, 126, 234, 0); }
			100% { box-shadow: 0 0 0 0 rgba(102, 126, 234, 0); }
		}

		.brand-image {
			animation: pulse 2s infinite;
		}

		/* Hover Effects for TreeView */
		.has-treeview > .nav-link:hover {
			background: var(--secondary-gradient) !important;
		}

		/* Modern Typography */
		.brand-text {
			font-weight: 600 !important;
			text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
		}

		/* Enhanced Visual Feedback */
		.nav-item {
			position: relative;
		}

		.nav-item::before {
			content: '';
			position: absolute;
			left: 0;
			top: 50%;
			width: 4px;
			height: 0;
			background: var(--warning-gradient);
			transform: translateY(-50%);
			transition: all 0.3s ease;
			border-radius: 0 4px 4px 0;
		}

		.nav-item:hover::before {
			height: 80%;
		}

		/* Additional icon fixes */
		i[class*="fa-"] {
			display: inline-block !important;
			visibility: visible !important;
			opacity: 1 !important;
		}

		/* Specific fixes for common CRUD icons */
		.fa-plus, .fa-edit, .fa-trash, .fa-eye, .fa-save, .fa-times {
			display: inline-block !important;
			opacity: 1 !important;
			margin-right: 5px !important;
		}

		/* Table action buttons */
		.btn-sm .fas, .btn-sm .far {
			font-size: 12px !important;
			margin-right: 3px !important;
		}

		/* Ensure pagination and search icons work */
		.dataTables_wrapper .fas, .dataTables_wrapper .far {
			display: inline-block !important;
			opacity: 1 !important;
		}
	</style>
</head>

<body class="hold-transition sidebar-mini">
	<!-- Site wrapper -->
	<div class="wrapper">
		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-red navbar-light">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#">
						<i class="fas fa-bars text-white"></i>
					</a>
				</li>

			</ul>

			<!-- SEARCH FORM -->
			<ul class="navbar-nav ml-auto">

				<li class="nav-item d-none d-sm-inline-block">
					<a href="index.php" class="nav-link">
						<font color="white">
							<b>SISTEM INFORMASI DATA KEPENDUDUKAN DESA LEMAHABANG</b>
						</font>
					</a>
				</li>
			</ul>

		</nav>	
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-dark-primary elevation-5">
			<!-- Brand Logo -->
			<a href="index.php" class="brand-link">
				<img src="dist/img/lemahabang.png" alt="AdminLTE Logo" class="brand-image" style="opacity: .8">
				<span class="brand-text"> Desa Lemahabang</span>
			</a>

			<!-- Sidebar -->
			<div class="sidebar">
				<!-- Sidebar user (optional) -->
				<div class="user-panel mt-2 pb-2 mb-2 d-flex">
					<div class="image">
						<img src="dist/img/admin.png">
					</div>
					<div class="info">
						<a href="index.php" class="d-block">
							<?php echo $data_nama; ?>
						</a>
						<span class="badge badge-success">
							<?php echo $data_level; ?>
						</span>
					</div>
				</div>

				<!-- Sidebar Menu -->
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

						<!-- Level  -->
						<?php
          if ($data_level=="Administrator"){
        ?>
						<li class="nav-item">
							<a href="index.php" class="nav-link">
								<i class="nav-icon fas fa-tachometer-alt"></i>
								<p>
									Dashboard
								</p>
							</a>
						</li>

						<li class="nav-item has-treeview">
							<a href="#" class="nav-link">
								<i class="nav-icon fas fa-table"></i>
								<p>
									Kelola Data
									<i class="fas fa-angle-left right"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="?page=data-pend" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Data Penduduk</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="?page=data-kartu" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Data Kartu Keluarga</p>
									</a>
								</li>
							</ul>
						</li>

						<li class="nav-header">Setting</li>

						<li class="nav-item">
							<a href="?page=data-pengguna" class="nav-link">
								<i class="nav-icon fas fa-user"></i>
								<p>
									Pengguna Sistem 
								</p>
							</a>
						</li>

						<?php
          				} elseif($data_level=="Kaur Pemerintah"){
          				?>

						<li class="nav-item">
							<a href="index.php" class="nav-link">
								<i class="nav-icon fas fa-tachometer-alt"></i>
								<p>
									Dashboard
								</p>
							</a>
						</li>

						<li class="nav-item has-treeview">
							<a href="#" class="nav-link">
								<i class="nav-icon fas fa-table"></i>
								<p>
									Kelola Data
									<i class="fas fa-angle-left right"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="?page=data-pend" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Data Penduduk</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="?page=data-kartu" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Data Kartu Keluarga</p>
									</a>
								</li>
							</ul>
						</li>
						<li class="nav-header">Setting</li>

						<?php
							}
						?>

						<li class="nav-item">
							<a onclick="return confirm('Apakah anda yakin akan keluar ?')" href="logout.php" class="nav-link">
								<i class="nav-icon fas fa-arrow-circle-right"></i>
								<p>
									Logout
								</p>
							</a>
						</li>

				</nav>
				<!-- /.sidebar-menu -->
			</div>
			<!-- /.sidebar -->
		</aside>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
			</section>

			<!-- Main content -->
			<section class="content">
				<!-- /. WEB DINAMIS DISINI ############################################################################### -->
				<div class="container-fluid">

					<?php 
      if(isset($_GET['page'])){
          $hal = $_GET['page'];
  
          switch ($hal) {
              
				//Pengguna
				case 'data-pengguna':
					include "admin/pengguna/data_pengguna.php";
					break;
				case 'add-pengguna':
					include "admin/pengguna/add_pengguna.php";
					break;
				case 'edit-pengguna':
					include "admin/pengguna/edit_pengguna.php";
					break;
				case 'del-pengguna':
					include "admin/pengguna/del_pengguna.php";
					break;

				//kartu KK
				case 'data-kartu':
					include "admin/kartu/data_kartu.php";
					break;
				case 'add-kartu':
					include "admin/kartu/add_kartu.php";
					break;
				case 'edit-kartu':
					include "admin/kartu/edit_kartu.php";
					break;
				case 'anggota':
					include "admin/kartu/anggota.php";
					break;
				case 'del-anggota':
					include "admin/kartu/del_anggota.php";
					break;
				case 'del-kartu':
					include "admin/kartu/del_kartu.php";
					break;

				//penduduk
				case 'data-pend':
					include "admin/pend/data_pend.php";
					break;
				case 'add-pend':
					include "admin/pend/add_pend.php";
					break;
				case 'edit-pend':
					include "admin/pend/edit_pend.php";
					break;
				case 'del-pend':
					include "admin/pend/del_pend.php";
					break;
				case 'view-pend':
					include "admin/pend/view_pend.php";
					break;
         
              //default
              default:
                  echo "<center><h1> ERROR !</h1></center>";
                  break;    
          }
      }else{
        // Auto Halaman Home Pengguna
          if($data_level=="Administrator"){
              include "home/admin.php";
              }
          elseif($data_level=="Kaur Pemerintah"){
              include "home/kaur.php";
              }
          }
    ?>

				</div>
			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->

		<footer class="main-footer">
			<div class="float-right d-none d-sm-block">
				Copyright &copy;
				<a target="_blank" href="https://www.instagram.com">
					<strong> Rafi Zaidan Rabbani</strong>
				</a>
				All rights reserved.
			</div>
			<b>VERSI 2025</b>
		</footer>

		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
		</aside>
		<!-- /.control-sidebar -->
	</div>
	<!-- ./wrapper -->

	<!-- jQuery -->
	<script src="plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- Select2 -->
	<script src="plugins/select2/js/select2.full.min.js"></script>
	<!-- DataTables -->
	<script src="plugins/datatables/jquery.dataTables.js"></script>
	<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
	<!-- AdminLTE App -->
	<script src="dist/js/adminlte.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="dist/js/demo.js"></script>
	<!-- page script -->
	<script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

	<script>
		$(function() {
			$("#example1").DataTable();
			$('#example2').DataTable({
				"paging": true,
				"lengthChange": false,
				"searching": false,
				"ordering": true,
				"info": true,
				"autoWidth": false,
			});
		});
	</script>

	<script>
		$(function() {
			//Initialize Select2 Elements
			$('.select2').select2()

			//Initialize Select2 Elements
			$('.select2bs4').select2({
				theme: 'bootstrap4'
			})
		})
	</script>

	<script>
		// Modern Interactions
		$(document).ready(function() {
			// Add smooth scrolling
			$('a[href*="#"]').on('click', function(e) {
				e.preventDefault();
				$('html, body').animate({
					scrollTop: $($(this).attr('href')).offset().top
				}, 500, 'linear');
			});

			// Add active class to current nav item
			$('.nav-link').on('click', function() {
				$('.nav-link').removeClass('active');
				$(this).addClass('active');
			});

			// Add loading effect
			$('.nav-link').on('click', function() {
				var $this = $(this);
				if (!$this.find('.fa-spinner').length) {
					$this.append('<i class="fas fa-spinner fa-spin ml-2"></i>');
					setTimeout(function() {
						$this.find('.fa-spinner').remove();
					}, 1000);
				}
			});

			// Ensure all FontAwesome icons are loaded properly
			$('i[class*="fa-"]').each(function() {
				$(this).css({
					'display': 'inline-block',
					'visibility': 'visible',
					'opacity': '1'
				});
			});

			// Fix for dynamically loaded content icons
			$(document).on('DOMNodeInserted', function(e) {
				$(e.target).find('i[class*="fa-"]').css({
					'display': 'inline-block',
					'visibility': 'visible',
					'opacity': '1'
				});
			});
		});
	</script>

</body>

</html>