<?php 

// panggil file yang dibutuhkan
require_once '../session.php';
require_once '../koneksi.php';
require_once '../functions.php';

if (!isset($_SESSION['auth'])) {
	set_flash_message('gagal', 'Anda harus login dulu!');
	header('Location: login.php');
}
$no = 1;
$query = mysqli_query($koneksi, "SELECT * FROM tbl_inventori");
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title> REGISTRASI PENERIMAAN PESERTA DIDIK BARU SD NEGERI 2 IMBANAGARA</title>
	<style>
		#header{background-image:url("register.jpg")}
			#header img {float:left;padding:10px;height:90;}
	</style>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title><?= $_SESSION['app_name'] ?> -Laporan PPDB</title>
  <link href="../_template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="../_template/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="../_template/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
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
	<?php require_once '../_sidebar.php'; ?>
		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">
		<!-- Main Content -->
			<div id="content">
				<!-- Topbar -->
				<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
					<!-- Topbar Navbar -->
					<?php require_once '../_topnav.php'; ?>
				</nav>
				<!-- End of Topbar -->
				<!-- Begin Page Content -->
				<div class="container-fluid">
					<!-- Page Heading -->
					<div class="clearfix">
						<h1 class="h3 mb-4 text-gray-800 float-left">Laporan Data Peserta Didik Baru</h1>
						<a href="tambah.php" class="btn btn-primary btn-sm float-right"><i class="fas fa-plus"></i> Tambah Data</a>
					</div>
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
	                 
			<!-- Footer --> <?php endif ?>
					<div class="card">
						<div class="card-header">Registrasi Siswa</div>
						<div class="card-body">
							<div class="form-group">
							<div class="table-responsive">
								<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
									<thead>
										<tr>
											<th>Nis</th>
											<th>Nama </th>
											<th>jumlah Bayar</th>
											<th>Status</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th>Nis</th>
											<th>Nama</th>
											<th>jumlah Bayar</th>
											<th>Status</th>
											<th>Aksi</th>
										</tr>
									</tfoot>
									<tbody>
										<?php while($inventori = mysqli_fetch_assoc($query)) : ?>
											<tr>
												<td><?php echo $no++ ?></td>
												<td><?php echo $inventori['nama'] ?></td>
												<td><?php echo $inventori['jumlah'] ?></td>
												<td>
													<?php
														if ($inventori['kondisi'] == 'Sudah Registrasi') {
															?>
																<span class="text-primary">Sudah Registrasi</span>
															<?php
														} elseif ($inventori['kondisi'] == 'Belum Registrasi'){
															?>
																<span class="text-warning">Belum Registrasi</span>
															<?php
														} elseif ($inventori['kondisi'] == 'Baru setengah pembayaran'){
															?>
																<span class="text-danger">Baru setengah pembayaran</span>
															<?php
														}
													?>
												</td>
												<td>
													<a href="ubah.php?nis=<?php echo $inventori['nis'] ?>" class="btn btn-sm btn-success"><i class="fas fa-pencil-alt"></i>&nbsp;&nbsp;Ubah</a>
													<a href="hapus.php?nis=<?php echo $inventori['nis'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('apakah anda yakin?')"><i class="fas fa-trash-alt"></i>&nbsp;&nbsp;Hapus</a>
												</td>
											</tr>
										<?php endwhile; ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			<!-- /.container-fluid -->
			</div>
			<footer class="sticky-footer bg-white">
		<div class="container my-auto">
		<div class="copyright text-center my-auto">
						<span>Copyright &copy;Alvi Rahmawati & Salma Fitria Alfiani</span>
					</div>
				</div>
			</footer>
			<!-- End of Footer -->

		</div>
		<!-- End of Content Wrapper -->
	</div>
	<script src="_template/vendor/jquery/jquery.min.js"></script>
<script src="_template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="_template/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="_template/js/sb-admin-2.min.js"></script>
</body>

</html>
