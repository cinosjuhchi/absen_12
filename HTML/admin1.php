<?php
session_start();
if(!isset($_SESSION["login"])){
  header("Location: login.php");
  exit;
}
require 'function.php';
$query = "SELECT * FROM admin_12 WHERE id_admin = '$_SESSION[id]'";
$tampil_profil = mysqli_query($link, $query);
$rpl = mysqli_fetch_assoc($tampil_profil);

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
    <title>Hello, world!</title>
    <link rel="stylesheet" href="../CSS/dahsboard_a.css">
  </head>
  <body>
    <section>
        <div class="container-fluid">

            <div class="row">
                <div class="col kotak-sidebar">
                    <header class="col-12 header-1 text-center">
                      <img src="../img/logo.png" alt="" srcset="">
                    </header>
                  <ul>
                    <li>
                      <a href="" target="_self" class="nav-link">
                          <img src="../img/dashboard.svg" alt="" srcset=""> Dashboard Admin! 
                      </a>
                  </li>
                    <li>
                      <a href="profile.php?id_admin=<?=$rpl['id_admin'];?>" class="nav-link"><img src="../img/akun.svg" alt="" srcset=""> Profil Admin!</a>
                  </li>
                    <li>
                      <a href="logout.php" class="nav-link">
                          <img src="../img/log-out.svg" alt="" srcset=""> Log Out 
                      </a>
                  </li>
                </ul>
                </div>
                <div class="col-6 kotak-isi">
                  <div class="row justify-content-center">
                    <img src="../img/logo.png" alt="" srcset="" class="img-dubes">
                  </div>
                  <div class="row">
                    <a href="page_d.php" class="hoper">
                    <div class="col-4 offset-2 data-siswa d-flex flex-column align-items-center justify-content-center">
                      <img src="../img/Archive.svg" alt="">
                      <a href="page_d.php" class="secondary-link">Data Absensi</a>
                    </div>
                    </a>
                    <div class="col-2 d-flex flex-column">
                      <div class="col-12 data-absen d-flex align-items-center">
                        <img src="../img/student.svg" class="icon-student" alt="">
                        <a href="page_s.php" class="secondary-link">Data Siswa</a>
                      </div>
                      <div class="col-12 data-absen d-flex align-items-center">
                        <img src="../img/student.svg" class="icon-student" alt="">
                        <a href="" class="secondary-link">1024 Siswa</a>
                      </div>
                    </div>
                  </div>

                </div>
                <div class="col kotak-akhir">
                
                </div>
            </div>
        </div>
      </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>