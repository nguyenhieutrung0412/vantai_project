<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {

    $id = $oClass->id_decode($_POST['id']);

    $result = $oContent->view_table("php_donhangroi", "`id`=" . $id . "  LIMIT 1");
    $rs = $result->fetch();

 
     $stt = 1;
 
    $result2 = $oContent->view_table("php_donhangroi_s", "`id_donhangroi`=" . $id ." AND kho_nhanhang = 0");
    $num_donhanggiaotructiep = $result2->num_rows();
    while($rs2 = $result2->fetch()){
        // $result4 = $oContent->view_table("php_khachhang", "id=" . $rs2['id_khachhang']);
        $result4 = $model->db->query("SELECT * FROM php_khachhang WHERE id=" . $rs2['id_khachhang']);
        $rs4 = $result4->fetch();
        $list_donhang_giaotructiepkhach .= '
        <tr>
            <td>'.$stt.'</td>
            <td>'.$rs2['id'].'</td>
            <td>'.$rs4['name_kh'].'<br>'. $rs4['phone_kh'].'</td>
            <td>'.$rs2['diachi_nhanhang'].'</td>
            <td>'.$rs2['ten_nguoinhan'].'<br>'.$rs2['phone_nguoinhan'].'</td>
            <td>'.$rs2['diachi_giaohang'].'</td>
            <td>'.$rs2['loaihang'].', '.$rs2['soluong_hanghoa'].', '.$rs2['trongluong_hanghoa'].'kg</td>
         
   
      
            <td></td>
         
     
        </tr>';
        $stt++;
    
    };
    $stt_2 = 1;
    $result3 = $oContent->view_table("php_donhangroi_s", "`id_donhangroi`=" . $id ." AND kho_nhanhang != 0");
    $num_donhanggiaokho = $result3->num_rows();
    while($rs3 = $result3->fetch()){
        // $result_kh = $oContent->view_table("php_khachhang", "id=" . $rs3['id_khachhang']);
        $result_kh = $model->db->query("SELECT * FROM php_khachhang WHERE id=" . $rs3['id_khachhang']);
        $rs_kh = $result_kh->fetch();
        $list_donhang_giaotruckho .= '
        <tr>
            <td>'.$stt_2.'</td>
            <td>'.$rs3['id'].'</td>
            <td>'.$rs_kh['name_kh'].'<br>'. $rs_kh['phone_kh'].'</td>
            <td>'.$rs3['diachi_nhanhang'].'</td>
    
            <td>'.$rs3['ten_nguoinhan'].'<br>'.$rs3['phone_nguoinhan'].'</td>
            <td>'.$rs3['diachi_giaohang'].'</td>
            <td>'.$rs3['loaihang'].', '.$rs3['soluong_hanghoa'].', '.$rs3['trongluong_hanghoa'].'kg</td>
    
      
            <td></td>
           
 
        </tr>
        ';
         $stt_2++;
    };
  
  



   
    $rs['id_security'] = $oClass->id_encode($rs['id']);

    if($num_donhanggiaotructiep > 0)
    {
        $str_ds_tructiep = '
        <h3 style="text-align:center;font-size:22px;margin: 8px 0;">Danh sách giao trực tiếp khách hàng</h3>
         <table >
             <thead>
             
                 <tr>
                     <th style="width:1%">STT</th>
                     <th style="width:1%">Code</th>
                     <th style="width:17.5%;">Người gửi</th>
                     <th style="width:17.5%;">Địa chỉ nhận</th>
                     <th style="width:17.5%;">Người nhận</th>
                     <th style="width:17.5%;">Địa chỉ giao</th>
                     <th>Hàng hóa</th>
                   
                
                     <th style="width:22%;">Ký nhận</th>
                 </tr>
             </thead>
             <tbody>
                 '.$list_donhang_giaotructiepkhach.'
             </tbody>
         </table>
         ';
    }
    if($num_donhanggiaokho > 0)
    {
        $str_ds_kho = ' 
        <h3 style="text-align:center;font-size:22px;margin: 8px 0;">Danh sách giao tại kho</h3>
         <table >
             <thead>
               
                 <tr>
                     <th style="width:1%">STT</th>
                     <th style="width:1%">Code</th>
                     <th style="width:17.5%;">Người gửi</th>
                     <th style="width:17.5%;">Địa chỉ nhận</th>
                     <th style="width:17.5%;">Người nhận</th>
                     <th style="width:17.5%;">Địa chỉ giao</th>
                     <th>Hàng hóa</th>
                   
                  
                     <th style="width:12%;">Ký nhận</th>
                 </tr>
             </thead>
             <tbody>
                 '.$list_donhang_giaotruckho.'
             </tbody>
         </table>
        
    ';
    }

    $cauhinh = $oContent->view_table("php_cauhinh");
    $cauhinh_rs = $cauhinh->fetch();

        $str =  '
        
    
      
        
          <b >Đơn vị: ' . $cauhinh_rs['company'] . '</b><br>
         <span>Địa chỉ: ' . $cauhinh_rs['address'] . '<br>
          Số điện thoại: ' . $cauhinh_rs['phone'] . '<br>
          Mã số thuế: ' . $cauhinh_rs['masothue'] . '
          </span>
         
          
         
         
          
      
        
        <h1 style="margin:0;padding:0;text-align:center;">DANH SÁCH GIAO HÀNG</h1><i style=" display:block;text-align:center;">Ngày ... tháng ... năm ...</i><br />
        <span  style="display:block;text-align:center;">Liên: 1 - Mã phiếu: ' . $id . '</span><br>
     
     
        '.$str_ds_tructiep.'
        <br>
        '.$str_ds_kho.'

        
       
       
       <br>
       <table >
        <tr>
            <td style="width:33.33333333333333%" align="center">
            <b>Tài xế</b><br>
            <i>(Ký, ghi họ tên)</i></b><br><br><br><br>
        
            </td>
          
            <td style="width:33.33333333333333%" align="center">
            <b>Kho vận</b><br>
            <i>(Ký, ghi họ tên)</i></b><br><br><br><br>
        
            </td>
        </tr>
      
    </table>

    
    <style type="text/css">
    table {
        border: 1px solid;
        width: 100%;
        border-collapse: collapse!important
    }
    table th,td{
        border: 1px solid
    }
    @media print{  
       @page{
        size:landscape;margin:3mm
             }
      }
     
      
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
            'str' => '(2) Lỗi: không tồn tại thông tin'
        )
    ));
}
exit;
