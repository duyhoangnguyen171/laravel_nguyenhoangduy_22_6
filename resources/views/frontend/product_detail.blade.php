@extends('layouts.site')
@section('title','Detail')
@section('header')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Customized Bootstrap Stylesheet -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<!-- Template Stylesheet -->
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" />
@endsection
@section('content')
<div class="full-screen-container my-3 mx-3">
  <div class="container-product-detail">
    <div class="row detail">
      <div class="col-md-6 product-img">
        <img class="img-fluid w-60" src="{{ asset('img/products/'.$product->image)}}" alt="">
      </div>
      <div class="col-md-6 product-detail-info">
        <h3 class="mx-2">{{$product->name}}</h3>
        <div class="color-product">
          <button href="">trắng</button>
          <button href="">vàng</button>
          <button href="">đỏ</button>
        </div>
        <div class="price-product mx-2">
          <div class="row">
            @if($product->pricesale>0 &&$product->pricesale<$product->price)
              <div class="product-price col-md-6">Giá: {{number_format($product->pricesale)}} $
                <del>{{number_format($product->price)}} $</del>
              </div>
              <div class="col-md-6 ">50%</div>
              @else
              <div class="product-price col-12">Giá: {{number_format($product->price)}} $</div>
              @endif
          </div>
        </div>
        <div class="size-product">
          <button href="">40</button>
          <button href="">41</button>
          <button href="">42</button>
        </div>
        <div class="count-product mx-2">
          <input type="number" class="my-2" name="" id="qty" value="1" min="0" aria-describedby="basic-addon2">
          <button class="add " onclick="handleAddCart({{ $product->id }})"> add to cart</button>
        </div>
        <div class="description-product">
          <p>Mô tả:</p>
          <h3 class="fs-6">{{ $product->description}}</h3>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <h3>Chi tiết</h3>
        {!! $product->detail !!}
      </div>
    </div>
    <div class="row my-4">
      <div class="col-12">
        <nav>
          <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Sản phẩm liên quan</button>
            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Bình luận</button>
          </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
            <div class="row">
              @foreach($list_product as $productitem)
              <div class="col-md-3 mb-4 product">
                <x-product-card :$productitem />
              </div>
              @endforeach
            </div>
          </div>
          <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">Tích hợp Facebook</div>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection
@section('footer')
<script>
  function handleAddCart(productid) {
    let qty = document.getElementById("qty").value;
    $.ajax({
      url: "{{route('site.cart.addcart')}}",
      type: "GET",
      data: {
        productid: productid,
        qty: qty
      },
      success: function(result, status, xhr) {
        document.getElementById("showqty").innerHTML=result;
        alert("Thêm vào giỏ hàng thành công");
      },
      error: function(xhr, status, error) {
        alert(error);
      },
    })
  }
</script>
@endsection