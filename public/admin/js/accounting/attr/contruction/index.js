
const contruction = {
    init: () => {
        $('input[name="value"]').mask('000000000000000', { reverse: true });
        contruction.list();
    },
    list: (page = 1) => {
        $.ajax({
            type: 'POST',
            url: route('admin.accounting.attr.contruction.list'),
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
    save: () => {

        const createContructionForm = $("#createContruction");
        createContructionForm.validate({
            errorClass: "is-invalid",
            rules: {
                title: {
                    required: true,
                    maxlength: 255
                },
                value: {
                    required: true
                }
            },
            messages: {
                title: {
                    required: "Vui lòng nhập tên",

                },
                value: {
                    required: "Vui lòng giá trị",
                }
            }
        })
        if (createContructionForm.valid()) {
            const data = {
                name: $(".title").val(),
                value: $(".value").val(),
            }
            $.ajax({
                type: 'POST',
                url: route('admin.accounting.attr.contruction.store'),
                data: data,
                success: function (data) {
                    if (!data.error) {
                        Swal.fire(
                            'Thêm thành công',
                            `${data.message}`,
                            'success'
                        ).then((result) => {
                            if (result.isConfirmed) {
                                window.location.replace(route('admin.accounting.attr.contruction'))
                            }
                        });
                    }
                },
                error: (error) => {
                    dataError = $.parseJSON(error.responseText);
                    console.log(dataError);
                    if (dataError.errors.name) {
                        $(".title").addClass('is-invalid');
                        $(".nameUnique").addClass('is-invalid').text(dataError.errors.name);
                    }
                }
            });
        };
    },

    update: (id) => {
        const updateContructionForm = $("#updateContruction");
        updateContructionForm.validate({
            errorClass: "is-invalid",
            rules: {
                title: {
                    required: true,
                    maxlength: 255
                },
                value: {
                    required: true
                }
            },
            messages: {
                title: {
                    required: "Vui lòng nhập tên",

                },
                value: {
                    required: "Vui lòng giá trị",
                }
            }
        })
        if (updateContructionForm.valid()) {

            const data = {
                name: $(".title").val(),
                value: $(".value").val(),
            }
            $.ajax({
                type: 'POST',
                url: route('admin.accounting.attr.contruction.update', { id }),
                data: data,
                success: function (data) {
                    if (!data.error) {
                        Swal.fire(
                            'Cập nhật thành công',
                            `${data.message}`,
                            'success'
                        ).then((result) => {
                            if (result.isConfirmed) {
                                window.location.replace(route('admin.accounting.attr.contruction'))
                            }
                        });
                    }
                },
                error: (error) => {
                    dataError = $.parseJSON(error.responseText);
                    console.log(dataError);
                    if (dataError.errors.name) {
                        $(".title").addClass('is-invalid');
                        $(".nameUnique").addClass('is-invalid').text(dataError.errors.name);
                    }
                }
            });
        };
    },
    deleteContruction: (id) => {
        Swal.fire({
            title: 'Bạn muốn xoá gói thi công thô và nhân công  ?',
            text: "Xoá xoá gói thi công thô và nhân công sẽ không thể khôi phục lại !",
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
                    url: route('admin.accounting.attr.contruction.delete', { id }),
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
                        contruction.list();
                    },
                    error: (error) => {

                    }
                });

            }
        })
    },
    clearSearch: () => {
        $("#nameSearch").val("");
        $("#emailSearch").val("");
        $(".statusSearch").val(null).trigger("change");
        floor.list();
    },
    addCategory: () => {
        var template = $("#templ_item-category").html();
        $(".list-item_category").append(template);
        $(".listCategory").select2();
        $(".isDefault").select2();
        $('input[name="value_category"]').mask('000000000000000', { reverse: true });
    },
    removeItemCategory: (o) => {
        $(o).closest('.item_attr').remove();
    }
}
contruction.init();