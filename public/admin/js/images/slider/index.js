
const slider = {
    init: () => {
        $(".select2").select2();
        $(".statusSearch").select2({
            placeholder: "Chọn trạng thái",
            allowClear: true
        });
    },
    showModalCreated: () => {
        $("#createdSlider").modal("show");
    },
    save: () => {
        const image = $(".file_upload")[0].files[0] ?? '';
        const status = $(".status").val();
        if (!image) {
            console.log(12121);
            $('#required-image').addClass('is-invalid').text('vui lòng chọn ảnh');
            return;
        }

        var formData = new FormData();
        formData.append('image', image);
        formData.append('status', status);
        $.ajax({
            type: 'POST',
            url: route('admin.image.slider.store'),
            data: formData,
            processData: false,
            contentType: false,
            success: function (data) {
                if (!data.error) {
                    $.Toast("Thêm thành công", `${data.message}`, "success", {
                        position_class: "toast-top-right",
                        width: 500,
                    });
                    $("#createdSlider").modal('hide');
                    window.location.reload();
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

    },
    list: (page = 1) => {

        $.ajax({
            type: 'POST',
            url: route('admin.image.slider.list'),
            data: {
                page: page,
                name: $("#nameSearch").val(),
                status: $(".statusSearch").val()
            },
            success: function (data) {
                console.log(data.data);
                $(".table-responsive").html(data.data);
            },
            error: (error) => {

            }
        });
    },
    showModalUpdate: (id) => {
        $.ajax({
            type: 'POST',
            url: route('admin.image.slider.edit', { id }),
            data: {
            },
            success: function (data) {
                if (!data.error) {
                    $("#box-modal").html(data.data);
                    $("#updateSlider").modal("show");
                    $(".select2").select2();
                }
            },
            error: (error) => {

            }
        });
    },
    update: (id) => {
        const image = $(".file_upload.update")[0].files[0] ?? '';
        const status = $(".status.update").val();
        const isDeleteImage = $(".isDeleteUpdateImage").val();
        if (!image && isDeleteImage == 'true') {
            $('#required-image-update').addClass('is-invalid').text('vui lòng chọn ảnh');
            return;
        }

        var formData = new FormData();
        formData.append('image', image);
        formData.append('status', status);
        formData.append('isDeleteImage', isDeleteImage);
        $.ajax({
            type: 'POST',
            url: route('admin.image.slider.update', { id }),
            data: formData,
            processData: false,
            contentType: false,
            success: function (data) {
                if (!data.error) {
                    $.Toast("Cập nhật thành công", `${data.message}`, "success", {
                        position_class: "toast-top-right",
                        width: 500,
                    });
                    $("#updateSlider").modal('hide');

                    setTimeout(() => {
                        window.location.reload();
                    }, 500);
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
    },
    deleteSlider: (id) => {
        Swal.fire({
            title: 'Bạn muốn xoá ảnh ?',
            text: "Xoá ảnh sẽ không thể khôi phục lại !",
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
                    url: route('admin.image.slider.delete', { id }),
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
                        setTimeout(() => {
                            window.location.reload();
                        }, 1000);
                    },
                    error: (error) => {

                    }
                });

            }
        })
    },
    clearSearch: () => {
        $("#nameSearch").val("");
        $(".statusSearch").val(null).trigger("change");
        category.list();
    },
    triggerUpload: () => {
        $('.file_upload').trigger('click');
    },
    uploadImgae: (event) => {
        link = URL.createObjectURL(event.target.files[0]);
        $(".box-upload-image-preview").css("background-image", `url(${link})`);
        $(".box-upload-image-preview").show();
        $('#required-image').removeClass('is-invalid').text('');
    },
    removeImage: (o) => {
        $(o).parents(".box-upload-image-preview.update").hide();
        $(".file_upload.update").val("");
    },
    triggerUploadUpdate: () => {
        $('.file_upload.update').trigger('click');
    },
    uploadImgaeUpdate: (event) => {
        link = URL.createObjectURL(event.target.files[0]);
        $(".box-upload-image-preview.update").css("background-image", `url(${link})`);
        $(".box-upload-image-preview.update").show();
        $('#required-image-update').removeClass('is-invalid').text('');
        $(".isDeleteUpdateImage").val(false);
        $(".isUploadUpdateImageNew").val(true);

    },
    removeImageUpdate: (o) => {
        $(o).parents(".box-upload-image-preview.update").hide();
        $(".file_upload.update").val("");
        $(".isDeleteUpdateImage").val(true);
    },

    sort: () => {
        const lengthListImage = $(`#sortable li`).length;
        const listImage = [];
        $(`#sortable li`).each(function (index) {
            const id = parseInt($(this).find("input[name='idImage']").val());
            const postion = lengthListImage - index;
            const itemImage = {
                id,
                image_position : postion
            };
            listImage.push(itemImage);
        });
        $.ajax({
            type: 'POST',
            url: route('admin.image.slider.sort'),
            data: {
                listImage
            },
            success: function (data) {
                if (!data.error) {
                    $.Toast("Cập nhật thành công", `${data.message}`, "success", {
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
slider.init();