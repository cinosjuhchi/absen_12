<?php
require 'function.php';

if(isset($_POST['absen'])){
  if(absen($_POST)>0){
    echo "<script>
      alert('berhasil absen');
    </script>";
  }else{
    echo "<script>
      alert('gagal absen');
    </script>";
  }
}

$pplg = query("SELECT * FROM siswa_12 ");


?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&family=Questrial&family=Quicksand:wght@400;700&family=Roboto:ital,wght@0,400;0,500;0,700;1,500&family=Tilt+Neon&display=swap" rel="stylesheet">
    <title>Absen!</title>
    <link rel="stylesheet" href="../CSS/add.css">
  </head>
  <body>
<div class="container-fluid">
    <div class="row">
        <div class="col-4 kotak-sidebar">
        <header class="col-12 header-1 text-center">
            <img src="../img/logo.png" alt="" srcset="">
          </header>
        <ul>
          <li>
            <a href="/html/dashboard.php class="items">
                <img src="../img/dashboard.svg" alt="" srcset=""> Dashboard Siswa! 
            </a>
        </li>
            </ul>
        </div>
        <div class="col-8 d-flex flex-column align-items-center all-acc">
            <div class="row">
                <h3 class="Roboto-2 text-center>
                    Absen!
                </h3>
            </div>
            <div class="col-10 info-akun">
                <div class="col-10 d-flex flex-column">
                    <form action="" method="post" enctype="multipart/form-data">
                    <h3 class="mark-28">NIS</h3>
                    <select name="NIS" class="form-select" aria-label="Default select example">
                      <option selected="">NIS</option>
                      <?php foreach($pplg as $rpl) :?>
                      <option value="<?= $rpl['NIS']; ?>"><?= $rpl['NIS']; ?></option>
                      <?php endforeach; ?>
                    </select>
                    <h3 class="mark-28">tanggal</h3>
                    <input class="block-c" type="date" name="tanggal">
                    <h3 class="mark-28">Status</h3>
                    <select name="status" class="form-select" aria-label="Default select example">
                      <option selected="">Keterangan</option>
                      <option value="hadir">hadir</option>
                      <option value="alpha">alpha</option>
                      <option value="izin">izin</option>
                    </select>
                    <button class="btn third" name="absen">Absen</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>