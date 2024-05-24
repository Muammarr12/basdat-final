<?php
include 'config/app.php';

//cek apakah tombol ditekan
if (isset($_POST['tambah'])) {
    if (tambah_pembalap($_POST) > 0 ) {
      echo "<script>
      alert('Data berhasil ditambahkan');
      document.location.href = 'pembalap.php';
      </script>";
    }else {
      echo "<script>
      alert('Data gagal ditambahkan');
      document.location.href = 'pembalap.php';
      </script>";
    }
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
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
                        <a class="nav-link active" aria-current="page" href="pembalap.php">Racer</a>
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
<h1 class="text-center">Tambah Racer</h1><br>
<form action="" method="post">
    <div class="row mb-3">
        <div class="col-sm-2">
            <label for="id_pembalap" class="form-label">ID Racer:</label>
        </div>
        <div class="col">
            <input type="number" class="form-control" id="id_pembalap" name="id_pembalap" placeholder="" aria-label="ID Racer">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-2">
            <label for="nama_pembalap" class="form-label">Nama Racer:</label>
        </div>
        <div class="col">
            <input type="text" class="form-control" id="nama_pembalap" name="nama_pembalap" placeholder="" aria-label="Nama Racer">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-2">
            <label for="id_team" class="form-label">ID Team:</label>
        </div>
    <div class="col">
        <select class="form-select" id="id_team" name="id_team" aria-label="ID Team">
                <?php
                // Ambil data team dari database
                $teams = select("SELECT id_team, nama_team FROM team");

                // Tampilkan sebagai opsi pilihan
                foreach ($teams as $team) {
                    echo "<option value=\"" . $team['id_team'] . "\">" . $team['id_team'] . " - " . $team['nama_team'] . "</option>";
                }
                ?>
            </select>
        </div>
    <!--<div class="row mb-3">
        <div class="col-sm-2">
            <label for="id_team" class="form-label">ID Team:</label>
        </div>
        <div class="col">
            <input type="number" class="form-control" id="id_team" name="id_team" placeholder="" aria-label="ID Team">
        </div>
    </div>-->
    <div class="row mt-3">
        <div class="col-sm-2">
            <label for="nama_team" class="form-label">Nama Team:</label>
        </div>
        <div class="col">
            <input type="text" class="form-control" id="nama_team" name="nama_team" placeholder="" aria-label="Nama Team">
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