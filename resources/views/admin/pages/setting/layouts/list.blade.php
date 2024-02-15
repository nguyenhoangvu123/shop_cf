<table class="table table-striped">
    <thead>
        <tr>
            <th>STT</th>
            <th>Tên</th>
            <th>Tên danh mục</th>
            <th>Hình ảnh</th>
            <th>Status</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody id="sortable" class="table-border-bottom-0">
        @if ($listConfigLayout->count() > 0)
            @foreach ($listConfigLayout as $key => $item)
                <tr>
                    <td class="idLayout" attr-id="{{ $item->id }}">{{ $key + 1 }}
                    </td>
                    <td>{{ $item->config_name }}</td>
                    <td>
                        {{ $item->category ? $item->category->category_name : '' }}
                    </td>
                    <td>
                        <div class="box-image-list"
                            style="background-image: url({{ $item->config_image ?? asset('admin/assets/img/1.png') }})">
                        </div>
                    </td>
                    <td>
                        @if ($item->config_status == 1)
                            <span class="badge bg-label-primary me-1">Hiển thị</span>
                        @else
                            <span class="badge bg-label-warning me-1">Ẩn</span>
                        @endif
                    </td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a href="{{ route('admin.setting.layout.edit', ['id' => $item->id]) }}"
                                    class="dropdown-item"><i class="bx bx-edit-alt me-1"></i>
                                    Edit</a>
                                <a class="dropdown-item" onclick="settingLayout.deleteLayout('{{ $item->id }}')"
                                    href="javascript:void(0);"><i class="bx bx-trash me-1"></i>
                                    Delete</a>
                            </div>
                        </div>
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
