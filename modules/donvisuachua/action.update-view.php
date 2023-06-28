<?php

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])){

    $id = $oClass->id_decode($_POST['id']);

    $result = $oContent->view_table("php_donvi_suachua", "`id`=".$id."  LIMIT 1");
    $rs = $result->fetch();
    $total = $result->num_rows();
    $module = "'donvisuachua'";
    $update = "'update'";
    $frm = "'frmUpdateloaihang'";
    
    $rs['id_security'] = $oClass->id_encode($rs['id']);

    if($total==1){
        $str = '
        <div class="pop-up">
        <span class="close_pop">×</span>
        <h3>Cập nhật đơn vị sửa chữa</h3>
         <form name="frmUpdateloaihang" id="frmUpdateloaihang" method="post" onsubmit = "return _edit('.$module.','.$update.','.$frm.',1)"  enctype="multipart/form-data">
            
         <table class="table-input">
         <tbody>
             <tr>
                 <td class="td-first">Tên đơn vị *</td>
                 <td> <input type="text" name="ten_donvi"  placeholder="Tên đơn vị sửa chữa" value="'.$rs['ten_donvi'].'"  required></td>
             </tr>
             <tr>
                <td class="td-first">Số điện thoại đơn vị *</td>
                <td> <input type="text" name="sdt"  placeholder="Số điện thoại đơn vị sửa chữa" value="'.$rs['sdt'].'"  required></td>
            </tr>
             <tr>
                 <td class="td-first">Địa chỉ *</td>
                 <td> <input type="text" name="dia_chi"  placeholder="Địa chỉ đơn vị sửa chữa" value="'.$rs['dia_chi'].'"  required></td>
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