<?php 
include('../masuk/library.php');
$lib = new Library();
$data_qurban = $lib->showlaporan();
 
if(isset($_GET['hapus_laporan']))
{
    $id = $_GET['hapus_laporan'];
    $status_hapus = $lib->deletelaporan($id);
    if($status_hapus)
    {
        header('Location: data_qurban.php');
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="../style/index.css" />

    <title>Nadia Sofia</title>
  </head>
  <body>
    
      <header>
      <nav class="navbar navbar-expand-lg navbar-dark bg-nav">
      <div class="container">
        <img class="logo" src="../assets/logo.png" alt="logo qode" />
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="data_pengguna.php">Pengguna</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="data_qurban.php">Laporan Qurban</a>
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
    
    <div class="container">
    <br>
        <div class="card">
            <div class="card-header">
                <h3>Data Pengguna</h3>
            </div>
            <div class="card-body">
			<hr>
                <table class="table table-bordered" width="60%">
                    <tr>
                        <th>No</th>
                        <th>No Telepon</th>
                        <th>Nama Pequrban</th>
                        <th>Tanggal</th>
                        <th>Jenis Qurban</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Foto KTP</th>
                        <th>Bukti Pembayaran</th>
                        <th>Keterangan</th>
                        <th>Action</th>
                    </tr>
                    <?php 
                    $no = 1;
                    foreach($data_qurban as $row)
                    {
                        echo "<tr>";
                        echo "<td>".$no."</td>";
                        echo "<td>".$row['no_hp_p']."</td>";
                        echo "<td>".$row['nama_sq']."</td>";
                        echo "<td>".$row['tanggal']."</td>";
                        echo "<td>".$row['nama_hewan']."</td>";
                        echo "<td>".$row['jumlah']."</td>";
                        echo "<td>".$row['harga']."</td>"; ?>
                        <td><img src='../files/foto_ktp/<?php echo $row['foto_ktp']; ?>' width="50"></td>;
                        <td><img src='../files/bukti_pembayaran/<?php echo $row['bukti_pembayaran']; ?>' width="50"></td>; <?php
                        echo "<td>".$row['keterangan']."</td>";
                        echo "<td><a class='btn btn-info' href='../masuk/form_edit_laporan.php?id=".$row['id']."'>Edit</a>
                        <a class='btn btn-danger' href='data_qurban.php?hapus_laporan=".$row['id']."'>Hapus</a></td>";
                        echo "</tr>";
                        $no++;
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
    </body>
</html>