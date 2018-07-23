<?php

include("../assets/php/koneksi.php");
include("../assets/php/session.php");

if (isset($_POST['update'])) {
  $nama_barang = $_POST['nama_barang'];
  $banyak_barang = $_POST['banyak_barang'];

  $sqlstok = "SELECT banyak_barang FROM stok WHERE nama_barang='$nama_barang'";
  $querystok = mysqli_query($koneksi,$sqlstok);
  $data = mysqli_fetch_array($querystok);
  $banyak_stok_barang = $data['banyak_barang'];

  $tambahkan_barang = $banyak_stok_barang + $banyak_barang;

  $sql = "UPDATE stok SET nama_barang='$nama_barang', banyak_barang='$tambahkan_barang' WHERE nama_barang='$nama_barang'";
  $query = mysqli_query($koneksi, $sql);

  if ($query) {
    header('location:stok.php');
  } else {
    header('location:stok.php');
  }
}

 ?>
