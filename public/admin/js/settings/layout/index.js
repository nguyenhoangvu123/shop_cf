const settingLayout = {
    init: () => {
        $(".select2").select2();
        $(".statusSearch").select2({
            placeholder: "Chọn trạng thái",
            allowClear: true
        });
        settingLayout.list();

    },
    list: () => {
        $.ajax({
            type: 'POST',
            url: route('admin.setting.layout.list'),
            data: {
            },
            success: function (data) {
                $(".table-responsive").html(data.data);
                $(function () {

                    // Sortable column heads
                    var oldIndex;
                    $('#sortable').sortable({
                        start: function (event, ui) {
                            var start_pos = ui.item.index() + 1;
                            $(`#sortable tr:nth-child(${start_pos})`).addClass('highlight');
                        },
                        change: function (event, ui) {

                        },
                        update: function (event, ui) {
                            var start_pos = ui.item.index() + 1;
                            $(`#sortable tr:nth-child(${start_pos})`).removeClass('highlight');
                            $(`#sortable tr`).each(function (index) {
                                var stt = index + 1;
                                $(this).find(".idLayout").text(stt);
                            });
                        }
                    }).disableSelection();
                });
            },
            error: (error) => {

            }
        });
    },
    sort: () => {
        const lengthListLayout = $(`#sortable tr`).length;
        const listLayout = [];
        $(`#sortable tr`).each(function (index) {
            const id = $(this).find(".idLayout").attr('attr-id');
            const postion = lengthListLayout - index;
            const itemLayout = {
                id,
                config_postion: postion
            };
            listLayout.push(itemLayout);
        });
        $.ajax({
            type: 'POST',
            url: route('admin.setting.layout.sort'),
            data: {
                listLayout
            },
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
    },
    deleteLayout: (id) => {
        Swal.fire({
            title: 'Bạn muốn xoá giao diện ?',
            text: "Xoá giao diện sẽ không thể khôi phục lại !",
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
                    url: route('admin.setting.layout.delete', { id }),
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
                            settingLayout.list();
                        }, 1000);
                    },
                    error: (error) => {

                    }
                });

            }
        })
    },

}

settingLayout.init();