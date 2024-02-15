<div class="modal fade" id="updateAdvice" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="updateAdviceForm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">CẬP NHẬT ĐĂNG KÝ TƯ VẤN</h5>
                    <button type="button"class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Tên</label>
                            <input type="text" value="{{ $adviceItem->advice_name }}" name="name"
                                class="form-control name_update" placeholder="nhập tên" />
                        </div>
                        <div class="mb-3">
                            <label for="nameBasic" class="form-label">Tiêu đề</label>
                            <input type="text" value="{{ $adviceItem->advice_title }}" name="title"
                                class="form-control title_update" placeholder="Nhập tiêu đề" />
                        </div>
                        <div class="mb-3">
                            <label for="nameBasic" class="form-label">Email</label>
                            <input type="text" value="{{ $adviceItem->advice_email }}" name="email"
                                class="form-control email_update" placeholder="Nhập email" />
                        </div>
                        <div class="mb-3">
                            <label for="nameBasic" class="form-label">Phone</label>
                            <input type="text" value="{{ $adviceItem->advice_phone }}" name="phone"
                                class="form-control phone_update" placeholder="Nhập tiêu đề" />
                        </div>
                        <div class="mb-3">
                            <label for="nameBasic" class="form-label">Mô tả</label>
                            <textarea class="form-control description_update" name="description" placeholder="Nội dung">{{ $adviceItem->advice_descr }}</textarea>
                        </div>
                        <div class="mb-3">
                            <div>
                                <label for="emailBasic" class="form-label">Trạng thái</label>
                            </div>
                            <div class="w-100">
                                <select class="select2 status_update">
                                    <option value="0" {{ $adviceItem->advice_status == 0 ? 'selected' : '' }}>Chưa
                                        tư vấn
                                    </option>
                                    <option value="1" {{ $adviceItem->advice_status == 1 ? 'selected' : '' }}>Đã tư
                                        vấn
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
                    <button type="button" onclick="advice.update('{{ $adviceItem->id }}')" type="submit"
                        class="btn btn-primary">Lưu</button>
                </div>
            </div>
        </form>
    </div>
</div>
