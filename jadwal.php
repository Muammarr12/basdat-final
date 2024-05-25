<?php
include 'config/config.php';

//function untuk menampilkan data
function select($query) {
  global $conn;

  $result = mysqli_query($conn, $query);
  $rows = [];
  
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;    
  }
  return $rows;
}

$data_jadwal = select('SELECT * FROM jadwal');

function deleteJadwal($id_sirkuit) {
  global $conn;
  // Buat query untuk menghapus jadwal
  $sql = "DELETE FROM jadwal WHERE id_sirkuit = $id_sirkuit";

  if ($conn->query($sql) === TRUE) {
      echo "<script>
      alert('Data jadwal berhasil dihapus');
      document.location.href = 'jadwal.php';
      </script>";
  } else {
      echo "<script>
      alert('Error: " . $sql . "<br>" . $conn->error . "');
      document.location.href = 'jadwal.php';
      </script>";
  }
}

// Panggil fungsi deleteJadwal saat tombol hapus diklik
if (isset($_POST['delete_jadwal'])) {
  $id_sirkuit_to_delete = $_POST['delete_jadwal'];
  deleteJadwal($id_sirkuit_to_delete);
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jadwal</title>
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
                        <a class="nav-link" href="sponsor.php">Sponsor</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="jadwal.php">Jadwal</a>
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
    <h1 class="text-center">Jadwal</h1> <br>
<!-- Table -->
<table class="table table-hover">
      <!-- Head Table -->
      <thead class="table-light">
      <tr>
        <th scope="col">ID Sirkuit</th>
        <th scope="col">Nama Sirkuit</th>
        <th scope="col">Lokasi Sirkuit</th>
        <th scope="col">Tanggal Balapan</th>
        <th scope="col">Edit</th>
      </tr>
      </thead>
      <tbody>
      <?php foreach ($data_jadwal as $jadwal) : ?>
      <tr>
        <th><?php echo $jadwal['id_sirkuit']; ?></th>
        <td><?php echo $jadwal['nama_sirkuit']; ?></td>
        <td><?php echo $jadwal['lokasi_sirkuit']; ?></td>
        <td><?php echo $jadwal['tanggal_balapan']; ?></td>
        <!-- Button -->
        <td>
        <a href=""><button type="button" class="btn btn-success btn-sm my-1">Update</button></a>
         <!-- Form untuk mengirimkan ID sirkuit yang akan dihapus -->
         <form method="post">
             <input type="hidden" name="delete_jadwal" value="<?php echo $jadwal['id_sirkuit']; ?>">
             <button type="submit" class="btn btn-danger btn-sm my-1">Delete</button>
          </form>
        </td>
        <?php endforeach; ?>
      </tbody>
</table>
<a href="tambah-jadwal.php" class="btn btn-primary">Daftarkan Jadwal</a>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>