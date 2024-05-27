@extends('layouts.site')
@section('title','Trang Chu')
@section('content')
   
    <div class="container">
      <section class="content">
        <h1 class="text-center">Sản Phẩm Mới</h1>
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
            <a href="Product_detail.html"><img src="img/item_product/20230817_hTUI4Zvic7.jpeg" alt="Product 6" /></a>

            <div class="product-name">Product Name 2</div>
            <div class="product-price">$15</div>
            <button class="buy-button">Buy Now</button>
          </div>
        </div>
        <div class="text-center">
          <button class="view-all">Xem tất cả</button>
        </div>
      </section>
    </div>
    <div class="full-screen-container">
      <section class="poster-product">
        <div class="background-image-div">
          <div class="item-poster">
            <div class="item-poster1">
              <img src="img/item_product/20230817_hTUI4Zvic7.jpeg" alt="Item 1" />
              <button class="view-button">Xem</button>
            </div>
            <div class="item-poster2">
              <h4 class="">sản phẩm mới nhất</h4>
              <img src="img/item_product/20230817_hTUI4Zvic7.jpeg" alt="Item 2" />
              <button class="buy-product-poster">Buy Now</button>
            </div>
          </div>
        </div>
        <div class="info-CT text-center mt-5">
          <h3 >Members Also Get</h3>
          <div class="row info-about mt-3">
            <div class="col-4">
              <img
                class="img-ship"
                src="img/Icon_awesome-shipping-fast.svg "
                alt=""
              />
              <h6 class="">FREE VNA SHIPPING</h6>
              <p>Members score free delivery on every $50+ order.</p>
            </div>
            <div class="col-4">
              <img class="img-ship" src="img/done.svg " alt="" />
              <h6 class="">ALWAYS OFFICIAL</h6>
              <p>We offer only 100% licensed products.</p>
            </div>
            <div class="col-4">
              <img class="img-ship" src="img/contact.svg " alt="" />
              <h6 class="">ALWAYS READY TO HELP</h6>
              <p>Have a question? Contact us.</p>
            </div>
          </div>
        </div>
      </section>
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
