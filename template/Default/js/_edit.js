function _edit(module, action, formName, file_id) {

    if (file_id == 'img_file') {
        var data = document.getElementById(formName);
        var file_data = $('#' + file_id).prop('files')[0];
        var form_data = new FormData(data);
        form_data.append("file", file_data);
    }
    if (file_id == 1) {
        var data = document.getElementById(formName);
        var form_data = new FormData(data);
    }

    $confirm = confirm('Bạn có muốn chỉnh sửa lựa chọn này không?');
    if ($confirm == true) {

        $.ajax({
            type: "POST",
            url: module + "/" + action,
            data: form_data,
            cache: false,
            dataType: "json",
            processData: false,
            contentType: false,
            beforeSend: function() {
                $('.div-beforeSuccess').addClass('pop-up_display');


            },
            success: function(rs) {
                console.log(rs);
                if (rs['status'] == 1) {
                    $('.div-beforeSuccess').removeClass('pop-up_display');
                    $('.div-Success').addClass('pop-up_display');

                    setTimeout(function() { $('.div-Success').removeClass('pop-up_display'); }, 2000);
                    location.reload();
                } else if (rs['status'] == 0 || rs['status'] >= 2) {

                    $('.div-beforeSuccess').removeClass('pop-up_display');
                    alert(rs['msg']);
                    $('.div-fail').addClass('pop-up_display');

                    setTimeout(function() { $('.div-fail').removeClass('pop-up_display'); }, 2000);
                }
            }
        });
    } else {
        return false;
    }
    return false;
}