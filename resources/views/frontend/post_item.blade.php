@extends('layouts.site')
@section('title', 'Tin tức')
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

    <div class="container mt-4">
        <div class="row ">
            <div class="col-md-8">
                <h1 class="bg-danger p-2 text-white bg-opacity-70 text-center">TẤT CẢ TIN TỨC</h1>
                @foreach ($list_post as $item)
                    <div class="card news-card my-2">
                        <div class="row">
                            <div class="col-md-4">
                                <img class="img-fluid m-3" style="width: 100%; max-width: 200px;"
                                    src="{{ asset('img/posts/' . $item->image) }}" alt="Ảnh bài đăng">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title text-success">{{ $item->title }}</h5>
                                    <p class="card-text">{{ $item->description }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="text-start m-2">
                            <a href="{{ route('site.post.detail', ['slug' => $item->slug]) }}" class="btn btn-dark"
                                style="width: 100%; max-width: 120px;">Đọc thêm</a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-md-4 ">
                <h2 class="text-start bg-danger p-2 text-white bg-opacity-70 mb-3 ">TIN TỨC MỚI NHẤT</h2>
                @foreach ($post_new as $item)
                    <div class="card news-card mt-2">
                        <div class="card-body ">
                            <h5 class="card-title text-success">{{ $item->title }}</h5>
                            <p class="card-text">{{ $item->description }}</p>
                            <a href="{{ route('site.post.detail', ['slug' => $item->slug]) }}" class="btn btn-dark"
                                style="width: 100%; max-width: 120px;">Đọc thêm</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12 d-flex justify-content-center">
                {{ $list_post->links() }}
            </div>
        </div>
    </div>
@endsection


