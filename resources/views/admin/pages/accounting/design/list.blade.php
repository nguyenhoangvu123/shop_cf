<table class="table table-striped">
    <thead>
        <tr>
            <th>STT</th>
            <th>Tên</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody class="table-border-bottom-0">
        @if ($listStyleDesgin->count() > 0)
            @foreach ($listStyleDesgin as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->design_name }}</td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" onclick="design.showModalUpdate('{{ $item->id }}')"
                                    href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>
                                    Edit</a>

                                <a class="dropdown-item" onclick="design.deleteDesign('{{ $item->id }}')"
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
{{ $listStyleDesgin->links('admin.pages.categories.helpers.paginate', ['name' => 'design']) }}
