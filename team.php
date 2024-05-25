<?php
include 'config/app.php';

//menampilkan data
$data_team = select('SELECT * FROM team');

//Menghapus data
function deleteTeam($id_team) {
  global $conn;
  // Buat query untuk menghapus tim
  $sql = "DELETE FROM team WHERE id_team = $id_team";

  if ($conn->query($sql) === TRUE) {
      echo "<script>
      alert('Data tim berhasil dihapus');
      document.location.href = 'team.php';
      </script>";
  } else {
      echo "<script>
      alert('Error: " . $sql . "<br>" . $conn->error . "');
      document.location.href = 'team.php';
      </script>";
  }
}

// Panggil fungsi deleteTeam saat tombol hapus diklik
if (isset($_POST['delete_team'])) {
  $id_team_to_delete = $_POST['delete_team'];
  deleteTeam($id_team_to_delete);
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
    <h1 class="text-center">Team</h1>
    <br>

    <!-- Table -->
    <table class="table table-hover">
    <!-- Head Table -->
    <thead class="table-light">
    <tr>
      <th scope="col">ID Team</th>
      <th scope="col">Nama Team</th>
      <th scope="col">Nama Manager</th>
      <th scope="col">Edit</th>
    </tr>
    </thead>
    <!-- Isi Table -->
  <tbody>
    <?php foreach ($data_team as $team) : ?>
    <tr>
      <th><?php echo $team['id_team']; ?></th>
      <td><?php echo $team['nama_team']; ?></td>
      <td><?php echo $team['nama_manager']; ?></td>
      
      <!-- Button -->
      <td>
      <!-- Tombol untuk mengarahkan ke halaman update_team.php -->
      <a href="update/update-team.php?id=<?php echo $team['id_team']; ?>"><button type="button" class="btn btn-success btn-sm my-1">Update</button></a>
      <!-- Form untuk mengirimkan ID tim yang akan dihapus -->
      <form method="post">
              <input type="hidden" name="delete_team" value="<?php echo $team['id_team']; ?>">
              <button type="submit" class="btn btn-danger btn-sm my-1">Delete</button>
          </form>
      </td>
      <?php endforeach; ?>
  </tbody>
</table>
<a href="tambah-team.php" class="btn btn-primary">Tambah Team</a>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>