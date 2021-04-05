<!DOCTYPE html>
<html>
<head>
<title>tampil data siswa </title>
</head>
<body>
    <center>
<h1 align=center->tampil data siswa</h1>
<table border="1">
<thead>
    <table border cellpadding=3 cellspacing=3 align=center>
    <th>NO</th>
    <th>id</th>
    <th>Nama siswa</th>
    <th>jeniskelamin</th>
    <th>Alamat</th>
    <th>aksi</th>
</thead>
<tbody>
    <?php
    include 'config.php';
    $no=1;
    $data =mysqli_query ($koneksi, "select * from siswa");
    while($d=mysqli_fetch_array($data)){
    ?>
    <tr>
        <td align=center><?php echo $no++; ?></td>
        <td><?php echo $d['id'];?></td>
        <td><?php echo $d['name'];?></td>
        <td><?php echo $d['Jeniskelamin'];?></td>
        <td><?php echo $d['Alamat'];?></td>
        <td><a href="edit.php?i d=<?php echo $d['id'];?>">EDIT</a>
        <a href="delete_data.php?id=<?php echo $d['id'];?>">HAPUS</a></td>
    </td>
    </tr>
    <?php
    }
    ?>
    </table>
    <br/>

    <a href="cetak.php" target="_blank">CETAK</a>
    </from>
    </center>
    </body>
    </html>
    