<?php
if($_REQUEST['id'] == '1'){
//xử lý lấy doanh thu theo tháng
$nam = date('Y');

for($i = 1; $i <= 12;$i++)
{
    	//xử lý các loại thu theo tháng
		$tongtien_donhangtrongoi = 0;
		//$baocao_loaithu = $oContent->view_table('php_loaithu','baocao = 1 AND active = 1');
	
	
		$donhangtrongoi = $oContent->view_table('php_donhangtrongoi',' active = 1 AND thang = '.$i.' AND nam='.$nam );
		//$phieuthu = $model->db->query('SELECT * FROM php_phieuthu WHERE loai_thu = '.$rs_loaithu['id'].' AND active = 1 AND thang = '.$i.' AND nam='.$_GET['nam']);	
		while($rs_donhangtrongoi = $donhangtrongoi->fetch()){
				$tongtien_donhangtrongoi += $rs_donhangtrongoi['phivanchuyen'];
				
			}
		
          $data[]  = $tongtien_donhangtrongoi;  
		
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