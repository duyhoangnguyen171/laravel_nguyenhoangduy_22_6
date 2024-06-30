@extends('layouts.site')
@section('title','cart')
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
  <h1 class="text-center mt-3 text-success bg-danger p-2 text-white bg-opacity-70">THANH TOÁN</h1>
 <div class="row">
  <div class="col-md-9">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th style="width:90px">Hình</th>
            <th>Tên sản phẩm</th>
            <th>Số lương</th>
            <th>Giá</th>
            <th>Thành tiền</th>
          </tr>
        </thead>
        <tbody>
          @php
            $totalMoney=0;    
          @endphp
          @foreach ($list_cart as $row_cart)
          <tr>
            <td>{{$row_cart['id']}}</td>
            <td>
              <img src="{{asset('img/products/'.$row_cart['image']) }}" alt="{{$row_cart['image']}}" class="img-fluid">
            </td>
            <td>{{$row_cart['name']}}</td>
            <td>
              {{$row_cart['qty']}}
            </td>
            <td>{{number_format($row_cart['price'])}}</td>
            <td>{{ number_format($row_cart['price']*$row_cart['qty']) }}</td>
           
          </tr>
          @php
          $totalMoney+=$row_cart['price']*$row_cart['qty'];
          @endphp
          @endforeach
        </tbody>
        
      </table>
  </div>
  <div class="col-md-3">
    <strong class="text-dark">Tổng tiền: {{ number_format($totalMoney) }} </strong>
  </div>
 </div>
 
 @if (!Auth::check())
    <div class="row">
      <div class="col-12">
        <h3>Hãy đăng nhập để thanh toán</h3>
          <a href="{{route('website.getlogin')}}">Đăng nhập</a>
      </div>
    </div>  
 @else
   <form action="{{route('site.cart.docheckout')}}" method="post">
    @csrf
    <div class="row my-4">
      @php
          $user=Auth::user();
      @endphp
      <div class="col-md-6">
        <div class="mb-3">
          <label for="">Họ tên</label>
          <input type="text" name="name" id="" value="{{$user->name}}" class="form-control">
        </div>
     </div>

        <div class="col-md-6">
        <div class="mb-3">
          <label for="">Email</label>
          <input type="text" name="email" id="" value="{{$user->email}}" class="form-control">
        </div>
      </div>
      <div class="col-md-6">
        <div class="mb-3">
          <label for="">Điện thoại</label>
          <input type="text" name="phone" id="" value="{{$user->phone}}" class="form-control">
        </div>
      </div>
      <div class="col-md-6">
        <div class="mb-3">
          <label for="">Địa chỉ</label>
          <input type="text" name="address" id="" value="{{$user->address}}" class="form-control">
        </div>
      </div>
      <div class="col-md-12">
        <div class="mb-3">
          <label for="">Chú ý</label>
          <textarea name="note" class="form-control" id="" ></textarea>
        </div>
      </div>
      <div class="col-md-12 text-end">
        <button class="btn btn-warning" type="submit">Đặt mua</button>
      </div>
   </form>
 @endif
</div>
@endsection

