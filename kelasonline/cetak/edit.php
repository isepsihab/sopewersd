<?php
include "config.php";
$data = mysqli_query($koneksi, "select * from mahasiswa where
id='$id'") or die (mysqli_error));
whlie($d =mysqli_fetch_array($data)){
?>

<a href="menampilkan_data.php"> back to home </a>
<form method="post" action="update.php">
<table>
<tr>
    <Td>nama</td>
    <td>
        <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
        <input type="text" name="name" value="<?php echo $d['name']; ?>">
    </td>
    <tr>
        <td>Jenis Kelamin</td>
       <input type="text" name="jeniskelamin" value="<?php echo $d['jeniskelamin']; ?>"></td>
    </tr> 
    <tr>
        <td>Alamat</td>
        <input type="text" name="alamat" value="<?php echo $d['alamat']; ?>"></td>
    </tr>
    <tr>
        <td></td>
        <td><input type="submit" value="update"></td>
    </tr>
</table>
</form>
<?php
}
?>
</body>
</html>
