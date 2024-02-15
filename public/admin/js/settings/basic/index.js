const settingBasic = {
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
        const nameCompany = $(".nameCompany").val();
        const address = $(".address").val();
        const email = $(".email").val();
        const website = $(".email").val();
        const zalo = $(".zalo").val();
        const youtube = $(".youtube").val();
        const facebook = $(".facebook").val();
        const settingBasicForm = $("#settingBasic");
        const hotline = $(".hotline").val();
        const seoDescription = $(".seoDescription").val();
        const seoKeyword = $(".seoKeyword").val();
        const isUploadImageNew = $(".isUploadImageNew").val();
        const isDeleteImage = $(".isDeleteImage").val();
        const image = $(".file_upload")[0].files[0] ?? '';
        settingBasicForm.validate({
            errorClass: "is-invalid",
            rules: {
                nameCompany: {
                    required: true
                },
                address: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                website: {
                    required: true
                },
                zalo: {
                    required: true
                },
                youtube: {
                    required: true
                },
                facebook: {
                    required: true
                },
                hotline: {
                    required: true,
                },
                image : {
                    required: true
                },
                seoKeyword : {
                    required: true
                },
                seoDescription : {
                    required: true
                }
            },
            messages: {
                nameCompany: {
                    required: "Vui lòng tên công ty"
                },
                address: {
                    required: "Vui lòng nhập địa chỉ công ty"
                },
                email: {
                    required: 'Vui nhập tên email',
                    email: 'Email không đúng định dạng'
                },
                website: {
                    required: 'Vui nhập tên website'
                },
                zalo: {
                    required: 'Vui lòng nhập tên zalo'
                },
                youtube: {
                    required: 'Vui lòng nhập tên youtube'
                },
                facebook: {
                    required: 'Vui lòng nhập tên facebook'
                },
                hotline: {
                    required: 'Vui lòng nhập số hotline'
                },
                image : {
                    required: 'Vui lòng nhập logo'
                },
                seoKeyword : {
                    required: 'Vui lòng nhập seo từ khoá tìm kiếm'
                },
                seoDescription : {
                    required: 'Vui lòng nhập logo seo mô tả'
                }

            }
        })

        if (settingBasicForm.valid()) {
            var formData = new FormData();
            formData.append('nameCompany', nameCompany);
            formData.append('address', address);
            formData.append('logo', image);
            formData.append('website', website);
            formData.append('zalo', zalo);
            formData.append('isUploadImageNew', isUploadImageNew);
            formData.append('isDeleteImage', isDeleteImage);
            formData.append('facebook', facebook);
            formData.append('hotline', hotline);
            formData.append('youtube', youtube);
            formData.append('email', email);
            formData.append('seoDescription', seoDescription);
            formData.append('seoKeyword', seoKeyword);
            $.ajax({
                type: 'POST',
                url: route('admin.setting.basic.store'),
                processData: false,
                contentType: false,
                data: formData,
                success: function (data) {
                    if (!data.error) {
                        $.Toast("Thêm thành công", `${data.message}`, "success", {
                            position_class: "toast-top-right",
                            width: 500,
                        });
                    } else {
                        $.Toast("Thêm thất bại", `${data.message}`, "error", {
                            position_class: "toast-top-right",
                            width: 500,
                        });
                    }
                },
                error: (error) => {

                }
            });
        };

    }
};