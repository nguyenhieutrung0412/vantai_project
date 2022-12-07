$(document).ready(function() {
    var $i = 1;

    $('.btn-add-product').on('click', function() {

        var $content = '<tr class="tr_row"> <td>' + $i + '</td> <td><input type="text" name="data[' + $i + '][name]" value="" required></td> <td><input type="text" name="data[' + $i + '][dvt]" value="" required></td> <td><input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57" name="data[' + $i + '][soluong]" value="" required></td> <td><input type="text" name="data[' + $i + '][ghichu]" value=""></td> <td><a class=" color-0 btn_delete_line" href="javascript:void(0)" > <i class="fa-solid fa-trash icon-delete"></i></a></td> </tr>';
        //var $content = '<tr class="tr_row"><td colspan="6">sdsdsd</td></tr>';
        var $body = $('.add-mathang');

        $($content).appendTo($body);
        $i++;

    });

    $(document).on('click', '.btn_delete_line', function() {

        if ($i > 0) {
            $(this).parents('.tr_row').remove();
        }


        $i--;
    });
    $("#search_sdt").on("keyup", function() {
        search_one_input();
    });

    function search_one_input() {

        var data = $('#search_sdt').val();

        if (data == '') {
            $('.result_search ul').html('');
        }

        $.ajax({
            type: "POST",
            url: "donhangroi/formresultkh",
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