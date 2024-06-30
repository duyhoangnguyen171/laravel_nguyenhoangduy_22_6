<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">


    @yield('header')
</head>

<body>
    <div class="container-fluid p-0">
        <section class="header">
            <div class="row align-items-center">
                <div class="col-12 col-md-4 col-lg-2">
                    <nav class="navbar navbar-expand-lg navbar-dark mt-2">
                        <a class="navbar-brand" href="http://localhost/NguyenHoangDuy_CD1/public/">
                            <img src="{{ asset('img/logo2.jpg') }}" alt="" style="width: 200px; height: 100px;">
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#mynavbar" aria-controls="navbarDropdown" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                    </nav>
                </div>
                <div class="col-12 col-md-5 col-lg-6 mt-4 mt-md-0">
                    <form class="search-form d-flex justify-content-end">
                        <input class="form-control me-2" type="text" placeholder="Search" />
                        <button class="btn btn-outline-light" type="button">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </form>
                </div>
                <div class="col-12 col-md-4 col-lg-4 mt-2 mt-md-0">
                    <div class="d-flex align-items-center justify-content-end h-100 ">
                        <div class="d-flex align-items-center text-light">
                            @if (Auth::check())
                                @php
                                    $user = Auth::user();
                                @endphp
                                <div class="d-flex align-items-center">
                                    {{ $user->name }}
                                    <i class="fas fa-user btn btn-lg text-secondary ms-2"></i>
                                    <a href="{{ route('website.logout') }}" class="ms-2">Đăng xuất</a>
                                </div>
                            @else
                                <a href="{{ route('website.getlogin') }}">
                                    <i class="fas fa-user btn btn-lg text-secondary"></i>
                                </a>
                            @endif
                        </div>
                        <div class="d-flex align-items-center mx-3 mb-1">
                            <a class="nav-item position-relative" href="{{ route('site.cart.index') }}">
                                @php
                                    $count = count(session('carts', []));
                                @endphp
                                <i class="fa-solid fa-cart-shopping btn btn-lg text-secondary"></i>
                                <span id="showqty" class="text-warning"> ({{ $count }})</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <nav class="navbar navbar-expand-lg navbar-dark">
                        <div class="mx-auto">
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <x-main-menu />
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </section>
    </div>
    </header>

    <main>
        @yield('content')
    </main>
    <footer>
        <section class="footer pt-4 ">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-3 mb-4">
                        <h3 class=" text-warning">Join the Store</h3>
                        <p>Subscribe to our newsletter and get 10% off your first order.</p>
                        <button class="subscribe-button bg-success">Subscribe</button>
                        <div class="contact-net mt-3">
                            <button><i class="fa-brands fa-facebook text-danger"></i></button>
                            <button><i class="fa-brands fa-instagram text-danger"></i></button>
                        </div>
                        <div class="pay mt-4">
                            <img src="img/apple.svg" alt="" />
                            <img src="img/master.svg" alt="" />
                            <img src="img/visa.svg" alt="" />
                        </div>
                    </div>
                    <div class="col-6 col-md-3 col-lg-2 mb-4">
                        <h6 class="text-warning">CUSTOMER SERVICE</h6>
                        <ul >
                            <li><a class=" text-light" href="">Contact Us</a></li>
                            <li><a class=" text-light"href="">Shipping</a></li>
                            <li><a class=" text-light"href="">Returns Policy</a></li>
                            <li><a class=" text-light"href="">Size Guide</a></li>
                            <li><a class=" text-light"href="">Privacy Policy</a></li>
                        </ul>
                    </div>
                    <div class="col-6 col-md-3 col-lg-2 mb-4">
                        <h6 class="text-warning">COMPANY</h6>
                        <ul>
                            <li><a class=" text-light"href="">About Us</a></li>
                            <li><a class=" text-light"href="">Team Sales</a></li>
                            <li><a class=" text-light"href="">Our Blog</a></li>
                            <li><a class=" text-light"href="">Gift Cards</a></li>
                            <li><a class=" text-light"href="">Privacy Policy</a></li>
                            <li><a class=" text-light"href="">Affiliate Program</a></li>
                        </ul>
                    </div>
                    <div class="col-12 col-md-6 col-lg-2 mb-4">
                        <h6 class="text-warning">ADDRESS</h6>
                        <p>82 N Los Robles Ave Pasadena, CA 91101</p>
                        <h6>PHONE</h6>
                        <a href="">(800) 688 - 8088</a>
                        <h6>EMAIL</h6>
                        <a href="">nhduy177171@gmail.com</a>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <h6 class="text-warning">LOCATION</h6>
                        <div class="map">
                            <a href="https://www.google.com/maps/place/Cao+%C4%90%E1%BA%B3ng+C%C3%B4ng+Th%C6%B0%C6%A1ng+TP.HCM/@10.8306858,106.7724241,17z/data=!3m1!4b1!4m6!3m5!1s0x31752701a34a5d5f:0x30056b2fdf668565!8m2!3d10.8306805!4d106.774999!16s%2Fm%2F0vb4j37?hl=vi-VN&entry=ttu">
                                <img src="{{ asset('img/map.png') }}" alt="Map">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </footer>
    @yield('footer')
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
</body>

</html>
