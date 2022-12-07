<?php

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])){

    $id = $oClass->id_decode($_POST['id']);

    $result = $oContent->view_table("php_menu_phanquyen", "`id`=".$id." LIMIT 1");
    $rs = $result->fetch();
    $result2 = $oContent->view_table("php_menu", "`id`=".$rs['id_menu_cha']."  LIMIT 1");
    $rs2 = $result2->fetch();
    
    $total = $result->num_rows();
    $module = "'menuadmin'";
    $update = "'update-sub'";
    $frm = "'frmUpdatemenu-sub'";
    
    $rs['id_security'] = $oClass->id_encode($rs['id']);
    $result3 = $oContent->view_table("php_menu");
    
        while( $rs3 = $result3->fetch()){
            $menu .= ' <option value="'.$rs3['id'].'" >'.$rs3['name_menu'].'</option>';
        }
    
    if($total==1){
        $str = '
        <div class="pop-up">
        <h3>Update</h3>
         <form name="frmUpdatemenu-sub" id="frmUpdatemenu-sub" method="post" onsubmit = "return _edit('.$module.','.$update.','.$frm.',1)"  enctype="multipart/form-data">
            
         <table class="table-input">
         <tbody>
             <tr>
                 <td class="td-first">Tên menu-sub</td>
                 <td> <input type="text" name="name_menu-sub"  placeholder="Tên menu" value="'.$rs['name'].'"  required></td>
             </tr>
             <tr>
             <td class="td-first">Tên menu chính</td>
             <td>
                <select name="id_menucha" id="id_menucha">
                    <option value="'.$rs['id_menu_cha'].'">'.$rs2['name_menu'].'</option>
                 
                       '.$menu.'
                  
                </select>
            </td>
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