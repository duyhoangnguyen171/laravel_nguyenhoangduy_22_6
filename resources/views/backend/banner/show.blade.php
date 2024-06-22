@extends('layouts.admin')
@section('title','Quản lý banner')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Quản lý Banner</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a>Home</a></li>
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
                    <a href="{{ route('admin.banner.edit', $banner->id)}}" class="btn btn-sm btn-primary">
                        <i class="far fa-edit"></i> Sửa
                    </a>
                    <a href="{{ route('admin.banner.delete', $banner->id)}}" class="btn btn-sm btn-danger">
                        <i class="fas fa-trash"></i> Xóa
                    </a>
                    <a class="btn btn-sm btn-info" href="{{ route('admin.banner.index')}}">
                        <i class="fa fa-arrow-left"></i> Về danh sách
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th class="text-center" style="width:30%;">
                            <strong>Tên trường</strong>
                        </th>
                        <th class="text-center" style="width:70%;">Giá trị</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>ID</td>
                        <td>{{$banner->id}}</td>
                    </tr>
                    <tr>
                        <td>name</td>
                        <td>{{$banner->name}}</td>
                    </tr>
                    <tr>
                        <td>Link</td>
                        <td>{{$banner->link}}</td>
                    </tr>
                    <tr>
                        <td>image</td>
                        <td><img style="width:120px" src="{{ asset('img/banners/'.$banner->image)}}" alt=""></td>
                    </tr>
                    <tr>
                        <td>Position</td>
                        <td>{{$banner->position}}</td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td>{{$banner->description}}</td>
                    </tr>
                    <tr>
                        <td>sort_order</td>
                        <td>{{$banner->sort_order}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection