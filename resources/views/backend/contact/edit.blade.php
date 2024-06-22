
@extends('layouts.admin')
@section('title','Quản lý Liên hệ')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Quản lý Liên hệ</h1>
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
                    <a class="btn btn-sm btn-info" href="{{route('admin.contact.index')}}">
                        <i class="fas fa-arrow-left"></i> Về danh sách
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.contact.update',['id'=>$contact->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method("put")
                <div class="mb-3">
                    <label for="name">Họ tên</label>
                    <input type="text" value="{{ old('name',$contact->name) }}" name="name" id="name" class="form-control">
                    @error('name')
                    <span class="text-danger">{{ $message}}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="text" value="{{ old('name',$contact->email) }}" name="email" id="email" class="form-control">
                    @error('email')
                    <span class="text-danger">{{ $message}}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="title">Tiêu đề</label>
                    <input type="text" value="{{ old('name',$contact->title) }}" name="title" id="title" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="content">Content</label>
                    <input type="text" value="{{ old('name',$contact->content) }}" name="content" id="content" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="phone">Điện thoại</label>
                    <input type="text" value="{{ old('name',$contact->phone) }}" name="phone" id="phone" class="form-control">
                    @error('phone')
                    <span class="text-danger">{{ $message}}</span>
                    @enderror
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