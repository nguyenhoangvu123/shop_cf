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
                        <h5>DANH SÁCH GÓI VẬT TƯ HOÀN THIỆN</h5>
                        <a href="{{ route('admin.accounting.attr.supplies.create') }}" class="btn btn-primary">Thêm gói vật tư hoàn thiện</a>
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
    <script src="{{ asset('admin/js/accounting/attr/supplies/index.js') }}"></script>
@endsection
