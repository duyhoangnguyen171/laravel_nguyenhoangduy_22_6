@extends('layouts.site')
@section('title','San Pham')
@section('content')
    <div class="full-screen-container">
      
      <h1 class="text-center title-product ">Product ALL</h1>
      <div class="container-filter">
        <div class="row">
            <div class="col-8 title-product">
                <i class="fa-solid fa-shoe-prints"></i>
                <h2>soccer cleats</h2>
            </div>
            <div class="col-4">
                <div></div>
                <div>
                    <ul>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#"><i class="fa-solid fa-sort mx-2"></i>Sort By</a>
                            
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="#">A -> Z</a></li>
                              <li><a class="dropdown-item" href="#">Z -> A</a></li>
                              <li><a class="dropdown-item" href="#">Price: Hight - Low</a></li>
                              <li><a class="dropdown-item" href="#">Price: Low - Height</a></li>
                            </ul>
                          </li>
                    </ul>
                </div>
            </div>
        </div>
      </div>
      <div class="container">
      <section class="content">
        <div class="row">
          <div class="col-md-4 product">
            <a href="Product_detail.html"><img src="img/item_product/20230817_hTUI4Zvic7.jpeg" alt="Product 1" /></a>

            <div class="product-name">Product Name 1</div>
            <div class="product-price">$10</div>
            <button class="buy-button">Buy Now</button>
            <button class="like-button">
              <i class="fa-regular fa-heart"></i>
            </button>
          </div>
          <div class="col-md-4 product">
            <a href="Product_detail.html"><img src="img/item_product/20230817_hTUI4Zvic7.jpeg" alt="Product 2" /></a>

            <div class="product-name">Product Name 2</div>
            <div class="product-price">$15</div>
            <button class="buy-button">Buy Now</button>
          </div>
          <div class="col-md-4 product">
            <a href="Product_detail.html"><img src="img/item_product/20230817_hTUI4Zvic7.jpeg" alt="Product 3" /></a>

            <div class="product-name">Product Name 2</div>
            <div class="product-price">$15</div>
            <button class="buy-button">Buy Now</button>
          </div>
          <div class="col-md-4 product">
            <a href="Product_detail.html"><img src="img/item_product/20230817_hTUI4Zvic7.jpeg" alt="Product 4" /></a>

            <div class="product-name">Product Name 2</div>
            <div class="product-price">$15</div>
            <button class="buy-button">Buy Now</button>
          </div>
          <div class="col-md-4 product">
            <a href="Product_detail.html"><img src="img/item_product/20230817_hTUI4Zvic7.jpeg" alt="Product 5" /></a>

            <div class="product-name">Product Name 2</div>
            <div class="product-price">$15</div>
            <button class="buy-button">Buy Now</button>
          </div>
          <div class="col-md-4 product">
            <a href="product_detail.html"><img src="img/item_product/20230817_hTUI4Zvic7.jpeg" alt="Product 6" /></a>

            <div class="product-name">Product Name 3</div>
            <div class="product-price">$15</div>
            <button class="buy-button">Buy Now</button>
          </div>
        </div>
        <div class="text-center">
          <button class="view-all">Xem tất cả</button>
        </div>
      </section>
    </div>
     
    </div>
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
