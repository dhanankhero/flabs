<!DOCTYPE html>
<html lang="id" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Flabs System - Database</title>
    <link rel="stylesheet" href="../assets/css/master.css">
    <script type="text/javascript" src="../assets/js/Chart.bundle.js"></script>
    <script type="text/javascript" src="../assets/js/utils.js"></script>
  </head>
  <body>
    <!-- Include Library -->
    <?php include("../assets/php/koneksi.php"); ?>
    <?php include("../assets/php/session.php"); ?>
    <?php include("bagian/navbar.php"); ?>
    <!-- end Include Library -->
    <!-- Navigasi bar -->
    <div id="navlist">
      <ul>
        <a href="index.php"><li>Dashboard</li></a>
        <a href="pembayaran.php"><li>Pembayaran</li></a>
        <a href="database.php"><li class="selected">Penjualan</li></a>
        <a href="item.php"><li>Item</li></a>
        <a href="stok.php"><li>Stok</li></a>
        <li>Pengaturan</li>
      </ul>
    </div>
  </div>
  <!-- end Navigasi bar -->
  <!-- Bagian halaman utama -->
    <div class="container">
      <!-- Navigasi halaman -->
      <div class="navsite">
        Riwayat Penjualan
      </div>
      <!-- end Navigasi halaman -->
      <div id="container-content">
        <div class="title-cek">
          Stok Paling Sedikit
        </div>
        <div class="min-stok-container">
          <a href="stok.php">
            <div class="go-stok">
              Cek Stok Sekarang
            </div>
          </a>
          <?php
          $sql = "SELECT * FROM stok ORDER BY banyak_barang ASC";
          $query = mysqli_query($koneksi, $sql);

          while ($data = mysqli_fetch_array($query)) {
            echo "<div class='min-stok'>";
            echo $data['nama_barang'];
            echo " : ";
            echo $data['banyak_barang']." Unit";
            echo "</div>";
          }
           ?>
           <div class="clear"></div>
        </div>
        <!-- Kartu Utama 1 -->
        <div class="card-fluid">
          <div class="title-card">
            <div class="title-kiri">Riwayat Semua Penjualan</div>
            <div class="title-kanan">/</div>
            <div class="clear"></div>
            <div class="space-2"></div>
          </div>
          <table class="table-data">
            <thead>
              <th>No.</th>
              <th>ID</th>
              <th>Nama</th>
              <th>Harga</th>
              <th>Kuantitas</th>
              <th>Total</th>
              <th>Laba</th>
              <th style='text-align:right'>Delete</th>
            </thead>
            <tbody>

              <?php
              $sql = "SELECT * FROM orderan ORDER BY id_barang DESC";
              $query = mysqli_query($koneksi,$sql);
              $no = 1;

              while($data = mysqli_fetch_array($query)){
                echo "<tr>";
                echo "<td>".$no."</td>";
                echo "<td>".$data['id_barang']."</td>";
                echo "<td>".$data['data_name']."</td>";
                echo "<td>Rp. ".$data['data_harga'].",00</td>";
                echo "<td>".$data['data_kuantitas']." Unit</td>";
                echo "<td>Rp. ".$data['data_harga']*$data['data_kuantitas'].",00</td>";
                echo "<td>Rp. ".$data['data_laba'].",00</td>";
                echo "<td style='text-align:right'><a href='delete_data_act.php?id_barang=".$data['id_barang']."'><img src='../assets/img/error.png' width='25px'></a></td>";
                echo "</tr>";
                $no++;
              }
               ?>
            </tbody>
          </table>
        </div>
        <!-- end Kartu Utama 1 -->
      </div>
    </div>
  </body>
</html>
