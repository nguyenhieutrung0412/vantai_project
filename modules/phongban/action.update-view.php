<?php
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])){

   

//     encode(12_____12)_____676 => 23456rtyundfhjt97864
//    $arr = explode('_____',decode($id));
//    $id = $arr[0];
//    $phone = $arr[1];
    $id = $oClass->id_decode($_POST['id']);

    $result = $oContent->view_table("php_phongban", "`id`=".$id."  LIMIT 1");
    $rs = $result->fetch();
    $total = $result->num_rows();

    $module = "'phongban'";
    $update = "'update'";
    $frm = "'frmUpdatePhongBan'";
    $rs['id_security'] = $oClass->id_encode($rs['id']);

    if($total==1){
        $str = '
        <div class="pop-up">
        <span class="close_pop">×</span>
            <h3>Cập nhật phòng ban</h3>
            <form name="frmUpdatePhongBan" id="frmUpdatePhongBan" method="post" onsubmit = "return _edit('.$module.','.$update.','.$frm.',1)"  enctype="multipart/form-data">
                
                <table class="table-input">
                    <tbody>
                        <tr>
                            <td class="td-first">Tên phòng ban *</td>
                            <td> <input type="text" name="name"  placeholder="Name" value="'.$rs['chuc_vu'].'" required></td>
                        </tr>
                    </tbody>
                </table>
            
                <input type="hidden" name="id" value="'.$rs['id_security'].'">
                <div class="btn-submit">
                    
                    <button type="submit" class="submit">Cập nhật</button>
                    <button type="reset" onclick="return cancel()" class="cancel">Đóng</button>
                </div>
            </form>
            <script type="text/javascript" src="template/Default/js/main_load.js"></script>
        </div>';
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