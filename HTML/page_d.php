<?php
session_start();
require 'function.php';
if(isset($_POST["take-1"])){
    if(field($_POST)>0){
        $_SESSION['jurusan'] = $_POST["jurusan"];
        $_SESSION['kelas'] = $_POST["kelas"];
        header("Location: tabel_absen.php");
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Jurusan dan Kelas</title>
    <!-- Memasukkan Bootstrap 5 melalui CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
</head>
<body>
    <section class="vh-100 d-flex justify-content-center align-items-center">
    <div class="container d-flex flex-column align-items-center">
        <div class="col">
        <h1 class="text-center">Pilih Jurusan dan Kelas</h1>
    </div>
        <!-- Membuat form dengan Bootstrap 5 -->
        <div class="col-8">
        <form method="post" action="" class="d-flex flex-column align-items-center mt-3 g-3">
            <!-- Membuat kolom untuk select jurusan -->
            <div class="col-md-6 mb-3">
                <label for="jurusan" class="form-label">Jurusan</label>
                <!-- Membuat select jurusan dengan option RPL, BDP, AKL, OTKP -->
                <select id="jurusan" name="jurusan" class="form-select" required>
                    <option selected disabled value="">Pilih Jurusan...</option>
                    <option value="RPL">RPL</option>
                    <option value="BDP">BDP</option>
                    <option value="AKL">AKL</option>
                    <option value="OTKP">OTKP</option>
                </select>
            </div>

            <!-- Membuat kolom untuk select kelas -->
            <div class="col-md-6 mb-3">
                <label for="kelas" class="form-label">Kelas</label>
                <!-- Membuat select kelas dengan option X, XI, XII -->
                <select id="kelas" name="kelas" class="form-select" required>
                    <option selected disabled value="">Pilih Kelas...</option>
                    <option value="X">X</option>
                    <option value="XI">XI</option>
                    <option value="XII">XII</option>                    
                </select>                
            </div>

            <!-- Membuat tombol submit -->
            <div class="d-flex justify-content-center align-items-center col-6 mt-3">
                <button type="submit" name="take-1" class="btn btn-primary btn-lg col-12">Pilih</button>                
            </div>         
            <div class="d-flex justify-content-center align-items-center col-6 mt-3">
                <a type="submit" href="admin1.php" class="btn btn-danger btn-lg col-12">Kembali</a>                
            </div>   
        </form>       
    </div> 
    </div>
</section>

    <!-- Memasukkan Bootstrap 5 JS melalui CDN -->
    <!-- Perhatikan bahwa Bootstrap 5 JS membutuhkan Popper.js sebagai dependency -->
    <!-- Jadi kita harus memasukkan Popper.js sebelum Bootstrap 5 JS -->
    <!-- Kita juga membutuhkan jQuery sebagai dependency tambahan -->
    <!-- Jadi kita harus memasukkan jQuery sebelum Popper.js -->

    <!-- Memasukkan jQuery melalui CDN -->
    <script src = "https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Memasukkan Popper.js melalui CDN -->    
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>

     <!-- Memasukkan Bootstrap 5 JS melalui CDN -->   
     <script src = "https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.min.js"></script> 
     
     <!-- Menambahkan script tambahan jika diperlukan -->   
     <!--<script src = "custom.js"></script>-->
    
</body>
</html>