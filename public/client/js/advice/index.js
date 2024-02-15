const advice = {
    init: () => {
        $("#form-advice").submit(function (e) {
            e.preventDefault();
        });
    },
    store: () => {
        const formBook = $("#form-advice");
        formBook.validate({
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

        if (formBook.valid()) {
            const name = $("#form-advice #advice-name").val();
            const title = $("#form-advice #advice-title").val();
            const phone = $("#form-advice #advice-phone").val();
            const email = $("#form-advice #advice-email").val();
            const descr = $("#form-advice #advice-description").val();
            const data = {
                name,
                title,
                phone,
                email,
                descr
            };
            $.ajax({
                type: 'POST',
                url: route('client.advice'),
                data: data,
                success: function (data) {
                    if (!data.error) {
                        $.fancybox.close();
                        $.Toast("", `${data.message}`, "success", {
                            position_class: "toast-top-right",
                            width: 500
                        });
                        $("#form-advice #advice-name").val("");
                        $("#form-advice #advice-title").val("");
                        $("#form-advice #advice-phone").val("");
                        $("#form-advice #advice-email").val("");
                        $("#form-advice #advice-description").val("");
                        $("#isSignup").val("1");
                        if ($("#isSignup").length > 0) {
                            showHideQuoteType(false);
                        }
                    }
                },
                error: (error) => {

                }
            });
        }
    }
}

advice.init();