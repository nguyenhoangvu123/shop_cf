const comment = {
    update: (id) => {
        const commentForm = $("#updateComment");
        commentForm.validate({
            errorClass: "is-invalid",
            rules: {
                feedbackComment: {
                    required: true
                }
            },
            messages: {
                feedbackComment: {
                    required: "Vui lòng nhập bình luận"
                }
            }
        })
        if (commentForm.valid()) {
            const data = {
                feedbackComment: $(".feedbackComment").val(),
            }
            $.ajax({
                type: 'POST',
                url: route('admin.comment.update', { id }),
                data: data,
                success: function (data) {
                    if (!data.error) {
                        Swal.fire(
                            'Trả lời bình luận thành công',
                            `${data.message}`,
                            'success'
                        ).then((result) => {
                            if (result.isConfirmed) {
                                window.location.replace(route('admin.comment'))
                            }
                        });
                    }
                },
                error: (error) => {

                }
            });
        }
    }
}