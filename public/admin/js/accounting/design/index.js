
const design = {
    init: () => {

        design.list();
    },
    showModalCreated: () => {
        $("#createdDesign").modal("show");
    },
    save: () => {
        const designForm = $("#createDesignForm");
        designForm.validate({
            errorClass: "is-invalid",
            rules: {
                name: {
                    required: true
                }
            },
            messages: {
                name: {
                    required: "Vui lòng nhập tên phong cách thiết kế"
                }
            }
        })
        if (designForm.valid()) {
            const data = {
                name: $(".name").val()
            }
            $.ajax({
                type: 'POST',
                url: route('admin.accounting.design.store'),
                data: data,
                success: function (data) {
                    if (!data.error) {
                        $.Toast("Thêm thành công", `${data.message}`, "success", {
                            position_class: "toast-top-right",
                            width: 500,
                        });
                        $("#createDesignForm").modal('hide');
                        window.location.reload();
                    }
                },
                error: (error) => {
                    dataError = $.parseJSON(error.responseText);
                    console.log(dataError);
                    if (dataError.errors.name) {
                        $(".name").addClass('is-invalid');
                        $(".nameUnique").addClass('is-invalid').text(dataError.errors.name);
                    }
                }
            });
        };
    },
    list: (page = 1) => {

        $.ajax({
            type: 'POST',
            url: route('admin.accounting.design.list'),
            data: {
                page: page
            },
            success: function (data) {
                $(".table-responsive").html(data.data);
            },
            error: (error) => {

            }
        });
    },
    showModalUpdate: (id) => {
        $.ajax({
            type: 'GET',
            url: route('admin.accounting.design.edit', { id }),
            data: {
            },
            success: function (data) {
                if (!data.error) {
                    $("#box-modal").html(data.data);
                    $("#updateDesign").modal("show");
                }
            },
            error: (error) => {

            }
        });
    },
    update: (id) => {
        const designForm = $("#updateDesignForm");
        designForm.validate({
            errorClass: "is-invalid",
            rules: {
                name: {
                    required: true
                }
            },
            messages: {
                name: {
                    required: "Vui lòng nhập tên phong cách thiết kế"
                }
            }
        })
        if (designForm.valid()) {
            const data = {
                name: $(".nameUpdate").val(),
            }
            $.ajax({
                type: 'POST',
                url: route('admin.accounting.design.update', { id }),
                data: data,
                success: function (data) {
                    if (!data.error) {
                        $.Toast("Cập nhật danh mục", `${data.message}`, "success", {
                            position_class: "toast-top-right",
                            width: 500,
                        });
                        $("#updateDesign").modal('hide');
                        design.list();
                    }
                },
                error: (error) => {
                    dataError = $.parseJSON(error.responseText);
                    if (dataError.errors.name) {
                        $(".name_update").addClass('is-invalid');
                        $(".nameUnique").addClass('is-invalid').text(dataError.errors.name);
                    }
                }
            });
        };
    },
    deleteDesign: (id) => {
        Swal.fire({
            title: 'Bạn muốn xoá phong cách thiết kế ?',
            text: "Xoá phong cách thiết kế sẽ không thể khôi phục lại !",
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
                    url: route('admin.accounting.design.delete', { id }),
                    data: {
                    },
                    success: function (data) {
                        if (!data.error) {
                            Swal.fire(
                                'Xoá thành công',
                                `${data.message}`,
                                'success'
                            )
                        }
                        design.list();
                    },
                    error: (error) => {

                    }
                });

            }
        })
    }
}
design.init();