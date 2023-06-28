<?php

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])){

    $id = $oClass->id_decode($_POST['id']);

    $result = $oContent->view_table("php_taixe", "`id`=".$id." AND active = 1 LIMIT 1");
    $rs = $result->fetch();
    $total = $result->num_rows();
    $module = "'tai-xe'";
    $update = "'update'";
    $frm = "'frmUpdatetaixe'";
    $change_action = "'change_nhanluong'";
    $id_select = "'hinhthucnhanluong2'";
    $namefrm = "'text_tilehoahong'";
    //xử lý select lương chuyến
    if($rs['tile_hoahong'] > 0 )
    {
        $tilehoahong = ' Selected';
    }
    else if($rs['luong_chuyen'] == 1)
    {
        $yes_luongchuyen = ' Selected';
    }
    else{
        $select = ' Selected';
    }
    //end
    	// format tien te
	$rs['luong_taixe'] = number_format($rs['luong_taixe'], 0, ',', '.') . "";
	$rs['phu_cap'] = number_format($rs['phu_cap'], 0, ',', '.') . "";
    $rs['id_security'] = $oClass->id_encode($rs['id']);
    
        //lấy danh sách hình ảnh nếu có
        $kt_img = $oContent->view_table("php_images","type = 'php_taixe' AND type_id = '".$id."'");
        $total_img = $kt_img->num_rows();
        $p=1;

        while($ds = $kt_img->fetch()){
            $code_pics = $oClass->id_encode($ds['id']);
            $code_act = "'".$code_pics."'";
            
            $module = "'tai-xe'";
            $action = "'delete_img'";
            if($p%4==0){$ds['fix'] = ' fix';}
            
            $img .= '
            <li class="'.$ds['fix'].'" id="pics_'.$code_pics.'">
	
            <a class="colorboxv group1" style="cursor:zoom-in"  href="data/upload/images/'.$ds['file_name'].'">
                <img  class="img-responsive"src="data/upload/images/'.$ds['file_name'].'">
            </a>
            <span class="color-0" onclick="return deleteImage('.$module.','.$action.','.$code_act.')"><i class="fa fa-trash "></i> Xóa</span></li>
            
            ';
            
            $p++;
        }
        if($total_img>0){
            $hinhanh = '<tr>
                    <td colspan="2">
                    
                    <div class="demo-gallery">
                        <ul class="picslist list-unstyled row"  id="lightgallery">
                        
                        '.$img.'
                        
                        </ul>
                    </div>
                    
                    </td>
                </tr>';
        }

        //lấy danh sách file nếu có
        $kt_file = $oContent->view_table("php_file","type = 'php_taixe' AND type_id = '".$id."'");
        $total_file= $kt_file->num_rows();

        $arr_file = array(
        'pdf'=>'<i class="fa fa-file-pdf-o"></i> ',
        'doc'=>'<i class="fa fa-file-word-o"></i> ',
        'docx'=>'<i class="fa fa-file-word-o"></i> ',
        'xls'=>'<i class="fa fa-file-excel-o"></i> ',
        'xlsx'=>'<i class="fa fa-file-excel-o"></i> '
        );

        while($ds_file = $kt_file->fetch()){
            $code_file = $oClass->id_encode($ds_file['id']);
            $code_file_act = "'".$code_file."'";
            $module = "'tai-xe'";
            $action = "'delete_file'";
            $file_list .= '<p id="pics_'.$code_file.'" style="padding:3px 0;clear:both;width:100%;float:left"><a href="data/upload/files/'.$ds_file['file_name'].'" target="_blank">'.$arr_file[$ds_file['file_type']].' '.$ds_file['file_name'].'</a>
            <a class="color-0" href="javascript:void(0)" onclick="return deleteImage('.$module.','.$action.','.$code_file_act.')" title="Xóa file" class="red"><i class="fa fa-trash"></i> Xóa</a>
            </p>';
        }
        if($total_file>0){
            $list_file = '<tr><td colspan="2">'.$file_list.'</td></tr>';
        }

    if($total==1){
        $str = '
        <div class="pop-up">
        <span class="close_pop">×</span>
        <h3>Cập nhật tài xế</h3>
         <form name="frmUpdatetaixe" id="frmUpdatetaixe" method="post" onsubmit = "return _edit('.$module.','.$update.','.$frm.',1)"  enctype="multipart/form-data">
            
         <table class="table-input">
         <tbody>
             <tr>
                 <td class="td-first">Họ và tên *</td>
                 <td> <input type="text" name="name"  placeholder="Name" value="'.$rs['name_taixe'].'"  required></td>
             </tr>
             <tr>
                <td class="td-first">Số điện thoại *</td>
                <td><input type="tel" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="10" name="phone" value="'.$rs['phone_taixe'].'"  placeholder="Số điện thoại" required></td>
            </tr>
            <tr>
            <td class="td-first">Địa chỉ *</td>
            <td><input type="text" name="address"  placeholder="Lương tài xế" value="'.$rs['address_taixe'].'" required></td>
            </tr>
            <tr>
            <td class="td-first">Số điện thoại người thân *</td>
            <td>
                <input type="text" name="sdt_nguoithan"  placeholder="Số điện thoại người thân" value = "'.$rs['sdt_nguoithan'].'" required>
            </td>
        </tr>
         <tr>
            <td class="td-first">CMND *</td>
            <td>
                <input type="text" name="cmnd"  placeholder="CMND" value = "'.$rs['cmnd'].'" required>
            </td>
        </tr>
         <tr>
            <td class="td-first">Ngày vào làm *</td>
            <td>
                <input type="text" class="picker" name="ngayvaolam"  placeholder="Ngày vào làm" value = "'.$rs['ngayvaolam'].'" required>
            </td>
        </tr>
            <tr>
                <td class="td-first">Hạng bằng lái *</td>
                <td><input type="text" name="hangbanglai"  placeholder="Lương tài xế" value="'.$rs['hangbanglai'].'" required></td>
            </tr>
            <tr>
                <td class="td-first">Lương tài xế *</td>
                <td><input type="text" name="luong_taixe"  placeholder="Lương tài xế" value="'.$rs['luong_taixe'].'" required></td>
            </tr>
            <tr>
                <td class="td-first">Phụ cấp *</td>
                <td><input type="text" name="phu_cap"  placeholder="Phụ cấp" value="'.$rs['phu_cap'].'" required></td>
            </tr>
            <tr>
                <td class="td-first">Bảo hiểm xã hội *</td>
                <td><input type="text" name="tien_baohiem"  placeholder="" value="'.$rs['tien_baohiem'].'" required></td>
            </tr>
            <tr>
                <td class="td-first">Hình thức nhận lương *</td>
                <td>
                    <select name="hinhthucnhanluong" id="hinhthucnhanluong2"  onchange="return onchangeDateSelect2('.$module.','.$change_action.','.$id_select.','.$namefrm.');">
                        <option value="0" '.$select.'>Lương cơ bản</option>
                        <option value="1" '.$yes_luongchuyen.'>Lương chuyến</option>
                        <option value="2" '.$tilehoahong.'>Lương hoa hồng sản lượng</option>
                    </select>
                </td>
            </tr>
            <tr class="text_tilehoahong">
                
            </tr>
            <tr>
                <td class="td-first">Số tài khoản *</td>
                <td><input type="text" name="stk"  placeholder="" value="'.$rs['stk'].'" required></td>
            </tr>
            <tr>
                <td class="td-first">Tên ngân hàng *</td>
                <td><input type="text" name="ten_nganhang"  placeholder="" value="'.$rs['ngan_hang'].'" required></td>
            </tr>
            <tr>
                <td class="td-first">Mật khẩu mới(Không bắc buộc)</td>
                <td><input type="password" name="password" placeholder="Đổi mật khẩu nếu nhập" ></td>
            </tr>
            <tr>
            <td class="td-first">Hình ảnh đính kèm(nếu có)</td>
           <td><input type="file"  name="img_file[]" id="img_file" multiple accept= "image/*"></td>
        </tr>
        '.$hinhanh.'
        <tr>
           <td class="td-first">Hình file đính kèm(nếu có)</td>
           <td><input type="file"  name="pdf_file[]" id="pdf_file" multiple accept= ".pdf, .docx, .doc,.xls,.xlsx"></td>
       </tr>
       '.$list_file.'
         </tbody>
         </table>
            <input type="hidden" name="id" value="'.$rs['id_security'].'">
            <div class="btn-submit">
                
                <button type="submit" class="submit">Cập nhật</button>
                <button type="reset" onclick="return cancel()" class="cancel">Đóng</button>
            </div>
        </form>
        <script type="text/javascript" src="template/Default/js/main_load.js"></script>
        <script>
        $( function() {
                  
            $( ".picker" ).datepicker({
                dateFormat: "dd/m/yy"
            });
        });
        </script>
    </div>
        ';
        die(json_encode(
            array(
                'status' => 1,
                'str' => $str
            )
           ));
    }else{
        die(json_encode(
            array(
                'status' => 0,
                'str' => '(0) Lỗi: Tài khoản đã bị khóa hoặc không tồn tại'
            )
           ));
    }
}else{
    die(json_encode(
        array(
            'status' => 2,
            'str' => '(2) Lỗi: không tồn tại thông tin'
        )
       ));
}
exit;