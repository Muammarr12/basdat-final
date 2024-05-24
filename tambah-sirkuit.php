<?php
include 'config/app.php';

//cek apakah tombol ditekan
if (isset($_POST['tambah'])) {
  if (tambah_sirkuit($_POST) > 0 ) {
    echo "<script>
    alert('Data berhasil ditambahkan');
    document.location.href = 'sirkuit.php';
    </script>";
  }else {
    echo "<script>
    alert('Data gagal ditambahkan');
    document.location.href = 'sirkuit.php';
    </script>";
  }
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftarkan Sirkuit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <!-- Navbar -->
    <div>
        <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">Home</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                        <a class="nav-link" href="team.php">Team</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="pembalap.php">Racer</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="Sirkuit.php">Sirkuit</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="jadwal.php">Jadwal</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="sirkuit.php">Sirkuit</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <br>
    <!-- End Navbar -->

    <div class="container">
<h1 class="text-center">Tambah Sirkuit</h1><br>
<form action="" method="post">
    <div class="row mb-3">
        <div class="col-sm-2">
            <label for="id_sirkuit" class="form-label">ID Sirkuit:</label>
        </div>
        <div class="col">
            <input type="number" class="form-control" id="id_sirkuit" name="id_sirkuit" placeholder="" aria-label="ID Sirkuit">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-2">
            <label for="nama_sirkuit" class="form-label">Nama Sirkuit:</label>
        </div>
        <div class="col">
            <input type="text" class="form-control" id="nama_sirkuit" name="nama_sirkuit" placeholder="" aria-label="Nama Sirkuit">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-2">
            <label for="lokasi_sirkuit" class="form-label">Lokasi Sirkuit:</label>
        </div>
        <div class="col">
            <input type="text" class="form-control" id="lokasi_sirkuit" name="lokasi_sirkuit" placeholder="" aria-label="Lokasi Sirkuit">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-2">
            <label for="kapasitas" class="form-label">Kapasitas:</label>
        </div>
        <div class="col">
            <input type="text" class="form-control" id="kapasitas" name="kapasitas" placeholder="" aria-label="Kapasitas">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-2">
            <label for="jarak_sirkuit" class="form-label">Jarak Sirkuit:</label>
        </div>
        <div class="col">
            <div class="input-group">
                <span class="input-group-text">Km</span>
                <input type="number" class="form-control" id="jarak_sirkuit" name="jarak_sirkuit" placeholder="" aria-label="Jarak Sirkuit" step="0.001" min="0">
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col text-end">
            <button type="submit" name="tambah" class="btn btn-primary">Tambah Sirkuit</button>
        </div>
    </div>
</form>
</div>
