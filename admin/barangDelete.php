<?php
include ('../koneksi/koneksi.php');

$getkdBrg   = $_GET["kd_spt"];
$delBrg	    = "DELETE FROM barang WHERE kd_spt='$getkdBrg'";
$resultBrg	= mysqli_query($conn,$delBrg);

if ($resultBrg)
{
	echo"<script>alert('Data Barang Berhasil Dihapus') </script>";
	echo"<script type ='text/javascript'>window.location ='barangView.php'</script>";
}
else
{
	echo"<script>alert('Data Gagal Dihapus') </script>";
	echo"<script type ='text/javascript'>window.location ='barangView.php'</script>";
}
?>