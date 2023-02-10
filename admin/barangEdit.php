<?php
	include '../koneksi/koneksi.php';

    $getkd      = $_GET['kd_spt'];
    $editBrg    = "SELECT * FROM barang WHERE kd_spt = '$getkd'";
    $resultBrg  = mysqli_query($conn, $editBrg);
    $dataBrg    = mysqli_fetch_array($resultBrg);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Stok Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="../css/add.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark shadow fixed-top">
        <div class="container-fluid pe-5 ps-5">
            <a class="navbar-brand fw-bold" href="barangView.php">Sepatu Super</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="barangView.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="gudangView.php">Gudang</a>
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
                    <h2>Edit Merk Sepatu</h2>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <div class="col-md-6">
                    <?php
	                if (!isset ($_POST['submit'])){
                    ?>
                    <form enctype="multipart/form-data" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Kode Sepatu</label>
                            <input type="text" class="form-control" name="kd_spt" value="<?php echo $dataBrg[0]; ?>"
                                readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Merk Sepatu</label>
                            <input type="text" class="form-control" name="merk_spt" value="<?php echo $dataBrg[1]; ?>">
                        </div>
                        <div class="col text-center pt-3">
                            <input id="submit" name="submit" type="submit" value="Ubah" class="btn btn-dark">
                            <a href="barangView.php" class="btn btn-dark">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <?php
}else{
	$kodespt		= $_POST["kd_spt"];
	$merkspt		= $_POST["merk_spt"];
	$jenisspt       = $_POST["jenis_spt"];
	$ukurspt        = $_POST["ukur_spt"];
	
	$updateBrg  = "UPDATE barang SET merk_spt='$merkspt', jenis_spt='$jenisspt', ukur_spt='$ukurspt' WHERE kd_spt= '$kodespt'";
    $queryBrg   = mysqli_query($conn, $updateBrg);
	
		if ($queryBrg){
			echo"<script>alert('Data Dosen Berhasil Disimpan!') </script>";
			echo"<script type ='text/javascript'>W=window.location ='barangView.php'</script>";
		}
		else{
			echo"<script>alert('Data Gagal Disimpan !')</script>";
			echo"<script type ='text/javascript'>window.location ='barangView.php'</script>";
		}
}
?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>