<table class="table table-striped">
    <thead>
        <tr>
            <th>STT</th>
            <th>Tên</th>
            <th>Loại</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody class="table-border-bottom-0">
        @if ($listFloor->count() > 0)
            @foreach ($listFloor as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->floor_name }}</td>
                    <td>
                        @if ($item->floor_attr_type == 1)
                            <span class="badge bg-label-primary me-1">Mặc định</span>
                        @else
                            <span class="badge bg-label-warning me-1">Bình thường</span>
                        @endif
                    </td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('admin.accounting.floor.edit', $item->id) }}"><i
                                        class="bx bx-edit-alt me-1"></i>
                                    Edit</a>
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
{{ $listFloor->links('admin.pages.categories.helpers.paginate', ['name' => 'floor']) }}
