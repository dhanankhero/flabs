<!DOCTYPE html>
<html lang="id" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Flabs - Login</title>
    <link rel="stylesheet" href="assets/css/master.css">
  </head>
  <body>
    <div class="container-fluid">
      <div class="login-area">
        <div class="login-container">
          <div class="flabs-logo">
            <img class="logo_flabs" src="assets/img/logo_flabs.png" alt="flabs">
          </div>
          <div class="form-container">
            <form class="form" action="cek-login.php" method="post">
              <div class="inputcombine-container">
                <input class="textinputcombine1" type="text" name="username" placeholder="username" autofocus>
                <input class="textinputcombine2" type="password" name="password" placeholder="password" autofocus><br>
              </div>
              Hit
              <input class="buttoninput" type="submit" name="cekusername" value="enter">
              to login
            </form>
            <?php
            if (isset($_GET['pesan'])) {
              if ($_GET['pesan'] == "gagal") {
                echo "<div class='alert'>Login Gagal! Username atau Password salah</div>";
              } elseif ($_GET['pesan'] == "logout") {
                echo "<div class='alert'>Anda berhasil Log Out!</div>";
              } elseif ($_GET['pesan'] == "belum_login") {
                echo "<div class='alert'>Silahkan login terlebih dahulu</div>";
              }
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
