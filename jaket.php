<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="scss/style.css">
  <script src="https://kit.fontawesome.com/de8de52639.js" crossorigin="anonymous"></script>
</head>

<body>
  <nav class="navbar-lihat-semua">
    <div class="container">
      <div class="navbarNav" id="navbarNav">
        <ul>
          <li>
            <a class="kembali" href="index.php"><i class="fa-solid fa-arrow-left"></i></a>
          </li>
          <li>
            <a href="" class="active">Semua</a>
          </li>
          <li>
            <a href="#abc">Segera Habis</a>
          </li>
          <li>
            <a href="">Diskon</a>
          </li>
          <li>
            <a href="">Voucer Ongkir</a>
          </li>
          <li>
            <form class="pencarian d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Cari disini" aria-label="Search">
              <button class="btn" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <section class="isi">
    <div class="container">

      <div class="row sale-lihat-semua">
      <?php   
    include 'koneksi.php';
    $sql="SELECT * FROM tb_jaket order by id_produk desc";
    $hasil=mysqli_query($conn,$sql);
    $jumlah = mysqli_num_rows($hasil);
    if ($jumlah>0){
        while ($data = mysqli_fetch_array($hasil)):
    ?>
        <div class="col-3">
          <div class="sale">
            <div class="box-sale">
              <img src="img/<?php echo $data['gambar'];?>" width="100%" alt="Cinque Terre">
              <h2>
                <?php echo $data['nama'];?>
              </h2>
              <h3>Rp.
                <?php echo number_format($data['harga'],2,',','.'); ?>
              </h3>
              <p>
                <?php echo $data['stok'];?> Tersisa
              </p>
              <a
                href="keranjang.php?halaman=keranjang-belanja&kode_produk=<?php echo $data['kode_produk'];?>&aksi=tambah_produk&jumlah=1"><i
                  class="fa-solid fa-cart-shopping"></i></a>
                <a href="keranjang.php?halaman=keranjang-belanja&kode_produk=<?php echo $data['kode_produk'];?>&aksi=tambah_produk&jumlah=1"><button id="simpan"><i class="fa-regular fa-bookmark"></i></button></a>
              <button class="btn">Beli</button>
            </div>
          </div>
        </div>
      <?php 
        endwhile;
    }else {
        echo "<div class='alert alert-warning'> Tidak ada produk pada kategori ini.</div>";
    };
    ?>
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
            <a href="https://wa.me/6287866048426"><i class="fa-brands fa-whatsapp"></i></a>

          </div>
        </div>
        <div class="col-xxl-2 col-xl-2 col-lg-2">
          <h2>About</h2>
          <p>About us</p>
          <p>Our Services</p>
          <p>Get Directions</p>
          <p>Review</p>
          <p>Contact Us</p>
        </div>
        <div class="col-xxl-3 col-xl-3 col-lg-3">
          <h2>Help Center</h2>
          <p>Support</p>
          <p>FAQs</p>
          <p>Guest Feedback</p>
          <p>Offers</p>
          <p>Privacy Policy</p>
        </div>
        <div class="col-xxl-3 col-xl-3 col-lg-3">
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
</body>

</html>