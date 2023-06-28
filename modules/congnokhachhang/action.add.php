<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $date = explode('/', htmlspecialchars(trim($_REQUEST['thoigian'])));
   //Đổi tiền tệ
   $so_tien = $oClass->DoiSoTien(htmlspecialchars(trim($_REQUEST['so_tien'])));
   
    $congno = $oContent->view_table("php_congnokhachhang", " id_khachhang = ".htmlspecialchars(trim($_REQUEST['khachhang_select']))." AND `thang`=" . $date[1] . " AND `nam` =". $date[2]  ."  LIMIT 1");
    $count = $congno->num_rows();
    $rs = $congno->fetch();

    $data = array(
        'id_khachhang' => htmlspecialchars(trim($_REQUEST['khachhang_select'])),
        'so_tien' => $so_tien,
        'thang' => $date[1],
        'nam' => $date[2],

        'active' => 0
    );
    if($count == 1)
    {
        $oClass->update("php_congnokhachhang", $data, "id=" . $rs['id']);
    }
    else{
        $oClass->insert("php_congnokhachhang", $data);
    }
   

    die(json_encode(
        array(

            'status' => '1',
            'msg' => 'Thêm thành công'
        )
    ));
}
die(json_encode(
    array(

        'status' => '0',
        'msg' => 'Thất bại'
    )
));

exit;
