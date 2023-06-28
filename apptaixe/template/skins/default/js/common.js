$(document).ready(function() {


    /// Overall ////////////////////////////////////////////////	
    /*	$('div').each( function(){
    		if ($(this).html() == '') $(this).hide();
    	});
    */
    /* Show call action Edit/Delete */
    $('.callAction').hover(
        function() {
            $(this).find('.callAction_hide').show();
        },
        function() {
            $(this).find('.callAction_hide').hide();
        }
    );


    /* Show call actions in List */
    $('.table_list tr').hover(
        function() {
            $(this).addClass('tr_hover').find('.th-actions').show();
        },
        function() {
            $(this).removeClass('tr_hover').find('.th-actions').hide();
        }
    );
    $('.exit-btn').click(function() {
        $('.popup-timeline').removeClass('in');
    })
    $('.hd-profile').click(
        function() {
            $('.profile').toggleClass('in');
        }
    );
    $('.btn-timeline').click(function() {

        $('.popup-timeline').toggleClass('in');
    })
    $('.btn_hoanthanh').click(function() {

        $('.popup-hoanthanh').toggleClass('in');
    })
    $('.cost_btn').click(function() {

        $('.popup-hoanthanh').toggleClass('in');
    })
    $(".nv-list >.list > li").click(function() {
        $(this).find("ul").slideToggle();
        $(this).find('.select').toggleClass('br-fix');
    });
    $('.btn-hide').click(
        function() {

            // $('.nv-list > ul > li > ul').hide();
            // $('.nv-list > ul > li > a').removeClass('br-fix');
        }
    );
    // 
    //Examples of how to assign the Colorbox event to elements
    $(".group1").colorbox({ rel: "group1" });




    var $h = 1;
    $('.btn-add-phiphatsinh').on('click', function() {
        var add = "'add'";
        var $content = '<tr class="tr_row"> <td>' + $h + '</td> <td> <input type="text" name="data[' + $h + '][tenphi]" class="btn-phi_data" id="data_tenphi' + $h + '" onclick="return load(' + $h + ',' + add + ')"></input>  <input type="hidden" name="data[' + $h + '][idphi]" id="data_idphi' + $h + '"></td> <td><input type="text" name="data[' + $h + '][sotien]" value="" required></td> <td><input type="text" name="data[' + $h + '][so_hoadon]" value="" required></td> <td><input type="text" class="picker"  name="data[' + $h + '][ngay_hoadon]" value="" required></td> <td><select name ="data[' + $h + '][thukhach]"><option value="1" >Có</option><option value="0" >Không</option></select> </td>  <td><input type="text" name="data[' + $h + '][ghichu]" value=""></td> <td><input type="file" name="data[' + $h + '][img_file]" id="img_file" value="" multiple accept= "image/*,.pdf" ></td> <td><a class=" color-0 btn_delete_line" href="javascript:void(0)" > <i class="fa-solid fa-trash icon-delete"></i></a></td> </tr>';
        //var $content = '<tr class="tr_row"><td colspan="6">sdsdsd</td></tr>';
        var $body = $('.add-phiphatsinh');

        $($content).appendTo($body);
        $h++;

        $('.btn-phi_data').on('click', function() {
            $('.popup-upload-img').addClass('in');
        })
        $("#datepicker2,.picker").datepicker({
            dateFormat: "dd/m/yy"
        });

    });
    // 
    $(document).on('click', '.btn_delete_line', function() {

        if ($h > 0) {
            $(this).parents('.tr_row').remove();
        }


        $h--;
    });
    if ($(".hd").length > 0) {
        $(window).scroll(function() {
            var e = $(window).scrollTop();
            if (e > 40) {
                $(".hd").addClass('hd-fix');
                $(".hd-r .profile").addClass('profile-fix');
            } else {
                $(".hd").removeClass('hd-fix');
                $(".hd-r .profile").removeClass('profile-fix');
            }
        });

    };



    /// Left Menu //////////////////////////////////////////////
    /*$('.side .menu h2').toggle(function(){
    	save_status_menu(this.id,$(this).parent().find('a').css('display'));
    	$(this).parent().find('a').stop(true, true).animate({
    		height: 'toggle'
    	},250);	

    },function(){
    	save_status_menu(this.id,$(this).parent().find('a').css('display'));
    	$(this).parent().find('a').stop(true, true).animate({
    		height: 'toggle'
    	},250);
    	
    })*/
})

function cancel() {


    $('.popup-timeline').removeClass('in');
    $('.popup-hoanthanh').removeClass('in');

}

function add_view_timeline(module, action, id = null, name) {


    $.ajax({
        type: "POST",
        url: "?mod=" + module + "&act=" + action,
        data: {
            id: id,
            name: name
        },
        cache: false,
        dataType: "json",
        beforeSend: function() {

            $('.div-beforeSuccess').addClass('pop-up_display');
        },

        success: function(rs) {

            if (rs['status'] == 1) {
                $('.div-beforeSuccess').removeClass('pop-up_display');
                $('.popup-timeline').html(rs['str']);



            }
            if (rs['status'] == 0 || rs['status'] == 2) {
                alert(rs['str']);
                location.reload();
            }
        }
    });
}

function add_timeline(module, action, formName, file_id) {

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

    $.ajax({
        type: "POST",
        url: "?mod=" + module + "&act=" + action,
        data: form_data,
        cache: false,
        dataType: "json",
        processData: false,
        contentType: false,
        beforeSend: function() {
            $('.div-beforeSuccess').addClass('pop-up_display');

        },
        success: function(rs) {

            if (rs['status'] == 1) {


                $('.div-beforeSuccess').removeClass('pop-up_display');
                $('.div-Success').addClass('pop-up_display');

                setTimeout(function() {
                    $('.div-Success').removeClass('pop-up_display');
                    $('.popup-create').removeClass('in');
                }, 2000);
                location.reload();
            } else if (rs['status'] == 0 || rs['status'] == 2 || rs['status'] == 3) {
                $('.div-beforeSuccess').removeClass('pop-up_display');
                $('.div-fail').addClass('pop-up_display');
                alert(rs['msg']);
                setTimeout(function() { $('.div-fail').removeClass('pop-up_display'); }, 2000);
            }
        }
    });

    return false;

};

function _edit(module, action, formName, file_id) {

    if (file_id == 'img_file') {
        // alert(1);
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
            url: "?mod=" + module + "&act=" + action,
            data: form_data,
            cache: false,
            dataType: "json",
            processData: false,
            contentType: false,
            beforeSend: function() {
                $('.div-beforeSuccess').addClass('pop-up_display');


            },
            success: function(rs) {

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

function nhan_lenh(module, action, id, type) {
    $confirm = confirm('Bạn đã sẵn sàng nhận lệnh!!');
    if ($confirm == true) {

        $.ajax({
            type: "POST",
            url: "?mod=" + module + "&act=" + action,
            data: {
                id: id,
                type: type
            },
            cache: false,
            dataType: "json",

            beforeSend: function() {
                $('.div-beforeSuccess').addClass('pop-up_display');


            },
            success: function(rs) {
                // console.log(rs);
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
}

function _xacNhanDaNhanHang(module, action, id) {
    $confirm = confirm('Sau khi xác nhận thì không thể thay đổi.Bạn chắc chắn xác nhận đã lấy hàng?');
    if ($confirm == true) {

        $.ajax({
            type: "POST",
            url: "?mod=" + module + "&act=" + action,
            data: {
                id: id,

            },
            cache: false,
            dataType: "json",

            beforeSend: function() {
                $('.div-beforeSuccess').addClass('pop-up_display');


            },
            success: function(rs) {
                // console.log(rs);
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
}

function deleteImage(module, action, id, name = null) {
    var conf = window.confirm('Bạn có muốn xóa?');
    if (conf === false) {
        return false;
    } else {
        $.ajax({
            type: "POST",
            url: "?mod=" + module + "&act=" + action,
            data: {
                id: id,
                name: name
            },
            cache: false,
            dataType: "json",
            beforeSend: function() {
                $('.div-beforeSuccess').addClass('pop-up_display');
            },
            success: function(rs) {

                if (rs['status'] == 1) {
                    $('.div-beforeSuccess').removeClass('pop-up_display');
                    $('#pics_' + id).remove();
                }
                if (rs['status'] == 0) {
                    alert('Không có mẫu tin nào để xóa.');
                    $('.div-beforeSuccess').removeClass('pop-up_display');
                }
                if (rs['status'] == 2) {
                    alert('Lỗi..., Vui lòng thử lại!');
                    location.reload();
                }
            }
        });
    }
    return false;
}

function update_view(module, action, id) {


    $.ajax({
        type: "POST",
        url: "?mod=" + module + "&act=" + action,
        data: "id=" + id,
        cache: false,
        dataType: "json",
        beforeSend: function() {

            $('.div-beforeSuccess').addClass('pop-up_display');
        },

        success: function(rs) {

            if (rs['status'] == 1) {
                $('.div-beforeSuccess').removeClass('pop-up_display');
                $('.popup-hoanthanh').html(rs['str']);



            }
            if (rs['status'] == 0 || rs['status'] == 2) {
                alert(rs['str']);
                location.reload();
            }
        }
    });
}

function _delete(module, action, id) {

    $confirm = confirm('Bạn có muốn xóa lựa chọn này không?');
    if ($confirm == true) {

        $.ajax({
            type: "POST",
            url: "?mod=" + module + "&act=" + action,
            data: { id: id },
            cache: false,
            dataType: "json",


            beforeSend: function() {
                $('.div-beforeSuccess').addClass('pop-up_display');

            },
            success: function(rs) {

                if (rs['status'] == 1) {
                    $('.div-beforeSuccess').removeClass('pop-up_display');
                    $('.div-Success').addClass('pop-up_display');

                    setTimeout(function() { $('.div-Success').removeClass('pop-up_display'); }, 2000);
                    location.reload();
                } else if (rs['status'] == 0 || rs['status'] == 2) {
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


function notification_info(module, action, id) {


    $.ajax({
        type: "POST",
        url: "?mod=" + module + "&act=" + action,
        data: { id: id },
        cache: false,
        dataType: "json",


        success: function(rs) {

            if (rs['status'] == 1) {
                location.href = rs['link'];

            } else if (rs['status'] == 0 || rs['status'] >= 2) {


                alert(rs['msg']);

            }
        }
    });

    return false;
}

function load(stt, action) {


    $.ajax({
        type: "POST",
        url: "?mod=ajaxphiphatsinh&act=getloaiphi-view",
        data: {
            stt: stt,
            action: action
        },
        cache: false,
        dataType: "json",
        beforeSend: function() {

            $('.div-beforeSuccess').addClass('pop-up_display');
        },

        success: function(rs) {

            if (rs['status'] == 1) {
                $('.div-beforeSuccess').removeClass('pop-up_display');
                $('.popup-upload-img').html(rs['str']);


            }
            if (rs['status'] == 0 || rs['status'] == 2) {
                $('.div-beforeSuccess').removeClass('pop-up_display');
                alert(rs['msg']);

            }
        }
    });
}

function getValue(name, id, stt, action) {
    if (action == 'update') {
        $('#tenphi' + stt).attr('value', name);
        $('#idphi' + stt).attr('value', id);
        $('.popup-upload-img').removeClass('in');
    } else if (action == 'add') {
        $('#data_tenphi' + stt).attr('value', name);
        $('#data_idphi' + stt).attr('value', id);
        $('.popup-upload-img').removeClass('in');
    }

}