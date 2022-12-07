<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
      

    $id= $oClass->id_encode($_POST['id']);
    $notification = $model->db->query("SELECT * FROM php_notification WHERE id =".$_POST['id']." LIMIT 1");
    $rs = $notification->fetch();
    
    $user_id= explode(",",$rs['user_id']);
  
    for($i = 0;$i< count($user_id);$i++)
    {
      
        if($user_id[$i] == $_SESSION['user_id'])
        {
          
            unset($user_id[$i]);
            break;
        }
    }
   
    $user_id_str =  implode(",",$user_id);
    $data = array(
        'user_id'=>$user_id_str,
   );
   $oClass->update("php_notification",$data,"id=".$_POST['id']);

    $link ='/notification/?code='.$id;
   
   
    
    
    die(json_encode(
        array(
            
            'status'=> '1',
            'link'=> $link,
            'msg' => 'Nhận dữ liệu thành công'
        )
       ));
  
}
die(json_encode(
    array(
        
        'status'=> '0',
        'link'=> 0,
        'msg' => 'Nhận dữ liệu thất bại'
    )
   ));
