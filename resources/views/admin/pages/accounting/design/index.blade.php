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
                        <h5>DANH SÁCH PHONG CÁCH THIẾT KẾ</h5>
                        <button type="button" onclick="design.showModalCreated()" class="btn btn-primary">Thêm phong cách
                            thiết kế</button>
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
        <div class="modal fade" id="createdDesign" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form id="createDesignForm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel1">THÊM PHONG CÁCH THIẾT KẾ</h5>
                            <button type="button"class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <div class="row">
                                <div class="col mb-3">
                                    <label for="nameBasic" class="form-label">Tên</label>
                                    <input type="text" name="name" class="form-control name"
                                        placeholder="Nhập tên phong cách thiết kế" />
                                    <span class="nameUnique"></span>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                Đóng
                            </button>
                            <button type="button" onclick="design.save()" type="submit"
                                class="btn btn-primary">Lưu</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div id="box-modal">
        </div>
    </div>
@endsection

@section('afterScript')
    <script src="{{ asset('admin/js/accounting/design/index.js') }}"></script>
@endsection
