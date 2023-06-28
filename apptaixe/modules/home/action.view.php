<?php

defined('_ROOT') or die(__FILE__);
// if(!isset($_SESSION['id_taixe']) && !isset($_SESSION['name_taixe']) && $_SESSION['active'] == 0){
// 	header("Location: ".$domain);
// 	exit;
// }
$tpl->setfile(array(
	'body'=>'home.tpl',
));
// print_r($_SESSION['admin_login']['id']);
//lấy đơn hàng trọn gói mà tài xế chưa nhận lệnh 
$donhangtrongoi = $oContent->view_table('php_donhangtrongoi','id_taixe = '.$_SESSION['admin_login']['id'] .' AND nhan_lenh = 0');
$count =$donhangtrongoi->num_rows();

if($count > 0)
{
	while($rs = $donhangtrongoi->fetch())
	{
			//kh
			$khachhang = $model->db->query('SELECT * FROM php_khachhang WHERE id = '.$rs['id_khachhang']);
			$rs_kh = $khachhang->fetch();
			$tpl->merge($rs_kh,'khachhang');
			//end kh
			//kh
			$xe = $model->db->query('SELECT * FROM php_doixe WHERE id = '.$rs['id_doixe']);
			$rs_xe = $xe->fetch();
			$count_xe = $xe->num_rows();
			if($count_xe > 0){
				$rs['biensoxe'] = $rs_xe['biensoxe'];
			}
			else{
				$rs['biensoxe'] ='Chưa phân xe vận chuyến';
				
			}
			
			//end kh
			//kh
			$phuxe = $model->db->query('SELECT * FROM php_nhansu WHERE id = '.$rs['id_nhansu']);
			$phuxe_rs = $phuxe->fetch();
			$count_phuxe = $phuxe->num_rows();
			if($count_phuxe > 0){
				$rs['ten_phuxe'] = $phuxe_rs['name'];
				$rs['sdt_phuxe'] = $phuxe_rs['phone'];
			}
			else{
				$rs['ten_phuxe'] ='Không có người phụ xe';
				$rs['sdt_phuxe'] = '';
			}
			
			//end kh
			//Xử lý hình thức thanh toán
			if ($rs['hinhthucthanhtoan'] == 'thanhtoantienmat') {
				$rs['hinhthucthanhtoan_text'] = 'Tiền mặt';
			} else if ($rs['hinhthucthanhtoan'] == 'thanhtoancongno') {
				$rs['hinhthucthanhtoan_text'] = 'Công nợ khách hàng';
			}

			
			$rs['phivanchuyen'] = number_format($rs['phivanchuyen'], 0, ',', '.');
			$tpl->assign($rs,'trongoi');

	}
}
//lấy đơn hàng rời mà tài xế chưa nhận lệnh
$donhangroi = $oContent->view_table('php_donhangroi','id_taixe = '.$_SESSION['admin_login']['id']  .' AND nhan_lenh = 0');
$count_donhangroi =$donhangroi->num_rows();

if($count_donhangroi > 0)
{
	while($rs_donhangroi = $donhangroi->fetch())
	{

			//tuyến vận chuyển
			$tuyen = $model->db->query('SELECT * FROM php_banggiacuoc_tuyen WHERE id = '.$rs_donhangroi['tuyenduong_giaohang']);
			$rs_tuyen = $tuyen->fetch();
			$tpl->merge($rs_tuyen,'tuyen_roi');
			//end tuyến
			$xe_roi = $model->db->query('SELECT * FROM php_doixe WHERE id = '.$rs_donhangroi['id_doixe']);
			$rs_xe_roi = $xe_roi->fetch();
			$count_xe_roi = $xe_roi->num_rows();
			if($count_xe_roi > 0){
				$rs_donhangroi['biensoxe'] = $rs_xe_roi['biensoxe'];
			}
			else{
				$rs_donhangroi['biensoxe'] ='Chưa phân xe vận chuyến';
				
			}
			
			//end kh
			//kh
			$phuxe_roi = $model->db->query('SELECT * FROM php_nhansu WHERE id = '.$rs_donhangroi['id_nhansu']);
			$phuxe_rs_roi = $phuxe_roi->fetch();
			$count_phuxe_roi = $phuxe_roi->num_rows();
			if($count_phuxe_roi > 0){
				$rs_donhangroi['ten_phuxe'] = $phuxe_rs_roi['name'];
				$rs_donhangroi['sdt_phuxe'] = $phuxe_rs_roi['phone'];
			}
			else{
				$rs_donhangroi['ten_phuxe'] ='Không có người phụ xe';
				$rs_donhangroi['sdt_phuxe'] = '';
			}
			
			
		$donhangroi_s = $model->db->query("SELECT * FROM php_donhangroi_s WHERE id_donhangroi =".$rs_donhangroi['id']);
		$rs_donhangroi['soluong_donhangcon'] = $donhangroi_s->num_rows();
		$rs_donhangroi['tong_trongluong'] = 0;
		$rs_donhangroi['tong_khoi'] = 0;
		while($rs_donhangroi_s = $donhangroi_s->fetch())
		{
				//Cộng tổng số trọng lượng đơn hàng
				$rs_donhangroi['tong_trongluong'] += $rs_donhangroi_s['trongluong_hanghoa'];
				$rs_donhangroi['tong_khoi'] += $rs_donhangroi_s['khoi_hanghoa'];
		}
		
		


		$rs_donhangroi['tong_phivanchuyen'] = number_format($rs_donhangroi['tong_phivanchuyen'], 0, ',', '.');
		$rs_donhangroi['luong_chuyen'] = number_format($rs_donhangroi['luong_chuyen'], 0, ',', '.');
			$tpl->assign($rs_donhangroi,'roi');
	}
}
//xử lý các đơn đã được nhận lệnh của tài xế 
$donhangtrongoi_nhanlenh = $oContent->view_table('php_donhangtrongoi','id_taixe = '.$_SESSION['admin_login']['id'] .' AND nhan_lenh = 1 AND active = 0');
$count_trongoi_nhanlenh =$donhangtrongoi_nhanlenh->num_rows();

if($count_trongoi_nhanlenh > 0)
{
	while($rs_nhanlenh_trongoi = $donhangtrongoi_nhanlenh->fetch())
	{
		
			$rs_nhanlenh_trongoi['phivanchuyen'] = number_format($rs_nhanlenh_trongoi['phivanchuyen'], 0, ',', '.');
			$rs_nhanlenh_trongoi['luong_chuyen'] = number_format($rs_nhanlenh_trongoi['luong_chuyen'], 0, ',', '.');
			$tpl->assign($rs_nhanlenh_trongoi,'trongoi_nhanlenh');

	}
}
// 
$donhangroi_nhanlenh = $oContent->view_table('php_donhangroi','id_taixe = '.$_SESSION['admin_login']['id']  .' AND nhan_lenh = 1 AND active = 0');
$count_donhangroi_nhanlenh =$donhangroi_nhanlenh->num_rows();

if($count_donhangroi_nhanlenh > 0)
{
	while($rs_donhangroi_nhanlenh = $donhangroi_nhanlenh->fetch())
	{

			//tuyến vận chuyển
			$tuyen_nhanlenh = $model->db->query('SELECT * FROM php_banggiacuoc_tuyen WHERE id = '.$rs_donhangroi_nhanlenh['tuyenduong_giaohang']);
			$rs_tuyen_nhanlenh = $tuyen_nhanlenh->fetch();
			$rs_donhangroi_nhanlenh['ten_tuyen'] = $rs_tuyen_nhanlenh['ten_tuyen'];
			//end tuyến
		
			
		$donhangroi_s_nhanlenh = $model->db->query("SELECT * FROM php_donhangroi_s WHERE id_donhangroi =".$rs_donhangroi_nhanlenh['id']);
		$rs_donhangroi_nhanlenh['soluong_donhangcon'] = $donhangroi_s_nhanlenh->num_rows();
		$rs_donhangroi_nhanlenh['tong_trongluong'] = 0;
		$rs_donhangroi_nhanlenh['tong_khoi'] = 0;
		while($rs_donhangroi_s_nhanlenh = $donhangroi_s_nhanlenh->fetch())
		{
				//Cộng tổng số trọng lượng đơn hàng
				$rs_donhangroi_nhanlenh['tong_trongluong'] += $rs_donhangroi_s_nhanlenh['trongluong_hanghoa'];
				$rs_donhangroi_nhanlenh['tong_khoi'] += $rs_donhangroi_s_nhanlenh['khoi_hanghoa'];
		}
		
		


		$rs_donhangroi_nhanlenh['tong_phivanchuyen'] = number_format($rs_donhangroi_nhanlenh['tong_phivanchuyen'], 0, ',', '.');
		$rs_donhangroi_nhanlenh['luong_chuyen'] = number_format($rs_donhangroi_nhanlenh['luong_chuyen'], 0, ',', '.');
			$tpl->assign($rs_donhangroi_nhanlenh,'roi_nhanlenh');
	}
}
$count_nhanlenh['nhan_lenh'] = $count_donhangroi_nhanlenh + $count_trongoi_nhanlenh;
$tpl->merge($count_nhanlenh,'count_nhanlenh');
//end xử lý các đơn đã được nhận lệnh của tài xế 
$breadcrumb->reset();
$breadcrumb->assign("",$cfg['client']);
$breadcrumb->assign('?mod=home','Dashboard');
$request['breadcrumb'] = $breadcrumb->parse();
$tpl->assign($request);
?>