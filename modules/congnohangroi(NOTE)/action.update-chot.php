<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $data = array(
        'id' => $oClass->id_decode($_REQUEST['id']),
        'ngay_chot' => htmlspecialchars(trim($_REQUEST['ngay_chot'])),
        'ngay_thu' => htmlspecialchars(trim($_REQUEST['ngay_thu'])),
        'vat' => htmlspecialchars(trim($_REQUEST['vat'])),
        'ghichu' => htmlspecialchars(trim($_REQUEST['ghichu'])),


    );
    $congno = $oContent->view_table("php_congnohangroi","id = ".$data['id']. " LIMIT 1"); 
    $rs_congno = $congno->fetch();

    if($_POST['active'] == 0)
    {
        $tong_phivanchuyen = 0;
        $tong_phiphatsinh = 0;
        $donhang = $oContent->view_table("php_donhangroi"," thang = " .$rs_congno['thang'] ." AND nam =" .$rs_congno['nam'] ) ;
        while($rs_donhang = $donhang->fetch())
        {
            $donhangroi_s = $model->db->query("SELECT * FROM php_donhangroi_s WHERE id_donhangroi =".$rs_donhang['id']." AND phuongthucthanhtoan = 'thanhtoancongno'" );
            while($rs_donhangroi_s = $donhangroi_s->fetch())
            {
                $tong_phivanchuyen += $rs_donhangroi_s['phivanchuyen'];
        
            }
           
           
        }

        $data['so_tien'] = $tong_phivanchuyen;
       
        $data['tong_tien'] = $tong_phivanchuyen + $tong_phiphatsinh;
         $data['tong_thanhtoan'] = $data['tong_tien'] +($rs_congno['tong_tien'] * ($data['vat'] / 100)); 
        $oClass->update("php_congnohangroi", $data, "id=" . $data['id']);
        $oClass->upload_images("php_congnohangroi",$data['id'],$chatluonganh);
    }
    else if($_POST['active'] == 1)
    {
        $data['tong_thanhtoan'] = $data['tong_tien'] +($rs_congno['tong_tien'] * ($data['vat'] / 100));
        $data['active'] = 1;
        $oClass->update("php_congnohangroi", $data, "id=" . $data['id']);
        $oClass->upload_images("php_congnohangroi",$data['id'],$chatluonganh);

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
