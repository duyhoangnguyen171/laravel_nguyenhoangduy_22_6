@extends('layouts.admin')
@section('title','Quản lý Banner')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Quản lý Banner</h1>
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
                    <a class="btn btn-sm btn-danger" href="{{route('admin.banner.trash')}}">
                        <i class="fas fa-trash"> Thùng rác</i>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <form action="{{route ('admin.banner.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name">Tên banner</label>
                            <input type="text" value="" name="name" id="name" class="form-control">
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="link">Liên kết</label>
                            <input type="text" value="" name="link" id="link" class="form-control">
                            @error('link')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description">Mô tả</label>
                            <textarea name="description" id="description" class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="sort_order">Sắp xếp</label>
                            <select name="sort_order" id="sort_order" class="form-control">
                                <option value="0">None</option>
                                {!! $htmlsortorder !!}

                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="position">Vị trí</label>
                            <select name="position" id="position" class="form-control">
                                <option value="slideshow">slideshow</option>
                                <option value="banner">banner</option>
                            </select>


                        </div>
                        <div class="mb-3">
                            <label for="image">Hình</label>
                            <input type="file" name="image" id="image" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="status">Trạng thái</label>
                            <select name="status" id="status" class="form-control">
                                <option value="2">Chưa xuất bản</option>
                                <option value="1">Xuất bản</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="create" class="btn btn-success">Thêm banner</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-9">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center" style="width:40px" scope="col">#</th>
                                <th class="text-center" style="width:90px" scope="col">Hình</th>
                                <th scope="col">Tên Banner</th>
                                <th scope="col">Liên kết</th>
                                <th scope="col">vị trí</th>
                                <th class="text-center" style="width:190px" scope="col">Chức năng</th>
                                <th class="text-center" style="width:20px" scope="col">ID</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($list as $row)
                            <tr>
                                @php
                                $args = ['id' => $row->id];
                                @endphp
                                <td class="text-center">
                                    <input type="checkbox" name="checkId[]" id="checkId" value="1">
                                </td>
                                <td class="text-center">
                                    <img class="img-fluid" src="{{ asset('img/banners/'.$row->image) }}" alt="{{ $row->image }}">
                                </td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->link}}</td>
                                <td>{{$row->position}}</td>
                                <td class="text-center">
                                    @if($row->status==1)
                                    <a href="{{route ('admin.banner.status', $args)}}" class="btn btn-sm btn-success">
                                        <i class="fas fa-toggle-on"></i>
                                    </a>
                                    @else
                                    <a href="{{route ('admin.banner.status', $args)}}" class="btn btn-sm btn-danger">
                                        <i class="fas fa-toggle-off"></i>
                                    </a>
                                    @endif

                                    <a href="{{route ('admin.banner.show',  $args)}}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-eye"></i>
                                        <a href="{{route ('admin.banner.edit',$args)}}" class="btn btn-sm btn-info">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{route ('admin.banner.delete',$args)}}" class="btn btn-sm btn-danger">
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
        </div>
    </div>
</section>
@endsection