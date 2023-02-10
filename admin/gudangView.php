<?php
include "../koneksi/koneksi.php";
if(isset($_GET['cari']))
{
    $getCari = $_GET["cari"];
    $queryGudang    ="SELECT kd_produk,tanggal,barang.merk_spt,jenis_spt,ukur_spt,jumlah,barang.kd_spt 
                     FROM barang 
                     JOIN gudang ON barang.kd_spt = gudang.kd_spt
                     WHERE kd_produk LIKE '%$getCari%'";
}
else
{
    $queryGudang    ="SELECT kd_produk,tanggal,barang.merk_spt,jenis_spt,ukur_spt,jumlah,barang.kd_spt 
                      FROM barang 
                      JOIN gudang ON barang.kd_spt = gudang.kd_spt";
}

    $resultGudang   =mysqli_query($conn,$queryGudang);
    $countGudang    =mysqli_num_rows($resultGudang);
?>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gudang Sepatu Super</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="../css/styleGudang.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>

<body id="home">
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
                        <a class="nav-link active" aria-current="page" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#stok">Data Barang</a>
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

    <section class="jumbotron text-center">
        <h1 class="display-2 fw-bold mt-5">Stok Barang</h1>
        <h2 class="display-3 fw-bold text-white">Gudang Sepatu Super</h2>
        <p class="lead">Tempat Supplai Sepatu Paling Terpercaya</p>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#ffffff" fill-opacity="1"
                d="M0,224L30,213.3C60,203,120,181,180,181.3C240,181,300,203,360,224C420,245,480,267,540,234.7C600,203,660,117,720,112C780,107,840,181,900,218.7C960,256,1020,256,1080,245.3C1140,235,1200,213,1260,224C1320,235,1380,277,1410,298.7L1440,320L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z">
            </path>
        </svg>
    </section>

    <section id="stok">
        <div class="container">
            <div class="row text-center mb-3">
                <div class="col">
                    <h2>Data Sepatu Di Gudang</h2>
                </div>
            </div>
            <form action="gudangView.php#stok">
                <div class="row mb-4 mt-4">
                    <div class="col-md-3">
                        <input type="text" name="cari" class="form-control form-control-sm" placeholder="Cari...">
                    </div>
                    <div class="col-md-9">
                        <input type="submit" name="btncari" class="btn btn-dark btn-sm">
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col">
                    <table class="table">
                        <tr class="text-center">
                            <th>No</th>
                            <th>KODE PRODUK</th>
                            <th>TANGGAL</th>
                            <th>MERK SEPATU</th>
                            <th>JENIS SEPATU</th>
                            <th>UKURAN SEPATU</th>
                            <th>JUMLAH </th>
                            <th>AKSI</th>
                        </tr>
                        <?php
                            $i = 1;
	                        if ($countGudang > 0){
		                        while($dataGudang=mysqli_fetch_array($resultGudang)){
	                    ?>
                        <tr class="text-center">
                            <td class="value"><?php echo $i++; ?></td>
                            <td class="value"><?php echo "$dataGudang[0]"; ?></td>
                            <td class="value"><?php echo "$dataGudang[1]"; ?></td>
                            <td class="value"><?php echo "$dataGudang[2]"; ?></td>
                            <td class="value"><?php echo "$dataGudang[3]"; ?></td>
                            <td class="value"><?php echo "$dataGudang[4]"; ?></td>
                            <td class="value"><?php echo "$dataGudang[5]"; ?></td>
                            <td class="value">
                                <a class="text-dark text-decoration-none"
                                    href="gudangEdit.php?kd_produk=<?php echo"$dataGudang[0]"; ?>&kd_spt=<?php echo"$dataGudang[6]"; ?>">Edit</a>
                                |
                                <a class="text-dark text-decoration-none"
                                    href="gudangDelete.php?kd_produk=<?php echo"$dataGudang[0]"; ?>&kd_spt=<?php echo"$dataGudang[6]"; ?>">Hapus</a>
                            </td>
                        </tr>

                        <?php
		                        }
	                        }else{
		                        echo"<tr>
				                    <td colspan='9' align='center' height='20'>
				                    <div>BELUM ADA DATA GUDANG GES</div></td>
			                        </tr>";
	                        }
                            echo"</table>";
                        ?>
                </div>
            </div>
            <div class="row text-center justify-content-center">
                <div class="col-md-4">
                    <a href="gudangAdd.php"><input name="add" type="submit" class="btn btn-dark mt-4"
                            value="Tambah Data Gudang" /></a>
                </div>
            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#212529" fill-opacity="1"
                d="M0,256L30,229.3C60,203,120,149,180,160C240,171,300,245,360,272C420,299,480,277,540,256C600,235,660,213,720,213.3C780,213,840,235,900,245.3C960,256,1020,256,1080,245.3C1140,235,1200,213,1260,218.7C1320,224,1380,256,1410,272L1440,288L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z">
            </path>
        </svg>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>