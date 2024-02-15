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
                    <h5>TẠO TẦNG</h5>
                    <a href="{{ route('admin.accounting.floor') }}" class="btn btn-warning">Trở về</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-body">
                    <form id="createFloor">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Tên tầng<span class="text-danger">(*)</span></label>
                            <input type="text" name="title" class="form-control title" placeholder="Nhập tiêu đề" />
                            <span class="nameUnique"></span>
                        </div>
                        <div class="mb-3">
                            <div>
                                <label for="type" class="form-label">Loại<span class="text-danger">(*)</span></label>
                            </div>
                            <div class="w-100 d-flex flex-column-reverse">
                                <select id="type" name="type" class="select2 type">
                                    <option value="1">Mặc định</option>
                                    <option value="2">Bình thường</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div>
                                <label for="type" class="form-label">Thuộc tính<span
                                        class="text-danger">(*)</span></label>
                            </div>
                            <div class="w-100 d-flex flex-column-reverse">

                            </div>
                        </div>
                        <div class="list-item_attr_floor">
                            <button class="btn btn-danger" onclick="floor.addAttr()" id="btn_add_attr_floor">Thêm thuộc tính</button>
                        </div>
                        <div class="mb-3 mt-5">
                            <button type="button" onclick="floor.save()" class="btn btn-primary submit-lg">Lưu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('afterScript')
    <script src="{{ asset('admin/js/accounting/floor/index.js') }}"></script>
    <script type="text/template" id="templ_item-attr-floor">
        <div class="item_attr d-flex">
            <div class="col-4">
                <input type="text" name="title_attr" class="form-control "
                    placeholder="Nhập tên" />
            </div>
            <div class="col-2">
                <input type="text" name="value_desgin" class="form-control  col-4"
                    placeholder="Nhập giá trị thiết kế" />
            </div>
            <div class="col-2">
                <input type="text" name="value_expense" class="form-control  col-4"
                    placeholder="Nhập giá trị thi công" />
            </div>
            <div class="col-2 remove_item_attr">
               <span onclick="floor.removeItemAttr(this)" >X</span>
            </div>
        </div>
      </script>
@endsection
