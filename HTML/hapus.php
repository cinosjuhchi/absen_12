<?php
require 'function.php';
$id = $_GET['id_absen'];

if(hapus($id) > 0){
    echo "<script>
    alert('Data Berhasil Dihapus');
    document.location.href = 'tabel_absen.php';
    </script>";
}else{
    echo "<script>
    alert('Data Gagal Dihapus');
    </script>";
}