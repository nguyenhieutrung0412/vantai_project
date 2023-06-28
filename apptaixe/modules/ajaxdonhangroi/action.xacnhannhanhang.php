<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
   
        $result = $oContent->view_table("php_donhangroi_s", "`id`= " . $_POST['id'] . " LIMIT 1");
        $rs = $result->fetch();
        $data = array(
            'id' => $_POST['id'],
    
            
            'lay_hang' => 1,
           
    
        );
        $oClass->update("php_donhangroi_s", $data, "id=" . $data['id']);
        die(json_encode(
            array(
                
                'status' => '1',
                'msg' => 'Xác nhận thành công'
            )
        ));
   
   
    
}
else{
    die(json_encode(
        array(
            
            'status' => '2',
            'msg' => 'Xác nhận thất bại'
        )
    ));
}