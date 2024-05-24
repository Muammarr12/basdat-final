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