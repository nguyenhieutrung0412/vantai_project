<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {

    $id = $oClass->id_decode($_POST['id']);
    $result = $oContent->view_table("php_phiphatsinh", "`id`=" . $id . " LIMIT 1");
    $total = $result->num_rows();
    $rs = $result->fetch();
    if ($total == 1) {

        $oClass->delete("php_phiphatsinh", "id = '" . $id . "' ");
        $result2 = $oContent->view_table("php_images", "`type_id`=".$id);
      
        while($rs2= $result2->fetch()){
         unlink('../data/upload/images/'.$rs2['file_name']);
         $oClass->delete("php_images","type_id = '".$id."' AND type = 'php_phiphatsinh' ");
        }
        $result3 = $oContent->view_table("php_file", "`type_id`=".$id);
       
        while($rs3= $result3->fetch()){
         unlink('../data/upload/files/'.$rs3['file_name']);
         $oClass->delete("php_file","type_id = '".$id."' AND type = 'php_phiphatsinh' ");
        }

        die(json_encode(
            array(

                'status' => '1',
                'msg' => 'Xóa thành công'
            )
        ));
    } else {
        die(json_encode(
            array(

                'status' => '0',
                'msg' => 'Không tìm thấy id'
            )
        ));
    }
}
die(json_encode(
    array(

        'status' => '2',
        'msg' => 'Xóa thất bại'
    )
));
