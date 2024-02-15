<div class="modal fade" id="updateDesign" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="updateDesignForm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">THÊM PHONG CÁCH THIẾT KẾ</h5>
                    <button type="button"class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Tên</label>
                            <input type="text" name="name" value="{{ $design->design_name }}" class="form-control nameUpdate"
                                placeholder="Nhập tên phong cách thiết kế" />
                            <span class="nameUnique"></span>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Đóng
                    </button>
                    <button type="button" onclick="design.update('{{ $design->id }}')" type="submit"
                        class="btn btn-primary">Lưu</button>
                </div>
            </div>
        </form>
    </div>
</div>