
const category = {
    init: () => {
        $(".select2").select2();
        $(".statusSearch").select2({
            placeholder: "Chọn trạng thái",
            allowClear: true
        });
        $(".positionShowSearch").select2({
            placeholder: "Chọn vị trí",
            allowClear: true
        });
        category.list();
        
    },
    showModalCreated: () => {
        $("#createdCategory").modal("show");
    },
    save: () => {
        const categoryForm = $("#createCategoryForm");
        categoryForm.validate({
            errorClass: "is-invalid",
            rules: {
                name: {
                    required: true
                }
            },
            messages: {
                name: {
                    required: "Vui lòng nhập tên danh mục"
                }
            }
        })
        if (categoryForm.valid()) {
            const data = {
                name: $(".name").val(),
                parent: $(".parent").val(),
                status: $(".status").val(),
                positionShow  : $('.positionShow').val()
            }
            $.ajax({
                type: 'POST',
                url: route('admin.category.store'),
                data: data,
                success: function (data) {
                    if (!data.error) {
                        $.Toast("Thêm thành công", `${data.message}`, "success", {
                            position_class: "toast-top-right",
                            width: 500,
                        });
                        $("#createdCategory").modal('hide');
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
            url: route('admin.category.list'),
            data: {
                page: page,
                name: $("#nameSearch").val(),
                status: $(".statusSearch").val(),
                position : $(".positionShowSearch").val()
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
            url: route('admin.category.edit', { id }),
            data: {
            },
            success: function (data) {
                if (!data.error) {
                    $("#box-modal").html(data.data);
                    $("#updateCategory").modal("show");
                    $(".select2").select2();
                }
            },
            error: (error) => {

            }
        });
    },
    update: (id) => {
        const categoryForm = $("#updateCategoryForm");
        categoryForm.validate({
            errorClass: "is-invalid",
            rules: {
                name: {
                    required: true
                }
            },
            messages: {
                name: {
                    required: "Vui lòng nhập tên danh mục"
                }
            }
        })
        if (categoryForm.valid()) {
            const data = {
                name: $(".name_update").val(),
                parent: $(".parent_update").val(),
                status: $(".status_update").val(),
                positionShow  : $('.positionShowUpdate').val()
            }
            $.ajax({
                type: 'POST',
                url: route('admin.category.update', { id }),
                data: data,
                success: function (data) {
                    if (!data.error) {
                        $.Toast("Cập nhật danh mục", `${data.message}`, "success", {
                            position_class: "toast-top-right",
                            width: 500,
                        });
                        $("#updateCategory").modal('hide');
                        category.list();
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
    deleteCategory: (id) => {
        Swal.fire({
            title: 'Bạn muốn xoá danh mục ?',
            text: "Xoá danh mục sẽ không thể khôi phục lại !",
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
                    url: route('admin.category.delete', { id }),
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
                        category.list();
                    },
                    error: (error) => {

                    }
                });

            }
        })
    },
    clearSearch: () => {
        $("#nameSearch").val("");
        $(".statusSearch").val(null).trigger("change");
        $(".positionShowSearch").val(null).trigger("change");
        category.list();
    }
}
category.init();