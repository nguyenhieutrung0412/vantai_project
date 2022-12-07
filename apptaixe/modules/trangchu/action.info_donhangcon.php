<?php

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])){

    $id = $oClass->id_decode($_POST['id']);

    $result = $oContent->view_table("php_donhangroi_s", "`id`=".$id."  LIMIT 1");
    $total = $result->num_rows();
    $rs = $result->fetch();
    if($rs['tinhtrangdon'] == 0)
    {
        $rs['tinhtrangdon_text'] = 'Chưa hoàn thành';
        $rs['color'] = 'color-0';
    }
    else{
        $rs['tinhtrangdon_text'] = 'Đã hoàn thành';
        $rs['color'] = 'color-1';
    }
    if($rs['hinhthucthanhtoan'] == 'nguoiguitra')
    {
        $rs['hinhthucthanhtoan'] = 'Thu phí người gửi';
    }
    else{
        $rs['hinhthucthanhtoan'] = 'Thu phí người nhận';
    }
    $rs['phivanchuyen'] = number_format($rs['phivanchuyen'], 0, ',', '.') . "VND";

    //kh
       $khachhang = $oContent->view_table('php_khachhang','id = '.$rs['id_khachhang']);
             $rs_kh = $khachhang->fetch();
             
    //end kh
    //mat hàng
    $mathangcon = $oContent->view_table('php_mathang_donhangroi','id_donhangroi = '.$rs['id']);
    while($rs_mathangcon = $mathangcon->fetch()){
       $list_mathang .= '
            <tr>
                                
            <td>'.$rs_mathangcon['ten'].'</td>
            <td>'.$rs_mathangcon['dvt'].'</td>
            <td>'.$rs_mathangcon['soluong'].'</td>
            <td>'.$rs_mathangcon['ghichu'].'</td>
        
        </tr>
       '; 
    };
    
    if($total == 1)
    {
        $str = '<div class="popup">
        <h4>Chi tiết đơn <span class="color-0">1<span> | <span class="'.$rs['color'].'">'.$rs['tinhtrangdon_text'].'<span></h4>
        <div class="exit-btn"><i class="fa-solid fa-xmark"></i></div>
        <div class="table">
           <table >
                <thead>
                    <tr>
                        <th colspan="4">  <h5>Thông tin đơn hàng</h5></th>
                    </tr>
                    <tr>
                        <th> Tên mặt hàng</th>
                        <th> Đơn vị tính</th>
                        <th> Số lượng</th>
                        <th> Ghi chú</th>
                    </tr>
                </thead>
                <tbody>
                '.$list_mathang.'

                </tbody>
            </table>
             <table >
                <thead>
                    <tr>
                        <th colspan="2">  <h5>Thông tin thu phí</h5></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="td-first">Phí vận chuyển:</td>
                        <td>'.$rs['phivanchuyen'].'</td>
                    </tr>
                    <tr>
                    <td class="td-first">Hình thức thanh toán:</td>
                    <td>'.$rs['hinhthucthanhtoan'].'</td>
                </tr>
                    
                </tbody>
            </table>
             <table >
                <thead>
                    <tr>
                        <th colspan="2">  <h5>Thông tin giao nhận</h5></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="td-first">Địa chỉ nhận hàng:</td>
                        <td>'.$rs['diachi_nhanhang'].'</td>
                    </tr>
                    <tr>
                        <td class="td-first">Thời gian nhận hàng:</td>
                        <td>'.$rs['thoigian_nhanhang'].'</td>
                    </tr>
                    <tr>
                        <td class="td-first">Địa chỉ giao hàng:</td>
                        <td>'.$rs['diachi_giaohang'].'</td>
                    </tr>
                    <tr>
                        <td class="td-first">Thời gian giao hàng ước tính:</td>
                        <td>'.$rs['thoigian_giaohang'].'</td>
                    </tr>
                    
                </tbody>
            </table>
             <table >
                <thead>
                    <tr>
                        <th colspan="2">  <h5>Thông tin người nhận</h5></th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                        <td class="td-first">Tên người nhận:</td>
                        <td>'.$rs['ten_nguoinhan'].'</td>
                    </tr>
                    <tr>
                        <td class="td-first">CMND:</td>
                        <td>'.$rs['cmnd_nguoinhan'].'</td>
                    </tr>
                    <tr>
                        <td class="td-first">Số điện thoại:</td>
                        <td>'.$rs['phone_nguoinhan'].'</td>
                    </tr>
                
                </tbody>
            </table>
             <table >
                <thead>
                    <tr>
                        <th colspan="2">  <h5>Thông tin người gửi</h5></th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                        <td class="td-first">Tên người gửi:</td>
                        <td>'.$rs_kh['name_kh'].'</td>
                    </tr>
                    <tr>
                        <td class="td-first">CMND:</td>
                        <td>'.$rs_kh['cmnd'].'</td>
                    </tr>
                    <tr>
                        <td class="td-first">Số điện thoại:</td>
                        <td>'.$rs_kh['phone_kh'].'</td>
                    </tr>
                    <tr>
                        <td class="td-first">Tên công ty:</td>
                        <td>'.$rs_kh['ten_congty'].'</td>
                    </tr>
                    <tr>
                        <td class="td-first">Mã số thuế:</td>
                        <td>'.$rs_kh['masothue'].'</td>
                    </tr>
                
                </tbody>
            </table>
            
        </div>
    </div>
    <script>
    
    $(document).ready(function() {
      
        $(".exit-btn").on("click", function() {
            $(".popup_detail").toggleClass("in");
        })
    });
    </script>
    '
    ;
    }
    //end mat hang
    die(json_encode(
        array(

            'status' => 1,
            'str' => $str
        )
       ));

    
}else{
    die(json_encode(
        array(
            'status' => 2,
            'str' => '(2) Lỗi: không tồn tại thông tin'
        )
       ));
}
exit;