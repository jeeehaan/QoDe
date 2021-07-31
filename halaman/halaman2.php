<?php

session_start();
require_once("../masuk/config.php");

//fungsi untuk mengupload file
function upload() {
$tmpName = $_FILES['foto_ktp']['tmp_name'];
$error= $_FILES['foto_ktp']['error'];
$namaFile = $_FILES['foto_ktp']['name'];

//cek file berhasil di-upload
if ($error===4) {
  echo "<script>
  alert('gambar gagal diupload');
  </script>";
  return false;
}

//ekstensi format gambar
$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
$ekstensiGambar = explode('.', $namaFile);
$ekstensiGambar = strtolower(end($ekstensiGambar));

if(!in_array($ekstensiGambar, $ekstensiGambarValid)) {
  echo "<script>
  alert('format gambar tidak sesuai');
  </script>";
}

//memindahkan file bukti pembayaran ke direktori (folder file, bukti_pembayaran)
move_uploaded_file($tmpName, '../files/foto_ktp/'.$namaFile);

return $namaFile;
}

//inisialisasi variable agar sesuai dengan pilihan di halaman sebelumnya dengan menggunakan session
if(isset($_POST['lanjut'])){
  
  if($_SESSION["kambing"]==1) {
    $nama_hewan="Kambing";
    $harga=$_SESSION["hkambing"];
  }
  else if($_SESSION["sapi7"]==1){
    $nama_hewan="1/7 Sapi";
    $harga=$_SESSION["hsapi7"];
  }
  else if($_SESSION["sapi"]==1){
    $nama_hewan="Sapi";
    $harga=$_SESSION["hsapi"];
  }

  
  $foto_ktp = upload();
  if( !$foto_ktp) {
    return false;
  }
  $nama_sq = filter_input(INPUT_POST, 'nama_sq', FILTER_SANITIZE_STRING);
  $no_hp_p = $_SESSION["no_hp"];

  $sql = "INSERT INTO data_pengqurban (no_hp_p, nama_sq, foto_ktp, nama_hewan, jumlah, harga) 
            VALUES (:no_hp_p, :nama_sq, :foto_ktp, :nama_hewan, 1, :harga)";
  $stmt = $db->prepare($sql);

  //bind parameter
  $params = array(
    ":no_hp_p" => $no_hp_p,
    ":nama_sq" => $nama_sq,
    ":foto_ktp" => $foto_ktp,
    ":nama_hewan" => $nama_hewan,
    ":harga" => $harga
  );
    
  $saved = $stmt->execute($params);

  //jika data tersimpan maka alihkan ke halaman 3
  if($saved) header("Location: halaman3.php");

  //membuat session untuk nama pengqurban
  $_SESSION["nama_sq"]=$nama_sq;
      
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
    <link rel="stylesheet" href="../style/index.css" />
    <title>Halaman 2</title>

  </head>
  <body>

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

    <div class="container border mt-5">
      <div class="row">
          <div class="col-lg-8">
            <form action="" method="POST" enctype="multipart/form-data">
            <h2>Identitas Penqurban</h2>
            <div class="mb-3">
              <p>Upload KTP anda dalam format jpg/jpeg/png</p>
              <input type="file" class="form-control" name="foto_ktp" />
            </div>
            <h2>Nama Shahibul Qurban</h2>
            <p>Tuliskan nama lengkap orang yang berqurban (disertai "binti nama ayah kandung") untuk tujuan penyembelihan</p>
            <div class="row">
              <div class="col-lg-4">Qurban atas Nama</div>
              <div class="col-lg-8">
                <input class="form-control" type="text" name="nama_sq" />
              </div>
            </div>
            <div class="d-flex align-items-end flex-column bd-highlight mb-2">
              <button class="btn btn-sm btn-danger mt-5" name="lanjut">SELANJUTNYA</button>
            </div>
            </form>
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
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  </body>
</html>

