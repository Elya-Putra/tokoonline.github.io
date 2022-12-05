<?php

include 'koneksi.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, ($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, ($_POST['cpassword']));
   $image = $_FILES['image']['name'];
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'profil/'.$image;

   $select = mysqli_query($conn, "SELECT * FROM `user` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $message[] = 'pengguna sudah ada'; 
   }else{
      if($pass != $cpass){
         $message[] = 'password tidak sesuai!';
      }elseif($image_size > 2000000){
         $message[] = 'ukuran gambar terlalu besar!';
      }else{
         $insert = mysqli_query($conn, "INSERT INTO `user`(name, email, password, image) VALUES('$name', '$email', '$pass', '$image')") or die('query failed');

         if($insert){
            move_uploaded_file($image_tmp_name, $image_folder);
            $message[] = 'registrasi berhasil';
            header('location:login.php');
         }else{
            $message[] = 'registrasi gagal';
         }
      }
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
   <div class="row box-register">
      <form action="" method="post" enctype="multipart/form-data">
         <h3>register now</h3>
         <?php
         if(isset($message)){
            foreach($message as $message){
               echo '<div class="message">'.$message.'</div>';
            }
         }
         ?>
         <input type="text" name="name" placeholder="enter username" class="box" required>
         <input type="email" name="email" placeholder="enter email" class="box" required>
         <input type="password" name="password" placeholder="enter password" class="box" required>
         <input type="password" name="cpassword" placeholder="confirm password" class="box" required>
         <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png">
         <button class="btn" name="submit">Register</button>
         <p>Sudah punya akun? <a href="login.php">login</a></p>
      </form>
   </div>
</div>

</body>
</html>