<?php
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


//menambahkan data team
function tambah_team($post){
  global $conn;

  $id_team = $post['id_team'];
  $nama_team = $post['nama_team'];
  $nama_manager = $post['nama_manager'];

  //tambah data
  $query_team = "INSERT INTO team VALUES($id_team, '$nama_team', '$nama_manager')";
  
  mysqli_query($conn, $query_team);

  return mysqli_affected_rows($conn);
}


//menambahkan data pembalap
function tambah_pembalap($post){
  global $conn;

  $id_pembalap = $post['id_pembalap'];
  $nama_pembalap = $post['nama_pembalap'];
  $id_team = $post['id_team'];
  $nama_team = $post['nama_team'];

  // Memeriksa apakah id_team yang dimasukkan adalah nilai yang valid
  $query_check_team = "SELECT id_team FROM team WHERE id_team = '$id_team'";
  $result = mysqli_query($conn, $query_check_team);
  if(mysqli_num_rows($result) != 1) {
      // id_team tidak valid
      return 0; // Mengembalikan 0 untuk menunjukkan kegagalan
  }

  //tambah data
  $query_pembalap = "INSERT INTO pembalap VALUES('$id_pembalap', '$nama_pembalap', '$id_team', '$nama_team')";
  
  mysqli_query($conn, $query_pembalap);

  return mysqli_affected_rows($conn);
}


//menambahkan data sirkuit
function tambah_sirkuit($post){
  global $conn;

  $id_sirkuit = $post['id_sirkuit'];
  $nama_sirkuit = $post['nama_sirkuit'];
  $lokasi_sirkuit = $post['lokasi_sirkuit'];
  $kapasitas = $post['kapasitas'];
  $jarak_sirkuit = $post['jarak_sirkuit'];

  //tambah data
  $query_sirkuit = "INSERT INTO sirkuit VALUES('$id_sirkuit', '$nama_sirkuit', '$lokasi_sirkuit', '$kapasitas', '$jarak_sirkuit')";
  
  mysqli_query($conn, $query_sirkuit);

  return mysqli_affected_rows($conn);
}


// Menambahkan data Jadwal
function tambah_jadwal($post){
  global $conn;

  $id_sirkuit = $post['id_sirkuit'];
  $nama_sirkuit = $post['nama_sirkuit'];
  $lokasi_sirkuit = $post['lokasi_sirkuit'];
  $tanggal_balapan = $post['tanggal_balapan'];

  // Memeriksa apakah id_team yang dimasukkan adalah nilai yang valid
  $query_check_sirkuit = "SELECT id_sirkuit FROM sirkuit WHERE id_sirkuit = '$id_sirkuit'";
  $result = mysqli_query($conn, $query_check_sirkuit);
  if(mysqli_num_rows($result) != 1) {
      // id_team tidak valid
      return 0; // Mengembalikan 0 untuk menunjukkan kegagalan
  }
  //tambah data
  $query_jadwal = "INSERT INTO jadwal VALUES('$id_sirkuit', '$nama_sirkuit', '$lokasi_sirkuit', '$tanggal_balapan')";
  mysqli_query($conn, $query_jadwal);

  return mysqli_affected_rows($conn);
}

// Menambahkan data Sponsor
function tambah_sponsor($post){
  global $conn;

  $id_sponsor = $post['id_sponsor'];
  $nama_sponsor = $post['nama_sponsor'];
  $durasi_kontrak = $post['durasi_kontrak'];
  $biaya_kontrak = $post['biaya_kontrak'];
  $jumlah_kontrak = $durasi_kontrak * $biaya_kontrak; // Menghitung jumlah kontrak
  
  //tambah data
  $query_sponsor = "INSERT INTO sponsor (id_sponsor, nama_sponsor, durasi_kontrak, biaya_kontrak, jumlah_kontrak) VALUES ('$id_sponsor', '$nama_sponsor', '$durasi_kontrak', '$biaya_kontrak', '$jumlah_kontrak')";
  
  mysqli_query($conn, $query_sponsor);

  return mysqli_affected_rows($conn);
}