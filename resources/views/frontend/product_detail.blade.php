@extends('layouts.site')
@section('title','Detail')
@section('content')
<div class="full-screen-container">
      <section class="header">
        <div class="row">
          <div class="col-6">
            <nav class="navbar navbar-expand-sm navbar-dark mt-2">
              <div class="container-fluid">
                <a class="navbar-brand" href="index.html#"><img src="./image/logo.png" alt=""></a>
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
      <h1 class="text-center title-product ">prodcut detail</h1>
      <div class="container-product-detail">
        <div class="row detail">
            <div class="col-8 product-img">
                <img class="img-fluid" src="./image/item_product/20230817_hTUI4Zvic7.jpeg" alt="">
            </div>
            <div class="col-4 product-detail-info">
                <h3 class="mx-2">Product Name</h3>
                <div class="color-product">
                    <button href="">trắng</button>
                    <button href="">vàng</button>
                    <button href="">đỏ</button>
                </div>
                <div class="price-product mx-2">
                    Price: 500$
                </div>
                <div class="size-product">
                    <button href="">40</button>
                    <button href="">41</button>
                    <button href="">42</button>
                </div>
                <div class="count-product mx-2">
                    <input type="number" name="" id=""  placeholder="1">
                    <button class="add"> add to cart</button>
                </div>
                <div class="description-product">
                    <p>Adidas Copa Pure 2 Elite KT FG - Energy Citrus Pack (SP24)

                        Finessed to improve control in every aspect of your game, the COPA is designed for connection. So next time, they won't be asking ''how's your touch?'' but ''how did you do that?'' </p>
                </div>
            </div>
        </div>
      </div>
      <section class="footer pt-4">
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
              <img class="mt-3" src="./image/footer_logo.svg" alt="" />
              <div class="pay mt-5">
                <img src="./image/apple.svg" alt="" />
                <img src="./image/master.svg" alt="" />
                <img src="./image/visa.svg" alt="" />
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
                  <img src="./image/Screenshot 2024-05-13 101546.png" alt=""></a>
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
      </section>
    </div>
    @endsection

    @endsection
@section('header')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
<link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
      rel="stylesheet"
    />
@endsection
