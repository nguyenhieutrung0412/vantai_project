<?php

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])){

    $id = $oClass->id_decode($_POST['id']);

    $result = $oContent->view_table("php_kho", "`id`=".$id." AND active = 1 LIMIT 1");
    $rs = $result->fetch();
    $total = $result->num_rows();
    $module = "'khohang'";
    $update = "'update'";
    $frm = "'frmUpdatekho'";
    
    $rs['id_security'] = $oClass->id_encode($rs['id']);

    if($total==1){
        $str = '
        <div class="pop-up">
        <span class="close_pop">×</span>
        <h3>Cập nhật kho hàng</h3>
         <form name="frmUpdatekho" id="frmUpdatekho" method="post" onsubmit = "return _edit('.$module.','.$update.','.$frm.',1)"  enctype="multipart/form-data">
            
         <table class="table-input">
         <tbody>
             <tr>
                 <td class="td-first">Tên kho *</td>
                 <td> <input type="text" name="ten_kho"  placeholder="Tên kho" value="'.$rs['ten_kho'].'"  required></td>
             </tr>
             <tr>
                <td class="td-first">Địa chỉ kho *</td>
                <td><input type="text"  name="diachi_kho" value="'.$rs['diachi_kho'].'"  placeholder="Địa chỉ kho" required></td>
            </tr>
            <tr>
           
         </tbody>
         </table>
            <input type="hidden" name="id" value="'.$rs['id_security'].'">
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