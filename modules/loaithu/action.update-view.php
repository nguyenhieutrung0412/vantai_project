<?php

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])){

    $id = $oClass->id_decode($_POST['id']);

    $result = $oContent->view_table("php_loaithu", "`id`=".$id." AND active = 1 LIMIT 1");
    $rs = $result->fetch();
    $total = $result->num_rows();
    $module = "'loaithu'";
    $update = "'update'";
    $frm = "'frmUpdateloaithu'";
    
    $rs['id_security'] = $oClass->id_encode($rs['id']);

    if($total==1){
        $str = '
        <div class="pop-up">
        <h3>Update</h3>
         <form name="frmUpdateloaithu" id="frmUpdateloaithu" method="post" onsubmit = "return _edit('.$module.','.$update.','.$frm.',1)"  enctype="multipart/form-data">
            
         <table class="table-input">
         <tbody>
             <tr>
                 <td class="td-first">Tên loại thu</td>
                 <td> <input type="text" name="name_loaithu"  placeholder="Tên loại thu" value="'.$rs['loaithu'].'"  required></td>
             </tr>
             <tr>
                <td class="td-first">Hạn mức chi</td>
                <td><input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  name="hanmucthu" value="'.$rs['hanmucthu'].'"  placeholder="Hạn mức thu" required></td>
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
                'str' => '(0) Lỗi: Loại thu không được hoạt động'
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