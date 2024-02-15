@extends('admin.layouts.master')
@section('afterCss')
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}" />
@endsection
@section('content')
    <div class="row mb-4">
        <div class="col-xl">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-baseline">
                    <h5>CẬP NHẬT BÀI VIẾT</h5>
                    <a href="{{ route('admin.post') }}" class="btn btn-warning">Trở về</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-body">
                    <form id="createPost">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Tiêu đề <span class="text-danger">(*)</span></label>
                            <input type="text" value="{{ $post->post_title }}" name="title" class="form-control title"
                                placeholder="Nhập tiêu đề" />
                        </div>
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Tiêu đề phụ</label>
                            <input type="text" value="{{ $post->post_sub_title }}" name="subTitle"
                                class="form-control subTitle" placeholder="Nhập tiêu đề phụ" />
                        </div>

                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Mô tả <span class="text-danger">(*)</span></label>
                            <textarea name="description" id="description" class="mb-3">{{ $post->post_description }}</textarea>
                            <label id="description-error" for="title"></label>
                        </div>
                        <div class="mb-3">
                            <div>
                                <label for="category" class="form-label">Danh mục <span
                                        class="text-danger">(*)</span></label>
                            </div>
                            <div class="w-100 d-flex flex-column-reverse">
                                <select id="category" name="category" class="select2 category">
                                    <option value=""></option>
                                    @foreach ($listCategory as $item)
                                        <option {{ $item->id == $post->category_id ? 'selected' : '' }}
                                            value="{{ $item->id }}">{{ $item->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="emailBasic" class="form-label">Ảnh</label>
                            <input type="file" hidden class="form-control file_upload" onchange="post.uploadImgae(event)"
                                accept="image/*" />
                            <input type="text" class="isUploadImageNew" name="isUploadImageNew" value="false" hidden>
                            <input type="text" class="isDeleteImage" name="isDeleteImage" value="false" hidden>
                            <div class="d-flex">
                                <div class="box-upload-image"
                                    style="background-image: url({{ asset('admin/assets/img/1.png') }})">
                                    <div class="box-preview-image">
                                        <img class="upload-image__default" onclick="post.triggerUpload()"
                                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAXRJREFUSEvtlu0xBEEQht+LgAwIgQgQARmQgRMBMiADMiACREAIZHAioJ6r6auuqdndnpvd2lKlf83t9fbT37MLzSSLmbiqBe9LOu9w9lHSZzSQGvCBpBdJux3GV5JOJH1E4FHwENRYYXgEnENJ6UUW1YMrQQieg4FcSqKWJjyz9JagppfDfcqp/b0vgwcDe++pYR+0BM9LTSYOrQE9+EbSddJ+y956lcT/EUHvOFM8Sr+vJN1x7gJHah9xwnR+0uHWAtgGTDT0wVky9pTqR1a6pBnsy5FDNtEU6E1gImWBIN+SiBQh8p10ZoGUIm8CAzpNUJywcWHcgAF/diXwgTeB7eWhBVJqzL8JtlTnK9Gv1ElS7ZsLuG8uW6mTNBfN0jdOm6009jiZPSJfpg7nGellDU66QGrW5GjjtC2U98LjFL2Jos6YveIl4bs2arBWj/t4vfHyLcMnDd7t1Voc0P9KdvlKWcvY927Y339wOFWtirOl+hcoGm8f1r37vwAAAABJRU5ErkJggg==" />
                                    </div>
                                </div>
                                <div class="box-upload-image-preview"
                                    style="
                                    background-image: url({{ $post->post_image ?? asset('admin/assets/img/1.png') }})
                                    ;display:{{ $post->post_image ? 'block' : 'none' }}">
                                    <div class="box-preview-image">
                                        <button type="button" class="btn-close" onclick="post.removeImage(this)"></button>
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
                                    <option value="1" {{ $post->status == 1 ? 'selected' : '' }}>Hiển thị
                                    </option>
                                    <option {{ $post->status == 0 ? 'selected' : '' }} value="0">Ẩn
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 mt-5">
                            <button type="button" onclick="post.update()" class="btn btn-primary submit-lg">Cập
                                nhật</button>
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
    <script>
        const postId = '{{ $post->id }}';
    </script>
    <script src="{{ asset('admin/js/posts/update.js') }}"></script>
@endsection
