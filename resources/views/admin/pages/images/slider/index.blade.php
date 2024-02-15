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
                        <h5>DANH SÁCH SLIDER</h5>
                        <button type="button" onclick="slider.sort()" class="btn btn-warning">Cập nhật vị trí</button>
                        <button type="button" onclick="slider.showModalCreated()" class="btn btn-primary">Thêm
                            sider</button>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl">
                <div class="card">
                    <div class="table-responsive text-nowrap">
                        <ul class="list-group header">
                            <li class="list-group-item">
                                <div>
                                    STT
                                </div>
                                <div>
                                    Hình ảnh
                                </div>
                                <div style="padding-left: 30px;">
                                    Trạng thái
                                </div>
                                <div>
                                    Hành động
                                </div>
                            </li>
                        </ul>
                        <ul id="sortable" class="list-group body">
                            @if ($listSlider->count() > 0)
                                @foreach ($listSlider as $key => $item)
                                    <li class="list-group-item">
                                        <div class="stt">{{ $key + 1 }}</div>
                                        <input type="text" name="idImage" value="{{ $item->id }}" hidden>
                                        <div>
                                            <div class="box-image-list"
                                                style="background-image: url({{ $item->image_link ?? asset('admin/assets/img/1.png') }})">
                                            </div>
                                        </div>
                                        <div>
                                            @if ($item->image_status == 1)
                                                <span class="badge bg-label-primary me-1">Hiển thị</span>
                                            @else
                                                <span style="width: 73px;" class="badge bg-label-warning me-1">Ẩn</span>
                                            @endif
                                        </div>
                                        <div>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item"
                                                        onclick="slider.showModalUpdate('{{ $item->id }}')"
                                                        href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>
                                                        Edit</a>
                                                    <a class="dropdown-item"
                                                        onclick="slider.deleteSlider('{{ $item->id }}')"
                                                        href="javascript:void(0);"><i class="bx bx-trash me-1"></i>
                                                        Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                @endforeach
                            @else
                                <div>
                                    <div class="text-center" colspan="5">Không có dữ liệu</div>

                                </div>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="createdSlider" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form id="createCategoryForm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel1">THÊM SLIDER</h5>
                            <button type="button"class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <div class="row">
                                <div class="col mb-3">
                                    <label for="emailBasic" class="form-label">Ảnh</label>
                                    <input type="file" hidden class="form-control file_upload"
                                        onchange="slider.uploadImgae(event)" accept="image/*" />
                                    <div class="d-flex">
                                        <div class="box-upload-image"
                                            style="background-image: url({{ asset('admin/assets/img/1.png') }})">
                                            <div class="box-preview-image">
                                                <img class="upload-image__default" onclick="slider.triggerUpload()"
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAXRJREFUSEvtlu0xBEEQht+LgAwIgQgQARmQgRMBMiADMiACREAIZHAioJ6r6auuqdndnpvd2lKlf83t9fbT37MLzSSLmbiqBe9LOu9w9lHSZzSQGvCBpBdJux3GV5JOJH1E4FHwENRYYXgEnENJ6UUW1YMrQQieg4FcSqKWJjyz9JagppfDfcqp/b0vgwcDe++pYR+0BM9LTSYOrQE9+EbSddJ+y956lcT/EUHvOFM8Sr+vJN1x7gJHah9xwnR+0uHWAtgGTDT0wVky9pTqR1a6pBnsy5FDNtEU6E1gImWBIN+SiBQh8p10ZoGUIm8CAzpNUJywcWHcgAF/diXwgTeB7eWhBVJqzL8JtlTnK9Gv1ElS7ZsLuG8uW6mTNBfN0jdOm6009jiZPSJfpg7nGellDU66QGrW5GjjtC2U98LjFL2Jos6YveIl4bs2arBWj/t4vfHyLcMnDd7t1Voc0P9KdvlKWcvY927Y339wOFWtirOl+hcoGm8f1r37vwAAAABJRU5ErkJggg==" />
                                            </div>
                                        </div>
                                        <div class="box-upload-image-preview"
                                            style="background-image: url({{ asset('admin/assets/img/1.png') }})">
                                            <div class="box-preview-image">
                                                <button class="btn-close-primary"
                                                    onclick="slider.removeImage(this)">X</button>
                                            </div>
                                        </div>

                                    </div>
                                    <span id="required-image"></span>
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
                            <button type="button" onclick="slider.save()" type="submit"
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
    <script src="{{ asset('admin/js/images/slider/index.js') }}"></script>
    <script>
        $(function() {

            // Sortable column heads
            var oldIndex;
            $('#sortable').sortable({
                start: function(event, ui) {
                    var start_pos = ui.item.index() + 1;
                    $(`#sortable li:nth-child(${start_pos})`).addClass('highlight');
                },
                change: function(event, ui) {

                },
                update: function(event, ui) {
                    var start_pos = ui.item.index() + 1;
                    $(`#sortable li:nth-child(${start_pos})`).removeClass('highlight');
                    $(`#sortable li`).each(function(index) {
                        var stt = index + 1;
                        $(this).find(".stt").text(stt);
                    });
                }
            }).disableSelection();
        });
    </script>
@endsection
