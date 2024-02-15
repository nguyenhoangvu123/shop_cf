
const advice = {
    init: () => {
        $(".select2").select2();
        $(".statusSearch").select2({
            placeholder: "Chọn trạng thái",
            allowClear: true
        });
        advice.list();

    },
    list: (page = 1) => {
        $.ajax({
            type: 'POST',
            url: route('admin.advice.list'),
            data: {
                page: page,
                status: $(".statusSearch").val(),
                name: $("#nameSearch").val(),
                email: $("#emailSearch").val()
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
            url: route('admin.advice.edit', { id }),
            data: {
            },
            success: function (data) {
                if (!data.error) {
                    $("#box-modal").html(data.data);
                    $("#updateAdvice").modal("show");
                    $(".select2").select2();
                }
            },
            error: (error) => {

            }
        });
    },
    update: (id) => {
        const adviceForm = $("#updateAdviceForm");
        adviceForm.validate({
            errorClass: "is-invalid",
            rules: {
                name: {
                    required: true,
                    maxlength: 255
                },
                title: {
                    maxlength: 255
                },
                phone: {
                    required: true,
                    maxlength: 255
                },
                email: {
                    required: true,
                    email: true,
                    maxlength: 255
                },
            },
            messages: {
                name: {
                    required: "Vui lòng nhập họ và tên",
                    maxlength: "Nhập tối đa 255 kí tự"
                },
                phone: {
                    required: "Vui lòng nhập số điện thoại",
                    maxlength: "Nhập tối đa 255 kí tự"

                },
                email: {
                    required: "Vui lòng nhập email",
                    maxlength: "Nhập tối đa 255 kí tự"
                },
                title: {
                    maxlength: "Nhập tối đa 255 kí tự"
                }
            }
        })
        if (adviceForm.valid()) {
            const name = $(".name_update").val();
            const title = $(".title_update").val();
            const phone = $(".phone_update").val();
            const email = $(".email_update").val();
            const descr = $(".description_update").val();
            const status = $(".status_update").val();
            const data = {
                name,
                title,
                phone,
                email,
                descr,
                status
            }
            $.ajax({
                type: 'POST',
                url: route('admin.advice.update', { id }),
                data: data,
                success: function (data) {
                    if (!data.error) {
                        $.Toast("Cập nhật tư vấn", `${data.message}`, "success", {
                            position_class: "toast-top-right",
                            width: 500,
                        });
                        $("#updateAdvice").modal('hide');
                        advice.list();
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
    deleteAdvice: (id) => {
        Swal.fire({
            title: 'Bạn muốn xoá đăng ký tư vấn ?',
            text: "Xoá đăng ký tư vấn sẽ không thể khôi phục lại !",
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
                    url: route('admin.advice.delete', { id }),
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
                        advice.list();
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
        advice.list();
    }
}
advice.init();