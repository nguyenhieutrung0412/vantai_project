<?php


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
  $nhan_su = $oContent->view_table('php_nhansu','active = 1');
  while($rs = $nhan_su->fetch())
  {
    $user_id[] = $rs['id'];
  }

  $user_id_str =  implode(",",$user_id);


   $data = array(
    'title'=>htmlspecialchars(trim($_REQUEST['title'])),
    'content'=>htmlspecialchars(trim($_REQUEST['content'])),
    'user_id'=>$user_id_str,
    'active'=> 1
   );
 

  

        $oClass->insert("php_notification",$data);
        $lastid = $model->db->last_insetid("php_notification");
        $oClass->upload_files('php_notification',$lastid);
        
        die(json_encode(
         array(
            
             'status'=> '1',
             'msg' => 'Gửi thông báo thành công'
         )
        ));
   
   

}
else{
    die(json_encode(array(
        'status' => '0',
        'msg' => 'Gửi thông báo thất bại'
    )));
   
}
 exit;