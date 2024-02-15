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
                        <h5>DANH SÁCH LOẠI CÔNG TRÌNH</h5>
                        <a href="{{ route('admin.accounting.contruction.create') }}" class="btn btn-primary">Thêm loại công
                            trình</a>
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
    <script src="{{ asset('admin/js/accounting/contruction/index.js') }}"></script>
@endsection
