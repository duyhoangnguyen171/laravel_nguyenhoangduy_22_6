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
                    <a class="btn btn-sm btn-info" href="{{route('admin.post.index')}}">
                        <i class="fas fa-arrow-left"></i> Về danh sách
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.post.update',['id'=>$post->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method("put")
                <div class="mb-3">
                    <label for="title">Tiêu đề bài viết</label>
                    <input type="text" value="{{ old('name',$post->title) }}" name="title" id="title" class="form-control">
                    @error('title')
                    <span class="text-danger">{{ $message}}</span>
                    @enderror
                </div>
                <div class="mb-3">
                <label for="topicname">Chủ đề</label>
                    <input type="text" value="{{ old('name',$post->topicname) }}" name="topicname" id="topicname" class="form-control">
                    @error('title')
                    <span class="text-danger">{{ $message}}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="type">Kiểu</label>
                    <select name="type" id="type" class="form-control">
                        <option value="page">Page</option>
                        <option value="post">Post</option>
                    </select>
                    @error('type')
                    <span class="text-danger">{{ $message}}</span>
                    @enderror
                </div>
             
                <div class="mb-3">
                    <label for="image">Hình</label>
                    <input type="file" name="image" id="image" class="form-control" value="{{ old('name',$post->image) }}">
                </div>
                <div class="mb-3">
                    <label for="status">Trạng thái</label>
                    <select name="status" id="status" class="form-control">
                        <option value="2">Chưa xuất bản</option>
                        <option value="1">Xuất bản</option>
                    </select>
                </div>
                <div class="mb-3">
                    <button type="submit" name="create" class="btn btn-success">Cập nhật danh mục</button>
                </div>
            </form>
        </div>
    </div>
</section>



@endsection