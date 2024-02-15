const comments = {
    init: () => {
        comments.list();
    },
    list: () => {
        console.log(POST_ID);
        $.ajax({
            type: 'POST',
            data: { id: POST_ID },
            url: route('introduce.comment.list'),
            success: function (data) {
                console.log(data);
                $('.showcoment').html(data.view);
            },
            error: (error) => {

            }
        });
    },
    add: (postId) => {
        const formComment = $("#comment_form");
        formComment.validate({
            errorClass: "is-invalid",
            rules: {
                name: {
                    required: true,
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
                comment_body: {
                    required: true,
                    maxlength: 1000
                }
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

                comment_body: {
                    required: "Vui lòng nhập bình luận",
                    maxlength: "Nhập tối đa 1000 kí tự"
                }
            }
        })

        if (formComment.valid()) {
            const name = $("#comment_form #name").val();
            const phone = $("#comment_form #sdt").val();
            const email = $("#comment_form #email").val();
            const comment = $("#comment_form #comment_body").val();
            const data = {
                postId,
                name,
                phone,
                email,
                comment
            };
            $.ajax({
                type: 'POST',
                url: route('introduce.comment.store'),
                data: data,
                success: function (data) {
                    if (!data.error) {
                        $.Toast("", `${data.message}`, "success", {
                            position_class: "toast-top-right",
                            width: 500
                        });
                        $("#comment_form #name").val("");
                        $("#comment_form #email").val("");
                        $("#comment_form #sdt").val("");
                        $("#comment_form #comment_body").val("");
                        comments.list(postId);
                    }
                },
                error: (error) => {

                }
            });
        }
    }
}

comments.init();