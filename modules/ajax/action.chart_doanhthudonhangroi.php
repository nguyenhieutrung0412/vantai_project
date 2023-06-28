<?php
if($_REQUEST['id'] == '1'){
//xử lý lấy doanh thu theo tháng
$nam = date('Y');

for($i = 1; $i <= 12;$i++)
{
    	//xử lý các loại thu theo tháng
		$tongtien_donhangroi = 0;
		//$baocao_loaithu = $oContent->view_table('php_loaithu','baocao = 1 AND active = 1');
	
	
		$donhangroi = $oContent->view_table('php_donhangroi',' active = 1 AND thang = '.$i.' AND nam='.$nam );
		//$phieuthu = $model->db->query('SELECT * FROM php_phieuthu WHERE loai_thu = '.$rs_loaithu['id'].' AND active = 1 AND thang = '.$i.' AND nam='.$_GET['nam']);	
		while($rs_donhangroi = $donhangroi->fetch()){
				$tongtien_donhangroi += $rs_donhangroi['tong_phivanchuyen'];
				
			}
		
          $data[]  = $tongtien_donhangroi;  
		
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