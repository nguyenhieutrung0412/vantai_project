<?php
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])){

    $id = $oClass->id_decode($_POST['id']);

    $result = $oContent->view_table("php_phongban", "`id`=".$id."  LIMIT 1");
    $rs = $result->fetch();
    $rs['id_security'] = $oClass->id_encode($rs['id']);

    $quyen = $oContent->view_table("php_quyen", "`id_phongban`=".$id);
  
    $total = $quyen->num_rows();

    //menu và đã phan quyen
    if($total > 0){
        $menuphanquyen ='';

        $menu_all = $oContent->view_table("php_menu");
        while($rs_menu = $menu_all->fetch()){
                $arr_menu[] = $rs_menu;
        }
          for($i = 0;$i < count($arr_menu);$i++)
          {
    
            if($arr_menu[$i]['active' ] == 1){
                $arr_menu[$i]['checked_menucha'] = ' checked';
            }
            $menuphanquyen .= '
            <tr class = "menu_cha" > 
            <td colspan ="2">'.$arr_menu[$i]['name_menu'].'
            <input class="input-checkbox " type="checkbox" name="menu-cha['.$arr_menu[$i]['id'].'][active]"'. $arr_menu[$i]['checked_menucha'].'>
            <input type="hidden" name="menu-cha['.$arr_menu[$i]['id'].'][name]" value="'.$arr_menu[$i]['name_menu' ].'" >
            </td>
            </tr>
            ';
            
            $menuquyen = $oContent->view_table("php_menu_phanquyen"," id_menu_cha = ".$arr_menu[$i]['id']);
            $menuquyen_num = $menuquyen->num_rows();
            if($menuquyen_num > 0){
                while($rs_menuquyen = $menuquyen->fetch()){
               
                    //xử lý lấy quyền của những phòng ban đã có quyền
        
                        $quyen_2 = $model->db->query("SELECT * FROM php_quyen WHERE id_menu_quyen = ".$rs_menuquyen['id']." AND id_phongban = ".$id);
                        $rs_quyen = $quyen_2->fetch();
                        if($rs_quyen['active' ] == 1){
                            $rs_quyen['checked_active'] = ' checked';
                        }
                        if($rs_quyen['them'  ]== 1){
                            $rs_quyen['checked_them'] = ' checked';
                        }
            
                        if($rs_quyen['xoa'] == 1 ){
                            $rs_quyen['checked_xoa'] = ' checked';
                        }
            
                        if($rs_quyen['sua']==1){
                            $rs_quyen['checked_sua'] = ' checked';
                        }   
            
            
            
                            $menuphanquyen .= '<tr>
                                <td><span class="name">'.$rs_menuquyen['name'].'</span> <input  class="input-checkbox"  type="checkbox"  name="array['.$rs_menuquyen['id'].'][xem]" '.$rs_quyen['checked_active'].'  > </td>
                                <td>
                                    <input class="input-checkbox" type="checkbox" id="checkbox-all'.$rs_menuquyen['id'].'" onclick="return checkAll('.$rs_menuquyen['id'].')" >
                                    <label for="all">Chọn tất cả</label><br>
                                    <input class="input-checkbox check'.$rs_menuquyen['id'].'" type="checkbox" name="array['.$rs_menuquyen['id'].'][them]" '.$rs_quyen['checked_them'].'>
                                    <label for="them">Thêm</label><br>
            
                                    <input class="input-checkbox check'.$rs_menuquyen['id'].'" type="checkbox" name="array['.$rs_menuquyen['id'].'][xoa]" '.$rs_quyen['checked_xoa'].'>
                                    <label for="xoa">Xóa</label><br>
            
                                    <input class="input-checkbox check'.$rs_menuquyen['id'].'" type="checkbox" name="array['.$rs_menuquyen['id'].'][sua]" '.$rs_quyen['checked_sua'].'>
                                    <label for="sua">Sửa</label><br>
                                    <input type="hidden" name="array['.$rs_menuquyen['id'].'][fixbug]">
        
                                </td>   
                                                     
                            </tr>';
                                  
                            
                        }
                    }
            
        }
    }
    else{
            //menu 

            $menu_all = $oContent->view_table("php_menu");
            while($rs_menu = $menu_all->fetch()){
                    $arr_menu[] = $rs_menu;
            }
            $menu ='';
            for($i = 0;$i < count($arr_menu);$i++)
            {
                
                $menu .= '
                <tr class = "menu_cha" > 
                <td colspan ="2">'.$arr_menu[$i]['name_menu'].'
                <input class="input-checkbox " type="checkbox" name="menu-cha['.$arr_menu[$i]['id'].'][active] "checked>
                <input type="hidden" name="menu-cha['.$arr_menu[$i]['id'].'][name]" value="'.$arr_menu[$i]['name_menu' ].'" >
                </td>
                </tr>
                ';

                $menuquyen = $oContent->view_table("php_menu_phanquyen"," id_menu_cha = ".$arr_menu[$i]['id']);
                $menuquyen_num = $menuquyen->num_rows();
                if($menuquyen_num > 0){
                    while($rs_menuquyen = $menuquyen->fetch()){
                        $menu .= '
                    
                        <tr>
                    
                        <td><span class="name">'.$rs_menuquyen['name'].'</span> <input  class="input-checkbox" type="checkbox"   name="array['.$rs_menuquyen['id'].'][xem]" checked > </td>
                        <td>
                            <input class="input-checkbox" type="checkbox" id="checkbox-all'.$rs_menuquyen['id'].'"  onclick="return checkAll('.$rs_menuquyen['id'].')">
                            <label for="all">Chọn tất cả</label><br>
                            <input class="input-checkbox check'.$rs_menuquyen['id'].'" type="checkbox" name="array['.$rs_menuquyen['id'].'][them]" >
                            <label for="them">Thêm</label><br>
        
                            <input class="input-checkbox check'.$rs_menuquyen['id'].'" type="checkbox" name="array['.$rs_menuquyen['id'].'][xoa]" >
                            <label for="xoa">Xóa</label><br>
        
                            <input class="input-checkbox check'.$rs_menuquyen['id'].'" type="checkbox" name="array['.$rs_menuquyen['id'].'][sua]" >
                            <label for="sua">Sửa</label><br>
                        
                            
                        </td>
                                            
                    </tr>
                    ';}
                    }
                }   
    }

    $module ="'phongban'";
    $action ="'update-phanquyen'";
    $form ="'frmUpdatequyen'";
    if($total>0){

        $str = '
        <div class="pop-up">
        <h3>Phân quyền cho phòng ban:'.$rs['chuc_vu'].'  <a onclick="return cancel2()">Thoát</a></h3>
        <form name="frmUpdatequyen" id="frmUpdatequyen" method="post" onsubmit = "return _edit('.$module.','.$action.','.$form.',1)"  enctype="multipart/form-data">
           <table class="table-input">
                    <tbody>
                        '.$menuphanquyen.'
                       
                    </tbody>
                </table>
                <input type="hidden" name="id_phongban" value="'.$rs['id_security'].'">
            <div class="btn-submit">
                
                <button type="submit" class="submit">Update</button>
                <button type="reset" onclick="return cancel2()" class="cancel">Đóng</button>
            </div>
        </form>

        </div>';
        die(json_encode(
            array(
                'status' => 1,
                'str' => $str,
                
            )
           ));
    
    }else{
        $str = ' <div class="pop-up">
        <h3>Phân quyền cho phòng ban:'.$rs['chuc_vu'].'  <a onclick="return cancel2()">Thoát</a></h3>
        <form name="frmUpdatequyen" id="frmUpdatequyen" method="post" onsubmit = "return _edit('.$module.','.$action.','.$form.',1)"  enctype="multipart/form-data">
           <table class="table-input">
                    <tbody>
                       '.$menu.'
                       
                    </tbody>
            </table>
            <input type="hidden" name="id_phongban" value="'.$rs['id_security'].'">
            <div class="btn-submit">
                
                <button type="submit" class="submit">Update</button>
                <button type="reset" onclick="return cancel2()" class="cancel">Đóng</button>
            </div>
        </form>
        </div>';
        die(json_encode(
            array(
                'status' => 1,
                'str' => $str,
            
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