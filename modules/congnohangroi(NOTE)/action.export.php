<?php

if($_GET['code'] != ''){
   
    $id = $oClass->id_decode($_GET['code']);
    $list ='';
    $list_luong =  $oContent->view_table(" php_congnohangroi","  id = ". $id);
    $total = $list_luong->num_rows();
    if($total != 0)
    {
 
    $rs = $list_luong->fetch();
        
        $tong_thang += $rs['tong_thanhtoan'];
        $tien_vat = $rs['so_tien'] * ($rs['vat']/100);
        $tien_no_ton = $rs['tong_thanhtoan'] - $rs['sotien_thanhtoan'];
        $name_nhansu = $model->db->query("SELECT * FROM php_khachhang WHERE id =  ".$rs['id_khachhang']);
        $rs2 = $name_nhansu->fetch();
        // format tien te
        $rs['so_tien'] = number_format($rs['so_tien'], 0, ',', '.') . "";
       
        $rs['tong_thanhtoan'] = number_format($rs['tong_thanhtoan'], 0, ',', '.') . "";
       
        
        $tien_no_ton = number_format($tien_no_ton, 0, ',', '.') . "";
        $tien_vat = number_format($tien_vat, 0, ',', '.') . "";
      
       
        $list .='
            <tr>
                <td style=" height:30px;text-align:center;">'.$rs['id'].'</td>
                <td style=" height:30px;text-align:center;">'.$rs2['name_kh'].'</td>
                <td style=" height:51px;text-align:center;width:436px;">'.$rs2['address_kh'].'</td>
                <td style=" height:30px;text-align:center;">'.$rs2['phone_kh'].'</td>
                <td style=" height:30px;text-align:center;">'.$rs2['ten_congty'].'</td>
              
                <td style=" height:30px;text-align:center;">'.$rs['so_tien'].'</td>
               
                <td style=" height:30px;text-align:center;">'.$tien_vat.' ('.$rs['vat'].'%)</td>
                <td style=" height:30px;text-align:center;">'.$rs['tong_thanhtoan'].'</td>
                <td style=" height:30px;text-align:center;">'.$rs['sotien_thanhtoan'].'</td>
                <td style=" height:30px;text-align:center;">'.$tien_no_ton.'</td>
         
             
            </tr>
        ';
        $list_hangvanchuyen = $oContent->view_table("php_donhangroi ","  thang =  ".$rs['thang'] ." AND nam =  ".$rs['nam'] );
        while($rs_list_hangvanchuyen = $list_hangvanchuyen->fetch()){
          
            $don_hang_roi_s =  $model->db->query("SELECT * FROM php_donhangroi_s WHERE id_donhangroi = ".$rs_list_hangvanchuyen['id']." AND id_khachhang = ".$rs['id_khachhang']." AND phuongthucthanhtoan = 'thanhtoancongno' " );
            while($rs_donhangroi_s =  $don_hang_roi_s->fetch())
            {
                $rs_donhangroi_s['phivanchuyen'] = number_format($rs_donhangroi_s['phivanchuyen'], 0, ',', '.') . "";
            
                $list_vanchuyen .='
                <tr>
                    <td style=" height:30px;text-align:center;">'.$rs_donhangroi_s['id'].'</td>
                    <td style=" height:51px;text-align:center;width:436px;">'.$rs_donhangroi_s['diachi_nhanhang'].'</td>
                    <td style=" height:30px;text-align:center;">'.$rs_donhangroi_s['thoigian_nhanhang'].'</td>
                    <td style="  height:51px;text-align:center;width:436px;">'.$rs_donhangroi_s['diachi_giaohang'].'</td>
                    <td style=" height:30px;text-align:center;">'.$rs_donhangroi_s['thoigian_giaohang'].'</td>
                    <td style=" height:30px;text-align:center;">'.$rs_donhangroi_s['phivanchuyen'].'</td>
                  
                    
                </tr>
                ';
            }
          
        };
        $phieuthu = $model->db->query("SELECT * FROM php_phieuthu WHERE id_congnohangroi =  ".$rs['id']." AND active_congnohangroi =  1");
        while($rs_phieuthu = $phieuthu->fetch()){
            $rs['sotien_thu'] = number_format($rs['sotien_thu'], 0, ',', '.') . "";
            $list_phieuthu .= '  <tr>
                <td style=" height:30px;text-align:center;">'.$rs_phieuthu['id'].'</td>
                <td style=" height:30px;text-align:center;">'.$rs_phieuthu['ngaygio_xetduyet'].'</td>
                <td style=" height:30px;text-align:center;">'.$rs_phieuthu['sotien_thu'].'</td>
                <td style=" height:30px;text-align:center;">'.$rs_phieuthu['noidung_thu'].'</td>
            </tr>';
        }
       
    
    
    $tong_thang = number_format($tong_thang, 0, ',', '.') . "";
    $str = '

   


    <div class="table"> 
        <table border = "1">
            <thead>
                <tr>
                    <th colspan = "10"><h3 style="color: red;">Tổng công nợ hàng rời - Khách hàng '.$rs2['name_kh'].' - tháng '.$rs['thang'].' năm '.$rs['nam'].'<h3></th>
                </tr>
                <tr>
                    <th style="width: 165px; height:40px">Mã</th>
                    <th style="width: 165px; height:40px">Tên khách hàng</th>
                    <th style="width: 165px; height:40px">Địa chỉ</th>
                    <th style="width: 165px; height:40px">Số điện thoại</th>
                    <th style="width: 165px; height:40px">Tên công ty</th>
                    <th style="width: 165px; height:40px">Tiền vận chuyển</th>
                  
                    <th style="width: 165px; height:40px">Phí VAT(%)</th>
                    <th style="width: 165px; height:40px">Tổng công nợ tháng</th>
                    <th style="width: 165px; height:40px">Số tiền đã thanh toán</th>
                    <th style="width: 165px; height:40px">Số tiền cần phải thanh toán</th>
                 
                </tr>
              
               

            </thead>
            <tbody>
                '.$list.'
               
                
                    <td colspan = "10" style="color:red; height:30px;text-align:right;">Tổng: '.$tong_thang.'</td>
                  
              
            </tbody>

        </table>
        <table>
            <thead>
                <tr><th></th></tr>
            </thead>
        </table>
        <table border = "1">
            <thead>
                <tr>
                    <th colspan = "6" ><h4 style="color: red;">Danh sách hàng vận chuyển </h4></th>
                </tr>
                <tr>
                    <th style="width: 165px; height:40px">Mã</th>
                    <th style="width: 165px; height:40px">Địa chỉ nhận</th>
                    <th style="width: 165px; height:40px">Thời gian nhận</th>
                    <th style="width: 165px; height:40px">Địa chỉ giao</th>
                    <th style="width: 165px; height:40px">Thời gian giao</th>
                    <th style="width: 165px; height:40px">Phí vận chuyển</th>
                   
                
                </tr>
            </thead>
            <tbody>
            '.$list_vanchuyen.'
            </tbody>

        </table>
        <table>
            <thead>
                <tr><th></th></tr>
            </thead>
        </table>
        <table  border = "1">
            <thead>
                <tr>
                    <th colspan = "4" > <h4 style="color: red;">Danh sách số lần thanh toán </h4></th>
                </tr>
                <tr>
                    <th style="width: 165px; height:40px">Mã</th>
                    <th style="width: 165px; height:40px">Ngày giờ thu</th>
                    <th style="width: 165px; height:40px">Số tiền</th>
                    <th style="width: 165px; height:40px">Nội dung</th>
                </tr>
            </thead>
            <tbody>
            '.$list_phieuthu.'
            </tbody>
        </table>
    </div>

    ';

         $data_excel = mb_convert_encoding($str,"HTML-ENTITIES","UTF-8");

        echo $data_excel;

        $file_name = 'bang-cong-no-'.$_GET['thang'].'-'.$_GET['nam'];
		
		//xuất file Excel (.xls)
		header("Content-Type: application/vnd.ms-excel; charset=utf-8");
		header("Content-Type: application/octet-stream");
		header("Content-Disposition: attachment; filename=".basename("$file_name.xls"));
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Cache-Control: private",false);
  
    exit;
    }
    else{
        header("Location: ".$domain."congnokhachhang/");
		exit;
    }
}else{
       
        header("Location: ".$domain."congnokhachhang/");
		exit;
}
exit;