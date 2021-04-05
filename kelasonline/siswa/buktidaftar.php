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
<html>
<head>
	<title>LAPORAN</title>
</head>
<body>

	<h2>
		<center>
		<?php while($siswa = mysqli_fetch_assoc($query)) : ?>
			<p style="text-align:justify;text-indent:0.5;">
				<!--<?php echo $printing_cmd['foto_siswa'] ?>-->
				<?php $path = "../siswa/img/foto_siswa/" ?>
				<img src="<?php echo $path.$siswa['foto'] ?>">
				SELAMAT! </br>
				Anda telah terdaftar sebagai siswa pada tanggal <?php echo siswa['daftar'] ?>.  </br> </br>

				Tanggal Daftar : <?php echo $siswa['daftar'] ?> </br>
				Nomor Registrasi : <?php echo $siswa['id_daftar'] ?> </br>
				Nama : <?php echo $siswa['nama'] ?> </br></br>

			
		</center>
		
	</h2>
 
	
	<script>
		window.print();
	</script>
	
</body>
</html>