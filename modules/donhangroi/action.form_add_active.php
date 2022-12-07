<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $module = "'donhangroi'";

    $action = "'active-donhangcon'";


    $frm = "'frmAddactive'";
    $img_file = "'img_file'";

    $id = $oClass->id_decode($_POST['id']);

    $result = $oContent->view_table("php_donhangroi_s", "`id`=" . $id . "  LIMIT 1");
    $rs = $result->fetch();
    $rs['id_security'] = $oClass->id_encode($rs['id']);

    //lấy danh sách hình ảnh nếu có
    $kt_img = $oContent->view_table("php_images", "type = 'php_donhangroi_s' AND type_id = '" . $rs['id'] . "'");
    $total_img = $kt_img->num_rows();
    $p = 1;

    while ($ds = $kt_img->fetch()) {
        $code_pics = $oClass->id_encode($ds['id']);
        $code_act = "'" . $code_pics . "'";

        $module = "'donhangroi'";
        $action_delete = "'delete_img'";
        if ($p % 4 == 0) {
            $ds['fix'] = ' fix';
        }
        if ($rs['tinhtrangdon'] == 0) {
            $img .= '
            <li  id="pics_' . $code_pics . '"  class="' . $ds['fix'] . '">
                  
                        <a class="colorbox group1" style="cursor:zoom-in" href="data/upload/images/' . $ds['file_name'] . '" >
                            <img class="img-responsive" src="data/upload/images/' . $ds['file_name'] . '">
                        </a>
                   
                    <span class="color-0" onclick="return deleteImage(' . $module . ',' . $action_delete . ',' . $code_act . ')"><i class="fa fa-trash "></i> Xóa</span>
            </li>
        ';
        } else {
            $img .= '
            <li  id="pics_' . $code_pics . '"  class="' . $ds['fix'] . '">
                  
                        <a class="colorbox group1" style="cursor:zoom-in" href="data/upload/images/' . $ds['file_name'] . '" >
                            <img class="img-responsive" src="data/upload/images/' . $ds['file_name'] . '">
                        </a>
                   
                   
            </li>
        ';
        }


        $p++;
    }
    if ($total_img > 0) {
        $hinhanh = '<tr>
				<td colspan="2">
                
                <div class="demo-gallery">
                    <ul class="picslist "  >
                     
                    ' . $img . '
                    
                    </ul>
                </div>
                   
                </td>
			</tr>';
    }

    if ($rs['tinhtrangdon'] == 0) {
        $str = '
        <div class="pop-up">
        <h3>Thêm thông tin người thực nhận</h3>
        <form name="frmAddactive" id="frmAddactive" method="post" onsubmit ="return _edit(' . $module . ',' . $action . ',' . $frm . ',' . $img_file . ')"  enctype="multipart/form-data">
            <div >
                <table class="table-input">
                    <tbody>
                        <tr>
                            <td class="td-first">Họ và tên người nhận</td>
                            <td>
                                <input type="text" name="ten_nguoinhan_thuc"   value="' . $rs['ten_nguoinhan_thuc'] . '"  placeholder="Name"  required>
                            </td>
                        </tr>
                         <tr>
                            <td class="td-first">Số điện thoại người nhận</td>
                            <td>
                                <input type="tel"   value="' . $rs['phone_nguoinhan_thuc'] . '" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="10" name="phone_nguoinhan_thuc"  placeholder="Số điện thoại" required>
                            </td>
                        </tr>
                         <tr>
                            <td class="td-first">CMND/CCCD</td>
                            <td>
                                <input type="text" name="cmnd_nguoinhan_thuc"   value="' . $rs['cmnd_nguoinhan_thuc'] . '"  placeholder="CMND/CCCD" required>
                              
                            </td>
                        </tr>
                        <tr>
                            <td class="td-first">Hình ảnh đính kèm(nếu có)</td>
                            <td><input type="file"  name="img_file[]" id="img_file" multiple accept= "image/*"></td>
                        </tr>
                        ' . $hinhanh . '
                        <tr>
                        
                        <td class="col2" colspan="2"><input class="checkbox_input" type="checkbox" id="checkbox_active"  name="checkbox_active" value="1"  >
                            <label for="checkbox_active"> Kết thúc đơn hàng?</label>
                        </td>
                        </tr>
                      
                        <input type="hidden" name="id"   value="' . $rs['id_security'] . '">
                    </tbody>
                </table>
            </div>
            <div class="btn-submit">
              
                <button type="submit" class="submit">Thêm</button>
                <button type="reset" onclick="return cancel()" class="cancel">Đóng</button>
            </div>
        </form>
    </div>
       
        ';
    } else {
        $str = '
        <div class="pop-up">
        <h3>Thêm thông tin người thực nhận</h3>
        <form name="frmAddactive" id="frmAddactive" method="post" onsubmit ="return _edit(' . $module . ',' . $action . ',' . $frm . ',' . $img_file . ')"  enctype="multipart/form-data">
            <div >
                <table class="table-input">
                    <tbody>
                        <tr>
                            <td class="td-first">Họ và tên người nhận</td>
                            <td>
                                <input type="text" name="ten_nguoinhan_thuc"   value="' . $rs['ten_nguoinhan_thuc'] . '"  placeholder="Name" readonly  required>
                            </td>
                        </tr>
                         <tr>
                            <td class="td-first">Số điện thoại người nhận</td>
                            <td>
                                <input type="tel"   value="' . $rs['phone_nguoinhan_thuc'] . '" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="10" name="phone_nguoinhan_thuc"  placeholder="Số điện thoại" readonly required>
                            </td>
                        </tr>
                         <tr>
                            <td class="td-first">CMND/CCCD</td>
                            <td>
                                <input type="text" name="cmnd_nguoinhan_thuc"   value="' . $rs['cmnd_nguoinhan_thuc'] . '"  placeholder="CMND/CCCD" readonly required>
                              
                            </td>
                        </tr>
            
                        ' . $hinhanh . '
                        <tr>
                        
                        <td class="col2" colspan="2"><input class="checkbox_input" type="checkbox"  name="checkbox_active" id ="checkbox_active" value="1" checked  >
                            <label for="checkbox_active"> Kết thúc đơn hàng?</label>
                        </td>
                        </tr>
                      
                        <input type="hidden" name="id"   value="' . $rs['id_security'] . '">
                    </tbody>
                </table>
            </div>
            <div class="btn-submit">
              
                <button type="submit" class="submit">Thêm</button>
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
