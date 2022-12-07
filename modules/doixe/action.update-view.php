<?php

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])){

    $id = $oClass->id_decode($_POST['id']);

    $result = $oContent->view_table("php_doixe", "`id`=".$id." AND active = 1 LIMIT 1");
    $rs = $result->fetch();
    $total = $result->num_rows();
    if($rs['id_taixe'] != 0 && $rs['id_taixe'] != null){
        $taixe = $oContent->view_table("php_taixe", "`phone_taixe`=".$rs['taixe']." AND active = 1 LIMIT 1");
        $rs_taixe = $taixe->fetch();
        $rs_taixe['name_taixe_xuly'] = $rs_taixe['name_taixe']." ".$rs_taixe['phone_taixe'];
    
    }
    //xử lý xuất tài xế chưa có xe phụ  trách 
    $taixe_doixe =  $model->db->query("SELECT id_taixe FROM php_doixe");
    while($taixe_dacoxe = $taixe_doixe->fetch()){
        if($taixe_dacoxe['id_taixe'] > 0){
            $idtaixe[] = $taixe_dacoxe['id_taixe'];
        }
        
    }
    
    $taixe_all=  $model->db->query("SELECT * FROM php_taixe");
    while($taixe_chuacoxe = $taixe_all->fetch()){
        if(!in_array($taixe_chuacoxe['id'],$idtaixe)){
            $str .= '<option value="'.$taixe_chuacoxe['name_taixe'].' '.$taixe_chuacoxe['phone_taixe'].'">';
        }
    }
    
   
    $module = "'doixe'";
    $update = "'update'";
    $frm = "'frmUpdateDoixe'";
    $rs['id_security'] = $oClass->id_encode($rs['id']);

    if($total==1){
        $str = '
        <div class="pop-up">
        <h3>Update</h3>
         <form name="frmUpdateDoixe" id="frmUpdateDoixe" method="post" onsubmit = "return _edit('.$module.','.$update.','.$frm.',1)"  enctype="multipart/form-data">
            
         
         <table class="table-input">
         <tbody>
             <tr>
                 <td class="td-first">Loại xe</td>
                 <td><input type="text" name="loaixe"  placeholder="Loại xe" value="'.$rs['loaixe'].'"  required> </td>
             </tr>
             <tr>
                <td class="td-first">Biển số xe</td>
                <td>  <input type="text" name="biensoxe"  placeholder="Biển số xe" value="'.$rs['biensoxe'].'" required> </td>
            </tr>
            <tr>
                <td class="td-first">Tài xế phụ trách</td>
                <td><input list="list_tx" name="list_tx" value="'.$rs_taixe['name_taixe_xuly'].'" >
                <datalist id="list_tx">
               '.$str.'
                </datalist> </td>
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