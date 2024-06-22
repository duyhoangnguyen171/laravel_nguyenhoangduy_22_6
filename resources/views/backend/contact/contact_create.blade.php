@extends('layouts.admin')
@section('title','Quản lý liên hệ')
@section('content')
<form action="#" method="post" enctype="multipart/form-data">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Thêm liên hệ</h1>
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
                                <button type="submit" name="create" class="btn btn-sm btn-success">
                                    <i class="fa fa-save"></i> Lưu
                                </button>
                                <a class="btn btn-sm btn-info" href="product_index.html">
                                    <i class="fa fa-arrow-left"></i> Về danh sách
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name">Họ tên</label>
                                    <input type="text" value="" name="name" id="name" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="phone">Điện thoại</label>
                                    <input type="text" value="" name="phone" id="phone" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="email">Email</label>
                                    <input type="text" value="" name="email" id="email" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="title">Tiêu đề</label>
                                    <input type="text" value="" name="title" id="title" class="form-control">
                                </div>
                               
                            </div>
                            <div class="col-md-6">
                            <div class="mb-3">
                                    <label for="content">Content</label>
                                    <input type="text" value="" name="content" id="content" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="replay_id">Replay ID</label>
                                    <input type="number" value="" name="replay_id" id="replay_id" class="form-control">
                                </div>
                                <div class="mb-3">
                                        <label for="status">Trạng thái</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="2">Chưa xuất bản</option>
                                            <option value="1">Xuất bản</option>
                                        </select>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </form>
@endsection