@extends('layouts.site')
@section('title','Chi tiết bài đăng')
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
    <div class="container">
        <div class="row ">

            <div class="col-md-8 border border-0 ">
                <div class="container mt-5 ">
                    <div class="card border border-0 ">
                        <h1 class="card-title mb-4 text-success">{{ $post->title }}</h1>
                        <img class="img-fluid  d-100 " src="{{ asset('img/posts/' . $post->image) }}" alt="Ảnh bài đăng">
                        <div class="card-body">

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-5">

                <h2 class="text-start text-success bg-danger p-2 text-white bg-opacity-70">TIN TỨC MỚI NHẤT</h2>
                <div class="col-12">
                    @foreach ($post_new as $item)
                        <div class="card news-card mt-4">
                           
                            <div class="card-body">
                                <h5 class="card-title text-success">{{ $item->title }}</h5>
                                <p class="card-text">{{ $item->description }}
                                </p>
                                <a href="{{ route('site.post.detail', ['slug' => $item->slug]) }}" class="btn btn-dark "
                                    style="width: 100%; max-width: 120px;">Read
                                    More</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- News Article -->

            <!-- News Article -->

        </div>
        <div class="row">
            <div class="col-12">
              <h3>Chi tiết</h3>
              {!! $post->detail !!}
            </div>
          </div>
          <div class="row my-4">
            <div class="col-12">
              <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                  <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Bài đăng liên quan</button>
                  <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Bình luận</button>
                </div>
              </nav>
              <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                  <div class="row">
                    
                    @foreach($post_list as $postitem)
                    <div class="card news-card mt-3">
                        <div class="card-body">
                            <h5 class="card-title text-success">{{ $postitem->title }}</h5>
                            <p class="card-text">{{ $item->description }}
                            </p>
                            <a href="{{ route('site.post.detail', ['slug' => $postitem->slug]) }}" class="btn btn-dark "
                                style="width: 100%; max-width: 120px;">Read
                                More</a>
                        </div>
                    </div>
                    @endforeach
                  </div>
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">Tích hợp Facebook</div>
              </div>
            </div>
          </div>
    </div>
@endsection
