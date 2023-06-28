<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {

    $id = $oClass->id_decode($_POST['id']);

    $result = $oContent->view_table("php_donhangtrongoi", "`id`=" . $id . "  LIMIT 1");
    $rs = $result->fetch();
    $ngay = explode("-", $rs['ngaytao_phieuthu']);
    $total = $result->num_rows();
    $result2 = $oContent->view_table("php_cauhinh");
    $rs2 = $result2->fetch();
    $result3 = $oContent->view_table("php_mathang_donhang", "id_donhang=" . $rs['id']);
    $stt = 1;
    while($rs3 = $result3->fetch()){
        $list .= '
            <tr>
                <td>'.$stt.'</td>
                <td>'.$rs3['ten'].'</td>
                <td>'.$rs3['dvt'].'</td>
                <td>'.$rs3['soluong'].'</td>
                <td>'.$rs3['ghichu'].'</td>
             
            </tr>
        ';
        $stt++;
    };

    $result4 = $oContent->view_table("php_khachhang", "id=" . $rs['id_khachhang']);
    $rs4 = $result4->fetch();
    //xử lý hình thức thanh toán
    if($rs['hinhthucthanhtoan'] == 'thanhtoantienmat')
    {
        $rs['hinhthucthanhtoan'] = 'Thanh toán tiền mặt';
    }
    elseif($rs['hinhthucthanhtoan'] == 'thanhtoancongno'){
        $rs['hinhthucthanhtoan'] = 'Thanh toán bằng công nợ khách hàng';
    }
    $rs['id_security'] = $oClass->id_encode($rs['id']);

    if ($total == 1) {
        $str =  '<table>
        <tr>
          <td><table style="width:210mm;height:147mm;>
        <tr>
            <td colspan="2" align="left" >
            <b >Đơn vị: ' . $rs2['company'] . '</b><br>
           <span>Địa chỉ: ' . $rs2['address'] . '<br>
            Số điện thoại: ' . $rs2['phone'] . '<br>
            Mã số thuế: ' . $rs2['masothue'] . '
            </span>
            </td>
            
           
        </tr>
        <tr>
            <td colspan="3" align="center">
          <h1 style="margin:0;padding:0">PHIẾU GIAO NHẬN HÀNG</h1><i>Ngày ... tháng ... năm ...</i><br />
          Liên: 1 - Mã phiếu: ' . $rs['id'] . '</td>
        </tr>
        <tr>
            <td colspan="3" width="20%">
            <p style="margin:0 0 4px 35px"><span style="width:120px;display:block;float:left">Họ và tên/ Đơn vị</span>: ' . $rs['ten_nguoinhan'] . ' - Điện thoại: ' . $rs['phone_nguoinhan'] . '</p>
            <p style="margin:0 0 4px 35px"><span style="width:120px;display:block;float:left">Địa chỉ</span>: ' . $rs['diachi_giaohang'] . '</p>

            <p style="margin:0 0 4px 35px"><span style="width:120px;display:block;float:left">Số tiền</span>: <b style="font-size:18px">' . number_format($rs['phivanchuyen']) . ' VND</b> - Hình thức thanh toán</span>: ' . $rs['hinhthucthanhtoan'] . ' </p>

            <p style="margin:0 0 10px 35px"><span style="width:120px;display:block;float:left"></p>
            </td>
        </tr>
        <tr>
           <td colspan="3" align="center"> <table class="list">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên mặt hàng</th>
                        <th>ĐVT</th>
                        <th>Số lượng</th>
                        <th>Ghi chú</th>
                    </tr>
                </thead>
                <tbody>
                    '.$list.'
                </tbody>
            </table>
            </td>
        </tr>
        <tr>
            <td style="width:33.33333333333333%" align="center">
              <b>Người nhận hàng</b><br>
            <i>(Ký, ghi họ tên)</i></b><br><br><br>
            <!--<i>' . $rs['name_nguoinhan'] . '</i>-->
          </td>
          <td style="width:33.33333333333333%" align="center">
          <b>Người phụ trách</b><br>
          <i>(Ký, ghi họ tên)</i></b><br><br><br>
          <!--<i>' . $rs['tennguoitao_chi'] . '</i>-->
          </td>
          <td style="width:33.33333333333333%" align="center">
          <b>Người lập phiếu</b><br>
          <i>(Ký, ghi họ tên)</i></b><br><br><br>
          <!--' . $rs['name_nguoinhan'] . '-->
          </td>
        </tr>
        
    </table></td>
      </tr>
      
      
    </table>
    <style type="text/css">
    @media print{  
       @page{
             size:portrait;
             margin: 0 5mm;
             }
      }
      .list
      {
        border: 1px solid ;
        border-collapse: collapse!important;
        width:91%;
      }
      .list th, 
      .list td{
        border: 1px solid ;
        padding: 5px 10px;
        align:center
    </style>';
        die(json_encode(
            array(
                'status' => 1,
                'str' => $str
            )
        ));
    } else {
        die(json_encode(
            array(
                'status' => 0,
                'str' => '(0) Lỗi: Loại chi không được hoạt động'
            )
        ));
    }
} else {
    die(json_encode(
        array(
            'status' => 0,
            'str' => '(2) Lỗi: không tồn tại thông tin'
        )
    ));
}
exit;
