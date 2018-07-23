<?php
// mengaktifkan session
session_start();

// menghubungkan dengan koneksi
include 'assets/php/koneksi.php';

// menangkap data yang di kirim dari form
$username = $_POST['username'];
$password = $_POST['password'];

// menyeleksi data
$data = mysqli_query($koneksi, "SELECT * FROM user WHERE user_username='$username' AND user_password='$password'");

//menghitung jumlah data yg ditemukan
$cek = mysqli_num_rows($data);

if ($cek > 0) {
  $_SESSION['username'] = $username;
  $_SESSION['status'] = "login";
  header("location:system/index.php");
} else {
  header("location:index.php?pesan=gagal");
}
 ?>
