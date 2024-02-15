const comments = {
    init: () => {
        $(".select2").select2();
        comments.list();
    },
    list: (page = 1) => {

        $.ajax({
            type: 'POST',
            url: route('admin.comment.list'),
            data: {
                page: page,
                category: $(".category").val()
            },
            success: function (data) {
                $(".table-responsive").html(data.data);
            },
            error: (error) => {

            }
        });
    },
    delete: (id) => {
        Swal.fire({
            title: 'Bạn muốn xoá bình luận ?',
            text: "Xoá bình luận sẽ không thể khôi phục lại !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Xoá',
            cancelButtonText: 'Huỷ'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'DELETE',
                    url: route('admin.comment.delete', { id }),
                    data: {
                    },
                    success: function (data) {
                        if (!data.error) {
                            Swal.fire(
                                'Xoá thành công',
                                `${data.message}`,
                                'success'
                            )
                        } else {
                            Swal.fire(
                                'Xoá thất bại',
                                `${data.message}`,
                                'error'
                            )
                        }
                        comments.list();
                    },
                    error: (error) => {

                    }
                });

            }
        })
    },
    clearSearch: () => {
        $(".title").val("");
        $(".status").val(null).trigger("change");
        $(".category").val(null).trigger("change");
        comments.list();
    }
}
comments.init();