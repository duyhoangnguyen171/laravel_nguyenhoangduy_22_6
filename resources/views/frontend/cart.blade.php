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
  <h1 class="text-center mt-5 mb-5  text-success bg-danger p-2 text-white bg-opacity-70">GIỎ HÀNG CỦA TÔI</h1>
  <form action="{{ route('site.cart.update')}}" method="post">
    @csrf
    <table class="table table-bordered mb-5">
      <thead>
        <tr>
          <th>ID</th>
          <th style="width:90px">Hình</th>
          <th>Tên sản phẩm</th>
          <th>Số lương</th>
          <th>Giá</th>
          <th>Thành tiền</th>
          <th></th>
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
            <input type="number" style="width:60px" name="qty[{{$row_cart['id']}}]" value="{{$row_cart['qty']}}" min="0">
          </td>
          <td>{{number_format($row_cart['price'])}}</td>
          <td>{{ number_format($row_cart['price']*$row_cart['qty']) }}</td>
          <td class="text-center">
            <a href="{{ route('site.cart.delete',['id'=>$row_cart['id']])}}" class="btn btn-danger btn-sm"><i class="fa-solid fa-delete-left "></i></a></td>
        </tr>
        @php
        $totalMoney+=$row_cart['price']*$row_cart['qty'];
        @endphp
        @endforeach
      </tbody>
      <tfoot>
        <tr>
          <th colspan="4">
            <a class="btn btn-success mx-3" href="{{route('site.home')}}">Mua thêm</a>
            <button class="btn btn-info mx-3">Cập nhật</button>
            <a class="btn btn-warning mx-3" href="{{route('site.cart.checkout')}}">Thanh toán</a>
          </th>
          <th colspan="3" class="text-right">
            <strong>Tổng tiền: {{ number_format($totalMoney) }} </strong>
          </th>
        </tr>
      </tfoot>
    </table>
  </form>
</div>
@endsection


