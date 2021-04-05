<?php 

// panggil file yang dibutuhkan
require_once '../session.php';
require_once '../koneksi.php';
require_once '../functions.php';

if (!isset($_SESSION['auth'])) {
	set_flash_message('gagal', 'Anda harus login dulu!');
	header('Location: login.php');
}
$query = mysqli_query($koneksi, "SELECT * FROM tbl_siswa");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title> </title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title><?= $_SESSION['app_name'] ?> - Tambah Data Peserta Didik Baru</title>
  <link href="../_template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="../_template/css/sb-admin-2.min.css" rel="stylesheet">
  <style>
  	#header{background-image:url("register.jpg")}
			#header img{float:left;padding:10px;height:90;}
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
						<h1 class="h3 mb-4 text-gray-800 float-left">Pendaftaran Peserta Didik Baru</h1>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-8">
							<div class="card">
								<div class="card-header">
									<span class="text-primary"><strong>Silahkan isi data di bawah ini!</strong></span>
								</div>
								<div class="card-body">
									<form action="proses_tambah.php" enctype="multipart/form-data" method="POST">
										<div class="form-group">
										<div class="form-group">
											<label for="id_daftar">Nomor peserta</label>
											<div class="input-group">
												<div class="input-group-prepend">
													<div class="input-group-text"><i class="fas fa-user"></i></div>
												</div>
												<input type="number" id="id_daftar" class="form-control" placeholder="Masukan id daftar" name="id_daftar" autocomplete="off" required="required">
											</div>
										</div>
											<label for="daftar">Tanggal Daftar</label>
											<div class="input-group">
												<div class="input-group-prepend">
													<div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
												</div>
												<input type="date" id="daftar" class="form-control" placeholder="Masukan Tanggal Lahir" name="daftar" autocomplete="off" required="required">
											</di>
										</div>
										<div class="form-group">
											<label for="nama">Nama Siswa </label>
											<div class="input-group">
												<div class="input-group-prepend">
													<div class="input-group-text"><i class="fas fa-user"></i></div>
												</div>
												<input type="text" id="nama" class="form-control" placeholder="Masukan Nama Siswa" name="nama" autocomplete="off" required="required">
											</div>
										</div>
										<div class="form-group">
											<label for="kelamin">Jenis Kelamin</label>
											<div class="input-group">
												<div class="input-group-prepend">
													<div class="input-group-text"><i class="fas fa-child"></i></div>
												</div>
												<select name="kelamin" id="kelamin" class="form-control">
													<option value="pl">Pilih</option>
													<option value="p">Perempuan</option>
													<option value="l">Laki - Laki</option>
												</select>
											</div>
										</div>
										<div class="form-group">
											<label for="tempat_lahir">Tempat Lahir Siswa</label>
											<div class="input-group">
												<div class="input-group-prepend">
													<div class="input-group-text"><i class="fas fa-globe"></i></div>
												</div>
												<input type="text" id="tempat_lahir" class="form-control" placeholder="Masukan Tempat Lahir" name="tempat_lahir" autocomplete="off" required="required">
											</div>
										</div>
										<div class="form-group">
											<label for="tanggal_lahir">Tanggal Lahir Siswa</label>
											<div class="input-group">
												<div class="input-group-prepend">
													<div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
												</div>
												<input type="date" id="tanggal_lahir" class="form-control" placeholder="Masukan Tanggal Lahir" name="tanggal_lahir" autocomplete="off" required="required">
											</di>
										</div>
										<div class="form-group">
											<label for="agama">Agama Siswa</label>
											<div class="input-group">
												<div class="input-group-prepend">
													<div class="input-group-text"><i class="fas fa-book-open"></i></div>
												</div>
												<select name="agama" id="agama" class="form-control">
													<option value="Islam">Islam</option>
													<option value="Kristen">Kristen</option>
													<option value="Buddha">Buddha</option>
													<option value="Hindu">Hindu</option>
													<option value="Konghucu">Konghucu</option>
												</select>
											</div>
										</div>
										<div class="form-group">
											<label for="wni">Kewarganegaraan</label>
											<div class="input-group">
												<div class="input-group-prepend">
													<div class="input-group-text"><i class="fas fa-globe"></i></div>
												</div>
												<input type="text" id="wni" class="form-control" placeholder="Masukan Kewarganegaraan" name="wni" autocomplete="off" required="required">
											</div>
										</div>
										<div class="form-group">
											<label for="alamat">Alamat Siswa</label>
											<div class="input-group">
												<div class="input-group-prepend">
													<div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
												</div>
												<textarea name="alamat" id="alamat" class="form-control" placeholder="Masukan Alamat" required="required" autocomplete="off"></textarea>
											</div>
										</div>
										<div class="form-group">
											<label for="ayah">Nama Ayah</label>
											<div class="input-group">
												<div class="input-group-prepend">
													<div class="input-group-text"><i class="fas fa-male"></i></div>
												</div>
												<input type="text" id="ayah" class="form-control" placeholder="Masukan Nama Ayah" name="ayah" autocomplete="off" required="required">
											</div>
										</div>
										<div class="form-group">
											<label for="pa">Pekerjaan Ayah</label>
											<div class="input-group">
												<div class="input-group-prepend">
													<div class="input-group-text"><i class="fas fa-suitcase"></i></div>
												</div>
												<input type="text" id="pa" class="form-control" placeholder="Masukan Pekerjaan Ayah" name="pa" autocomplete="off" required="required">
											</div>
										</div>
										<div class="form-group">
											<label for="ibu">Nama Ibu</label>
											<div class="input-group">
												<div class="input-group-prepend">
													<div class="input-group-text"><i class="fas fa-female"></i></div>
												</div>
												<input type="text" id="ibu" class="form-control" placeholder="Masukan Nama Ibu" name="ibu" autocomplete="off" required="required">
											</div>
										</div>
										<div class="form-group">
											<label for="pi">Pekerjaan Ibu</label>
											<div class="input-group">
												<div class="input-group-prepend">
													<div class="input-group-text"><i class="fas fa-suitcase"></i></div>
												</div>
												<input type="text" id="pi" class="form-control" placeholder="Masukan Pekerjaan Ayah" name="pi" autocomplete="off" required="required">
											</div>
										</div>
										<div class="form-group">
											<label for="wali">Nama Wali Siswa</label>
											<div class="input-group">
												<div class="input-group-prepend">
													<div class="input-group-text"><i class="fas fa-user"></i></div>
												</div>
												<input type="text" id="wali" class="form-control" placeholder="Masukan Nama Wali Jika Ada" name="wali" autocomplete="off" required="required">
											</div>
										</div>
										<div class="form-group">
											<label for="pw">Pekerjaan Wali Siswa</label>
											<div class="input-group">
												<div class="input-group-prepend">
													<div class="input-group-text"><i class="fas fa-suitcase"></i></div>
												</div>
												<input type="text" id="pw" class="form-control" placeholder="Masukan Pekerjaan Wali Siswa Jika Ada" name="pw" autocomplete="off" required="required">
											</div>
										</div>
										<div class="form-group">
											<label for="nohp">Nomor Telepon Orang Tua/Wali</label>
											<div class="input-group">
												<div class="input-group-prepend">
													<div class="input-group-text"><i class="fas fa-phone"></i></div>
												</div>
												<input type="text" id="nohp" class="form-control" placeholder="Masukan Nomor Telepon Orang Tua/Wali" name="nohp" autocomplete="off" required="required">
											</div>
										</div>
										<p><b>LAKUKAN PENGAPLOATAN DATA SISWA DENGAN NAMA FILE (NAMA_NAMA DATA) DALAM BENTUK GAMBAR !!!</b></p>
										<div class="form-group">
											Foto Siswa : <input name="up_fotosiswa" id="up_fotosiswa" type="file" />
   											
											<!--<button type="submit" class="btn btn-primary btn-sm" name="up_fotosiswa" value="up_fotosiswa"><i class="fas fa-upload"></i> Upload</button>-->
										</div>
										<div class="form-group">
											Akta Kelahiran Siswa : <input name="up_akta" id="up_akta" type="file" />
										</div>
										<div class="form-group">
											Kartu Keluarga Siswa : <input name="up_kk" id="up_kk" type="file" />
										</div>
										<div class="form-group">
											Kartu KIP/KIS/PKH(jika ada) : <input name="up_other" id="up_other" type="file" />
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
			<!-- End of Main Content -->
			<!-- Footer -->
			<footer class="sticky-footer bg-white">
				<div class="container my-auto">
					<div class="copyright text-center my-auto">
						<span>Copyright &copy;Alvi Rahmawati & salma fitria alfiani</span>
					</div>
				</div>
			</footer>
			<!-- End of Footer -->

		</div>
		<!-- End of Content Wrapper -->

	</div>

<!-- End of Page Wrapper -->
<script src="../_template/vendor/jquery/jquery.min.js"></script>
<script src="../_template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../_template/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="../_template/js/sb-admin-2.min.js"></script>
</body>

</html>