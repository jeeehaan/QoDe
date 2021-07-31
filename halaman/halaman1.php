<?php

session_start();

//membuat sesi untuk pilihan hewan qurban dan harganya
$_SESSION["kambing"]=0;
$_SESSION["sapi7"]=0;
$_SESSION["sapi"]=0;
$_SESSION["hkambing"]="Rp.  0";
$_SESSION["hsapi7"]="Rp.  0";
$_SESSION["hsapi"]="Rp.  0";
$_SESSION["total"]="Rp.  0";

//fungsi untuk mengubah harga dan jumlah hewan qurban yang telah dipilih
function hrgkambing() {
  $_SESSION["hkambing"]="Rp.  1.700.000";
}
function hrgsapi7() {
  $_SESSION["hsapi7"]="Rp.  2.000.000";
}
function hrgsapi() {
  $_SESSION["hsapi"]="Rp.  12.700.000";
}

function kambing() {
  $_SESSION["kambing"]=1;
}
function sapi7() {
  $_SESSION["sapi7"]=1;
}
function sapi() {
  $_SESSION["sapi"]=1;
}

//memanggil fungsi jika menekan tombol pilih
if(isset($_POST['kbg'])) {
  kambing();
  hrgkambing();
  $_SESSION["total"]="Rp.  1.700.000";
} else if(isset($_POST['sp7'])) {
  sapi7();
  hrgsapi7();
  $_SESSION["total"]="Rp.  2.000.000";
} else if(isset($_POST['spi'])) {
  sapi();
  hrgsapi();
  $_SESSION["total"]="Rp.  12.700.000";
}
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
    <link rel="stylesheet" href="../style/index2.css" />

    <title>Halaman 1</title>
  </head>

  <body>
    <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-nav">
      <div class="container">
        <img class="logo" src="../assets/logo.png" alt="logo qode" />
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="laporanqurban.php">Laporan Qurban</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="halaman1.php">Beli Qurban</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../masuk/profil.php">Profil</a>
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
        <form method="post">
          <h2>Pilih Hewan Qurban</h2>
          <div class="alert disclaimer" role="alert">
            <span> Disclaimer : </span>
            Penyaluran hewan qurban termurah ditentukan oleh Tim QorbanDesa dengan mengedepankan warga desa penerima manfaat yang membutuhkan.
            <br>
            <br>
            <span> Disclaimer : </span>
            Sebelum memilih qurban berkelompok, harap konfirmasi terlebih dahulu dengan panitia melalui contact yang terdapat di website!!
          </div>

          <div class="row list-item mt-2">
          
            <div class="col-lg-4">
              <p>Kambing</p>
            </div>
            <div class="col-lg-4">
              <p>@1.700.000</p>
            </div>
            <div class="col-lg-4">
            <button type="submit" class="btn btn-pilih" name="kbg">Pilih</button>
            </div>
          </div>
          <div class="row list-item mt-2">
            <div class="col-lg-4">
              <p>1/7 Sapi</p>
            </div>
            <div class="col-lg-4">
              <p>@2.000.000</p>
            </div>
            <div class="col-lg-4">
            <button type="submit" class="btn btn-pilih" name="sp7">Pilih</button>
            </div>
          </div>
          <div class="row list-item mt-2">
            <div class="col-lg-4">
              <p>Sapi</p>
            </div>
            <div class="col-lg-4">
              <p>@12.700.000</p>
            </div>
            <div class="col-lg-4">
            <button type="submit" class="btn btn-pilih" name="spi">Pilih</button>
            </div>
          </div>
          </form>

          <div class="d-flex align-items-end flex-column bd-highlight mb-2">
            <button class="btn btn-sm btn-danger mt-5" onclick="window.location='halaman2.php';" >SELANJUTNYA</button>
          </div>
        </div>

        <div class="col-lg-4 price-card">
        <div>
            <!-- <p><span>lokasi qurban</span></p>
            <p>qurban termurah</p> -->
            <p><span>harga</span></p>
          </div>
          <div class="row price-list">
            <div class="col-lg-3">
              <p>Kambing</p>
            </div>
            <div class="col-lg-2">
              <p>:</p>
            </div>
            <div class="col-lg-2">
            <p><?php echo $_SESSION["kambing"] ?></p>
            </div>
            <div class="col-lg-5">
              <p><?php echo $_SESSION["hkambing"] ?></p>
            </div>
          </div>
          <div class="row price-list">
            <div class="col-lg-3">
              <p>1/7 Sapi</p>
            </div>
            <div class="col-lg-2">
              <p>:</p>
            </div>
            <div class="col-lg-2">
            <p><?php echo $_SESSION["sapi7"] ?></p>
            </div>
            <div class="col-lg-5">
            <p><?php echo $_SESSION["hsapi7"] ?></p>
            </div>
          </div>
          <div class="row price-list">
            <div class="col-lg-3">
              <p>Sapi</p>
            </div>
            <div class="col-lg-2">
              <p>:</p>
            </div>
            <div class="col-lg-2">
            <p><?php echo $_SESSION["sapi"] ?></p>
            </div>
            <div class="col-lg-5">
            <p><?php echo $_SESSION["hsapi"] ?></p>
            <hr />
            </div>
          </div>
          <div class="row price-list">
            <div class="col-lg-3">
              <p>total</p>
            </div>
            <div class="col-lg-4">
              <p>:</p>
            </div>
            <div class="col-lg-5">
            <p><?php echo $_SESSION["total"] ?></p>
            </div>
            <hr />
            <p><span>Data Pemesan</span></p>
            <div class="row">
              <div class="col-lg-5">
                <p>Nama Pemesan</p>
              </div>
              <div class="col-lg-1">:</div>
              <div class="col-lg-6">
              <p><?php if($_SESSION["nama_baru"]==''){
                echo $_SESSION["nama"];
              } else {
                echo $_SESSION["nama_baru"];
              }?></p>
            </div>
              <div class="col-lg-5">
                <p>No HP</p>
              </div>
              <div class="col-lg-1">:</div>

              <div class="col-lg-6">
              <p><?php echo $_SESSION["no_hp"] ?></p>
            </div>
            <hr />
          </div>
        </div>
      </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  </body>
</html>