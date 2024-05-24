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

//menambahkan data
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