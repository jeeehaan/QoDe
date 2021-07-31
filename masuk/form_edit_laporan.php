<?php 
include('library.php');
$lib = new Library();
if(isset($_GET['id'])){
    $id = $_GET['id']; 
    $data_qurban = $lib->get_by_id_laporan($id);
}
else
{
    header('Location: ../halaman/data_pengguna.php');
}
 
if(isset($_POST['tombol_update2'])){
    $id = $_POST['id'];
    $keterangan = $_POST['keterangan'];
    $status_update = $lib->update2($id,$keterangan);
    if($status_update)
    {
        header('Location:../halaman/data_qurban.php');
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
              <a class="nav-link" href="../halaman/data_pengguna.php">Pengguna</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="../halaman/data_qurban.php">Laporan Qurban</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">Log Out</a>
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
                <h3>Konfirmasi Pembayaran</h3>
            </div>
            <div class="card-body ">
            <form method="post" action="">
                <input type="hidden" name="id" value="<?php echo $data_qurban['id']; ?>"/>
                <div class="form-group row">
                    <label for="keterangan" class="col-sm-20 col-form-label">Masukkan 1 untuk konfirmasi Pembayaran</label>
                    <div class="col-sm-35">
                    <input type="text" name="keterangan" class="form-control" id="keterangan" value="<?php echo $data_qurban['keterangan']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="alamat" class="col-sm-4 col-form-label"></label>
                    <div class="col-sm-10">
                    <input type="submit" name="tombol_update2" class="btn btn-primary" value="Update">
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
    </body>
</html>