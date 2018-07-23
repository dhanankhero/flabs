<?php
// alur koneksi
$koneksi = mysqli_connect("localhost", "root", "", "flabs");
// cek koneksi
if (mysqli_connect_errno()) {
  echo "Kami tidak dapat mengkoneksikan ke database : " . mysqli_connect_errno();
}
 ?>
