<?php
if($_REQUEST['phone'] != '' AND $_REQUEST['pwd'] != ''){

	$phone = addslashes($_REQUEST['phone']);
	$pwd = addslashes($_REQUEST['pwd']);
	
	$result = $oContent->view_table("php_nhansu","phone = '".$phone."' AND pwd = MD5('".$pwd."') AND active = 1 LIMIT 1");
	$total = $result->num_rows();
	$rs = $result->fetch();




	if($total==1){
		$_SESSION['user_id'] = $rs['id'];
		$_SESSION['position'] = $rs['position'];
		$_SESSION['name'] = $rs['name'];
		$_SESSION['phone'] = $rs['phone'];
		$_SESSION['chucvu'] = $rs['position'];
		$_SESSION['chucvu_id'] = $rs['position_id'];
		
		die(json_encode(array(
			'status'=>1,
			'msg'=>'Đã đăng nhập thành công!',
			'link'=>'/trangchu'
		)));
	
	}else{
		die(json_encode(array(
			'status'=>0,
			'msg'=>'(0) Lỗi: Tài khoản không tồn tại hoặc chưa được active'
		)));

	}

}
else{
	die(json_encode(array(
		'status'=>2,
		'msg'=>'(2) Lỗi: Không thể đăng nhập, vui lòng thử lại!',
		'link'=>'/'
	)));

}
exit;