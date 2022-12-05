<?php

include 'koneksi.php';
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>
<body>

<nav class="navbar navbar-expand-lg">
    <div class="container">
      <a class="navbar-brand" href="#">Diamond 88</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#content">Product</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#coment">Coment</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Disimpan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="keranjang.php"><i class="fa-solid fa-cart-shopping"></i></a>
          </li>
        </ul>
        <form class="pencarian d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Cari disini" aria-label="Search">
          <button class="btn" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
        <div class="profile">
      <?php
         $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
         if(mysqli_num_rows($select) > 0){
            $fetch = mysqli_fetch_assoc($select);
         }
         if($fetch['image'] == ''){
            echo '<img src="img/profil.png">';
         }else{
            echo '<img src="profil/'.$fetch['image'].'">';
         }
      ?>
   </div>
      </div>
    </div>
  </nav>
   
<div class="container">

   

</div>

</body>
</html>