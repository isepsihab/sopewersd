<?php 

// panggil file yang dibutuhkan
require_once '../koneksi.php';

$no = 1;
$query = mysqli_query($koneksi, "SELECT swa.nis AS nis, swa.nama AS nama, inv.tanggal_tagihan AS registrasi FROM tbl_siswa AS swa INNER JOIN  tbl_inventori AS inv ON inv.id_daftar = swa.id_daftar WHERE kondisi = '1'");
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<style>
		#header{background-image:url("register.jpg")}
			#header img {float:left;padding:10px;height:90;}
	</style>


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
					<br>
					<br>
					<div class="card">
						<div class="card-header">Laporan Data Siswa Baru</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
									<thead>
										<tr>
											<th>Nomor Induk Siswa</th>
											<th>Nama Siswa</th>
											<th>Tanggal Registrasi</th>
										</tr>
									</thead>
									<tbody>
										<?php while($inventori = mysqli_fetch_assoc($query)) : ?>
											<tr>
												<td><?php echo $inventori['nis'] ?></td>
												<td><?php echo $inventori['nama'] ?></td>
												<td><?php echo $inventori['registrasi'] ?></td>
											</tr>
										<?php endwhile; ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<p><center> Sekolah Dasar Negeri 2 Imbanagara</center></p>
	<script>
		window.print();
	</script>
	
</body>
</html>