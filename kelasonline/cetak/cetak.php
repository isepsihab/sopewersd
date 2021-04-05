<!DOCTYPE html>
<html>
<head>
	<title>Cetak dari Database dengan PHP</title>
</head>
<body>
	<Center>
		<h2>DATA SISWA</h2>
		<h2>SD NEGERI 2 IMBANAGARA</h2>
	</Center>
	<?php
	include 'config.php'
	?>
	<table border="1" style="width: 100%">
		<tr>
			<th width="1">No</th>
			<th>id</th>
			<th>Nama</th>
			<th>Jenis Kelamin</th>
			<th>Alamat</th>
			
		</tr>
		<?php
		$no = 1;
		$sql = mysql_query($koneksi,"select * from siswa");
		while ($data +mysqli_fetch_array($sql)){
		?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $Data['id'];?></td>
			<td><?php echo $Data['nama']; ?></td>
			<td><?php echo $Data['JenisKelamin']; ?></td>
			<td><?php echo $Data['alamat']; ?></td>
		</tr>
		<?php
	}
	?>
	</table>
	<script >
		window.print()
	</script>
</table>
</body>
</html><!DOCTYPE html>
<html>
<head>
	<title>Cetak dari Database dengan PHP</title>
</head>
<body>
	<Center>
		<h2>DATA SISWA</h2>
		<h2>SD NEGERI 2 IMBANAGARA</h2>
	</Center>
	<?php
	include 'config.php'
	?>
	<table border="1" style="width: 100%">
		<tr>
			<th width="1">No</th>
			<th>id</th>
			<th>Nama</th>
			<th>Jenis Kelamin</th>
			<th>Alamat</th>
			
		</tr>
		<?php
		$no = 1;
		$sql = mysql_query($koneksi,"select * from siswa");
		while ($data +mysqli_fetch_array($sql)){
		?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $Data['id'];?></td>
			<td><?php echo $Data['nama']; ?></td>
			<td><?php echo $Data['JenisKelamin']; ?></td>
			<td><?php echo $Data['alamat']; ?></td>
		</tr>
		<?php
	}
	?>
	</table>
	<script >
		window.print()
	</script>
</table>
</body>
</html>