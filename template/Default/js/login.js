$(document).ready(function() {

});

function hideShow() {
    $pwd = document.querySelector('.pwd');

    if ($pwd.type == "password") {
        $pwd.type = "text";
        $('.show-btn').addClass("hide-btn");
    } else {
        $pwd.type = "password";
        $('.show-btn').removeClass("hide-btn");
    }

}

function checkLogin() {
    var form_data = $('form[name="form_login"]').serialize();

    $.ajax({
        type: "POST",
        url: "login/login",
        data: form_data,
        cache: false,
        dataType: "json",
        beforeSend: function() {
            $('body').append('<div class="screen"></div>');
        },
        success: function(rs) {
            if (rs['status'] == 1) {
                location.href = rs['link'];
                $(".msg-error").html(rs['msg']);
            }
            if (rs['status'] == 0) {
                alert(rs['msg']);
                $('.screen').remove();
            }
            if (rs['status'] == 2) {
                alert(rs['msg']);
                location.realod();
            }
        }
    });

    return false;
}