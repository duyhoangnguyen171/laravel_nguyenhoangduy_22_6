@extends('layouts.admin')
@section('title','Quản lý bài viết')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Quản lý bài viết</h1>
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
                    <a href="{{ route('admin.post.edit', $post->id)}}" class="btn btn-sm btn-primary">
                        <i class="far fa-edit"></i> Sửa
                    </a>
                    <a href="{{ route('admin.post.delete', $post->id)}}" class="btn btn-sm btn-danger">
                        <i class="fas fa-trash"></i> Xóa
                    </a>
                    <a class="btn btn-sm btn-info" href="{{ route('admin.post.index')}}">
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
                        <td>{{$post->id}}</td>
                    </tr>
                    <tr>
                        <td>Topic_id</td>
                        <td>{{$post->topic_id}}</td>
                    </tr>
                    <tr>
                        <td>Title</td>
                        <td>{{$post->title}}</td>
                    </tr>
                    <tr>
                        <td>Slug</td>
                        <td>{{$post->slug}}</td>
                    </tr>
                    <tr>
                        <td>Detail</td>
                        <td>{{$post->detail}}</td>
                    </tr>
                    <tr>
                        <td>image</td>
                        <td><img style="width:120px" src="{{ asset('img/posts/'.$post->image)}}" alt=""></td>
                    </tr>
                    <tr>
                        <td>Type</td>
                        <td>{{$post->type}}</td>
                    </tr>
                   
                    <tr>
                        <td>created_at</td>
                        <td>{{$post->created_at}}</td>
                    </tr>
                    <tr>
                        <td>created_by</td>
                        <td>{{$post->created_by}}</td>
                    </tr>
                    <tr>
                        <td>status</td>
                        <td>{{$post->status}}</td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection