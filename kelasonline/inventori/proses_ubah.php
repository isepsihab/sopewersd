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

if(isset($_POST['simpan'])){
	// print_r($_POST);
	$registrasi = $_POST['tagihan'];
	$nama = $_POST['nama_siswa'];
	$jumlah = "100.000";
	$st_registrasi = $_POST['st_registrasi'];
	$id_daftar = $_GET['id_daftar'];

	$update_query = mysqli_query($koneksi, "UPDATE tbl_inventori SET tanggal_tagihan = '$registrasi', jumlah = '$jumlah', kondisi = '$st_registrasi' WHERE id_daftar = '$id_daftar'");


	if($update_query){
		$count_query = mysqli_query($koneksi, "SELECT COUNT(kondisi) AS counted_nis FROM tbl_inventori WHERE kondisi = 1");
		$count_nis = mysqli_fetch_assoc($count_query);
		if($count_nis['counted_nis'] < 10){
			$new_nis = $id_daftar . "0" . $count_nis['counted_nis'];
		}else{
			$new_nis = $id_daftar . $count_nis['counted_nis'];
		}
		

		$updatenis_query = mysqli_query($koneksi, "UPDATE tbl_siswa SET nis = '$new_nis' WHERE id_daftar = '$id_daftar'");

		set_flash_message('sukses', 'Data berhasil diubah!');
		header('Location: index.php');
	} else die('gagal!' . mysqli_error($koneksi));
} else {
	header('Location: tambah.php');
}

?>