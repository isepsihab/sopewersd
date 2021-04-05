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
$query = mysqli_query($koneksi, "DELETE FROM tbl_siswa WHERE id_daftar = $id_daftar");
if($query){
	set_flash_message('sukses', 'Data berhasil dihapus!');
	header('Location: index.php');
} else die("gagal!" . mysqli_error($koneksi));

?>