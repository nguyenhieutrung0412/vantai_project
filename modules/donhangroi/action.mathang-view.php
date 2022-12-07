<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {

    $id = $oClass->id_decode($_POST['id']);

    $result = $oContent->view_table("php_mathang_donhangroi", "`id_donhangroi`=" . $id . " ");


    $module = "'donhangroi'";
    $update = "'add-line-mathang'";
    $add_line = "'add-line-mathang'";

    $frm = "'frmUpdateMatHang'";
    $name_form = "'add-mathang'";
    $rs['id_security'] = $oClass->id_encode($rs['id']);
    $stt = 1;
    while ($rs = $result->fetch()) {

        $code_pics = $oClass->id_encode($rs['id']);
        $code_act = "'" . $code_pics . "'";


        $action_delete = "'delete_mathang'";
        $str_mathang .= '  
            <tr id="pics_' . $code_pics . '">
                <td>' . $stt . '</td>
                <td><input type="text" name ="update[1][name]" value="' . $rs['ten'] . '"></td>
                <td><input type="text" name ="update[1][dvt]" value="' . $rs['dvt'] . '"></td>
                <td><input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57" name ="update[1][soluong]" value="' . $rs['soluong'] . '"></td>
                <td><input type="text" name ="update[1][ghichu]" value="' . $rs['ghichu'] . '"></td>
                <input type="hidden" name ="update[1][id]" value="' . $rs['id'] . '">
                <input type="hidden" name ="id_donhangroi" value="' . $rs['id_donhangroi'] . '">
                <td><a href="javascript:void(0)" class="{xuly.xoa} color-0" onclick= "return deleteImage(' . $module . ',' . $action_delete . ',' . $code_pics . ')"> <i class="fa-solid fa-trash icon-delete"></i></a></td>
            </tr>
                ';
        $stt++;
    }


    $str = '
        <div class="pop-up">
        <h3>Thông tin mặt hàng - Mã :' . $id . '</h3>
        <form name="frmUpdateMatHang" id="frmUpdateMatHang" method="post" onsubmit = "return _edit(' . $module . ',' . $add_line . ',' . $frm . ',1)"  enctype="multipart/form-data">
        
        <table class="table-input">
        <thead>
                        <tr  class="title-table">
                            <th>STT</th>
                            <th>Tên mặt hàng</th>
                            <th>Đơn vị tính</th>
                            <th>Số lượng</th>
                            <th>Ghi chú</th>
                           
                            <th>#</th>
                        </tr>

                    </thead>
        <tbody class="add-mathang">
            ' . $str_mathang . '
          
           
            
        </tbody>
        </table>
        
        
      
            <input type="hidden" name="id_donhangroi" value="' . $id . '">
            <div class="addline">
                <a href="javascript:void(0)" class="btn-add-product" >Thêm dòng</a>
            </div>
            <div class="btn-submit">
            <button type="submit" class="submit">Update</button>
                <button type="reset" onclick="return cancel()" class="cancel">Đóng</button>
                
            </div>
        </form>
        </div>
        
        <script type="text/javascript" src="template/Default/js/main_load.js"></script>
        
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
