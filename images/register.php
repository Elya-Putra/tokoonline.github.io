<?php 
 
 include 'koneksi.php';
 session_start();
  
 if (!isset($_SESSION['username'])) {
 }
 
 
 ?>
 
 <!doctype html>
 <html lang="en">
   <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Bootstrap demo</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
     <link rel="stylesheet" href="scss/style.css">
   </head>
   <body>
     <section class="login">
         <div class="container-fluid">
             <div class="row daftar">
                 <button class="btn"></button>
                 <h1>Daftar</h1>
                 <form action="" method="POST" enctype="multipart/form-data">
                 <label for="">Username</label>
                 <input type="text" name="nama" placeholder="Masukan nama anda">
                 <label for="">Email</label>
                 <input type="email" name="email" placeholder="kamu@contoh.com">
                 <label for="">Password</label>
                 <input type="text" name="password" placeholder="Masukan 8 karakter atau lebih">
                 <label for="">Ulangi Password</label>
                 <input type="text" name="cpassword" placeholder="Ulangi password anda">
                 <label for="">Profile</label>
                 <input class="foto" name="profile" type="file">
                 <div class="btn">
                 <a href=""><button class="btn" name="kirim">DAFTAR</button></a>
</div>
                 <p>Sudah punya akun? <a href="index.php">login</a></p>
                 </from>
                 </div>
 
                 <!--<h2>Atau</h2>
 
                 <div class="facebook">
                     <img src="img/facebook.png" alt="">
                     <h3>MASUK DENGAN FACEBOOK</h3>
                 </div>
                 <div class="google">
                     <img src="img/google.png" alt="">
                     <h3>MASUK DENGAN GOOGLE</h3>
                 </div>-->
             </div>
         </div>
     </section>
 
     <?php
     if(isset($_POST['kirim'])){
       $nama = $_POST['nama'];
       $email = $_POST['email'];
       $profile = $_FILES['profile']['name'];
       $source = $_FILES['profile']['tmp_name'];
       $folder = './profile/';
       $password = ($_POST['password']);
       $cpassword = ($_POST['cpassword']);
 
       move_uploaded_file($source, $folder.$profile);
 
       if ($password == $cpassword) {
         $sql = "SELECT * FROM tb_login WHERE email='$email'";
         $result = mysqli_query($conn, $sql);
         if (!$result->num_rows > 0) {
             $sql = "INSERT INTO tb_login (nama, email, profile, password)
                     VALUES ('$nama', '$email', '$profile', '$password')";
             $result = mysqli_query($conn, $sql);
             if ($result) {
                 echo "<script>alert('Selamat, registrasi berhasil!')</script>";
                 $nama = "";
                 $email = "";
                 $profile = "";
                 $_POST['password'] = "";
                 $_POST['cpassword'] = "";
             } else {
                 echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
             }
         } else {
             echo "<script>alert('Woops! Email Sudah Terdaftar.')</script>";
         }
          
     } else {
         echo "<script>alert('Password Tidak Sesuai')</script>";
     }
 }
  
 ?>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
   </body>
 </html>