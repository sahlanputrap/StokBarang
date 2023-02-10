<?php
	include ('../koneksi/koneksi.php');
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Stok Gudang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="../css/add.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark shadow fixed-top">
        <div class="container-fluid pe-5 ps-5">
            <a class="navbar-brand fw-bold" href="barangView.php">Gudang Sepatu Super</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="gudangView.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="barangView.php">Barang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tokoView.php">Toko</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section id="form" class="form">
        <div class="container position-absolute top-50 start-50 translate-middle">
            <div class="row text-center mb-4">
                <div class="col">
                    <h2>Tambah Sepatu Di Gudang</h2>
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
                            <input type="text" class="form-control" name="kd_produk" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal</label>
                            <input type="date" class="form-control" name="tanggal" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Merk Sepatu</label>
                            <select class="form-select" name="merk" required>
                                <option value="">--= PILIH =--</option>
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
                            <input type="text" class="form-control" name="jenis" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Ukuran Sepatu</label>
                            <input type="number" min="0" max="50" class="form-control" name="ukuran" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jumlah</label>
                            <input type="number" class="form-control" name="jumlah" required>
                        </div>
                        <div class="col text-center pt-3">
                            <input id="submit" name="submit" type="submit" value="Tambah" class="btn btn-dark">
                            <a href="gudangView.php" class="btn btn-dark">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <?php
}else{
	$kdproduk   = $_POST["kd_produk"];
	$tanggal    = $_POST["tanggal"];
	$jenis      = $_POST['jenis'];
	$ukuran		= $_POST["ukuran"];
	$jumlah     = $_POST["jumlah"];
    $merk       = $_POST["merk"];
	
	$insertGudang="INSERT INTO gudang (kd_produk,tanggal, jenis_spt, ukur_spt, jumlah, kd_spt) VALUES('$kdproduk','$tanggal','$jenis','$ukuran','$jumlah', '$merk')";
	$queryGudang=mysqli_query($conn,$insertGudang);
	
		if ($queryGudang){
			echo"<script>alert('Data Gudang Berhasil Disimpan!') </script>";
			echo"<script type ='text/javascript'>W=window.location ='gudangView.php'</script>";
		}
		else{
			echo"<script>alert('Data Gagal Disimpan !')</script>";
			echo"<script type ='text/javascript'>window.location ='gudangView.php'</script>";
		}
}
?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>