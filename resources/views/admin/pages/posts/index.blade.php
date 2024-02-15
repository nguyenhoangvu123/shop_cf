@extends('admin.layouts.master')
@section('afterCss')
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}" />
@endsection
@section('content')
<div>
    <div class="row mb-4">
        <div class="col-xl">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-baseline">
                    <h5>DANH SÁCH BÀI VIẾT</h5>
                    <a href="{{ route('admin.post.create') }}" class="btn btn-primary">Thêm bài viết</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-xl">
            <div class="card overflow-hidden">
                <div class="row pt-4 pb-4">
                    <div class="col-xl-3" style="padding-left:30px">
                        <input type="text" name="title" class="form-control title"
                            placeholder="Nhập tên tiêu đề bài viết" />
                        <span class="nameUnique"></span>
                    </div>
                    <div class="col-xl-3">
                        <div class="w-100">
                            <select class="select2 category">
                                <option value=""></option>
                                @foreach ($listCategory as $item)
                                    <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-3">
                        <div class="w-100">
                            <select class="select2 status">
                                <option value=""></option>
                                <option value="1">Hiển thị</option>
                                <option value="0">Ẩn</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-3 d-flex justify-content-center aligns-item-center">
                        <button type="button" onclick="post.list()" class="btn btn-primary" style="margin-right : 10px">Tìm
                            kiếm</button>
                        <button type="button" onclick="post.clearSearch()" class="btn btn-danger">Xoá</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl">
            <div class="card">
                <div class="table-responsive text-nowrap">

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('afterScript')
    <script src="{{ asset('admin/js/posts/index.js') }}"></script>
@endsection
