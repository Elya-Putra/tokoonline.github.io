<?php

include 'koneksi.php';
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
  header('location:login.php');
};

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
<nav class="navbar navbar-expand-lg">
    <div class="container">
      <a class="navbar-brand" href="#">Arj 88 Store</a>
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
            <a class="nav-link" href="keranjang.php"><i class="fa-solid fa-cart-shopping"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link profil" href="update-profil.php">

            <?php
                $select = mysqli_query($conn, "SELECT * FROM `user` WHERE id = '$user_id'") or die('query failed');
                if(mysqli_num_rows($select) > 0){
                    $fetch = mysqli_fetch_assoc($select);
                }
                if($fetch['image'] == ''){
                    echo '<img src="img/profil.png">';
                }else{
                    echo '<img src="profil/'.$fetch['image'].'">';
                }
              ?>
            </a>
          </li>
        </ul>
        <form class="pencarian d-flex" role="search">
          <input class="form-control me-2" name="key" type="search" placeholder="Cari disini" aria-label="Search">
          <button class="btn" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
        <a href="keluar.php"><button class="btn">Keluar</button></a>
      </div>
    </div>
  </nav>

  <section class="intro">
    <div class="container">
      <div class="row intro-1">
        <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8">
          <h1>OUTFIT KEKINIAN</h1>
          <p>Kebutuhan pakaian dengan harga bersaing Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit
            earum impedit fugiat sint! Voluptates repellendus omnis, asperiores suscipit blanditiis nihil, eaque numquam
            fugit doloribus amet quis neque laboriosam dolorum laborum.</p>
          <a href="#content"><button class="btn">Pesan Sekarang</button></a>
        </div>
        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4">
          <img src="img/baju.png" alt="">
        </div>
      </div>
    </div>
  </section>

  <section class="content" id="content">

    <div class="bg-pilihan">
      <div class="container">
        <div class="row pilihan">
          <h1>KATEGORI</h1>
          <div class="col-2">
            <div class="box-produk">
              <a href="baju.php"><img src="img/baju.jpg" alt=""></a>
              <h3>Tshirt</h3>
            </div>
          </div>
          <div class="col-2">
            <div class="box-produk">
              <a href="hoodie.php"><img src="img/hoodie.jpg" alt=""></a>
              <h3>Hoodie</h3>
            </div>
          </div>
          <div class="col-2">
            <div class="box-produk">
              <a href="jaket.php"><img src="img/jaket.jpg" alt=""></a>
              <h3>Jaket</h3>
            </div>
          </div>
          <div class="col-2">
            <div class="box-produk">
              <a href="baju.html"><img src="img/celana.jpg" alt=""></a>
              <h3>Celana</h3>
            </div>
          </div>
          <div class="col-2">
            <div class="box-produk">
              <a href="baju.html"><img src="img/sepatu.jpg" alt=""></a>
              <h3>Sepatu</h3>
            </div>
          </div>
          <div class="col-2">
            <div class="box-produk">
              <a href="baju.html"><img src="img/tas.jpg" alt=""></a>
              <h3>Tas</h3>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row for-sale">
          <div class="col-10 kiri">
            <h1>FOR SALE</h1>
            <div class="waktu-mundur">
              <div id="hari" class="box"></div>
              <div id="jam" class="box"></div>
              <div id="menit" class="box"></div>
              <div id="detik" class="box"></div>
            </div>
          </div>
          <div class="col-2 kanan"><a href="lihat-semua.php">Lihat Semua>></a></div>
          <div class="sale">
          <div class="card-wrapper swiper-wrapper">
            <div class="card swiper-slide">
              <a href="lihat-semua.php"><img src="img/sale-1.jpg" alt=""></a>
              <h3>RP.119.900</h3>
              <p>44 TERJUAL</p>
            </div>
            <div class="card swiper-slide">
              <a href="lihat-semua.php#abc"><img src="img/sale-2.jpg" alt=""></a>
              <h3>RP.59.900</h3>
              <p>23 TERJUAL</p>
            </div>
            <div class="card swiper-slide">
              <a href="lihat-semua.php"><img src="img/sale-3.jpg" alt=""></a>
              <h3>RP.99.900</h3>
              <p>13 TERJUAL</p>
            </div>
            <div class="card swiper-slide">
              <a href="lihat-semua.php"><img src="img/sale-4.jpg" alt=""></a>
              <h3>RP.89.900</h3>
              <p>30 TERJUAL</p>
            </div>
          </div>
        </div>
      </div>
        </div>
      </div>
    </div>
    
    <div class="bg-model">
      <div class="container swiper">
        <h1>REAL MODEL</h1>
        <div class="slide-content">
          <div class="card-wrapper swiper-wrapper">
            <div class="card swiper-slide">
              <video controls>
                <source src="img/video-1.mp4" type="video/webm" />
              </video>
            </div>
            <div class="card swiper-slide">
              <video controls>
                <source src="img/video-2.mp4" type="video/webm" />
              </video>
            </div>
            <div class="card swiper-slide">
              <video controls>
                <source src="img/video-3.mp4" type="video/webm" />
              </video>
            </div>
            
          </div>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination custom-pagination"></div>
      </div>
    </div>
  </section>

  <section class="coment" id="coment">
    <div class="container">
      <div class="row masukan">
        <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-5 col-sm-5">
          <h1>Kritik<span> & </span>Saran</h1>
          <p>Komentar dan masukan yang kamu kasi sangat berguna bagi kami. Agar toko kami menjadi toko material bangunan
          </p>
        </div>
        <div class="col-xxl-7 col-xl-7 col-lg-7 col-md-7 col-sm-7">
          <div class="box-komentar">
          <?php
         $select = mysqli_query($conn, "SELECT * FROM `user` WHERE id = '$user_id'") or die('query failed');
         if(mysqli_num_rows($select) > 0){
            $fetch = mysqli_fetch_assoc($select);
         }
      ?>

      <form action="" method="post" enctype="multipart/form-data">
               <label>tanggal :</label>
               <input type="datetime-local" name="tanggal" placeholder="Masukan tanggal">
               <label>pesanan :</label>
               <input type="text" name="pesanan" placeholder="Tambahkan barang pesanan">
               <label>masukan :</label>
               <input type="text" name="masukan" placeholder="Beri masukan">
               <label>update your pic :</label>
               <input type="file" name="gambar" accept="image/jpg, image/jpeg, image/png" class="box">
         <div class="box-btn">
         <button class="btn" name="kirim">Kirim</button>
         </div>
      </form>
          </div>
        </div>
      </div>
    </div>
    
  </section>

  <?php

$user_id = $_SESSION['user_id'];

if(isset($_POST['kirim'])){

  $tanggal = mysqli_real_escape_string($conn, $_POST['tanggal']);
  $pesanan = mysqli_real_escape_string($conn, $_POST['pesanan']);
  $masukan = mysqli_real_escape_string($conn, $_POST['masukan']);
   $gambar = $_FILES['gambar']['name'];
   $gambar_size = $_FILES['gambar']['size'];
   $gambar_tmp_name = $_FILES['gambar']['tmp_name'];
   $gambar_folder = 'profil/'.$gambar;

   $tanggal = mysqli_query($conn, "UPDATE `user` SET tanggal = '$tanggal', pesanan = '$pesanan', masukan = '$masukan' WHERE id = '$user_id'") or die('query failed');

   echo "<script> alert ('berhasil tersimpan') </script>" ;

   if(!empty($gambar)){
      if($gambar_size > 2000000){
         echo "<script> alert ('gambar terlalu besar') </script>" ;
      }else{
         $image_update_query = mysqli_query($conn, "UPDATE `user` SET gambar = '$gambar' WHERE id = '$user_id'") or die('query failed');
         if($image_update_query){
            move_uploaded_file($gambar_tmp_name, $gambar_folder);
         }
         echo "<script> alert ('berhasil tersimpan') </script>" ;
      }
   }

}

?>

  <section class="komen">
    <div class="container">
      <div class="row komentar">
        <div class="box-komen">


          <div class="text-flex">
            <div class="profil">
          <?php
                $select = mysqli_query($conn, "SELECT * FROM `user` WHERE id = '$user_id'") or die('query failed');
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
            <h1>
            <?php echo $fetch['name']; ?>
            </h1>
            <h2>
            <?php echo $fetch['pesanan']; ?>
            </h2>

          </div>
          <img src="profil/<?php echo $fetch['gambar']; ?>" alt="">
          <p>
            <?php echo $fetch['masukan']; ?>
          </p>
          <h3>
            <?php echo $fetch['tanggal']; ?>
          </h3>
          
        </div>
      </div>
    </div>
  </section>



  <footer class="footer">
    <div class="container">
      <div class="row contact">
        <div class="col-xxl-4 col-xl-4 col-lg-4">
          <h1>Arj 88 store</h1>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora temporibus dolore sunt obcaecati soluta
            officia minima. Sunt eos dolores nobis.</p>
          <div class="medsos">
            <i class="fa-brands fa-instagram"></i>
            <i class="fa-brands fa-tiktok"></i>
            <i class="fa-brands fa-twitter"></i>
            <i class="fa-brands fa-youtube"></i>
            <i class="fa-brands fa-whatsapp"></i>
          </div>
        </div>
        <div class="col-xxl-2 col-xl-2 col-lg-2 kanan">
          <h2>About</h2>
          <p>About us</p>
          <p>Our Services</p>
          <p>Get Directions</p>
          <p>Review</p>
          <p>Contact Us</p>
        </div>
        <div class="col-xxl-3 col-xl-3 col-lg-3 kanan">
          <h2>Help Center</h2>
          <p>Support</p>
          <p>FAQs</p>
          <p>Guest Feedback</p>
          <p>Offers</p>
          <p>Privacy Policy</p>
        </div>
        <div class="col-xxl-3 col-xl-3 col-lg-3 kanan">
          <h2>Reach Us</h2>
          <p>Jl. Wr.Supratman gang 8, denpasar, bali, indonesia</p>
          <p>+62 851 0065 9999</p>
          <p>www.arj88store.com</p>
        </div>
      </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
    crossorigin="anonymous"></script>
  <script src="js/main.js"></script>
  <script src="js/swiper-bundle.min.js"></script>
  <script src="js/script.js"></script>
</body>

</html>