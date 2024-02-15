<div class="modal fade" id="updateSlider" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">CẬP NHẬT SLIDER</h5>
                <button type="button"class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col mb-3">
                        <label for="emailBasic" class="form-label">Ảnh</label>
                        <input type="file" hidden class="form-control file_upload update"
                            onchange="slider.uploadImgaeUpdate(event)" accept="image/*" />
                        <input type="text" class="isUploadUpdateImageNew" name="isUploadUpdateImageNew"
                            value="false" hidden>
                        <input type="text" class="isDeleteUpdateImage" name="isDeleteUpdateImage" value="false"
                            hidden>
                        <div class="d-flex">
                            <div class="box-upload-image update"
                                style="background-image: url({{ asset('admin/assets/img/1.png') }})">
                                <div class="box-preview-image update">
                                    <img class="upload-image__default" onclick="slider.triggerUploadUpdate()"
                                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAXRJREFUSEvtlu0xBEEQht+LgAwIgQgQARmQgRMBMiADMiACREAIZHAioJ6r6auuqdndnpvd2lKlf83t9fbT37MLzSSLmbiqBe9LOu9w9lHSZzSQGvCBpBdJux3GV5JOJH1E4FHwENRYYXgEnENJ6UUW1YMrQQieg4FcSqKWJjyz9JagppfDfcqp/b0vgwcDe++pYR+0BM9LTSYOrQE9+EbSddJ+y956lcT/EUHvOFM8Sr+vJN1x7gJHah9xwnR+0uHWAtgGTDT0wVky9pTqR1a6pBnsy5FDNtEU6E1gImWBIN+SiBQh8p10ZoGUIm8CAzpNUJywcWHcgAF/diXwgTeB7eWhBVJqzL8JtlTnK9Gv1ElS7ZsLuG8uW6mTNBfN0jdOm6009jiZPSJfpg7nGellDU66QGrW5GjjtC2U98LjFL2Jos6YveIl4bs2arBWj/t4vfHyLcMnDd7t1Voc0P9KdvlKWcvY927Y339wOFWtirOl+hcoGm8f1r37vwAAAABJRU5ErkJggg==" />
                                </div>
                            </div>
                            <div class="box-upload-image-preview update"
                                style="
                                     display:{{ $slider->image_link ? 'block' : 'none' }};
                                    background-image: url({{ $slider->image_link ?? asset('admin/assets/img/1.png') }})">
                                <div class="box-preview-image update">
                                    <button class="btn-close-primary"
                                        onclick="slider.removeImageUpdate(this)">X</button>
                                </div>
                            </div>

                        </div>
                        <span id="required-image-update"></span>
                    </div>
                    <div class="mb-3">
                        <div>
                            <label for="emailBasic" class="form-label">Trạng thái</label>
                        </div>
                        <div class="w-100">
                            <select class="select2 status update">
                                <option value="1" {{ $slider->image_status == 1 ? 'selected' : '' }}>Hiển thị
                                </option>
                                <option value="0" {{ $slider->image_status == 0 ? 'selected' : '' }}>Ẩn
                                </option>
                            </select>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Đóng
                </button>
                <button type="button" onclick="slider.update('{{ $slider->id }}')" type="submit"
                    class="btn btn-primary">Lưu</button>
            </div>
        </div>

    </div>
</div>
