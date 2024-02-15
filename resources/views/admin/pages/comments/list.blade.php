<table class="table table-striped">
    <thead>
        <tr>
            <th>STT</th>
            <th>Nội dung bình luận</th>
            <th>Bài viết</th>
            <th>Trạng thái </th>
            <th>Hành động</th>

        </tr>
    </thead>
    <tbody class="table-border-bottom-0">
        @if ($listComment->count() > 0)
            @foreach ($listComment as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>
                        {{ $item->user_comment}}
                    </td>
                    <td>{{ $item->postComment->post_title }}</td>
                    <td>
                        @if ($item->status == 1)
                            <span class="badge bg-label-primary me-1">Đã bình luận</span>
                        @else
                            <span class="badge bg-label-warning me-1">Chưa bình luận</span>
                        @endif
                    </td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('admin.comment.edit', ['id' => $item->id]) }}"><i
                                        class="bx bx-edit-alt me-1"></i>
                                    Edit</a>
                                <a class="dropdown-item" onclick="comments.delete('{{ $item->id }}')"
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
{{ $listComment->links('admin.pages.categories.helpers.paginate', ['name' => 'comments']) }}
