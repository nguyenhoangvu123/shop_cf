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
                        <h5>DANH SÁCH BÌNH LUẬN</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-xl">
                <div class="card overflow-hidden">
                    <div class="row pt-4 pb-4" style="padding-left:30px">
                        <div class="col-xl-3">
                            <div class="w-100">
                                <select class="select2 status">
                                    <option value=""></option>
                                    <option value="1">Đã trả lời</option>
                                    <option value="0">Chưa trả lời</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-3 d-flex justify-content-center aligns-item-center">
                            <button type="button" onclick="comments.list()" class="btn btn-primary"
                                style="margin-right : 10px">Tìm
                                kiếm</button>
                            <button type="button" onclick="comments.clearSearch()" class="btn btn-danger">Xoá</button>
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
    <script src="{{ asset('admin/js/comments/index.js') }}"></script>
@endsection
