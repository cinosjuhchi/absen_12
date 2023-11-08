<?php
session_start();

require 'function.php';
$id = $_GET['id_admin'];

$query = "SELECT * FROM admin_12 WHERE id_admin = '$id'";
$tampil_profil = mysqli_query($link, $query);
$nm = mysqli_fetch_assoc($tampil_profil);

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
    <link rel="stylesheet" href="../CSS/profil.css">
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
            <a href="admin1.php" class="items">
                <img src="../img/dashboard.svg" alt="" srcset=""> Dashboard Admin! 
            </a>
        </li>
          <li>
            <a href="" target="_self" class="items">
                <img src="../img/akun.svg" alt="" srcset=""> Profil Admin! 
            </a>
        </li>
          <li>
            <a href="logout.php" class="items">
                <img src="../img/log-out.svg" alt="" srcset=""> Log Out 
            </a>
                </li>
            </ul>
        </div>
        <div class="col-8 d-flex flex-column align-items-center all-acc">
            <div class="row text-center">
                <img src="../img/<?= $nm['gambar'];?>" class="img-thumbnai rounded-circle" alt="...">
            </div>

            <a href="edit_profil.php?id_admin=<?= $nm['id_admin'];?>">
            <img src="../img/edit.svg" class="edit" alt="" srcset="">
            </a>
            <div class="col-10 info-akun">
                <div class="col-10 d-flex flex-column">
                    <h3 class="mark-28">Nama</h3>
                    <div class="block-c">
                        <h3 class="mark-29"><?= $nm['nama'];?></h3>
                    </div>
                    <h3 class="mark-28">Username</h3>
                    <div class="block-c">
                        <h3 class="mark-29"><?= $nm['user'];?></h3>
                    </div>
                    <h3 class="mark-28">Umur</h3>
                    <div class="block-c">
                        <h3 class="mark-29"><?= $nm['umur'];?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>