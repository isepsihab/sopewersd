<?php 

// panggil file yang dibutuhkan
require_once 'session.php';
require_once 'koneksi.php';
require_once 'functions.php';

if (!isset($_SESSION['auth'])) {
	set_flash_message('gagal', 'Anda harus login dulu!');
	header('Location: login.php');
}

$query = mysqli_query($koneksi, "SELECT * FROM tbl_kelas WHERE id_daftar = 1");
$siswa1 = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(kondisi) AS total FROM tbl_siswa AS swa INNER JOIN tbl_inventori AS inv ON inv.id_daftar = swa.id_daftar WHERE kondisi = '0'"));
$siswa2 = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(kondisi) AS total FROM tbl_siswa AS swa INNER JOIN tbl_inventori AS inv ON inv.id_daftar = swa.id_daftar WHERE kondisi = '1'"));
$siswa3 = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(kondisi) AS total FROM tbl_siswa AS swa INNER JOIN tbl_inventori AS inv ON inv.id_daftar = swa.id_daftar"));
?>
<!DOCTYPE html>
<html lang="en">

<head>
<title>PENERIMAAN PESERTA DIDIK BARU SD NEGERI 2 IMBANAGARA</title>
	<style>
		#header{background-image:url("register.jpg")}
			#header img {float:left;padding:10px;height:90;}
	</style>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title><?= $_SESSION['app_name'] ?> - Home</title>
  <link href="_template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="_template/css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body id="page-top">
	<div id="header">
				<img src="logo.jpg" height="130px" width="130px;">
					<p style="text-align:center">
						<font color="white" face="Arial Black">
						<BR><BR><b>PENERIMAAN PESERTA DIDIK BARU</b><BR>
						SD Negeri 2 Imbanagara <BR>
						</font>
						<font color="white" face="Times New Roman">
						Jl. Jenderal Sudirman No.354 Imbanagara, Ciamis 46219, Jawa Barat, Indonesia
						</font>
					</p>
	<div id="wrapper">
	<?php require_once '_sidebar.php'; ?>
		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

		<!-- Main Content -->
		<div id="content">

		<!-- Topbar -->
		<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

		<!-- Topbar Navbar -->
		<?php require_once '_topnav.php'; ?>
		</nav>
		<!-- End of Topbar -->
		<!-- Begin Page Content -->
		<div class="container-fluid">
		<!-- Page Heading -->
		<h1 class="h3 mb-4 text-gray-800"><B>Selamat Datang Di Sekolah Dasar Negeri 2 Imbanagara !!!<B></h1>
		<hr>
		<?php if (check_flash_message('sukses')): ?>
	        <div class="alert alert-success alert-dismissible fade show" role="alert">
	            <?php get_flash_message() ?>
	          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	            <span aria-hidden="true">&times;</span>
	          </button>
	        </div>
	      <?php elseif(check_flash_message('gagal')) : ?>
	        <div class="alert alert-danger alert-dismissible fade show" role="alert">
	            <?php get_flash_message() ?>
	          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	            <span aria-hidden="true">&times;</span>
	          </button>
	        </div>
	    <?php endif ?>
			<div class="row">
			<!-- Earnings (Monthly) Card Example -->
				<div class="col-md-3 mb-4">
					<div class="card border-left-primary shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Siswa Baru</div>
									<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $siswa3['total']; ?></div>
								</div>
								<div class="col-auto">
									<i class="fas fa-users fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3 mb-4">
					<div class="card border-left-danger shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Siswa Teregistrasi</div>
									<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $siswa2['total']; ?></div>
								</div>
								<div class="col-auto">
									<i class="fas fa-check-circle fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3 mb-4">
					<div class="card border-left-success shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Siswa Belum Registrasi</div>
									<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $siswa1['total']; ?></div>
								</div>
								<div class="col-auto">
									<i class="fas fa-times-circle fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<p> 
				Lakukan Pendaftaran Dan Registrasi <br>
				Kontrok Data Peserta Didik Yang Mendaftar <p>
		</div>
		<!-- End of Main Content -->

		<!-- Footer -->
		<footer class="sticky-footer bg-white">
		<div class="container my-auto">
		<div class="copyright text-center my-auto">
		<span>Copyright &copy; Alvi Rahmawati & Salma Fitria Alfiani</span>
		</div>
		</div>
		</footer>
		<!-- End of Footer -->

		</div>
		<!-- End of Content Wrapper -->

	</div>

<!-- End of Page Wrapper -->
<script src="_template/vendor/jquery/jquery.min.js"></script>
<script src="_template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="_template/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="_template/js/sb-admin-2.min.js"></script>
</body>

</html>