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
                        <h5>DANH SÁCH ĐĂNG KÝ TƯ VẤN</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-xl">
                <div class="card overflow-hidden">
                    <div class="row pt-4 pb-4">
                        <div class="col-xl-3" style="padding-left:30px">
                            <input type="text" id="nameSearch" class="form-control"
                                placeholder="Nhập tên" />
                        </div>
                        <div class="col-xl-3">
                            <input type="text" id="emailSearch" class="form-control"
                                placeholder="Nhập email" />
                        </div>
                        <div class="col-xl-3">
                            <div class="w-100">
                                <select class="select2 statusSearch">
                                    <option value=""></option>
                                    <option value="0">Chưa tư vấn</option>
                                    <option value="1">Đã tư vấn</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-3 d-flex justify-content-center aligns-item-center">
                            <button type="button" onclick="advice.list()" class="btn btn-primary"
                                style="margin-right : 10px">Tìm
                                kiếm</button>
                            <button type="button" onclick="advice.clearSearch()" class="btn btn-danger">Xoá</button>
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
        <div id="box-modal">
        </div>
    </div>
@endsection

@section('afterScript')
    <script src="{{ asset('admin/js/advices/index.js') }}"></script>
@endsection
