<?php 

require_once("config.php");

if(isset($_POST['login'])){

    $no_hp = filter_input(INPUT_POST, 'no_hp', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    $sql = "SELECT * FROM users WHERE no_hp=:no_hp";
    $stmt = $db->prepare($sql);


    // bind parameter ke query
    $params = array(
        ":no_hp" => $no_hp
    );

    $stmt->execute($params);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if($user){
        // verifikasi password
        if(password_verify($password, $user["password"])) {
            // buat Session
            session_start();
            // masuk ke halaman admin
            $_SESSION["nama"] = $user["nama"];
            $_SESSION["no_hp"] = $no_hp;
            $_SESSION["nama_baru"] = '';
            header("Location: ../halaman/laporanqurban.php");
        }
      }
        if ($no_hp === 'admin' && $password === 'admin'){
          header("Location: ../halaman/data_pengguna.php");
          exit;
        }
        else { $error= true; } 
}
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/index.css" />

    <title>QoDe (Qorban Desa)</title>
  </head>

  <body>
    
      <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-nav">
        <div class="container">
          <img class="logo" src="../assets/logo.png" alt="logo qode" />

          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

         <div class="navbar-navscroll"> 
              <ul class="navbar-nav bd-navbar-nav">
                <li class="nav-item mr-3">
                    <a class="nav-link" href="../halaman/hukumqurban.html">Hukum Qurban</a>
                </li>
                <li class="nav-item"> 
                    <a class="nav-link" href="../halaman/tentang.html">Tentang Kami</a> 
                </li>
              </ul>
              
          </div>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a class="nav-link btn-hotline border text-light" aria-current="page" href="https://wa.me/6282227010648"><i class="fab fa-whatsapp"></i>Hotline Qurban via Whatsapp</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    
      <main>
      <div class="container">
      <br>
      <h2 class="text-center">~ Selamat Datang ~</h2>
      <h4>Masuk ke akun Anda</h4>
        <p>Belum punya akun? <a href="register.php">Daftar di sini</a></p>

        <form action="" method="POST">

        <?php if( isset($error) ) : ?>
                <p style="color: red; font-style: italic;" class="text-center">No Telepon / Password Tidak Sesuai </p>
              <?php endif; ?>

            <div class="form-group">
                <label for="no_hp">No Telepon</label>
                <input class="form-control" type="text" name="no_hp" placeholder="Masukkan nomor telepon" />
            </div>


            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" type="password" name="password" placeholder="Password" />
            </div>

            <button id="submit-btn" type="submit" class="btn btn-block" name="login"> Masuk </button>

        </form>
       </div>
       </div>
    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script> -->

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    
    </main>
  </body>
</html>