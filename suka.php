<?php

include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/de8de52639.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<style>
    @import url("https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&display=swap");
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
body {
  background: #e8efff;
  display: flex;
  align-items: center;
  justify-content: center;
  width: 100%;
  height: 100vh;
}

.like__btn {
  padding: 10px 15px;
  background: #0080ff;
  font-size: 18px;
  font-family: "Open Sans", sans-serif;
  border-radius: 5px;
  color: #e8efff;
  outline: none;
  border: none;
  cursor: pointer;
}

</style>
<body>
<form action="" method="POST">
     <button class="like__btn" name="suka" value="1">
        <span id="icon"><i class="far fa-thumbs-up"></i></span>
        <span id="count">0</span> Like
     </button>
</form>
     <?php
      if(isset($_POST['suka'])){

        $suka = addslashes($_POST['suka']);

        $cek = mysqli_query($conn, "SELECT suka FROM suka WHERE suka='". $suka ."' ");

        if(mysqli_num_rows($cek)>0){
          echo "<script>alert('Nama sudah digunakan, silahkan masukan Nama Lain')</script>";
        }else{

          $simpan	= mysqli_query($conn, "INSERT INTO suka (suka) VALUES ('".$suka."')");

          if($simpan){
                    echo "<script>alert('Berhasil Disimpan')</script>";
          }else {
                    echo "<script>alert('Gagal Simpan')</script>";
          }
        }

      }
    ?>
     <script>
        const likeBtn = document.querySelector(".like__btn");
let likeIcon = document.querySelector("#icon"),
  count = document.querySelector("#count");

let clicked = false;


likeBtn.addEventListener("click", () => {
  if (!clicked) {
    clicked = true;
    likeIcon.innerHTML = `<i class="fas fa-thumbs-up"></i>`;
    count.textContent++;
  } else {
    clicked = false;
    likeIcon.innerHTML = `<i class="far fa-thumbs-up"></i>`;
    count.textContent--;
  }
});

     </script>
</body>
</html>