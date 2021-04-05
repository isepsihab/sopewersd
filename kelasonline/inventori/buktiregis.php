<?php 

// panggil file yang dibutuhkan
require_once '../session.php';
require_once '../koneksi.php';
require_once '../functions.php';

if (!isset($_SESSION['auth'])) {
	set_flash_message('gagal', 'Anda harus login dulu!');
	header('Location: login.php');
}
$id_daftar = $_GET['id_daftar'];
$select = "SELECT inv.id_daftar AS id_daftar, swa.nama AS nama, inv.tanggal_tagihan AS registrasi, swa.daftar AS signup, inv.kondisi AS kondisi, swa.foto AS foto_siswa FROM tbl_siswa AS swa INNER JOIN tbl_inventori AS inv ON inv.id_daftar = swa.id_daftar WHERE swa.id_daftar = '$id_daftar'";
$query = mysqli_query($koneksi, $select);
$printing_cmd = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Bukti Registrasi</title>
	<style>
		#header{background}
			#header img {float:left;padding:10px;height:90;}
		#content{width:1000px;overflow:hidden;}
			#kanan{width:880px;float:left;padding:10px;}
				#kanan img{float:left;margin:5px;width:300px;float:left;}
		
	</style>
</head>
<body>
		<center>
		<?php
			if ($printing_cmd['kondisi'] == '1'){
		?>
		<div id="header">
			<img src="logo.jpg" height="130px" width="130px;">
					<p style="text-align:center">
						<font color="Black" face="Arial Black">
						<b>PENERIMAAN PESERTA DIDIK BARU</b><BR>
						SD Negeri 2 Imbanagara <BR>
						</font>
						<font color="Black" face="Times New Roman">
						Jl. Jenderal Sudirman No.354 Imbanagara, Ciamis 46219, Jawa Barat, Indonesia
						</font>
					</p>
		</div>
		</center>
		<div id="content">
			<div id="kanan">
			<p style="text-align:justify;text-indent:60px;margin:auto;overflow:hidden;">
				<h2><center>SELAMAT TELAH MEMNJADI PESERTA DIDIK BARU DI SD NEGERI 2 IMBANAGARA<br><br>
				<!--<?php echo $printing_cmd['foto_siswa'] ?>-->
				<?php $path = "../siswa/img/foto_siswa/" ?>
				<img src="<?php echo $path.$printing_cmd['foto_siswa'] ?>"></h2></center>
				<p>Anda telah RESMI menjadi siswa Baru di SD Negeri 2 Imbanagara mulai  tanggal <?php echo $printing_cmd['registrasi'] ?>. setelah melakukan pendaftaran pada
				Tanggal <?php echo $printing_cmd['signup'] ?>
				dengan melakukan pembayaran sebesar RP. 100.000 pada tanggal <?php echo $printing_cmd['registrasi'] ?> dengan :<br></p>
			</p>
				Nomor Registrasi : <?php echo $printing_cmd['id_daftar'] ?> </br>
				Nama Peseta Didik: <?php echo $printing_cmd['nama'] ?> </br></br>
			<p>Rincian Biaya:
				jumlah bayar sebesar RP. 100.000 pada tanggal <?php echo $printing_cmd['registrasi'] ?> digunakan untuk pembayaran 
			seragam sehingga siswa mendaapatkan seragam olahraga dan seragam batik tanpa perlu melakukan pembayaran lagi</p>
			<p> selamat belajar di SD Negeri 2 Imbanagara yang akkan di mulai pada tanggal pembelajaraan yang akan di beritahukan pada pengemuman berikutnya.</p>
		</div>
		<?php
			}else{
		?>
				STOP! Siswa belum registrasi!
		<?php
			}
		?>
		
		
	
 
	
	<script>
		window.print();
	</script>
	
</body>
</html>