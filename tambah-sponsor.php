<?php
include 'config/app.php';

//cek apakah tombol ditekan
if (isset($_POST['tambah'])) {
    if (tambah_sponsor($_POST) > 0 ) {
      echo "<script>
      alert('Data berhasil ditambahkan');
      document.location.href = 'sponsor.php';
      </script>";
    }else {
      echo "<script>
      alert('Data gagal ditambahkan');
      document.location.href = 'sponsor.php';
      </script>";
    }
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftarkan Sponsor</title>
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
                        <a class="nav-link active" aria-current="page" href="sponsor.php">Sponsor</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="jadwal.php">Jadwal</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="sirkuit.php">Sirkuit</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <br>
    <!-- End Navbar -->

<div class="container">
<h1 class="text-center">Daftarkan Sponsor</h1><br>
<form action="" method="post">
    <div class="row mb-3">
        <div class="col-sm-2">
            <label for="id_sponsor" class="form-label">ID Sponsor:</label>
        </div>
        <div class="col">
            <input type="number" class="form-control" id="id_sponsor" name="id_sponsor" placeholder="" aria-label="ID sponsor">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-2">
            <label for="nama_sponsor" class="form-label">Nama Sponsor:</label>
        </div>
        <div class="col">
            <input type="text" class="form-control" id="nama_sponsor" name="nama_sponsor" placeholder="" aria-label="Nama sponsor">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-2">
            <label for="durasi_kontrak" class="form-label">Durasi Kontrak:</label>
        </div>
        <div class="col">
            <input type="number" class="form-control" id="durasi_kontrak" name="durasi_kontrak" placeholder="" aria-label="Durasi Kontrak" min="0" max="99">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-2">
            <label for="biaya_kontrak" class="form-label">Biaya Kontrak:</label>
        </div>
        <div class="col">
            <div class="input-group">
                <span class="input-group-text">$</span>
                <input type="number" class="form-control" id="biaya_kontrak" name="biaya_kontrak" placeholder="" aria-label="Biaya Kontrak" min="0">
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col text-end">
            <button type="submit" name="tambah" class="btn btn-primary">Tambah Sponsor</button>
        </div>
    </div>
</form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>