@extends('layouts.admin')
@section('title','Quản lý Thành viên')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Quản lý Thành viên</h1>
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
                        <i class="fas fa-arrow-left"></i> Về danh sách
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.user.update',['id'=>$user->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method("put")\
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="name">Họ tên</label>
                            <input type="text" value="{{ old('name',$user->name) }}" name="name" id="name" class="form-control">
                            @error('name')
                            <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="phone">Điện thoại</label>
                            <input type="text" value="{{ old('name',$user->phone) }}" name="phone" id="phone" class="form-control">
                            @error('phone')
                            <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="text" value="{{ old('name',$user->email) }}" name="email" id="email" class="form-control">
                            @error('email')
                            <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="gender">Giới tính</label>
                            
                            <select name="gender" id="gender" class="form-control">
                                <option value="1">Nam</option>
                                <option value="0">Nữ</option>
                                {{ old('name',$user->gender) }}
                            </select>
                            {{ old('gender') }}
                            @error('gender')
                            <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="address">Địa chỉ</label>
                            <input type="text" value="{{ old('name',$user->address) }}" name="address" id="address" class="form-control">
                            @error('address')
                            <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="password">Mật khẩu</label>
                            <input type="password" value="{{ old('name',$user->password)}}" name="password" id="password" class="form-control">
                            @error('password')
                            <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="roles">Quyền</label>
                            <select name="roles" id="roles" class="form-control">
                                <option value="customer">Khách hàng</option>
                                <option value="admin">Quản lý</option>
                                {{ old('name',$user->roles)}}
                            </select>
                            {{ old('roles') }}
                            @error('roles')
                            <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="status">Trạng thái</label>
                            <select name="status" id="status" class="form-control">
                                <option value="2">Chưa xuất bản</option>
                                <option value="1">Xuất bản</option>
                                {{ old('name',$user->status)}}
                            </select>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <button type="submit" name="create" class="btn btn-success">Cập nhật danh mục</button>
                </div>
            </form>
        </div>
    </div>
</section>



@endsection