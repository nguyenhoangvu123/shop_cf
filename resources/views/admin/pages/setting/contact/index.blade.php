@extends('admin.layouts.master')
@section('afterCss')
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}" />
@endsection
@section('content')
    <div class="row mb-4">
        <div class="col-xl">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-baseline">
                    <h5>CẬP NHẬT CẤU HÌNH THÔNG TIN LIÊN HỆ</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-body">
                    <form id="settingContact">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Google map <span
                                    class="text-danger">(*)</span></label>
                            <input type="text" value="{{ $listSettingContact->value->address ?? '' }}" name="address"
                                class="form-control address" placeholder="Nhập google map" />
                        </div>
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Mô tả <span class="text-danger">(*)</span></label>
                            <textarea name="description" id="description" class="mb-3">{{ $listSettingContact->value->value ?? '' }}</textarea>
                            <label id="description-error" for="title"></label>
                        </div>
                        <div class="mb-3 mt-5">
                            <button type="button" onclick="contactSetting.save()"
                                class="btn btn-primary submit-lg">Lưu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('afterScript')
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/super-build/ckeditor.js"></script>
    <script src="{{ asset('admin/assets/js/ckeditor.js') }}"></script>
    <script src="{{ asset('admin/js/settings/contact/index.js') }}"></script>
@endsection
