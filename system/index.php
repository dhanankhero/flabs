  <!DOCTYPE html>
  <html lang="id" dir="ltr">
    <head>
      <meta charset="utf-8">
      <title>Flabs System</title>
      <link rel="stylesheet" href="../assets/css/master.css">
      <script type="text/javascript" src="../assets/js/Chart.bundle.js"></script>
      <script type="text/javascript" src="../assets/js/utils.js"></script>
      <style>
    		#chart-pie {
    			width: 100%;
    			margin: 30px auto 0;
    			text-align: center;
    		}
        #chartjs-tooltip {
    			opacity: 1;
    			position: absolute;
    			background: rgba(0, 0, 0, .7);
    			color: white;
    			border-radius: 3px;
    			-webkit-transition: all .1s ease;
    			transition: all .1s ease;
    			pointer-events: none;
    			-webkit-transform: translate(-50%, 0);
    			transform: translate(-50%, 0);
    		}

    		.chartjs-tooltip-key {
    			display: inline-block;
    			width: 10px;
    			height: 10px;
    			margin-right: 10px;
    		}
    	</style>
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
          <a href="index.php"><li class="selected">Dashboard</li></a>
          <a href="pembayaran.php"><li>Pembayaran</li></a>
          <a href="database.php"><li>Database</li></a>
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
          Dashboard
        </div>
        <!-- end Navigasi halaman -->
        <div id="container-content">
          <!-- Widget Kartu 1 -->
          <div class="card-space">
            <div class="card">
              <div class="title-card">
                <div class="title-kiri">Laba Dalam Satu Bulan</div>
                <div class="title-kanan">/</div>
                <div class="clear"></div>
              </div>
              <div class="space-2"></div>
              <div id="pendapatan">
                  <?php
                  $sql = "SELECT *,SUM(data_laba) AS jumlah_harian FROM orderan GROUP BY MONTH(data_tanggal) DESC LIMIT 0,5";
                  $query = mysqli_query($koneksi,$sql);
                  $no = 1;

                  $January = "Januari";
                  $February = "Februari";
                  $March = "Maret";
                  $July = "Juli";
                  $August = "Agustus";

                  while($data = mysqli_fetch_array($query)){
                    $namabulan = date('F', strtotime($data['data_tanggal']));
                    echo "<div class='pendapatan-item'>";
                    echo "<div class='bulan_pendapatan pos-kiri'>".$$namabulan."</div>" ;
                    echo "<div class='bulan_pendapatan pos-kanan'> Rp. ".$data['jumlah_harian'].",00</div>" ;
                    echo "<div class='clear'></div>";
                    echo "</div>";
                }
                 ?>
              </div>
            </div>
          </div>
          <!-- end Widget Kartu 1 -->
          <!-- Widget Kartu 2 -->
          <div class="card-space">
            <div class="card">
              <div class="title-card">
                <div class="title-kiri">Produk Favorit</div>
                <div class="title-kanan">/</div>
                <div class="clear"></div>
              </div>
              <div id="chart-pie" style="width: 300px;">
            		<canvas id="chart-area" width="300" height="300"></canvas>
            		<div id="chartjs-tooltip">
            			<table></table>
            		</div>
            	</div>


            </div>
          </div>
          <!-- end Widget Kartu 2 -->
          <div class="clear"></div>
          <!-- Kartu Utama 1 -->
          <div class="card-fluid">
            <div class="title-card">
              <div class="title-kiri">Data Penjualan per Hari</div>
              <div class="title-kanan">/</div>
              <div class="clear"></div>
              <div class="space-2"></div>
            </div>
            <canvas id="statistik" height="100"></canvas>
          </div>
          <!-- end Kartu Utama 1 -->
          <!-- Kartu Utama 2 -->
          <div class="card-fluid">
            <div class="title-card">
              <div class="title-kiri">Riwayat Penjualan</div>
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
              </thead>
              <tbody>

                <?php
                $sql = "SELECT * FROM orderan ORDER BY id_barang DESC LIMIT 0,5";
                $query = mysqli_query($koneksi,$sql);
                $no = 1;

                while($data = mysqli_fetch_array($query)){
                  echo "<tr>";
                  echo "<td>".$no."</td>";
                  echo "<td>".$data['id_barang']."</td>";
                  echo "<td>".$data['data_name']."</td>";
                  echo "<td>".$data['data_harga']."</td>";
                  echo "<td>".$data['data_kuantitas']." Unit</td>";
                  echo "<td> Rp. ".$data['data_harga']*$data['data_kuantitas'].",00</td>";
                  echo "</tr>";
                  $no++;
                }
                 ?>
                 <tr>
                   <td colspan="6" style="padding: 40px 0 0 0"><center><a href="database.php">Lihat Semua data</a></center></td>
                 </tr>
              </tbody>
            </table>
          </div>
          <!-- end Kartu Utama 2 -->
        </div>
      </div>
      <!-- end Bagian Halaman utama -->
      <script type="text/javascript">
        var statistik = document.getElementById("statistik");

        Chart.defaults.global.defaultFontFamily = "Arial";
        Chart.defaults.global.defaultFontSize = 14;

        var dataFirst = {
          label: "Penjualan",

          data : [
            <?php
            $sql = "SELECT *,SUM(data_total) AS jumlah_harian FROM orderan GROUP BY DAY(data_tanggal) DESC LIMIT 0,5";
            $query = mysqli_query($koneksi,$sql);
            $no = 1;
            while($data = mysqli_fetch_array($query)){
              echo "'".$data['jumlah_harian']."'," ;
          }
           ?>
        ],
          lineTension: 0.3,
          fill: false,
          borderColor: '#08b7bd',
          backgroundColor: 'transparent',
          pointBorderColor: '#fff',
          pointBackgroundColor: '#08b7bd',
          pointRadius: 5,
          poinHoverRadius: 15,
          pointHitRadius: 30,
          pointBorderWith: 2,
          pointStyle: 'round'
        };
        var statistikData = {
          labels: [
            <?php
            $sql = "SELECT DAY(data_tanggal) AS tanggal FROM orderan GROUP BY DAY(data_tanggal) DESC LIMIT 0,10";
            $query = mysqli_query($koneksi,$sql);
            $no = 1;
            while($data = mysqli_fetch_array($query)){
              echo "'Tanggal ".$data['tanggal']."'," ;
          }
           ?>
          ],
          datasets: [dataFirst]
        };
        var chartOption = {
          legend: {
            display: true,
            position: 'top',
            labels: {
              boxWidth: 80,
              fontColor:'black',
            }
          }
        };
        var lineChart = new Chart(statistik, {
          type: 'line',
          data: statistikData,
          option: chartOption
        });
      </script>
      <script>
        Chart.defaults.global.tooltips.custom = function(tooltip) {
          // Tooltip Element
          var tooltipEl = document.getElementById('chartjs-tooltip');

          // Hide if no tooltip
          if (tooltip.opacity === 0) {
            tooltipEl.style.opacity = 0;
            return;
          }

          // Set caret Position
          tooltipEl.classList.remove('above', 'below', 'no-transform');
          if (tooltip.yAlign) {
            tooltipEl.classList.add(tooltip.yAlign);
          } else {
            tooltipEl.classList.add('no-transform');
          }

          function getBody(bodyItem) {
            return bodyItem.lines;
          }

          // Set Text
          if (tooltip.body) {
            var titleLines = tooltip.title || [];
            var bodyLines = tooltip.body.map(getBody);

            var innerHtml = '<thead>';

            titleLines.forEach(function(title) {
              innerHtml += '<tr><th>' + title + '</th></tr>';
            });
            innerHtml += '</thead><tbody>';

            bodyLines.forEach(function(body, i) {
              var colors = tooltip.labelColors[i];
              var style = 'background:' + colors.backgroundColor;
              style += '; border-color:' + colors.borderColor;
              style += '; border-width: 2px';
              var span = '<span class="chartjs-tooltip-key" style="' + style + '"></span>';
              innerHtml += '<tr><td>' + span + body + '</td></tr>';
            });
            innerHtml += '</tbody>';

            var tableRoot = tooltipEl.querySelector('table');
            tableRoot.innerHTML = innerHtml;
          }

          var positionY = this._chart.canvas.offsetTop;
          var positionX = this._chart.canvas.offsetLeft;

          // Display, position, and set styles for font
          tooltipEl.style.opacity = 1;
          tooltipEl.style.left = positionX + tooltip.caretX + 'px';
          tooltipEl.style.top = positionY + tooltip.caretY + 'px';
          tooltipEl.style.fontFamily = tooltip._bodyFontFamily;
          tooltipEl.style.fontSize = tooltip.bodyFontSize;
          tooltipEl.style.fontStyle = tooltip._bodyFontStyle;
          tooltipEl.style.padding = tooltip.yPadding + 'px ' + tooltip.xPadding + 'px';
        };

        var config = {
          type: 'pie',
          data: {
            datasets: [{
              data: [
                <?php
              $sql = "SELECT * FROM orderan ORDER BY id_barang DESC LIMIT 0,5";
              $query = mysqli_query($koneksi,$sql);
              $no = 1;
              while($data = mysqli_fetch_array($query)){
                echo "'".$data['data_kuantitas']."'," ;
            }
             ?>
           ],
              backgroundColor: [
                window.chartColors.red,
                window.chartColors.orange,
                window.chartColors.yellow,
                window.chartColors.green,
                window.chartColors.blue,
              ],
            }],
            labels: [
              <?php
              $sql = "SELECT * FROM orderan ORDER BY id_barang DESC LIMIT 0,5";
              $query = mysqli_query($koneksi,$sql);
              $no = 1;
              while($data = mysqli_fetch_array($query)){
                echo "'".$data['data_name']."'," ;
            }
             ?>
            ]
          },
          options: {
            responsive: true,
            legend: {
              display: true
            },
            tooltips: {
              enabled: false,
            }
          }
        };

        window.onload = function() {
          var ctx = document.getElementById('chart-area').getContext('2d');
          window.myPie = new Chart(ctx, config);
        };
      </script>
    </body>
  </html>
