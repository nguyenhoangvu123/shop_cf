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
                    <h5>CẬP LOẠI CÔNG TRÌNH</h5>
                    <a href="{{ route('admin.accounting.contruction') }}" class="btn btn-warning">Trở về</a>
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
                            <label for="nameBasic" class="form-label">Tên công trình<span
                                    class="text-danger">(*)</span></label>
                            <input type="text" name="title" value="{{ $contruction->contruction_name }}"
                                class="form-control title" placeholder="Nhập tiêu đề" />
                            <span class="nameUnique"></span>
                        </div>
                        <div class="list-item_category">
                            <button class="btn btn-danger" onclick="contruction.addCategory()" id="btn_add_attr_floor">Thêm
                                hạng
                                mục</button>
                            @foreach ($contruction->categories as $category)
                                <div class="item_attr d-flex align-items-center">
                                    <div class="col-2">
                                        <input type="text" value="{{ $category->name }}" name="title_category"
                                            class="form-control " placeholder="Nhập tên" />
                                    </div>
                                    <div class="col-2">
                                        <select name="type" class="select2 listCategory">
                                            @foreach ($listStyleDesign as $item)
                                                <option {{ $item->id == $category->id_desgin ? 'selected' : '' }}
                                                    value="{{ $item->id }}">{{ $item->design_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-2">
                                        <select name="type" multiple class="select2 listFloor">
                                            @foreach ($floor as $item)
                                                <option
                                                    {{ is_array($category->id_floor_attrs) && in_array($item->id, $category->id_floor_attrs) ? 'selected' : '' }}
                                                    value="{{ $item->id }}">{{ $item->floor_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-2">
                                        <input type="text" name="value_category" value="{{ $category->price }}"
                                            class="form-control  col-4" placeholder="Nhập giá trị (vnd)" />
                                    </div>
                                    <div class="col-2">
                                        <select name="type" class="select2 isDefault">
                                            <option {{ $category->is_default == 0 ? 'selected' : '' }} value="0">Hiển
                                                thị mặc định</option>
                                            <option {{ $category->is_default == 1 ? 'selected' : '' }} value="1">Không
                                                hiển thị mặc định</option>
                                        </select>
                                    </div>
                                    <div class="col-2 remove_item_category">
                                        <span onclick="contruction.removeItemCategory(this)">X</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="mb-3 mt-5">
                            <button type="button" onclick="contruction.update('{{ $contruction->id }}')"
                                class="btn btn-primary submit-lg">Lưu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('afterScript')
    <script src="{{ asset('admin/js/accounting/contruction/index.js') }}"></script>
    <script type="text/template" id="templ_item-category">
        <div class="item_attr d-flex">
            <div class="col-2">
                <input type="text" name="title_category" class="form-control "
                    placeholder="Nhập tên" />
            </div>
            <div class="col-2">
                <select name="type" class="select2 listCategory">
                    @foreach($listStyleDesign as $item)
                    <option value="{{ $item->id }}">{{ $item->design_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-2">
                <select name="type" multiple class="select2 listFloor">
                    @foreach ($floor as $item)
                        <option
                            value="{{ $item->id }}">{{ $item->floor_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-2">
                <input type="text" name="value_category" class="form-control  col-4"
                    placeholder="Nhập giá trị (vnd)" />
            </div>
            <div class="col-2">
                <select name="type" class="select2 isDefault">
                    <option value="0">Hiển thị mặc định</option>
                    <option value="1">Không hiển thị mặc định</option>
                </select>
            </div>
            <div class="col-2 remove_item_category">
               <span onclick="contruction.removeItemCategory(this)" >X</span>
            </div>
        </div>
      </script>
@endsection
