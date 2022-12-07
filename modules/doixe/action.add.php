<?php


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //xử lý lấy số điện thoại tài xế
    $sdt_tx = explode(" ",trim($_REQUEST['list_tx']));
    //lay id tai xe thong qua sdt
    $id_taixe = $oContent->view_table("php_taixe","`phone_taixe` = '".end($sdt_tx)."' LIMIT 1");
    $rs = $id_taixe->fetch();
    $data = array(
    'loaixe'=>htmlspecialchars(trim($_REQUEST['loaixe'])),
    'biensoxe'=>htmlspecialchars(trim($_REQUEST['biensoxe'])),
    'taixe'=>htmlspecialchars(end($sdt_tx)),
    'id_taixe'=>$rs['id'],
    'active'=> 1
   );
   $result = $oContent->view_table("php_doixe"," `biensoxe`= '".$data['biensoxe']."' LIMIT 1");
   $total = $result->num_rows(); 
    if($total == 0){
        if($data['id_taixe'] == ''){
            $oClass->insert("php_doixe",$data);
        }
        else{
            $result_tx = $oContent->view_table("php_doixe"," `id_taixe`= '".$data['id_taixe']."' LIMIT 1");
            $total_tx = $result->num_rows();
            if( $total_tx == 0){
                $oClass->insert("php_doixe",$data);
            }
            else{
                die(json_encode(
                    array(
                       
                        'status'=> '2',
                        'msg' => '(2): Tài xế đã có xe phụ trách'
                    )
                   ));
            }
        }
       
        
       
        die(json_encode(
         array(
            
             'status'=> '1',
             'msg' => 'Thêm thành công'
         )
        ));
    }else{
        die(json_encode(array(
            
            'status' => '0',
            'msg' => '(0). Trùng biển số xe không thể thêm dữ liệu!!!'
        )));
    }
   

}
else{
    die(json_encode(array(
        'status' => '0',
        'msg' => 'Thêm thất bại'
    )));
   
}
 exit;