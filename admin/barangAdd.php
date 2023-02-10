<?php
	include '../koneksi/koneksi.php';
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Stok Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="../css/add.css" rel="stylesheet">
    <link href="../java/validasi.js" rel="javascript">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark shadow fixed-top">
        <div class="container-fluid pe-5 ps-5">
            <a class="navbar-brand fw-bold" href="#home">Sepatu Supers</a>
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
                    <h2>Tambah Merk Sepatu</h2>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <div class="col-md-6">
                    <?php
	                if (!isset ($_POST['submit'])){
                    ?>
                    <form enctype="multipart/form-data" method="POST" class="needs-validation" novalidate>
                        <div class="mb-3">
                            <label class="form-label">Kode Sepatu</label>
                            <input type="text" class="form-control" name="kd_spt" required>
                            <div class="invalid-feedback">
                                Masukkan Kode Sepatu!!
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Merk Sepatu</label>
                            <input type="text" class="form-control" name="merk_spt" required>
                            <div class="invalid-feedback">
                                Masukkan Merk Sepatu!!
                            </div>
                        </div>
                        <div class="col text-center pt-3">
                            <input id="submit" name="submit" type="submit" value="Tambah" class="btn btn-dark">
                            <a href="barangView.php" class="btn btn-dark">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <?php
}else{
	$kodeSpt		= $_POST["kd_spt"];
	$merkSpt		= $_POST["merk_spt"];
	
	$insertSpt="INSERT INTO barang(kd_spt,merk_spt) VALUES ('$kodeSpt','$merkSpt')";
	$querySpt = mysqli_query($conn,$insertSpt);
	
		if ($querySpt){
			echo"<script>alert('Data Dosen Berhasil Disimpan!') </script>";
			echo"<script type ='text/javascript'>W=window.location ='barangView.php'</script>";
		}
		else{
			echo"<script>alert('Data Gagal Disimpan !')</script>";
			echo"<script type ='text/javascript'>window.location ='barangView.php'</script>";
		}
}
?>

    <script>
    (() => {
        'use strict'

        const forms = document.querySelectorAll('.needs-validation')

        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
    })()
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>