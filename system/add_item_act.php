<?php

include("../assets/php/koneksi.php");
include("../assets/php/session.php");

if (isset($_POST['tambah'])) {
  $nama_barang = $_POST['nama_barang'];
  $harga_barang = $_POST['harga_barang'];
  $harga_beli = $_POST['harga_beli'];

  $sql = "INSERT INTO barang_dagangan (id_barang, nama_barang, harga_beli, harga_barang) VALUE (NULL, '$nama_barang', '$harga_beli', '$harga_barang')";
  $query = mysqli_query($koneksi, $sql);
  header('location:item.php');
}

 ?>
