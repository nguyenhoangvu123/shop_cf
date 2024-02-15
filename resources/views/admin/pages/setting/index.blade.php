@extends('admin.layouts.master')
@section('afterCss')
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}" />
@endsection
@section('content')
    <div class="row mb-4">
        <div class="col-xl">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-baseline">
                    <h5>CẬP NHẬT CẤU HÌNH THÔNG TIN CƠ BẢN</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-body">
                    <form id="settingBasic">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Tên công ty <span
                                    class="text-danger">(*)</span></label>
                            <input type="text" value="{{ $listSettingBasic->value->nameCompany ?? '' }}"
                                name="nameCompany" class="form-control nameCompany" placeholder="Nhập tên công ty" />
                        </div>
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Địa chỉ <span class="text-danger">(*)</span></label>
                            <input type="text" value="{{ $listSettingBasic->value->address ?? '' }}" name="address"
                                class="form-control address" placeholder="Nhập tên địa chỉ" />
                        </div>
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Email <span class="text-danger">(*)</span></label>
                            <input type="text" name="email" value="{{ $listSettingBasic->value->email ?? '' }}"
                                class="form-control email" placeholder="Nhập tên email" />
                        </div>
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Hotline <span class="text-danger">(*)</span></label>
                            <input type="text" value="{{ $listSettingBasic->value->hotline ?? '' }}" name="hotline"
                                class="form-control hotline" placeholder="Nhập số hotline" />
                        </div>
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Seo mô tả<span
                                    class="text-danger">(*)</span></label>
                            <input type="text" value="{{ $listSettingBasic->value->seoDescription ?? '' }}"
                                name="seoDescription" class="form-control seoDescription" placeholder="Nhập seo mô tả" />
                        </div>
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Seo key word<span
                                    class="text-danger">(*)</span></label>
                            <input type="text" value="{{ $listSettingBasic->value->seoKeyword ?? '' }}"
                                name="seoKeyword" class="form-control seoKeyword" placeholder="Nhập seo từ khoá tìm kiếm" />
                        </div>
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Website <span class="text-danger">(*)</span></label>
                            <input type="text" name="website" value="{{ $listSettingBasic->value->website ?? '' }}"
                                class="form-control website" placeholder="Nhập tên website" />
                        </div>
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Zalo <span class="text-danger">(*)</span></label>
                            <input type="text" name="zalo" value="{{ $listSettingBasic->value->zalo ?? '' }}"
                                class="form-control zalo" placeholder="Nhập tên zalo" />
                        </div>
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Youtube <span class="text-danger">(*)</span></label>
                            <input type="text" name="youtube" value="{{ $listSettingBasic->value->youtube ?? '' }}"
                                class="form-control youtube" placeholder="Nhập tên youte" />
                        </div>
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Facebook <span class="text-danger">(*)</span></label>
                            <input type="text" name="facebook" value="{{ $listSettingBasic->value->facebook ?? '' }}"
                                class="form-control facebook" placeholder="Nhập tên facebook" />
                        </div>
                        <div class="col mb-3">
                            <label for="emailBasic" class="form-label">Logo <span class="text-danger">(*)</span> </label>
                            <input type="file" hidden class="form-control file_upload" onchange="settingBasic.uploadImgae(event)"
                                accept="image/*" />
                            <input type="text" class="isUploadImageNew" name="isUploadImageNew" value="false" hidden>
                            <input type="text" class="isDeleteImage" name="isDeleteImage" value="false" hidden>
                            <div class="d-flex">
                                <div class="box-upload-image"
                                    style="background-image: url({{ asset('admin/assets/img/1.png') }})">
                                    <div class="box-preview-image">
                                        <img class="upload-image__default" onclick="settingBasic.triggerUpload()"
                                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAXRJREFUSEvtlu0xBEEQht+LgAwIgQgQARmQgRMBMiADMiACREAIZHAioJ6r6auuqdndnpvd2lKlf83t9fbT37MLzSSLmbiqBe9LOu9w9lHSZzSQGvCBpBdJux3GV5JOJH1E4FHwENRYYXgEnENJ6UUW1YMrQQieg4FcSqKWJjyz9JagppfDfcqp/b0vgwcDe++pYR+0BM9LTSYOrQE9+EbSddJ+y956lcT/EUHvOFM8Sr+vJN1x7gJHah9xwnR+0uHWAtgGTDT0wVky9pTqR1a6pBnsy5FDNtEU6E1gImWBIN+SiBQh8p10ZoGUIm8CAzpNUJywcWHcgAF/diXwgTeB7eWhBVJqzL8JtlTnK9Gv1ElS7ZsLuG8uW6mTNBfN0jdOm6009jiZPSJfpg7nGellDU66QGrW5GjjtC2U98LjFL2Jos6YveIl4bs2arBWj/t4vfHyLcMnDd7t1Voc0P9KdvlKWcvY927Y339wOFWtirOl+hcoGm8f1r37vwAAAABJRU5ErkJggg==" />
                                    </div>
                                </div>
                                <div class="box-upload-image-preview"
                                    style="
                                    background-image: url({{ $listSettingBasic->value->logo ?? asset('admin/assets/img/1.png') }})
                                    ;display:{{ !empty($listSettingBasic->value->logo) ? 'block' : 'none' }}">
                                    <div class="box-preview-image">
                                        <button type="button" class="btn-close"
                                            onclick="settingBasic.removeImage(this)"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 mt-5">
                            <button type="button" onclick="settingBasic.save()"
                                class="btn btn-primary submit-lg">Lưu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('afterScript')
    <script src="{{ asset('admin/js/settings/basic/index.js') }}"></script>
@endsection
