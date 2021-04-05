<?php
include 'config.php';
$id = $_GET['id'];
mysqli_query($koneksi,"delete from siswa where id='$id'");
header("location:menampilkan_data.php")
?>