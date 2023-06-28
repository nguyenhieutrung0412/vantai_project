<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $data = array(
        'id' => $oClass->id_decode($_REQUEST['id']),
        'ngay_chot' => htmlspecialchars(trim($_REQUEST['ngay_chot'])),
        'ngay_thu' => htmlspecialchars(trim($_REQUEST['ngay_thu'])),
        'vat' => htmlspecialchars(trim($_REQUEST['vat'])),
        'ghichu' => htmlspecialchars(trim($_REQUEST['ghichu'])),


    );
    $congno = $oContent->view_table("php_congnokhachhang","id = ".$data['id']. " LIMIT 1"); 
    $rs_congno = $congno->fetch();

    if($_POST['active'] == 0)
    {
        $tong_phivanchuyen = 0;
        $tong_phiphatsinh = 0;
        $donhang = $oContent->view_table("php_donhangtrongoi","id_khachhang =".$rs_congno['id_khachhang']. " AND thang = " .$rs_congno['thang'] ." AND nam =" .$rs_congno['nam'] ." AND hinhthucthanhtoan = 'thanhtoancongno'") ;
        while($rs_donhang = $donhang->fetch())
        {
            $tong_phivanchuyen += $rs_donhang['phivanchuyen'];
            $phiphatsinh = $model->db->query("SELECT sotien FROM php_phiphatsinh WHERE id_donhang = ".$rs_donhang['id'] ." AND thukhach = 1");
            while($rs_phiphatsinh = $phiphatsinh->fetch()){
                $tong_phiphatsinh += $rs_phiphatsinh['sotien'];
            }
           
        }

        $data['so_tien'] = $tong_phivanchuyen;
        $data['tien_phatsinh'] = $tong_phiphatsinh;
        $data['tong_tien'] = $tong_phivanchuyen + $tong_phiphatsinh;
        //cập nhật số tiền đã thanh toán 
        $sotiendathanhtoan = 0;
        $phieuthu = $oContent->view_table("php_phieuthu","id_congnohangtrongoi =".$data['id']. " AND active_congnotrongoi = 1 AND active = 1") ;
        while($rs_phieuthu = $phieuthu->fetch())
        {
            $sotiendathanhtoan += $rs_phieuthu['sotien_thu']; 
        }
        $data['sotien_thanhtoan'] = $sotiendathanhtoan;
         $data['tong_thanhtoan'] = $data['tong_tien'] +($rs_congno['tong_tien'] * ($data['vat'] / 100)); 
        $oClass->update("php_congnokhachhang", $data, "id=" . $data['id']);
        $oClass->upload_images("php_congnohangtrongoi",$data['id'],$chatluonganh);
    }
    else if($_POST['active'] == 1)
    {
        if($rs_congno['active'] == 0)
        {
            $data['tong_thanhtoan'] = $data['tong_tien'] +($rs_congno['tong_tien'] * ($data['vat'] / 100));
        }   
        
        $data['active'] = 1;
        $oClass->update("php_congnokhachhang", $data, "id=" . $data['id']);
        $oClass->upload_images("php_congnohangtrongoi",$data['id'],$chatluonganh);

    }

   

    die(json_encode(
        array(

            'status' => '1',
            'msg' => 'Update thành công'
        )
    ));
} else {
    die(json_encode(array(
        'status' => '0',
        'msg' => 'Update thất bại'
    )));
}
exit;
