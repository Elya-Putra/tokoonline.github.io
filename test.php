<?php
session_start();
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
      </button>
    </div>
    <div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li><a href="index.php"><strong><span class="glyphicon glyphicon-th-large"></span> Produk</strong></a></li>
          <li><a href="keranjang-belanja.php"><strong><span class="glyphicon glyphicon-shopping-cart"></span> Keranjang Belanja</strong> </a></li>
        
        </ul>

      </div>
    </div>
  </div>
</nav>    
<div class="container" style="margin-top:80px;">
<div class="row">
    <?php   
    include 'koneksi.php';
    $sql="SELECT * FROM keranjang order by id_produk desc";
    $hasil=mysqli_query($conn,$sql);
    $jumlah = mysqli_num_rows($hasil);
    if ($jumlah>0){
        while ($data = mysqli_fetch_array($hasil)):
    ?>
        <div class="col-sm-3">
            <div class="thumbnail">
                <a href="#"><img src="img/<?php echo $data['gambar'];?>" width="100%" alt="Cinque Terre"></a>
                <div class="caption">
                    <h3><?php echo $data['nama'];?></h3>
                    <h4>Rp. <?php echo number_format($data['harga'],2,',','.'); ?> </h4>
                    <p><a href="keranjang-belanja.php?halaman=keranjang-belanja&kode_produk=<?php echo $data['kode_produk'];?>&aksi=tambah_produk&jumlah=1" class="btn btn-primary btn-block" role="button">Masukan Keranjang</a></p>
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
</div>
<div class="b">
 <div class="navbar navbar-default navbar-fixed-bottom">
    <div class="container">
     <p class="navbar-text pull-left">© 2021 - Source Code By 
        <a href="https://www.kelasprogrammer.com">Kelasprogrammer.com</a>
      </p>
    </div>
  </div>
</div>