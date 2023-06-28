<?php

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])){

    $id = $oClass->id_decode($_POST['id']);

    $result = $oContent->view_table("php_ungluong", "`id`=".$id."  LIMIT 1");
    $rs = $result->fetch();
    $result2 = $oContent->view_table("php_nhansu", "`id`=".$rs['user_id']." LIMIT 1");
    $rs2 = $result2->fetch();
    $total = $result->num_rows();
    $module = "'ungluong'";
    $update = "'update'";
    $frm = "'frmUpdateungluong'";
    $img_file = 1;
    $rs['id_security'] = $oClass->id_encode($rs['id']);

    $result3 = $oContent->view_table("php_nhansu");
    while($rs3 = $result3->fetch()){
        $loaichi .= ' <option value="'.$rs3['id'].'" >'.$rs3['name'].'</option>';
    }



    if($total==1){
        $id_gallery = "'#lightgallery'";
        $str = '
        <div class="pop-up">
        <span class="close_pop">×</span>
        <h3>Cập nhật ứng lương</h3>
         <form name="frmUpdateungluong" id="frmUpdateungluong" method="post" onsubmit = "return _edit('.$module.','.$update.','.$frm.','.$img_file.')"  enctype="multipart/form-data">
            
         <table class="table-input">
         <tbody>
            <tr>
                <td class="td-first">Tên nhân sự *</td>
                 <td>
                    <select name="nhan_su" id="nhan_su" >
                     <option value="'.$rs['user_id'].'">'.$rs2['name'].'</option>
                    '.$loaichi.'
                    </select>
                </td>
            </tr>
           
                 <td class="td-first">Số tiền ứng * </td>
                <td><input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  name="so_tien_ung" value="'.$rs['so_tien_ung'].'"   placeholder="Số điện thoại người nhận" required></td>
             </tr>
            
         </tbody>
         </table>
            <input type="hidden" name="id" value="'.$rs['id_security'].'">
            <div class="btn-submit">
                
                <button type="submit" class="submit">Cập nhật</button>
                <button type="reset" onclick="return cancel()"  class="cancel">Đong</button>
            </div>
        </form>
        <script type="text/javascript" src="template/Default/js/main_load.js"></script>
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