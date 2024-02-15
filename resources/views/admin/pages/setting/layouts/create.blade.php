@extends('admin.layouts.master')
@section('afterCss')
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}" />
@endsection
@section('content')
    <div class="row mb-4">
        <div class="col-xl">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-baseline">
                    <h5>TẠO GIAO DIỆN</h5>
                    <a href="{{ route('admin.setting.layout') }}" class="btn btn-warning">Trở về</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-body">
                    <form id="createSettingLayout">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Tiêu đề <span class="text-danger">(*)</span></label>
                            <input type="text" name="title" class="form-control title" placeholder="Nhập tiêu đề" />
                            <span class="titleUnique"></span>
                        </div>
                        <div class="mb-3 optionShow">
                            <div>
                                <label for="optionShow" class="form-label">Chọn hiển thị<span
                                        class="text-danger">(*)</span></label>
                            </div>
                            <div class="w-100 d-flex flex-column-reverse">
                                <select id="slectOptionShow" onchange="settingLayout.changeTypeOption(event)"
                                    name="slectOptionShow" class="select2">
                                    <option value="">
                                    </option>
                                    <option value="0">Danh mục
                                    </option>
                                    <option value="1">Bài viết tự chọn
                                    </option>
                                </select>
                            </div>
                        </div>
                      
                        <div class="mb-3 box-category" style="display:none">
                            <div>
                                <label for="category" class="form-label">Danh mục <span class="text-danger"></span></label>
                            </div>
                            <div class="w-100 d-flex flex-column-reverse">
                                <select id="selectCategory" name="selectCategory" class="select2">
                                    <option value=""></option>
                                    @foreach ($listCategory as $item)
                                        <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mb-3 box-product" style="display:none">
                            <div>
                                <label for="category" class="form-label">Bài viết<span class="text-danger"></span></label>
                            </div>
                            <div class="w-100 d-flex flex-column-reverse">
                                <select id="selectProduct" multiple name="selectProduct" class="select2">
                                    @foreach ($listPost as $item)
                                        <option value="{{ $item->id }}">{{ $item->post_title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 typeSlick">
                            <div>
                                <label for="typeSlick" class="form-label">Chọn kiểu di chuyển <span
                                        class="text-danger">(*)</span></label>
                            </div>
                            <div class="w-100 d-flex flex-column-reverse">
                                <select id="typeSlick"
                                    name="typeSlick" class="select2">
                                    <option value="">
                                    </option>
                                    <option value="0">Từ trên xuống
                                    </option>
                                    <option value="1">Tròn
                                    </option>
                                    <option value="2">Vuông
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="emailBasic" class="form-label">Ảnh</label>
                            <input type="file" hidden class="form-control file_upload"
                                onchange="settingLayout.uploadImgae(event)" accept="image/*" />
                            <div class="d-flex">
                                <div class="box-upload-image"
                                    style="background-image: url({{ asset('admin/assets/img/1.png') }})">
                                    <div class="box-preview-image">
                                        <img class="upload-image__default" onclick="settingLayout.triggerUpload()"
                                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAXRJREFUSEvtlu0xBEEQht+LgAwIgQgQARmQgRMBMiADMiACREAIZHAioJ6r6auuqdndnpvd2lKlf83t9fbT37MLzSSLmbiqBe9LOu9w9lHSZzSQGvCBpBdJux3GV5JOJH1E4FHwENRYYXgEnENJ6UUW1YMrQQieg4FcSqKWJjyz9JagppfDfcqp/b0vgwcDe++pYR+0BM9LTSYOrQE9+EbSddJ+y956lcT/EUHvOFM8Sr+vJN1x7gJHah9xwnR+0uHWAtgGTDT0wVky9pTqR1a6pBnsy5FDNtEU6E1gImWBIN+SiBQh8p10ZoGUIm8CAzpNUJywcWHcgAF/diXwgTeB7eWhBVJqzL8JtlTnK9Gv1ElS7ZsLuG8uW6mTNBfN0jdOm6009jiZPSJfpg7nGellDU66QGrW5GjjtC2U98LjFL2Jos6YveIl4bs2arBWj/t4vfHyLcMnDd7t1Voc0P9KdvlKWcvY927Y339wOFWtirOl+hcoGm8f1r37vwAAAABJRU5ErkJggg==" />
                                    </div>
                                </div>
                                <div class="box-upload-image-preview"
                                    style="background-image: url({{ asset('admin/assets/img/1.png') }})">
                                    <div class="box-preview-image">
                                        <button type="button" class="btn-close"
                                            onclick="settingLayout.removeImage(this)"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div>
                                <label for="emailBasic" class="form-label">Trạng thái</label>
                            </div>
                            <div class="w-100">
                                <select class="select2 status">
                                    <option value="1">Hiển thị
                                    </option>
                                    <option value="0">Ẩn
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 mt-5">
                            <button type="button" onclick="settingLayout.save()"
                                class="btn btn-primary submit-lg">Lưu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('afterScript')
    <script src="{{ asset('admin/js/settings/layout/create.js') }}"></script>
@endsection
