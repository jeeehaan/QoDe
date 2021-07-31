<?php

session_start();
require_once("../masuk/config.php");

//menyamakan no hp di tabel users dengan no hp di tabel data_pengqurban

//menyiapkan query
$sql ="SELECT tanggal, nama_sq, nama_hewan, harga, bukti_pembayaran, keterangan  FROM data_pengqurban WHERE no_hp_p='".$_SESSION["no_hp"]."'";

$stmt = $db->prepare($sql);
$stmt->execute();

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

    <title>Halaman 3</title>
  </head>

  <body>
    <header>
      <nav class="navbar navbar-expand-lg navbar-dark bg-nav">
        <div class="container">
          <img class="logo" src="../assets/logo.png" alt="logo qode" />

          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" href="laporanqurban.php">Laporan Qurban</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="halaman1.php">Beli Qurban</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="profil.php">Profil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../masuk/logout.php">Log Out</a>
            </li>
          </ul>

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
        <h2 class="text-center mt-4 mb-4">Data Transaksi</h2>
        <div>
          <table class="table border">
            <thead>
              <tr>
                <th scope="col">Tanggal</th>
                <th scope="col">Nama Shohibul Qurban</th>
                <th scope="col">Jenis Hewan Qurban</th>
                <th scope="col">Jumlah Bayar</th>
                <th scope="col">Bukti Pembayaran</th>
                <th scope="col">Keterangan</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <?php while ($row = $stmt->fetchObject()) { ?>
                <td><?php echo $row->tanggal; ?></td> 
                <td><?php echo $row->nama_sq; ?></td>
                <td><?php echo $row->nama_hewan; ?></td>
                <td><?php echo $row->harga; ?></td>
                <td><?php echo $row->bukti_pembayaran; ?></td>
                <td><?php if ($row->keterangan==true){
                  echo 'Terkonfirmasi';}
                  else {
                  echo 'Belum dikonfirmasi';} ?>
                </td>
                </tr>
                <?php } ?>
            </tbody>
          </table>
          <br><br>
          <?php 
          $count = $stmt->rowCount();
          if ($count==0) {
          echo "Anda belum melakukan transaksi apa-apa."; } ?>
        </div>
      </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    </body>
</html>