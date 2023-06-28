<?php

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])){

    $id = $oClass->id_decode($_POST['id']);

    $result = $oContent->view_table("php_donhangroi_s", "`id`=".$id."  LIMIT 1");
    $rs = $result->fetch();
     $ngay = explode(" ",$rs['time_nhanhang']);
     $arr_ngay = explode("-", $ngay[0]);
    $total = $result->num_rows();
    $result2 = $oContent->view_table("php_cauhinh");
    $rs2 = $result2->fetch();
    $result3 = $oContent->view_table("php_khachhang","id=".$rs['id_khachhang']);
    $rs3 = $result3->fetch();
    
    $rs['id_security'] = $oClass->id_encode($rs['id']);

    if($total==1){
        $str =  '<table>
        <tr>
          <td><table style="width:210mm;height:147mm;border-bottom:1px dashed #000">
        <tr>
            <td colspan="1" align="center" >
            <b >'.$rs2['company'].'</b><br>
           <span>'.$rs2['address'].'<br>
            '.$rs2['phone'].'</span>
            </td>
            <td></td>
            <td  align="center" style="font-size:12px;">
            <b>Mẫu số: 01 - TT</b><br>
            (Ban hành theo QĐ số: 48/2006/QĐ-BTC Ngày 14/9/2006 của Bộ trưởng BTC)
            </td>
        </tr>
        <tr>
            <td colspan="3" align="center">
          <h1 style="margin:0;padding:0">PHIẾU XÁC NHẬN NHẬN HÀNG</h1><i>Ngày '.$arr_ngay[2].' tháng '.$arr_ngay[1].' năm '.$arr_ngay[0].'</i><br />
          Liên: 1 - Mã phiếu: '.$rs['id'].'</td>
        </tr>
        <tr>
            <td colspan="3" width="20%">
            <p style="margin:0 0 8px"><span style="width:220px;display:block;float:left">Họ và tên/ Đơn vị</span>: '.$_SESSION['name'].' </p>
            <p style="margin:0 0 8px"><span style="width:220px;display:block;float:left">Chức vụ đơn vị công tác: </span>: '.$_SESSION['chucvu'].'</p><br>
            <p style="margin:0 0 8px"><span style="width:220px;display:block;float:left">Đã tiếp nhận hàng hóa của</p><br><br>
            <p style="margin:0 0 8px"><span style="width:220px;display:block;float:left">Ông/bà: </span>: '.$rs3['name_kh'].'</p>
            <p style="margin:0 0 8px"><span style="width:220px;display:block;float:left">Bao gồm: </span>: <b style="font-size:18px">'.$rs['loaihang'].' </b> </p>
            
           
            </td>
        </tr>
        <tr>
            <td style="width:33.33333333333333%" align="center">
            <!--<b>Họ và tên/ Đơn vị</b><br>
            <i>(Ký, ghi họ tên)</i></b><br><br><br>
           <i>'.$rs['name_nguoinhan'].'</i>-->
          </td>
          <td style="width:33.33333333333333%" align="center">
          <!--<b>Kế Toán</b><br>
          <i>(Ký, ghi họ tên)</i></b><br><br><br>
          <i>'.$rs['tennguoitao_chi'].'</i>-->
          </td>
          <td style="width:33.33333333333333%" align="center">
          <b>Người tiếp nhận</b><br>
          <i>(Ký, ghi họ tên)</i></b><br><br><br>
          <!--'.$rs['name_nguoinhan'].'-->
          </td>
        </tr>
        
    </table></td>
      </tr>
      <tr>
      <td><table style="width:100%">
        <tr>
        <td colspan="1" align="center" >
        <b >'.$rs2['company'].'</b><br>
       <span>'.$rs2['address'].'<br>
        '.$rs2['phone'].'</span>
        </td>
        <td></td>
            <td align="center" style="font-size:12px"><p>&nbsp;</p>
            <b>Mẫu số: 01 - TT</b><br>
            (Ban hành theo QĐ số: 48/2006/QĐ-BTC Ngày 14/9/2006 của Bộ trưởng BTC)
            </td>
        </tr>
            <tr><td colspan="3">&nbsp;</td></tr>
            <tr>
            <td colspan="3" align="center">
          <h1 style="margin:0;padding:0">PHIẾU XÁC NHẬN NHẬN HÀNG</h1><i>Ngày '.$arr_ngay[2].' tháng '.$arr_ngay[1].' năm '.$arr_ngay[0].'</i><br />
          Liên: 2 - Mã phiếu: '.$rs['id'].'</td>
        </tr>
        <tr>
        <td colspan="3" width="20%">
        <p style="margin:0 0 8px"><span style="width:220px;display:block;float:left">Họ và tên/ Đơn vị</span>: '.$_SESSION['name'].' </p>
        <p style="margin:0 0 8px"><span style="width:220px;display:block;float:left">Chức vụ đơn vị công tác: </span>: '.$_SESSION['chucvu'].'</p><br>
        <p style="margin:0 0 8px"><span style="width:220px;display:block;float:left">Đã tiếp nhận hàng hóa của</p><br><br>
        <p style="margin:0 0 8px"><span style="width:220px;display:block;float:left">Ông/bà: </span>: '.$rs3['name_kh'].'</p>
        <p style="margin:0 0 8px"><span style="width:220px;display:block;float:left">Bao gồm: </span>: <b style="font-size:18px">'.$rs['loaihang'].' </b> </p>
        
       
        </td>
    </tr>
    
    <tr>
    
        <td style="width:33.33333333333333%" align="center">
        <!--<b>Họ và tên/ Đơn vị</b><br>
        <i>(Ký, ghi họ tên)</i></b><br><br><br>
        <i>'.$rs['name_nguoinhan'].'</i>-->
        </td>
        <td style="width:33.33333333333333%" align="center">
        <!--<b>Kế Toán</b><br>
        <i>(Ký, ghi họ tên)</i></b><br><br><br>
        <i>'.$rs['tennguoitao_chi'].'</i>-->
        </td>
        <td style="width:33.33333333333333%" align="center">
        <br><br><br><b>Người tiếp nhận</b><br>
        <i>(Ký, ghi họ tên)</i></b><br><br><br>
        <!--'.$rs['name_nguoinhan'].'-->
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
    </style>';
        die(json_encode(
            array(
                'status' => 1,
                'str' => $str
            )
           ));
    }else{
        die(json_encode(
            array(
                'status' => 0,
                'str' => '(0) Lỗi: Loại chi không được hoạt động'
            )
           ));
    }
}else{
    die(json_encode(
        array(
            'status' => 0,
            'str' => '(2) Lỗi: không tồn tại thông tin'
        )
       ));
}
exit;