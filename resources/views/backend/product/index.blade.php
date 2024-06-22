@extends('layouts.admin')
@section('title','Quản lý sản phẩm')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Quản lý sản phẩm</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Blank Page</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-12 text-right">
                    <a class="btn btn-sm btn-success" href="{{ route('admin.product.create')}}">
                        <i class="fas fa-plus"> Thêm</i>
                    </a>
                    <a class="btn btn-sm btn-danger" href="{{route('admin.product.trash')}}">
                        <i class="fas fa-trash"> Thùng rác</i>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center" style="width:40px" scope="col">#</th>
                        <th class="text-center" style="width:90px" scope="col">Hình</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Danh mục</th>
                        <th scope="col">Thương hiệu</th>
                        <th class="text-center" style="width:190px" scope="col">Chức năng</th>
                        <th class="text-center" style="width:20px" scope="col">ID</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($list as $row)
                    <tr>
                        @php
                        $args=['id'=>$row->id]
                        @endphp
                        <td class="text-center">
                            <input type="checkbox" name="checkId[]" id="checkId" value="1">
                        </td>
                        <td class="text-center">
                            <img class="img-fluid" src="{{ asset('img/products/'.$row->image)}}" alt="{{$row->image}}">
                        </td>
                        <td>{{$row->productname}}</td>
                        <td>{{$row->productname}}</td>
                        <td>{{$row->brandname}}</td>
                        <td class="text-center">
                            @if($row->status==1)
                            <a href="{{route ('admin.product.status', $args)}}" class="btn btn-sm btn-success">
                                <i class="fas fa-toggle-on"></i>
                            </a>
                            @else
                            <a href="{{route ('admin.product.status', $args)}}" class="btn btn-sm btn-danger">
                                <i class="fas fa-toggle-off"></i>
                            </a>
                            @endif

                            <a href="{{route ('admin.product.show', $args)}}" class="btn btn-sm btn-warning">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{route ('admin.product.edit', $args)}}" class="btn btn-sm btn-info">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="{{route ('admin.product.delete', $args)}}" class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                        <td class="text-center">{{$row->id}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection