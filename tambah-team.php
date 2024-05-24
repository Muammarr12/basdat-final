<?php
include 'config/app.php';

//menampilkan data
$data_team = select('SELECT * FROM team');

//cek apakah tombol ditekan
if (isset($_POST['tambah'])) {
  if (tambah_team($_POST) > 0 ) {
    echo "<script>
    alert('Data berhasil ditambahkan');
    document.location.href = 'team.php';
    </script>";
  }else {
    echo "<script>
    alert('Data gagal ditambahkan');
    document.location.href = 'team.php';
    </script>";
  }
}

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Team</title>
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
                        <a class="nav-link active" aria-current="page" href="team.php">Team</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="pembalap.php">Racer</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="sponsor.php">Sponsor</a>
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
<h1 class="text-center">Daftarkan Tim</h1><br>
<form action="" method="post">
    <div class="row mb-3">
        <div class="col-sm-2">
            <label for="id_team" class="form-label">ID Team:</label>
        </div>
        <div class="col">
            <input type="number" class="form-control" id="id_team" name="id_team" placeholder="" aria-label="ID Team">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-2">
            <label for="nama_team" class="form-label">Nama Team:</label>
        </div>
        <div class="col">
            <input type="text" class="form-control" id="nama_team" name="nama_team" placeholder="" aria-label="Nama Team">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-2">
            <label for="nama_manager" class="form-label">Nama Manager:</label>
        </div>
        <div class="col">
            <input type="text" class="form-control" id="nama_manager" name="nama_manager" placeholder="" aria-label="Nama Manager">
        </div>
    </div>
    <div class="row mt-3">
        <div class="col text-end">
            <button type="submit" name="tambah" class="btn btn-primary">Tambah Tim</button>
        </div>
    </div>
</form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>