<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/layoutsite.css')}}">

    @yield('header')
</head>
<body>
    <header><div class="full-screen-container">
      <section class="header">
        <div class="row">
          <div class="col-6">
            <nav class="navbar navbar-expand-sm navbar-dark mt-2">
              <div class="container-fluid">
                <a class="navbar-brand" href="index.html#"><img src="img/logo.png" alt=""></a>
                <button
                  class="navbar-toggler"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#mynavbar"
                >
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="mynavbar">
                  <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                      <a class="nav-link" href="index.html#">Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="Contact.html#">Contact</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="javascript:void(0)">About</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="Product.html#">Shop</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="javascript:void(0)">Type</a>
                      <ul class="type-shoes">
                        <a href=""><li>Natural Grass Football Shoes</li></a>
                        <a href=""><li>Artificial Turf Football Shoes</li></a>
                      </ul>
                    </li>
                   
                  </ul>
                  
                </div>
              </div>
            </nav>
          </div>
          <div class="col-3 mt-4">
            <form class="search-form d-flex">
              <input
                class="form-control me-2 "
                type="text"
                placeholder="Search"
              />
              <button class=" search " type="button">
                <i class="fa-solid fa-magnifying-glass"></i>
              </button>
            </form>
          </div>
          <div class="col-3 mt-2">
            <div class="mx-5">
              <a class="">
                <i class="fas fa-user mt-3 btn btn-lg text-secondary"></i>
              </a>
              <a class="">
                <i
                  class="fa-solid fa-cart-shopping mt-3 btn btn-lg text-secondary"
                ></i>
              </a>
            </div>
          </div>
        </div>
      </section>
        <div class="full-screen-container">
          <div class="banner">
            <div class="mySlides">
              <img src="img/slider_1.webp" style="width: 100%" />
            </div>
    
            <div class="mySlides">
              <img src="img/slider_2.webp" style="width: 100%" />
            </div>
    
            <div class="mySlides">
              <img src="img/slider_2.webp" style="width: 100%" />
            </div>
    
            <div class="aaaa">
              <a class="prev m-3" onclick="plusSlides(-1)">❮</a>
              <a class="next m-3" onclick="plusSlides(1)">❯</a>
            </div>
    
            <div class="caption-container">
              <p id="caption"></p>
            </div>
    
            <script>
              let slideIndex = 1;
              showSlides(slideIndex);
    
              function plusSlides(n) {
                showSlides((slideIndex += n));
              }
    
              function currentSlide(n) {
                showSlides((slideIndex = n));
              }
    
              function showSlides(n) {
                let i;
                let slides = document.getElementsByClassName("mySlides");
                let dots = document.getElementsByClassName("demo");
                let captionText = document.getElementById("caption");
                if (n > slides.length) {
                  slideIndex = 1;
                }
                if (n < 1) {
                  slideIndex = slides.length;
                }
                for (i = 0; i < slides.length; i++) {
                  slides[i].style.display = "none";
                }
                for (i = 0; i < dots.length; i++) {
                  dots[i].className = dots[i].className.replace(" active", "");
                }
                slides[slideIndex - 1].style.display = "block";
                dots[slideIndex - 1].className += " active";
                captionText.innerHTML = dots[slideIndex - 1].alt;
              }
            </script>
          </div>
        </div>
        
    </div></header>
    <main>
        @yield('content')
    </main>
    <footer> <section class="footer pt-4">
      <div class="container">
        <div class="row">
          <div class="col-6">
            <h3 class="text-navy">Join the Club</h3>
            <p>Subscribe to our newsletter and get 10% off your first order.</p>
            <button class="subscribe-button">Subscribe</button>
            <div class="contact-net">
              <button><i class="fa-brands fa-facebook"></i></button>
              <button><i class="fa-brands fa-instagram"></i></button>
              <button><i class="fa-brands fa-twitter"></i></button>
            </div>
            <img class="mt-3" src="img/footer_logo.svg" alt="" />
            <div class="pay mt-5">
              <img src="img/apple.svg" alt="" />
              <img src="img/master.svg" alt="" />
              <img src="img/visa.svg" alt="" />
            </div>
          </div>
          <div class="col-2">
            <h6 class="text-navy">CUSTOMER SERVICE</h6>
            <ul>
              <a href=""><li>Contact Us</li></a>
              <a href=""><li>Shiping</li></a>
              <a href=""><li>Returns Policy</li></a>
              <a href=""><li>Size Guide</li></a>
              <a href=""><li>Privacy Policy</li></a>
            </ul>
            <div class="map">
              <a href="https://www.google.com/maps/place/Cao+%C4%90%E1%BA%B3ng+C%C3%B4ng+Th%C6%B0%C6%A1ng+TP.HCM/@10.8306858,106.7724241,17z/data=!3m1!4b1!4m6!3m5!1s0x31752701a34a5d5f:0x30056b2fdf668565!8m2!3d10.8306805!4d106.774999!16s%2Fm%2F0vb4j37?hl=vi-VN&entry=ttu">
                <img src="img/Screenshot 2024-05-13 101546.png" alt=""></a>
            </div>
          </div>
          <div class="col-2">
            <h6 class="text-navy mx-4">COMPANY</h6>
            <ul>
              <a href=""><li>About Us</li></a>
              <a href=""><li>Team Sales</li></a>
              <a href=""><li>Our Blog </li></a>
              <a href=""><li>Gift Cards</li></a>
              <a href=""><li>Privacy Policy</li></a>
              <a href=""><li>Affiliate Program</li></a>
            </ul>
          </div>
          <div class="col-2">
            <h6 class="text-navy">ADDRESS</h6>
            <p>82 N Los Robles Ave Pasadena, CA 91101</p>
            <h6>PHONE</h6>
            <a href="">(800) 688 - 8088</a>
            <h6>EMAIL</h6>
            <a href="">nhduy177171@gmail.com</a>
          </div>
        </div>
      </div>
    </section></footer>
    @yield("footer")
</body>
</html>