<php
include "edit.php";
    $id = $_POST['id'];
    $name =$_POST['name'];
    $jeniskelamin =$_POST['jeniskelamin'];
    $Alamat =$_POST['alamat'];

    mysqli_query($koneksi, "UPDATE" mahasiswa SET name='$name',
    JenisKelamin='$jeniskelamin', alamat='$alamat' where id='$id'");
    header(location:menampilkan_data.php");
    ?>