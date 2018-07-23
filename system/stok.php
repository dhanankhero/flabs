<!DOCTYPE html>
<html lang="id" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Flabs System - Pembayaran</title>
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
        <a href="database.php"><li>Database</li></a>
        <a href="item.php"><li>Item</li></a>
        <a href="stok.php"><li class="selected">Stok</li></a>
        <li>Pengaturan</li>
      </ul>
    </div>
  </div>
  <!-- end Navigasi bar -->
  <!-- Bagian halaman utama -->
    <div class="container">
      <!-- Navigasi halaman -->
      <div class="navsite">
        Stok
      </div>
      <!-- end Navigasi halaman -->
      <div id="container-content">
        <!-- Widget Kartu 1 -->
        <div class="card-space">
          <div class="card">
            <div class="title-card">
              <div class="title-kiri">Buat Stok Baru</div>
              <div class="title-kanan">/</div>
              <div class="clear"></div>
            </div>
            <div class="space-2"></div>
            <form class="add_data" action="add_stok_baru_act.php" method="post">
              <select class="pilihan_data formfocus" name="nama_barang" autofocus>
                <?php
                $sql = "SELECT * FROM barang_dagangan ORDER BY nama_barang ASC";
                $query = mysqli_query($koneksi,$sql);

                while($data = mysqli_fetch_array($query)){
                  echo "<option value='".$data['nama_barang']."'>".$data['nama_barang']."</option>";
                }
                 ?>
              </select>
              <input class="inputtext formfocus" type="number" min="0" max="999" name="banyak_barang" placeholder="Kuantitas" autofocus>
              <input class="inputsubmit formfocus" type="submit" name="buat" value="Buat">
            </form>
          </div>
        </div>
        <!-- end Widget Kartu 1 -->
        <!-- Widget Kartu 2 -->
        <div class="card-space">
          <div class="card">
            <div class="title-card">
              <div class="title-kiri">Tambahkan Stok</div>
              <div class="title-kanan">/</div>
              <div class="clear"></div>
            </div>
            <div class="space-2"></div>
            <form class="add_data" action="upd_stok_act.php" method="post">
              <select class="pilihan_data formfocus" name="nama_barang" autofocus>
                <?php
                $sql = "SELECT * FROM stok ORDER BY nama_barang ASC";
                $query = mysqli_query($koneksi,$sql);

                while($data = mysqli_fetch_array($query)){
                  echo "<option value='".$data['nama_barang']."'>".$data['nama_barang']."</option>";
                }
                 ?>
              </select>
              <input class="inputtext formfocus" type="number" min="0" max="999" name="banyak_barang" placeholder="Kuantitas" autofocus>
              <input class="inputsubmit formfocus" type="submit" name="update" value="Update">
            </form>
          </div>
        </div>
        <!-- end Widget Kartu 2 -->
        <div class="clear"></div>
        <!-- Kartu Utama 1 -->
        <div class="card-fluid">
          <div class="title-card">
            <div class="title-kiri">Semua Stok</div>
            <div class="title-kanan">/</div>
            <div class="clear"></div>
            <div class="space-2"></div>
          </div>
          <table class="table-data">
            <thead>
              <th>No.</th>
              <th>ID</th>
              <th>Nama</th>
              <th>Jumlah</th>
              <th style='text-align:right'>Delete</th>
            </thead>
            <tbody>

              <?php
              $sql = "SELECT * FROM stok ORDER BY nama_barang ASC";
              $query = mysqli_query($koneksi,$sql);
              $no = 1;

              while($data = mysqli_fetch_array($query)){
                echo "<tr>";
                echo "<td>".$no."</td>";
                echo "<td>".$data['id_barang']."</td>";
                echo "<td>".$data['nama_barang']."</td>";
                echo "<td>".$data['banyak_barang']." Unit</td>";
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
