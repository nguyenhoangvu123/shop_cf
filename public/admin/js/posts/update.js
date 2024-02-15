const post = {
    init: () => {
        $(".select2").select2();
        $(".category").select2({
            placeholder: "Chọn danh mục",
            allowClear: true
        });
        CKEditorInit('description');
    },
    triggerUpload: () => {
        $('.file_upload').trigger('click');
    },
    uploadImgae: (event) => {
        link = URL.createObjectURL(event.target.files[0]);
        $(".box-upload-image-preview").css("background-image", `url(${link})`);
        $(".isUploadImageNew").val(true);
        $(".box-upload-image-preview").show();
        $(".isDeleteImage").val(false);
    },
    removeImage: (o) => {
        $(o).parents(".box-upload-image-preview").hide();
        $(".file_upload").val("");
        $(".isDeleteImage").val(true);

    },
    update: () => {
        const title = $(".title").val();
        const category = $(".category").val();
        const image = $(".file_upload")[0].files[0] ?? '';
        const status = $(".status").val();
        const description = CKEditorArray['description'].getData();
        const postForm = $("#createPost");
        const isUploadImageNew = $(".isUploadImageNew").val();
        const isDeleteImage = $(".isDeleteImage").val();
        const subTitle = $(".subTitle").val();
        postForm.validate({
            errorClass: "is-invalid",
            rules: {
                title: {
                    required: true,
                    maxlength: 255
                },
                subTitle: {
                    maxlength: 255
                },
                category: {
                    required: true
                }
            },
            messages: {
                title: {
                    required: "Vui lòng nhập tiêu đề bài viêt",
                    maxlength: 'Nhập tối đa 255 kí tự'
                },
                subTitle: {
                    maxlength: 'Nhập tối đa 255 kí tự'
                },
                category: {
                    required: "Vui lòng chọn danh mục"
                }

            }
        })
        if (description == '') {
            $("#description-error").addClass("is-invalid").text("Vui lòng nhập mô tả ");
        }
        if (postForm.valid() && description != '') {
            var formData = new FormData();
            formData.append('title', title);
            formData.append('category', category);
            formData.append('image', image);
            formData.append('status', status);
            formData.append('description', description);
            formData.append('isUploadImageNew', isUploadImageNew);
            formData.append('isDeleteImage', isDeleteImage);
            formData.append('subTitle', subTitle);
            $.ajax({
                type: 'POST',
                url: route('admin.post.update', { id: postId }),
                data: formData,
                processData: false,
                contentType: false,
                success: function (data) {
                    if (!data.error) {
                        Swal.fire(
                            'Cập nhật thành công',
                            `${data.message}`,
                            'success'
                        ).then((result) => {
                            if (result.isConfirmed) {
                                window.location.replace(route('admin.post'))
                            }
                        });
                    }
                },
                error: (error) => {

                }
            });
        };

    }
}
post.init();