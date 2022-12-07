<?php

if($_GET['thang'] != ''|| $_GET['nam'] != ''){
   
   
    $list ='';
    $list_luong =  $oContent->view_table(" php_luongtaixe"," active = 1 AND thang = ".$_GET['thang']." AND nam = ".$_GET['nam']);
    $total = $list_luong->num_rows();
    if($total != 0)
    {
 
    while($rs = $list_luong->fetch()){
        
        $tong_thang += $rs['tong_luong'];
        $name_nhansu = $model->db->query("SELECT * FROM php_taixe WHERE id =  ".$rs['user_id']);
        $rs2 = $name_nhansu->fetch();
        // format tien te
        $rs['tong_luong'] = number_format($rs['tong_luong'], 0, ',', '.') . "VND";
        $rs['thuong_nong'] = number_format($rs['thuong_nong'], 0, ',', '.') . "VND";
        $rs['luong_thoa_thuan'] = number_format($rs['luong_thoa_thuan'], 0, ',', '.') . "VND";
        $rs['tong_ungluong'] = number_format($rs['tong_ungluong'], 0, ',', '.') . "VND";
        $rs['tong_so_ngay_nghi_khong_phep'] = number_format($rs['tong_so_ngay_nghi_khong_phep'], 0, ',', '.') . "VND";
        $rs['tien_bao_hiem'] = number_format($rs['tien_bao_hiem'], 0, ',', '.') . "VND";
        $rs['tang_ca'] = number_format($rs['tang_ca'], 0, ',', '.') . "VND";
        $rs['phu_cap'] = number_format($rs['phu_cap'], 0, ',', '.') . "VND";
       
        $list .='
            <tr>
                <td style=" height:30px;text-align:center;">'.$rs['id'].'</td>
                <td style=" height:30px;text-align:center;">'.$rs2['name_taixe'].'</td>
                <td style=" height:30px;text-align:center;">'.$rs['ngay_cong'].'</td>
                <td style=" height:30px;text-align:center;">'.$rs['luong_thoa_thuan'].'</td>
                <td style=" height:30px;text-align:center;">'.$rs['tien_hoahong'].'</td>
                <td style=" height:30px;text-align:center;">'.$rs['tien_bao_hiem'].'</td>
                <td style=" height:30px;text-align:center;">'.$rs['phu_cap'].'</td>
                <td style=" height:30px;text-align:center;">'.$rs['thuong_nong'].'</td>
                <td style=" height:30px;text-align:center;">'.$rs['tang_ca'].'</td>
                <td style=" height:30px;text-align:center;">'.$rs['tong_so_ngay_nghi_khong_phep'].'</td>
                <td style=" height:30px;text-align:center;">'.$rs['tong_ungluong'].'</td>
                <td style=" height:30px;text-align:center;">'.$rs['tong_luong'].'</td>
                <td style=" height:30px;text-align:center;"></td>
            </tr>
        ';
       
       
    }
    $tong_thang = number_format($tong_thang, 0, ',', '.') . "VND";
    $str = '

   


    <div class="table"> 
        <table border = "1">
            <thead>
                <tr>
                    <th colspan = "12"><h3 style="color: red;">Bảng lương tài xế tháng '.$_GET['thang'].' năm '.$_GET['nam'].'<h3></th>
                </tr>
                <tr>
                    <th style="width: 165px; height:40px">Mã bảng lương</th>
                    <th style="width: 165px; height:40px">Tên nhân sự</th>
                    <th style="width: 165px; height:40px">Số ngày công</th>
                    <th style="width: 165px; height:40px">Lương thỏa thuận</th>
                    <th style="width: 165px; height:40px">Tiền hoa hồng</th>
                    <th style="width: 165px; height:40px">Tiền bảo hiểm</th>
                    <th style="width: 165px; height:40px">Phụ cấp</th>     
                    <th style="width: 165px; height:40px">Thưởng nóng</th>
                    <th style="width: 165px; height:40px">Tăng ca</th>
                    <th style="width: 165px; height:40px">Nghỉ không phép</th>
                    <th style="width: 165px; height:40px">Tổng lương đã ứng</th>
                    <th style="width: 165px; height:40px">Tổng lương</th>
                    <th style="width: 165px; height:40px">Ký xác nhận</th>
                </tr>
            </thead>
            <tbody>
                '.$list.'

                <td colspan = "12" style="color:red; height:30px;text-align:right;">Tổng: '.$tong_thang.'</td>
            </tbody>
        </table>
    </div>

    ';

         $data_excel = mb_convert_encoding($str,"HTML-ENTITIES","UTF-8");

        echo $data_excel;

        $file_name = 'bang-luong-tai-xe-'.$_GET['thang'].'-'.$_GET['nam'];
		
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
        header("Location: ".$domain."luongtaixe/");
		exit;
    }
}else{
       
        header("Location: ".$domain."luongtaixe/");
		exit;
}
exit;