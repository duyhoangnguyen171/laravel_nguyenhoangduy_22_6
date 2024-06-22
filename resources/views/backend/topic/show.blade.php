@extends('layouts.admin')
@section('title','Quản lý chủ đề')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Quản lý danh mục</h1>
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
                    <a href="{{ route('admin.topic.edit', $topic->id)}}" class="btn btn-sm btn-primary">
                        <i class="far fa-edit"></i> Sửa
                    </a>
                    <a href="{{ route('admin.topic.delete', $topic->id)}}" class="btn btn-sm btn-danger">
                        <i class="fas fa-trash"></i> Xóa
                    </a>
                    <a class="btn btn-sm btn-info" href="{{ route('admin.topic.index')}}">
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
                        <td>{{$topic->id}}</td>
                    </tr>
                    <tr>
                        <td>name</td>
                        <td>{{$topic->name}}</td>
                    </tr>
                    <tr>
                        <td>slug</td>
                        <td>{{$topic->slug}}</td>
                    </tr>
                    
                    
                    <tr>
                        <td>sort_order</td>
                        <td>{{$topic->sort_order}}</td>
                    </tr>
                    <tr>
                        <td>description</td>
                        <td>{{$topic->description}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection