@extends('layouts.admin')
@section('title','Quản lý Thành viên')
@section('content')
<section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Thùng rác Thành viên</h1>
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
                    <a class="btn btn-sm btn-info" href="{{route('admin.user.index')}}">
                        <i class="fa fa-arrow-left"></i> Về danh sách
                    </a>
                </div>
            </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                            <th class="text-center" style="width:40px" scope="col">#</th>
                        <th class="text-center" style="width:90px" scope="col">Hình</th>
                        <th scope="col">Tên đăng nhập</th>
                        <th scope="col">Họ tên</th>
                        <th scope="col">Email</th>
                        <th scope="col">Điện thoại</th>
                        <th scope="col">Role</th>
                        <th class="text-center" style="width:200px" scope="col">Chức năng</th>
                        <th class="text-center" style="width:20px" scope="col">ID</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($list as $row)
                            <tr>
                                @php
                                    $args=['id'=>$row->id];
                                @endphp
                                <td class="text-center">
                            <input type="checkbox" name="checkId[]" id="checkId" value="1">
                        </td>
                        <td class="text-center">
                            <img class="img-fluid" src="{{ asset('img/users/'.$row->image) }}" alt="{{ $row->image }}">
                        </td>
                        <td>{{$row->name}}</td>
                        <td>{{$row->username}}</td>
                        <td>{{$row->email}}</td>
                        <td>{{$row->phone}}</td>
                        <td>{{$row->roles}}</td>
                        
                                <td style="display:ruby-text" class="text-center">
                                    
                                    <a href="{{ route('admin.user.show',$args) }}" class="btn btn-sm btn-info">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.user.restore',$args) }}" class="btn btn-sm btn-primary">
                                        <i class="fas fa-undo"></i>
                                    </a>
                                    <form action="{{ route('admin.user.destroy',$args) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-sm btn-danger" type="submit">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                                <td class="text-center">
                                    {{ $row->id }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

@endsection