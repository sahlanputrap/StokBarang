<?php
$host		="localhost";
$username	="root";
$password	="";
$nama_db	="stokbarang";

//mulai koneksi ke mysql
$conn = mysqli_connect($host,$username,$password,$nama_db) or die ("koneksi mysql gagal!");
?>