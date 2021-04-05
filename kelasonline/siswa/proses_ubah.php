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
	$daftar = $_POST['daftar'];
	$nama = $_POST['nama'];
	$kelamin = $_POST['kelamin'];
	$tempat_lahir = $_POST['tempat_lahir'];
	$tanggal_lahir = $_POST['tanggal_lahir'];
	$agama = $_POST['agama'];
	$wni = $_POST['wni'];
	$alamat = $_POST['alamat'];
	$ayah = $_POST['ayah'];
	$pa = $_POST['pa'];
	$ibu = $_POST['ibu'];
	$pi = $_POST['pi'];
	$wali = $_POST['wali'];
	$pw = $_POST['pw'];
	$nohp = $_POST['nohp'];
	//$foto = $_POST['foto'];
	//$akte = $_POST['akte'];
	//$kk = $_POST['kk'];
	//$kip = $_POST['kip'];
	$id_daftar = $_GET['id_daftar'];

	$fileName1 = $_FILES['up_fotosiswa']['name'];
	$fileSize1 = $_FILES['up_fotosiswa']['size'];
	$fileError1 = $_FILES['up_fotosiswa']['error'];
	$file_ext1 = substr($fileName1, strripos($fileName1, '.')); // get file extention

	$fileName2 = $_FILES['up_akta']['name'];
	$fileSize2 = $_FILES['up_akta']['size'];
	$fileError2 = $_FILES['up_akta']['error'];
	$file_ext2 = substr($fileName2, strripos($fileName2, '.')); // get file extention

	$fileName3 = $_FILES['up_kk']['name'];
	$fileSize3 = $_FILES['up_kk']['size'];
	$fileError3 = $_FILES['up_kk']['error'];
	$file_ext3 = substr($fileName3, strripos($fileName3, '.')); // get file extention

	$fileName4 = $_FILES['up_other']['name'];
	$fileSize4 = $_FILES['up_other']['size'];
	$fileError4 = $_FILES['up_other']['error'];
	$file_ext4 = substr($fileName4, strripos($fileName4, '.')); // get file extention


	$allowed_file_types = array('.jpg','.jpeg','.png','.bmp');

	
	$query = mysqli_query($koneksi, "UPDATE tbl_siswa SET daftar = '$daftar', nama = '$nama', kelamin = '$kelamin', tempat_lahir = '$tempat_lahir', tanggal_lahir = '$tanggal_lahir', agama = '$agama', wni = '$wni', alamat = '$alamat', ayah = '$ayah', pa = '$pa', ibu = '$ibu', pi = '$pi', wali = '$wali', pw = '$pw', nohp = '$nohp' WHERE id_daftar = $id_daftar");
	//$cmd = mysqli_fetch_assoc($query);
	
	if($query){

// untuk menambahkan foto siswa ke dalam tabel dan folder
		if ($fileSize1 > 0 || $fileError1 == 0){
			if (in_array($file_ext1, $allowed_file_types)){	
				// Rename file
				$new_fileName1 = $id_daftar . "_" . $nama . $file_ext1;
				unlink('img/foto_siswa/' . $new_fileName1);
				$move = move_uploaded_file($_FILES['up_fotosiswa']['tmp_name'], 'img/foto_siswa/' . $new_fileName1);
				if ($move) {
					$update = "UPDATE tbl_siswa SET foto = '$new_fileName1' WHERE id_daftar = '$id_daftar'";
					$update_query = mysqli_query($koneksi, $update);
					set_flash_message('sukses', 'File berhasil diupload.');
					echo "File berhasil diupload";
				} else {
					set_flash_message('gagal', 'Gagal mengupload file.');
					echo "Gagal mengupload file";
				}
			}elseif (empty($file_basename)){	
				// file selection error
				set_flash_message('gagal', 'Please select a file to upload.');
				echo "Please select a file to upload.";
			} 
		}  else {
			echo "Gagal mengupload file : " . $fileError1;
		}
// untuk menambahkan akta siswa ke dalam tabel dan folder
		if ($fileSize2 > 0 || $fileError2 == 0){
			if (in_array($file_ext2, $allowed_file_types)){	
				// Rename file
				$new_fileName2 = $id_daftar . "_" . $nama . $file_ext2;
				unlink('img/akta_siswa/' . $new_fileName2);
				$move = move_uploaded_file($_FILES['up_akta']['tmp_name'], 'img/akta_siswa/' . $new_fileName2);
				if ($move) {
					$update = "UPDATE tbl_siswa SET akte = '$new_fileName2' WHERE id_daftar = '$id_daftar'";
					$update_query = mysqli_query($koneksi, $update);
					set_flash_message('sukses', 'File berhasil diupload.');
					echo "File berhasil diupload";
				} else {
					set_flash_message('gagal', 'Gagal mengupload file.');
					echo "Gagal mengupload file";
				}
			}elseif (empty($file_basename)){	
				// file selection error
				set_flash_message('gagal', 'Please select a file to upload.');
				echo "Please select a file to upload.";
			} 
		}  else {
			echo "Gagal mengupload file : " . $fileError2;
		}		
// untuk menambahkan kk siswa ke dalam tabel dan folder
		if ($fileSize3 > 0 || $fileError3 == 0){
			if (in_array($file_ext3, $allowed_file_types)){	
				// Rename file
				$new_fileName3 = $id_daftar . "_" . $nama . $file_ext3;
				unlink('img/kk_siswa/' . $new_fileName3);
				$move = move_uploaded_file($_FILES['up_kk']['tmp_name'], 'img/kk_siswa/' . $new_fileName3);
				if ($move) {
					$update = "UPDATE tbl_siswa SET kk = '$new_fileName3' WHERE id_daftar = '$id_daftar'";
					$update_query = mysqli_query($koneksi, $update);
					set_flash_message('sukses', 'File berhasil diupload.');
					echo "File berhasil diupload";
				} else {
					set_flash_message('gagal', 'Gagal mengupload file.');
					echo "Gagal mengupload file";
				}
			}elseif (empty($file_basename)){	
				// file selection error
				set_flash_message('gagal', 'Please select a file to upload.');
				echo "Please select a file to upload.";
			} 
		}  else {
			echo "Gagal mengupload file : " . $fileError3;
		}	
// untuk menambahkan other siswa ke dalam tabel dan folder
		if ($fileSize4 > 0 || $fileError4 == 0){
			if (in_array($file_ext4, $allowed_file_types)){	
				// Rename file
				$new_fileName4 = $id_daftar . "_" . $nama . $file_ext4;
				unlink('img/other_siswa/' . $new_fileName4);
				$move = move_uploaded_file($_FILES['up_other']['tmp_name'], 'img/other_siswa/' . $new_fileName4);
				if ($move) {
					$update = "UPDATE tbl_siswa SET other = '$new_fileName4' WHERE id_daftar = '$id_daftar'";
					$update_query = mysqli_query($koneksi, $update);
					set_flash_message('sukses', 'File berhasil diupload.');
					echo "File berhasil diupload";
				} else {
					set_flash_message('gagal', 'Gagal mengupload file.');
					echo "Gagal mengupload file";
				}
			}elseif (empty($file_basename)){	
				// file selection error
				set_flash_message('gagal', 'Please select a file to upload.');
				echo "Please select a file to upload.";
			} 
		}  else {
			echo "Gagal mengupload file : " . $fileError4;
		}	

// sukses edit data	

		set_flash_message('sukses', 'Data berhasil diubah!');
		header('Location: index.php');
	} else die('gagal!' . mysqli_error($koneksi));
} else {
	header('Location: tambah.php');
}
	mysqli_close($koneksi);

?>