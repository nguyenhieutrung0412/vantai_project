<?php

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])){

    $id = $oClass->id_decode($_POST['id']);

    $result = $oContent->view_table("php_luongnhansu", "`id`=".$id."  LIMIT 1");
    $rs = $result->fetch();
    $total = $result->num_rows();
    $module = "'luongnhansu'";
    $update = "'update'";
    $frm = "'frmUpdateluongnhansu'";
    $img_file = "'1'";
    $rs['id_security'] = $oClass->id_encode($rs['id']);

   
     
    if($total==1){
      
        $str = '
        <div class="pop-up">
        <h3>Update</h3>
         <form name="frmUpdateluongnhansu" id="frmUpdateluongnhansu" method="post" onsubmit = "return _edit('.$module.','.$update.','.$frm.','.$img_file.')"  enctype="multipart/form-data">
            
         <table class="table-input">
         <tbody>
            <tr>
                <td class="td-first">Tiền bảo hiểm</td>
                
                    <td><input type="text"  name="tien_bao_hiem"  placeholder="tiền bảo hiểm" value="'.$rs['tien_bao_hiem'].'"  required></td>
               
            </tr>
            <tr>
                <td class="td-first">Phụ cấp</td>
                <td><input type="text"  name="phu_cap"  placeholder="phụ cấp" value="'.$rs['phu_cap'].'"  required></td>
            </tr>
           
            </tbody>
            </table>
                <input type="hidden" name="id" value="'.$rs['id_security'].'">
                <div class="btn-submit">
                    
                    <button type="submit" class="submit">Update</button>
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