<?php
	include ('C:\xampp\htdocs\stokBarang\koneksi\koneksi.php');
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Stok Toko</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="../css/add.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark shadow fixed-top">
        <div class="container-fluid pe-5 ps-5">
            <a class="navbar-brand fw-bold" href="tokoView.php">Toko Sepatu Super</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="tokoView.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="barangView.php">Barang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="gudangView.php">Gudang</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <section id="form" class="form">
        <div class="container position-absolute top-50 start-50 translate-middle">
            <div class="row text-center mb-4">
                <div class="col">
                    <h2>Tambah Sepatu Di Toko</h2>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <div class="col-md-6">
                    <?php
	                if (!isset ($_POST['submit'])){
                    ?>
                    <form enctype="multipart/form-data" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Kode Produk</label>
                            <input type="text" name="kd_produk" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal</label>
                            <input type="date" name="tanggal" min="2022-12-30" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Merk Sepatu</label>
                            <select name="merk" class="form-select" required>
                                <option value="">-= PILIH =-</option>
                                <?php	
									$queryBrg = "SELECT kd_spt, merk_spt FROM barang";
									$resultBrg = mysqli_query($conn,$queryBrg);
									while($dataBrg = mysqli_fetch_array($resultBrg)){
									    echo"<option value='$dataBrg[0]'>$dataBrg[1]</option>";
									}
								?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jenis Sepatu</label>
                            <input type="text" name="jenis_spt" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Ukuran Sepatu</label>
                            <input type="number" min="0" max="50" name="ukuran" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jumlah</label>
                            <input type="number" name="jumlah" class="form-control" required>
                        </div>
                        <div class="col text-center pt-3">
                            <input id="submit" name="submit" type="submit" value="Tambah" class="btn btn-dark">
                            <a href="tokoView.php" class="btn btn-dark">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <?php
}else{
	$kdproduk    = $_POST["kd_produk"];
	$tanggal    = $_POST["tanggal"];
	$jenis      = $_POST['jenis_spt'];
	$ukuran		= $_POST["ukuran"];
	$jumlah     = $_POST["jumlah"];
    $merk       = $_POST["merk"];
	
	$insertToko = "INSERT INTO toko (kd_produk,tanggal, jenis_spt, ukur_spt, jumlah, kd_spt) VALUES('$kdproduk','$tanggal','$jenis','$ukuran','$jumlah', '$merk')";
	$queryToko = mysqli_query($conn,$insertToko);
	
		if ($queryToko){
			echo"<script>alert('Data Toko Berhasil Disimpan!') </script>";
			echo"<script type ='text/javascript'>W=window.location ='tokoView.php'</script>";
		}
		else{
			echo"<script>alert('Data Gagal Disimpan !')</script>";
			echo"<script type ='text/javascript'>window.location ='tokoView.php'</script>";
		}
}
?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>