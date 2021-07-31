<?php

session_start();
require_once("../masuk/config.php");

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="../style/index.css" />
    <title>Profil</title>
  </head>
  <body>
    <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-nav">
      <div class="container">
        <img class="logo" src="../assets/logo.png" alt="logo qode" />
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="laporanqurban.php">Laporan Qurban</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="halaman1.php">Beli Qurban</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active " href="../masuk/profil.php">Profil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../masuk/logout.php">Log Out</a>
            </li>
          </ul>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
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

    <main class="container border mt-5">
      <div class="row">
        <div class="col-lg-8">
          <h2>PENGATURAN PROFIL</h2>
          <p>Profil Anda</p>
          <p>Nama</p>
          <div class="container p-1" style="background-color: #c1c1c1; border-radius: 20px 20px">
          <h5><?php if($_SESSION["nama_baru"]==''){
                echo $_SESSION["nama"];
              } else {
                echo $_SESSION["nama_baru"];
              }?></h5>
          </div>
          <br>
          <p>No Telepon</p>
          <div class="container p-1" style="background-color: #c1c1c1; border-radius: 20px 20px">
              <h5><?php echo $_SESSION["no_hp"] ?></h5>
          </div>
          
        </div>
        <div class="d-flex align-items-end flex-column bd-highlight mb-2">
            <button class="btn btn-sm btn-danger mt-5" onclick="window.location='edit_profil.php';">EDIT</a></button>
        </div>
    </div>
</main>
        </div>
      </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  </body>
</html>