<?php
session_start();
require 'function.php';
if(isset($_POST['login'])){
    global $link;
    $user = $_POST['user'];
    $password = $_POST['password'];
    $result = mysqli_query($link, "SELECT * FROM admin_12 WHERE user = '$user'");
    if(mysqli_num_rows($result) === 1){
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row['password'])){
            $_SESSION['id'] = $row['id_admin'];
            $_SESSION['login'] = true;
            header("Location: admin1.php");
            exit;

        }else{
         echo "<script>
        alert('salah password');
         </script>";
         return false;
        }
    }else{
        echo "<script>
        alert('salah username');
        </script>";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&family=Questrial&family=Quicksand:wght@400;700&family=Roboto:ital,wght@0,400;0,500;0,700;1,500&family=Tilt+Neon&display=swap" rel="stylesheet">
    <title>Hello, world!</title>
    <style>
        .form-signin{
            width: 100%;
            height: 100vh;
            align-items: center;
        }
        .form-control{
            width: 300px;
            margin-top: 10px;    
        }

        button{
            margin-top: 20px;
        }
    </style>        
  </head>
  <body>
  <main class="form-signin d-flex justify-content-center">
  <form action="" method="post" enctype="multipart/form-data" class="text-center">
    <img class="mb-4" src="../img/logo.png" alt="" width="72">
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

    <div class="form-floating">
      <input type="text" name="user" class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">User</label>
    </div>
    <div class="form-floating">
      <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>
    </div>
    <button class="w-100 btn btn-lg btn-primary" name="login" type="submit">Sign in</button>
    <p class="mt-5 mb-3 text-muted">©cino 2017–2021</p>
  </form>
</main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>