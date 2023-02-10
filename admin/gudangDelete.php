<?php
include ('../koneksi/koneksi.php');

$kd_spt    		= $_GET["kd_spt"];
$getkd			= $_GET["kd_produk"];
$delGudang	    = "DELETE FROM gudang WHERE kd_produk='$getkd' AND kd_spt='$kd_spt'";
$resultGudang	= mysqli_query($conn,$delGudang);

if ($resultGudang)
{
	echo"<script>alert('Data Gudang Berhasil Dihapus') </script>";
	echo"<script type ='text/javascript'>window.location ='gudangView.php'</script>";
}
else
{
	echo"<script>alert('Data Gagal Dihapus') </script>";
	echo"<script type ='text/javascript'>window.location ='gudangView.php'</script>";
}
?>