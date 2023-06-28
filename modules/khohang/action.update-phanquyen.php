<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
   
    
     $id = $oClass->id_decode($_POST['id_kho']);

     $truckho_str_hientai = implode(",",$_REQUEST['id_truckho_hientai']);
     $truckho_str_bosung = implode(",",$_REQUEST['id_truckho_bosung']);
     $truckho_str = $truckho_str_hientai .','.$truckho_str_bosung;
     $lenght = strlen($truckho_str);
     if(substr($truckho_str,0,1) == ',' )
     {
        $truckho_str = substr($truckho_str,1,$lenght);
     }
     if(  substr($truckho_str,$lenght -1,$lenght) == ','){
        $truckho_str = substr($truckho_str,0,$lenght -1 );
     }
     if($truckho_str == '')
     {
        $truckho_str =0;
     }
     $data = array(
        'id' => $id,
        'truckho' => $truckho_str
     );

     $oClass->update("php_kho",$data,"id=".$data['id']);
   die(json_encode(
    array( 
        'array' =>$_POST['array'],
        'name' =>$data2,
        'status'=> '1',
        'msg' => 'Cập nhật thành công'
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