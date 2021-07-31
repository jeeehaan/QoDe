<?php

session_start();
require_once("../masuk/config.php");

//membuat fungsi untuk mengupload file
function upload() {
  $tmpName = $_FILES['bukti_pembayaran']['tmp_name'];
  $error= $_FILES['bukti_pembayaran']['error'];
  $namaFile = $_FILES['bukti_pembayaran']['name'];

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
  
  //memindahkan file foto ktp ke direktori (folder file, foto_ktp)
  move_uploaded_file($tmpName, '../files/foto_ktp/'.$namaFile);

  return $namaFile;
}

if(isset($_POST['lanjut'])){

  //upload gambar
  $bukti_pembayaran = upload();
  if( !$bukti_pembayaran) {
    return false;
  }
  $tanggal = date('Y-m-d');
  

  $sql = "UPDATE data_pengqurban SET bukti_pembayaran=:bukti_pembayaran, tanggal=:tanggal WHERE nama_sq='".$_SESSION["nama_sq"]."'";
  $stmt = $db->prepare($sql);

  // bind parameter ke query
  $params = array(
    ":bukti_pembayaran" => $bukti_pembayaran,
    ":tanggal" => $tanggal 
  );

  // eksekusi query untuk menyimpan ke database
  $saved = $stmt->execute($params);

  // jika query simpan berhasil, maka user sudah terdaftar
  // maka alihkan ke halaman login
  if($saved) {
    header("Location: laporanqurban.php");
  }else {
    echo "error";
  }    
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

    <title>Halaman 3</title>
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
          <form action="" method="POST" enctype="multipart/form-data">
          <h2>Metode Pembayaran</h2>
          <p>Kirimkan dana pembayaran ke salah satu rekening dibawah kemudian upload bukti transfernya</p>
          <div class="row list-item mt-2">
            <div class="col-lg-6">
              <p>BRI Syariah</p>
            </div>
            <div class="col-lg-4">
              <p>No Rek : 1111111111</p>
            </div>
          </div>

          <div class="row list-item mt-2">
            <div class="col-lg-6">
              <p>BNI Syariah</p>
            </div>
            <div class="col-lg-4">
              <p>No Rek : 222222222</p>
            </div>
          </div>

          <div class="row list-item mt-2">
            <div class="col-lg-6">
              <p>Mandiri Syariah</p>
            </div>
            <div class="col-lg-4">
              <p>No Rek : 333333333</p>
            </div>
          </div>

          <!-- example
          <div class="row list-item mt-2">
            <p>Mandiri Syariah</p>
            <p>No Rekening : 1111111111</p>
          </div>
          end example -->

          <br>
          <form action="" method="POST" enctype="multipart/form-data">
            <label for="bukti_pembayaran"><h2>Bukti Transfer</h2></label>
            <input type="file" name="bukti_pembayaran" class="form-control" />

            <div class="d-flex align-items-end flex-column bd-highlight mb-2">
              <button class="btn btn-sm btn-danger mt-5" name="lanjut">Bayar</button>
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
            <p><span>Data Penqurban</span></p>
            <div class="row">
              <div class="col-lg-5">Qurban atas Nama</div>
              <div class="col-lg-1">:</div>
              <div class="col-lg-6">
              <p><?php echo $_SESSION["nama_sq"] ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  </body>
</html>
