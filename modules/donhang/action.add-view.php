<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    $module = "'donhang'";
    $add = "'add'";
    $frm = "'frmAdddonhang'";
    $img_file = 1;




    $action = "'donhangtrongoi_form'";
    $idSelect = "'loai_hang_select'";
    $name_form = "'form_donhang'";
    $module_kh = "'khachhang'";
    $add_kh = "'add-view'";




    $str = '
        <div class="pop-up">
        <span class="close_pop">×</span>
            <h3>Thêm mới</h3><div class="close_popup" onclick="return cancel()"><span>Thoát</span></div>
            <form autocomplete="off" name="frmAdddonhang" id="frmAdddonhang" method="post" onsubmit = "return add(' . $module . ',' . $add . ',' . $frm . ',1)"  enctype="multipart/form-data">
            <table class="table-input">
            <thead>
                <tr>
                    <th colspan="2" class="title_thead">Thông tin khách hàng</th>
                </tr>
            </thead>
            <tbody>
            <tr>
                    <td colspan = "2">
                        <div class="input-formsearch">
                            <label>Khách hàng: *   <span style="color:#39c449;" onclick="return add_view_deletePopup_afteradd('.$module_kh.','.$add_kh.')"><i class="fa-solid fa-plus add"></i></span> </label>
                            <input class="search_input-donhangtrongoi" type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="10" name="search_sdt-donhangtrongoi" id="search_sdt-donhangtrongoi" placeholder ="Nhập 4 số điện thoại cuối để tìm khách hàng"> 
                            <div class="result_search">
                                <ul>
                                
                                </ul>
                            </div>
                        </div>
                    </td>
                
                </tr>
                <tr class="form_donhang">

                </tr> 
                <tr   class = "info_kh">

                </tr>
                </tbody>
                </table>
              
                <table class="table-input">
                <thead>
                    <tr>
                        <th colspan="2" class="title_thead">Thông tin phí</th>
                    </tr>
                </thead>
                <tbody>
                <tr class="form-hinhthucthanhtoan">
                </tr>
               
                <tr class="">
                <td class="td-first">Ghi chú: </td>
                
                <td><textarea id="ghichu" name="ghichu" rows="4" cols="50" style="width:99%"></textarea>
            </td>
            </tr>

                </tbody> 
                </table>
                
              
               
               
                <div class="status">
                </div>

                <div class="btn-submit">
                    <button type="submit" class="submit">Tạo đơn hàng</button>
                    <button type="reset" onclick="return cancel()" class="cancel">Đóng</button>
                    
                </div>
            </form>
            <script type="text/javascript" src="template/Default/js/main_load.js"></script>
        </div>
       
        ';
    die(json_encode(
        array(
            'status' => 1,
            'str' => $str
        )
    ));
} else {
    die(json_encode(
        array(
            'status' => 2,
            'str' => '(2) Lỗi: không tồn tại thông tin'
        )
    ));
}
exit;
