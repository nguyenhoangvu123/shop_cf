
const floor = {
    init: () => {
        $("#type").select2();
        $("#arrt_type").select2();
        $('input[name="value_attr_percent"]').mask('#00');
        floor.list();
    },
    list: (page = 1) => {
        $.ajax({
            type: 'POST',
            url: route('admin.accounting.floor.list'),
            data: {
                page: page,
                name: $("#nameSearch").val(),
            },
            success: function (data) {
                $(".table-responsive").html(data.data);
            },
            error: (error) => {

            }
        });
    },
    save: () => {

        const createFloorForm = $("#createFloor");
        createFloorForm.validate({
            errorClass: "is-invalid",
            rules: {
                title: {
                    required: true
                },
                type: {
                    required: true
                }
            },
            messages: {
                title: {
                    required: "Vui lòng nhập tên tầng",
                    maxlength: 255
                },
                type: {
                    required: "Vui lòng chọn loại tầng"
                }
            }
        })
        if (createFloorForm.valid()) {
            flagAttrFloor = true;
            var listAttrFloor = [];
            $(".item_attr").each(function () {
                var name = $(this).find("input[name='title_attr']").val();
                var valueDesgin = $(this).find("input[name='value_desgin']").val();
                var valueExpense = $(this).find("input[name='value_expense']").val();
                var item = {
                    'floor_attr_name': name,
                    'value_desgin': valueDesgin,
                    'value_expense' : valueExpense
                };
                if (!name || !valueExpense || !valueDesgin) {
                    flagAttrFloor = false;
                }
                listAttrFloor.push(item);
            });
            if (!flagAttrFloor || listAttrFloor.length <= 0) {
                Swal.fire(
                    'Vui lòng điền đầy đủ thông tin tầng',
                    '',
                    'error'
                )
                return;
            }
            const data = {
                name: $(".title").val(),
                type: $(".type").val(),
                listAttrFloor
            }

            $.ajax({
                type: 'POST',
                url: route('admin.accounting.floor.store'),
                data: data,
                success: function (data) {
                    if (!data.error) {
                        Swal.fire(
                            'Thêm thành công',
                            `${data.message}`,
                            'success'
                        ).then((result) => {
                            if (result.isConfirmed) {
                                window.location.replace(route('admin.accounting.floor'))
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
        const createFloorForm = $("#createFloor");
        createFloorForm.validate({
            errorClass: "is-invalid",
            rules: {
                title: {
                    required: true
                },
                type: {
                    required: true
                }
            },
            messages: {
                title: {
                    required: "Vui lòng nhập tên tầng",
                    maxlength: 255
                },
                type: {
                    required: "Vui lòng chọn loại tầng"
                }
            }
        })
        if (createFloorForm.valid()) {
            flagAttrFloor = true;
            var listAttrFloor = [];
            $(".item_attr").each(function () {
                var name = $(this).find("input[name='title_attr']").val();
                var valueDesgin = $(this).find("input[name='value_desgin']").val();
                var valueExpense = $(this).find("input[name='value_expense']").val();
                var item = {
                    'floor_attr_name': name,
                    'value_desgin': valueDesgin,
                    'value_expense' : valueExpense
                };
                if (!name || !valueExpense || !valueDesgin) {
                    flagAttrFloor = false;
                }
                listAttrFloor.push(item);
            });
            if (!flagAttrFloor || listAttrFloor.length <= 0) {
                Swal.fire(
                    'Vui lòng điền đầy đủ thông tin tầng',
                    '',
                    'error'
                )
                return;
            }
            const data = {
                name: $(".title").val(),
                type: $(".type").val(),
                listAttrFloor
            }
            $.ajax({
                type: 'POST',
                url: route('admin.accounting.floor.update', { id }),
                data: data,
                success: function (data) {
                    if (!data.error) {
                        Swal.fire(
                            'Cập nhật thành công',
                            `${data.message}`,
                            'success'
                        ).then((result) => {
                            if (result.isConfirmed) {
                                window.location.replace(route('admin.accounting.floor'))
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
    deleteFloor: (id) => {
        Swal.fire({
            title: 'Bạn muốn xoá tầng ?',
            text: "Xoá tầng sẽ không thể khôi phục lại !",
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
                    url: route('admin.accounting.floor.delete', { id }),
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
                        floor.list();
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
    addAttr: () => {
        var template = $("#templ_item-attr-floor").html();
        $(".list-item_attr_floor").append(template);
        $('input[name="value_expense"]').mask('#00');
        $('input[name="value_attr_percent"]').mask('#00');
    },
    removeItemAttr: (o) => {
        $(o).closest('.item_attr').remove();
    }
}
floor.init();