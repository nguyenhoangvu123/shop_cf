const introduceSetting = {
    init: () => {
        CKEditorInit('description');
    },
    save: () => {
        const value = CKEditorArray['description'].getData();
        if (!value) {
            $("#description-error").addClass('is-invalid').text('Vui lòng nhập thông tin');
        } else {
            data = {
                value
            }
            $.ajax({
                type: 'POST',
                url: route('admin.setting.introduce.store'),
                data: data,
                success: function (data) {
                    if (!data.error) {
                        $.Toast("Cập nhật thành công", `${data.message}`, "success", {
                            position_class: "toast-top-right",
                            width: 500,
                        });
                    } else {
                        $.Toast("Cập nhật thất bại", `${data.message}`, "error", {
                            position_class: "toast-top-right",
                            width: 500,
                        });
                    }
                },
                error: (error) => {

                }
            });
        }


    }
};
introduceSetting.init();
