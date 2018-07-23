<?php

include("../assets/php/koneksi.php");
include("../assets/php/session.php");



if (isset($_POST['bayar'])) {
  $nama_barang = $_POST['nama_barang'];
  $kuantitas = $_POST['kuantitas'];

  $sqlsecond = "SELECT * FROM barang_dagangan WHERE nama_barang = '$nama_barang'";
  $querysecond = mysqli_query($koneksi,$sqlsecond);
  $data = mysqli_fetch_array($querysecond);
  $harga_barang = $data['harga_barang'];
  $harga_beli = $data['harga_beli'];
  $laba = $harga_barang - $harga_beli;
  $data_laba = $laba * $kuantitas;

  $sqlfourth = "SELECT * FROM stok WHERE nama_barang='$nama_barang'";
  $queryfourth = mysqli_query($koneksi, $sqlfourth);
  $datasecond = mysqli_fetch_array($queryfourth);
  $stok = $datasecond['banyak_barang'];

  $total_harga = $harga_barang * $kuantitas;

  $kurang = $stok - $kuantitas;

  $sql = "INSERT INTO orderan (id_barang, data_name, data_harga, data_kuantitas, data_laba, data_total) VALUE (NULL, '$nama_barang', '$harga_barang', '$kuantitas', '$data_laba', '$total_harga') ";
  $query = mysqli_query($koneksi, $sql);
  if ($query) {
    echo "string";
  } else {
    echo "gagal";
  }
  $sqlthird = "UPDATE stok SET nama_barang='$nama_barang', banyak_barang='$kurang' WHERE nama_barang='$nama_barang'";
  $querythird = mysqli_query($koneksi, $sqlthird);
  header('location: pembayaran.php');
}

 ?>
