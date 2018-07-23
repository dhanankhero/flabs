<!DOCTYPE html>
<html lang="id" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Flabs System - Item</title>
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
        <a href="item.php"><li class="selected">Item</li></a>
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
        Item
      </div>
      <!-- end Navigasi halaman -->
      <div id="container-content">
        <!-- Kartu Utama 1 -->
        <div class="card-fluid">
          <div class="title-card">
            <div class="title-kiri">Tambah Item</div>
            <div class="title-kanan">/</div>
            <div class="clear"></div>
            <div class="space-2"></div>
          </div>
          <form class="add_data" action="add_item_act.php" method="post">
            <input class="inputtext-2 formfocus" type="text" name="nama_barang" placeholder="Nama Item" autofocus>
            <input class="inputtext-3 formfocus" type="number" name="harga_beli" placeholder="Harga beli /item" autofocus>
            <input class="inputtext-3 formfocus" type="number" name="harga_barang" placeholder="Harga jual /item" autofocus>
            <input class="inputsubmit-2 formfocus" type="submit" name="tambah" value="Tambah" autofocus>
          </form>
        </div>
        <!-- end Kartu Utama 1 -->
        <!-- Kartu Utama 2 -->
        <div class="card-fluid">
          <div class="title-card">
            <div class="title-kiri">Item Data</div>
            <div class="title-kanan">/</div>
            <div class="clear"></div>
            <div class="space-2"></div>
          </div>
          <table class="table-data">
            <thead>
              <th>No.</th>
              <th>ID</th>
              <th>Nama</th>
              <th>Harga Beli</th>
              <th>Harga Jual</th>
            </thead>
            <tbody>

              <?php
              $sql = "SELECT * FROM barang_dagangan ORDER BY nama_barang ASC";
              $query = mysqli_query($koneksi,$sql);
              $no = 1;

              while($data = mysqli_fetch_array($query)){
                echo "<tr>";
                echo "<td>".$no."</td>";
                echo "<td>".$data['id_barang']."</td>";
                echo "<td>".$data['nama_barang']."</td>";
                echo "<td>Rp. ".$data['harga_beli'].",00</td>";
                echo "<td>Rp. ".$data['harga_barang'].",00</td>";
                echo "</tr>";
                $no++;
              }
               ?>
            </tbody>
          </table>
        </div>
        <!-- end Kartu Utama 2 -->
      </div>
    </div>
  </body>
</html>
