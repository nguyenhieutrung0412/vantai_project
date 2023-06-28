<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if($_POST['type'] == 'donhangtrongoi')
    {
        $result = $oContent->view_table("php_donhangtrongoi", "`id`= " . $_POST['id'] . " LIMIT 1");
        $rs = $result->fetch();
        $data = array(
            'id' => $_POST['id'],
    
            
            'nhan_lenh' => 1,
            'thoigian_nhanlenh' => date("Y-m-d G:i:s", time())
    
        );
        $oClass->update("php_donhangtrongoi", $data, "id=" . $data['id']);
        die(json_encode(
            array(
                
                'status' => '1',
                'msg' => 'Nhận lệnh thành công'
            )
        ));
    }
    
    else if($_POST['type'] == 'donhangroi')
    {
        $result = $oContent->view_table("php_donhangroi", "`id`= " . $_POST['id'] . " LIMIT 1");
        $rs = $result->fetch();
        $data = array(
            'id' => $_POST['id'],
    
            
            'nhan_lenh' => 1,
            'thoigian_nhanlenh' => date("Y-m-d G:i:s", time())
    
        );
        $oClass->update("php_donhangroi", $data, "id=" . $data['id']);
        die(json_encode(
            array(
                
                'status' => '1',
                'msg' => 'Nhận lệnh thành công'
            )
        ));
    }
    else{
        die(json_encode(
            array(
                
                'status' => '2',
                'msg' => 'Nhận lệnh thất bại'
            )
        ));
    }
    
}