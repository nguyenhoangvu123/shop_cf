const post = {
    init: () => {
        $(".select2").select2();
        post.list();
        $(".category").select2({
            placeholder: "Chọn danh mục",
            allowClear: true
        });
        $(".status").select2({
            placeholder: "Chọn trạng thái",
            allowClear: true
        });
    },
    list: (page = 1) => {

        $.ajax({
            type: 'POST',
            url: route('admin.post.list'),
            data: {
                page: page,
                title: $(".title").val(),
                status: $(".status").val(),
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
            title: 'Bạn muốn xoá bài viết ?',
            text: "Xoá bài viết sẽ không thể khôi phục lại !",
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
                    url: route('admin.post.delete', { id }),
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
                        post.list();
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
        post.list();
    }
}
post.init();