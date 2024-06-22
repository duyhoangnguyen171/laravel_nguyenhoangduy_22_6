@extends('layouts.admin')
@section('title','Quản lý chủ đề')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Quản lý chủ đề</h1>
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
                    <a class="btn btn-sm btn-info" href="{{route('admin.topic.index')}}">
                        <i class="fas fa-arrow-left"></i> Về danh sách
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.topic.update',['id'=>$topic->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method("put")
                <div class="mb-3">
                    <label for="name">Tên chủ đề</label>
                    <input type="text" value="{{ old('name',$topic->name) }}" name="name" id="name" class="form-control">
                    @error('name')
                    <span class="text-danger">{{ $message}}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description">Mô tả</label>
                    <textarea name="description" id="description" class="form-control">{{ old('name',$topic->description) }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="parent_id">chủ đề cha</label>
                    <select name="parent_id" id="parent_id" class="form-control">
                        <option value="0">None</option>
                        {!! $htmlparentid !!}
                    </select>
                    @error('parent_id')
                    <span class="text-danger">{{ $message}}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="sort_order">Sắp xếp</label>
                    <select name="sort_order" id="sort_order" class="form-control">
                        <option value="0">None</option>
                        {!! $htmlsortorder !!}
                    </select>
                    @error('sort_order')
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
                    <button type="submit" name="create" class="btn btn-success">Cập nhật chủ đề</button>
                </div>
            </form>
        </div>
    </div>
</section>



@endsection