@extends('admin.layouts.master')
@section('afterCss')
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/floor.css') }}" />
@endsection
@section('content')
    <div class="row mb-4">
        <div class="col-xl">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-baseline">
                    <h5>CẬP NHẬT GÓI THI CÔNG THÔ VÀ NHÂN CÔNG</h5>
                    <a href="{{ route('admin.accounting.attr.supplies') }}" class="btn btn-warning">Trở về</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">   
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-body">
                    <form id="updateContruction">
                        <div class="col mb-3">
                            <label for="nameBasic"  class="form-label">Tên<span class="text-danger">(*)</span></label>
                            <input type="text"  value="{{ $contruction->attr_master_name }}" name="title" class="form-control title" placeholder="Nhập tiêu đề" />
                            <span class="nameUnique"></span>
                        </div>
                        <div class="col mb-3">
                            <label for="nameBasic"  class="form-label">Giá trị<span class="text-danger">(*)</span></label>
                            <input type="text" value="{{ $contruction->attr_master_value }}" name="value" class="form-control value  col-4"
                                placeholder="Nhập giá trị (vnd)" />
                        </div>
                        <div class="mb-3 mt-5">
                            <button type="button" onclick="supplies.update('{{ $contruction->id }}')"
                                class="btn btn-primary submit-lg">Lưu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('afterScript')
    <script src="{{ asset('admin/js/accounting/attr/supplies/index.js') }}"></script>
@endsection
