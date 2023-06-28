<?php

if($_GET['code'] != ''){
   
    $id = $oClass->id_decode($_GET['code']);
    $list ='';
    $list_luong =  $oContent->view_table(" php_congnokhachhang","  id = ". $id);
    $total = $list_luong->num_rows();
    
    if($total != 0)
    {
 
    $rs = $list_luong->fetch();
        
        $tong_thang += $rs['tong_thanhtoan'];
        $tien_vat = ($rs['so_tien'] + $rs['tien_phatsinh']) * ($rs['vat']/100);
        $tien_no_ton = $rs['tong_thanhtoan'] - $rs['sotien_thanhtoan'];
        $name_nhansu = $model->db->query("SELECT * FROM php_khachhang WHERE id =  ".$rs['id_khachhang']);
        $rs2 = $name_nhansu->fetch();
        // format tien te
        $rs['so_tien'] = number_format($rs['so_tien']) ;
        $rs['tien_phatsinh'] = number_format($rs['tien_phatsinh']) ;
        $rs['tong_thanhtoan'] = number_format($rs['tong_thanhtoan']) ;
       
        
        $tien_no_ton = number_format($tien_no_ton) ;
        $tien_vat = number_format($tien_vat) ;
      
       
        $list .='
            <tr>
                <td colspan="5" style=" width:250px;">Tên công ty</td>
                <td colspan="9" style=" width:436px;">'.$rs2['ten_congty'].'</td>
            </tr>
            <tr>
                <td colspan="5" style=" width:250px;">Mã số thuế</td>
                <td colspan="9" style="text-align:left; width:436px;">'.$rs2['masothue'].'</td>
            </tr>
         
            <tr>
                <td colspan="5" style=" width:250px;">Đại diện</td>
                <td colspan="9" style=" width:436px;">'.$rs2['name_kh'].'</td>
            </tr>
           
            <tr>
                <td colspan="5" style=" width:250px;">Điện thoại</td>
                <td colspan="9" style="text-align:left; width:436px;">'.$rs2['phone_kh'].'</td>
            </tr>   
            <tr>
                <td colspan="5" style=" width:250px;">Địa chỉ</td>
                <td colspan="9" style=" width:436px;">'.$rs2['address_kh'].'</td>
            </tr>
           
         
             
        
        ';
        $list_hangvanchuyen = $oContent->view_table("php_donhangtrongoi "," id_khachhang =  ".$rs['id_khachhang']." AND thang =  ".$rs['thang'] ." AND nam =  ".$rs['nam'] ." AND hinhthucthanhtoan = 'thanhtoancongno'");
        $stt =1;
        while($rs_list_hangvanchuyen = $list_hangvanchuyen->fetch()){
            $phiphatsinh = 0;
            $phi_VAT = 0;
            $tong_tien = 0;
        
           
          
            //phí phát sinh moi đơn
            $phiphatsinh_s = $model->db->query("SELECT * FROM php_phiphatsinh WHERE id_donhang =  ".$rs_list_hangvanchuyen['id']);
            while($rs_phiphatsinh_s = $phiphatsinh_s->fetch()){
                $phiphatsinh += $rs_phiphatsinh_s['sotien'];
                $tong_phiphatsinh +=  $rs_phiphatsinh_s['sotien'];
            }
            $phi_VAT = ($rs_list_hangvanchuyen['phivanchuyen'] + $phiphatsinh) * ($rs['vat'] /100);
            $tong_tien = $rs_list_hangvanchuyen['phivanchuyen'] + $phiphatsinh + $phi_VAT;
            $tong_phivat +=  $phi_VAT;
            $tong_trongluong_all +=  $rs_list_hangvanchuyen['trongluong_hanghoa'];
            $tong_phivanchuyen +=  $rs_list_hangvanchuyen['phivanchuyen'];
            $tong_tien_all += $tong_tien;
            //numberformat
            $rs_list_hangvanchuyen['phivanchuyen'] = number_format($rs_list_hangvanchuyen['phivanchuyen']) ;
            $phiphatsinh = number_format($phiphatsinh);
            $rs_list_hangvanchuyen['don_gia'] = number_format($rs_list_hangvanchuyen['don_gia']);
            $tong_tien = number_format($tong_tien);
            $phi_VAT = number_format($phi_VAT);
            $list_vanchuyen .='
            <tr>
                <td style=" height:30px;">'.$stt.'</td>
                <td style=" height:30px;">'.$rs_list_hangvanchuyen['id'].'</td>
                <td style=" height:51px;width:436px;">'.$rs_list_hangvanchuyen['diachi_nhanhang'].'</td>
                <td style=" height:30px;">'.$rs_list_hangvanchuyen['thoigian_nhanhang'].'</td>
                <td style="  height:51px;width:436px;">'.$rs_list_hangvanchuyen['diachi_giaohang'].'</td>
                <td style=" height:30px;">'.$rs_list_hangvanchuyen['thoigian_giaohang'].'</td>
                <td style=" height:30px;">'.$rs_list_hangvanchuyen['trongluong_hanghoa'].' Kg</td>
                <td style=" height:30px;">'.$rs_list_hangvanchuyen['soluong_hanghoa'].' Kg</td>
                <td style=" height:30px;">'.$rs_list_hangvanchuyen['donvi_tinhphi'].'</td>
                <td style=" height:30px;">'.$rs_list_hangvanchuyen['don_gia'].'</td>
                <td style=" height:30px;">'.$rs_list_hangvanchuyen['phivanchuyen'].'</td>
                <td style=" height:30px;">'.$phiphatsinh.'</td>
                <td style=" height:30px;">'.$phi_VAT.' ('.$rs['vat'].'%)</td>
                <td style=" height:30px;">'.$tong_tien.'</td>
                
            </tr>
            ';
            $stt++;
        };
      
    //tong tien
    $tong_tien_phiphatsinh = $tong_phivanchuyen + $tong_phiphatsinh;
    $tongthanhtoan = $tong_tien_phiphatsinh + $tong_phivat;
    //numberformat tổng

    $tong_thang = number_format($tong_thang) ;
    $tong_tien_phiphatsinh = number_format($tong_tien_phiphatsinh) ;
    $tongthanhtoan = number_format($tongthanhtoan) ;
    $tong_tien_all = number_format($tong_tien_all) ;
    $tong_phivanchuyen = number_format($tong_phivanchuyen) ;
    $tong_phivat = number_format($tong_phivat) ;
    $tong_phiphatsinh = number_format($tong_phiphatsinh) ;
    $tong_trongluong_all = number_format($tong_trongluong_all) ;
    $company =  $oContent->view_table("php_cauhinh");
    $rs_company = $company->fetch();
    $str = '

    <span style="font-size:18px;font-weight: 600;">'.$rs_company['company'].'</span><br>
    <span style="font-size:16px">Mã số thuế: '.$rs_company['masothue'].'</span><br>
    <span style="font-size:16px">Số điện thoại: '.$rs_company['phone'].'</span><br>
    <span style="font-size:16px">Địa chỉ: '.$rs_company['address'].'</span><br>
    <table >
    <th  colspan = "14"><h2 style="color: red;font-size:25px ">CÔNG NỢ THÁNG '.$rs['thang'].' NĂM '.$rs['nam'].'</h2></th>
    </table >
    <div class="table"> 
        <table border = "1">
            <thead>
                
              
            </thead>
            <tbody>
                '.$list.'
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
                    <th style="width: 165px; height:40px">STT</th>
                    <th style="width: 165px; height:40px">Mã đơn hàng</th>
                    <th style="width: 165px; height:40px">Địa chỉ nhận</th>
                    <th style="width: 165px; height:40px">Thời gian nhận</th>
                    <th style="width: 165px; height:40px">Địa chỉ giao</th>
                    <th style="width: 165px; height:40px">Thời gian giao</th>
                    <th style="width: 165px; height:40px">Trọng lượng hàng</th>
                    <th style="width: 165px; height:40px">Số lượng hàng</th>
                    <th style="width: 165px; height:40px">Đơn vị tính</th>
                    <th style="width: 165px; height:40px">Đơn giá</th>
                    <th style="width: 165px; height:40px">Phí vận chuyển</th>
                    <th style="width: 165px; height:40px">Phí phát sinh</th>
                    <th style="width: 165px; height:40px">Phí VAT</th>
                    <th style="width: 165px; height:40px">Tổng tiền</th>
                
                </tr>
            </thead>
            <tbody>
            '.$list_vanchuyen.'
            <tr>
                <td colspan="6"></td>
                <td style="color: red;">
                    Tổng : '.$tong_trongluong_all.' (Kg)
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td style="color: red;">
                    Tổng : '.$tong_phivanchuyen.' 
                </td >   
                <td style="color: red;">
                    Tổng : '.$tong_phiphatsinh.' 
                </td>   
                <td style="color: red;">
                    Tổng : '.$tong_phivat.' 
                </td>   
                <td style="color: red;">
                    Tổng : '.$tong_tien_all.' 
                </td>   
            </tr>
            </tbody>

        </table>
        <table>
            <thead>
               
            </thead>
        </table>
        <table border = "1">
            <tbody>
                <tr >
                    
                    <td colspan="14" >
                    
                    <span style="color: red;font-size:22px;text-align:right">Tổng tiền : '.$tong_tien_phiphatsinh.'</span> <br>
                    <span style="color: red;font-size:22px;text-align:right">Tổng thanh toán  : '.$tongthanhtoan.' </span> <br>
                    <span  style="color: red;font-size:22px;text-align:right">VAT  : '.$tong_phivat.'</span></td>
                </tr>
              
            </tbody>
        </table>

      
        
    </div>

    ';

         $data_excel = mb_convert_encoding($str,"HTML-ENTITIES","UTF-8");

        echo $data_excel;

        $file_name = 'bang-cong-no-'.$rs['thang'].'-'.$rs['nam'];
		
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