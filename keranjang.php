<?php
session_start();
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
  
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>

<body>
  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <a href="index.php"><i class="fa-solid fa-arrow-left"></i> Home</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
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
            <a class="nav-link" href="keranjang.php"><i class="fa-solid fa-cart-shopping"></i></a>
          </li>
        </ul>
        <form class="pencarian d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Cari disini" aria-label="Search">
          <button class="btn" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
      </div>
    </div>
  </nav>   
<div class="container">
<?php
if (isset($_GET['kode_produk']) && isset($_GET['jumlah'])) {
    $kode_produk=$_GET['kode_produk'];
    $jumlah=$_GET['jumlah'];
    include 'koneksi.php';
    $sql= "select * from tb_keranjang where kode_produk='$kode_produk'";
    $query = mysqli_query($conn,$sql);
    $data = mysqli_fetch_array($query);
    $kode_produk=$data['kode_produk'];
    $nama_produk=$data['nama'];
    $harga=$data['harga'];
    $stok=$data['stok'];
    $gambar=$data['gambar'];
}else {
    $kode_produk="";
    $jumlah=0;
}

if (isset($_GET['aksi'])) {
    $aksi=$_GET['aksi'];
}else {
    $aksi="";
}

switch($aksi){	
    case "tambah_produk":
    $itemArray = array($kode_produk=>array('kode_produk'=>$kode_produk,'nama_produk'=>$nama_produk,'jumlah'=>$jumlah,'harga'=>$harga,'stok'=>$stok,'gambar'=>$gambar));
    if(!empty($_SESSION["keranjang_belanja"])) {
        if(in_array($data['kode_produk'],array_keys($_SESSION["keranjang_belanja"]))) {
            foreach($_SESSION["keranjang_belanja"] as $k => $v) {
                if($data['kode_produk'] == $k) {
                    $_SESSION["keranjang_belanja"] = array_merge($_SESSION["keranjang_belanja"],$itemArray);
                }
            }
        } else {
            $_SESSION["keranjang_belanja"] = array_merge($_SESSION["keranjang_belanja"],$itemArray);
        }
    } else {
        $_SESSION["keranjang_belanja"] = $itemArray;
    }
    break;
    //Fungsi untuk menghapus item dalam cart
    case "hapus":

        if(!empty($_SESSION["keranjang_belanja"])) {
            foreach($_SESSION["keranjang_belanja"] as $k => $v) {
                    if($_GET["kode_produk"] == $k)
                        unset($_SESSION["keranjang_belanja"][$k]);
                    if(empty($_SESSION["keranjang_belanja"]))
                        unset($_SESSION["keranjang_belanja"]);
            }
        }
    break;

    case "update":
        $itemArray = array($kode_produk=>array('kode_produk'=>$kode_produk,'nama_produk'=>$nama_produk,'jumlah'=>$jumlah,'harga'=>$harga,'stok'=>$stok,'gambar'=>$gambar));
        if(!empty($_SESSION["keranjang_belanja"])) {
            foreach($_SESSION["keranjang_belanja"] as $k => $v) {
                if($_GET["kode_produk"] == $k)
                $_SESSION["keranjang_belanja"] = array_merge($_SESSION["keranjang_belanja"],$itemArray);
            }
        }
    break;
}
?>
<div class="row keranjang">
    <h1>Keranjang</h1>
        <?php
            $no=0;
            $sub_total=0;
            $total=0;
            $total_berat=0;
            if(!empty($_SESSION["keranjang_belanja"])):
            foreach ($_SESSION["keranjang_belanja"] as $item):
                $no++;
                $sub_total = $item["jumlah"]*$item['harga'];
                $total+=$sub_total;
        ?>
        
        <div class="col-12 box-cart">
        <div class="d-flex">
                <h4><?php echo $no; ?></h4>
                <img src="img/<?php echo $item["gambar"]; ?>">
                <div class="flex">
                <h2><?php echo $item["nama_produk"]; ?></h2>
                <h3>Harga <span>Rp. <?php echo number_format($item["harga"],0,',','.');?></span> </h3>
                <div class="d-flex">
                <label for="">Kuantitas</label>
                <input type="number" class="jumlah" min="1" value="<?php echo $item["jumlah"]; ?>" class="form-control" id="jumlah<?php echo $no; ?>" name="jumlah[]" >
                <p>Tersisa <?php echo $item["stok"]; ?> buah</p>
                </div>
                <script>
                    $("#jumlah<?php echo $no; ?>").bind('change', function () {
                        var jumlah<?php echo $no; ?>=$("#jumlah<?php echo $no; ?>").val();
                        $("#jumlaha<?php echo $no; ?>").val(jumlah<?php echo $no; ?>);
                    });
                    $("#jumlah<?php echo $no; ?>").keydown(function(event) { 
                        return false;
                    });
                    
                </script>
                <h3>Rp. <?php echo number_format($sub_total,0,',','.');?> </h3>

                    <form method="get">
                        <input type="hidden" name="kode_produk"  value="<?php echo $item['kode_produk']; ?>" class="form-control">
                        <input type="hidden" name="aksi"  value="update" class="form-control">
                        <input type="hidden" name="halaman"  value="keranjang-belanja" class="form-control">
                        <input type="hidden" name="jumlah" value="<?php echo $item["jumlah"]; ?>" id="jumlaha<?php echo $no; ?>" value="" class="form-control">
                        <button type="submit" class="btn btn-warning btn-xs">Update</button>
                    <a href="keranjang.php?halaman=keranjang-belanja&kode_produk=<?php echo $item['kode_produk']; ?>&aksi=hapus" role="button"><i class="fa-solid fa-trash"></i></a>
                    
                    </form>
                </div>
                </div>

</div>

        <?php 
            endforeach;
            endif;
        ?>
    <h3>Total Pembayaran Rp. <?php echo number_format($total,0,',','.');?> </h3>
        <a href="beli-sekarang.php"><button>Beli Sekarang</button></a>
      </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
    crossorigin="anonymous"></script>
  <script src="js/main.js"></script>
</body>

</html>

