<?php

include("../assets/php/koneksi.php");
include("../assets/php/session.php");

if (isset($_POST['buat'])) {
  $nama_barang = $_POST['nama_barang'];
  $banyak_barang = $_POST['banyak_barang'];

  $sql = "INSERT INTO stok (id_barang, nama_barang, banyak_barang) VALUE (NULL, '$nama_barang', '$banyak_barang')";
  $query = mysqli_query($koneksi, $sql);
  header('location: stok.php');
}
?>
