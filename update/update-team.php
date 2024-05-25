<?php
include '../config/config.php';

// Fungsi untuk mendapatkan detail tim berdasarkan ID
function getTeamById($id_team) {
    global $conn;
    $sql = "SELECT * FROM team WHERE id_team = $id_team";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return null;
    }
}

// Fungsi untuk mengupdate data tim
function updateTeam($id_team, $nama_team, $nama_manager) {
    global $conn;
    $sql = "UPDATE team SET nama_team = '$nama_team', nama_manager = '$nama_manager' WHERE id_team = $id_team";
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

// Proses update data jika formulir dikirimkan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_team = $_POST['id_team'];
    $nama_team = $_POST['nama_team'];
    $nama_manager = $_POST['nama_manager'];

    if (updateTeam($id_team, $nama_team, $nama_manager)) {
        echo "<script>alert('Data tim berhasil diupdate');</script>";
        // Redirect ke halaman tabel tim setelah update berhasil
        echo "<script>window.location.href = '../team.php';</script>";
        exit;
    } else {
        echo "<script>alert('Gagal mengupdate data tim');</script>";
    }
}

// Ambil ID tim dari parameter URL
$id_team = $_GET['id'];

// Ambil data tim berdasarkan ID
$team = getTeamById($id_team);

// Jika data tim tidak ditemukan, tampilkan pesan kesalahan
if (!$team) {
    echo "<h2>Data tim tidak ditemukan</h2>";
    exit;
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
                        <a class="nav-link active" aria-current="page" href="../team.php">Team</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="../pembalap.php">Racer</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="../sponsor.php">Sponsor</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="../jadwal.php">Jadwal</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="../sirkuit.php">Sirkuit</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <br>
    <!-- End Navbar -->
    <div class="container">
        <h1 class="text-center">Update Team</h1><br>
        <form action="" method="post">
            <input type="hidden" name="id_team" value="<?php echo $team['id_team']; ?>">
            <div class="row mb-3">
                <div class="col-sm-2">
                    <label for="id_team" class="form-label">ID Team:</label>
                </div>
                <div class="col">
                    <!-- Tampilkan ID Team dalam mode disabled -->
                    <input type="text" class="form-control" id="id_team" name="id_team" value="<?php echo $team['id_team']; ?>" disabled>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-2">
                    <label for="nama_team" class="form-label">Nama Team:</label>
                </div>
                <div class="col">
                    <input type="text" class="form-control" id="nama_team" name="nama_team" value="<?php echo $team['nama_team']; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-2">
                    <label for="nama_manager" class="form-label">Nama Manager:</label>
                </div>
                <div class="col">
                    <input type="text" class="form-control" id="nama_manager" name="nama_manager" value="<?php echo $team['nama_manager']; ?>">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col text-end">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>