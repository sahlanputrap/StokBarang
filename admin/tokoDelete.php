<?php
include ('C:/xampp/htdocs/stokBarang/koneksi/koneksi.php');

$kdproduk   = $_GET["kd_produk"];
$kode_spt   = $_GET["kd_spt"];
$delToko	= "DELETE FROM toko WHERE kd_produk='$kdproduk' AND kd_spt='$kode_spt'";
$resultToko	= mysqli_query($conn,$delToko);

if ($resultToko)
{
	echo"<script>alert('Data Toko Berhasil Dihapus') </script>";
	echo"<script type ='text/javascript'>window.location ='tokoView.php'</script>";
}
else
{
	echo"<script>alert('Data Gagal Dihapus') </script>";
	echo"<script type ='text/javascript'>window.location ='tokoView.php'</script>";
}
?>