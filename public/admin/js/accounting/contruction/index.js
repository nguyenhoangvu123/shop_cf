
const contruction = {
    init: () => {
        $(".listCategory").select2();
        $(".listFloor").select2();
        $(".isDefault").select2();
        $('input[name="value_category"]').mask('000000000000000', { reverse: true });
        contruction.list();
    },
    list: (page = 1) => {
        $.ajax({
            type: 'POST',
            url: route('admin.accounting.contruction.list'),
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
                    required: true
                }
            },
            messages: {
                title: {
                    required: "Vui lòng nhập tên loại công trình",
                    maxlength: 255
                }
            }
        })
        if (createContructionForm.valid()) {
            flagCategoryContruction = true;
            var listAttrCategory = [];
            $(".item_attr").each(function () {
                var name = $(this).find("input[name='title_category']").val();
                var design = $(this).find(".listCategory").val();
                var valueCategory = $(this).find("input[name='value_category']").val();
                var isDefault = $(this).find(".isDefault").val();
                var listFloor = $(this).find(".listFloor").val();
                var item = {
                    'name': name,
                    'price': parseInt(valueCategory),
                    'is_default': isDefault,
                    'id_desgin': design,
                    'id_floor_attrs': listFloor
                };
                if (!name || !design || !isDefault || !valueCategory) {
                    flagCategoryContruction = false;
                }
                listAttrCategory.push(item);
            });
            if (!flagCategoryContruction || listAttrCategory.length <= 0) {
                Swal.fire(
                    'Vui lòng điền đầy đủ thông tin hạng mục',
                    '',
                    'error'
                )
                return;
            }
            const data = {
                name: $(".title").val(),
                listAttrCategory
            }
            $.ajax({
                type: 'POST',
                url: route('admin.accounting.contruction.store'),
                data: data,
                success: function (data) {
                    if (!data.error) {
                        Swal.fire(
                            'Thêm thành công',
                            `${data.message}`,
                            'success'
                        ).then((result) => {
                            if (result.isConfirmed) {
                                window.location.replace(route('admin.accounting.contruction'))
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
                    required: true
                }
            },
            messages: {
                title: {
                    required: "Vui lòng nhập tên loại công trình",
                    maxlength: 255
                }
            }
        })
        if (updateContructionForm.valid()) {
            flagCategoryContruction = true;
            var listAttrCategory = [];
            $(".item_attr").each(function () {
                var name = $(this).find("input[name='title_category']").val();
                var design = $(this).find(".listCategory").val();
                var valueCategory = $(this).find("input[name='value_category']").val();
                var isDefault = $(this).find(".isDefault").val();
                var listFloor = $(this).find(".listFloor").val();
                var item = {
                    'name': name,
                    'price': parseInt(valueCategory),
                    'is_default': isDefault,
                    'id_desgin': design,
                    'id_floor_attrs': listFloor
                };
                if (!name || !design || !isDefault || !valueCategory) {
                    flagCategoryContruction = false;
                }
                listAttrCategory.push(item);
            });
            if (!flagCategoryContruction || listAttrCategory.length <= 0) {
                Swal.fire(
                    'Vui lòng điền đầy đủ thông tin hạng mục',
                    '',
                    'error'
                )
                return;
            }
            const data = {
                name: $(".title").val(),
                listAttrCategory
            }
            $.ajax({
                type: 'POST',
                url: route('admin.accounting.contruction.update', { id }),
                data: data,
                success: function (data) {
                    if (!data.error) {
                        Swal.fire(
                            'Cập nhật thành công',
                            `${data.message}`,
                            'success'
                        ).then((result) => {
                            if (result.isConfirmed) {
                                window.location.replace(route('admin.accounting.contruction'))
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
            title: 'Bạn muốn xoá loại công trình ?',
            text: "Xoá loại công trình sẽ không thể khôi phục lại !",
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
                    url: route('admin.accounting.contruction.delete', { id }),
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
        $(".listFloor").select2();
        $('input[name="value_category"]').mask('000000000000000', { reverse: true });
    },
    removeItemCategory: (o) => {
        $(o).closest('.item_attr').remove();
    }
}
contruction.init();