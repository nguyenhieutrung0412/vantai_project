<?php


if($_SERVER['REQUEST_METHOD'] == 'POST'){

   foreach($_POST['nhansu'] as $key=>$value){
        $user_ns = $model->db->query("SELECT * FROM php_nhansu WHERE id=" .$key .' LIMIT 1');
        $total = $user_ns->num_rows();
        $rs_ns = $user_ns->fetch();
        if($total == 1){
            $user_id = $rs_ns['id'] ;
            if($user_id != '')
                {
                    $user = $model->db->query("SELECT * FROM php_nhansu WHERE id = ".$user_id." LIMIT 1");
                    $nhansu = $user->fetch();
                    $luongcoban = $nhansu['luong_nhansu'];
                    $phucap = $nhansu['phu_cap'];
                    $tienbaohiem = $nhansu['tien_baohiem'];
                    //$ngaynghi = $model->db->query("SELECT * FROM php_ngaynghi_nhansu WHERE user_id = ".$user_id." AND thang =". $_REQUEST['thang']." AND nam = ".$_REQUEST['nam']);
                    // $tong_ngaynghi = 0;
                    // while($ngaynghi_kphep = $ngaynghi->fetch()){
                    //     if($ngaynghi_kphep['nua_ngay']  == 1 && $ngaynghi_kphep['phep']  == 0 )
                    //     {
                    //         $tong_ngaynghi += 0.5;
                    //     }
                    //     if($ngaynghi_kphep['nua_ngay']  == 0 && $ngaynghi_kphep['phep']  == 0 ){
                    //         $tong_ngaynghi += 1;
                    //     }
                         
                    // };
                    
                    $ungluong = $model->db->query("SELECT * FROM php_ungluong WHERE user_id = ".$user_id." AND thang = ".$_REQUEST['thang']." AND nam = ".$_REQUEST['thang']." AND active = 1");
                    $tong_ungluong = 0;
                    while($rs_ungluong = $ungluong->fetch()){
                        $tong_ungluong += $rs_ungluong['so_tien_ung'];
                    };   
                }
             
                $data = array(
                'user_id'=>$user_id,
                'ngay_cong' =>$oClass->count_days(htmlspecialchars( $_REQUEST['nam']) ,htmlspecialchars($_REQUEST['thang']) , array(0,7)),
                'luong_thoa_thuan' => $luongcoban,
                'tien_bao_hiem' => $tienbaohiem,
                'phu_cap' => $phucap,
                
                'tong_ungluong' => $tong_ungluong,
                'thang' => htmlspecialchars($_REQUEST['thang']),
                'nam' => htmlspecialchars($_REQUEST['nam']),
                'nguoi_tao' => $_SESSION['name'],
                'active' => 0

                );
                $tru_luong_ngay_nghi = 0;
                // if($tong_ngaynghi != 0)
                // {
                //     $tru_luong_ngay_nghi = ($luongcoban / $data['ngay_cong']) * $tong_ngaynghi;
                // }
                
                    
                $data['tong_luong'] = $data['luong_thoa_thuan'] - $data['tien_bao_hiem']+ $phucap - $tru_luong_ngay_nghi - $tong_ungluong;
                
        
                $oClass->insert("php_luongnhansu",$data);
        }
   }

      
        
        die(json_encode(
         array(
           
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