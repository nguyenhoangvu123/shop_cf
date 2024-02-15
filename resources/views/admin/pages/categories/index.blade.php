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
                        <h5>DANH SÁCH DANH MỤC</h5>
                        <button type="button" onclick="category.showModalCreated()" class="btn btn-primary">Thêm danh
                            mục</button>
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
                                placeholder="Nhập tên danh mục" />
                        </div>
                        <div class="col-xl-3">
                            <div class="w-100">
                                <select class="select2 statusSearch">
                                    <option value=""></option>
                                    <option value="1">Hiển thị</option>
                                    <option value="0">Ẩn</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-xl-3">
                            <div class="w-100">
                                <select class="select2 positionShowSearch">
                                    <option value=""></option>
                                    <option value="menu">Menu</option>
                                    <option value="detail">Detail</option>
                                    <option value="footer">Footer</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-xl-3 d-flex justify-content-center aligns-item-center">
                            <button type="button" onclick="category.list()" class="btn btn-primary"
                                style="margin-right : 10px">Tìm
                                kiếm</button>
                            <button type="button" onclick="category.clearSearch()" class="btn btn-danger">Xoá</button>
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
        <div class="modal fade" id="createdCategory" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form id="createCategoryForm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel1">THÊM DANH MỤC</h5>
                            <button type="button"class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <div class="row">
                                <div class="col mb-3">
                                    <label for="nameBasic" class="form-label">Tên</label>
                                    <input type="text" name="name" class="form-control name"
                                        placeholder="Nhập tên danh mục" />
                                    <span class="nameUnique"></span>
                                </div>
                                <div class="mb-3">
                                    <div>
                                        <label for="emailBasic" class="form-label">Chọn danh mục cha</label>
                                    </div>
                                    <div class="w-100">
                                        <select class="select2 parent">
                                            <option value=""></option>
                                            @foreach ($listParentCategory as $item)
                                                <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div>
                                        <label for="emailBasic" class="form-label">Vị trí hiển thị</label>
                                    </div>
                                    <div class="w-100">
                                        <select class="select2 positionShow">
                                            <option value="menu">Menu</option>
                                            <option value="detail">Detail</option>
                                            <option value="footer">Footer</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div>
                                        <label for="emailBasic" class="form-label">Trạng thái</label>
                                    </div>
                                    <div class="w-100">
                                        <select class="select2 status">
                                            <option value="1">Hiển thị</option>
                                            <option value="0">Ẩn</option>
                                        </select>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                Đóng
                            </button>
                            <button type="button" onclick="category.save()" type="submit"
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
    <script src="{{ asset('admin/js/categories/index.js') }}"></script>
@endsection
