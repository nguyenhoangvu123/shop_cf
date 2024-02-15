<table class="table table-striped">
    <thead>
        <tr>
            <th>STT</th>
            <th>Tên</th>
            <th>Tên danh mục cha</th>
            <th>Vị trí hiển thị</th>
            <th>Status</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody class="table-border-bottom-0">
        @if ($listCategory->count() > 0)
            @foreach ($listCategory as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->category_name }}</td>
                    <td>
                        {{ $item->parent ? $item->parent->category_name : '' }}
                    </td>
                    <td>
                        {{ $item->position_show }}
                    </td>
                    <td>
                        @if ($item->status == 1)
                            <span class="badge bg-label-primary me-1">Hiển thị</span>
                        @else
                            <span class="badge bg-label-warning me-1">Ẩn</span>
                        @endif
                    </td>
                    <td>
                        @if (!$item->category_type)
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                    data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" onclick="category.showModalUpdate('{{ $item->id }}')"
                                        href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>
                                        Edit</a>

                                    <a class="dropdown-item" onclick="category.deleteCategory('{{ $item->id }}')"
                                        href="javascript:void(0);"><i class="bx bx-trash me-1"></i>
                                        Delete</a>
                                </div>
                            </div>
                        @endif
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td class="text-center" colspan="5">Không có dữ liệu</td>

            </tr>
        @endif

    </tbody>
</table>
{{ $listCategory->links('admin.pages.categories.helpers.paginate', ['name' => 'category']) }}
