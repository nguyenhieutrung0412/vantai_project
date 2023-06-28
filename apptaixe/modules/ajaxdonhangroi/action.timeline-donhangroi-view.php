<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    $module = "'ajaxdonhangroi'";
    $add = "'timeline-update'";
    $frm = "'frmAdddonhangroi'";
    $img_file = "'img_file'";

    $id = $oClass->id_decode($_POST['id']);

    $result = $oContent->view_table("php_donhangroi", "`id`=" . $id . "  LIMIT 1");
    $rs = $result->fetch();
    $rs['id_security'] = $oClass->id_encode($rs['id']);
   


    //xử lý lấy hình ảnh theo tình trạng đơn
   
    if($_POST['name'] == '1')
    {
        $_name_img = '_danggiaohang';
        $_name = "'_danggiaohang'";
        $_name_title = 'đang giao hàng';
        $_name_tinhtrang = 1;
        $date = "date_danggiao";
    }
    elseif($_POST['name'] == '2')
    {
        $_name_img = '_hoanthanh';
        $_name = "'_hoanthanh'";
        $_name_title = '';
        $_name_tinhtrang = 2;
        $date = "date_hoanthanh_timeline";
    }
    $checkbox ='<input class="checkbox_input" type="checkbox" checked id="checkbox'.$_name_img.'"  name="checkbox'.$_name_img.'" value="1"   >';
    
    //  else if ($rs['tinhtrangdon'] == 0) {
        
    
    
    
    // }
    //lấy danh sách hình ảnh nếu có
    $kt_img = $oContent->view_table("php_images", "type = 'php_donhangroi".$_name_img."' AND type_id = '" . $rs['id'] . "'");
    $total_img = $kt_img->num_rows();
    $p = 1;

    while ($ds = $kt_img->fetch()) {
        $code_pics = $oClass->id_encode($ds['id']);
        $code_act = "'" . $code_pics . "'";

     
        $action_delete = "'delete_img-timeline'";
        if ($p % 4 == 0) {
            $ds['fix'] = ' fix';
        }
        if ($rs['tinhtrangdon'] != 4) {
            $img .= '
            <li  id="pics_' . $code_pics . '"  class="' . $ds['fix'] . '">
                  
                        <a class="colorbox group1" style="cursor:zoom-in" href="../data/upload/images/' . $ds['file_name'] . '" >
                            <img class="img-responsive" src="../data/upload/images/' . $ds['file_name'] . '">
                        </a>
                   
                    <span class="color-0" onclick="return deleteImage(' . $module . ',' . $action_delete . ',' . $code_act . ',' . $_name . ')"><i class="fa fa-trash "></i> Xóa</span>
            </li>
        ';
        } else {
            $img .= '
            <li  id="pics_' . $code_pics . '"  class="' . $ds['fix'] . '">
                  
                        <a class="colorbox group1" style="cursor:zoom-in" href="../data/upload/images/' . $ds['file_name'] . '" >
                            <img class="img-responsive" src="../data/upload/images/' . $ds['file_name'] . '">
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

    $str = ' <div class="popup">
    <h4>Cập nhật tình trạng '.$_name_title.'</h4>
    <form autocomplete="off" name="frmAdddonhangroi" id="frmAdddonhangroi" method="post" onsubmit = "return _edit(' . $module . ',' . $add . ',' . $frm . ','.$img_file.')"  enctype="multipart/form-data">
    <table class="table-input">
        <thead>
            <tr>
                <th colspan="2" class="title_thead">Thông tin '.$_name_title.' </th>
            </tr>
        </thead>
        <tbody>
        <tr>
            <td class="td-first">Thời gian đã hoàn thành: </td>
            <td style="color:#28d82c"> '.$rs[$date].'</td>
            
        </tr>
            <tr>
                <td class="td-first">Hình ảnh đính kèm(nếu có)</td>
                <td><input type="file"  name="img_file[]" id="img_file" multiple accept= "image/*"></td>
            </tr>
            ' . $hinhanh . '
           
    
                    
                    <td class="col2 remove" colspan="2"> 
                    '.
                    $checkbox.
                    '
                        <label for="checkbox'.$_name_img.'"> Hoàn thành '.$_name_title.'?</label>
                    </td>
                    </tr>
               
        
    
    
   
       

    <input type="hidden" name="name_tinhtrang"   value="' . $_name_tinhtrang . '">
                    <input type="hidden" name="id"   value="' . $rs['id_security'] . '">
                </tbody>
                </table>
                <div class="status">
                </div>
                <div class="btn-submit">
                    <button type="submit" class="submit">Cập nhật</button>
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
