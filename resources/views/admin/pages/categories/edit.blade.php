<div class="modal fade" id="updateCategory" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="updateCategoryForm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">CẬP NHẬT DANH MỤC</h5>
                    <button type="button"class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Tên</label>
                            <input type="text" value="{{ $categoryItem->category_name }}" name="name"
                                class="form-control name_update" placeholder="Nhập tên danh mục" />
                            <span class="nameUnique"></span>
                        </div>
                        <div class="mb-3">
                            <div>
                                <label for="emailBasic" class="form-label">Chọn danh mục cha</label>
                            </div>
                            <div class="w-100">
                                <select class="select2 parent_update">
                                    <option value=""></option>
                                    @foreach ($listParentCategory as $item)
                                        <option {{ $item->id == $categoryItem->parent_id ? 'selected' : '' }}
                                            value="{{ $item->id }}">{{ $item->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div>
                                <label for="emailBasic" class="form-label">Vị trí hiển thị</label>
                            </div>
                            <div class="w-100">
                                <select class="select2 positionShowUpdate">
                                    <option {{ $categoryItem->position_show == 'menu' ? 'selected' : '' }}
                                        value="menu">Menu</option>
                                    <option {{ $categoryItem->position_show == 'detail' ? 'selected' : '' }} value="detail">
                                        Detail</option>
                                    <option {{ $categoryItem->position_show == 'footer' ? 'selected' : '' }} value="footer">
                                        Footer</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div>
                                <label for="emailBasic" class="form-label">Trạng thái</label>
                            </div>
                            <div class="w-100">
                                <select class="select2 status_update">
                                    <option value="1" {{ $categoryItem->status == 1 ? 'selected' : '' }}>Hiển thị
                                    </option>
                                    <option value="0" {{ $categoryItem->status == 0 ? 'selected' : '' }}>Ẩn
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
                    <button type="button" onclick="category.update('{{ $categoryItem->id }}')" type="submit"
                        class="btn btn-primary">Lưu</button>
                </div>
            </div>
        </form>
    </div>
</div>
