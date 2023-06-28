<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $module = "'donhangroi'";

    $action = "'active'";


    $frm = "'frmAddactive'";
    $img_file = "'img_file'";

    $id = $oClass->id_decode($_POST['id']);

    $result = $oContent->view_table("php_donhangroi", "`id`=" . $id . "  LIMIT 1");
    $rs = $result->fetch();
    $rs['id_security'] = $oClass->id_encode($rs['id']);

    
    if ($rs['active'] == 0) {
        $str = '
        <div class="pop-up">
        <h3>Thêm thông tin </h3>
        <form name="frmAddactive" id="frmAddactive" method="post" onsubmit ="return _edit(' . $module . ',' . $action . ',' . $frm . ',' . $img_file . ')"  enctype="multipart/form-data">
            <div >
                <table class="table-input">
                    <tbody>
                        <tr>
                            <td class="td-first">Số km của chuyến hàng  *</td>
                            <td>
                                <input type="text" name="km_chuyenhang"   value="' . $rs['km_chuyenhang'] . '"  placeholder="Tổng km hoàn thành chuyến hàng"  required>
                            </td>
                        </tr>
                        
                    
                      
                      
                        <input type="hidden" name="id"   value="' . $rs['id_security'] . '">
                    </tbody>
                </table>
            </div>
            <div class="btn-submit">
              
                <button type="submit" class="submit">Cập nhật</button>
                <button type="reset" onclick="return cancel()" class="cancel">Đóng</button>
            </div>
        </form>
    </div>
       
        ';
    } else {
        $str = '
        <div class="pop-up">
        <h3>Cập nhật thông tin </h3>
        <form name="frmAddactive" id="frmAddactive" method="post" onsubmit ="return _edit(' . $module . ',' . $action . ',' . $frm . ',' . $img_file . ')"  enctype="multipart/form-data">
            <div >
                <table class="table-input">
                    <tbody>
                    <tr>
                        <td class="td-first">Số km của chuyến hàng  *</td>
                        <td>
                            <input type="text" name="km_chuyenhang"   value="' . $rs['km_chuyenhang'] . '"  placeholder="Tổng km hoàn thành chuyến hàng"  required>
                        </td>
                    </tr>
                         
                      
                        <input type="hidden" name="id"   value="' . $rs['id_security'] . '">
                    </tbody>
                </table>
            </div>
            <div class="btn-submit">
              
                <button type="submit" class="submit">Cập nhật</button>
                <button type="reset" onclick="return cancel()" class="cancel">Đóng</button>
            </div>
        </form>
    </div>
       
        ';
    }

    die(json_encode(
        array(
            'status' => 1,
            'str' => $str
        )
    ));
}
