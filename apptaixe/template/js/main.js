/*Designed & Developed by Mr.Phin - Phone: 0988167702*/
$(document).ready(function() {
    $('.btn-info').click(function(){
        $(".popup_detail").toggleClass('in');
    })
    $('.exit-btn').on('click', function() {
        $('.popup_detail').toggleClass('in');
    })
});

function logout() {
    $.ajax({
        type: "POST",
        url: "home/logout",
        data: "id =" + 1080,
        cache: false,
        dataType: "json",

        success: function(rs) {
            console.log(rs);
            if (rs['status'] == 1) {

                alert(rs['msg']);
                location.href = rs['link'];
            }
            if (rs['status'] == 2) {
                alert(rs['msg']);
                location.href = rs['link'];
            }
        }
    });

    return false;
}
function info(module, action, id) {

    $.ajax({
        type: "POST",
        url: module + "/" + action,
        data: {
            id: id

        },
        cache: false,
        dataType: "json",
        beforeSend: function() {

            $('.div-beforeSuccess').addClass('pop-up_display');
        },

        success: function(rs) {
            //console.log(rs);
            if (rs['status'] == 1) {
                $('.div-beforeSuccess').removeClass('pop-up_display');
                $('.popup_detail').html(rs['str']);


            }
            if (rs['status'] == 0 || rs['status'] == 2) {
                alert(rs['str']);
                location.reload();
            }
        }
    });
}
