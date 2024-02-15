const login = {
    submit: () => {
        const formAuthentication = $("#formAuthentication");
        formAuthentication.validate({
            errorClass: "is-invalid",
            rules: {
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true
                }
            },
            messages: {
                password: {
                    required: "Vui lòng nhập mật khẩu"
                },
                email: {
                    required: "Vui lòng nhập email",
                    email: "Email không đúng định dạng"
                }
            },
            submitHandler: () => {
                const email = $("#email").val();
                const password = $("#password").val();
                const data = {
                    email,
                    password
                }
                $.ajax({
                    type: 'POST',
                    url: route('admin.post.login'),
                    data: data,
                    success: function success(data) {
                        if(data.error) {
                            $(".login-error").removeClass("d-none");
                            $(".login-error span").text(data.message);
                        }else {
                            window.location.href = route('admin.dashboard'); 
                        }
                    },
                });
            }
        })
    }
}