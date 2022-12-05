<?php

include 'koneksi.php';
session_start();

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, ($_POST['password']));

   $select = mysqli_query($conn, "SELECT * FROM `user` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $row = mysqli_fetch_assoc($select);
      $_SESSION['user_id'] = $row['id'];
      header('location:index.php');
   }else{
      echo '<script> alert("Email atau password salah") </script>';
   }

}

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="scss/style.css">
  <link rel="stylesheet" href="scss/swiper-bundle.min.css">
  <script src="https://kit.fontawesome.com/de8de52639.js" crossorigin="anonymous"></script>
</head>

<body>
   
<div class="container">
   <div class="row box-login">
      <form action="" method="post" enctype="multipart/form-data">
         <h3>Login</h3>
         <input type="email" name="email" placeholder="masukan email" class="box" required>
         <input type="password" name="password" placeholder="masukan password" class="box" required>
         <button class="btn" name="submit">Login</button>
         <p>belum punya akun? <a href="register.php">regiser</a></p>
      </form>
   </div>
</div>

</body>
</html>