$(document).ready(function() {
    $('.close_pop').on('click', function() {
        $('.popup-upload-img').removeClass('in');
        $('.popup-create').removeClass('in');
        $('.popup-create2').removeClass('in');
        $('.popup-send-notification').removeClass('in');
        $('.popup-update').removeClass('in');
        $('.popup-info').removeClass('in');
        $('.popup-timeline').removeClass('in');
        $('.popup-update2').removeClass('in');
    })


    //Examples of how to assign the Colorbox event to elements
    $(".group1").colorbox({ rel: "group1" });

    var $i = 1;
    $('.btn-phi').on('click', function() {
        $('.popup-upload-img').toggleClass('in');
    })
    $('.btn-add-product').on('click', function() {

        var $content = '<tr class="tr_row"> <td>' + $i + '</td> <td><input type="text" name="data[' + $i + '][name]" value="" required></td> <td><input type="text" name="data[' + $i + '][dvt]" value="" required></td> <td><input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57" name="data[' + $i + '][soluong]" value="" required></td> <td><input type="text" name="data[' + $i + '][ghichu]" value=""></td> <td><a class=" color-0 btn_delete_line" href="javascript:void(0)" > <i class="fa-solid fa-trash icon-delete"></i></a></td> </tr>';
        //var $content = '<tr class="tr_row"><td colspan="6">sdsdsd</td></tr>';
        var $body = $('.add-mathang');

        $($content).appendTo($body);
        $i++;

    });
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





    $i = 2;
    $('.btn-add-theodoidau').on('click', function() {
        var module = "'theodoidau'";
        var add_taixe = "'gettaixe-view'";
        var add_xe = "'getxe-view'";
        //var $content = '<tr class="tr_row"> <td>' + $i + '</td> <td> <input type="text" name="data[' + $i + '][tenphi]" class="btn-phi_data" id="data_tenphi' + $i + '" onclick="return load(' + $i + ',' + add + ')"></input>  <input type="hidden" name="data[' + $i + '][idphi]" id="data_idphi' + $i + '"></td> <td><input type="text" name="data[' + $i + '][sotien]" value="" required></td> <td><input type="text" name="data[' + $i + '][so_hoadon]" value="" required></td> <td><input type="text" id="datepicker2" name="data[' + $i + '][ngay_hoadon]" value="" required></td> <td><select name ="data[' + $i + '][thukhach]"><option value="1" >Có</option><option value="0" >Không</option></select> </td>  <td><input type="text" name="data[' + $i + '][ghichu]" value=""></td> <td><input type="file" name="data[' + $i + '][img_file]" id="img_file" value="" multiple accept= "image/*,.pdf" ></td> <td><a class=" color-0 btn_delete_line" href="javascript:void(0)" > <i class="fa-solid fa-trash icon-delete"></i></a></td> </tr>';
        var $content = '<tr  class="tr_row"><td>' + $i + '</td><td><input type="text" class=" picker"  name="data[' + $i + '][ngay_do]"  required></td><td><input type="number" max="24" min="0" class="time_input" id="" name="data[' + $i + '][gio_do]" placeholder ="giờ"  required><br><br><input type="number"max="59" min="0" class="time_input" id="" name="data[' + $i + '][phut_do]" value="00" placeholder ="phút"  required></td><td> <input type="text" name="data[' + $i + '][tentaixe]" class="btn-phi_data" id="data_ten' + $i + '"  onclick="return load_dulieu(' + module + ',' + add_taixe + ',' + $i + ')"><input type="hidden" name="data[' + $i + '][id_taixe]" id="data_id' + $i + '" ></td><td> <input type="text" name="data[' + $i + '][biensoxe]" class="btn-phi_data" id="biensoxe' + $i + '"  onclick="return load_dulieu(' + module + ',' + add_xe + ',' + $i + ')"><input type="hidden" name="data[' + $i + '][id_xe]" id="idxe' + $i + '" ></td><td><input type="text" class=" " id="" name="data[' + $i + '][km_luc_do]"  required></td><td><input type="text" class=" " id="" name="data[' + $i + '][so_lit]"  required></td><td><select name ="data[' + $i + '][dau_ngoai]" id="daungoai_' + $i + '" onchange="return GETMSD(' + $i + ',this.value)"><option value="0" >Dầu nhà</option><option value="1" >Dầu ngoài</option></select></td><input type="hidden" class=" " id="msd_truockhido_' + $i + '" name="data[' + $i + '][msd_truockhido]" required><td><input type="text" class=" " id="msd_saukhido_' + $i + '" name="data[' + $i + '][msd_saukhido]" placeholder="Mã số dầu sau khi đổ" required></td><td><input type="text" class=" " id="" name="data[' + $i + '][don_gia]"  required></td> <td><input type="file" name="data[' + $i + '][img_file]" id="img_file" value="" multiple accept= "image/*,.pdf" ></td> <td><a class=" color-0 btn_delete_line" href="javascript:void(0)" > <i class="fa-solid fa-trash icon-delete"></i></a></td></tr>';
        var $body = $('.add-theodoidau');

        $($content).appendTo($body);
        $i++;

        $('.btn-phi_data').on('click', function() {
            $('.popup-upload-img').toggleClass('in');
        })
        $("#datepicker2,.picker").datepicker({
            dateFormat: "dd/m/yy"
        });

    });
    $('.btn-add-theodoisuachua').on('click', function() {
        var module = "'theodoisuachua'";
        var add_taixe = "'gettaixe-view'";
        var add_xe = "'getxe-view'";
        var add_donvi = "'getdonvi-view'";
        //var $content = '<tr class="tr_row"> <td>' + $i + '</td> <td> <input type="text" name="data[' + $i + '][tenphi]" class="btn-phi_data" id="data_tenphi' + $i + '" onclick="return load(' + $i + ',' + add + ')"></input>  <input type="hidden" name="data[' + $i + '][idphi]" id="data_idphi' + $i + '"></td> <td><input type="text" name="data[' + $i + '][sotien]" value="" required></td> <td><input type="text" name="data[' + $i + '][so_hoadon]" value="" required></td> <td><input type="text" id="datepicker2" name="data[' + $i + '][ngay_hoadon]" value="" required></td> <td><select name ="data[' + $i + '][thukhach]"><option value="1" >Có</option><option value="0" >Không</option></select> </td>  <td><input type="text" name="data[' + $i + '][ghichu]" value=""></td> <td><input type="file" name="data[' + $i + '][img_file]" id="img_file" value="" multiple accept= "image/*,.pdf" ></td> <td><a class=" color-0 btn_delete_line" href="javascript:void(0)" > <i class="fa-solid fa-trash icon-delete"></i></a></td> </tr>';
        var $content = '<tr  class="tr_row"><td>' + $i + '</td><td><input type="text" class=" picker"  name="data[' + $i + '][ngay_suachua]"  required></td><td> <input type="text" name="data[' + $i + '][tentaixe]" class="btn-phi_data" id="data_ten' + $i + '"  onclick="return load_dulieu(' + module + ',' + add_taixe + ',' + $i + ')"><input type="hidden" name="data[' + $i + '][id_taixe]" id="data_id' + $i + '" ></td><td> <input type="text" name="data[' + $i + '][biensoxe]" class="btn-phi_data" id="biensoxe' + $i + '"  onclick="return load_dulieu(' + module + ',' + add_xe + ',' + $i + ')"><input type="hidden" name="data[' + $i + '][id_xe]" id="idxe' + $i + '" ></td><td> <input type="text" name="data[' + $i + '][ten_donvi]" class="btn-phi_data" id="ten_donvi' + $i + '"  onclick="return load_dulieu(' + module + ',' + add_donvi + ',' + $i + ')"><input type="hidden" name="data[' + $i + '][id_donvi]" id="id_donvi' + $i + '" ></td><td><input type="text" class=" " id="" name="data[' + $i + '][km_luc_suachua]"  required></td><td><input type="text" class=" " id="" name="data[' + $i + '][noidung]"  required></td><td><input type="text" class=" " id="" name="data[' + $i + '][tong_tien]"  required></td> <td><input type="file" name="data[' + $i + '][img_file]" id="img_file" value="" multiple accept= "image/*,.pdf" ></td> <td><a class=" color-0 btn_delete_line" href="javascript:void(0)" > <i class="fa-solid fa-trash icon-delete"></i></a></td></tr>';
        var $body = $('.add-theodoisuachua');

        $($content).appendTo($body);
        $i++;

        $('.btn-phi_data').on('click', function() {
            $('.popup-upload-img').toggleClass('in');
        })
        $(".picker").datepicker({
            dateFormat: "dd/m/yy"
        });

    });
    $('.btn-add-thaynhot').on('click', function() {
        var module = "'thaynhot'";
        var add_taixe = "'gettaixe-view'";
        var add_xe = "'getxe-view'";
        var add_donvi = "'getdonvi-view'";
        //var $content = '<tr class="tr_row"> <td>' + $i + '</td> <td> <input type="text" name="data[' + $i + '][tenphi]" class="btn-phi_data" id="data_tenphi' + $i + '" onclick="return load(' + $i + ',' + add + ')"></input>  <input type="hidden" name="data[' + $i + '][idphi]" id="data_idphi' + $i + '"></td> <td><input type="text" name="data[' + $i + '][sotien]" value="" required></td> <td><input type="text" name="data[' + $i + '][so_hoadon]" value="" required></td> <td><input type="text" id="datepicker2" name="data[' + $i + '][ngay_hoadon]" value="" required></td> <td><select name ="data[' + $i + '][thukhach]"><option value="1" >Có</option><option value="0" >Không</option></select> </td>  <td><input type="text" name="data[' + $i + '][ghichu]" value=""></td> <td><input type="file" name="data[' + $i + '][img_file]" id="img_file" value="" multiple accept= "image/*,.pdf" ></td> <td><a class=" color-0 btn_delete_line" href="javascript:void(0)" > <i class="fa-solid fa-trash icon-delete"></i></a></td> </tr>';
        var $content = '<tr  class="tr_row"><td>' + $i + '</td><td><input type="text" class=" picker"  name="data[' + $i + '][ngay_thaynhot]"  required></td><td> <input type="text" name="data[' + $i + '][tentaixe]" class="btn-phi_data" id="data_ten' + $i + '"  onclick="return load_dulieu(' + module + ',' + add_taixe + ',' + $i + ')"><input type="hidden" name="data[' + $i + '][id_taixe]" id="data_id' + $i + '" ></td><td> <input type="text" name="data[' + $i + '][biensoxe]" class="btn-phi_data" id="biensoxe' + $i + '"  onclick="return load_dulieu(' + module + ',' + add_xe + ',' + $i + ')"><input type="hidden" name="data[' + $i + '][id_xe]" id="idxe' + $i + '" ></td><td> <input type="text" name="data[' + $i + '][ten_donvi]" class="btn-phi_data" id="ten_donvi' + $i + '"  onclick="return load_dulieu(' + module + ',' + add_donvi + ',' + $i + ')"><input type="hidden" name="data[' + $i + '][id_donvi]" id="id_donvi' + $i + '" ></td><td><input type="text" class=" " id="" name="data[' + $i + '][km_luc_thaynhot]"  required></td><td><input type="text" class=" " id="" name="data[' + $i + '][noidung]"  required></td><td><input type="text" class=" " id="" name="data[' + $i + '][tong_tien]"  required></td> <td><input type="file" name="data[' + $i + '][img_file]" id="img_file" value="" multiple accept= "image/*,.pdf" ></td> <td><a class=" color-0 btn_delete_line" href="javascript:void(0)" > <i class="fa-solid fa-trash icon-delete"></i></a></td></tr>';
        var $body = $('.add-thaynhot');

        $($content).appendTo($body);
        $i++;

        $('.btn-phi_data').on('click', function() {
            $('.popup-upload-img').toggleClass('in');
        })
        $(".picker").datepicker({
            dateFormat: "dd/m/yy"
        });

    });
    $('.btn-add-banggia').on('click', function() {
        var module = "'khachhang'";
        var add_taixe = "'gettaixe-view'";
        var add_xe = "'getxe-view'";
        var add_donvi = "'getdonvi-view'";
        //var $content = '<tr class="tr_row"> <td>' + $i + '</td> <td> <input type="text" name="data[' + $i + '][tenphi]" class="btn-phi_data" id="data_tenphi' + $i + '" onclick="return load(' + $i + ',' + add + ')"></input>  <input type="hidden" name="data[' + $i + '][idphi]" id="data_idphi' + $i + '"></td> <td><input type="text" name="data[' + $i + '][sotien]" value="" required></td> <td><input type="text" name="data[' + $i + '][so_hoadon]" value="" required></td> <td><input type="text" id="datepicker2" name="data[' + $i + '][ngay_hoadon]" value="" required></td> <td><select name ="data[' + $i + '][thukhach]"><option value="1" >Có</option><option value="0" >Không</option></select> </td>  <td><input type="text" name="data[' + $i + '][ghichu]" value=""></td> <td><input type="file" name="data[' + $i + '][img_file]" id="img_file" value="" multiple accept= "image/*,.pdf" ></td> <td><a class=" color-0 btn_delete_line" href="javascript:void(0)" > <i class="fa-solid fa-trash icon-delete"></i></a></td> </tr>';
        var $content = '<tr  class="tr_row"><td>' + $h + '</td><td><input type="text"   name="data[' + $h + '][ten_tuyen]"  required></td><td> <input type="text" name="data[' + $h + '][km]"  required></td><td><input type="text"  id="" name="data[' + $h + '][don_gia]"  required></td><td><input type="text" class=" " id="" name="data[' + $h + '][luong_chuyen]"  required></td> <td><a class=" color-0 btn_delete_line" href="javascript:void(0)" > <i class="fa-solid fa-trash icon-delete"></i></a></td></tr>';
        var $body = $('.add-banggia');

        $($content).appendTo($body);
        $h++;


        $(".picker").datepicker({
            dateFormat: "dd/m/yy"
        });

    });

    $(document).on('click', '.btn_delete_line', function() {

        if ($i > 0) {
            $(this).parents('.tr_row').remove();
        }


        $i--;
    });
    $("#search_sdt").on("keyup", function() {
        search_one_input('donhangroi', 'formresultkh', 'search_sdt');
    });
    $("#search_sdt-donhangtrongoi").on("keyup", function() {
        search_one_input('donhang', 'formresultkh', 'search_sdt-donhangtrongoi');
    });
    $("#datepicker2,.picker").datepicker({
        dateFormat: "dd/m/yy"
    });

    $(".result_search ul").on("click", function() {
        $('.result_search ul').html('');
    });


    function search_one_input(module, action, id_input) {

        var data = $('#' + id_input).val();

        if (data == '') {
            $('.result_search ul').html('');
        }

        $.ajax({
            type: "POST",
            url: module + "/" + action,
            data: {
                data: data,

            },
            cache: false,
            dataType: "json",


            success: function(rs) {


                $('.result_search ul').html(rs['str_list']);

                $('.form_donhang').html(rs['str']);

            }
        });

        return false;
    }
})

$(".taixe_search-input").on("keyup", function() {
    // alert($('input[name=id_donhang]').val());
    search_one('donhangroi', 'taixe', $('input[name=id_donhang]').val());
});
$(".doixe_search-input").on("keyup", function() {
    //alert($('input[name=id_donhang]').val());
    search_one('donhangroi', 'doixe', $('input[name=id_donhang]').val());
});
$(".phuxe_search-input").on("keyup", function() {
    //alert($('input[name=id_donhang]').val());
    search_one('donhangroi', 'phuxe', $('input[name=id_donhang]').val());
});
$(".taixe_search-input_donhangtrongoi").on("keyup", function() {
    // alert($('input[name=id_donhang]').val());
    search_one('donhang', 'taixe', $('input[name=id_donhang]').val());
});
$(".doixe_search-input_donhangtrongoi").on("keyup", function() {
    //alert($('input[name=id_donhang]').val());
    search_one('donhang', 'doixe', $('input[name=id_donhang]').val());
});
$(".phuxe_search-input_donhangtrongoi").on("keyup", function() {
    //alert($('input[name=id_donhang]').val());
    search_one('donhang', 'phuxe', $('input[name=id_donhang]').val());
});

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


function search_one(module, class_search, id_donhang) {

    var data = $('#search_phutrach-input').val();

    if (data == '') {
        $('.result_search-phutrach ul').html('');
    }

    $.ajax({
        type: "POST",
        url: module + "/formresult_phutrach",
        data: {
            data: data,
            name: class_search,
            id_donhang: id_donhang

        },
        cache: false,
        dataType: "json",


        success: function(rs) {
            $('.result_search-phutrach ul').html(rs['str_list']);
        }
    });

    return false;
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

function onchange_search(module, action, id, name_class = null, data2 = null) {


    var name = '.' + name_class
    $.ajax({
        type: "POST",
        url: module + "/" + action,
        data: {
            id: id
        },
        cache: false,
        dataType: "json",


        success: function(rs) {



            $(name).html(rs['str']);
            $('.result_search ul').html('');

        }
    });

    return false;
}

function load(stt, action) {


    $.ajax({
        type: "POST",
        url: "donhang/getloaiphi-view",
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

function GETMSD(stt, value) {

    var name = '#msd_truockhido' + stt
    var name2 = '#msd_saukhido' + stt
    $.ajax({
        type: "POST",
        url: "theodoidau/get",
        data: {
            stt: stt,
            value: value
        },
        cache: false,
        dataType: "json",


        success: function(rs) {

            if (rs['status'] == 1) {

                //console.log(rs['str']);
                $('#msd_truockhido_' + stt).attr('value', rs['str']);
                $('#msd_saukhido_' + stt).attr('value', rs['str']);
                $('#msd_saukhido_' + stt).attr('value', rs['str']);
                $('#msd_saukhido_' + stt).attr('value', rs['str']);
                // $(name).attr('value', );
                //$(name2).attr('value', rs['str']);

            } else if (rs['status'] == 0 || rs['status'] >= 2) {
                $(name).html('');
                $('.status').html(rs['str']);


            }
        }
    });
}