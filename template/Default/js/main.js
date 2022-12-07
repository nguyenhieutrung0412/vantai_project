$(document).ready(function() {


    $(".left_menu > li > span").on("click", function() {
        $(".left_menu > li > ul").slideUp(150, function() {
            $(".left_menu > li > span").html('<i class="fa fa-chevron-down"></i>');
        }), 0 == $(this).parent().find("ul").is(":visible") && $(this).parent().find("ul").slideDown(150), $(this).html('<i class="fa fa-chevron-up"></i>');
    });

    $(".nav-in").on("click", function() {
        $("#sm-nav").toggleClass('sm-nav');
        $(".left-header").toggleClass('sm');
        $(".left-header").toggleClass('sm-navbar');
        $(".right").toggleClass('sm-right');

    });


    if ($(".btn-top").length > 0) {
        $(window).scroll(function() {
            var e = $(window).scrollTop();
            if (e > 150) {
                $(".btn-top").show()
            } else {
                $(".btn-top").hide()
            }
        });
        $(".btn-top").click(function() {
            $('body,html').animate({
                scrollTop: 0
            })
        })
    };





    //profile pop-up
    $(".drop-profile ").on('click', function() {
        $(".left-header  .profile").toggleClass('in');

    });
    $(".right .nav-bar .nav-bar-right ul .nav-item-right .drop-menu-right").on('click', function() {
            $(".right .nav-bar .nav-bar-right ul .nav-item-right .profile ").toggleClass('in');
        })
        //popup-create
    $('.btn-create').on('click', function() {
        $('.popup-create').toggleClass('in');
    })
    $('.btn-create2').on('click', function() {
        $('.popup-create2').toggleClass('in');
    })
    $('.btn-thuongnong').on('click', function() {
        $('.popup-update').toggleClass('in');
    })
    $('.btn-tangca').on('click', function() {
        $('.popup-update').toggleClass('in');
    })
    $('.btn-update ').on('click', function() {
        $('.popup-update').toggleClass('in');
    })
    $('#update_active ').on('click', function() {
        $('.popup-update').toggleClass('in');
    })
    $('.btn-update2 ').on('click', function() {
        $('.popup-update2').toggleClass('in');
    })
    $('.btn-detail').on('click', function() {
        $('.popup-images').toggleClass('in');
    })
    $('.order_taixe_popup ').on('click', function() {
        $('.popup-dieulenh').toggleClass('in');
    })
    $('.order_phuxe_popup ').on('click', function() {
        $('.popup-dieulenh').toggleClass('in');
    })
    $('.order_doixe_popup ').on('click', function() {
        $('.popup-dieulenh').toggleClass('in');
    })

    $('.info').on('click', function() {
        $('.popup-info').toggleClass('in');
    })

    $('.btn-phanquyen').on('click', function() {
        $('.popup-phanquyen').toggleClass('in');
    })
    $('.btn-notification').on('click', function() {
        $('.notification').toggleClass('in');
    })
    $('.send-notification').on('click', function() {
        $('.popup-send-notification').toggleClass('in');
    })


    $('.cancel ').on('click', function() {
        $('.popup-create').removeClass('in');
        $('.popup-create2').removeClass('in');
        $('.popup-send-notification').removeClass('in');

    })
    $('.cancel-img ').on('click', function() {
        $('.popup-images').removeClass('in');

    });
    $("#datepicker").multiDatesPicker();

});



function formatTienTe(tiente) {
    return tiente.split('').reverse().reduce((prev, next, index) => {
        return ((index % 3) ? next : (next + ',')) + prev
    })
}

function popup() {
    $('.popup-update').toggleClass('in');
    $('.popup-info').removeClass('in');

}

function cancel() {
    $('.popup-update').removeClass('in');
    $('.popup-update2').removeClass('in');
    $('.popup-create').removeClass('in');
}

function cancel2() {
    $('.popup-dieulenh').removeClass('in');
    $('.popup-phanquyen').removeClass('in');
    $('.popup-info').removeClass('in');
    $('.popup-create_add').removeClass('in');

}

function back_prev() {


    history.back();
}

function checkAll(id) {

    if ($("#checkbox-all" + id).is(':checked')) {
        $(".table-input tr td .check" + id).prop("checked", true);
    } else {
        $(".table-input tr td .check" + id).prop("checked", false);
    }
};

function check_All() {

    if ($("#checkbox-all").is(':checked')) {
        $(".check").prop("checked", true);
    } else {
        $(".check").prop("checked", false);
    }
};


function phanquyenview(id) {
    $.ajax({
        type: "POST",
        url: "phongban/phanquyenview",
        data: {
            id: id,
        },
        cache: false,
        dataType: "json",
        beforeSend: function() {

            $('.div-beforeSuccess').addClass('pop-up_display');
        },

        success: function(rs) {


            if (rs['status'] == 1) {
                $('.div-beforeSuccess').removeClass('pop-up_display');
                $('.popup-phanquyen').html(rs['str']);


            }
            if (rs['status'] == 0 || rs['status'] == 2) {
                alert(rs['str']);
                location.reload();
            }
        }
    });
}



function add(module, action, formName, file_id) {

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

function add_question(module, action, formName, file_id) {

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
    $confirm = confirm('Nhấn OK để tạo đơn hàng tổng');
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
    } else {
        return false;
    }
    return false;

};

function add_view(module, action, id = null) {


    $.ajax({
        type: "POST",
        url: module + "/" + action,
        data: { id: id },
        cache: false,
        dataType: "json",
        beforeSend: function() {

            $('.div-beforeSuccess').addClass('pop-up_display');
        },

        success: function(rs) {

            if (rs['status'] == 1) {
                $('.div-beforeSuccess').removeClass('pop-up_display');
                $('.popup-create').html(rs['str']);



            }
            if (rs['status'] == 0 || rs['status'] == 2) {
                alert(rs['str']);
                location.reload();
            }
        }
    });
}

function add_not_reload(module, action, formName, file_id) {

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
        url: module + "/" + action,
        data: form_data,
        cache: false,
        dataType: "json",
        processData: false,
        contentType: false,

        success: function(rs) {

            if (rs['status'] == 1) {

                $('.popup-create_add').removeClass('in');
                alert(rs['msg']);
            } else if (rs['status'] == 0 || rs['status'] == 2 || rs['status'] == 3) {

                alert(rs['msg']);

            }
        }
    });
    return false;

};

function add_view_deletePopup_afteradd(module, action, id = null) {


    $.ajax({
        type: "POST",
        url: module + "/" + action,
        data: { id: id },
        cache: false,
        dataType: "json",
        beforeSend: function() {

            $('.div-beforeSuccess').addClass('pop-up_display');
        },

        success: function(rs) {

            if (rs['status'] == 1) {
                $('.div-beforeSuccess').removeClass('pop-up_display');

                $('.popup-create_add').toggleClass('in');
                $('.popup-create_add').html(rs['str']);



            }
            if (rs['status'] == 0 || rs['status'] == 2) {
                alert(rs['str']);
                location.reload();
            }
        }
    });
}


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

function update_view(module, action, id) {


    $.ajax({
        type: "POST",
        url: module + "/" + action,
        data: "id=" + id,
        cache: false,
        dataType: "json",
        beforeSend: function() {

            $('.div-beforeSuccess').addClass('pop-up_display');
        },

        success: function(rs) {

            if (rs['status'] == 1) {
                $('.div-beforeSuccess').removeClass('pop-up_display');
                $('.popup-update').html(rs['str']);



            }
            if (rs['status'] == 0 || rs['status'] == 2) {
                alert(rs['str']);
                location.reload();
            }
        }
    });
}

function update_view2(module, action, id) {


    $.ajax({
        type: "POST",
        url: module + "/" + action,
        data: "id=" + id,
        cache: false,
        dataType: "json",
        beforeSend: function() {

            $('.div-beforeSuccess').addClass('pop-up_display');
        },

        success: function(rs) {

            if (rs['status'] == 1) {
                $('.div-beforeSuccess').removeClass('pop-up_display');
                $('.popup-update2').html(rs['str']);



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
            url: module + "/" + action,
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

//
function active_user(module, action, id) {
    $confirm = confirm('Xác nhận thay đổi!!!');
    if ($confirm == true) {
        $.ajax({
            type: "POST",
            url: module + "/" + action,
            data: "id=" + id,
            cache: false,
            dataType: "json",

            success: function(rs) {

                if (rs['status'] == 1) {
                    alert(rs['msg']);
                    location.reload();
                }
                if (rs['status'] == 0) {
                    alert(rs['msg']);

                }
            }
        });
    } else {
        return false;
    }
    return false;
}

function logout() {
    $.ajax({
        type: "POST",
        url: "login/logout",
        data: "id =" + 1080,
        cache: false,
        dataType: "json",

        success: function(rs) {

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

function dieulenh(module, action, id_donhang, id_phutrach, name_phutrach, nameform) {
    var name = '.' + nameform
    $.ajax({
        type: "POST",
        url: module + "/" + action,
        data: {
            id_donhang: id_donhang,
            id_phutrach: id_phutrach,
            name_phutrach: name_phutrach
        },
        cache: false,
        dataType: "json",
        beforeSend: function() {

            $('.div-beforeSuccess').addClass('pop-up_display');
        },

        success: function(rs) {

            if (rs['status'] == 1) {
                $('.div-beforeSuccess').removeClass('pop-up_display');
                $(name).html(rs['str']);


            }
            if (rs['status'] == 0 || rs['status'] == 2) {
                alert(rs['str']);
                location.reload();
            }
        }
    });
}

function dieulenh_update(module, action, id_donhang, id_phutrach, name_phutrach) {

    $.ajax({
        type: "POST",
        url: module + "/" + action,
        data: {
            id_donhang: id_donhang,
            id_phutrach: id_phutrach,
            name_phutrach: name_phutrach
        },
        cache: false,
        dataType: "json",
        beforeSend: function() {

            $('.div-beforeSuccess').addClass('pop-up_display');
        },

        success: function(rs) {

            if (rs['status'] == 1) {
                $('.div-beforeSuccess').removeClass('pop-up_display');
                $('.div-Success').addClass('pop-up_display');
                alert(rs['msg']);
                setTimeout(function() { $('.div-Success').removeClass('pop-up_display'); }, 2600);
                location.reload();


            }
            if (rs['status'] == 0 || rs['status'] == 2) {
                alert(rs['msg']);
                location.reload();
            }
        }
    });
}



function Print(module, action, id) {
    $.ajax({
        url: module + "/" + action,
        data: {
            id: id
        },
        type: "POST",
        cache: false,
        dataType: "json",
        beforeSend: function() {
            $('.div-beforeSuccess').addClass('pop-up_display');
        },
        success: function(rs) {

            if (rs['status'] == 1) {
                $('.div-beforeSuccess').removeClass('pop-up_display');
                var newWin = window.open();
                newWin.document.write('<title>In thông tin</title>');
                newWin.document.write(rs['str']);
                newWin.document.close();
                newWin.focus();
                newWin.print();
                newWin.close();
            }
            if (rs['status'] == 0) {
                alert('Không thể in phiếu. Vui lòng liên hệ bộ phận kiểm duyệt!');
                location.reload();
            }
        }
    });
    return false;
}

function export_Excel(module, action, formName) {
    var data = document.getElementById(formName);
    var form_data = new FormData(data);
    $.ajax({
        url: module + "/" + action,
        data: form_data,
        type: "POST",
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
                location.href = rs['link'];
            }
            if (rs['status'] == 0) {
                alert('Không thể xuất file!');
                location.reload();
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

            if (rs['status'] == 1) {
                $('.div-beforeSuccess').removeClass('pop-up_display');
                $('.popup-info').html(rs['str']);


            }
            if (rs['status'] == 0 || rs['status'] == 2) {
                alert(rs['str']);
                location.reload();
            }
        }
    });
}

function deleteImage(module, action, id) {
    var conf = window.confirm('Bạn có muốn xóa?');
    if (conf === false) {
        return false;
    } else {
        $.ajax({
            type: "POST",
            url: module + "/" + action,
            data: "id=" + id,
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

function search(module, action, formName) {


    var data = document.getElementById(formName);
    var form_data = new FormData(data);

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

            if (rs['status'] == 1) {
                $('.div-beforeSuccess').removeClass('pop-up_display');
                $('.popup-info').html(rs['str']);
            } else if (rs['status'] == 0 || rs['status'] >= 2) {

                $('.div-beforeSuccess').removeClass('pop-up_display');
                alert(rs['msg']);
                location.reload();
            }
        }
    });

    return false;
}

function search_one_input(module, action, id_input, name_form) {

    var data = document.getElementById(id_input).value;


    var name = '.' + name_form
    $.ajax({
        type: "POST",
        url: module + "/" + action,
        data: {
            data: data,

        },
        cache: false,
        dataType: "json",


        success: function(rs) {

            if (rs['status'] == 1) {

                $(name).html(rs['str']);

            } else if (rs['status'] == 2) {

                alert(rs['msg']);
                $(name).html(rs['str']);
            }
        }
    });

    return false;
}


function search_link(module, action, formName) {


    var data = document.getElementById(formName);
    var form_data = new FormData(data);

    $.ajax({
        type: "POST",
        url: module + "/" + action,
        data: form_data,
        cache: false,
        dataType: "json",
        processData: false,
        contentType: false,

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


function notification_info(module, action, id) {


    $.ajax({
        type: "POST",
        url: module + "/" + action,
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

function animation_img() {
    //Examples of how to assign the Colorbox event to elements
    $(".group1").colorbox({ rel: 'group1', width: "auto", height: "90%", transition: "fade" });
    $(".group2").colorbox({ rel: 'group2', transition: "fade" });
    $(".group3").colorbox({ rel: 'group3', transition: "none", width: "75%", height: "75%" });
    $(".group4").colorbox({ rel: 'group4', slideshow: true });
    $(".ajax").colorbox();
    $(".youtube").colorbox({ iframe: true, innerWidth: 640, innerHeight: 390 });
    $(".vimeo").colorbox({ iframe: true, innerWidth: 500, innerHeight: 409 });
    $(".iframe").colorbox({ iframe: true, width: "80%", height: "80%" });
    $(".inline").colorbox({ inline: true, width: "50%" });
    $(".callbacks").colorbox({
        onOpen: function() { alert('onOpen: colorbox is about to open'); },
        onLoad: function() { alert('onLoad: colorbox has started to load the targeted content'); },
        onComplete: function() { alert('onComplete: colorbox has displayed the loaded content'); },
        onCleanup: function() { alert('onCleanup: colorbox has begun the close process'); },
        onClosed: function() { alert('onClosed: colorbox has completely closed'); }
    });

    $('.non-retina').colorbox({ rel: 'group5', transition: 'none' })
    $('.retina').colorbox({ rel: 'group5', transition: 'none', retinaImage: true, retinaUrl: true });

    //Example of preserving a JavaScript event for inline calls.
    $("#click").click(function() {
        $('#click').css({ "background-color": "#f00", "color": "#fff", "cursor": "inherit" }).text("Open this window again and this message will still be here.");
        return false;
    });
}

function onchangeDateSelect(module, action, idClass1, idClass2) {
    var data = document.getElementById(idClass1).value;
    var data2 = document.getElementById(idClass2).value;
    $.ajax({
        type: "POST",
        url: module + "/" + action,
        data: {
            data: data,
            data2: data2
        },
        cache: false,
        dataType: "json",


        success: function(rs) {

            if (rs['status'] == 1) {

                $('.status').html('');
                $('.list_nhansu').html(rs['str']);

            } else if (rs['status'] == 0 || rs['status'] >= 2) {
                $('.list_nhansu').html('');
                $('.status').html(rs['str']);


            }
        }
    });

    return false;
}

function onchangeDateSelect2(module, action, idClass1, name_class = null, data2 = null) {
    var data = document.getElementById(idClass1).value;

    var name = '.' + name_class
    $.ajax({
        type: "POST",
        url: module + "/" + action,
        data: {
            data: data,
            data2: data2
        },
        cache: false,
        dataType: "json",


        success: function(rs) {

            if (rs['status'] == 1) {


                $('.status').html('');
                $(name).html(rs['str']);

            } else if (rs['status'] == 0 || rs['status'] >= 2) {
                $(name).html('');
                $('.status').html(rs['str']);


            }
        }
    });

    return false;
}

//



function active_all(module, action) {


    $.ajax({
        type: "POST",
        url: module + "/" + action,
        data: 1,
        cache: false,
        dataType: "json",
        beforeSend: function() {

            $('.div-beforeSuccess').addClass('pop-up_display');
        },

        success: function(rs) {

            if (rs['status'] == 1) {
                $('.div-beforeSuccess').removeClass('pop-up_display');
                alert(rs['msg']);
                location.reload();

            }
            if (rs['status'] == 0 || rs['status'] == 2) {
                $('.div-beforeSuccess').removeClass('pop-up_display');
                alert(rs['msg']);
                location.reload();
            }
        }
    });
}