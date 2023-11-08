<?php
$link = mysqli_connect("localhost", "root", "", "absen_12");

function query($query){
    global $link;
    $result = mysqli_query($link, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }
    return $rows;
}


function hapus($id){
    global $link;
    $query = "DELETE FROM absensi WHERE id_absen = '$id'";
    mysqli_query($link, $query);
    return mysqli_affected_rows($link);
}

function cari($keyword){
    $rpl = "SELECT * FROM siswa_12 WHERE NIS LIKE '%$keyword%' OR
            nama LIKE '%$keyword%' OR
            kelas LIKE '%$keyword%' OR
            jurusan LIKE '$keyword'
    ";
    return query($rpl);
}
function cari_absen($keyword){
    $rpl = "SELECT * FROM absensi WHERE NIS LIKE '%$keyword%' OR
            status LIKE '$keyword'
    ";
    return query($rpl);
}
function filter($keyword){
    $rp = "SELECT * FROM siswa_12 WHERE jurusan LIKE '%$keyword%'";
    return query($rp);
}

function absen($data){
    global $link;
    $nis = htmlspecialchars($data['NIS']);
    $tanggal = $data['tanggal'];
    $ket = $data['status'];
    $query = "INSERT INTO absensi VALUES(NULL, '$nis', '$tanggal', '$ket')";
    mysqli_query($link, $query);
    return mysqli_affected_rows($link);


}

function insert_admin($data){
    global $link;
    $username = strtolower(stripslashes($data["user"]));
    $password = mysqli_real_escape_string($link, $data["password"]);
    $password2 = mysqli_real_escape_string($link, $data["password2"]);
    $img = $data["gambar"];
    $nama = htmlspecialchars($data["nama"]);
    $umur = htmlspecialchars($data["umur"]);
    $result = mysqli_query($link, "SELECT user FROM admin_12 WHERE user = '$username'");
    if( mysqli_fetch_assoc($result) ){
        echo "<script>
        echo alert('dah ada akun nya');
        </script>";
        return false;
    }

    if( $password !== $password2 ){
        echo "<script>
        alert('salah password, tidak sesuai');
        </script>"; 
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);
    $img = upload();

    $query = "INSERT INTO admin_12
    VALUES
    (NULL, '$nama', '$username', '$password', '$umur', '$img')";
    mysqli_query($link, $query);
    return mysqli_affected_rows($link);
}

function upload(){
    $namafile = $_FILES['gambar']['name'];
    $ukuranfile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $loc = $_FILES['gambar']['tmp_name'];

    // cek apakah tidak ada gambar yang diupload
    if( $error === 4 ){
    echo "<script>
    alert('tidak ada gambar yang diupload!');
    </script>";
    return false;
    }

// yang diupload gambar atau bukan
    $ekstensivalid = ['jpg', 'jpeg', 'png', 'gif'];
    $ekstensigambar = explode('.', $namafile);
    $ekstensigambar = strtolower(end($ekstensigambar));
    if(!in_array($ekstensigambar, $ekstensivalid)){
        echo "<script>
        alert('input invalid');
        </script>";
        return false;
    }

    // cek size/limite
    if($ukuranfile > 9000000){
        echo "<script>
        alert('ukuran gambar terlalu besar!');
        </script>";
        return false;
    }   

    // uniqID
    $namafilebaru = uniqid();
    $namafilebaru .= '.';
    $namafilebaru .= $ekstensigambar;

    // gambar siap diupload ke dalam tmp 
    move_uploaded_file($loc, '../img/' . $namafilebaru);
    return $namafilebaru;

}

function field($data){
    global $link;
    $kelas = $data['kelas'];
    $jurusan = $data['jurusan'];

    $query = "SELECT * FROM siswa_12 WHERE kelas = '$kelas' AND jurusan = '$jurusan'";
    mysqli_query($link, $query);
    return mysqli_affected_rows($link);
}