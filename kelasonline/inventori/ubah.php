<?php 

// panggil file yang dibutuhkan
require_once '../session.php';
require_once '../koneksi.php';
require_once '../functions.php';

if (!isset($_SESSION['auth'])) {
	set_flash_message('gagal', 'Anda harus login dulu!');
	header('Location: login.php');
}

if(!isset($_GET['id_daftar'])){
	header('Location: index.php');
}

$id_daftar = $_GET['id_daftar'];
$select = "SELECT swa.nama AS nama, inv.jumlah AS jumlah, inv.kondisi AS kondisi FROM tbl_siswa AS swa INNER JOIN tbl_inventori AS inv ON inv.id_daftar = swa.id_daftar WHERE swa.id_daftar = '$id_daftar'";
$query = mysqli_query($koneksi, $select);
$inventori = mysqli_fetch_assoc($query);
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
  <title><?= $_SESSION['app_name'] ?> - Ubah Data Registrasi Siswa</title>
  <link href="../_template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="../_template/css/sb-admin-2.min.css" rel="stylesheet">
  <style>
  	.input-group-text {
  		width: 45px;
  	}
  </style>
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
						<h1 class="h3 mb-4 text-gray-800 float-left">Ubah Data Registrasi Siswa</h1>
						<a href="index.php" class="btn btn-secondary btn-sm float-right"><i class="fas fa-reply"></i> Kembali</a>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-8">
							<div class="card">
								<div class="card-header">
									<span class="text-primary"><strong>Silahkan isi data di bawah ini!</strong></span>
								</div>
								<div class="card-body">
									<form action="proses_ubah.php?id_daftar=<?php echo $id_daftar ?>" method="POST">
										<div class="form-group">
											<label for="tagihan">Tanggal Pelunasan Tagihan</label>
											<div class="input-group">
												<div class="input-group-prepend">
													<div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
												</div>
												<input type="date" id="tagihan" class="form-control" placeholder="Masukan Tanggal Tagihan" name="tagihan" autocomplete="off" required="required">
											</div>
										<div class="form-group">
											<label for="nama_siswa">Nama Siswa</label>
											<div class="input-group">
												<div class="input-group-prepend">
													<div class="input-group-text"><i class="fas fa-box"></i></div>
												</div>
												<input type="text" id="nama_siswa" class="form-control" placeholder="Masukan Nama siswa" name="nama_siswa" autocomplete="off" required="required" value="<?php echo $inventori['nama'] ?>">
											</div>
										</div>
										<div class="form-group">
											<label for="jumlah_bayar">Jumlah Bayar </label>
											<div class="input-group">
												<div class="input-group-prepend">
													<div class="input-group-text"><i class="fas fa-at"></i></div>
												</div>
												<input type="number" id="jumlah_bayar" class="form-control" placeholder="Masukan Jumlah Bayar" name="jumlah_bayar" autocomplete="off" required="required" value="<?php echo $inventori['jumlah'] ?>">
											</div>
										</div>
										<div class="form-group">
											<label for="st_registrasi">Status</label>
											<div class="input-group">
												<div class="input-group-prepend">
													<div class="input-group-text"><i class="fas fa-at"></i></div>
												</div>
												<select name="st_registrasi" id="st_registrasi" class="form-control">
													<option value="1" <?php echo $inventori['kondisi'] == 1 ? 'selected' : '' ?>>Sudah Registrasi</option>
													<option value="0" <?php echo $inventori['kondisi'] == 0 ? 'selected' : '' ?>>Belum Registrasi</option>
												</select>
											</div>
										</div>
										<div class="form-group">
											<button type="submit" class="btn btn-primary btn-sm" name="simpan"><i class="fas fa-save"></i> Simpan</button>
											<button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-times"></i> Batal</button>
										</div>
									</form>
								</div>
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
