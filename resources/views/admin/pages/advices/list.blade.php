<table class="table table-striped">
    <thead>
        <tr>
            <th>STT</th>
            <th>Tên</th>
            <th>Email</th>
            <th>Status</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody class="table-border-bottom-0">
        @if ($listAdvice->count() > 0)
            @foreach ($listAdvice as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->advice_name }}</td>
                    <td>
                        {{ $item->advice_email }}
                    </td>
                    <td>
                        @if ($item->advice_status == 1)
                            <span class="badge bg-label-primary me-1">Đã tư vấn</span>
                        @else
                            <span class="badge bg-label-warning me-1">Chưa tư vấn</span>
                        @endif
                    </td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" onclick="advice.showModalUpdate('{{ $item->id }}')"
                                    href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>
                                    Edit</a>
                                <a class="dropdown-item" onclick="advice.deleteAdvice('{{ $item->id }}')"
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
{{ $listAdvice->links('admin.pages.categories.helpers.paginate', ['name' => 'advice']) }}
