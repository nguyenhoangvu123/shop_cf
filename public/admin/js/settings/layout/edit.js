const settingLayout = {
    init: () => {
        $(".select2").select2();
        $(".status").select2({
            placeholder: "Chọn trạng thái",
            allowClear: true
        });
        $(".category").select2({
            placeholder: "Chọn danh mục",
            allowClear: true
        });
        if ($("#slectOptionShow").val() == 0) {
            $(".box-category").show();
            $(".box-product").hide();
        } else {
            $(".box-product").show();
            $(".box-category").hide();
        }
    },
    changeTypeOption: (event) => {
        const value = event.target.value;
        if (value == 0) {
            $(".box-category").show();
            $(".box-product").hide();

        } else {
            $(".box-product").show();
            $(".box-category").hide();
        }

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
    save: () => {
        const settingLayoutForm = $("#createSettingLayout");
        settingLayoutForm.validate({
            errorClass: "is-invalid",
            rules: {
                title: {
                    required: true
                },
                slectOptionShow: {
                    required: true
                },
                selectProduct: {
                    required: function () {
                        return $("#slectOptionShow").val() == 1;
                    }
                },
                selectCategory: {
                    required: function () {
                        return $("#slectOptionShow").val() == 0;
                    }
                },
                typeSlick: {
                    required: true
                }
            },
            messages: {
                title: {
                    required: "Vui lòng nhập tiêu đề"
                },
                selectProduct: {
                    required: "Vui lòng chọn bài viết"
                },
                selectCategory: {
                    required: "Vui lòng chọn danh mục"
                },
                slectOptionShow: {
                    required: "Vui lòng chọn kiểu hiện thị"
                },
                typeSlick: {
                    required: "Vui lòng chọn kiểu di chuyển"

                }
            }
        });
        if (settingLayoutForm.valid()) {
            const title = $(".title").val();
            const image = $(".file_upload")[0].files[0] ?? '';
            const status = $(".status").val();
            const category = $("#selectCategory").val();
            const typeShow = $("#slectOptionShow").val();
            const typeSlick = $("#typeSlick").val();
            const isUploadImageNew = $(".isUploadImageNew").val();
            const isDeleteImage = $(".isDeleteImage").val();
            let listPost = [];
            if (typeShow == 1) {
                listPost = $("#selectProduct").val();
            }
            var formData = new FormData();
            formData.append('title', title);
            formData.append('category', category);
            formData.append('image', image);
            formData.append('status', status);
            formData.append('typeShow', typeShow);
            formData.append('listPost', listPost);
            formData.append('typeSlick', typeSlick);
            formData.append('isUploadImageNew', isUploadImageNew);
            formData.append('isDeleteImage', isDeleteImage);
            $.ajax({
                type: 'POST',
                url: route('admin.setting.layout.update', { id: ID_LAYOUT }),
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
                                window.location.replace(route('admin.setting.layout'))
                            }
                        });
                    }
                },
                error: (error) => {
                    dataError = $.parseJSON(error.responseText);
                    if (dataError.errors.title) {
                        $(".title").addClass('is-invalid');
                        $(".titleUnique").addClass('is-invalid').text(dataError.errors.title);
                    }
                }
            });
        };

    }
};
settingLayout.init();