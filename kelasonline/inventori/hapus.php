<?php 

// panggil file yang dibutuhkan
require_once '../session.php';
require_once '../koneksi.php';
require_once '../functions.php';

if (!isset($_SESSION['auth'])) {
	set_flash_message('gagal', 'Anda harus login dulu!');
	header('Location: login.php');
}

if(!isset($_GET['nis'])){
	header('Location: index.php');
}

$nis = $_GET['nis'];
$query = mysqli_query($koneksi, "DELETE FROM tbl_inventori WHERE nis = $nis");
if($query){
	set_flash_message('sukses', 'Data berhasil dihapus!');
	header('Location: index.php');
} else die("gagal!" . mysqli_error($koneksi));

?>