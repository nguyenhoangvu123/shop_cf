const contactSetting = {
    init: () => {
        CKEditorInit('description');
    },
    save: () => {
        const value = CKEditorArray['description'].getData();
        const contactForm = $("#settingContact");
        const address = $(".address").val();
        contactForm.validate({
            errorClass: "is-invalid",
            rules: {
                address: {
                    required: true,
                }
            },
            messages: {
                address: {
                    required: "Vui lòng nhập địa chỉ google map",
                }

            }
        })
        if (!value) {
            $("#description-error").addClass('is-invalid').text('Vui lòng nhập thông tin');
        } else {
            data = {
                value,
                address
            }
            $.ajax({
                type: 'POST',
                url: route('admin.setting.contact.store'),
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
contactSetting.init();
