<?php

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])){

    $id = $oClass->id_decode($_POST['id']);

    $result = $oContent->view_table("php_loaichi", "`id`=".$id." AND active = 1 LIMIT 1");
    $rs = $result->fetch();
    $total = $result->num_rows();
    $module = "'loaichi'";
    $update = "'update'";
    $frm = "'frmUpdateloaichi'";
    
    $rs['id_security'] = $oClass->id_encode($rs['id']);

    if($total==1){
        $str = '
        <div class="pop-up">
        <h3>Update</h3>
         <form name="frmUpdateloaichi" id="frmUpdateloaichi" method="post" onsubmit = "return _edit('.$module.','.$update.','.$frm.',1)"  enctype="multipart/form-data">
            
         <table class="table-input">
         <tbody>
             <tr>
                 <td class="td-first">Tên loại chi</td>
                 <td> <input type="text" name="name_loaichi"  placeholder="Tên loại chi" value="'.$rs['loai_chi'].'"  required></td>
             </tr>
             <tr>
                <td class="td-first">Hạn mức chi</td>
                <td><input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  name="hanmucchi" value="'.$rs['hanmucchi'].'"  placeholder="Hạn mức chi" required></td>
            </tr>
            <tr>
           
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