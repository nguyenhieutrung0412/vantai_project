<?php
if($_REQUEST['id'] == '1'){
//xử lý lấy doanh thu theo tháng
$nam = date('Y');

for($i = 1; $i <= 12;$i++)
{
    	//xử lý các loại thu theo tháng
		$tongtien_phisuachua = 0;
		//$baocao_loaithu = $oContent->view_table('php_loaithu','baocao = 1 AND active = 1');
	
	
		$phisuachua = $oContent->view_table('php_luongtaixe','active = 1 AND thang = '.$i.' AND nam='.$nam );
		//$phieuthu = $model->db->query('SELECT * FROM php_phieuthu WHERE loai_thu = '.$rs_loaithu['id'].' AND active = 1 AND thang = '.$i.' AND nam='.$_GET['nam']);	
		while($rs_phisuachua = $phisuachua->fetch()){
				$tongtien_phisuachua += $rs_phisuachua['tong_luong'];
				
			}
		
          $data[]  = $tongtien_phisuachua;  
		
}
	//end
    die(json_encode(
        array(
        
            'status'=> '1',
            'data' => $data
        )
       ));
    }
 exit;