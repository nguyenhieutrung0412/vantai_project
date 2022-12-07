<?php

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])){

    $id = $oClass->id_decode($_POST['id']);

    $result = $oContent->view_table("php_phieuchi", "`id`=".$id."  LIMIT 1");
    $rs = $result->fetch();
    $result2 = $oContent->view_table("php_loaichi", "`id`=".$rs['loai_chi']." LIMIT 1");
    $rs2 = $result2->fetch();
    $total = $result->num_rows();
    $module = "'phieuchi'";
    $update = "'update'";
    $frm = "'frmUpdatephieuchi'";
    $img_file = "'img_file'";
    $rs['id_security'] = $oClass->id_encode($rs['id']);

    $result3 = $oContent->view_table("php_loaichi");
    while($rs3 = $result3->fetch()){
        $loaichi .= ' <option value="'.$rs3['id'].'" >'.$rs3['loai_chi'].'</option>';
    }

        //lấy danh sách hình ảnh nếu có
        $kt_img = $oContent->view_table("php_images","type = 'php_phieuchi' AND type_id = '".$id."'");
        $total_img = $kt_img->num_rows();
        $p=1;

        while($ds = $kt_img->fetch()){
            $code_pics = $oClass->id_encode($ds['id']);
            $code_act = "'".$code_pics."'";
            
            $module = "'phieuchi'";
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
        $kt_file = $oContent->view_table("php_file","type = 'php_phieuchi' AND type_id = '".$id."'");
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
            $module = "'phieuchi'";
            $action = "'delete_file'";
            $file_list .= '<p id="pics_'.$code_file.'" style="padding:3px 0;clear:both;width:100%;float:left"><a href="data/upload/files/'.$ds_file['file_name'].'" target="_blank">'.$arr_file[$ds_file['file_type']].' '.$ds_file['file_name'].'</a>
            <a class="color-0" href="javascript:void(0)" onclick="return deleteImage('.$module.','.$action.','.$code_file_act.')" title="Xóa file" class="red"><i class="fa fa-trash"></i> Xóa</a>
            </p>';
        }
        if($total_file>0){
            $list_file = '<tr><td colspan="2">'.$file_list.'</td></tr>';
        }


    if($total==1){
        $id_gallery = "'#lightgallery'";
        $str = '
        <div class="pop-up">
        <h3>Update</h3>
         <form name="frmUpdatephieuchi" id="frmUpdatephieuchi" method="post" onsubmit = "return _edit('.$module.','.$update.','.$frm.','.$img_file.')"  enctype="multipart/form-data">
            
         <table class="table-input">
         <tbody>
            <tr>
                <td class="td-first">Tên loại chi</td>
                 <td>
                    <select name="loai_chi" id="loai_chi" >
                     <option value="'.$rs['loai_chi'].'">'.$rs2['loai_chi'].'</option>
                    '.$loaichi.'
                    </select>
                </td>
            </tr>
            <tr>
                 <td class="td-first">Họ tên người nhận</td>
                <td><input type="text"  name="name_nguoinhan"  placeholder="Họ tên người chi" value="'.$rs['name_nguoinhan'].'"  required></td>
             </tr>
              <tr>
                 <td class="td-first">Địa chỉ người nhận</td>
                <td><input type="text"  name="diachi_nguoinhan"  placeholder="Địa chỉ người nhận" value="'.$rs['diachi_nguoinhan'].'"  required></td>
             </tr>
              <tr>
                 <td class="td-first">Số điện thoại người chi</td>
                <td><input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  name="phone_nguoinhan" value="'.$rs['phone_nguoinhan'].'"   placeholder="Số điện thoại người nhận" required></td>
             </tr>
             <tr>
                 <td class="td-first">Số tiền chi</td>
                <td><input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="'.$rs['sotien_chi'].'"  name="sotien_chi"  placeholder="Số tiền chi" required></td>
             </tr>
             <tr>
             <td class="td-first">Số tiền bằng chữ</td>
            <td><input type="text"   name="sotien_bangchu"  placeholder="Số tiền bằng chữ" value="'.$rs['sotien_bangchu'].'"  required></td>
         </tr>
             <tr>
                 <td class="td-first">Nội dung chi</td>
                <td><input type="text"  name="noidung_chi" value="'.$rs['noidung_chi'].'"  placeholder="Nội dung chi" required></td>
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
                
                <button type="submit" class="submit">Update</button>
                <button type="reset" onclick="return cancel()"  class="cancel">Đóng</button>
            </div>
        </form>
        <script type="text/javascript">
        $(document).ready(function(){
            return animation_img();
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
                'str' => '(0) Lỗi: Loại chi không được hoạt động'
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