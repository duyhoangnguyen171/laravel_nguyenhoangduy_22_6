@extends('layouts.site')
@section('title','Giới thiệu')
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
<section class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <h1 class="mb-4">Lịch sử của chúng tôi</h1>
            <p>Cửa hàng chúng tôi đã có một lịch sử lâu đời trong lĩnh vực bán giày bóng đá, chuyên phân phối các sản phẩm từ các thương hiệu hàng đầu như Nike và Adidas.</p>
            <p>Bắt đầu từ những năm 2000, chúng tôi đã cam kết mang đến cho khách hàng những sản phẩm chất lượng nhất.</p>
        </div>
        <div class="col-md-6">
            <img src="{{ asset('img/posts/store.jpg') }}" class="img-fluid rounded" alt="Cửa hàng bóng đá">
        </div>
    </div>
</section>


@endsection
