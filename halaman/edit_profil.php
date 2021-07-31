<?php

session_start();
require_once("../masuk/config.php");

if(isset($_POST['edit'])){
  
    if ($password==$konfirmasi_password) {
      $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
      $konfirmasi_password= password_hash($_POST["konfirmasi_password"], PASSWORD_DEFAULT);
      $nama = filter_input(INPUT_POST, 'nama', FILTER_SANITIZE_STRING);
      
        $sql = "UPDATE users SET nama=:nama, password=:password WHERE no_hp='".$_SESSION["no_hp"]."'";
        $stmt = $db->prepare($sql);

        //bind parameter
        $params = array(
        ":nama" => $nama,
        ":password" => $password
        );
    
        $saved = $stmt->execute($params);

        //jika data tersimpan maka alihkan ke halaman 3
        if($saved) header("Location: profil.php");
    } else { echo "Password yang anda masukkan tidak sesuai"; }
	$_SESSION["nama_baru"] = $nama;
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
    <title>UpdateProfil</title>

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
          <p>Isi data berikut sesuai dengan nama atau password yang ingin anda ubah</p>

          <form action="" method="POST">
          <p>UBAH NAMA</p>
            <!-- <input type="hidden" name="id" value="<?php echo $data_users['id']; ?>"/ -->
            <div class="mb-3">
              <label for="nama"  value="<?php echo $_SESSION['nama']; ?>" class="form-label"> Nama Baru</label>
              <input type="text" class="form-control" name="nama" />
            </div>
          
          <p>UBAH PASSWORD</p>

          <div class="mb-3">
            <label for="password" class="form-label">Password Baru</label>
            <input type="password" class="form-control" name="password" />
          </div>
          <div class="mb-3">
            <label for="konfirmasi_password" class="form-label">Konfirmasi Password</label>
            <input type="password" class="form-control" name="konfirmasi_password" />
          </div>
        

        
          <div class="d-flex align-items-end flex-column bd-highlight mb-2">
            <button class="btn btn-sm btn-danger mt-5" name="edit">SAVE</button>
          </div>
          </form>
        </div>
    </div>
    </div>
</div>
</main>
        </div>
      </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  </body>
</html>
