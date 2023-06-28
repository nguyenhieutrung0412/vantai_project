<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
   
     $data = array(
     'id' => $oClass->id_decode($_POST['id_phongban']),
     'phan_quyen'=>json_encode($_POST),
    );
     $oClass->update("php_phongban",$data,"id=".$data['id']);

        for($i= 1;$i <= count($_POST['menu-cha']);$i++ ){
            $data3= array(
                'id_menu_cha' => $i,
                'ten' => $_POST['menu-cha'][$i]['name'],
                'id_phongban' =>$data['id']

            );
         
      
            if(isset($_POST['menu-cha'][$i]['active'])){
                $data3['active'] = 1;
            }
            else{
                $data3['active'] = 0;
            }
            $menu_cha = $oContent->view_table("php_quyen_menucha",  "id_menu_cha = ".$data3['id_menu_cha']  ." AND ten='".$data3['ten']."' AND id_phongban = ".$data['id']);
            $menucha_count = $menu_cha->num_rows();
            if($menucha_count > 0)
            {
                $oClass->update("php_quyen_menucha",$data3,"id_menu_cha=".$data3['id_menu_cha']." AND ten='".$data3['ten'] ."' AND id_phongban = ".$data['id']);
            }
            else{
                $oClass->insert("php_quyen_menucha",$data3);
            }
           
          
            
        }

     
        for($i = 1;$i <= count($_POST['array']);$i++ ){
            $quyen_menu = $model->db->query("SELECT * FROM php_menu_phanquyen WHERE id=".$i);
            $quyen_menu2 = $quyen_menu->fetch();
                $data2 = array(
                    'id_menu_quyen' => $quyen_menu2['id'],
                    'ten_quyen' => $quyen_menu2['name'],
                    'id_phongban' =>$data['id']
                );
                
                    if(isset($_POST['array'][$i]['xem'])){
                        $data2['active'] = 1;
                    }
                    else{
                        $data2['active'] = 0;
                    }
                    if(isset($_POST['array'][$i]['them'])){
                        $data2['them'] = 1;
                    }
                    else{
                        $data2['them'] = 0;
                    }
                    if(isset($_POST['array'][$i]['xoa'])){
                        $data2['xoa'] = 1;
                    }
                    else{
                        $data2['xoa'] = 0;
                    }
                    if(isset($_POST['array'][$i]['sua'])){
                        $data2['sua'] = 1;
                    }
                    else{
                        $data2['sua'] = 0;
                    }
            $quyen = $oContent->view_table("php_quyen", "ten_quyen='".$data2['ten_quyen']."' AND id_phongban = ".$data2['id_phongban']);
            $quyen_count = $quyen->num_rows();
            if($quyen_count > 0){
                $oClass->update("php_quyen",$data2,"id_phongban=".$data['id']." AND ten_quyen ='".$data2['ten_quyen']."'");
            }
            else{
              
                $oClass->insert("php_quyen",$data2);
            }       
        }
   die(json_encode(
    array( 
        'array' =>$_POST['array'],
        'name' =>$data2,
        'status'=> '1',
        'msg' => 'Thêm thành công'
    )
   ));
}
else{
    die(json_encode(array(
        'status' => '0',
        'msg' => 'Thêm thất bại'
    )));
   
}
 exit;