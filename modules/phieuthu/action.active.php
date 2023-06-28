<?php

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])){

    
    $id = $oClass->id_decode($_POST['id']);
    $result = $oContent->view_table("php_phieuthu", "`id`= ".$id." LIMIT 1");
     $rs = $result->fetch();
    
    if($_SESSION['chucvu_id'] == 0 ||$_SESSION['chucvu'] == 'Giám đốc' ||$_SESSION['chucvu'] == 'Kế toán')
    {

        
        if($rs['active'] == 0){
            $oClass->updateActive("php_phieuthu",1 .' , ngaygio_xetduyet =  "'.Date("Y-m-d h:i:s").'"' ,"`php_phieuthu`.`id` = ".$id  );
            if($rs['active_congnotrongoi'] == 0)
            {
                $result_congno = $oContent->view_table("php_congnokhachhang", "`id`= ".$rs['id_congnohangtrongoi']." LIMIT 1");
                $rs_congno = $result_congno->fetch();

                $sotien_thanhtoan = $rs_congno['sotien_thanhtoan'] + $rs['sotien_thu'];
               $model->db->query("UPDATE `php_congnokhachhang` SET `id`= ".$rs['id_congnohangtrongoi'].",`sotien_thanhtoan`=".$sotien_thanhtoan." WHERE id = ".$rs['id_congnohangtrongoi']);
               $model->db->query("UPDATE `php_phieuthu` SET `id`= ".$rs['id'].",`active_congnotrongoi`= 1 WHERE id = ".$rs['id']);

            }
            if($rs['active_congnohangroi'] == 0)
            {
                $result_congno = $oContent->view_table("php_congnohangroi", "`id`= ".$rs['id_congnohangroi']." LIMIT 1");
                $rs_congno = $result_congno->fetch();

                $sotien_thanhtoan = $rs_congno['sotien_thanhtoan'] + $rs['sotien_thu'];
               $model->db->query("UPDATE `php_congnohangroi` SET `id`= ".$rs['id_congnohangroi'].",`sotien_thanhtoan`=".$sotien_thanhtoan." WHERE id = ".$rs['id_congnohangroi']);
               $model->db->query("UPDATE `php_phieuthu` SET `id`= ".$rs['id'].",`active_congnohangroi`= 1 WHERE id = ".$rs['id']);

            }
        }
        else if($rs['active'] == 1){
            $update = $oClass->updateActive("php_phieuthu",0,"`id` = ".$id  );
            if($rs['active_congnotrongoi'] == 1)
            {
                $result_congno = $oContent->view_table("php_congnokhachhang", "`id`= ".$rs['id_congnohangtrongoi']." LIMIT 1");
                $rs_congno = $result_congno->fetch();

                $sotien_thanhtoan = $rs_congno['sotien_thanhtoan'] - $rs['sotien_thu'];
               $model->db->query("UPDATE `php_congnokhachhang` SET `id`= ".$rs['id_congnohangtrongoi'].",`sotien_thanhtoan`=".$sotien_thanhtoan." WHERE id = ".$rs['id_congnohangtrongoi']);
               $model->db->query("UPDATE `php_phieuthu` SET `id`= ".$rs['id'].",`active_congnotrongoi`= 0 WHERE id = ".$rs['id']);

            }
           
        }
    }
    else{
        die(json_encode(
            array(
               
                'status'=> '0',
                'msg' => 'Bạn không được quyền xét duyệt'
            )
           ));
    }
    die(json_encode(
        array(
           
            'status'=> '1',
            'msg' => 'Xét duyệt thành công'
        )
       ));
}
die(json_encode(
    array(
        
        'status'=> '0',
        'msg' => 'Xét duyệt thất bại'
    )
   ));
exit;