@extends('layouts.site')
@section('title',$row?$row->name:'Tất cả sản phẩm')

@section('header')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Customized Bootstrap Stylesheet -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<!-- Template Stylesheet -->
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" />
@endsection
@section('content')
<section class="full-screen-container mt-3">
  <h1 class="text-center title-product bg-danger p-2 text-white bg-opacity-70">{{ $row? $row->name : 'No Category Found'}}</h1>
  <div class="container-filter">
    <div class="row">
      <div class="col-8 title-product">
        <i class="fa-solid fa-shoe-prints"></i>
        <h2>soccer cleats</h2>
      </div>
      <div class="col-4">
        <div></div>
        <div>
            <form action="{{ route('products.category', ['slug' => $row->slug]) }}" method="get">
                <ul>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#"><i class="fa-solid fa-sort mx-2"></i>Sort By</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('products.category', ['slug' => $row->slug, 'sort_by' => 'price_asc']) }}">Price: Low - High</a></li>
                            <li><a class="dropdown-item" href="{{ route('products.category', ['slug' => $row->slug, 'sort_by' => 'price_desc']) }}">Price: High - Low</a></li>
                            <li><a class="dropdown-item" href="{{ route('products.category', ['slug' => $row->slug, 'sort_by' => 'default']) }}">Default</a></li>
                        </ul>
                    </li>
                </ul>
            </form>
        </div>
    </div>
    </div>
  </div>
  <div class="container">
    <section class="content">
      <div class="row">
        @foreach($list_product as $productitem)
        <div class="col-md-4 product">
          <x-product-card :$productitem />
        </div>
        @endforeach
      </div>
      <div class="row mt-5">
        <div class="col-12 d-flex justify-content-center">
          {{$list_product->links()}}
        </div>
      </div>
    </section>
  </div>
</section>
@endsection
