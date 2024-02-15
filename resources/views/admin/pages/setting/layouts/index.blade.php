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
                        <h5>DANH SÁCH GIAO DIỆN TRANG CHỦ</h5>
                        <button type="button" onclick="settingLayout.sort()" class="btn btn-warning">Cập nhật vị trí</button>
                        <a href="{{ route('admin.setting.layout.create') }}" type="button"  class="btn btn-primary">Thêm giao diện
                        </a>

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
    <script src="{{ asset('admin/js/settings/layout/index.js') }}"></script>
    <script>
        
    </script>
@endsection
