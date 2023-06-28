<?php
if($_REQUEST['id'] == '1'){
//xử lý lấy doanh thu theo tháng
$nam = date('Y');

for($i = 1; $i <= 12;$i++)
{
    	//xử lý các loại thu theo tháng
		$tongtien_phidau = 0;
		//$baocao_loaithu = $oContent->view_table('php_loaithu','baocao = 1 AND active = 1');
	
	
		$phidau = $oContent->view_table('php_theodoidau','  thang = '.$i.' AND nam='.$nam );
		//$phieuthu = $model->db->query('SELECT * FROM php_phieuthu WHERE loai_thu = '.$rs_loaithu['id'].' AND active = 1 AND thang = '.$i.' AND nam='.$_GET['nam']);	
		while($rs_phidau = $phidau->fetch()){
				$tongtien_phidau += $rs_phidau['tong_tien'];
				
			}
		
          $data[]  = $tongtien_phidau;  
		
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