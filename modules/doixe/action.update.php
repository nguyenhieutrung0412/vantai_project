<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
     //xử lý lấy số điện thoại doi xe
     $sdt_tx = explode(" ",trim($_REQUEST['list_tx']));
     if(end($sdt_tx) != ''){
       
        $id_taixe = $oContent->view_table("php_taixe","`phone_taixe` = '".end($sdt_tx)."' AND active = 1 LIMIT 1");
        $rs = $id_taixe->fetch();
     }else{
        $rs['id'] = '';
     }
    
        
   
    $data = array(
        'id' => $oClass->id_decode($_REQUEST['id']),
        'loaixe'=>htmlspecialchars(trim($_REQUEST['loaixe'])),
        'biensoxe'=>htmlspecialchars(trim($_REQUEST['biensoxe'])),
        'tai_trong'=>htmlspecialchars(trim($_REQUEST['tai_trong'])),
        'han_dang_kiem'=>htmlspecialchars(trim($_REQUEST['han_dang_kiem'])),
        'so_khoi'=>htmlspecialchars(trim($_REQUEST['so_khoi'])),
        'taixe'=>end($sdt_tx),
        'id_taixe' => $rs['id'],

       );
       if($data['id_taixe'] == ''){
        $data['id_taixe'] = 0;
        $data['taixe'] = '';
        $oClass->update("php_doixe",$data,"id=".$data['id']);
        $oClass->upload_files('php_doixe',$data['id']);
        $oClass->upload_images('php_doixe',$data['id'],$chatluong_hinhupload);
       }
       else{
        // $result_tx = $oContent->view_table("php_doixe"," `id_taixe`= ".$data['id_taixe'] );
        // $total_tx = $result_tx->num_rows();
        // if( $total_tx == 0 ){
         $oClass->update("php_doixe",$data,"id=".$data['id']);
         $result_tx = $oContent->view_table("php_doixe"," `id_taixe`= ".$data['id_taixe'] );
         $total_tx = $result_tx->num_rows();
         if( $total_tx > 1 ){
            $data['id_taixe'] = 0;
            $data['taixe'] = '';
            $oClass->update("php_doixe",$data,"id=".$data['id']);
            $oClass->upload_files('php_doixe',$data['id']);
            $oClass->upload_images('php_doixe',$data['id'],$chatluong_hinhupload);
            die(json_encode(
                     array(
                         
                         'status'=> '3',
                         'msg' => '(3)Trùng tài xế hệ thống sẽ xóa bỏ tên tài xế phụ trách ở xe này!'
                     )
                    ));
         }
        // }
        // else{
        //  die(json_encode(
        //      array(
                 
        //          'status'=> '0',
        //          'msg' => 'Tài xế đã có xe phụ trách'
        //      )
        //     ));
        // }
       }

     
   
   
   die(json_encode(
    array(
        
        'status'=> '1',
        'msg' => 'Update thành công'
    )
   ));

}
else{
    die(json_encode(array(
        'status' => '0',
        'msg' => 'Update thất bại'
    )));
   
}
 exit;