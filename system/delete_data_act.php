<?php

include("../assets/php/koneksi.php");
include("../assets/php/session.php");

  if (isset($_GET['id_barang'])) {

    $id = $_GET['id_barang'];

    $sql = "DELETE FROM orderan WHERE id_barang = $id";
    $query = mysqli_query($koneksi, $sql);
    
    if ($query) {
      header('location: database.php');
    } else {
      echo "gagal hapus";
    }
  } else {
    echo "akses dilarang";
  }

 ?>
