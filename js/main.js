//navbar
/*var btnContainer = document.getElementById("navbarNav");
var btns = btnContainer.getElementsByClassName("nav-link");

for (var i = 0; i < btns.length; i++){
  btns[i].addEventListener('click',function () {
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active");
    this.className += " active";
  })
}*/
let navbar = document.querySelector(".navbar-nav").querySelectorAll("a");
console.log(navbar);

navbar.forEach(element => {
  element.addEventListener("click", function(){
    navbar.forEach(nav=>nav.classList.remove("active"))

    this.classList.add("active");
  }) 

});

var countDownDate = new Date("November 22, 2022 13:00:00").getTime();

// Memperbarui hitungan mundur setiap 1 detik
var x = setInterval(function() {

  // Untuk mendapatkan tanggal dan waktu hari ini
  var now = new Date().getTime();
    
  // Temukan jarak antara sekarang dan tanggal hitung mundur
  var distance = countDownDate - now;
    
  // Perhitungan waktu untuk hari, jam, menit dan detik
  var hari = Math.floor(distance / (1000 * 60 * 60 * 24));
  var jam = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var menit = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var detik = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Keluarkan hasil dalam elemen dengan id = "demo"
  document.getElementById("hari").innerHTML = hari;
  document.getElementById("jam").innerHTML = jam;
  document.getElementById("menit").innerHTML = menit;
  document.getElementById("detik").innerHTML = detik;
    
  // Jika hitungan mundur selesai, tulis beberapa teks 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "00 00 00 00";
  }
}, 1000);

//like
let likeIcon = document.getElementById("suka");

        let clicke = false;


        likeIcon.addEventListener("click", () => {
            if (!clicke) {
                clicke = true;
                likeIcon.innerHTML = `<i class="fa-solid fa-heart"></i>`;
                likeIcon.style.color = "red";
            } else {
                clicke = false;
                likeIcon.innerHTML = `<i class="fa-regular fa-heart"></i>`;
                likeIcon.style.color = "black";
            }
        });


/*function suka(){
  const like = document.getElementById("like");
  like.style.color = "red";
}*/

//slide
var swiper = new Swiper(".slide-content", {
  slidesPerView: 3,
  spaceBetween: 25,
  loop: true,
  centerSlide: 'true',
  fade: 'true',
  grabCursor: 'true',
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
    dynamicBullets: true,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },

  breakpoints:{
      0: {
          slidesPerView: 1,
      },
      520: {
          slidesPerView: 2,
      },
      950: {
          slidesPerView: 3,
      }
  }

});

/*bintang
let star1 = document.getElementById("star1");

        let click = false;


        star1.addEventListener("click", () => {
            if (!click) {
                click = true;
                star1.innerHTML = `<i class="fa-solid fa-bookmark"></i>`;
                star1.style.color = "black";
            } else {
                click = false;
                star1.innerHTML = `<i class="fa-regular fa-bookmark"></i>`;
                star1.style.color = "black";
            }
        });*/


var swiper = new Swiper(".slide-content", {
  slidesPerView: 3,
  spaceBetween: 25,
  loop: true,
  centerSlide: 'true',
  fade: 'true',
  grabCursor: 'true',
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
    dynamicBullets: true,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },

  breakpoints:{
      0: {
          slidesPerView: 1,
      },
      520: {
          slidesPerView: 2,
      },
      950: {
          slidesPerView: 3,
      }
  }

});