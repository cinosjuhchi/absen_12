<?php
session_start();
if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
  }
require 'function.php';

$jumlah = 5;
$jumlahdata = count(query("SELECT * FROM absensi"));
$jumlahHalaman = ceil($jumlahdata / $jumlah);
$halamanAktif =( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;

$awalData = ( $jumlah * $halamanAktif) - $jumlah;

$field_jurusan = $_SESSION["jurusan"];
$field_kelas = $_SESSION["kelas"];

$pplg = query("SELECT * FROM siswa_12 JOIN absensi ON siswa_12.NIS = absensi.NIS WHERE kelas = '$field_kelas' AND jurusan = '$field_jurusan' LIMIT $awalData, $jumlah");

if( isset($_POST["cari"]) ){
    $pplg = cari_absen($_POST["keyword"]);
}

$no = 2;

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
    <title>Data Siswa!</title>
    <link rel="stylesheet" href="../CSS/tabel.css">
  </head>
  <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-3 kotak-sidebar">
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
                        <a href="profile.php" class="items">
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
                <div class="col-9">
                        <!-- <a href="" target="_self">Refresh</a> -->

                    <div class="row justify-content-between align-items-center mark-190">
                    <a href="" target="_self">Refresh</a>

                        <h3 class="Roboto-2 col-8">
                            Data Absensi Siswa
                        </h3>
                        <form action="" method="post" class="d-flex col-2" enctype="multipart/form-data">                         
                                <input class="form-control me-2" name="keyword" type="text" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" name="cari" type="submit">Search</button>
                        </form>
                    </div>
                    <div class="row col-12 align-items-center">
                        <table class="table table-success table-striped table-c">
                            <thead class="thd">
                                <th class="col text-center">
                                    <h3 class="Roboto">Nama</h3>
                                </th>
                                <th class="col text-center">
                                    <h3 class="Roboto">NIS</h3>
                                </th>
                                <th class="col text-center">
                                    <h3 class="Roboto">Tanggal</h3>
                                </th>
                                <th class="col text-center">
                                    <h3 class="Roboto">Keterangan</h3>
                                </th>
                                <th class="col text-center">
                                    <h3 class="Roboto">Hapus</h3>
                                </th>
                            </thead>
                            <tbody>

                            <?php foreach($pplg as $rpl) : ?>
                                <tr class="td-c">
                                    <td class="text-center">
                                        <p class="Roboto mark-20"><?= $rpl['nama'];?></p>
                                    </td>                                                                                               
                                    <td class="text-center">
                                        <p class="Roboto mark-20"><?= $rpl['NIS'];?></p>
                                    </td>                                                                                               
                                    <td class="text-center">
                                        <p class="Roboto mark-20"><?= $rpl['tanggal'];?></p>
                                    </td>                                                                                               
                                    <td class="text-center">
                                        <p class="Roboto mark-20"><?= $rpl['status'];?></p>
                                    </td>                                                                                                                           
                                    <td class="text-center">
                                        <a class="btn btn-danger" href="hapus.php?id_absen=<?=$rpl['id_absen'];?>">Hapus</a>
                                    </td>                                                                                                                           
                                </tr>              
                                <?php endforeach;?>
                            </tbody>
                          </table>
                        </div>      
                        
                        <div class="pagination col-12 d-flex align-items-center justify-content-center">
                            <div class="row">
                            
                                <!-- <div class="btn btn-primary col mx-1">Previous</div> -->
                                <?php if($halamanAktif > 1) :?>
                                <a  class="btn btn-primary col mx-1 text-light text-decoration-none" href="?halaman=<?= $halamanAktif - 1 ; ?>">Previous</a>
                                <?php endif; ?>
                                <?php for($i = 1; $i <= $jumlahHalaman; $i++ ) : ?>
                                <!-- <div class="btn btn-primary col mx-1"> -->
                                    <a  class="btn btn-primary col mx-1 text-light text-decoration-none" href="?halaman=<?= $i; ?>"><?=$i;?></a>
                                <!-- </div> -->
                                <?php endfor;?>
                                <?php if($halamanAktif < $jumlahHalaman) :?>
                                <a  class="btn btn-primary col mx-1 text-light text-decoration-none" href="?halaman=<?= $halamanAktif + 1 ; ?>">Next</a>
                                    <?php endif;?>

                                <!-- <div class="btn btn-primary col mx-1">2</div> -->
                                <!-- <div class="btn btn-primary col mx-1">3</div> -->
                                <!-- <div class="btn btn-primary col mx-1">Next</div> -->
                            </div>
                        </div>
                        
                </div>
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>