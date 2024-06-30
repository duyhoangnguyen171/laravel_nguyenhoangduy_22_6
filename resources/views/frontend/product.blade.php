@extends('layouts.site')
@section('title', 'Tất cả sản phẩm')

@section('header')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" />
@endsection
@section('content')
    <section class="container-fluid p-0">
        <div class="container-filter">
            <div class="row">
                <div class="col-8 title-product mt-3">
                    <i class="fa-solid fa-shoe-prints"></i>
                    <h2 class="">ICE cleats</h2>
                </div>
                <div class="col-4">
                  <div></div>
                  <div>
                      <form action="{{ route('products.index') }}" method="GET">
                          <ul>
                              <li class="nav-item dropdown">
                                  <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#"><i class="fa-solid fa-sort mx-2 mt-3"></i>SORT BY</a>
                                  <ul class="dropdown-menu">
                                      <li><a class="dropdown-item" href="{{ route('products.index', ['sort_by' => 'price_asc']) }}">Price: Low - High</a></li>
                                      <li><a class="dropdown-item" href="{{ route('products.index', ['sort_by' => 'price_desc']) }}">Price: High - Low</a></li>
                                      <li><a class="dropdown-item" href="{{ route('products.index', ['sort_by' => 'default']) }}">Default</a></li>
                                  </ul>
                              </li>
                          </ul>
                      </form>
                  </div>
              </div>
            </div>
        </div>
        <div class="container my-5">
            <section class="content">
                <div class="row">
                    @foreach ($list_product as $productitem)
                        <div class="col-md-4 product">
                            <x-product-card :$productitem />
                        </div>
                    @endforeach
                </div>
                <div class="row mt-5">
                    <div class="col-12 d-flex justify-content-center">
                        {{ $list_product->links() }}
                    </div>
                </div>
            </section>
        </div>
    </section>
@endsection
