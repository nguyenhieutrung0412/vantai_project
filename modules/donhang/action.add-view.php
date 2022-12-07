<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    $module = "'donhang'";
    $add = "'add'";
    $frm = "'frmAdddonhang'";
    $img_file = 1;




    $action = "'donhangtrongoi_form'";
    $idSelect = "'loai_hang_select'";
    $name_form = "'form_donhang'";





    $str = '
        <div class="pop-up">

            <h3>Thêm mới</h3>
            <form autocomplete="off" name="frmAdddonhang" id="frmAdddonhang" method="post" onsubmit = "return add(' . $module . ',' . $add . ',' . $frm . ',1)"  enctype="multipart/form-data">
            <table class="table-input">
            <tbody>
                <tr>
                    <td class="td-first">Dịch vụ:</td>
                    <td> 
                        <div class="select_filter">
                            <div class="card_all">
                                <select name="loai_hang_select" id="loai_hang_select"  onchange="return onchangeDateSelect2(' . $module . ',' . $action . ',' . $idSelect . ',' . $name_form . ');">
                                    <option value="0">---Chọn dịch vụ---</option>
                                    <option value="1">Đơn hàng trọn gói</option>
                                    
                                </select>
                            </div>
                        </div>
                    </td>
                <tr>
                <tr class="form_donhang">

                </tr> 
                <tr   class = "info_kh">

                </tr>
                <tr class="form-nguoinhan">
                </tr>
                <tr class="form-hinhthucthanhtoan">
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
