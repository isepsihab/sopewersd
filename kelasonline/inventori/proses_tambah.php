<?php 

// panggil file yang dibutuhkan
require_once '../session.php';
require_once '../koneksi.php';
require_once '../functions.php';

if (!isset($_SESSION['auth'])) {
	set_flash_message('gagal', 'Anda harus login dulu!');
	header('Location: login.php');
}

if(isset($_POST['simpan'])){
	// print_r($_POST);
	//$registrasi = $_POST['registrasi'];
	$id_daftar = $_POST['id_daftar'];
	//$jumlah = $_POST['jumlah_bayar'];
	$kondisi = $_POST['registrasi'];

	$query1 = mysqli_query($koneksi, "INSERT INTO tbl_inventori (id_daftar, kondisi) VALUES ('$id_daftar', '$kondisi')");
	//$query2 = mysqli_query($koneksi, "INSERT INTO tbl_siswa (id_daftar) VALUES ('$id_daftar')");

// di sini entar coba tambahin pengecekan nis nya ada yg kembar atau tidak sebelum dieksekusi

	if($query1){
		//if($query2){
			set_flash_message('sukses', 'Data berhasil ditambahkan!');
			header('Location: index.php');
		//}
	} else die('gagal!' . mysqli_error($koneksi));
} else {
	header('Location: tambah.php');
}

?>